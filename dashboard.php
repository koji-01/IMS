<?php
session_start();

// Check if user is logged in and redirect to login page if not
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

// Access session variables for user's ID and level
$user_id = $_SESSION['user_id'];
$user_level = $_SESSION['user_level'];

// Display appropriate content based on user's level
if($user_level == 1) {
    // Display customer dashboard
?>
    <h1>Welcome, customer!</h1>
    <p>This is your dashboard.</p>
<?php
} else if($user_level == 2) {
    // Display admin dashboard
?>
    <h1>Welcome, admin!</h1>
    <p>This is your dashboard.</p>
<?php
}
?>
