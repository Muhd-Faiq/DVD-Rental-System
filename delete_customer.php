<link rel='stylesheet' href='styles.css'/><?php
// Start up your PHP Session
session_start();
// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES")
header("Location: login.php");



if ($_SESSION["LEVEL"] == 1 || $_SESSION["LEVEL"] == 2) {


		 $ID = $_GET["id"];

	     require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	     $sql = "DELETE FROM customer WHERE id = $ID" ;

	     $result = mysqli_query($conn, $sql);

	      if (mysqli_query($conn, $sql)) {
			echo "<h3>Record deleted successfully</h3>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
          mysqli_close($conn);
		echo "<div class='topnav'>";
		 echo "<p><a href='view_customer_database.php'>Click here to view updated list of customer</a></p>";
		 echo "<div class='topnav'>";

// If the user is not correct level
} else if ($_SESSION["LEVEL"] != 1 || $_SESSION["LEVEL"] != 2) {

  echo "<p>Wrong User Level! You are not authorized to view this page</p>";

  echo "<p><a href='main.php'>Go back to main page</a></p>";

  echo "<p><a href='logout.php'>LOGOUT</a></p>";

	}

  ?>
