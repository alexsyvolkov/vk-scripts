<?php
//Токен брать тут u.to/token-vk-dlja-avtostatusa/EnTlBQ
//Токен брать тут u.to/super_access_token/uVy-Bw
$access_token = 'Токен';
date_default_timezone_set ('Europe/Kiev');
$time = date("H:i [d.m.y]"); 
$mess = curl ('https://api.vk.com/method/account.getCounters?access_token='.$access_token);
$json = json_decode($mess,1); 
$qweso = $json['response']['messages'];
$RequestsGet = curl('https://api.vk.com/method/account.getCounters?access_token='.$access_token);
$json1 = json_decode($RequestsGet,1); 
$countR = $json1['response']['friends'];
$messageGet = curl('https://api.vk.com/method/messages.get?access_token='.$access_token);
$json = json_decode($messageGet,1); 
$countM = $json['response']['0'];
$home_town = 'Сейчас: '.$time.' | by Qwerix ————————————————————————— Всего сообщений: '.$countM.' | Новых: '.$qweso.' —————————————————————————  Заявок в друзья: '.$countR.''; 
$qweso1 = curl('https://api.vk.com/method/account.saveProfileInfo?home_town='.urlencode($home_town).'&access_token='.$access_token);
$jsonS = json_decode($qweso1,1); 
if ($jsonS['response']=='1'){
addlog('www.StatusES.96.lT');
}
else{
addlog('ERROR: '.$jsonS['error']['error_msg']);
}

function addlog($logtext){
$fp = fopen( './statusLog.txt', 'a' );
fwrite( $fp, '['.date( 'd.m.Y H:i:s', time() ).'] '.$logtext.PHP_EOL);
}

function curl( $url ){
$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
$response = curl_exec( $ch );
curl_close( $ch );
return $response;
} 
?><!-- http://vk.com/alexsywindows -->