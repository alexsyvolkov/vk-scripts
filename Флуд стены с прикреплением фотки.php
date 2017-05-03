<?php
//Токен брать тут u.to/token-vk-dlja-avtostatusa/EnTlBQ
//Токен брать тут u.to/super_access_token/uVy-Bw
$access_token = 'Токен'; 

$owner_id = 'ID'; //  (ID пользователя, просто вводим цифры)   Если для группы то (именно нужен минус) -ID

$attached = array('ФОТКА','ФОТКА 2','ФОТКА 3','ФОТКА 4','ФОТКА 5','ФОТКА 6');                      /// Нужно вставлять ссылку так    photo159306160_326402169
$chbad = mt_rand (0, count($attached)-1); 
$attach = urlencode($attached[$chbad]); 

$text = 'ТУТ ваш текст'; // [Qwerix]

$wall_post = curl('https://api.vk.com/method/wall.post?owner_id='.$owner_id.'&message='.urlencode($text).'&attachment='.$attach.'&access_token='.$access_token);
$json = json_decode($wall_post,1);
if ($json['response']['post_id']){
echo 'www.StatusES.96.lT';
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