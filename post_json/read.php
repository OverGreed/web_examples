<?php
function getPostJson($is_array = true) {
    return json_decode(file_get_contents('php://input'), $is_array);
}
$json = getPostJson();
$response = array();
if($json){
    $response['success'] = true;
    $response['username'] = $json['username'];
} else {
    $response['success'] = false;
}

echo json_encode($response);
