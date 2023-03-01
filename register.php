<?php
session_start();
include('connect.php');

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['fullname']) && isset($_POST['email'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    
    // Check if the username is already taken
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        // Username is already taken, display an error message
        echo "Username already taken. Please choose a different username.";
    } else {
        // Username is available, create a new user account
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password, fullname, email, user_level) VALUES ('$username', '$hashed_password', '$fullname', '$email', 1)";
        $result = mysqli_query($conn, $sql);
        
        if($result) {
            // Account creation successful, redirect to the login page
            header("Location: index.php");
        } else {
            // Account creation failed, display an error message
            echo "Account creation failed. Please try again.";
        }
    }
}

mysqli_close($conn);

?>
