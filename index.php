<!DOCTYPE html>
<html>

<head>
	<title>Amritha | E-Cash</title>
	<link rel="stylesheet" href="css/login.css" type="text/css">
	<link rel="stylesheet" href="css/ecash.css" type="text/css">
	<?php @session_start(); ?>
</head>

<body>

<?php include_once("header.php") ?> 

<div id="login">
<form action="validate_login.php" method="POST">
	<fieldset>
		<legend><font color="white">Amritha Login</legend>
		
		<p><input type="text"     name="username" required placeholder="Username"></p>
		<p><input type="password" name="password" required placeholder="Password" ></p>
		<p>
			<table>
			<tr>
			<td><input required type="radio" name="user" value="user">User &nbsp;&nbsp;</td>
			<td><input required type="radio" name="user" value="parent">Parent&nbsp;&nbsp;</td>
			<td><input required type="radio" name="user" value="provider">Service Provider&nbsp;&nbsp;</td>
			<td><input required type="radio" name="user" value="admin">Administrator</td>
			</table>
		</p><br>
		<p><input class="button" type="reset" value="Reset"><input name="submitButton" class="button" type="submit" value="Login"></p>
		
		<p><center><br><font color="red"><?php echo @$_SESSION["error"] ?></font></center></p>
		
	</fieldset>
</form>
</div>



<?php include_once("footer.php") ?> 



<?php
	session_unset();
	session_destroy(); 
?>

</body>


</html>