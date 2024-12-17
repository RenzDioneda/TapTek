<?php
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Function to check if the user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Function to redirect to the login page if the user is not logged in
function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php'); // Adjust this path if necessary
        exit;
    }
}

// Function to log in the user
function loginUser($user_id, $username, $role) {
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
}

// Function to log out the user
function logoutUser() {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header('Location: index.php'); // Redirect to login or homepage
    exit;
}

// Optional: Add any other utility functions for session management here
?>