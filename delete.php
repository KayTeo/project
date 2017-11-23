<html>
<body>
<b><center>DELETE USER</center></b>

<form action="" method="post">
User to delete (ID): <input type="text" name="UID" />
<input type="submit" name="Submit" value="Submit">
</form>

<?php
$con = mysqli_connect("localhost","root","","emplyee"); //connect to database
if (isset($_POST['UID'])){
$UID = $_POST["UID"];


if (!$con){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

$sql=$con->prepare("DELETE FROM `emplyoee` WHERE employee_id='$UID'");
if ($sql->execute()){  //execute query
  echo "Query executed.";
}else{
  echo "Error executing query.";
}
}
 
// Close connection
mysqli_close($con);

?>

</body>
</html>