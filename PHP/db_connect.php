<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "HRCS";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
//else
//{
//	echo ("connection success");
//}


?>