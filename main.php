<link rel='stylesheet' href='styles.css'/>
<?php
session_start(); // Start up your PHP Session


if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: login.php");
if ($_SESSION["LEVEL"] == 1) {  //level 1 for admin
?>
	<html>
	<head><title>Main Page</title></head>

	<body >
		<h1>Home of Entertainment</h1>
		<div class="topleft">
			<img src="Trademark.png">
		</div>
		<div class="topright">
			<img src="Trademark.png">
		</div>
		<div class="topnav">
			<a href="view_customer_database.php">Customer</a>
			<a href="view_dvd_database.php">DVD</a>
			<a href="view_user_database.php">User</a>
			<a href="menu_search_sort.php">Search & Sort DVD available</a>
			<a href="menu_choose_dvd.php">Insert New Customer</a>
			<a href="return_dvd_form.php">Return DVD</a>
			<a href="logout.php" style="float:right">LOG OUT</a>
		</div>
		<div class="belowleft">
			<img src="Coming.png" style="width:500px;height:500px;">
		</div>
		<div class="belowright">
				<button onclick="document.getElementById('myImage').src='fast.jpg'">Back</button>
			<img id="myImage" src="fast.jpg" style="width:870px;height:500px;">
			<button onclick="document.getElementById('myImage').src='infinity.jpeg'">Next</button>
		</div>
	</body>
	</div>
<?php
}
else if ($_SESSION["LEVEL"] == 2) {   //level 2 for manager
?>
	<html>
	<head><title>Main Page</title></head>
	<body>
	<h1>Home of Entertainment</h1>
		<div class="topleft">
			<img src="Trademark.png">
		</div>
		<div class="topright">
			<img src="Trademark.png">
		</div>
	<div class="topnav">
 		<a href="view_customer_database.php">Customer</a>
  	<a href="view_dvd_database.php">DVD</a>
  	<a href="menu_search_sort.php">Search & Sort DVD available</a>
		<a href="menu_choose_dvd.php">Insert New Customer</a>
		<a href="return_dvd_form.php">Return DVD</a>
		<a href="logout.php" style="float:right">LOG OUT</a>
	</div>
	<div class="belowleft">
		<img src="Coming.png" style="width:500px;height:500px;">
	</div>
	<div class="belowright">
			<button onclick="document.getElementById('myImage').src='fast.jpg'">Back</button>
		<img id="myImage" src="fast.jpg" style="width:870px;height:500px;">
		<button onclick="document.getElementById('myImage').src='infinity.jpeg'">Next</button>
	</div>
</body>
<?php }

else if ($_SESSION["LEVEL"]==3) {// level 3 for staff
?>
	<html>
	<head><title>Main Page</title></head>
	<body>
		<h1>Home of Entertainment</h1>
			<div class="topleft">
				<img src="Trademark.png">
			</div>
			<div class="topright">
				<img src="Trademark.png">
			</div>
	<div class="topnav">
	<a href="menu_choose_dvd.php">Insert New Customer</a>
  <a href="dvd_form.php">Insert DVD data</a>
  <a href="menu_search_sort.php">Search & Sort DVD available</a>
	<a href="return_dvd_form.php"> Return DVD</a>
	<a href="logout.php" style="float:right">LOG OUT</a>
	</div>
	<div class="belowleft">
		<img src="Coming.png" style="width:500px;height:500px;">
	</div>
	<div class="belowright">
			<button onclick="document.getElementById('myImage').src='fast.jpg'">Back</button>
		<img id="myImage" src="fast.jpg" style="width:870px;height:500px;">
		<button onclick="document.getElementById('myImage').src='infinity.jpeg'">Next</button>
	</div>
</body>
<?php }
 ?>
	</body>
	</html>
