<?php
session_start(); // Start session at the top

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
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to verify the username and password
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
    if (!$stmt) {
        die(json_encode(['success' => false, 'message' => 'Statement preparation failed: ' . $conn->error]));
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Check if password matches (assuming passwords are hashed in the database)
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];

            $response['success'] = true;
            $response['message'] = 'Login successful';
            $response['username'] = $user['username'];  // Include the username in the response
        } else {
            $response['message'] = 'Incorrect password';
        }
    } else {
        $response['message'] = 'User not found';
    }
}

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>