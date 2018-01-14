<html>

<?php
$con=mysqli_connect("localhost","root","","main");
$con2=mysqli_connect("localhost","root","","main");

?>

<body>
<b><center>Search</center></b>
<form method="post" action="search.php">
<table align="center" border="0">
<tr>
<td><input type="text" name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/></td>
<td align="right">
<input type="submit" value="Search"/>
</tr>
</td>
</table>
</form>

<?php


//Get username from retails_ID


echo "<table align='center' border='1'>";
echo "<tr>";
echo "<th>Name</th>";
echo "<th>Description</th>";
echo "<th>Price</th>";
echo "<th>Retailer</th>";
echo "<th>Stock</th>";
echo "<th>Image</th>";
echo "</tr>";

if(isset($_POST['keyword'])){
	$keyword=$_POST['keyword'];
}
else{
	$keyword = '';
}

$query="SELECT * FROM `retail_items` INNER JOIN `retailers` ON retail_items.retails_ID=retailers.retails_ID WHERE item_Name LIKE '%$keyword%'";
$result=$con->query($query);

if($result->num_rows > 0){
while( $row=$result->fetch_assoc())
{
	echo "<tr>";
	echo "<td>".$row['item_Name']."</td>";
	echo "<td>".$row['item_Description']."</td>";
	echo "<td>".$row['item_Cost']."</td>";
	echo "<td>".$row['username']."</td>";
	echo "<td>".$row['stock']."</td>";
	echo '<td> <img height="300" width="300" src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '" /> </td>';
	echo "</tr>";	
	
}

echo "</table>";
}
else{
	echo "No results found.";
}

?>
</html>