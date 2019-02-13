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
  <li style="background-color:#bdbdbd"><a href="admin_home.php">Home</a></li>
  <li><a href="admin_addUser.php">Add User</a></li>
  <li><a href="admin_addParent">Add Parent</a></li>
  <li><a href="admin_addProvider">Add Provider</a></li>
  <li><a href="admin_editProfile">Edit Admin Profile</a></li> 
  <li style="float:right"><a href="index.php">Logout</a></li>
</ul>


<?php

	include_once("data_base.php");

	if($_REQUEST['deletePageAction'] == "Confirm"){
		$query = "DELETE FROM ".$_REQUEST["table"]." WHERE id = \"".$_REQUEST['id']."\"";
		mysqli_query($conn,$query);
	}
				
?>

<!--- Search Panel  :Home --->
<?php if(!isset($_REQUEST['searchButton'])): ?>
	<div class="searchPanel">
		<div id="login">
			<form action="admin_home.php" method="POST">
				<fieldset>
					<legend><font color="white">Search Panel</legend>
					
					<p><input type="text"  name="searchContent" required placeholder="User Id / Name / Email / Mobile"></p>
					<p>
						<table>
							<tr>
								<td><input required type="radio" name="user" value="user">User &nbsp;&nbsp;</td>
								<td><input required type="radio" name="user" value="utility">Utlities&nbsp;&nbsp;</td>
								<td><input required type="radio" name="user" value="provider">Service Provider&nbsp;&nbsp;</td>
							</tr>
						</table>
					</p><br>
					<p><input class="button" type="reset" value="Reset"><input name="searchButton" class="button" type="submit" value="Search"></p>
					
					<p><center><br><font color="red"><?php echo @$_SESSION["searchError"] ?></font></center></p>
					
				</fieldset>
			</form>
		</div>
	</div>
<?php else: ?>
	
		<center>
		<fieldset style="width:90%!important; margin:20px;">
			<legend><font color="white">Search Panel</font></legend>
			
			<table style="width:100%!important"  border=1 frame=void rules=rows>
			<tr><td><b>Slno</td><td width="15%"><b>Name</td><td><b>User Id</td><td width="15%"><b>Email</td><td><b>Mobile</td><td><b>Balance</td><td><b>Action</td></tr>
			
			
		<?php 
		
			$table = "user";
		
			$query = "SELECT * FROM ".$table." WHERE contact_no LIKE \"%".$_REQUEST['searchContent']."%\" OR  name LIKE \"%".$_REQUEST['searchContent']."%\" OR  user_id LIKE \"%".$_REQUEST['searchContent']."%\" OR email LIKE \"%".$_REQUEST['searchContent']."%\"";
			$result = mysqli_query($conn,$query);
			
			$count = 1;
			while ($rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
		?>

			<tr>
				<td><?php echo $count++ ?></td>
				<td><?php echo $rows['name'] ?></td>
				<td><?php echo $rows['user_id'] ?></td>
				<td><?php echo $rows['email'] ?></td>
				<td><?php echo $rows['contact_no'] ?></td>
				<td><?php echo $rows['balance'] ?></td>
				<td>
				<table>
					<tr>
						<td>
							<form action="admin_selected_profile.php" method="POST">
								<input type="hidden" name="id"    value="<?php echo $rows['id'] ?>">
								<input type="hidden" name="table" value="<?php echo $table ?>">
								<button>View</button>
							</form>
						</td>
						<td>
							<form action="admin_edit_profile.php" method="POST">
								<input type="hidden" name="id"    value="<?php echo $rows['id'] ?>">
								<input type="hidden" name="table" value="<?php echo $table ?>">
								<button>Modify</button>
							</form>
						</td>
						<td>
							<form action="admin_delete_profile.php" method="POST">
								<input type="hidden" name="id"    value="<?php echo $rows['id'] ?>">
								<input type="hidden" name="table" value="<?php echo $table ?>">
								<button>Delete</button>
							</form>
						</td>
					</tr>
				</table>
				</td>
			</tr>
		
		<?php } ?>	
			
			</table>
			
			
		</fieldset>
		</center>
	
<?php endif; ?>





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
