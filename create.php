<html>
<body>
<b><center>CREATE USER</center></b>

<form action="" method="post">
Username: <input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>"/>
Password: <input type="text" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"/>
Full Name: <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>"/>
Email: <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"/>
Phone Number: <input type="text" name="phonenum" value="<?php echo isset($_POST['phonenum']) ? $_POST['phonenum'] : '' ?>"/>
Address: <input type="text" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>"/>
<input type="submit" name="Submit" value="Submit">
</form>

<?php
$con = mysqli_connect("localhost","root","","emplyee"); //connect to database
if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['phonenum']) && !empty($_POST['address'])){
	
//Escapes delimiters to prevent sql injection if prepared statement fails
$username = mysqli_real_escape_string($con, $_POST["username"]);
$password = mysqli_real_escape_string($con, $_POST["password"]);
$name = mysqli_real_escape_string($con, $_POST["name"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);
$phonenum = mysqli_real_escape_string($con, $_POST["phonenum"]);
$address = mysqli_real_escape_string($con, $_POST["address"]);

$error=0;

//Check if username is made up of only alphanumberic characters
if(!ctype_alnum($username))
{
  echo "Username is not a valid string. Please enter only alphanumberic characters.";
 echo "<br />\n";
  $error=1;
}

//Check phone number
if(!preg_match("/^(3|6|8|9)\d{7}$/", $phonenum)) 
		{
		    echo "Phone numbers must be 8 numbers and Start with 3 OR 6 OR 8 OR 9.";
			echo "<br />\n";
			$error=1;
		}

//Check password complexitiy
if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/", $password)) 
		{
		   echo "Password invalid. Minimum 8 characters 1 number and 1 upper case.";
		   echo "+";
		   echo "$password";
		   echo "+";
		   echo "<br />\n";
		   $error=1;
		}
if($error == 1){
	goto Area1;
}
		
if (!$con){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}


//Checks if username already exists
$query=$con->prepare("select username from emplyoee WHERE username='$username'");
$query->execute();
$query->bind_result($usernamecheck);
while($query->fetch())
{
	if(isset($usernamecheck)){
		echo "Username already exists! Please enter another username";
		goto Area1;
	}
}



$sql=$con->prepare("INSERT INTO `emplyoee`(`username`,`password`,`full_Name`,`email`,`phone_Number`,`address`) VALUES ('$username','$password','$name','$email','$phonenum','$address')");
if ($sql->execute()){  //execute query
  echo "Query executed.";
}else{
  echo "Error executing query. Invalid input given.";
}

}else{
	echo "One or several fields empty. Please fill out all fields and submit.";
}
Area1:
// Close connection
mysqli_close($con);

?>

</body>
</html>