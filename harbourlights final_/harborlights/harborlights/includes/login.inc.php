<?php

if (isset($_POST['login-submit']))
{
	require 'dbh.inc.php';

	$mailuid = $_POST['mailuid'];
	$password = $_POST['pwd'];

	if (empty($mailuid) || empty($password))
	{
		header("Location: ../login.php?error=emptyfields"); 
		exit();	
	}
	else
	{
		$sql = "SELECT * FROM users where emailUsers='$mailuid' and pwdUsers='$password'";
		$s = mysqli_query($conn,$sql);
		if($s)
		{
			header("Location: ../index.php?login=success");  
//			exit();	
		}
		else
		{
                    header("Location: ../index.php?login=wrong");  
                    
//			mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
//			mysqli_stmt_execute($stmt);
//			$result = mysqli_stmt_get_result($stmt);
//
//			if($row = mysqli_fetch_assoc($result))
//			{
//				$pwdCheck = password_verify($password, $row['pwdUsers']);
//				if($pwdCheck == false)
//				{
//					header("Location: ../index.php?error=wrongpwd"); 
//					exit();
//				}
//				else if ($pwdCheck == true)
//				{
//					session_start();
//					$_SESSION['userId'] = $row['idUsers'];
//					$_SESSION['userUid'] = $row['uidUsers'];
//					$_SESSION['log_in'] = true;
//
//					header("Location: ../index.php?login=success"); 
//					exit();	
//				}
//				else
//				{
//					header("Location: ../login.php?error=wrongpwd"); 
//					exit();	
//				}
//			}
//			else
//			{
//				header("Location: ../login.php?error=nouser"); 
//				exit();	
//			}
		}
	}

}
else
{
	header("Location: ../index.php"); 
	exit();	
}
 