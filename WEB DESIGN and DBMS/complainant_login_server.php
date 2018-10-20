<?php
	session_start();

	$user='root';
	$pass='';
	$db='project';
	$link=mysqli_connect('localhost',$user,$pass,$db); 

	if (!$link) {
		die("ERROR". mysqli_connect_error());
	}
	
	$email="";
	$case_id="";
	$errors=array();
if(isset($_POST['submit'])){
		$email =mysqli_real_escape_string($link,$_POST['email']);
		$case_id =mysqli_real_escape_string($link,$_POST['case_id']);
	


	$_SESSION['case_id']=$case_id;



	if(empty($email)){
		array_push($errors,"Enteer your email");
	}

	if(empty($case_id)){
		array_push($errors,"Enter your Case id");
	}

	if (count($errors) == 0) {
	  	//$pwd = md5($pwd);
	  	$query = "SELECT * FROM outcome WHERE case_id='$case_id' AND complainant_id= ANY(SELECT complainant_id FROM complainant WHERE email='$email')";
	  	$results = mysqli_query($link, $query);
	  	if (mysqli_num_rows($results) == 1) {
	  	  $_SESSION['id'] = $case_id;
	  	  $_SESSION['success'] = "You are now logged in";

	  	  echo 'hii';
	  	  header('location: complain_status.php');
	  	}else {
	  		array_push($errors, "Wrong id/password combination");
	  	}
  	}

  	else{
	  	header('location: complainant_login.html');
  	}
}
?>


