<?php  
session_start();  
if(!isset($_SESSION["usname"]))
{
 header("location:../../index.php");
}
?> 
<?php
$conn=mysqli_connect("localhost","root","","hotel");
if(isset($_POST['editr'])){
    $rid=$_POST['roomid'];
    
    $u="select * from tbl_room where rid='$rid'";
    $ur=  mysqli_query($conn, $u);
    $r=  mysqli_fetch_array($ur);
    $roo=$r['roomno'];
?> 
    
    <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HARBORLIGHTS HOTEL</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="home.php">MAIN MENU </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
			
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
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
                        <a  href="settings.php"><i class="fa fa-dashboard"></i>Rooms Status</a>
                    </li>
					<li>
                        <a  class="active-menu" href="room.php"><i class="fa fa-plus-circle"></i>Add Room</a>
                    </li>
                    <li>
                        <a  href="roomdel.php"><i class="fa fa-desktop"></i> Delete Room</a>
                    </li>
					

                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
       
        
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           UPDATE ROOM <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
     
                                     
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            UPDATE ROOM
                        </div>
                        <div class="row panel-body">
                            <form name="form" action="../../includes/code.php" method="post">
                            <div class="col-md-6 form-group">
                                <?php
                                
                            $conn=mysqli_connect("localhost","root","","hotel");
                                
                                $c="select * from tbl_roomcategory where status='1'";
                                $cr=  mysqli_query($conn, $c);
                                ?>
                                            <label>Type Of Room *</label>
                                            <select name="ttroom"  class="form-control" required>
                                                <?php
                                                    while ($s=  mysqli_fetch_array($cr))
                                                    {
?>
                                                <option value="<?php echo $s['cid'];?>"><?php echo $s['name']."- ".$s['beds']." Beds";?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                              </div>
							  
								<div class="col-md-6 form-group">
                                            <label>Room Number:</label>
                                            <input type="text" class="form-control" name="rrno" value="<?php echo $roo;?>">
                                                <input type="hidden" value="<?php echo $r['rid'];?>" name="rid">
                                            
                               </div>
                                <center><br><br><input type="submit" class="btn btn-primary" name="uproom" value="update"></center> 
							</form>
                        </div>
                        
                    </div>
                </div>
    
    <?php
}
 else {
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SUNRISE HOTEL</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="home.php">MAIN MENU </a>
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
                        <a  href="roomdel.php"><i class="fa fa-desktop"></i> Delete Room</a>
                    </li>
                    <li>
                        <a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                    </li>
                                        <li>
                        <a href="employe.php"><i class="fa fa-qrcode"></i> Employee</a>
                    </li>
                   
                   <li>
                        <a href="feedback.php"><i class="fa fa-qrcode"></i> Feedback</a>
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
                           NEW ROOM <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">
                                     
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ADD NEW ROOM
                        </div>
                        <div class="row panel-body">
                            <form name="form" action="../../includes/code.php" method="post">
                            <div class="col-md-6 form-group">
                                <?php
                                
                            
                                
                                $c="select * from tbl_roomcategory where status='1'";
                                $cr=  mysqli_query($conn, $c);
                                ?>
                                            <label>Type Of Room *</label>
                                            <select name="troom"  class="form-control" required>
                                                <?php
                                                    while ($s=  mysqli_fetch_array($cr))
                                                    {
?>
                                                <option value="<?php echo $s['cid'];?>"><?php echo $s['name']."- ".$s['beds']." Beds";?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                              </div>
							  
								<div class="col-md-6 form-group">
                                            <label>Room Number:</label>
                                            <input type="text" class="form-control" name="rno" required>
                                            
                                            
                               </div>
                                <center><br><br><input type="submit" class="btn btn-primary" name="addroom"></center> 
							</form>
                        </div>
                        
                    </div>
                </div>
                
                
                
                
                
                
                
                
                
                
                
                
            </div>    
                
                
                
            <center>
                <div class="col-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ROOMS INFORMATION
                        </div>
                        <div class="panel-body">
								<!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <?php
						$sql = "select * from tbl_room";
						$re = mysqli_query($conn,$sql)
						?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th class="text-center">Room Number</th>
                                            <th class="text-center">Room Type</th>
					    <th class="text-center">Bedding</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        while($t=  mysqli_fetch_array($re))
                                        {
                                            $q=$t['status'];
                                            
                                            if($q!="1")
                                            {
                                                $w="danger";
                                                $k="unavailable";
                                            }
                                            else {
                                                $w="primary";
                                                $k="available";
                                            }
                                            
                                            $cid=$t['cid'];
                                            $y="select * from tbl_roomcategory where cid='$cid'";
                                            $yr=  mysqli_query($conn, $y);
                                            while ($j=  mysqli_fetch_array($yr))
                {
                                            
                                        ?>
                                        <tr>
                                            <td><?php echo $t['roomno'];?></td>
                                            <td><?php echo $j['name'];?></td>
                                            <td><?php echo $j['beds'];?></td>
                                            <td>
                                                <form action="../../includes/code.php" method="post">
                                                    <input type="hidden" name="rid" value="<?php echo $t['rid'];?>">
                                                    <input type="hidden" name="su" value="<?php echo $q;?>">
                                                    <button class="btn btn-<?php echo $w;?>" name="ava"><?php echo $k;?></button>
                                            </form>
                                            </td>
                                                    <td><form method="post">
                                                    <input type="hidden" name="roomid" value="<?php echo $t['rid'];?>">
                                                            <button class="btn btn-info btn-sm" name="editr"><i class="fas fa fa-edit"></i></button>
                                                </form></td>
                                        </tr>
                                        
                                        <?php
                }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>   
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                    
                       
                            
							  
							 
							 
							  
							  
							   
                       </div>
                        
                    </div>
                
            </center>
            
                    
            
				
					</div>
			 <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
<?php
 }
?>