<link rel='stylesheet' href='styles.css'/>
<?php
session_start(); // Start up your PHP Session

echo $_SESSION["Login"]; //for session tracking purpose, can delete
echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: index.php");   //send user to login page

if ($_SESSION["LEVEL"] == 1) { 	//only user level 1 can access

?>
	<html>
	<head><title>Updating User Data</title><head>
	<body>

	<h1>Update User Data Form</h1>
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
		 $sql="SELECT * FROM user WHERE id='$ID'";
		 $result = mysqli_query($conn, $sql);
		 $rows=mysqli_fetch_assoc($result);

?>


<form name="form1" method="post" action="update_user.php">
<table border="0" cellspacing="5" cellpadding="0">

<tr>
<td align="center">&nbsp;</td>
<td align="center"><strong>Username</strong></td>
<td align="center"><strong>Password</strong></td>
<td align="center"><strong>Level</strong></td>
<td align="center">&nbsp;</td>
</tr>

<tr>
<td align="center"><input name="id" type="hidden" id="id" value="<?php echo $rows['id']; ?>"></td>
<td align="center"><input name="userName" type="text" id="userName" size="20" value="<?php echo $rows['username']; ?>"></td>
<td align="center"><input name="userPassword" type="text" id="userPassword" size="15" value="<?php echo $rows['password']; ?>"></td>
<td align="center"><input name="userLevel" type="text" id="userLevel"  size="1" value="<?php echo $rows['level']; ?>"></td>
<td align="center"><input type="submit" name="Submit" value="Update"></td>
</tr>

</table>

</form>

</body>
</html>

<?php

	     mysqli_close($conn);

// If the user is not correct level
} else if ($_SESSION["LEVEL"] != 1) {

  echo "<p>Wrong User Level! You are not authorized to view this page</p>";

  echo "<p><a href='main.php'>Go back to main page</a></p>";

  echo "<p><a href='logout.php'>LOGOUT</a></p>";
  }

?>
