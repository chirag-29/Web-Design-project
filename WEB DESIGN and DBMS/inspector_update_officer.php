<?php
	session_start();

	$case_id=$_SESSION['case_id'];
	$officer_id=$_POST['officer_id'];


	$db_host = 'localhost'; // Server Name
	$db_user = 'root'; // Username
	$db_pass = ''; // Password
	$db_name = 'project'; // Database Name

	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	if (!$conn) {
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
	}


   	$sq="UPDATE cases SET officer_id='$officer_id'  WHERE case_id='$case_id' ";
   	mysqli_query($conn,$sq);

   	echo '<h1> UPDATION COMPLETED </h1>';


?>

<body>
	<form action="inspector_display_conn.php"><button>BACK</button></form>
</body>

