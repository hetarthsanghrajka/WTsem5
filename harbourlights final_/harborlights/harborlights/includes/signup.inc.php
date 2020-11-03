<?php
	if(isset($_POST['signup-submit']))
	{
		require 'dbh.inc.php';

		$fname=$_POST['fname'];
		$mname=$_POST['mname'];
		$lname=$_POST['lname'];
		$cno=$_POST['cno'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$address=$_POST['address'];
		$pincode=$_POST['pincode'];
		$city=$_POST['city'];
		$state=$_POST['state'];
                $status="1";
		$email = $_POST['mail'];
		$password = $_POST['pwd'];
//		$passwordRepeat = $_POST['pwd-repeat'];

                if($gender=="male")
                    {
                    $g="M";
                    }
                else {
                    $g="F";
                }
                
        $c="insert into users (fname,mname,lname,contactno,gender,dob,address,pincode,city,state,status,emailUsers,pwdUsers) values('$fname','$mname','$lname','$cno','$g','$dob','$address','$pincode','$city','$state','$status','$email','$password')";
        $ca=  mysqli_query($conn, $c);
        
        if($ca)
        {
            $_SESSION['status']="<h2 class= 'text-success text-center'> Registered Successfully </h2>";
            header("Location:../login.php");
        }
        else {
            echo 'Not Inserted'
        }
                
                
                
        }
        






































//
//		if(empty($fname) || empty($email) || empty($password) || empty($passwordRepeat))
//		{
//			header("Location: ../signup.php?error=empty");
//			exit(); 
//		}
//
//		else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $fname)) 
//		{
//			header("Location: ../signup.php?error=invalidmailuid");
//			exit(); 
//		}
//
//		else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
//		{
//			header("Location: ../signup.php?error=invalidmail&uid=".$fname);
//			exit(); 
//		}
//		else if (!preg_match("/^[a-zA-Z0-9]*$/", $fname))
//		{
//			header("Location: ../signup.php?error=invaliduid&mail=".$email); 
//			exit(); 
//		}
//		else if (!($password == $passwordRepeat))
//		{
//			header("Location: ../signup.php?error=passwordCheck&uid=".$fname."&mail=".$email); 
//			exit();	
//		}
//		else
//		{
//			$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
//			$stmt = mysqli_stmt_init($conn);
//
//			if (!mysqli_stmt_prepare($stmt, $sql))
//			{
//				header("Location: ../signup.php?error=sqlerror"); 
//				exit(); 
//			}
//			else
//			{
//				mysqli_stmt_bind_param($stmt, "s", $fname);
//				mysqli_stmt_execute($stmt);
//				mysqli_stmt_store_result($stmt);
//				$resultCheck = mysqli_stmt_num_rows($stmt);
//
//				if ($resultCheck > 0)
//				{
//					header("Location: ../signup.php?error=usertaken&mail=".$email); 
//					exit();	
//				}
//				else
//				{
//					 $sql = "INSERT INTO users (fname,mname,lname,contactno,gender,dob,address,pincode,city,state,status,emailUsers, pwdUsers) values (?,?,?,?,?,?,?,?,?,?,?,?,?)";
//					 $stmt = mysqli_stmt_init($conn);
//
//					 if (!mysqli_stmt_prepare($stmt, $sql))
//					{
//						header("Location: ../signup.php?error=sqlerror"); 
//						exit(); 
//					}
//					else
//					{
//						$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
//
//						mysqli_stmt_bind_param($stmt, "sssssssssssss", $fname,$mname,$lname,$cno,$gender,$dob,$address,$pincode,$city,$state,$status,$email, $hashedPwd);
//						mysqli_stmt_execute($stmt);
//						header("Location: ../signup.php?signup=success"); 
//						exit();
//					}
//				}
//			}
//		}
//		mysql_stmt_close($stmt);
//		mysqli_close($conn);
//	}
//
//	else
//	{
//		header("Location: ../signup.php"); 
//		exit();	
//	}

