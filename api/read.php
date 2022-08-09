<?php 
//headers 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

//initializing our api
include_once("../core/initialize.php");



//instatiate post class
$post = new post($db);

//read

$result = $post->read();

$num = $result->rowCount();

if ($num) {
    $post_array =  array();
    $post_array['data'] = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
       'id'=>$id,
       'title'=>$title,
       'body' =>html_entity_decode($body),
       'category_id' =>$category_id,
       'category_name' => $category_name
 );
 array_push($post_array['data'],$post_item);

    }
echo json_encode($post_array);

}else{
    echo json_encode(array("message"=>"no data found"));

}













?>