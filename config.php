<?php
$server_name ='localhost';
$db_user_name ='root';
$db_password ='';
$db_name ='silk_shop';

date_default_timezone_set('UTC');

$conn = mysqli_connect($server_name, $db_user_name, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

session_start();
?>