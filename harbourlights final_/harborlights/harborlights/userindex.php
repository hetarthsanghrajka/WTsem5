<?php 
require 'db.php';
$query= "SELECT * FROM tbl_roomcategory";
$stmt= mysqli_stmt_init($con);
session_start();

if($_SESSION['uname']!=TRUE){
	header("Location:login.php");
}

unset($_SESSION['cid']);
unset($_SESSION['uid']);
unset($_SESSION['price']);


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
<?php
$n="";

$t="select * from tbl_roomcategory where status='1'";
        $tr=  mysqli_query($con, $t);
//if(isset($_POST['check']))
//{
//    
//    $cin=$_POST['cin'];
//    $cout=$_POST['cout'];
//    $cid=$_POST['category'];
//    $ucin=  "20".date('y-m-d',strtotime($cin));
//    $ucout=  "20".date('y-m-d',strtotime($cout));
//    
//
//    $y="select rid from tbl_room where rid not in(select rid from tbl_booking where checkin='$ucin' and checkout='$ucout' and status='1') and status='1' and cid='$cid'";
//    $yr=  mysqli_query($con, $y);
//    
//    while ($b=  mysqli_fetch_array($yr))
//    {
//        echo $b['rid']."<br>";
//    }
//
//    
//    
//    
//}
//?>
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

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
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
	<!-- END nav -->
	<div class="hero">
		<section class="home-slider owl-carousel">
			<div class="slider-item" style="background-image:url(images/bg_1.jpg);">
				<div class="overlay"></div>
				<center>
					<?php
					if(isset($_SESSION['status'])){
						if($_SESSION['status']!=""){
							echo $_SESSION['status'];
							unset($_SESSION['status']);
						}
					}
					?>

				</center>
				<div class="container">
					<div class="row no-gutters slider-text align-items-center justify-content-end">
						<div class="col-md-6 ftco-animate">
							<div class="text">
								<h2>More than a hotel... an experience</h2>
								<h1 class="mb-3">Hotel for the whole family, all year round.</h1>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="slider-item" style="background-image:url(images/bg_2.jpg);">
				<div class="overlay"></div>
				<div class="container">
					<div class="row no-gutters slider-text align-items-center justify-content-end">
						<div class="col-md-6 ftco-animate">
							<div class="text">
								<h2>Harbor Lights Hotel &amp; Resort</h2>
								<h1 class="mb-3">It feels like staying in your own home.</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
        

	
        


	<section class="ftco-section ftco-no-pb ftco-room">
		<div class="container-fluid px-0">
			<div class="row no-gutters justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<span class="subheading">Harbor Lights Rooms</span>
					<h2 class="mb-4">Hotel Master's Rooms</h2>
				</div>
			</div>
			<div class="row no-gutters">
			<?php 
                        
			$len = 0;
				while($row=mysqli_fetch_assoc($result))

				{
					if($len == 6)
					{
						$len = 0;
					}
						$len ++;
					?>
						<div class="col-lg-6">
							<div class="room-wrap d-md-flex ftco-animate">
								<a href="#" class="img" style="background-image: url(images/room-<?php echo $len ?>.jpg);"></a>
								<div class="half left-arrow d-flex align-items-center">
									<div class="text p-4 text-center">
										<p class="star mb-0"><span class="ion-ios-star"></span><span
										class="ion-ios-star"></span><span class="ion-ios-star"></span><span
										class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
										<p class="mb-0"><span class="price mr-1"><?php echo $row['price'] ?></span> <span class="per">per
										night</span></p>
										<h3 class="mb-3"><a href="rooms.php"><?php echo $row['name'] ?></a></h3>
										<h5>Bedding: <?php echo $row['beds'] ?></h5>
                                                                                <p class="pt-1"><a href="viewdetail.php?room_id=<?php echo $row['cid'] ?>" class="btn-custom px-3 py-2 rounded">View
										Details <span class="icon-long-arrow-right"></span></a></p>
									</div>
								</div>
							</div>
						</div>
					<?php
				}
			?>
			</div>
		</div>
	</section>
        <section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-lg-12">
                                    <form method="post" class="booking-form aside-stretch">
						<div class="row">
							<div class="col-md d-flex py-md-4">
								<div class="form-group align-self-stretch d-flex align-items-end">
									<div class="wrap align-self-stretch py-3 px-4">
										<label for="#">Check-in Date</label>
                                                                                <input type="text" name="cin" class="form-control checkin_date"
											placeholder="Check-in date">
									</div>
								</div>
							</div>
							<div class="col-md d-flex py-md-4">
								<div class="form-group align-self-stretch d-flex align-items-end">
									<div class="wrap align-self-stretch py-3 px-4">
										<label for="#">Check-out Date</label>
										<input type="text" name="cout" class="form-control checkout_date"
											placeholder="Check-out date">
									</div>
								</div>
							</div>
							<div class="col-md d-flex py-md-4">
								<div class="form-group align-self-stretch d-flex align-items-end">
									<div class="wrap align-self-stretch py-3 px-4">
										<label for="#">Room</label>
										<div class="form-field">
											<div class="select-wrap">
												<div class="icon"><span class="ion-ios-arrow-down"></span></div>
												<select name="category" class="form-control">
												<?php
                                                                                                while ($c=  mysqli_fetch_array($tr))
                                                                                                {
                                                                                                    ?>
                                                                                                    <option value="<?php echo $c['cid'];?>"><?php echo $c['name']."- ".$c['beds']." Beds";?></option>
                                                                                                        
                                                                                                        <?php
                                                                                                }
                                                                                                ?>
                                                                                                </select>
											</div>
										</div>
									</div>
								</div>
							</div>
