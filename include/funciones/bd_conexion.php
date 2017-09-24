<?php 
//echo phpinfo();

$conn = new mysqli("127.0.0.1","root","multiservis","gdlwebcamp");

if($conn->connect_errno)
{
	echo "horror en conexion db \n";
	echo $conn->connect_error;
}
?>