<html>
<form method="post" action="index.php">
<table align="center" border="0">
<tr>
<td>ID:</td>
<td> <?php echo $_GET['id']; ?> </td>
</tr>
<tr>
<td>Hash:</td>
<td> <?php echo $_GET['hash']; ?> </td>
</tr>
<tr>
<td>username:</td>
<td><input type="text" name="username" value="<?php echo $_GET['username']; ?>" /></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="text" name="password"/></td>
</tr>
<tr>
<td>fullname:</td>
<td><input type="text" name="fullname" value="<?php echo $_GET['fullname']; ?>"/></td>
</tr>
<tr>
<td>phonenum:</td>
<td><input type="text" name="phonenum" value="<?php echo $_GET['phonenum']; ?>"/></td>
</tr>
<tr>
<td>email:</td>
<td><input type="text" name="email" value="<?php echo $_GET['email']; ?>"/></td>
</tr>
<tr>
<td>address:</td>
<td><input type="text" name="address" value="<?php echo $_GET['address']; ?>"/></td>
</tr>
<tr>
<td>role:</td>
<td><input type="text" name="role" value="<?php echo $_GET['role']; ?>"/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="left">
<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
<input type="hidden" name="update" value="yes" />
<input type="submit" value="update Record"/>
</td>
</tr>
</table>
</form>
<html>