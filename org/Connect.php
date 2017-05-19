<?php


// $servername = "mysql.hostinger.in.th";
// $username = "u111028414_root";
// $password = "123456";
// $dbname = "u111028414_icare";

$servername = "mysql.hostinger.in.th";
$username = "u111028414_root";
$password = "123456";
$dbname = "u111028414_icare";





// Create connection
$conn = new mysqli($servername, $username, $password, $dbname );

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
	//echo "Connected successfully";
	mysqli_set_charset($conn,"utf8");
}

?> 
