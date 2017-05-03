<?php
//Токен брать тут u.to/token-vk-dlja-avtostatusa/EnTlBQ
//Токен брать тут u.to/super_access_token/uVy-Bw
$access_token = 'Токен'; 
$owner_id = 'ID Только цифры';
$text = 'ТЕСТ флуда в ЛС'; 

$wall_post = curl('https://api.vk.com/method/messages.send?uid='.$owner_id.'&message='.urlencode($text).'&access_token='.$access_token);
$json = json_decode($wall_post,1);
if ($json['response']['post_id']){
echo '133312.Tk';
}
else{
echo 'Error!';
print_r($json);
}

function curl($url){
$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
$response = curl_exec( $ch );
curl_close( $ch );
return $response;
} 
?><!-- http://vk.com/alexsywindows -->