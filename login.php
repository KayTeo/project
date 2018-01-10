<?php
require 'db.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/">
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (isset($_POST['login']))
	{
		require 'loginValidate.php';
	}
}
?>

<body>
<form action="login.php" method="post" autocomplete="off">

<label>Username: </label>
<input type="username" name="username" autocomplete="off">
<br><br>

<label>Password: </label>
<input type="password" name="password" placeholder="At least 8 characters" autocomplete="off">
<br><br>

<div class="g-recaptcha" data-sitekey="6Ld0HD8UAAAAAMxiWj583ViTCadVeXo5pP5GU4Vx"></div>

<input type="submit" name="login" value="Log In">

</form>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>