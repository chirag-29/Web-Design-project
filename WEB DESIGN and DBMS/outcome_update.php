<?php

	session_start();

	//echo $_POST['foo'];
	$id=$_POST['foo']; 
	$_SESSION['case_id']=$id;

	echo $_SESSION['case_id']; 
?>

<!DOCTYPE html>
<html>
<head>
	<title>officer_edit</title>
</head>


<?php
				//echo'	<label>Address:</label><br>
				//		<input type="text" name="c_address" value="'.$hi.'" >';
?>
<body>

	<?php
		echo '<h1> For case_id  '.$id.'</h1>'
	?>
			<div id="f_div">
				<form id="form" action="officer_after_login_updation.php" method="POST">
					<fieldset id="feildset" >
						<legend>Updation</legend>


						<label class="label">Status:</label><br>
						<select name="status">
							<option value="solved">Solved</option>
							<option value="rejected">Rejected</option>
						</select> 


						<br>
						<label>criminal name:</label><br>
						<input type="text" name="criminal_name" >
						<br>
						<label>Conclusion:</label><br>
						<input type="text" name="conclusion">

						
						<br>
						<button id="submit" type="submit" name="submit">Submit</button>
						
					</fieldset>
				</form>
			</div>
	</body>
</html>