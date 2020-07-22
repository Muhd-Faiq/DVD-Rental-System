<link rel='stylesheet' href='styles.css'/>
<?php
// Start up your PHP Session
session_start();
// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES")
header("Location: login.php");

?>


<html>
<head><title>List of DVD</title></head>

<body>

<b>Search for DVD Available</b><br/><br/>

<form name="form1" method ="POST" action="view_search_dvd.php">
<p>Search for DVD Available</p><br/><br/>
<p>Type DVD Title :<input type="text" name="dvdname" size="30"></p>
<input type="submit" name="button1" value="Search"></p>
</form>

<div class="topnav">
    <a href="main.php">Go back to main page</a>
	<a href="logout.php" style="float:right">LOGOUT</a>
	</div>
</body>
</html>
