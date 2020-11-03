<?php
session_start();
require 'db.php';
if (isset($_SESSION['log_in']) && $_SESSION['log_in'] == true) 
{
    header("Location:./index.php");
} 
else 
{

    $fname=$_SESSION['uname'];
    $userId = $_SESSION['id'];
    $s="select * from users where idUsers=$userId";
    $sr= mysqli_query($con,$s);
    $c=  mysqli_fetch_array($sr);
    $fname=$c['fname'];
    $mname=$c['mname'];
    $lname=$c['lname'];
    $cno=$c['contactno'];
    $add=$c['address'];
    $pin=$c['pincode'];
    $city=$c['city'];
    $state=$c['state'];
    $email=$c['emailUsers'];
    $cid=$_GET['room_id'];

    $y="select * from tbl_room where cid='$cid' and status='1' ORDER BY rid ASC limit 1";
    $yr=mysqli_query($con,$y);
    $c=mysqli_fetch_array($yr);
    $rid=$c['rid'];

    // $cindate=$_POST['cindate'];
    // $coutdate=$_POST['coutdate'];
    
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        
    <title>Sign Up</title>
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
      
        <div style="width:50%; margin:auto;">
        

            <form class="form-container  d-flex flex-column justify-content-center align-items-center" action="includes/code.php" method="POST">
            <center><h3 class="text-center font-weight-bold">Booking Details</h3></center>
            <br><div class="">
                <div class="">
                    
                        

                        <?php
                        if (isset($GET["newpwd"]))
                        {
                        	if ($GET["newpwd"] == "passwordupdated")
                        	{
                        		echo '<p class="signupsuccess">Your password has been reset</p>';
                        	}
                        }
                        ?>


                       

<!--                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $fname;?>" name="fname">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Middle Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $mname;?>" name="mname">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $lname;?>" name="lname">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact No</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $cno;?>" name="cno">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" class="form-control" name="address" value="<?php echo $add;?>">
                        </div>
                    </div>-->

                            <div>
<!--                        <div class="form-group">
                            <label for="exampleInputEmail1">Pincode</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $pin;?>" name="pincode">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">City</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $city;?>" name="city">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">State</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $state;?>" name="state">
                        </div>
                        -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $email;?>" name="mail">
                        </div>

                         <?php 

    
                           if($cid != 9){ 

                         ?>   

                        <div class="form-group">
                            <label for="exampleInputEmail1">Check-In Date</label>
                            <input type="date" class="form-control " name="cindate" id="cindate" value="<?php echo date();?>" aria-describedby="emailHelp" name="cindate">
                        </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Check-Out Date</label>
                            <input type="date"  type="date" class="form-control " name="coutdate" id="coutdate" value="<?php echo date();?>" aria-describedby="emailHelp" name="coutdate">
                        <?php 

                          }else{      

                        ?>
                         <div class="form-group">
                          <div class='input-group date' id='cindatetime'>
                    
                                <input type='text' class="form-control" name="cindatetime" />
                                      <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                        </div>
                    </div>
 <div class="form-group">
                          <div class='input-group date' id='coutdatetime'>
                    
                                <input type='text' class="form-control" name="coutdatetime" />
                                      <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                        </div>
                    </div>


                        <?php 

                    }

                        ?>
                    </div>



                <input type="hidden" name="rid" value="<?php echo $rid;?>">    
               <button class="btn btn-primary" name="rbook">Book</button>
                        <br/>
                     
                       
                </div>



            </div>

            


            </form>
            </div>

        </div>
        <br>
        <br>
        <br>
        <script>
        document.getElementById("cindate").valueAsDate = new Date();

</script>
		<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
 
<script>
  $(function () {

    var date = new Date();
date.setDate(date.getDate()-1);
                $('#cindatetime').datetimepicker({
                    defaultDate: new moment().add(1, 'd'),
                    minDate : new moment(),
                   
                    stepping: 30
                });
                $('#coutdatetime').datetimepicker({
                    defaultDate: new moment().add(1, 'd'),
                   stepping: 30 ,

                   minDate : new moment()
                
                });

            });
        </script>
    </body>

    </html>
<?php
}
?>