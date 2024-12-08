<?php
// Include your database connection
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // Handle OPTIONS request for CORS preflight
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    exit(0); // No further processing needed for OPTIONS request
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Log form data to check if it's being received correctly
    error_log('Username: ' . $_POST['username']);
    error_log('Email: ' . $_POST['email']);
    error_log('Password: ' . $_POST['password']);

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
        echo "success"; // Send success message
    } else {
        echo "An error occurred while processing your registration.";
    }
}
?>