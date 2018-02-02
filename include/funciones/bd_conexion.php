<?php 
//echo phpinfo();

$conn = new mysqli("172.31.24.67","root","multiservis","gdlwebcamp");

if($conn->connect_errno)
{
	echo "horror en conexion db \n";
	echo $conn->connect_error;
}

 /* change character set to utf8 */
    if (!$conn->set_charset("utf8")) {
        printf("Error loading character set utf8: %s\n", $conn->error);
    } else {
        //printf("Current character set: %s\n", $conn->character_set_name());
    }
    
?>
