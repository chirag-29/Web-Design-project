<?php
	
	session_start();

	defined('DB_HOST') or define('DB_HOST','localhost');
	defined('DB_USER') or define('DB_USER','root');
	defined('DB_PASS') or define('DB_PASS',"");
	defined('DB_NAME') or define('DB_NAME','project');

	$link = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	if(!$link)
	{
		die("ERROR".mysqli_connect_error());//gives if information about the error caused during the link or connection
	}


if(isset($_POST['submitbutton']))
{

	$name=mysqli_real_escape_string($link,$_POST['c_name']);
	$postal=mysqli_real_escape_string($link,$_POST['pcode']);
	$email=mysqli_real_escape_string($link,$_POST['c_email']);
	$address=mysqli_real_escape_string($link,$_POST['c_address']);
	$phone=mysqli_real_escape_string($link,$_POST['c_phone']);
	$ctype=mysqli_real_escape_string($link,$_POST['c_type']);
	$complain=mysqli_real_escape_string($link,$_POST['comp']);
	$errors=array();



/*	echo $name;
	echo $postal;
	echo $email;
	echo $address;
	echo $phone;
	echo $ctype;
	echo $complain;  */
		//echo $ctype."<br>";


	if(empty($name)){
		array_push($errors,"Enter your name");
		echo 'error1';
		}

	if(empty($postal)){
		array_push($errors,"Enter your pincode");
				echo 'error2';
		}

	if(empty($email)){
		array_push($errors,"Enter your email");
				echo 'error3';
		}
	if(empty($address)){
		array_push($errors,"Enter your address");
		echo '4';
		}
	if(empty($phone)){
		array_push($errors,"Enter your phone number");
		echo '5';
		}
	if(empty($ctype)){
		array_push($errors,"select the case type"); echo'6';
		}
	if(empty($complain)){
		array_push($errors,"Enter your complain");   echo'7';
		}
	if (count($errors) == 0){

	
		$query="INSERT INTO complainant(complainant_id,c_name,c_address,email,postal_code) 
		VALUES (NULL,'$name','$address','$email','$postal');";

		$result=mysqli_query($link,$query);//add the connection object with the query


	// for adding the phone number into another table

		$query1="SELECT * FROM complainant ORDER BY complainant_id DESC LIMIT 1;";
		$result1=mysqli_query($link,$query1);


		$row1=mysqli_fetch_array($result1);
		$complainant_id=$row1["complainant_id"];

		$query2="INSERT into phone_number (ph_no,complainant_id) VALUES ('$phone','$complainant_id');";
		$result2=mysqli_query($link,$query2);


		
		$query3="INSERT INTO cases (case_id,description,officer_id,complainant_id,criminal_id,type,outcome_id,inspector_id) VALUES (NULL,'$complain',NULL,'$complainant_id',NULL,'$ctype',NULL,'1')";
		$resul=mysqli_query($link,$query3);


		$query4="SELECT * FROM cases ORDER BY case_id DESC LIMIT 1;";
		$result4=mysqli_query($link,$query4);
		$r=mysqli_fetch_array($result4);
		$case_id=$r['case_id'];
		$outcome_id=$case_id;
		$_SESSION['case_id'] = $case_id;


		$query5="INSERT INTO outcome (outcome_id,status,case_id,complainant_id,conclusion) VALUES ('$outcome_id','not solved','$case_id','$complainant_id',NULL)";
		$result5=mysqli_query($link,$query5);

		$query6="UPDATE cases SET outcome_id='$outcome_id' WHERE case_id='$case_id' ";
		mysqli_query($link,$query6);


		header('location: after_complain.php');

	}



}




?>
<html>
	<head>
		<title>Complaint</title>
		<link  rel="stylesheet" type="text/css" href="complaint.css" >
		<link rel="stylesheet" href="css/normalize.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

	<body>
<!--

		<div id="header1">
		<h3 id="header2">HELPLINE NUMBERS</h3>
		<marquee id="marquee">Help the Police, SMS your grievance on 119986000 or 88880000, Police Control Room 100, Traffic Whatsapp Helpline 8454678988, Alert Citizen 103</marquee>					

			<div class="clr"></div>
		</div>
		
-->

<!--
		<header id="main_header">
			<nav id="navbar">
				<h1>MUMBAI POLICE <br>
				DEPARTMENT</h1>
							
				
				<div>
				<ul>						
					<li><a href="firstpage.html">HOME</a></li>
					<li><a href="complaint2.html">COMPLAIN</a></li>
					<li><a href="login.html">SPECIAL UNITS</a></li>
					<li><a href="tips.html">SAFETY TIPS</a></li>
					<li><a href="complainant login.html">CONTACT</a></li>
				</ul>
			    </div>
			</nav>
		</header>
