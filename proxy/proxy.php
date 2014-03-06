<?php
if(isset($_GET['id'])){
    $url = "https://graph.facebook.com/{$_GET['id']}?fields=id,name,picture";
    $response = file_get_contents($url);
    echo $response;
}
?>
