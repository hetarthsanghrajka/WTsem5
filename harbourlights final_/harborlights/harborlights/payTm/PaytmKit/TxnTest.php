<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database="hotel";
// Create connection
$connection = mysqli_connect($servername,$username,$password,$database);
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="X Gym Fitness HTML Template">
	<meta name="keywords" content="fitness, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
<!--	 Favicon 
        <link href="img/favicon.ico" rel="shortcut icon"/>

	 Google font 
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">-->

	<!-- Stylesheets -->
        <link rel="stylesheet" href="../../css/bootstrap.min.css"/>
	<link rel="stylesheet" href="../../css/font-awesome.min.css"/>
	<link rel="stylesheet" href="../../css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="../../css/flaticon.css"/>
	<link rel="stylesheet" href="../../css/slicknav.min.css"/>

	<!-- Main Stylesheets -->
        <link rel="stylesheet" href="../../css/style.css"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
    <center>
    	<?php
//		$username=$_SESSION['username'];
//		$query1="select * from tbl_societymst where semail='$username'";
//		$query1_ex=mysqli_query($connection,$query1);
//		$row1=mysqli_fetch_array($query1_ex);
//
//		$sname=$row1['sname'];
//		$sid=$row1['sid'];
//		$pid=$row1['pid'];
//
//		$query2="select * from tbl_package where pid='$pid'";
//		$query2_ex=mysqli_query($connection,$query2);
//		$row2=mysqli_fetch_array($query2_ex);
//
//		$amount=$row2['p_amount'];
//		$validity=$row2['p_validity'];
//		$package=$row2['p_name'];

        $email=$_SESSION['u'];
        $l="select * from users where emailUsers='$email'";
        $lr=  mysqli_query($connection, $l);
        $ge=  mysqli_fetch_array($lr);
        $uname=$ge['fname'];
        $uid=$ge['idUsers'];
        
        
        $rid=$_SESSION['rid'];
        $y="select * from tbl_room where rid='$rid'";
        $yr=  mysqli_query($connection, $y);
        $g=  mysqli_fetch_array($yr);
        $cid=$g['cid'];
        
        $t="select * from tbl_roomcategory where cid='$cid'";
        $tr=  mysqli_query($connection, $t);
        $r=  mysqli_fetch_array($tr);
        $price=$r['price'];
        $name=$r['name'];

        $_SESSION['uid']=$uid;
        $_SESSION['rcid']=$cid;
        $_SESSION['price']=$price;

	?>
        <h1>PAYMENT PROCESS.</h1><br>
	<h2>You Need To Complete Your Subscrpition Payment.</h2>
	<pre>
	</pre>
	<form method="post" action="pgRedirect.php">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-white bg-success">
				<tr>
					<th>S.NO</th>
					<th>NAME</th>
					<th>VALUE</th>
				</tr>
                </thead>
                                <tbody>
				<tr>
<!--					<td>1</td>
					<td><label>Transaction_ID::*</label></td>-->
                                        <td><input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "Tnx" . rand(10000,99999999)?>">
					</td>
				</tr>
				<tr>
					<td>1</td>
					<td><label>Customer Name ::*</label></td>
                                        <td><?php echo $uname;?></td>
                                        <input type="hidden" id="CUST_ID" name="CUST_ID" autocomplete="off" value="<?php echo $uid;?>">
				</tr>
				<!-- <tr>
					<td>2</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td> -->
                                        <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
                                       <!--  <td><?php echo "Retail";?></td>
                                </tr> -->
				<!-- <tr>
					<td>3</td>
					<td><label>Channel ::*</label></td> -->
					<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					<!-- <td><?php echo "WEB";?></td>
				</tr> -->
				<tr>
					<td>4</td>
					<td><label>Amount*</label></td>
					<input title="TXN_AMOUNT" tabindex="10"
                                                   type="hidden" name="TXN_AMOUNT"
                                                value="<?php echo $price;?>">
                                        <td><?php echo $price;?></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
                                        <td><input class="btn btn-success" value="CheckOut" type="submit"></td>
				</tr>
			</tbody>
		</table>
		* - Mandatory Fields
	</form>
    </center>
    </body>
</html>