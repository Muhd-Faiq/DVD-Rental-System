<link rel='stylesheet' href='styles.css'/>
<?php
session_start(); // Start up your PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: login.php");

?>

<html>
	<head><title>DVD List </title><HEAD>
	<body>

	  <?php
	     require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

		 //$find=$_POST['dvdname'];

	     $sql = "SELECT * FROM dvd ORDER BY dvdquantity DESC";

		 $result = mysqli_query($conn, $sql);

		 if (mysqli_num_rows($result) > 0) {

			?>

		<!-- Start table -->
		<h3>Sorting from most to least quantity</h3>
		<table width="600" border="1" cellspacing="0" cellpadding="3">

		<!-- Print table heading -->
		<tr>
		<td align="center"><strong>ID</strong></td>
		<td align="center"><strong>Title</strong></td>
		<td align="center"><strong>Quantity</strong></td>
	 	</tr>


		<?php
		// output data of each row
		 while($rows = mysqli_fetch_assoc($result)) {

	       echo "<TR align=center>\n";
	       echo "<TD align=center>", $rows["dvdid"], "</TD>",
							"<TD align=center>",  $rows["dvdname"],"</TD>",
	            "<TD align=center>", $rows["dvdquantity"], "</TD>\n";
	       echo "</TR>\n";
	     } ?>


		</table>

		<?php
	   		}
			else {
				echo "<h3>No records found</h3>"; }

	     mysqli_close($conn);
	   ?>

<?php
	if ($_SESSION["LEVEL"] == 1) {?>
	<div class="topnav">
	<a href="dvd_form.php">Click here to insert more dvd</a><?php } ?>
<div class="topnav">
	<a href="menu_search_sort.php">Search & Sort DVD available</a>

	<a href="main.php">Go back to main page</a>

	<a href="logout.php" style="float:right">LOG OUT</a>
</div>
