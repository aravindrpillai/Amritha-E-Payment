<!DOCTYPE html>
<html>

<head>
	<title>Amritha | Admin</title>
	<link rel="stylesheet" href="css/login.css" type="text/css">
	<link rel="stylesheet" href="css/ecash.css" type="text/css">
	<link rel="stylesheet" href="css/dropdown.css" type="text/css">
	<?php @session_start(); ?>
</head>

<body>

<?php include_once("header.php") ?> 





<ul>
  <li><a href="admin_home.php">Home</a></li>
  <li><a href="admin_addUser.php">Add User</a></li>
  <li><a href="admin_addParent">Add Parent</a></li>
  <li><a href="admin_addProvider">Add Provider</a></li>
  <li><a href="admin_editProfile">Edit Admin Profile</a></li> 
  <li style="float:right"><a href="index.php">Logout</a></li>
</ul>



<!--- Search Panel  :Home --->	
<div id="login">
		<fieldset>
			<legend><font color="white">Profile</legend>
			
			<center>
				<b>Are Your sure ? </b>
			</center>
			
			<br>
			<form style="float:right" action="admin_home.php" method="POST">
				<input type="hidden" name="id"    value="<?php echo $_REQUEST['id'] ?>">
				<input type="hidden" name="table" value="<?php echo $_REQUEST['table'] ?>">
				<input type="submit" name="deletePageAction" value="Confirm">
			</form>	
			<form style="float:right" action="admin_selected_profile.php" method="POST">
				<input type="hidden" name="id"    value="<?php echo $_REQUEST['id'] ?>">
				<input type="hidden" name="table" value="<?php echo $_REQUEST['table'] ?>">
				<input type="submit" name="deletePageAction" value="Cancell">
			</form>
			
		</fieldset>
</div>



<?php include_once("footer.php") ?> 

<?php
	session_unset();
	session_destroy(); 
?>

</body>
</html>


<style>
td{
	color:white;
	padding-top:15px;
	padding-bottom:15px;
}
</style>
