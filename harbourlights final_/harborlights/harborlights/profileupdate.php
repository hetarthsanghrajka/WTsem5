<?php
session_start();

require 'db.php';

if(!isset($_SESSION['id'])){
    header("Location:login.php");
}

  $userId = $_SESSION['id'];
    $s="select * from users where idUsers=$userId";
    $sr= mysqli_query($con,$s);
    $c=  mysqli_fetch_array($sr);

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Profile</title>
        <style>
            body {
                padding: 0px;
                margin: 0px;
                background: url("./images/loginbg.jpg");
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }

            .logo {
                padding-top: 25px;
                padding-bottom: 25px;
                color: white;
                text-align: center;
            }

            form {
                background: #fff;
            }

            .form-container {
                border-radius: 20px;
                padding: 30px;
                box-shadow: 0px 0px 10px 0px;
            }

            .error {
                font-size: 15px;
                color: red;
            }

            .success {
                font-size: 15px;
                color: green;
            }
        </style>
    </head>

    <body>
        <div class="logo">
            <h1>HarborLights</h1>
        </div>
        <br>
      
        <div class="container-fluid">

            <form class="form-container" action="includes/profileupdate.inc.php" method="POST">
            <center><h3 class="text-center font-weight-bold">Profile </h3></center>
            <br><div class="row">
                <div class="col-lg-6">
                    
                        

                        <?php
                        if (isset($GET["newpwd"]))
                        {
                        	if ($GET["newpwd"] == "passwordupdated")
                        	{
                        		echo '<p class="signupsuccess">Your password has been reset</p>';
                        	}
                        }
                        ?>


                       

                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your First Name" name="fname" value="<?php  echo $c['fname'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Middle Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Middle Name" name="mname" value="<?php  echo $c['mname'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Last Name" name="lname" value="<?php  echo $c['lname'] ?> ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact No</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Contact Number" name="cno" value="<?php  echo $c['contactno'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date of birth</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Date of birth" name="dob" value="<?php  echo $c['dob'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <textarea class="form-control" name="address" placeholder="Enter your Address" rows="4" "><?php  echo $c['address'] ?></textarea>
                        </div>
                    </div>

<div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pincode</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Pincode" name="pincode" value="<?php  echo $c['pincode'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">City</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your City" name="city" value="<?php  echo $c['city'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">State</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your State" name="state" value="<?php  echo $c['state'] ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="mail" value="<?php  echo $c['emailUsers'] ?>">
                        </div>
                        
                        
                        <center><button type="submit" class="btn btn-primary" name="signup-submit">Update</button>
                        <br/>
                     
                       
                    
                </div>



            </div>

            

            </form>
            </div>

        </div>
        <br>
        <br>
        <br>
    </body>

    </html>
