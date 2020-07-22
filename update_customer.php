<link rel='stylesheet' href='styles.css'/>
<?php
session_start(); // Start up your PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: login.php");   //send user to login page

if ($_SESSION["LEVEL"] == 1 || $_SESSION["LEVEL"] == 2) { 	//only user level 1 can access


		$customerName = $_POST["customerName"];
		$customerContactnum = $_POST["customerContactnum"];
		$customerRentDate = $_POST["customerRentDate"];
		$customerReturnDate = $_POST["customerReturnDate"];



		 $ID = $_POST["id"];

	     require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	     $sql = "UPDATE customer SET customer_name = '$customerName', customer_contactnum = '$customerContactnum',
			 customer_rent_date = '$customerRentDate', customer_return_date = '$customerReturnDate'	WHERE id = '$ID'";

	     if (mysqli_query($conn, $sql)) {
			echo "<h3>Record updated successfully</h3>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
          mysqli_close($conn);
		 echo "<div class='topnav'>";
		 echo "<p><a href='view_customer_database.php'>Click here to view updated list of customer</a></p>";
		 echo "</div>";

// If the user is not correct level
} else if ($_SESSION["LEVEL"] != 1 || $_SESSION["LEVEL"] != 2) {

  echo "<p>Wrong User Level! You are not authorized to view this page</p>";

  echo "<p><a href='main.php'>Go back to main page</a></p>";

  echo "<p><a href='logout.php'>LOGOUT</a></p>";

   }

  ?>
