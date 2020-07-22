<link rel='stylesheet' href='styles.css'/>
<?php
session_start(); // Start up your PHP Session


if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: login.php");

if ($_SESSION["LEVEL"] == 1 || $_SESSION["LEVEL"] == 2) {   //only user with access level 1 and 2 can view

?>

	<html>
	<head><title>Viewing Customer Data</title><head>
	<body>
		<h1>Customer Details</h1>
		<div class="topleft">
			<img src="Trademark.png">
		</div>
		<div class="topright">
			<img src="Trademark.png">
		</div>
		<?php
	     require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	     $sql = "SELECT * FROM customer";
		 $result = mysqli_query($conn, $sql);

		 if (mysqli_num_rows($result) > 0) { 																			?>

		<!-- Start table tag -->
		<table width="1000" border="1" cellspacing="0" cellpadding="10" style="color:white">

		<!-- Print table heading -->
		<tr>
				<td align="center"><strong>Customer's Name</strong></td>
				<td align="center"><strong>Contact Number</strong></td>
				<td align="center"><strong>Rent Date</strong></td>
				<td align="center"><strong>Return Date</strong></td>
				<td align="center"><strong>DVD Rent</strong></td>


				<?php if ($_SESSION["LEVEL"] == 1 || $_SESSION["LEVEL"] == 2) {						?>
						<td align="center"><strong>Update</strong></td>
						<td align="center"><strong>Delete</strong></td>
				<?php } ?>
		</tr>

		<?php
			// output data of each row
			while($rows = mysqli_fetch_assoc($result)) {
				$tempid=$rows['dvdid'];
				$sql2 = "SELECT dvdname FROM dvd WHERE dvdid='$tempid'";
 		 		$result2 = mysqli_query($conn, $sql2);
				$rows2 = mysqli_fetch_assoc($result2);

		?>

	     <tr>
		 			<td align="center"><?php echo $rows['customer_name']; 							?></td>
					<td align="center"><?php echo $rows['customer_contactnum']; 				?></td>
					<td align="center"><?php echo $rows['customer_rent_date']; 					?></td>
					<td align="center"><?php echo $rows['customer_return_date']; 				?></td>
					<td align="center"><?php echo $rows2['dvdname']; 										?></td>


		<?php if ($_SESSION["LEVEL"] == 1 || $_SESSION["LEVEL"] == 2) {?>
			<!--only user with access level 1 can view update and delete button-->
			<td align="center"> <a href="update_form_customer.php?id=<?php echo $rows['id']; ?>">update</a> </td>
			<td align="center"> <a href="delete_customer.php?id=<?php echo $rows['id']; ?>">delete</a> </td>
		</tr>
		<?php }

			}
		} else {
			echo "<h3>There are no records to show</h3>";
			}

	     mysqli_close($conn);
	   ?>

	    </table>

		<?php if ($_SESSION["LEVEL"] == 1  || $_SESSION["LEVEL"] == 2) {					?>
		<div class="topnav">
		<a href="menu_choose_dvd.php">Insert customer</a><?php } 			?>
		<a href='main.php'>Back to main page</a>
	   <a href="logout.php" style="float:right">LOG OUT</a>
	 </div>

 	<?php } // If the user is not correct level
	else if ($_SESSION["LEVEL"] == 3) {

	echo "<p>Wrong User Level! You are not authorized to view this page</p>";

	echo "<p><a href='main.php'>Back to main page</a></p>";

	echo "<p><a href='logout.php'>LOGOUT</a></p>";

   }  																																				?>
	</body>
	</html>
