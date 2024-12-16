<?php
include 'session_handler.php'; // Adjust the path if necessary

require 'database.php'; // Adjust path to your database connection file

header('Content-Type: application/json');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['productId'], $data['quantity'])) {
    $user_id = $_SESSION['user_id']; // Assuming user ID is stored in the session
    $product_id = intval($data['productId']);
    $quantity = intval($data['quantity']);

    // Check if the product is already in the cart
    $stmt = $pdo->prepare('SELECT * FROM cart WHERE user_id = ? AND product_id = ?');
    $stmt->execute([$user_id, $product_id]);
    $existingCartItem = $stmt->fetch();

    if ($existingCartItem) {
        // Update quantity if the product already exists in the cart
        $stmt = $pdo->prepare('UPDATE cart SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?');
        $result = $stmt->execute([$quantity, $user_id, $product_id]);
    } else {
        // Insert new cart item
        $stmt = $pdo->prepare('INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)');
        $result = $stmt->execute([$user_id, $product_id, $quantity]);
    }

    if ($result) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add to cart']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
}
?>