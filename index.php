<?php
/*
 |--------------------------
 |curl模拟登入,获取cookie
 |step1: get cookie
 |
 |
 */
$loginURL = 'http://test.hiho.com/passport/signin'; ##login url
$cookieFile = dirname(__FILE__).'/cookie.txt';      ##cookie file
## post data
$postData = array(
    'email'=>'www321www@126.com',
    'password'=>'123456'
);
//curl ini
$ch = curl_init($loginURL);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,1);
## curl set post
curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($postData));
##save cookie
curl_setopt($ch,CURLOPT_COOKIEJAR,$cookieFile);
$res = curl_exec($ch);
$httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
var_dump(array(
    'code'=>$httpCode,
    'content'=>$res
));

/*
 |--------------------------
 |curl模拟登入,用cookie登陆
 |step2: post login url with the cookie
 |
 |
 */

$loginURL = 'http://test.hiho.com/my'; ## my account info
$cookieFile = dirname(__FILE__).'/cookie.txt';      ##cookie file
//curl ini
$ch = curl_init($loginURL);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
## use cookie
curl_setopt($ch,CURLOPT_COOKIEFILE,$cookieFile);
##execute
$res = curl_exec($ch);
$httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
var_dump(array(
    'code'=>$httpCode,
    'content'=>$res
));
