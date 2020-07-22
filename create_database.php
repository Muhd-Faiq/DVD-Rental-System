

<?php

$servername = 'localhost';
$username = 'root';
$password = '';

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
  die(mysqli_connect_error());
}

$sql = "CREATE DATABASE webprogrammingdatabase";
if (mysqli_query($conn, $sql)) {

} else {
  mysqli_error($conn);
}



require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp


$sql = "CREATE TABLE user
        (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 		username varchar(100),
 		password varchar(12),
		level int(3)
        )";

if (mysqli_query($conn, $sql)) {
  echo "<h3>Table user created successfully</h3>";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<?php

require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp


$sql = "CREATE TABLE dvd
        (
    dvdid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 		dvdname varchar(100),
    dvdquantity INT(4)
        )";

if (mysqli_query($conn, $sql)) {
  echo "<h3>Table dvd created successfully</h3>";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>


<?php

require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp


$sql = "CREATE TABLE customer(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 		customer_name VARCHAR(100) NOT NULL,
 		customer_contactnum VARCHAR(12) NOT NULL,
		customer_rent_date DATE NOT NULL,
		customer_return_date DATE,
		dvdid INT(6) UNSIGNED,
		FOREIGN KEY (dvdid) REFERENCES dvd(dvdid))";

if (mysqli_query($conn, $sql)) {
  echo "<h3>Table customer created successfully</h3>";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<?php

require ("config.php");

$sql = "INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(3, 'user_3', 'password_3', 3),
(7, 'user_1', 'password_1', 1),
(8, 'user_2', 'password_2', 2)";

if (mysqli_multi_query($conn, $sql)) {
  echo "<h3>New records for user created successfully</h3>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>

<?php

require ("config.php");

$sql = "INSERT INTO `dvd` (`dvdid`, `dvdname`, `dvdquantity`) VALUES
(2, 'Avengers The Endgame', 7),
(3, 'Cinderella The Movie', 6),
(4, 'Rapunzel The Movie', 6),
(5, 'Snow White The Movie', 8),
(6, 'Superman The Movie', 9),
(7, 'Batman The Movie', 10),
(8, 'Batman The Dark Knight', 10),
(9, 'Batman The Dark Knight Rises', 9),
(10, 'Superman Return The Movie', 0)";

if (mysqli_multi_query($conn, $sql)) {
  echo "<h3>New records for dvd created successfully</h3>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>

<?php

require ("config.php");

$sql = "INSERT INTO `customer` (`id`, `customer_name`, `customer_contactnum`, `customer_rent_date`, `customer_return_date`, `dvdid`) VALUES
(1, 'Muhammad Aniq Asyraaf Bin Zainal Abidin', '01112345678', '2020-07-01', '2020-07-07', 7),
(3, 'Muhammad Danial Hakimi Bin Habibullah', '01111223344', '2020-06-29', '0000-00-00', 3),
(4, 'Muhammad Afiq Bin Zaidin', '01111122456', '2020-06-29', '2020-07-06', 2),
(5, 'Muhammad Amir Syafiq', '01919283747', '2020-06-27', '0000-00-00', 4),
(6, 'Muhammad Kamil', '01114561234', '2020-06-28', '0000-00-00', 4),
(9, 'Muhammad burhanuddin', '01927364537', '2020-06-26', '2020-07-07', 8)";

if (mysqli_multi_query($conn, $sql)) {
  echo "<h3>New records for customer created successfully</h3>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
