<?php ob_start();

// $db['db_host'] = "localhost";
// $db['db_user'] = "root";
// $db['db_pass'] = "123456";
// $db['db_name'] = "yii2_icare";

$db['db_host'] = "mysql.hostinger.in.th";
$db['db_user'] = "u111028414_root";
$db['db_pass'] = "123456";
$db['db_name'] = "u111028414_icare";


foreach($db as $key => $value){
define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);



$query = "SET NAMES utf8";
mysqli_query($connection,$query);

// if($connection) {

// echo "We are connected";

// }else{
// 	echo "not connect";
// }




?>