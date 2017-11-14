<?php

include_once('simple_html_dom.php');

$pg = 20;

do{

    $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_USERAGENT      => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
        CURLOPT_AUTOREFERER    => true,
        CURLOPT_CONNECTTIMEOUT => 120,
        CURLOPT_TIMEOUT        => 120,
        );

    $ch = curl_init(str_replace(" ", "%20", 'https://www.google.de/search?q=site:flavors.me&safe=off&client=firefox-b&biw=1108&bih=680&ei=GKhJWPj2LIq5aZOLlZgL&start='.$pg.'&sa=N'));
    curl_setopt_array($ch, $options);

    $content  = curl_exec($ch);

    $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    $ads[$k]['link'] = $url;

    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $body = substr($content, $header_size);

    curl_close($ch);

    $html = str_get_html($content);

    $fn = [];
    foreach($html->find('.g') as $g){
    	$fn[] = $g->find('.r a',0)->href;
    }

    print_r($fn);
    $pg += 10;

 }while($pg <= 250);