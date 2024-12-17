<?php
// Include the session handler and database connection
include('session_handler.php');
include('database.php');

$conn = Database::getInstance();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];

    // Terms and conditions (checkbox validation)
    if (isset($_POST['terms'])) {
        // Capture user ID from session
        $user_id = $_SESSION['user_id']; // Ensure the user is logged in
        
        // Step 1: Start a transaction
        $conn->begin_transaction();
        
        try {
            // Step 2: Insert into the orders table
            $total_amount = 0; // Initialize total amount variable
            $payment_status = 'Pending'; // Default payment status
            $shipping_status = 'Pending'; // Default shipping status

            // Insert into orders table
            $stmt = $conn->prepare("INSERT INTO orders (user_id, order_date, total_amount, payment_status, shipping_status) VALUES (?, NOW(), ?, ?, ?)");
            $stmt->bind_param("idss", $user_id, $total_amount, $payment_status, $shipping_status);
            $stmt->execute();

            // Get the last inserted order_id
            $order_id = $stmt->insert_id;
            $stmt->close();

            // Step 3: Insert into order_details table
            // Assuming you have the product data available, here's an example:
            $products = $_POST['products']; // This could be an array of products passed from the form
            foreach ($products as $product) {
                $product_id = $product['id'];
                $quantity = $product['quantity'];
                $price_per_unit = $product['price'];

                // Calculate the total amount for this product
                $total_amount += $quantity * $price_per_unit;

                // Insert into order_details table
                $stmt = $conn->prepare("INSERT INTO order_details (order_id, product_id, quantity, price_per_unit) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("iiid", $order_id, $product_id, $quantity, $price_per_unit);
                $stmt->execute();
                $stmt->close();
            }

            // Step 4: Update the total amount in the orders table
            $stmt = $conn->prepare("UPDATE orders SET total_amount = ? WHERE order_id = ?");
            $stmt->bind_param("di", $total_amount, $order_id);
            $stmt->execute();
            $stmt->close();

            // Step 5: Commit the transaction
            $conn->commit();

            // Step 6: Show a success message and redirect
            echo "<script>
                    alert('Checkout successful! Your order has been placed.');
                    window.location.href = 'Cart.php'; // Redirect to Cart.php
                  </script>";
        } catch (Exception $e) {
            // Step 7: Rollback the transaction if anything goes wrong
            $conn->rollback();
        }
    } else {
        echo "You must agree to the terms and conditions.";
    }
}

// Close the database connection
$conn->close();
?>