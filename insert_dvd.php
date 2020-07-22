<link rel='stylesheet' href='styles.css'/>
<?php
session_start(); // Start up your PHP Session

// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES")
header("Location: login.php");




	     $dvdname = $_POST["dvdname"];
			 $dvdquantity = $_POST["dvdquantity"];


		 require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	     $sql = "INSERT INTO dvd(dvdname,dvdquantity) VALUES ('$dvdname','$dvdquantity')" ;

		 if (mysqli_query($conn, $sql)) {
			echo "<h3>New record created successfully</h3>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}


	     mysqli_close($conn);
		if ($_SESSION["LEVEL"] == 1 || $_SESSION["LEVEL"] == 2) {
		echo "<div class='topnav'>";
		 echo "<p><a href='dvd_form.php'>Click here to insert again</a></p>";
		 echo "<p><a href='view_dvd_database.php'>Click here to view updated list</a></p>";
		 echo "<p><a href='main.php'>Go back to main page</a></p>";
	   echo "<p><a href='logout.php'>LOG OUT</a></p>";
		 echo "</div>";
// If the user is not correct level
} else if ($_SESSION["LEVEL"] != 1 || $_SESSION["LEVEL"] != 2) {

	echo "<div class='topnav'>";
  echo "<p><a href='dvd_form.php'>Click here to insert again</a></p>";

  echo "<p><a href='main.php'>Go back to main page</a></p>";

  echo "<p><a href='logout.php'>LOG OUT</a></p>";
	echo "</div>";
   }

  ?>
