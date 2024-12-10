<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include your database connection
    require_once '../database.php';

    $conn=Database::getInstance();

    // Retrieve data from the form
    $productName = $_POST['productName'];
    $description = $_POST['productDescription'];
    $price = $_POST['price'];
    $color = $_POST['color'];
    $stock = $_POST['stock'];

    // Handle image upload
    $targetDir = "uploads/";
    $imageName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $imageName;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        $imageUrl = $targetFilePath;
    } else {
        echo "Error uploading the image.";
        exit;
    }

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO products (product_name, description, price, color, stock, image_url) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdiss", $productName, $description, $price, $color, $stock, $imageUrl);

    if ($stmt->execute()) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>