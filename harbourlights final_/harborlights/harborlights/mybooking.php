<?php
session_start();
require 'db.php';
if (isset($_SESSION['log_in']))
{
    echo "Please Log In";
    exit();
}

if(isset($_POST['bookid'])){
	$query= sprintf("update tbl_booking set status = 0 where bookid =%d",$_POST['bookid']);
    mysqli_query($con,$query);
   
     header("Location:./mybooking.php");
}

$query= sprintf("SELECT * FROM tbl_booking inner join tbl_roomcategory on tbl_roomcategory.cid = tbl_booking.rid where uid=%d",$_SESSION['id']);
$stmt= mysqli_stmt_init($con);
if (!mysqli_stmt_prepare($stmt, $query))
{
	echo "SQL Error";
	
}
else
{
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);


}



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Harborlights	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php">Harbor<span>lights</span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="./includes/logout.inc.php" class="nav-link">Logout</a></li>
                                        <li class="nav-item"><a href="./changePassword.php" class="nav-link">Change Password</a></li>
					<li class="nav-item"><a href="about.php" class="nav-link">About Us</a></li>
					<li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
					<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                                        <li class="nav-item"><span class="nav-link"><?php echo $_SESSION['uname'];?></span></li>
                                         <li class="nav-item"><a href="mybooking.php" class="nav-link">Booking</a></li>
				</ul>
			</div>
		</div>
	</nav>


	<section class="ftco-section">

		<div class="container px-0">
				<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Booking Id</th>
      <th scope="col">Room</th>
      <th scope="col">Check In</th>
      <th scope="col">Check Out</th>
       <th scope="col">Status</th>
       <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <?php 

   $index = 0;
  	while($row=mysqli_fetch_assoc($result))
  	{	
  	   $index++;	
  	 
  		?>
    <tr>
      <td scope="col"><?php echo $index; ?></td>
      <td scope="col"><?php echo $row['bookid'] ?></td>
      <td scope="col"><?php echo $row['name'] ?></td>
      <td scope="col"><?php echo $row['checkin'] ?></td>
       <td scope="col"><?php echo $row['checkout'] ?></td>
       <td scope="col"><?php echo $row['status'] ? "Confirm" : "Cancel" ?></td>
       <?php

       if($row['status'] == 1){

			$currentDateTime = date('Y-m-d H:i:s');

			$fixdate = $row['checkin'] ;

			$curtimestamp1 = strtotime($currentDateTime);
			$curtimestamp2 = strtotime($fixdate);

			if ($curtimestamp1 < $curtimestamp2)
			{
				 echo '<td scope="col"><form method="post" action="mybooking.php">
                                                    <input type="hidden" name="bookid" value="'.$row['bookid'].'">
                                                         <input type="submit" class="btn btn-outline-danger" value="Cancel">
                                            </form></td>';
			}else{
				echo '<td></td>';
			}
			     
			   



  
       }else{
       		echo '<td></td>';
       }
       ?>	

    

    </tr>

<?php }?></tbody>
</table>
		</div>
	</section>

	<footer class="ftco-footer ftco-section img" style="background-image: url(images/bg_4.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Harbor Lights</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
							there live the blind texts.</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-5">
						<h2 class="ftco-heading-2">Useful Links</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">Blog</a></li>
							<li><a href="#" class="py-2 d-block">Rooms</a></li>
							<li><a href="#" class="py-2 d-block">Amenities</a></li>
							<li><a href="#" class="py-2 d-block">Gift Card</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Privacy</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">Career</a></li>
							<li><a href="#" class="py-2 d-block">About Us</a></li>
							<li><a href="#" class="py-2 d-block">Contact Us</a></li>
							<li><a href="#" class="py-2 d-block">Services</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain
										View, San Francisco, California, USA</span></li>
								<li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929
											210</span></a></li>
								<li><a href="#"><span class="icon icon-envelope"></span><span
											class="text">info@yourdomain.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">

					
				</div>
			</div>
		</div>
	</footer>

	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" /></svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>

</body>

</html>