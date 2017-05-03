<?php 
//Токен брать тут u.to/token-vk-dlja-avtostatusa/EnTlBQ
//Токен брать тут u.to/super_access_token/uVy-Bw
$access_token = 'Токен'; 
date_default_timezone_set ('Europe/Moscow'); // http://www.php.net/manual/ru/timezones.php 
$messagesGet = curl('https://api.vk.com/method/messages.get?count=200&filters=1&access_token='.$access_token); 
$jsonM = json_decode($messagesGet,1); 
     
$texed = array('Привет! Это сообщение от автоответчика. В скором времени, пользователь ответит на Ваше сообщение! Всего Вам доброго! :)'); 
$chbade = mt_rand (0, count($texed)-1); 
$text = urlencode($texed[$chbade]); 
     
$attached = array('audioXXX_XXX'); // Тут ваша музыка
$chbad = mt_rand (0, count($attached)-1); 
$attach = urlencode($attached[$chbad]); 
     
if(!file_exists('log.txt')){ 
addlog(''); 
$blacklist = file_get_contents('./log.txt'); 
} 
else{ 
$blacklist = file_get_contents('./log.txt'); 
} 
$countMess = $jsonM['response']['0']; //количество сообщений 
$uids = array('jmg'); 
          for($i=1;$i<=$countMess;$i++){ 
                  $senderUid = $jsonM['response'][$i]['uid']; 
                  $uids[$i] = $senderUid; 
          } 
                  $uids = array_values(array_unique($uids)); 
                  for($q=1;$q<=count($uids)-1;$q++){ 
                          echo $uids[$q].'<br>'; 
if (strpos($blacklist, (string)$uids[$q]) === false){ 
echo curl('https://api.vk.com/method/messages.send?uid='.$uids[$q].'&message='.$text.'&attachment='.$attach.'&access_token='.$access_token); 
addlog($uids[$q]); 
} 
} 
     
     
function addlog($logtext){ 
$fp = fopen( './log.txt', 'a' ); 
fwrite( $fp, '['.date( 'd.m.Y H:i:s', time() ).'] '.$logtext.PHP_EOL ); 
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