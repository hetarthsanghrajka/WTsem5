<?php  
session_start();  
$con = mysqli_connect("localhost","root","","hotel") or die(mysql_error());
if(!isset($_SESSION["usname"]))
{
 header("location:../../index.php");
}

if(isset($_POST['up']))
{
    $eid=$_POST['eid'];
    $s="select * from tbl_employe where eid='$eid'";
    $sr=mysqli_query($con,$s);
    $t=mysqli_fetch_array($sr);
    $name=$t['name'];
    $email=$t['email'];
    $address=$t['address'];
    $cno=$t['cno'];
    $state=$t['state'];
    $pincode=$t['pincode'];
    $city=$t['city'];
    // $name=$t['name'];
    $salary=$t['salary'];

}



?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator	</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"> ADMIN </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                       
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                   
                    <li>
                        <a  href="addcategory.php"><i class="fa fa-plus-circle"></i>Add Category</a>
                    </li>
                    <li>
                        <a  href="room.php"><i class="fa fa-plus-circle"></i>Add Room</a>
                    </li>
                    <li>
                        <a href="roombook.php"><i class="fa fa-bar-chart-o"></i> Room Booking</a>
                    </li>
                    <li>
                        <a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                    </li>
                                        <li>
                        <a href="employe.php"><i class="fa fa-qrcode"></i> Employee</a>
                    </li>
                   
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                   


                    
					</ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
         <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           EMPLOYEE<small>MANAGEMENT</small>
                        </h1>

                    </div>

                </div> 
                 <!-- /. ROW  -->
     <center><a href="employe.php" class="btn btn-danger">BACK</a></center><br>
                 
                <!-- /. ROW  -->



<div class="row col-12">
                
                <div class="col-md-12 col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            UPDATE EMPLOYEE
                        </div>
                        <div class="row panel-body">
                            <form action="../../includes/code.php" name="form" method="post">
                            <div class="col-md-6 form-group">
                                <label>Name:</label><input class="form-control" type="text" name="ename" value="<?php echo $name;?>">
                                    <br><label>Address:</label><input type="text" class="form-control" name="address" value="<?php echo $address;?>">
                                    <br><label>Contact No:</label><input type="text" class="form-control" name="cno" value="<?php echo $cno;?>">
                                    <br><label>Pincode:</label><input type="type" class="form-control" name="pincode" value="<?php echo $pincode;?>">
                                    <!-- <br><label>HIRING DATE:</label><input type="date" class="form-control" name="hdate" required> -->
                                        <br><label>Select Shift:</label><select class="form-control" name="shift">
                                            <option value="day">DAY</option>
                                            <option value="night">NIGHT</option>
                                        </select>
                              </div>
                              
                                <div class="col-md-6 form-group">
                                      <br><label>Email:</label><input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                                       <br><label>State:</label><input type="type" class="form-control" name="state" value="<?php echo $state;?>">
                                        <br><label>City:</label><input type="type" class="form-control" name="city" value="<?php echo $city;?>"> 
                                        <br><label>Post:</label><select class="form-control" name="post">
                                            <option value="Management">MANAGEMENT</option>
                                            <option value="IT Service">IT SERVICE</option>
                                            <option value="Accounting">ACCOUNTING</option>
                                            <option value="Massage Service">MASSAGE SERVICE</option>
                                            <option value="Laundary Service">LAUNDARY SERVICE</option>
                                             <option value="Room Service">ROOM SERVICE</option>
                                        </select>

                                        <br><label>SALARY:</label><input type="type" class="form-control" name="salary" value="<?php echo $salary;?>">
                               
                            </div>
                                <input type="hidden" value="<?php echo $eid;?>" name="eid">
                                <center><input type="submit" name="upemp" value="Update" class="btn btn-primary"> 
                                <input type="reset" class="btn btn-danger"></center>
                                                                            </form>
                        </div>
                        
                  
                </div> 
            </div>







            
                </div>
               
            </div>
        
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
