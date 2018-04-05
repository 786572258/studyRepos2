<?php
/**
从浏览器复制cookie来登录可以！
*/

header("Content-type:text/html;Charset=utf8");  
$ch =curl_init();  
curl_setopt($ch,CURLOPT_URL,'https://passport.lagou.com/login/login.json');  
$fields = [
	'isValidate' => 'true',
	'username' => '595171801@qq.com',
	'request_form_verifyCode' => '',
	'submit' => '',
	'password' => '3324011',
];
$header = array();  
curl_setopt($ch,CURLOPT_POST,true);  
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);  
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);  
curl_setopt($ch,CURLOPT_HEADER,false);  
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);  
//curl_setopt($ch,CURLOPT_COOKIE,'JSESSIONID=ABAAABAAAGFABEF94FAFA2E308060BD95211883EF58B19F; SEARCH_ID=ef8cdd8db1b64f558a64cd8d1d83d5e9; user_trace_token=20180405133308-88b99fde-554b-42d8-9673-f6d6cacd4004; _ga=GA1.2.2070037791.1522906391; _gat=1; PRE_UTM=; LGUID=20180405133310-d3c217f5-3892-11e8-b4c1-525400f775ce; _gid=GA1.2.468708087.1522906391; X_HTTP_TOKEN=c38a18f3b93c048ae66bd2619b1e43ad; showExpriedIndex=1; showExpriedCompanyHome=1; showExpriedMyPublish=1; hasDeliver=58; index_location_city=%E6%B7%B1%E5%9C%B3; TG-TRACK-CODE=index_resume; LGSID=20180405133702-5e07c12f-3893-11e8-b73d-5254005c3644; PRE_HOST=localhost; PRE_SITE=http%3A%2F%2Flocalhost%2Ftest_cookie_login.php; PRE_LAND=https%3A%2F%2Fwww.lagou.com%2Fmycenter%2Fdelivery.html; gate_login_token=""; Hm_lvt_4233e74dff0ae5bd0a3d81c6ccf756e6=1522906391,1522906623,1522906651,1522906653; LG_LOGIN_USER_ID=d54ebed5017e5984d451c5cdbf089fd1b00f27547caa71d6; _putrc=70755FF05B3B11C9; login=true; unick=%E9%99%88%E4%BC%9F%E9%94%90; gate_login_token=a1540c56bad4616578f23043c653ec7cb641bdc4ee104640; Hm_lpvt_4233e74dff0ae5bd0a3d81c6ccf756e6=1522906803; LGRID=20180405134008-ccccfced-3893-11e8-b4c2-525400f775ce');  
  
  
$content = curl_exec($ch);  
  
/*echo "<pre>";print_r(curl_error($ch));echo "</pre>";  
echo "<pre>";print_r(curl_getinfo($ch));echo "</pre>";  
echo "<pre>";print_r($header);echo "</pre>";  */
echo "</br>",$content;  

var_dump($content);