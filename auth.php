<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email=$_POST['email'];
$pass=$_POST['pass'];
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, "https://authserver.mojang.com/authenticate");
curl_setopt($ch,CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//curl_setopt($ch, CURLOPT_PROXY, "107.170.58.132:3128");//ip:port http://proxylist.hidemyass.com/
curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode(array('agent'=>array('name'=>'Minecraft','version'=>'1',),'username'=>$email,'password'=>$pass)));
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
$res=curl_exec($ch);
curl_close($ch);
$json = json_decode($res, true);
//echo $res.'<br><br>';
$_SESSION['token']=$json['accessToken'];
$_SESSION['uuid']=$json['selectedProfile']['id'];
$_SESSION['name']=$json['selectedProfile']['name'];
echo 'hola '.$_SESSION['name'].' tu token es: '.$_SESSION['token'];
}
else
{
if($_SESSION['token']==null){
?>
<form method="post" action="">
<input type="email" name="email" placeholder="Minecraft Email" value="@gmail.com">
<input type="password" name="pass" placeholder="Minecraft Password">
<input type="submit" value="ID">
</form>
<?php
}
else
{
echo 'hola '.$_SESSION['name'].' tu token es: '.$_SESSION['token'];
}
}
?>
