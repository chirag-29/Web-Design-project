<?php


defined('DB_HOST') or define('DB_HOST','localhost');
defined('DB_USER') or define('DB_USER','root');
defined('DB_PASS') or define('DB_PASS',"");
defined('DB_NAME') or define('DB_NAME','project');

$link = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if(!$link)
{
	die("ERROR".mysqli_connect_error());//gives if information about the error caused during the link or connection
}
?>