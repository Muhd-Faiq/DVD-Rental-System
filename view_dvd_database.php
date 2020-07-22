<link rel='stylesheet' href='styles.css'/>
<?php
session_start(); // Start up your PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: login.php");

if ($_SESSION["LEVEL"] == 1 || $_SESSION["LEVEL"] == 2) {   //only user with access level 1 and 2 can view

?>

	<html>
	<head><title>Viewing DVD Data</title><head>
	<body>

	<h1>View DVD Details</h1>
	<div class="topleft">
		<img src="Trademark.png">
	</div>
	<div class="topright">
		<img src="Trademark.png">
	</div>

		<?php
	     require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	     $sql = "SELECT * FROM dvd";
		 $result = mysqli_query($conn, $sql);

		 if (mysqli_num_rows($result) > 0) { 	?>

		<!-- Start table tag -->
		<table width="600" border="1" cellspacing="0" cellpadding="3">

		<!-- Print table heading -->
		<tr>
		<td align="center"><strong>ID</strong></td>
		<td align="center"><strong>Name</strong></td>
		<td align="center"><strong>Quantity</strong></td>

		<?php if ($_SESSION["LEVEL"] == 1 || $_SESSION["LEVEL"] == 2) {?>
		<td align="center"><strong>Update</strong></td>
		<td align="center"><strong>Delete</strong></td>
		<?php } ?>

		</tr>

		<?php
			// output data of each row
			while($rows = mysqli_fetch_assoc($result)) {
		?>

	     <tr>
			<td><?php echo $rows['dvdid']; ?></td>
			<td><?php echo $rows['dvdname']; ?></td>
			<td><?php echo $rows['dvdquantity']; ?></td>

		<?php if ($_SESSION["LEVEL"] == 1 || $_SESSION["LEVEL"] == 2) {?>
			<!--only user with access level 1 can view update and delete button-->
			<td align="center"> <a href="update_form_dvd.php?id=<?php echo $rows['dvdid']; ?>">update</a> </td>
			<td align="center"> <a href="delete_dvd.php?id=<?php echo $rows['dvdid']; ?>">delete</a> </td>
		</tr>

		<?php }

			}
		} else {
			echo "<h3>There are no records to show</h3>";
			}

	     mysqli_close($conn);
	   ?>

	    </table>


			<div class="topnav">
			<a href="dvd_form.php">Click here to insert dvd list</a>

		<a href='main.php'>Back to main page</a>
	    <a href="logout.php" style="float:right">LOG OUT</a>
		</div>

 	<?php } // If the user is not correct level
	else if ($_SESSION["LEVEL"] != 1 || $_SESSION["LEVEL"] != 2) {

	echo "<p>Wrong User Level! You are not authorized to view this page</p>";

	echo "<p><a href='main.php'>Back to main page</a></p>";

	echo "<p><a href='logout.php'>LOGOUT</a></p>";

   }

  ?>
	</body>
	</html>
