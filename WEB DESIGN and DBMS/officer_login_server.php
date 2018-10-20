<?php
	session_start();

	$user='root';
	$pass='';
	$db='project';
	$link=mysqli_connect('localhost',$user,$pass,$db); 

	if (!$link) {
		die("ERROR". mysqli_connect_error());
		
	}
	
	$id="";
	$pwd="";
	$errors=array();
	if(isset($_POST['submit'])){
		$id =mysqli_real_escape_string($link,$_POST['id']);
		$pwd =mysqli_real_escape_string($link,$_POST['pwd']);
	}



	if(empty($id)){
		array_push($errors,"ID not filled");
	}

	if(empty($pwd)){
		array_push($errors,"Enter your password");
	}




	if (count($errors) == 0) {
	  	//$pwd = md5($pwd);
	  	$query = "SELECT * FROM officer WHERE officer_id='$id' AND password='$pwd'";
	  	$results = mysqli_query($link, $query);
	  	if (mysqli_num_rows($results) == 1) {
	  	  $_SESSION['id'] = $id;
	  	  $_SESSION['success'] = "You are now logged in";
	  	  header('location: officer_after_login.php');
	  	}
  	}

	else {
	  	echo $errors[0];
  		header('location: officer_login.html');	  		
	}

?>

<?php
	//if (count($errors) > 0){

  		//foreach ($errors as $error){
  	//		echo "<script>alert('hi')</script>";
  				  	 // header('location: inspector_login.php');

		

	//}
	  
?>