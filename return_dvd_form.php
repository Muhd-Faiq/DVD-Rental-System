<link rel='stylesheet' href='styles.css'/>
<?php
session_start(); // Start up your PHP Session

echo $_SESSION["Login"]; //for session tracking purpose, can delete
echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: login.php");   //send user to login page


?>
	<html>
	<head><title>Return Menu</title><head>
	<body>
    <h1>Retun DVD Menu</h1>
		<div class="topleft">
			<img src="Trademark.png">
		</div>
		<div class="topright">
			<img src="Trademark.png">
		</div>

		<form name="form1" method="post" action="return_dvd.php">
    	<p>Name: </strong><input name="customerName" type="text" id="customerName" size="30" ></p>
			<p><input type="submit" name="button1" value="Search"></p>
		</form>





  </body>
  </html>
