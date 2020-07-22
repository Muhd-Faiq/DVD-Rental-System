<link rel='stylesheet' href='styles.css'/>
<?php
session_start(); // Start up your PHP Session

echo $_SESSION["Login"]; //for session tracking purpose, can delete
echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES")
header("Location: login.php");

//if ($_SESSION["LEVEL"] != 2) {

?>


<html>
<head><title>Inserting DVD Data</title></HEAD>
<body>


<h1>DVD Data Form</h1>
<div class="topleft">
	<img src="Trademark.png">
</div>
<div class="topright">
	<img src="Trademark.png">
</div>

<p>Please fill in the following information:<br><br>

<form name="form1" method="POST" action="insert_dvd.php" >
<p>Please fill in the following information:<br><br>
		<p>DVD's Title: <INPUT type="text" name="dvdname" size="50"></p>
		<p>Quantity: <INPUT type="text" name="dvdquantity" size="4"></p>
  <p><input type="submit" name="button1" value="Submit"></p>
</form>
	</body>
	</html>


<?php
// If the user is not correct level
//} else if ($_SESSION["LEVEL"] == 2) {

  //echo "<p>Wrong User Level! You are not authorized to view this page</p>";
