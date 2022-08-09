<?php 
//Setings and database will be added here 

$db_user = "root";
$password ="";
$host = "localhost";
$db_name ="phprest";

$db = new PDO("mysql:host=$host;dbname=$db_name",$db_user,$password);
//set some attribute
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//$db->setAttribute(PDO::MYSQL_USE_BUFFERED_QUERY, true);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// if($db){
//  echo "connected";
// }
define('App name','PHP REST API TUTORIAL');










?>