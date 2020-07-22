<link rel='stylesheet' href='styles.css'/>
<?php
session_start(); // Start up your PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: login.php");   //send user to login page


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

    $find=$_POST['customerName'];
		 require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	     // Retrieve data from database
		 $sql="SELECT * FROM customer WHERE customer_name like '%$find%'";
		 $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0)
     {
		 if($rows=mysqli_fetch_assoc($result))
     {


?>




<form name="form1" method="post" action="calculate_payment.php">
<p><input name="customerName" type="hidden" id="customerName" size="50" value="<?php echo $rows['customer_name']; ?>"></p>
<p>Name: </strong><?php echo $rows['customer_name']; 							?></p>
<p>Rent Date: </strong><?php echo $rows['customer_rent_date'];         	?></p>
<p>Return Date<input name="customerReturnDate" type="date" id="customerReturnDate" size="20" value="<?php echo $rows['customer_return_date']; ?>"></p>
<p><input name="id" type="hidden" id="id" value="<?php echo $rows['id']; ?>"></p>
<p><input type="submit" name="Submit" value="Update"></p>

</form>
<?php } ?>
<?php
}
  else {
    echo "<h3>No records found</h3>"; }

   mysqli_close($conn);
 ?>
</body>
</html>

<?php



// If the user is not correct level
	echo "<div class='topnav'>";
  echo "<p><a href='main.php'>Go back to main page</a></p>";

  echo "<p><a href='logout.php'>LOGOUT</a></p>";
	echo "</div>";


?>
