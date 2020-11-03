<?php

$servername="localhost";
$dBUsername="root";
$dBPassword="";
$dBName="hotel";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn)
{
        die("Conection Failed".mysqli_connect_error()) ;
        
}

$select1 = "SELECT * FROM users";
$query0 = mysqli_query($conn, $select1);
$data = mysqli_fetch_assoc($query0);

$oldpwd = $data['pwdUsers'];

if (isset($_POST['']))
{
    $current = $_POST['currentpwd'];
    $new = $_POST['newpwd'];
    $confirm = $_POST['conpwd'];

    if ($current == $oldpwd)
    {
        if ($new == $confirm)
        {
            $update1 = "UPDATE users SET pwdUsers = '$new' WHERE id = ?";
            $query1 = mysqli_query($conn, $update1);

            if ($query1)
            {
                echo "Password Changed Successfully";
            }
            else
            {
                echo "Password doesn't Match";
            }

        }
    }
    else
    {
        echo "You Entered Wrong Password";
    }
}
 
session_start();
if (isset($_SESSION['log_in']) && $_SESSION['log_in'] == true) 
{
    header("Location:/index.php");
} 
else 
{
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
    <title>Login</title>
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
        <br>
        <br>
        <br>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-md-3">
                    <form class="form-container" action="includes/login.inc.php" method="POST">
                        <h3 class="text-center font-weight-bold">Log In</h3>
                        
                        <?php
                        if (isset($_GET['error'])) {
                            if ($_GET['error'] == "empty") {
                                echo '<p class="error">Empty Field! Please Fill in empty Field</p>';
                            } else if ($_GET['error'] == "nouser") {
                                echo '<p class="error">NO ACCOUNT FOUND!!!!!</p>';
                            } else if ($_GET['error'] == "accessdenied") {
                                echo '<p class="error">You Need Admin Acoount to Access This Page</p>';
                            }
                            else if ($_GET['error'] == "loginplease") {
                                echo '<p class="error">Please Login</p>';
                            }
                        }   
                        ?>

                        <div class="form-group"> <label
for="exampleInputPassword1">Current Password</label> <input type="password"
class="form-control" id="exampleInputPassword1" placeholder="Enter Current Password"
name="currentpwd"> </div> <div class="form-group"> <label
for="exampleInputPassword1">New Password</label> <input type="password"
class="form-control" id="exampleInputPassword1" placeholder="Enter New Password"
name="newpwd"> </div> <div class="form-group"> <label
for="exampleInputPassword1">Confirm Password</label> <input type="password"
class="form-control" id="exampleInputPassword1" placeholder="Confirm Password"
name="conpwd"> </div> <button type="submit" class="btn btn-primary btn-block"
name="login-submit">Submit</button> <br/> <center> <a href="./login.php">Log In</a></center> </form> </div> </div> </div> <br> <br> <br>
</body>

    </html>
<?php
}
?>