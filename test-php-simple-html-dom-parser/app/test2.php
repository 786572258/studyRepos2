<?php
require '../vendor/autoload.php';

use Sunra\PhpSimple\HtmlDomParser;
//
//curl 'http://www.mm131.com/qipao/1921_2.html' -H ': ""' -H
//'Accept-Encoding: gzip, deflate'
//-H 'Accept-Language: zh-CN,zh;q=0.9'
//-H 'Upgrade-Insecure-Requests: 1'
//-H 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36'
//-H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
//-H 'Cache-Control: max-age=0'
//-H 'Cookie: UM_distinctid=16298c67fd258-0e516e25d73043-336a7b06-13c680-16298c67fd392; CNZZDATA3866066=cnzz_eid%3D1393337054-1494676185-%26ntime%3D1494676185; Hm_lvt_9a737a8572f89206db6e9c301695b55a=1522981569; bdshare_firstime=1522981568758; Hm_lpvt_9a737a8572f89206db6e9c301695b55a=1522982026'
//-H 'Connection: keep-alive'
//-H 'If-Modified-Since: Fri, 03 Nov 2017 08:33:30 GMT'
//--compressed

function download($url, $path = './images/')
{
    $refer = "";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    //伪造来源refer
    curl_setopt($ch, CURLOPT_REFERER, 'http://www.mm131.com/qipao/1921_16.html');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    $file = curl_exec($ch);
    curl_close($ch);
    $filename = pathinfo($url, PATHINFO_BASENAME);
    $resource = fopen($path .time() .'_'.$filename, 'a');
    fwrite($resource, $file);
    fclose($resource);
}
/*
$a = download('http://img1.mm131.me/pic/1921/18.jpg');
print_r($a);
exit;*/

function curl($url, $gzip = 'gzip') {
    $header = array(
        'If-None-Match: 59fc29da-2054',
        'Accept-Encoding:'. 'gzip, deflate',
        'Accept-Language:'. 'zh-CN,zh;q=0.9',
        'Upgrade-Insecure-Requests:'. '1',
        'User-Agent:'. 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8\'',
        'Cache-Control: max-age=0',
        'Connection: keep-alive',
        'If-Modified-Since: Fri, 03 Nov 2017 08:33:30 GMT',
        'Cookie: UM_distinctid=16298c67fd258-0e516e25d73043-336a7b06-13c680-16298c67fd392; CNZZDATA3866066=cnzz_eid%3D1393337054-1494676185-%26ntime%3D1494676185; Hm_lvt_9a737a8572f89206db6e9c301695b55a=1522981569; bdshare_firstime=1522981568758; Hm_lpvt_9a737a8572f89206db6e9c301695b55a=1522982026\'',

    );

    // header("Content-type:text/html;Charset=utf8");
    $ch =curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    //curl_setopt($ch,CURLOPT_POST,true);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_REFERER, 'http://www.mm131.com/qipao/1921_16.html');
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
   // curl_setopt($ch,CURLOPT_HEADER,false);
   // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //不验证证书
    if ($gzip == 'gzip') curl_setopt($ch, CURLOPT_ENCODING, "gzip"); // 关键在这里
   // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //不验证证书
    //curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
    // curl_setopt($ch,CURLOPT_COOKIE, $ret);
    return $content = curl_exec($ch);
}
// Create DOM from URL or file

//new public-box
function paqu($htmlUrl)
{
    $preUrl = str_replace('.html', '', $htmlUrl);
    $i = 1;
    while($i) {
        $i++;
        if ($i > 100) {
            break;
        }
        //echo 'http://www.mm131.com/qipao/1921_'. ($i+1) .'.html';
        $html = curl($preUrl . '_' . $i .'.html', 'gzip');
        $html = HtmlDomParser::str_get_html($html);
        if (!$html) {
            break;
        }
        $contentPicDom = $html->find('.content-pic');
        if (!$contentPicDom) {
            break;
        }
        $contentPicDom = $contentPicDom[0];
        if (!$contentPicDom) {
            break;
        }
        echo $i;echo '  ';
        $src = $contentPicDom->find('img')[0]->src;
        download($src);
    }
}

$html = curl('http://www.mm131.com');
if (!$html) {
    die('error');
}
paqu('http://www.mm131.com/xinggan/2951.html');
exit;
$html = HtmlDomParser::str_get_html($html);
$hotLis = $html->find('.new li');
foreach ($hotLis as $k => $v) {
    $htmlUrl =  $v->find('a')[0]->href;
    paqu($htmlUrl);
}
