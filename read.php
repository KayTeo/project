<html>
<body>
<b><center>READ USER DATA</center></b>
<form action="" method="post">
User to read (ID): <input type="text" name="UID" />
<input type="submit" name="Submit" value="Submit">
</form>

<?php
$con = mysqli_connect("localhost","root","","user"); //connect to database
if (isset($_POST['UID'])){
$UID = $_POST["UID"];

#Prevents SQLi by ensuring passed in input is only numeric characterz
if(is_numeric($UID)){
}else{
	echo "Invalid input given. Please enter an integer.";
	goto Area1;
}
$con = mysqli_connect("localhost","root","","user"); //connect to database
if (!$con){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

$query=$con->prepare("select * from `customer` WHERE customer_ID=$UID");
$query->execute();
$query->bind_result($uid, $username, $password, $email, $phonenum, $address);
echo "<table align='center' border='1'>";
echo "<tr>";
echo "<th>User ID</th>";
echo "<th>Username</th>";
echo "<th>Password</th>";
echo "<th>Email</th>";
echo "<th>Phone Number</th>";
echo "<th>Address</th>";
echo "</tr>";
while($query->fetch())
{
	if(empty($username)){
	echo "User ID does not exist!";
	goto Area1;
	}
	echo "<tr>";
	echo "<td>".$uid."</td>";
	echo "<td>".$username."</td>";
	echo "<td>".$password."</td>";
	echo "<td>".$email."</td>";
	echo "<td>".$phonenum."</td>";
	echo "<td>".$address."</td>";
	echo "</tr>";	
}
echo "</table>";
}
Area1:
?>
</body>
</html>