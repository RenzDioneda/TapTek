<?php
// Include the database connection file
include 'database.php'; // Make sure this file contains your database connection setup

$conn = Database::getInstance();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize input values
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the username or email already exists in the database
    $check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        // Username or email already exists
        echo "<script>
                window.location.href = 'home.php';
                alert('Username or email already exists. Please try again.');
              </script>";
    } else {
        // Insert new user into the database
        $insert_query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$hashed_password', 'Customer')";

        if (mysqli_query($conn, $insert_query)) {
            // Redirect to the login modal or success page
            echo "<script>
                    window.location.href = 'home.php';
                    alert('Sign-up successful! You can now log in.');
                  </script>";
        } else {
            // Handle database insertion error
            echo "<script>
                    window.location.href = 'home.php';
                    alert('Error: Could not complete the sign-up process. Please try again.');
                  </script>";
        }
    }
}
?>