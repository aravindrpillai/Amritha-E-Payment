<?php

$name 		= $_REQUEST['name'];
$userId 	= $_REQUEST['userId'];
$email 		= $_REQUEST['email'];
$parentName = $_REQUEST['parentName'];
$mobile 	= $_REQUEST['mobile'];
$balance 	= $_REQUEST['balance'];


@session_start();
$_SESSION["addUserError"] = "";

	
	require_once("data_base.php");	
		
	$error = 0;
	if(mysqli_num_rows(mysqli_query($conn,"SELECT id FROM user WHERE user_id = \"".$userId."\"")) > 0) 
	{ 
		$_SESSION["addUserError"] .= "<font color=\"red\"> * User Id Already Exists </font><br>";	
		$error++; 
	}
	
	if(mysqli_num_rows(mysqli_query($conn,"SELECT id FROM user WHERE email = \"".$email."\"")) > 0) 
	{ 
		$_SESSION["addUserError"] .= "<font color=\"red\"> * Email Id Already Exists </font><br>";	
		$error++; 
	}	
	
	if(mysqli_num_rows(mysqli_query($conn,"SELECT id FROM user WHERE contact_no = \"".$contact_no."\"")) > 0) 
	{ 
		$_SESSION["addUserError"] .= "<font color=\"red\"> * Mobile Number Already Exists </font>";	
		$error++; 
	}	
		
	if($error == 0)
	{
		$query = "INSERT INTO user (name,user_id,email,parent_name,contact_no,balance,username,password) VALUES (\"".$name."\",\"".$userId."\",\"".$email."\",\"".$parentName."\",\"".$mobile."\",\"".$balance."\",\"".$userId."\",\"".$userId."\")";
		
		if(mysqli_query($conn,$query))
			$_SESSION["addUserError"] .= "<font color=\"green\">Successfully Added New User</font>";
		else
			$_SESSION["addUserError"] .= "<font color=\"red\">Failed To Add New User. <br>Reason : ".mysqli_error($conn)."</font>";
		
	}		

	header('Location:admin_addUser.php');
?>