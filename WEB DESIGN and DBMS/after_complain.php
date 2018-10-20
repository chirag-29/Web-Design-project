<?php 
	session_start();

?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="first_final.css">	


		<style type="text/css">
			#middle-part{
				height:500px;
				text-align: center;
				padding-top: 100px;
			}
			#middle-part h1{
				font-family: Times New Roman;
				font-weight:bold;
				font-size: 50px;
				margin-bottom:40px; 
			}
		</style>	
	</head>

	<body>
		<div class="row">
			<div id="header1">
				<div id="header2">
					<div>HELPLINE NUMBERS</div>
				</div>
				<div id="marquee" >
					<marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">Help the Police, SMS your grievance on 119986000 or 88880000, Police Control Room 100, Traffic Whatsapp Helpline 8454678988, Alert Citizen 103</marquee>	
				</div>
				<div class="clr"></div>
			</div>
		</div>
		<div class="row">
    		<div class="col-sm-4" id="title">
				<header id="main_header">
				<h2>MUMBAI POLICE DEPARTMENT</h2>
				</header>
			</div>

						
			<div id="navigation">
				<nav>


					<ul>
						<li><a href="first_final.html">HOME</a></li>
						<li><a href="complaint.php">COMPLAIN</a></li>
						<li><a href="#">SPECIAL UNITS</a>
							<ul>
								<li class="dropdn"><a href="officer_login.html">Officer Login</a></li>
								<li class="dropdn"><a href="inspector_login.html">Inspector Login</a></li>
							</ul>
						</li>	
						<li><a href="#">SAFETY TIPS</a>
							<ul>
								<li class="dropdn"><a href="resident_tips.html">RESIDENT TIPS</a></li>
								<li class="dropdn"><a href="vehicletips.html" >VEHICLE TIPS</a></li>
							</ul>
						</li>
						<li><a href="#">CONTACT </a>
							<ul>
								<li class="dropdn"><a href="complainant_login.html"> STATUS</a></li>
								<li class="dropdn"><a href="maps.html" >MAPS</a></li>
							</ul>
						</li>

					</ul>
				</nav>
			</div>
		</div>

		<div id="middle-part">

			<?php 
				if ($_SESSION) {
					echo'<h1> YOUR CASE ID IS:  '.$_SESSION['case_id'].' </h1> 
						<h2>Note down the case id</h2>
						<h2>It will be required to check the status of your complaint</h2>';}
				else{
					echo '<h1>THANK YOU!</h1>';
				}
			?>

		</div>

		<footer>
			<div id="about_us">
				<h2><a href="#" id="link" style="text-decoration:none;padding-left: 40px;color: azure">ABOUT US</a></h2>
				<br>
				<div class="link">
					Mumbai Police shall ensure the Rule of Law, enforce the law of the land impartially and firmly without fear or favour, and strive to create a fear free environment that is conducive to growth and development.
				</div>
			</div>

			<div id="site_map"><h2>SITE MAP</h2>
			<br>
			<ul id="footer_site">
			<li><a href="first_final.html">HOME</a></li>
			<li><a href="complaint.php">COMPLAIN</a></li>
			<li><a href="#">SPECIAL UNITS</a></li>
			<li><a href="#">SAFETY TIPS</a></li>
			<li><a href="#">CONTACT</a></li>
			</ul>
			</div>

			<p class="copyright">Copyright 2018 &copy;<strong>City Police</strong><br>All Rights Reserved</p>
			
		</footer>
	</body>
</html>

<?php  session_destroy();
	
?>

