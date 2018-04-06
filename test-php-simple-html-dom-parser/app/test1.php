<?php
require '../vendor/autoload.php';

use Sunra\PhpSimple\HtmlDomParser;


$str = "<p>hello</p><p>world</p><div class='content-pic'><img src='222'></div>";
$dom = HtmlDomParser::str_get_html( $str );
echo '<pre>';
print_r($dom->find('.content-pic')[0]->find('img')[0]->src);
exit;

$dom = HtmlDomParser::file_get_html( $file_name );

$elems = $dom->find($elem_name);