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
			
			<?php 
				include_once("data_base.php");
				
				if($_REQUEST['updatePageAction'] == "Update"){
					$query = "UPDATE ".$_REQUEST["table"]." SET name = \"".$_REQUEST['name']."\" , email = \"".$_REQUEST['email']."\", contact_no = \"".$_REQUEST['contact_no']."\", parent_name=\"".$_REQUEST['parent_name']."\", balance = \"".$_REQUEST['balance']."\" WHERE id = \"".$_REQUEST['id']."\"";
					mysqli_query($conn,$query);
				}
				
				$query = "SELECT * FROM ".$_REQUEST["table"]." WHERE id = \"".$_REQUEST['id']."\"";
				$result = mysqli_query($conn,$query);
				while ($rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
			?>

			<table>
				<tr><td>Name</td>			<td> : <?php echo $rows['name'] ?>			</td></tr>
				<tr><td>User Id</td>		<td> : <?php echo $rows['user_id'] ?>		</td></tr>
				<tr><td>Email Id</td>		<td> : <?php echo $rows['email'] ?>			</td></tr>
				<tr><td>Mobile No</td>		<td> : <?php echo $rows['contact_no'] ?>	</td></tr>
				<tr><td>Parent's Name</td>	<td> : <?php echo $rows['parent_name'] ?>	</td></tr>
				<tr><td>Balance</td>		<td> : <?php echo $rows['balance'] ?>		</td></tr>
			</table>

			<?php } ?>
			
			
			<br>
			<form style="float:right" action="admin_edit_profile.php" method="POST">
				<input type="hidden" name="id"    value="<?php echo $_REQUEST['id'] ?>">
				<input type="hidden" name="table" value="<?php echo $_REQUEST['table'] ?>">
				<input type="submit" name="action" value="Edit">
			</form>	
			<form style="float:right" action="admin_delete_profile.php" method="POST">
				<input type="hidden" name="id"    value="<?php echo $_REQUEST['id'] ?>">
				<input type="hidden" name="table" value="<?php echo $_REQUEST['table'] ?>">
				<input type="submit" name="action" value="Delete">
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
