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
	<form action="admin_selected_profile.php" method="POST">
		<fieldset>
			<legend><font color="white">Profile</legend>
			
			<?php 
				include_once("data_base.php");
				$query = "SELECT * FROM ".$_REQUEST["table"]." WHERE id = \"".$_REQUEST['id']."\"";
				$result = mysqli_query($conn,$query);
				while ($rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
			?>

			<table>
				<tr><td>Name</td>			<td> : <input type="text" name="name" required value="<?php echo $rows['name'] ?>"> 			</td></tr>
				<tr><td>User Id</td>		<td> : <input type="text" disabled required value="<?php echo $rows['user_id'] ?>">	</td></tr>
				<tr><td>Email Id</td>		<td> : <input type="text" name="email" required value="<?php echo $rows['email'] ?>">			</td></tr>
				<tr><td>Mobile No</td>		<td> : <input type="text"  name="contact_no" required value="<?php echo $rows['contact_no'] ?>">		</td></tr>
				<tr><td>Parent's Name</td>	<td> : <input type="text" required name="parent_name" value="<?php echo $rows['parent_name'] ?>">		</td></tr>
				<tr><td>Balance</td>		<td> : <input type="text" required name="balance" value="<?php echo $rows['balance'] ?>">			</td></tr>
			</table>

			<?php } ?>
			
			
			<br>
			<input type="hidden" name="id"    value="<?php echo $_REQUEST['id'] ?>">
			<input type="hidden" name="table" value="<?php echo $_REQUEST['table'] ?>">
			<input type="reset" value="Reset">
			<input style="float:right" type="submit" name="updatePageAction" value="Update">
			
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


<style>
td{
	color:white;
	padding-top:15px;
	padding-bottom:15px;
}
</style>
