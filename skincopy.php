<?php
session_start();
//de una pagina de un jugador de esa que esta encriptada con base64 en el value de cada jugador
$postdata="model=slim&url=".urlencode("http://textures.minecraft.net/texture/4f0c0a02908d3f1908e1a74cd706f1cc87fd39dd6a5a66bc1278785195ab6d03");
//$postdata="model=slim&url=".urlencode("http://assets.mojang.com/SkinTemplates/alex.png");
//$postdata="model=&url=".urlencode("http://assets.mojang.com/SkinTemplates/steve.png");
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,"https://api.mojang.com/user/profile/".$_SESSION['uuid']."/skin");
curl_setopt($ch,CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$_SESSION['token']));
curl_setopt($ch,CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
$response=curl_exec($ch);
curl_close($ch);
echo $response;
