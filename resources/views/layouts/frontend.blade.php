< !DOCTYPE html>
	<html lang="en">


	<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Jul 2023 16:00:00 GMT -->

	<head>
		<title>MyHotel - Hotel Booking and Room Booking Online Html Responsive Template</title>
		<!-- META TAGS -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- FAV ICON(BROWSER TAB ICON) -->
		<link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
		<!-- GOOGLE FONT -->
		<link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:500,700" rel="stylesheet">
		<!-- FONTAWESOME ICONS -->
		<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
		<!-- ALL CSS FILES -->
		<link href="{{asset('frontend/css/materialize.css')}}" rel="stylesheet">
		<link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
		<link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
		<!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
		<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
											<script src="js/html5shiv.js"></script>
											<script src="js/respond.min.js"></script>
											<![endif]-->
	</head>

	<body data-ng-app="">
		<!--MOBILE MENU-->
		<section>
			<div class="mm">
				<div class="mm-inn">
					<div class="mm-logo">
						<a href="main.html"><img src="{{asset('frontend/images/logo.png')}}" alt="">
						</a>
					</div>
					<div class="mm-icon"><span><i class="fa fa-bars show-menu" aria-hidden="true"></i></span>
					</div>
					<div class="mm-menu">
						<div class="mm-close"><span><i class="fa fa-times hide-menu" aria-hidden="true"></i></span>
						</div>
						<ul>
							<li><a href="main.html">Home - Default</a>
							</li>
							<li><a href="index-1.html">Home - Reservation</a>
							</li>
							<li><a href="index-2.html">Home - FullSlider</a>
							</li>
							<li><a href="index-3.html">Home - Block Color</a>
							</li>
							<li><a href="room-details.html">Room Details</a>
							</li>
							<li><a href="room-details-block.html">Room Details Block</a>
							</li>
							<li><a href="hotel-details.html">Hotel Details</a>
							</li>
							<li><a href="hotel-detail.html">Hotel Details - 1</a>
							</li>
							<li><a href="about-us.html">About Us</a>
							</li>
							<li><a href="aminities.html">Aminities</a>
							</li>
							<li><a href="aminities1.html">Aminities - 1</a>
							</li>
							<li><a href="menu.html">Food Menu</a>
							</li>
							<li><a href="menu1.html">Food Menu - 1</a>
							</li>
							<li><a href="blog.html">Blog</a>
							</li>
							<li><a href="blog-inner.html">Blog Inner</a>
							</li>
							<li><a href="dashboard.html">User Dashboard</a>
							</li>
							<li><a href="db-activity.html">DB Activity</a>
							</li>
							<li><a href="db-booking.html">DB-Booking</a>
							</li>
							<li><a href="db-event.html">DB-Event</a>
							</li>
							<li><a href="db-new-booking.html">DB New Booking</a>
							</li>
							<li><a href="booking.html">Booking</a>
							</li>
							<li><a href="collapsible.html">Collapsible</a>
							</li>
							<li><a href="events.html">Events</a>
							</li>
							<li><a href="form-fields.html">Form Fields</a>
							</li>
							<li><a href="preloading.html">Preloading</a>
							</li>
							<li><a href="gallery.html">Gallery</a>
							</li>
							<li><a href="gallery1.html">Gallery - 1</a>
							</li>
							<li><a href="gallery2.html">Gallery - 2</a>
							</li>
							<li><a href="detail.html">Room Detail</a>
							</li>
							<li><a href="all-rooms.html">All Rooms</a>
							</li>
							<li><a href="all-rooms1.html">All Rooms - 1</a>
							</li>
							<li><a href="services.html">Services</a>
							</li>
							<li><a href="services1.html">Services - 1</a>
							</li>
							<li><a href="typho-grid.html">Grid Layout</a>
							</li>
							<li><a href="typo-alert.html">Alert Messages</a>
							</li>
							<li><a href="typo-all-head.html">All Headers</a>
							</li>
							<li><a href="typo-badges-labels.html">Labels</a>
							</li>
							<li><a href="typo-buttons.html">Buttons</a>
							</li>
							<li><a href="typo-pagination.html">Pagination</a>
							</li>
							<li><a href="typo-progressbar.html">Progressbar</a>
							</li>
							<li><a href="typo-slider.html">Image Sliders</a>
							</li>
							<li><a href="typo-table.html">Table</a>
							</li>
							<li><a href="typo-buttons.html">Buttons</a>
							</li>
							<li><a href="typo-pagination.html">Pagination</a>
							</li>
							<li><a href="typo-progressbar.html">Progressbar</a>
							</li>
							<li><a href="sitemap.html">Sitemap</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!--HEADER SECTION-->
		<section>
			<!--TOP SECTION-->
			@include('parts.frontend.header')
			<!--TOP SECTION-->
			<!--Check Availability SECTION-->

			<!--End Check Availability SECTION-->
			<!--HOTEL ROOMS SECTION-->
			@yield('content')
			<div class="">
				<div>
					<!--TOP SECTION-->
					<div class="hom-footer-section">
						<div class="container">
							<div class="row">
								<div class="foot-com foot-1">
									<ul>
										<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
										</li>
										<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
										</li>
										<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
										</li>
									</ul>
								</div>
								<div class="foot-com foot-2">
									<h5>Phone: (+404) 142 21 23 78</h5>
								</div>
								<div class="foot-com foot-3">
									<!--<a class="waves-effect waves-light" href="#">online room booking</a>--><a
										class="waves-effect waves-light" href="booking.html">room reservation</a>
								</div>
								<div class="foot-com foot-4">
									<a href="#"><img src="{{asset('frontend/images/card.png')}}" alt="" />
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--END HEADER SECTION-->
		@include('parts.frontend.footer')
		<section class="copy">
			<div class="container">
				<p>copyrights © 2017 RN53Themes.net. &nbsp;&nbsp;All rights reserved. </p>
			</div>
		</section>
		<section>
			<!-- LOGIN SECTION -->
			<div id="modal1" class="modal fade" role="dialog">
				<div class="log-in-pop">
					<div class="log-in-pop-left">
						<h1>Hello... <span></span></h1>
						<p>Don't have an account? Create your account. It's take less then a minutes</p>
						<h4>Login with social media</h4>
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
							</li>
							<li><a href="#"><i class="fa fa-google"></i> Google+</a>
							</li>
							<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
							</li>
						</ul>
					</div>
					<div class="log-in-pop-right">
						<a href="#" class="pop-close" data-dismiss="modal"><img
								src="{{asset('frontend/images/cancel.png')}}" alt="" />
						</a>
						<h4>Login</h4>
						<p>Don't have an account? Create your account. It's take less then a minutes</p>
						<form class="s12">
							<div>
								<div class="input-field s12">
									<input type="text" data-ng-model="name" class="validate">
									<label>User name</label>
								</div>
							</div>
							<div>
								<div class="input-field s12">
									<input type="password" class="validate">
									<label>Password</label>
								</div>
							</div>
							<div>
								<div class="s12 log-ch-bx">
									<p>
										<input type="checkbox" id="test5" />
										<label for="test5">Remember me</label>
									</p>
								</div>
							</div>
							<div>
								<div class="input-field s4">
									<input type="submit" value="Login" class="waves-effect waves-light log-in-btn">
								</div>
							</div>
							<div>
								<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal"
										data-target="#modal3">Forgot password</a> | <a href="#" data-dismiss="modal"
										data-toggle="modal" data-target="#modal2">Create a new account</a> </div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- REGISTER SECTION -->
			<div id="modal2" class="modal fade" role="dialog">
				<div class="log-in-pop">
					<div class="log-in-pop-left">
						<h1>Hello... <span></span></h1>
						<p>Don't have an account? Create your account. It's take less then a minutes</p>
						<h4>Login with social media</h4>
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
							</li>
							<li><a href="#"><i class="fa fa-google"></i> Google+</a>
							</li>
							<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
							</li>
						</ul>
					</div>
					<div class="log-in-pop-right">
						<a href="#" class="pop-close" data-dismiss="modal"><img
								src="{{asset('frontend/images/cancel.png')}}" alt="" />
						</a>
						<h4>Create an Account</h4>
						<p>Don't have an account? Create your account. It's take less then a minutes</p>
						<form class="s12">
							<div>
								<div class="input-field s12">
									<input type="text" data-ng-model="name1" class="validate">
									<label>User name</label>
								</div>
							</div>
							<div>
								<div class="input-field s12">
									<input type="email" class="validate">
									<label>Email id</label>
								</div>
							</div>
							<div>
								<div class="input-field s12">
									<input type="password" class="validate">
									<label>Password</label>
								</div>
							</div>
							<div>
								<div class="input-field s12">
									<input type="password" class="validate">
									<label>Confirm password</label>
								</div>
							</div>
							<div>
								<div class="input-field s4">
									<input type="submit" value="Register" class="waves-effect waves-light log-in-btn">
								</div>
							</div>
							<div>
								<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal"
										data-target="#modal1">Are you a already member ? Login</a> </div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- FORGOT SECTION -->
			<div id="modal3" class="modal fade" role="dialog">
				<div class="log-in-pop">
					<div class="log-in-pop-left">
						<h1>Hello... <span></span></h1>
						<p>Don't have an account? Create your account. It's take less then a minutes</p>
						<h4>Login with social media</h4>
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
							</li>
							<li><a href="#"><i class="fa fa-google"></i> Google+</a>
							</li>
							<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
							</li>
						</ul>
					</div>
					<div class="log-in-pop-right">
						<a href="#" class="pop-close" data-dismiss="modal"><img
								src="{{asset('frontend/images/cancel.png')}}" alt="" />
						</a>
						<h4>Forgot password</h4>
						<p>Don't have an account? Create your account. It's take less then a minutes</p>
						<form class="s12">
							<div>
								<div class="input-field s12">
									<input type="text" data-ng-model="name3" class="validate">
									<label>User name or email id</label>
								</div>
							</div>
							<div>
								<div class="input-field s4">
									<input type="submit" value="Submit" class="waves-effect waves-light log-in-btn">
								</div>
							</div>
							<div>
								<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal"
										data-target="#modal1">Are you a already member ? Login</a> | <a href="#"
										data-dismiss="modal" data-toggle="modal" data-target="#modal2">Create a new
										account</a> </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>

		<script>
			document.getElementById("submitButton").addEventListener("click", function(event) {
event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>

  // Tìm đến form và gửi form
document.getElementById("myForm").submit();



});

		</script>
		<!--ALL SCRIPT FILES-->
		<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
		<script src="{{asset('frontend/js/jquery-ui.js')}}"></script>
		<script src="{{asset('frontend/js/angular.min.js')}}"></script>
		<script src="{{asset('frontend/js/bootstrap.js')}}" type="text/javascript"></script>
		<script src="{{asset('frontend/js/materialize.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('frontend/js/jquery.mixitup.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('frontend/js/custom.js')}}"></script>
	</body>


	<!-- Mirrored from rn53themes.net/themes/demo/the-royal-hotel/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Jul 2023 16:00:19 GMT -->

	</html>