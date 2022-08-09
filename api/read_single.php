<?php 


//headers 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

//initializing our api
include_once("../core/initialize.php");



//instatiate post class
$post = new post($db);

$post->id = isset($_GET['id'])? $_GET['id'] : die();

    $post->id =$_GET['id'];
    
 //$post->aurthor = $_Get['aurthor'];
 $post->read_single();
 
 
 $post_arr = array(
  'id'=>$post->id,
  'title'=>$post->title,
  'body'=>$post->body,
  'aurthor'=>$post->aurthor,
  'category_id'=>$post->category_id,
  'category_name'=>$post->category_name
 );
 
 print_r(json_encode($post_arr));


    



















?>