<!--							<div class="col-md d-flex py-md-4">
								<div class="form-group align-self-stretch d-flex align-items-end">
									<div class="wrap align-self-stretch py-3 px-4">
										<label for="#">Guests</label>
										<div class="form-field">
											<div class="select-wrap">
												<div class="icon"><span class="ion-ios-arrow-down"></span></div>
												<select name="" id="" class="form-control">
													<option value="">1 Adult</option>
													<option value="">2 Adult</option>
													<option value="">3 Adult</option>
													<option value="">4 Adult</option>
													<option value="">5 Adult</option>
													<option value="">6 Adult</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>-->
							<div class="col-md d-flex">
								<div class="form-group d-flex align-self-stretch">
                                                                    <button name="check"
										class="btn btn-primary py-5 py-md-3 px-4 align-self-stretch d-block"><span>Check
                                                                            Availability <small>Best Price Guaranteed!</small></span></button>
                                                                    
								</div>
                                                            
							</div>


						</div>
                                        <center><span class="text"><?php echo $n;?></span></center>
					</form>
				</div>
			</div>
		</div>
	</section>
<?php     
                            if(isset($_POST['check']))
                            {  
                        
                                $n="";
                                $cin=$_POST['cin'];
                                $cout=$_POST['cout'];
                                $cid=$_POST['category'];
                                $ucin=  "20".date('y-m-d',strtotime($cin));
                                $ucout=  "20".date('y-m-d',strtotime($cout));


                                $j="select rid from tbl_room where rid not in(select rid from tbl_booking where checkin='$ucin' and checkout='$ucout' and status='1') and status='1' and cid='$cid'";
                                $jr=  mysqli_query($con, $j);
                                $row=  mysqli_fetch_array($jr);
                                $rid=$row[0];
                                if(mysqli_num_rows($jr) > 0)
                                {?>
        <form action="bookingform.php" method="POST">
            <input type="hidden" name="room_id" value="<?php echo $rid;?>">
            <input type="hidden" name="cindate" value="<?php echo $ucin;?>">
            <input type="hidden" name="coutdate" value="<?php echo $ucout;?>">
            <input type="submit" class="btn btn-success" value="Want to book?" name="btn-book">
        </form>
                                    <?php
                                    
                                }
                                else {
                                    echo 'Sorry Room Not Available of your choice!';
                                }
                            }
?>
        
        
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<span class="subheading">Read Blog</span>
					<h2>Recent Blog</h2>
				</div>
			</div>
			<div class="row d-flex">
				<div class="col-md-4 d-flex ftco-animate">
					<div class="blog-entry align-self-stretch">
						<a href="blog-single.php" class="block-20 rounded"
							style="background-image: url('images/image_1.jpg');">
						</a>
						<div class="text mt-3 text-center">
							<div class="meta mb-2">
								<div><a href="#">Oct. 30, 2019</a></div>
								<div><a href="#">Admin</a></div>
								<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
							</div>
							<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
									blind texts</a></h3>
						</div>
					</div>
				</div>
				<div class="col-md-4 d-flex ftco-animate">
					<div class="blog-entry align-self-stretch">
						<a href="blog-single.php" class="block-20 rounded"
							style="background-image: url('images/image_2.jpg');">
						</a>
						<div class="text mt-3 text-center">
							<div class="meta mb-2">
								<div><a href="#">Oct. 30, 2019</a></div>
								<div><a href="#">Admin</a></div>
								<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
							</div>
							<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
									blind texts</a></h3>
						</div>
					</div>
				</div>
				<div class="col-md-4 d-flex ftco-animate">
					<div class="blog-entry align-self-stretch">
						<a href="blog-single.php" class="block-20 rounded"
							style="background-image: url('images/image_3.jpg');">
						</a>
						<div class="text mt-3 text-center">
							<div class="meta mb-2">
								<div><a href="#">Oct. 30, 2019</a></div>
								<div><a href="#">Admin</a></div>
								<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
							</div>
							<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the
									blind texts</a></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="instagram">
		<div class="container-fluid">
			<div class="row no-gutters justify-content-center pb-5">
				<div class="col-md-7 text-center heading-section ftco-animate">
					<span class="subheading">Photos</span>
					<h2><span>Instagram</span></h2>
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col-sm-12 col-md ftco-animate">
					<a href="images/insta-1.jpg" class="insta-img image-popup"
						style="background-image: url(images/insta-1.jpg);">
						<div class="icon d-flex justify-content-center">
							<span class="icon-instagram align-self-center"></span>
						</div>
					</a>
				</div>
				<div class="col-sm-12 col-md ftco-animate">
					<a href="images/insta-2.jpg" class="insta-img image-popup"
						style="background-image: url(images/insta-2.jpg);">
						<div class="icon d-flex justify-content-center">
							<span class="icon-instagram align-self-center"></span>
						</div>
					</a>
				</div>
				<div class="col-sm-12 col-md ftco-animate">
					<a href="images/insta-3.jpg" class="insta-img image-popup"
						style="background-image: url(images/insta-3.jpg);">
						<div class="icon d-flex justify-content-center">
							<span class="icon-instagram align-self-center"></span>
						</div>
					</a>
				</div>
				<div class="col-sm-12 col-md ftco-animate">
					<a href="images/insta-4.jpg" class="insta-img image-popup"
						style="background-image: url(images/insta-4.jpg);">
						<div class="icon d-flex justify-content-center">
							<span class="icon-instagram align-self-center"></span>
						</div>
					</a>
				</div>
				<div class="col-sm-12 col-md ftco-animate">
					<a href="images/insta-5.jpg" class="insta-img image-popup"
						style="background-image: url(images/insta-5.jpg);">
						<div class="icon d-flex justify-content-center">
							<span class="icon-instagram align-self-center"></span>
						</div>
					</a>
				</div>
			</div>
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