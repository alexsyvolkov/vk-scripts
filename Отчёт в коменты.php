<?php
//Токен брать тут u.to/token-vk-dlja-avtostatusa/EnTlBQ
//Токен брать тут u.to/super_access_token/uVy-Bw
$access_token = 'Токен'; 
$access_token = file_get_contents('ТОКЕН');  // Взять можно тут http://u.to/token-vk-dlja-avtostatusa/EnTlBQ
date_default_timezone_set ('Europe/Moscow'); // http://www.php.net/manual/ru/timezones.php 
$time = date("H:i [d.m]");
$json1 = json_decode($RequestsGet,1);
$countR = $json1['response']['0'];
$json = json_decode($messageGet,1);
$countM = $json['response']['0'];
$load = rand(10,90);
$weater = file_get_contents("http://informer.gismeteo.ru/xml/28722_1.xml");
$xml = xml_parser_create();
$indexes = array();
$values = array();
xml_parse_into_struct($xml,$weater, $values, $indexes);
xml_parser_free($xml);
$wiz = $values[38][attributes][MAX];
$hours = ceil((mktime(0,0,0, 6, 1, 2014) - time())/3600); //Так вот цифры 0,0,0,6,1,2014  6-это месяц, 1-это день месяца 2014-это год Меняйте как хотите.

$post_id = '2074'; // Например вот запись. https://vk.com/wall159306160_2074 Нам нужны цифры после _. Тоесть 2074
$owner_id = 'ID'; // Без id Просто цифры. Например. 159306160


$text = '&#8618; &#13; &#127808; Online отсчет до дня рождения ^ ^&#127808; &#13; &#8617; 
&#128197; Сегодня: '.$time.' | До дня рождения: '.$hours.' часов.';

$text = curl('https://api.vk.com/method/wall.addComment?text='.urlencode($text).'&owner_id='.$owner_id.'&post_id='.$post_id.'&access_token='.$access_token);
$jsonS = json_decode($text,1);

echo '

<img src="http://vk.com/images/emoji/21AA.png"> &#13; <img src="http://vk.com/images/emoji/D83CDF40.png"> Online отсчет до лета ^ ^<img src="http://vk.com/images/emoji/D83CDF40.png"> &#13; <img src="http://vk.com/images/emoji/21A9.png"> <br>
<img src="http://vk.com/images/emoji/D83DDCC5.png"> Сегодня: '.$time.' | До лета: '.$hours.' часов.

'.$jsonS['error']['error_msg'];

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