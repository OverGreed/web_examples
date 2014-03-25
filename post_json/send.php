<?php
function request($url, $data) {
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Accept: application/json',
    ));

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 

    $response = curl_exec($ch);
    
    if($response){
        return json_decode($response);
    }
    return false;
}
$user = array(
    'id' => 1,
    'username' => 'jon123',
    'first_name' => 'Jon',
    'last_name' => 'Dou',
    'articles' => array(
        array(
            'id'=>1,
            'title' => 'My First Page',
            'content' => '<h1>Hello it my first page</h1>',
            'comments' => array(
                array(
                    'id'=>1,
                    'username' => 'Jack',
                    'text' => 'Hey it is a great blog!'
                ),
                array(
                    'id'=>2,
                    'username' => 'Nick',
                    'text' => '+100500!'
                )
            )
        ),
        array(
            'id'=>2,
            'title' => 'Free time',
            'content' => 'Do you have any free time?',
            'comments' => array(
                array(
                    'id'=>3,
                    'username' => 'Nick',
                    'text' => 'Free time? You are joking?'
                )
            )
        )
    )
);
$url = 'http://super.dev/json/read.php';
$response = request($url, $user);
echo '<pre>';
print_r($response);
echo '</pre>';
