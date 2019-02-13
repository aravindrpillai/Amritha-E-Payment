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
  <li style="background-color:#bdbdbd"><a href="admin_addUser.php">Add User</a></li>
  <li><a href="admin_addParent">Add Parent</a></li>
  <li><a href="admin_addProvider">Add Provider</a></li>
  <li><a href="admin_editProfile">Edit Admin Profile</a></li> 
  <li style="float:right"><a href="index.php">Logout</a></li>
</ul>



<!--- Add User --->
<div class="addNewUserPanel">

	<div id="login">
	
		<div class="notifications">
			<center><b><?php echo @$_SESSION["addUserError"] ?></b></center>
		</div>	
		
		<form action="admin_addUser_backEnd.php" method="POST">
			<fieldset>
				<legend><font color="white">Add New User</legend>
				
				<p><input type="text" name="name" 	     required placeholder="Name">					</p>
				<p><input type="text" name="userId"  	 required placeholder="Roll Number / User Id">	</p>
				<p><input type="text" name="email" 	  	 required placeholder="Email">					</p>
				<p><input type="text" name="parentName"  required placeholder="Parent Name">			</p>
				<p><input type="text" name="mobile" 	 required placeholder="Mobile Number">			</p>
				<p><input type="text" name="balance" 	 required placeholder="Balance">				</p>
				
				<br>
				<p><input class="button" type="reset" value="Reset"><input onClick="addUser()" class="button" type="submit" value="Submit" ></p>
				
				
			</fieldset>
		</form>
	</div>
</div>

<?php include_once("footer.php") ?> 

<?php
	session_unset();
	session_destroy(); 
?>

</body>
</html>


