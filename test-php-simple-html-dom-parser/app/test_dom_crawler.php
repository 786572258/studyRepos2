<?php
require '../vendor/autoload.php';
use Symfony\Component\DomCrawler\Crawler;

$html = <<<'HTML'
<!DOCTYPE html>
<html>
    <body>
        <p class="message" data-a="ddd">Hello World!</p>
        <p data-a="cccc">Hello Crawler!</p>
    </body>
</html>
HTML;

$crawler = new Crawler($html);

foreach ($crawler as $domElement) {
   // var_dump($domElement->nodeName);
}
$crawler = $crawler->filterXpath('//p');
$crawler->each(function ($node, $i) {
    var_dump(($node->attr('data-a')));

});
exit;
exit;
var_dump($crawler->text());
