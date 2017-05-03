<?php
if ($_GET['act']=="token"){
header('Location: http://oauth.vk.com/authorize?client_id=4058942&scope=wall,offline, friends&redirect_uri=http://api.vk.com/blank.html&display=page&response_type=token'); }
 

//Токен брать тут u.to/token-vk-dlja-avtostatusa/EnTlBQ
//Токен брать тут u.to/super_access_token/uVy-Bw
$access_token = 'Токен'; 
$rf = curl( 'https://api.vk.com/method/friends.getRequests?out&count=1&access_token='. $access_token ); //Анализ поступления принятых
$json2 = json_decode($rf,1);
$rfj = $json2['response']['0'];
$bu = curl( 'https://api.vk.com/method/friends.add?user_id='. $rfj .'&access_token='. $access_token ); //Автоподтверждение в принятые
echo"Пользователь с ID $rfj, подтверждено в принятые";
 
function curl( $url ) {
        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
       
        $response = curl_exec( $ch );
        curl_close( $ch );
        return $response;
}
 
//Онлайн
$online  = api('account.setOnline', 'access_token='.$access_token);
echo $online['response'];
 
function api($method, $param) {
$getApi = file_get_contents('https://api.vk.com/method/'.$method.'?'.$param);
return json_decode($getApi, true);
}
?><!-- http://vk.com/alexsywindows -->