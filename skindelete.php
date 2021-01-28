<?php
session_start();
$ch = curl_init();
//quita la skin y te pone steve o alex... no se si sea solo steave el que ponga xD
curl_setopt($ch,CURLOPT_URL, "https://api.mojang.com/user/profile/".$_SESSION['uuid']."/skin");
curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch,CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer '.$_SESSION['token']));
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($ch);
curl_close($ch);
echo $result;
