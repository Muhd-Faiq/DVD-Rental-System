<link rel='stylesheet' href='styles.css'/>
<?php
session_start(); // Start up your PHP Session

echo $_SESSION["Login"]; //for session tracking purpose, can delete
echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES")
header("Location: login.php");


		 $dvdid = $_GET['dvdid'];

		 require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	     // Retrieve data from database
		 $sql="SELECT * FROM dvd WHERE dvdid='$dvdid'";
		 $result = mysqli_query($conn, $sql);
		 $rows=mysqli_fetch_assoc($result);

?>

<html>
<head><title>Inserting Customer Data</title></HEAD>
<body>


<h1>Customer Data Form</h1>
<div class="topleft">
<img src="Trademark.png">
</div>
<div class="topright">
	<img src="Trademark.png">
</div>

<p>Please fill in the following information:<br><br>

<form name="form1" method="POST" action="insert_customer.php" >
<p>Please fill in the following information:<br></p>
<p>Customer's Name:<INPUT type="text" name="customerName" size="50"></p>
<p>Contact Number:<input type="text" name="customerContactnum" size="12"></p>
<p>Rent Date: <INPUT type="date" name="customerRentDate" value"<?php echo date('Y-m-d')?>"></p>
<p><input name="dvdid" type="hidden" id="dvdid" value="<?php echo $rows['dvdid']; ?>"></p>
<p><input type="submit" name="button1" value="Submit"></p>
</form>
	</body>
	</html>


<?php

//}
