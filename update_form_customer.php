<link rel='stylesheet' href='styles.css'/>
<?php
session_start(); // Start up your PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: index.php");   //send user to login page

if ($_SESSION["LEVEL"] == 1 || $_SESSION["LEVEL"] == 2) { 	//only user level 1 can access

?>
	<html>
	<head><title>Updating Student Data</title><head>
	<body>

	<h1>Update Student Data Form</h1>
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
		 $sql="SELECT * FROM customer WHERE id='$ID'";
		 $result = mysqli_query($conn, $sql);
		 $rows=mysqli_fetch_assoc($result);

?>


<form name="form1" method="post" action="update_customer.php">
<table border="0" cellspacing="5" cellpadding="0">

<p>Name: <input name="customerName" type="text" id="customerName" size="50" value="<?php echo $rows['customer_name']; ?>"></p>
<p>Contact Num: <input name="customerContactnum" type="text" id="customerContactnum"  size="12" value="<?php echo $rows['customer_contactnum']; ?>"></p>
<p>Rent Date: <input name="customerRentDate" type="text" id="customerRentDate" size="20" value="<?php echo $rows['customer_rent_date']; ?>"></p>
<p>Return Date<input name="customerReturnDate" type="text" id="customerReturnDate" size="20" value="<?php echo $rows['customer_return_date']; ?>"></p>
<p><input name="id" type="hidden" id="id" value="<?php echo $rows['id']; ?>"></p>
<p><input type="submit" name="Submit" value="Update"></p>
</form>
</body>
</html>

<?php

	     mysqli_close($conn);

// If the user is not correct level
} else if ($_SESSION["LEVEL"] != 1 || $_SESSION["LEVEL"] != 2) {

  echo "<p>Wrong User Level! You are not authorized to view this page</p>";

  echo "<p><a href='main.php'>Go back to main page</a></p>";

  echo "<p><a href='logout.php'>LOGOUT</a></p>";
  }

?>
