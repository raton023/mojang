<?php
$uuid="9cf6ea6170044de89593aee3dbdf8641";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, "https://sessionserver.mojang.com/session/minecraft/profile/".$uuid);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close ($ch);
$decc=json_decode($response,true);
$b64=$decc['properties']['0']['value'];
$decode =base64_decode($b64);
//la mete en un json el true lo convierte en objeto si no se acederia $jsondec->textures;...
$jsondec=json_decode($decode,true);
echo $jsondec["textures"]["SKIN"]["url"];
//echo $jsondec["textures"]["CAPE"]["url"]; si es que tiene capa
//echo $jsondec["textures"]["SKIN"]["metadata"]["model"]; si fuera alex
