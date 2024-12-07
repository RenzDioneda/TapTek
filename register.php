<?php
// Include the database connection
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (empty($username) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // Check if username or email already exists
    $check_query = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $check_query->execute([$username, $email]);
    if ($check_query->rowCount() > 0) {
        echo "Username or email already exists.";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert user into the database
    $insert_query = $conn->prepare("INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, 'Customer')");
    if ($insert_query->execute([$username, $hashed_password, $email])) {
        echo "success";
    } else {
        echo "An error occurred while processing your registration.";
    }
}
?>