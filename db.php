<?php
$mysqli = mysqli_connect("localhost","root","","employee"); //connect to database
if (!$mysqli){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}