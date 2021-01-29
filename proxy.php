<?php
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, "target.com/index.php");
//CURLHEADER_UNIFIED CURLHEADER_SEPARATE
curl_setopt($ch,CURLOPT_HEADEROPT,"CURLHEADER_UNIFIED");
curl_setopt($ch,CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//curl_setopt($ch,CURLOPT_PROXYHEADER, array('Content-Type: application/json'));
//curl_setopt($ch,CURLOPT_PROXY, "142.47.96.16:80");
//http es el predeterminado CURLPROXY_SOCKS4, CURLPROXY_SOCKS5, CURLPROXY_SOCKS4A o CURLPROXY_SOCKS5_HOSTNAME.
curl_setopt($ch,CURLOPT_PROXYTYPE, "CURLPROXY_HTTP");
//46.4.168.52:80 206.189.189.81:3128 101.255.103.201 166.249.185.136:57680 54.156.164.61:80 elite 185.198.188.50:8080
curl_setopt($ch,CURLOPT_PROXY, "192.53.113.201:8080");
curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:84.0) Gecko/20100101 Firefox/84.0");
curl_setopt($ch,CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, 0);
$res=curl_exec($ch);
curl_close($ch);
//echo $res;
