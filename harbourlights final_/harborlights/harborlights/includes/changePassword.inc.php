<?php 
	if (isset($_POST['change-submit']))
	{
		session_start();
		require 'dbh.inc.php';

		$new = $_POST['pwd'];
		$repeat = $_POST['repeat-pwd'];

		$id = $_SESSION['userId'];

		$stmt = mysqli_stmt_init($conn);
		$query = "UPDATE users SET pwdUsers = ? WHERE idUsers = ? ";

		if(!mysqli_stmt_prepare($stmt,$query))
		{
			echo "SQL Error";
		}
		else
		{
			$hashpass = password_hash($new, PASSWORD_DEFAULT);
			mysqli_stmt_bind_param($stmt,"ss",$hashpass,$id);
			mysqli_stmt_execute($stmt);
			
			header("Location: ../index.php");
		}
	}
	else
	{
		echo "DHARMIN";
	}
?>