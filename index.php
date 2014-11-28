<?php
header("Content-Type: text/html; charset=UTF-8");
$content = file_get_contents('http://www.duokan.com/');
preg_match('/<a .*href\s*="(.+?)".+alt="限时免费".+<\/a>/',$content,$result);
$content = file_get_contents('http://www.duokan.com'.$result[1]);
preg_match('/<div class="desc">(([\s]|.)+?)<\/table>/',$content,$result);
preg_match('/<h3>(.+)<\/h3>/',$result[1],$name);
$name = $name[1];
preg_match_all('/<tr>(([\s]|.)+?)<\/tr>/',$result[1],$result);
foreach($result[1] as $key){
$info .= preg_replace('/(<.+?>)|\s/','',$key).PHP_EOL;
}
preg_match('/<article.+id="book-content"(([\s]|.)+?)<\/article>/',$content,$result);
$content = preg_replace('/(<.+?>)/','',$result[0]);
echo $name.PHP_EOL.$info.PHP_EOL.$content;
