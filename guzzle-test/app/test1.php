<?php
require '../vendor/autoload.php';
$client = new \GuzzleHttp\Client();
/*
$response = $client->request('GET', 'http://www.baidu.com', [
    "timeout" => 3000
]);

echo '<pre>';
print_r($response);
//exit;
echo $response->getStatusCode(), "\n";
echo $response->getBody();*/


// 发送一个异步请求
/*$headers = ['X-Foo' => 'Bar', 'aaa' => 'bbb'];
$request = new \GuzzleHttp\Psr7\Request('GET', 'http://www.baidu.com', $headers);
//$h = $request->getHeaders();
$promise = $client->sendAsync($request)->then(function ($response) {
    //echo 'I completed! ' . $response->getBody();
    echo 'ok';

    print_r($response->getHeaders()['Set-Cookie']);
});
echo 666;
$promise->wait();*/

$headers['Cookie'] = 'user_trace_token=20180405133308-88b99fde-554b-42d8-9673-f6d6cacd4004; _ga=GA1.2.2070037791.1522906391; LGUID=20180405133310-d3c217f5-3892-11e8-b4c1-525400f775ce; _gid=GA1.2.468708087.1522906391; X_HTTP_TOKEN=c38a18f3b93c048ae66bd2619b1e43ad; index_location_city=%E6%B7%B1%E5%9C%B3; Hm_lvt_4233e74dff0ae5bd0a3d81c6ccf756e6=1522906651,1522906653,1522908846,1522908853; LG_LOGIN_USER_ID=1dcc36fa1a24e3be915a9ebe692f653462f9327aa7ec6f01; _putrc=70755FF05B3B11C9; login=true; unick=%E9%99%88%E4%BC%9F%E9%94%90; gate_login_token=94a8a88b527b6ec60ef06cf4c0769e8278075a141e9d9ce0; LGSID=20180406192434-156a0c31-398d-11e8-b73e-5254005c3644; PRE_UTM=; PRE_HOST=; PRE_SITE=https%3A%2F%2Fwww.lagou.com%2F; PRE_LAND=https%3A%2F%2Fwww.lagou.com%2Fmycenter%2Finvitation.html; JSESSIONID=ABAAABAAAGEAAJH93AF4ED3A0E08BA47E97DB22EF077593; _ga=GA1.3.2070037791.1522906391; _gat=1; Hm_lpvt_4233e74dff0ae5bd0a3d81c6ccf756e6=1523014096; LGRID=20180406192815-98c142af-398d-11e8-b73e-5254005c3644';
$headers['Cookie'] = 'user_trace_token=20180405133308-88b99fde-554b-42d8-9673-f6d6cacd4004;JSESSIONID=ABAAABAAAGFABEF94FAFA2E308060BD95211883EF58B19F; _ga=GA1.2.2070037791.1522906391; LGUID=20180405133310-d3c217f5-3892-11e8-b4c1-525400f775ce; _gid=GA1.2.468708087.1522906391; X_HTTP_TOKEN=c38a18f3b93c048ae66bd2619b1e43ad; showExpriedIndex=1; showExpriedCompanyHome=1; showExpriedMyPublish=1; hasDeliver=58; index_location_city=%E6%B7%B1%E5%9C%B3; TG-TRACK-CODE=index_resume; gate_login_token=""; Hm_lvt_4233e74dff0ae5bd0a3d81c6ccf756e6=1522906651,1522906653,1522908846,1522908853; SEARCH_ID=3bc19dfeaaef42a8a30f0689e9851a18; LG_LOGIN_USER_ID=1dcc36fa1a24e3be915a9ebe692f653462f9327aa7ec6f01; _putrc=70755FF05B3B11C9; login=true; unick=%E9%99%88%E4%BC%9F%E9%94%90; gate_login_token=94a8a88b527b6ec60ef06cf4c0769e8278075a141e9d9ce0; LGSID=20180406192434-156a0c31-398d-11e8-b73e-5254005c3644; PRE_UTM=; PRE_HOST=; PRE_SITE=https%3A%2F%2Fwww.lagou.com%2F; PRE_LAND=https%3A%2F%2Fwww.lagou.com%2Fmycenter%2Finvitation.html; Hm_lpvt_4233e74dff0ae5bd0a3d81c6ccf756e6=1523014382; LGRID=20180406193300-4327189a-398e-11e8-b575-525400f775ce';
//$headers['Host'] = 'account.lagou.com';
$headers['Referer'] = 'account.lagou.com';
$request = new \GuzzleHttp\Psr7\Request('GET', 'https://www.lagou.com/resume/myresume.html', $headers);
$promise = $client->sendAsync($request)->then(function ($response) {
    //echo 'I completed! ' . $response->getBody();
    echo 'ok';
    echo $response->getBody();
    print_r($response->getHeaders()['Set-Cookie']);
});
$promise->wait();

