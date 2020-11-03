<?php  
session_start();  

if(!isset($_SESSION["usname"]))
{
 header("location:../../index.php");
}
?>

<?php
$conn=mysqli_connect("localhost","root","","hotel");
if(isset($_POST['upcat'])){
    
    $cid=$_POST['cid'];
    
    $s="select * from tbl_roomcategory where cid='$cid'";
    $se=  mysqli_query($conn, $s);
    $r=  mysqli_fetch_array($se);
    $name=$r['name'];
    $beds=$r['beds'];
    $des=$r['description'];
    $price=$r['price'];
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
                        <a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
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
                           UPDATE CATEGORY <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            
                
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            UPDATE CATEGORY
                        </div>
                        <div class="row panel-body">
                            <form action="../../includes/code.php" name="form" method="post">
                            <div class="col-md-6 form-group">
                                <label>Name:</label><input class="form-control" type="text" name="cname" value="<?php echo $name;?>">
                                    <br><label>Description:</label><input type="text" class="form-control" name="desc" value="<?php echo $des;?>">
                              </div>
							  
								<div class="col-md-6 form-group">
                                            <label>Price:</label><input class="form-control" type="text" name="price" value="<?php echo $price;?>">
                                            <br><label>No Of Beds:</label><input class="form-control" type="text" name="beds" value="<?php echo $beds;?>">
                               
							</div>
                                <input type="hidden" name="cid" value="<?php echo $cid;?>">
                                <center><input type="submit" name="uppcat" value="Update" class="btn btn-primary"></center> 
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
                        <a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                    </li>
                                        <li>
                        <a href="employe.php"><i class="fa fa-qrcode"></i> Employee</a>
                    </li>
                   
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                    
					

                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
       
        
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           NEW CATEGORY <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">
                
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ADD NEW CATEGORY
                        </div>
                        <div class="row panel-body">
                            <form action="../../includes/code.php" name="form" method="post">
                            <div class="col-md-6 form-group">
                                <label>Name:</label><input class="form-control" type="text" name="cname" required>
                                    <br><label>Description:</label><textarea class="form-control" name="desc" required></textarea>
                              </div>
							  
								<div class="col-md-6 form-group">
                                            <label>Price:</label><input class="form-control" type="text" name="price" required>
                                            <br><label>No Of Beds:</label><input class="form-control" type="text" name="beds" required>
                               
							</div>
                                <center><input type="submit" name="addcat" value="Add" class="btn btn-primary"></center> 
                                                                			</form>
                        </div>
                        
                    </div>
                </div> 
            </div>    
                
                
                
            <center>
                <div class="col-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            CATEGORY INFORMATION
                        </div>
                        <div class="panel-body">
								
                    <div class="panel panel-default">
                        <?php
                        
						$sql = "select * from tbl_roomcategory";
						$re = mysqli_query($conn,$sql)
						?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Description</th>
					    <th class="text-center">Beds</th>
                                            <th class="text-center">price</th>
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
                                            
                                        ?>
                                        <tr>
                                            <td><?php echo $t['name'];?></td>
                                            <td><?php echo $t['description'];?></td>
                                            <td><?php echo $t['beds'];?></td>
                                            <td><?php echo $t['price'];?></td>
                                            <td>
                                                <form action="../../includes/code.php" method="post">
                                                    <input type="hidden" name="cid" value="<?php echo $t['cid'];?>">
                                                    <input type="hidden" name="su" value="<?php echo $q;?>">
                                                    <button class="btn btn-<?php echo $w;?>" name="cava"><?php echo $k;?></button>
                                            </form>
                                            </td>
                                            <td>
                                                <form method="post">
                                                    <input type="hidden" name="cid" value="<?php echo $t['cid'];?>">
                                                        <button class="btn btn-info" name="upcat"><i class="fas fa fa-edit"></i></button>
                                            </form>
                                            </td>
                                        </tr>
                                        
                                        <?php
                
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