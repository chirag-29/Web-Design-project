<?php
	
	session_start();

	$db_host = 'localhost'; // Server Name
	$db_user = 'root'; // Username
	$db_pass = ''; // Password
	$db_name = 'project'; // Database Name



	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	if (!$conn) {
		die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
		}



	$status="";
	$criminal_name="";
	$conclusion="";
	$errors=array();

	if(isset($_POST['submit'])){
		$status =mysqli_real_escape_string($conn,$_POST['status']);
		$criminal_name =mysqli_real_escape_string($conn,$_POST['criminal_name']);
		$conclusion =mysqli_real_escape_string($conn,$_POST['conclusion']);

	}

	if(empty($status)){
		array_push($errors,"status not updated");
	}

	if(empty($criminal_name)){
		array_push($errors,"criminal_name is reqd");
	}

	if(empty($conclusion)){
		array_push($errors,"conclusion is reqd");
	}



    if(count($errors) ==0){	
    	//$sql="UPDATE outcome SET(name,email,type) VALUES ('$name','$email','$type')";
    	//mysqli_query($link,$sql);
    	$case_id=$_SESSION['case_id'];

    	$p="SELECT * FROM criminal WHERE criminal_name='$criminal_name' ";
		$res=mysqli_query($conn,$p);
		$ress=mysqli_fetch_array($res);
		$temp=$ress['criminal_name'];

		if($criminal_name == $temp){
			$criminal_id=$ress['criminal_id'];

    		$sq3="UPDATE cases SET criminal_id='$criminal_id' WHERE case_id='$case_id' "; 
    		mysqli_query($conn,$sq3);
		}

		else{

	    	$sq1="INSERT INTO criminal (criminal_name,case_id) VALUES ('$criminal_name','$case_id') ";
	    	mysqli_query($conn,$sq1);


	    	$query4="SELECT * FROM criminal ORDER BY criminal_id DESC LIMIT 1;";
			$result4=mysqli_query($conn,$query4);
			$r=mysqli_fetch_array($result4);
			$criminal_id=$r['criminal_id'];


	    	$sq3="UPDATE cases SET criminal_id='$criminal_id' WHERE case_id='$case_id' "; 
	    	mysqli_query($conn,$sq3);
	    }

	    $sq="UPDATE outcome SET status='$status' , conclusion='$conclusion' WHERE case_id='$case_id' ";
	   	mysqli_query($conn,$sq);


    	echo '<h1> UPDATION COMPLETED </h1>';
    	
    }
    else{
    	echo '<h1> UPDATION FAILED </h1>';
    	echo  $errors[0];
    }


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="officer_after_login.php"><button>BACK</button></form>
</body>
</html>