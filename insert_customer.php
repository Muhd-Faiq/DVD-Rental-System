<link rel='stylesheet' href='styles.css'/>
<?php
session_start(); // Start up your PHP Session

// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES")
header("Location: login.php");




	     $customerName = $_POST["customerName"];
	     $customerContactnum = $_POST["customerContactnum"];
			 $customerRentDate = $_POST["customerRentDate"];
			 $dvdid = $_POST["dvdid"];

		 require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	     $sql = "INSERT INTO customer(customer_name,customer_contactnum,customer_rent_date,customer_return_date,dvdid)
			 VALUES ('$customerName','$customerContactnum', '$customerRentDate',' ','$dvdid')" ;

		 if (mysqli_query($conn, $sql)) {
			echo "<h3>New record created successfully</h3>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}


	     mysqli_close($conn);
			 require ("config.php");
			 $sql="SELECT * FROM dvd WHERE dvdid='$dvdid'";
			 $result = mysqli_query($conn, $sql);
			 $rows = mysqli_fetch_assoc($result);
			 $tempquantity=$rows['dvdquantity'];
			 $quantity=$tempquantity-1;
			 $sql="UPDATE dvd SET dvdquantity='$quantity' WHERE dvdid='$dvdid'";
			 $result = mysqli_query($conn, $sql);

		if ($_SESSION["LEVEL"] == 1 || $_SESSION["LEVEL"] == 2) {
			echo "<div class='topnav'>";
		 echo "<p><a href='menu_choose_dvd.php'>Click here to insert again</a></p>";
		 echo "<p><a href='view_customer_database.php'>Click here to view updated list</a></p>";
		 echo "<p><a href='main.php'>Go back to main page</a></p>";
		 echo "<p><a href='logout.php'>LOGOUT</a></p>";
		 echo "</div>";
// If the user is not correct level
} else if ($_SESSION["LEVEL"] != 1 || $_SESSION["LEVEL"] != 2) {


echo "<p><a href='customer_form.php'>Click here to insert again</a></p>";
  echo "<p><a href='main.php'>Go back to main page</a></p>";

  echo "<p><a href='logout.php'>LOGOUT</a></p>";

   }

  ?>
