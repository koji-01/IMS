<?php
session_start();
include('connect.php');

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Retrieve user information from the database
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) == 1) {
        // User found, verify password
        $row = mysqli_fetch_assoc($result);
        
        if(password_verify($password, $row['password'])) {
            // Password is correct, set session variables for the user's ID and level
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_level'] = isset($row['user_level']) ? $row['user_level'] : null;
            
            // Redirect to appropriate dashboard based on user's level
            if(isset($row['user_level']) && $row['user_level'] == 1) {
                header("Location: customer_dashboard.php");
            } else if(isset($row['user_level']) && $row['user_level'] == 2) {
                header("Location: admin_dashboard.php");
            } else {
                echo "Invalid user level.";
            }
        } else {
            // Password is incorrect
            echo "Invalid login credentials. Please try again.";
        }
    } else {
        // User not found
        echo "Invalid login credentials. Please try again.";
    }
}

mysqli_close($conn);

?>
