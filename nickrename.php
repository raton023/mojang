<?php
session_start();
$nuevonick="God";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.minecraftservices.com/minecraft/profile/name/'.$nuevonick);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
$headers = array();
$headers[0] = 'Authorization: Bearer '.$_SESSION['token'];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
curl_close($ch);
echo $result;
