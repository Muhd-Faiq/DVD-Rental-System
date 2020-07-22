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

				 <form name="form1" method ="POST" action="menu_choose_dvd_2.php">
				 <p1>Search for DVD Available</p1><br/><br/>
				 <p1>DVD Title :</p1>
				 <p1><input type="text" name="dvdname" size="30"></p1>
				 <p1><input type="submit" name="button1" value="Search"></p1>
				 </form>>


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

					 $find=$_POST['dvdname'];

					 $sql = "SELECT * FROM dvd WHERE dvdname LIKE '%$find%' AND dvdquantity > 0"; //using LIKE operator https://www.w3schools.com/sql/sql_like.asp

					 $result = mysqli_query($conn, $sql);

			 	 if (mysqli_num_rows($result) > 0) { 	?>

			 	<!-- Start table tag -->
			 	<table width="600" border="1" cellspacing="0" cellpadding="3">

			 	<!-- Print table heading -->
			 	<tr>
			 	<td align="center"><strong>Name</strong></td>


			 	<td align="center"><strong>Rent</strong></td>
			 	</tr>

			 	<?php
			 		// output data of each row
			 		while($rows = mysqli_fetch_assoc($result)) {
			 	?>

			 		 <tr>
			 		<td><?php echo $rows['dvdname']; ?></td>



			 		<td align="center"> <a href="customer_form.php?dvdid=<?php echo $rows['dvdid']; ?>">rent</a> </td>
			 	</tr>

			 	<?php

			 		}
			 	} else {
			 		echo "<h3>There are no records to show</h3>";
			 		}

			 		 mysqli_close($conn);
			 	 ?>

			 		</table>



					<div class="topnav">
					    <a href="main.php">Go back to main page</a>
						  <a href="logout.php" style="float:right">LOG OUT</a><br/><br/>
						</div>
			 </body>
			 </html>
