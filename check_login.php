<style>
img{
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.check{
  border: solid white;
  border-radius: 10px;
  padding: 30px;
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: 100px;
  width:500;
  background-color: grey;
  opacity: 0.8;
}

.check h2{
  color:black;
  font-family: Arial;
  font-size: 30px;
  text-align: center;
  border: solid white;
  border-radius: 10px;
  padding: 30px;
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: auto;
  width:300;
  background-color: white;
}

.check a{
  color: white;
  text-decoration: none;
  text-align: center;
  border: solid black;
  border-radius: 10px;
  padding: 10px;
  display: flex;
  flex-direction: column;
  background-color: #5FB5D3;

}
</style>
<?php
session_start(); // Start up your PHP Session
require('config.php');//read up on php includes https://www.w3schools.com/php/php_includes.asp

// username and password sent from form
$myusername=$_POST["username"];
$mypassword=$_POST["password"];

$sql="SELECT * FROM user WHERE username='$myusername' and password='$mypassword'";

$result = mysqli_query($conn, $sql);

$rows=mysqli_fetch_assoc($result);

$user_name=$rows["username"];
$user_id=$rows["password"];
$user_level=$rows["level"];

// mysqli_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Add user information to the session (global session variables)
$_SESSION["Login"] = "YES";
$_SESSION["USER"] = $user_name;
$_SESSION["ID"] = $user_id;
$_SESSION["LEVEL"] =$user_level;

if($_SESSION["LEVEL"] ==1)
{
  $workerlevel="(Admin)";
}
else if($_SESSION["LEVEL"] ==2)
{
  $workerlevel="(Manager)";
}
else if($_SESSION["LEVEL"] ==3)
{
  $workerlevel="(Staff)";
}

echo "<img src=\"Trademark.png\" style=\"width:200px;height:200px\">";
echo "<style> body { background-image: url(\"Wallpaper.jpg\"); } </style>";
echo "<div class='check'>";
echo "<h2>Welcome ".$_SESSION["USER"]."</br>".$workerlevel."</h2>";


echo "<a href='main.php'>Enter site</a><br/><br/>";
echo "<a href='login.php'>Back to login page</a>";
echo "</div>";



//if wrong username and password
} else {

$_SESSION["Login"] = "NO";
header("Location: login.php");
}

mysqli_close($conn);

?>
