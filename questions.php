<?php
session_start();
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, "https://api.mojang.com/user/security/location");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$_SESSION['token']));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
curl_close ($ch);
$json=json_decode($res,true);
if($res==""){
echo 'Autorizado';
}
else if($json['errorMessage']=="Current IP is not secured")
{
$ch1 = curl_init();
curl_setopt($ch1,CURLOPT_URL, "https://api.mojang.com/user/security/challenges");
curl_setopt($ch1,CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$_SESSION['token']));
curl_setopt($ch1,CURLOPT_RETURNTRANSFER, true);
$res1=curl_exec($ch1);
curl_close($ch1);
$json1=json_decode($res1,true);
echo '<form method="post" action="">';
echo '<input type="hidden" value="'.$json1[0]['answer']['id'].'" name="unid"><input type="hidden" value="'.$json1[1]['answer']['id'].'" name="dosid"><input type="hidden" value="'.$json1[2]['answer']['id'].'" name="tresid">';
echo $json1[0]['question']['question'].'<br><input type="text" name="uno"><br>';
echo $json1[1]['question']['question'].'<br><input type="text" name="dos"><br>';
echo $json1[2]['question']['question'].'<br><input type="text" name="tres"><br><input type="submit" value="Responder"></form>';
}
else
{
echo $res;
}

if($_SERVER['REQUEST_METHOD']==='POST') {
$json2 = array(
array(
'id'=>$_POST['unid'],
'answer'=>$_POST['uno'],),
array(
'id'=>$_POST['dosid'],
'answer'=>$_POST['dos'],),
array(
'id'=>$_POST['tresid'],
'answer'=>$_POST['tres'],)
);
$data=json_encode($json2);
$ch2 = curl_init();
curl_setopt($ch2,CURLOPT_URL,"https://api.mojang.com/user/security/location");
curl_setopt($ch2,CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Bearer '.$_SESSION['token']));
curl_setopt($ch2,CURLOPT_POSTFIELDS, $data);
curl_setopt($ch2,CURLOPT_RETURNTRANSFER, true);
$res2=curl_exec($ch2);
curl_close($ch2);
echo $res2;
//respondio esto [
//{"answer": {"id":214451956},"question":{"id":1,"question":"What is your favorite pet's name?"}},
//{"answer":{"id":214451957},"question":{"id":2,"question":"What is your favorite movie?"}},
//{"answer":{"id":214451958},"question":{"id":3,"question":"What is your favorite author's last name?"}}]
}
