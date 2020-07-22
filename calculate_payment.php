<link rel='stylesheet' href='styles.css'/>
<?php
session_start(); // Start up your PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: login.php");

?>

<html>
<head><title>Payment</title><head>
<body>

<h1>Order Details</h1>
<div class="topleft">
	<img src="Trademark.png">
</div>
<div class="topright">
	<img src="Trademark.png">
</div>

<?php
		$customerName = $_POST["customerName"];
		$customerReturnDate = $_POST["customerReturnDate"];

	     require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	     $sql = "UPDATE customer SET customer_return_date = '$customerReturnDate'	WHERE customer_name ='$customerName'";

	     if (mysqli_query($conn, $sql)) {
			;?>


			<?php
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
          //mysqli_close($conn);







     $sql = "SELECT * FROM customer WHERE customer_name='$customerName'";
     echo "<strong>Customer Name:</strong> $customerName<br><br>";
     $result = mysqli_query($conn, $sql);

     if (mysqli_num_rows($result) > 0) {

     ?>


     <table width="600" border="1" cellspacing="0" cellpadding="3">
     <tr>
 				<td align="center"><strong>Rent Date</strong></td>
 				<td align="center"><strong>Return Date</strong></td>
        <td align="center"><strong>Late Days</strong></td>
        <td align="center"><strong>Price (RM)</strong></td>
        <td align="center"><strong>Fine (RM)</strong></td>
        <td align="center"><strong>Total Price (RM)</strong></td>
     </tr>

     <?php

        // output data of each row
        while($rows = mysqli_fetch_assoc($result)) {
					$tempid2=$rows['dvdid'];
          $customer_rent_date=$rows['customer_rent_date'];
          //$diff=date_diff($customer_rent_date,$customer_return_date);
          $diff = abs(strtotime($customerReturnDate) - strtotime($customer_rent_date));
          $years = floor($diff / (365*60*60*24));
          $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
          $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

          $price="0";
          if($days>7)
          {
            $customer_late_days=$days-7;
            $fine=$customer_late_days*8;
            $price=7;
            $totalprice=$price+$fine;
          }
          else
          {
            $customer_late_days=0;
            $fine=0;
            $price=7;
            $totalprice=$price+$fine;
          }
					$temp_rent_date=$rows['customer_rent_date'];
					$temp_return_date=$rows['customer_return_date'];

     ?>



     <?php }
		 $sql="SELECT * FROM dvd WHERE dvdid='$tempid2'";
		 $result = mysqli_query($conn, $sql);
		 $rows = mysqli_fetch_assoc($result);
		 $tempquantity=$rows['dvdquantity'];
		 $temptitle=$rows['dvdname'];
		 $quantity=$tempquantity+1;
		 $sql="UPDATE dvd SET dvdquantity='$quantity' WHERE dvdid='$tempid2'";
		 $result = mysqli_query($conn, $sql);

		 echo "<strong>DVD Title:</strong> $temptitle<br><br>";

	 ?>

	 <tr>
			<td align="center"><?php echo $temp_rent_date 					?></td>
			<td align="center"><?php echo $temp_return_date 				?></td>
			<td align="center"><?php echo $customer_late_days; 				?></td>
			<td align="center"><?php echo $price; 				?></td>
			<td align="center"><?php echo $fine; 				?></td>
			<td align="center"><?php echo $totalprice; 				?></td>
	 </tr>


	 <?php
 }
   else {
     echo "ERROR";
     echo "<br><br><p><a href='main.php'>Back to main page</a></p>";
   }

   ?>
<div class="topnav">
<a href='main.php'>Back to main page</a></p>
</div>
