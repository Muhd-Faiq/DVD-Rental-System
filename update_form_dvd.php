<link rel='stylesheet' href='styles.css'/>
<?php
session_start(); // Start up your PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: login.php");   //send user to login page

if ($_SESSION["LEVEL"] == 1 || $_SESSION["LEVEL"] == 2) { 	//only user level 1 can access

?>
	<html>
	<head><title>Updating DVD Data</title><head>
	<body>

	<h1>Update DVD Data Form</h1>
	<div class="topleft">
		<img src="Trademark.png">
	</div>
	<div class="topright">
		<img src="Trademark.png">
	</div>

<?php

		 $ID = $_GET['id'];

		 require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	     // Retrieve data from database
		 $sql="SELECT * FROM dvd WHERE dvdid='$ID'";
		 $result = mysqli_query($conn, $sql);
		 $rows=mysqli_fetch_assoc($result);

?>
<form name="form1" method="post" action="update_dvd.php">
<p>Title: <input name="dvdname" type="text" id="dvdname" size="30" value="<?php echo $rows['dvdname']; ?>"></p>
<p>Quantity: <input name="dvdquantity" type="text" id="dvdquantity" size="4" value="<?php echo $rows['dvdquantity']; ?>"></p>
<p><input name="dvdid" type="hidden" id="dvdid" value="<?php echo $rows['dvdid']; ?>"></p>
<p><input type="submit" name="Submit" value="Update"></p>
</form>

</body>
</html>-->

<?php

	     mysqli_close($conn);

// If the user is not correct level
} else if ($_SESSION["LEVEL"] != 1 || $_SESSION["LEVEL"] != 2) {

  echo "<p>Wrong User Level! You are not authorized to view this page</p>";
}
	echo "<div class='topnav'>";
  echo "<p><a href='main.php'>Go back to main page</a></p>";

  echo "<p><a href='logout.php'>LOGOUT</a></p>";
	echo "</div>";

?>
