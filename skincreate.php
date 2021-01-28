<?php
session_start();
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, 'https://api.mojang.com/user/profile/'.$_SESSION['uuid'].'/skin');
curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,CURLOPT_CUSTOMREQUEST, 'PUT');
//$post = array('model'=>'','file'=>curl_file_create("/var/www/html/skin.png"),);
$post = array('model'=>'slim','file'=>curl_file_create("/var/www/html/skin.png"),);
curl_setopt($ch,CURLOPT_SAFE_UPLOAD, false);
curl_setopt($ch,CURLOPT_POSTFIELDS, $post);
$headers = array();
$headers[0] = 'Authorization: Bearer '.$_SESSION['token'];
$headers[1] = 'Content-Type: multipart/form-data';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result=curl_exec($ch);
curl_close($ch);
echo $result;
