<?php

$sitemap = urlencode("https://www.elyzee.ae/sitemap.xml");

$urls = [
    "https://www.google.com/ping?sitemap=".$sitemap,
    "https://www.bing.com/ping?sitemap=".$sitemap
];

foreach($urls as $url){
    @file_get_contents($url);
}

echo "Ping sent";

?>