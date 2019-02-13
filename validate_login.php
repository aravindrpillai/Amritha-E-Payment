<?php

if($_POST['submitButton'] == "Login")
{
	switch($_POST['user']){
		case "user" 		: $table = "user"; 		break;
		case "parent" 		: $table = "parent"; 	break;
		case "provider" 	: $table = "provider"; 	break;
		case "admin" 		: $table = "admin"; 	break;
	}

	@session_start();
	
	$query = "SELECT id FROM ".$table." WHERE username=\"".$_POST['username']."\" AND password=\"".$_POST['password']."\"  ";
	
	require_once("data_base.php");	
	$result = mysqli_query($conn,$query);

	if (!$result){ 
		$_SESSION["error"] = mysqli_error($conn); 
		mysqli_close($conn);
		header('Location:index.php'); 
	}
	else{ 
		$count = 0;
		while ($rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$_SESSION["id"] = $rows['id'];
			$count += 1;
		}
		
		if($count == 0)
		{
			$_SESSION["error"] = "No Records Found"; 
			header('Location:index.php'); 
		}
		else{
			switch($_POST['user']){
				case "user" 		: header('Location:user_home.php'); 		break;
				case "parent" 		: header('Location:parent_home.php'); 		break;
				case "provider" 	: header('Location:provider_home.php'); 	break;
				case "admin" 		: header('Location:admin_home.php'); 		break;
			} 
		}
		
	}
	
}
else
{
	$_SESSION["error"] = "Unauthorised Access Caught"; 
	header('Location:index.php');
}

?>