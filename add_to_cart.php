<?php
require_once 'database.php';
session_start();  // Start the session to access session variables

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get product ID and quantity from the POST request
    $product_id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    
    // Get the logged-in user's ID from the session
    $user_id = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;

    // Validate inputs
    if ($product_id <= 0 || $quantity <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid product ID or quantity.']);
        exit;
    }

    // Ensure the user is logged in
    if ($user_id === 0) {
        echo json_encode(['success' => false, 'message' => 'User not logged in.']);
        exit;
    }

    // Connect to the database
    $conn = Database::getInstance();

    // Check if the product is already in the cart
    $query = "SELECT cart_id FROM cart WHERE user_id = ? AND product_id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        echo json_encode(['success' => false, 'message' => 'Database error (prepare).']);
        exit;
    }

    $stmt->bind_param('ii', $user_id, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If the product already exists in the cart, update the quantity
        $query = "UPDATE cart SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?";
        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            echo json_encode(['success' => false, 'message' => 'Database error (prepare).']);
            exit;
        }

        $stmt->bind_param('iii', $quantity, $user_id, $product_id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo json_encode(['success' => true, 'message' => 'Product quantity updated in cart.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update product quantity.']);
        }
    } else {
        // If the product does not exist in the cart, insert it
        $query = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            echo json_encode(['success' => false, 'message' => 'Database error (prepare).']);
            exit;
        }

        $stmt->bind_param('iii', $user_id, $product_id, $quantity);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo json_encode(['success' => true, 'message' => 'Product added to cart.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to add product to cart.']);
        }
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>