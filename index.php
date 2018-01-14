<?php
$employeecon=mysqli_connect("localhost","root","","employee");

require_once("sessionverify.php");

if(isset($_POST["insert"])){
	if($_POST["insert"]=="yes")
	{
		$username=$_POST["username"];
		$password=$_POST["password"];
		$fullname=$_POST["fullname"];
		$phonenum=$_POST["phonenum"];
		$email=$_POST["email"];
		$address=$_POST["address"];	
		$role=$_POST["role"];
		$error=0;
		
			if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['phonenum']) && !empty($_POST['address']) && !empty($_POST['password'])){
	
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
		   echo "<br />\n";
		   $error=1;
		}
if($error == 1){
	goto Area1;
}

	$hash = password_hash($hash, PASSWORD_BCRYPT, ["cost" => 11]);

		$query=$employeecon->prepare("insert into employee(username, hash, full_Name, phone_Number, email, address, role) values('$username', '$hash', '$fullname', '$phonenum', '$email', '$address', '$role');");
		if($query->execute())
		{
			echo "<center>Record Inserted!</center><br>";
			echo $hash;
		}
	}
}
}

if(isset($_POST["update"])){
	if($_POST["update"]=="yes")
	{
	$username=$_POST["username"];
	$password=$_POST["password"];
	$fullname=$_POST["fullname"];
	$phonenum=$_POST["phonenum"];
	$email=$_POST["email"];
	$address=$_POST["address"];
	$role=$_POST["role"];
	$error=0;
	
	if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['phonenum']) && !empty($_POST['address'])){
	
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
		   echo "<br />\n";
		   $error=1;
		}
if($error == 1){
	goto Area1;
}
	
	$hash = 0;
	$hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 11]);
	
	$query=$employeecon->prepare("update employee set username='$username' , hash='$hash', full_Name='$fullname', phone_Number='$phonenum', email='$email', address='$address', role='$role' where Employee_ID=".$_POST['id']);
	if($query->execute())
	{
		echo "<center>Record Updated!</center><br>";
	}
	}
}
}

if(isset($_GET['operation'])){
	if($_GET['operation']=="delete")
	{
		$query=$employeecon->prepare("delete from employee where Employee_ID=".$_GET['id']);
		if($query->execute())
		{
			echo "<center>Record Deleted!</center><br>";
		}
	}
}
?>
<html>
<body>
<b><center>CRUD</center></b>
<form method="post" action="index.php">
<table align="center" border="0">
<tr>
<td>username:</td>
<td><input type="text" name="username" /></td>
</tr>
<tr>
<td>password:</td>
<td><input type="text" name="password" /></td>
</tr>
<tr>
<td>fullname:</td>
<td><input type="text" name="fullname" /></td>
</tr>
<tr>
<td>phonenum:</td>
<td><input type="text" name="phonenum" /></td>
</tr>
<tr>
<td>email:</td>
<td><input type="text" name="email" /></td>
</tr>
<tr>
<td>address:</td>
<td><input type="text" name="address" /></td>
</tr>
<tr>
<td>role:</td>
<td><input type="text" name="role"/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="right">
<input type="hidden" name="insert" value="yes" />
<input type="submit" value="Insert Record"/>
</td>
</tr>
</table>
</form>

<?php
Area1:
// Close connection
$query=$employeecon->prepare("select employee_ID, username, hash, full_Name, phone_Number, email, address, role from employee");
$query->execute();
$query->bind_result($id, $username, $hash, $fullname, $phonenum, $email, $address, $role);
echo "<table align='center' border='1'>";
echo "<tr>";
echo "<th>Id</th>";
echo "<th>Username</th>";
echo "<th>Hash</th>";
echo "<th>Fullname</th>";
echo "<th>Phonenum</th>";
echo "<th>Email</th>";
echo "<th>Address</th>";
echo "<th>Role</th>";
echo "</tr>";
while($query->fetch())
{
	echo "<tr>";
	echo "<td>".$id."</td>";
	echo "<td>".$username."</td>";
	echo "<td>".$hash."</td>";
	echo "<td>".$fullname."</td>";
	echo "<td>".$phonenum."</td>";
	echo "<td>".$email."</td>";
	echo "<td>".$address."</td>";
	echo "<td>".$role."</td>";
	echo "<td><a href='edit.php?operation=edit&id=".$id."&username=".$username."&hash=".$hash."&fullname=".$fullname."&phonenum=".$phonenum."&email=".$email."&address=".$address."&role=".$role."'>edit</a></td>";
	echo "<td><a href='index.php?operation=delete&id=".$id."'>delete</a></td>";
	echo "</tr>";	
	
}
echo "</table>";


?>
</body>
</html>