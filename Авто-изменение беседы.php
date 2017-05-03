<?php
//Токен брать тут u.to/token-vk-dlja-avtostatusa/EnTlBQ
//Токен брать тут u.to/super_access_token/uVy-Bw
$access_token = 'Токен'; 

date_default_timezone_set ('Asia/Krasnoyarsk'); // http://www.php.net/manual/ru/timezones.php
$time = date("H:i | d.m.Y");

$chat_id= 'id чата'; //Пример http://vk.com/im?sel=c53 нам надо только 53
$title= 'Сейчас: '.$time; //

$name_chat = curl('https://api.vk.com/method/messages.editChat?chat_id='.$chat_id.'&title='.urlencode($title).'&access_token='.$access_token);
$json = json_decode($name_chat,1);
        if ($json['response']['post_id']){
                echo 'OK';
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