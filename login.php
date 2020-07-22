<html>
<head><title>Login</title></head>
<style>
* {
  box-sizing: border-box;
}
body {
  font-family: Arial;
  padding: 10px;
  background-image: url("Wallpaper.jpg");
}
img{
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  display: block;
  margin-left: auto;
  margin-right: auto;
}

.Login{
  text-align: center;
  border: solid white;
  border-radius: 10px;
  padding: 30px;
  padding-right: 150px;
  width:500;
  background-color: grey;
  opacity:0.8;
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: 100px;
}

.Login p1{
  padding-left: 60px;
}
</style>
<body>
<img src="Trademark.png" style="width:200px;height:200px">


  <form method="post" action="check_login.php">
<div class="Login">
  <p>Username: <input type="text" name="username" /></p>
  <p>Password: <input type="password" name="password" /></p>
  <p1><input type="submit" value="Let me in" /></p1>
</div>
  </form>

</body>
</html>
