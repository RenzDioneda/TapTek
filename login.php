<?php
session_start(); // Start session at the top

// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'database.php';

// Database connection
$conn = Database::getInstance();
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]));
}

// Initialize response
$response = ['success' => false, 'message' => 'Invalid credentials'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Query the database to verify the username
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
    if (!$stmt) {
        die(json_encode(['success' => false, 'message' => 'Statement preparation failed: ' . $conn->error]));
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Check if password matches (assuming passwords are hashed)
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; // Assuming a 'role' column exists in 'users' table

            // Redirect based on role
            if ($user['role'] === 'Admin') {
                $response['redirect'] = 'AdminSide/admin_dashboard.php';
            } else {
                $response['redirect'] = 'Dashboard.php';
            }

            $response['success'] = true;
            $response['message'] = 'Login successful';
        } else {
            $response['message'] = 'Incorrect password';
        }
    } else {
        $response['message'] = 'User not found';
    }

    // Close the statement
    $stmt->close();
}

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);

// Close the database connection
$conn->close();
?>