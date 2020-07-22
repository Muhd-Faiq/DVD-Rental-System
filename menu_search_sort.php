<link rel='stylesheet' href='styles.css'/><?php
session_start(); // Start up your PHP Session


if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: login.php");

?>


<html>
  <head>

    <title></title>
  </head>
  <body>
    <h1>Search & Sort Menu</h1>
    <div class="topleft">
  		<img src="Trademark.png">
  	</div>
  	<div class="topright">
  		<img src="Trademark.png">
  	</div>
    <div class="topnav">
    <a href="main.php">Go back to main page</a>
    <a href="search_form_dvd.php">Click here to search by title</a>
    <a href="sort_least_to_most.php">Click here to sort by quantity from least to most</a>
    <a href="sort_most_to_least.php">Click here to sort by quantity from most to least</a>
    <a href="logout.php" style="float:right">LOG OUT</a><br/><br/>
    </div>
    <div class="belowleft">
			<img src="pray.jpg" style="width:500px;height:500px;">
		</div>
		<div class="belowright">
		<img src="step.jfif" style="width:900px;height:500px;">
		</div>
  </body>
</html>
