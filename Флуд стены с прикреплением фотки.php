<?php
//����� ����� ��� u.to/token-vk-dlja-avtostatusa/EnTlBQ
//����� ����� ��� u.to/super_access_token/uVy-Bw
$access_token = '�����'; 

$owner_id = 'ID'; //  (ID ������������, ������ ������ �����)   ���� ��� ������ �� (������ ����� �����) -ID

$attached = array('�����','����� 2','����� 3','����� 4','����� 5','����� 6');                      /// ����� ��������� ������ ���    photo159306160_326402169
$chbad = mt_rand (0, count($attached)-1); 
$attach = urlencode($attached[$chbad]); 

$text = '��� ��� �����'; // [Qwerix]

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