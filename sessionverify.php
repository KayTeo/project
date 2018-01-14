<html>
<?php
$con=mysqli_connect("localhost","root","","employee");		
session_start();
if(isset($_SESSION['username'])){
$result=$con->query("SELECT * from employee WHERE username='$username'");
$user=$result->fetch_assoc();
	if ( $_SESSION['hash'] != $user['hash']){
		$_SESSION['message']="Access denied. Invalid credentials";
		header("location:error.php");
	}
}
else{
	$_SESSION['message']="Access denied. Please login first.";
	header("location: error.php");
}
#$_SESSION['captchaid'];
#$_SESSION
?>
</html>