<?php

if (isset($_POST["reset-password-submit"]))
{
	require 'dbh.inc.php';
	$email = $_POST["selector"];
	$password = $_POST["pwd"];
	$passwordRepeat = $_POST["pwd-repeat"];

	$stmt = mysqli_stmt_init($conn);
	$query = "UPDATE users SET pwdUsers = ? WHERE emailUsers = ? ";

	if(!mysqli_stmt_prepare($stmt,$query))
	{
		echo "SQL Error";
	}
	else
	{
		$hashpass = password_hash($new, PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt,"ss",$hashpass,$email);
		mysqli_stmt_execute($stmt);
		
		header("Location: ../index.php");
	}
}