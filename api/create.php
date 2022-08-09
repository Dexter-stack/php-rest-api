<?php 





//headers 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header('Access-Control-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Methods,Authorization,X-Requested-With');

//initializing our api
include_once("../core/initialize.php");



//instatiate post class
$post = new post($db);
//get raw posted data
$data = json_decode(file_get_contents("php://input"));

$post->title = $data->title;
$post->body = $data->body;
$post->aurthor = $data->aurthor;
$post->category_id = $data->category_id;

//create post
if($post->create()){
  
    echo json_encode(array('message'=>'post created successfully'));
}else{
    echo json_encode(array("message"=>'post not created'));
}










?>


















