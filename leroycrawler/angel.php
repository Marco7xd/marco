<?php

include('simple_html_dom.php');

function file_get($url){
$options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_USERAGENT      => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
        CURLOPT_AUTOREFERER    => true,
        CURLOPT_CONNECTTIMEOUT => 120,
        CURLOPT_TIMEOUT        => 120,
        );

    $ch = curl_init($url);
    curl_setopt_array($ch, $options);

    $content  = curl_exec($ch);
    $html = str_get_html($content);
    return $html;
}

//$abc = array('nonalphabetic','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
$abc = array('z');

$pg = 1;

$ads[] = '';

foreach ($abc as $a) {

$url = 'https://angel.co/directory/people/'.$a.'-3';

$main = file_get($url);
echo $main;
    foreach ($main->find('.s-vgPadBottom0_5') as $li) {
        if (preg_match('/directory/', $li->find('a',0)->href)) {
            $main = file_get('https://angel.co'.$li->find('a',0)->href);
            echo $main;
            foreach ($main->find('.s-vgPadBottom0_5') as $li) {
                echo $li->find('a',0)->href.'<br>';
            }
        }else{
            //echo $li->find('a',0)->href.'<br>';
        }
    }

}
    //We couldn't find what you were looking for.

echo "<pre>";
print_r($ads);
/*
foreach($ads as $k => $v){
    $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_USERAGENT      => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
        CURLOPT_AUTOREFERER    => true,
        CURLOPT_CONNECTTIMEOUT => 120,
        CURLOPT_TIMEOUT        => 120,
        );

    $ch = curl_init(str_replace(" ", "%20", $v['link']));
    curl_setopt_array($ch, $options);

    $content  = curl_exec($ch);

    $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    $ads[$k]['link'] = $url;

    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $body = substr($content, $header_size);

    curl_close($ch);

    $html = str_get_html($body);

    $ads[$k]['body'] = trim($html->plaintext);
}
*/