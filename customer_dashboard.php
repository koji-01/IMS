<?php
session_start();

// Check if user is logged in and retrieve their ID from session
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
} else {
    $user_id = 0; // Set a default value if user is not logged in
}
include('connect.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Customer Dashboard</title>
	<link rel="stylesheet" type="text/css" href="dash.css">
</head>
<body>
	<header>
		<div class="container">
			<h1>MyCompany</h1>
			<nav>
				<ul>
					<li><a href="#">Dashboard</a></li>
					<li><a href="#">Order History</a></li>
					<li><a href="#">Track Order</a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<section id="welcome">
		<div class="container">
			<?php

        $sql = "SELECT fullname FROM users WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $full_name = $row["fullname"];
} else {
    $full_name = "User";
    }

        // Display welcome message with user's full name
        echo "<h2>Welcome, " . $full_name . "</h2>";

			?>
		</div>
	</section>

	<section id="orders">
	<div class="container">
		<h2>Recent Orders</h2>
		<table>
			<thead>
				<tr>
					<th>Order Number</th>
					<th>Date</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include('connect.php');

				// Check if user is logged in and retrieve their ID from session
				if (isset($_SESSION["user_id"])) {
				    $user_id = $_SESSION["user_id"];

				    // Query the database for the order data for the logged-in user
				    $sql = "SELECT * FROM orders WHERE user_id = '$user_id'";
				    $result = $conn->query($sql);

				    // Loop through the results and display them in the table
				    if ($result->num_rows > 0) {
				        while($row = $result->fetch_assoc()) {
				            echo "<tr>";
				            echo "<td>" . $row["order_number"] . "</td>";
				            echo "<td>" . $row["order_date"] . "</td>";
				            echo "<td>" . $row["order_status"] . "</td>";
				            echo "</tr>";
				        }
				    } else {
				        echo "<tr><td colspan='3'>No orders found</td></tr>";
				    }
				} else {
				    echo "<tr><td colspan='3'>Please log in to view your orders</td></tr>";
				}

				// Close the database connection
				$conn->close();
				?>
			</tbody>
		</table>
	</div>
</section>



	<section id="fulfillment">
		<div class="container">
			<h2>Fulfillment Status</h2>
			<p>Your order is expected to be delivered on 02/25/2023</p>
			<a href="#">View Fulfillment Details</a>
		</div>
	</section>

	<section id="quick-links">
		<div class="container">
			<h2>Quick Links</h2>
			<ul>
				<li><a href="#">Track Order</a></li>
				<li><a href="#">Order History</a></li>
				<li><a href="#">Contact Us</a></li>
			</ul>
		</div>
	</section>

	<footer>
		<div class="container">
			<p>&copy; MyCompany 2023</p>
		</div>
	</footer>

</body>
</html>

