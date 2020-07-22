<link rel='stylesheet' href='styles.css'/>
<?php
session_start(); // Start up your PHP Session


// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES")
header("Location: login.php");

if ($_SESSION["LEVEL"] == 1) {

?>


<html>
<head><title>Inserting User Data</title></HEAD>
<body>


<h1>User Data Form</h1>
<div class="topleft">
	<img src="Trademark.png">
</div>
<div class="topright">
	<img src="Trademark.png">
</div>

<form name="form1" method="POST" action="insert_user.php" >
	<p>Please fill in the following information:<br></p>
	<p>Username:<INPUT type="text" name="userName" size="20"></p>
  <p>Password:<INPUT type="text" name="userPassword" size="15"></p>
	<p>Level: <input type="" name="userLevel" size="1"></p>
	<p><input type="submit" name="button1" value="Submit"></p>
</form>
<div class="topnav">
<a href='main.php'>Back to main page</a>
	<a href="logout.php" style="float:right">LOG OUT</a>
</div>
	</body>
	</html>


<?php
// If the user is not correct level
} else if ($_SESSION["LEVEL"] !=1) {

  //echo "<p>Wrong User Level! You are not authorized to view this page</p>";

  echo "<p><a href='main.php'>Go back to main page</a></p>";

  echo "<p><a href='logout.php'>LOGOUT</a></p>";
}
