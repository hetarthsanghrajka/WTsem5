<?php
	if(isset($_POST['submit']))
	{
        session_start();
		require 'dbh.inc.php';

		$name = isset($_POST['name']) ? $_POST['name'] : "";
		$email  = isset($_POST['email']) ? $_POST['email'] : "";
		$subject = isset($_POST['subject']) ? $_POST['subject'] : "";
		$message= isset($_POST['message']) ? $_POST['message'] : "";
		
        if(empty($_POST['name'])){
              $_SESSION['status']="<h2 class= 'text-error text-center'>Name is required.</h2>";
            header("Location:../feedback.php");
        }

         if(empty($_POST['email'])){
              $_SESSION['status']="<h2 class= 'text-error text-center'>Email is required.</h2>";
            header("Location:../feedback.php");
        }

        if(empty($_POST['subject'])){
              $_SESSION['status']="<h2 class= 'text-error text-center'>Subject is required.</h2>";
            header("Location:../feedback.php");
        }


        if(empty($_POST['message'])){
              $_SESSION['status']="<h2 class= 'text-error text-center'>Message is required.</h2>";
            header("Location:../feedback.php");
        }

        echo "This is valid data";
    
                
        $c= sprintf("insert into feedback (name,email,subject,message) values('%s','%s','%s','%s')",$name,$email,$subject,$message);
        $ca=  mysqli_query($conn, $c);
        
        if($ca)
        {
            $_SESSION['status']="<h2 class= 'text-success text-center'> Thank you for your valueable feedback. </h2>";
            header("Location:../feedback.php");
        }
        else {
            echo 'Not Inserted';
        }
            
                
                
        }

        ?>