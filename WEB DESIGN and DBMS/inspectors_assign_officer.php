<?php

	session_start();

	//echo $_POST['foo'];
	$id=$_POST['foo']; 
	$_SESSION['case_id']=$id;

	echo $_SESSION['case_id']; 

	$db_host = 'localhost'; // Server Name
	$db_user = 'root'; // Username
	$db_pass = ''; // Password
	$db_name = 'project'; // Database Name

	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	if (!$conn) {
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
	}
	$sql ="SELECT * FROM officer";   
  	$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	  <title>Displaying MySQL Data in HTML Table</title>
  <style type="text/css">
    body {
      font-size: 15px;
      color: #343d44;
      font-family: "segoe-ui", "open-sans", tahoma, arial;
      padding: 0;
      margin: 0;
    }
    table {
      margin: auto;
      font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
      font-size: 12px;
    }

    h1 {
      margin: 25px auto 0;
      text-align: center;
      text-transform: uppercase;
      font-size: 17px;
    }

    table td {
      transition: all .5s;
    }
    
    /* Table */
    .data-table {
      border-collapse: collapse;
      font-size: 14px;
      min-width: 537px;
    }

    .data-table th, 
    .data-table td {
      border: 1px solid #e1edff;
      padding: 7px 17px;
    }
    .data-table caption {
      margin: 7px;
    }

    /* Table Header */
    .data-table thead th {
      background-color: #508abb;
      color: #FFFFFF;
      border-color: #6ea1cc !important;
      text-transform: uppercase;
    }

    /* Table Body */
    .data-table tbody td {
      color: #353535;
    }
    .data-table tbody td:first-child,
    .data-table tbody td:nth-child(4),
    .data-table tbody td:last-child {
      text-align: right;
    }

    .data-table tbody tr:nth-child(odd) td {
      background-color: #f4fbff;
    }
    .data-table tbody tr:hover td {
      background-color: #ffffa2;
      border-color: #ffff0f;
    }

    /* Table Footer */
    .data-table tfoot th {
      background-color: #e5f5ff;
      text-align: right;
    }
    .data-table tfoot th:first-child {
      text-align: left;
    }
    .data-table tbody td:empty
    {
      background-color: #ffcccc;
    }

    .data-table tbody button{
      margin:0;
      width:100px;
      color:black;
    }


  </style>  
</head>
<body>

  <table class="data-table">

    <thead>
      <tr>
        <th>CASE_ID</th>
        <th>DESCRIPTION</th>
        <th>TYPE</th>
        <th>OUTCOME</th>
      </tr>
    </thead>
    <tbody>

	<?php
		echo '<h1> For case_id  '.$id.'</h1>';

		while ($row = mysqli_fetch_array($query))
    	{


          echo'<tr>
                  <td>'.$row['officer_id'].'</td>
                  <td>'.$row['officer_name'].'</td>
                  <td>'.$row['department_name'].'</td>     
                  <td><form id="form" action="inspector_update_officer.php" method="POST"><button name="officer_id" value="'.$row['officer_id'].'">Assign</button></form></td>
              </tr>';
              //<button value=" $row['case_id ] "> <a href="hi.php">press me </a></button>
        }
	?>

	</tbody>
  	</table>
    <form action="inspector_display_conn.php"><button>BACK</button></form>
	<form action="inspector_logout.php"><button>LOGOUT</button></form>	
</body>
</html>