-->

				<div class="row">
			<div id="header1">
			<div id="header2">
				<div>HELPLINE NUMBERS</div>
			</div>
			<div id="marquee">
				<marquee>Help the Police, SMS your grievance on 119986000 or 88880000, Police Control Room 100, Traffic Whatsapp Helpline 8454678988, Alert Citizen 103</marquee>	
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
<!--
    		<div class="col-sm-8" id="navigation">		
				<nav id="navbar">
					<ul>
						<li><a href="firstpage.html">HOME</a></li>
						<li><a href="complaint2.html">COMPLAIN</a></li>
						<li><a href="login.html">SPECIAL UNITS</a></li>
						<li><a href="tips.html">SAFETY TIPS</a></li>
						<li><a href="complainant login.html">CONTACT</a></li>
					</ul>
				</nav>
			</div>
-->
						
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

		

		<section id="main">
			<div id="text" class="clearfix">

				<h4 class="disclaimer">DISCLAIMER </h4>

				<p class="yo">This site shall entertain complaints about minor crimes ('non-cognizable crimes') and major crimes ('cognizable crimes like theft, burglary, motor vehicle theft, accident, chain-snatching, assault, rape, murder, attempt to commit murder, robbery, dacoity, extortion etc).As per the prevailing laws, your complaint shall be referred to the concerned Police Station, where you may be called for further clarification and/or to give statement.</p>
				<br>

				<img id="img" src="images/complaint.jpg" >
				<h4 class="disclaimer">FALSE COMPLAINT</h4>
				<h5>The City Police insists that people should refrain from lodging false complaints as it is an offence and is punishable by the law. It must also be understood that complaints can be tracked and people who lodge false complaints can be booked under the following provision of the law.</h5><br>
				<p class="yo">As per Section 182 of Indian Penal Code 1860, whoever gives to any public servant any information which he knows or believes to be false, shall be punished with imprisonment of either description for a term which may extend to six months, or with fine which may extend to one thousand rupees, or with both.
				As Per Section 211 of Indian Penal Code 1860, Whoever, with intent to cause injury to any person, institutes or causes to be instituted any criminal proceeding against that person, or falsely charges any person with having committed an offence, knowing that there is no just or lawful ground for such proceeding or charge against that person, shall be punished with imprisonment of either description for a term which may extend to two years, or with fine, or with both; and if such criminal proceeding be instituted on a false charge of an offence punishable with death, imprisonment for life, or imprisonment for seven years or upwards, shall be punishable with imprisonment of either description for a term which may extend to seven years, and shall also be liable to fine.
				</p>
			</div>
			


			<div id="f_div">
				<form id="form" action="complaint.php" method="POST">
					<fieldset id="feildset" >
						<legend>Complaint</legend>

						<label>Your Name:</label><br>
						<input type="text" name="c_name" placeholder="Your full name"  >
						<br>
						<label>Email:</label><br>
						<input type="Email" name="c_email" placeholder="abc@xyz.com"  >
						<br>
						<label>Address:</label><br>
						<input type="text" name="c_address"  >
						<br>
						<label>Postal Code:</label><br>
						<input type="text" name="pcode">
						<br>
							
						

						<label>Complaint Type:</label><br>
						<div id="rad">
								<input class="r" type="radio" name="c_type" value="Complaint"><label>Complaint</label><br>
								<input class="r" type="radio" name="c_type" value="Minor Crime"><label>Minor Crime</label><br>
								<input class="r" type="radio" name="c_type" value="Serious Crime"><label>Serious Crime</label><br>
						</div>
						<!--<label class="label">Police Station:</label><br>
						<select name="Police Station">
							<option value="a">a</option>
							<option value="b">b</option>
							<option value="c">c</option>
						</select> -->


						<label>Phone Number:</label><br>
						<input type="text" name="c_phone">
						<br>

						<label>Your Complaint:</label>
						<br>
						<textarea cols="30" rows="3" name="comp"></textarea>
						<br>
						<input id="submit" type="submit" value="Submit" class="btn-primary" onclick="location.href=demo.php" name="submitbutton">
						<input id="reset" type="reset" value="Clear" class="btn-primary">
						
					</fieldset>
				</form>
			</div>
		</section>


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
			<li><a href="#">HOME</a></li>
			<li><a href="#">ABOUT US</a></li>
			<li><a href="#">SPECIAL UNITS</a></li>
			<li><a href="#">SAFETY UNITS</a></li>
			<li><a href="#">CONTACT</a></li>
			</ul>
			</div>

			<p class="copyright">Copyright 2018 &copy;<strong>City Police</strong><br>All Rights Reserved</p>
			
		</footer>
		</div>
	</body>
</html>