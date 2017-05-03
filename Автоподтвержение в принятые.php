<?php
//Токен брать тут u.to/token-vk-dlja-avtostatusa/EnTlBQ
//Токен брать тут u.to/super_access_token/uVy-Bw
$access_token = 'Токен'; 
$rf = curl( 'https://api.vk.com/method/friends.getRequests?out=0&count=100&access_token='. $access_token ); //Получаем заявки
$json2 = json_decode($rf,1);
$rfj = $json2['response']['0'];
$bu = curl( 'https://api.vk.com/method/friends.add?user_id='. $rfj .'&access_token='. $access_token ); //Добавляем человека в друзья!
echo"Пользователь с ID $rfj, Добавлен в друзья. скрипт"; //Script by 

function curl( $url ) {
        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
       
        $response = curl_exec( $ch );
        curl_close( $ch );
        return $response;
}
?><!-- http://vk.com/alexsywindows -->