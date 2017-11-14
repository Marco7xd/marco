<?php
include('simple_html_dom.php');
$pg = 1238;
$ads = [];

do{

$html = file_get_html("https://www.projektwerk.com/de/freelancer?limit=20&page=".$pg);

$main = $html->find('div.panel-body');

foreach ($main as $class) {
	 $job_arr['title'] = trim($class->find('h3[itemprop=jobTitle]',0)->plaintext);
     $job_arr['city'] = trim($class->find('span[itemprop=homeLocation]',0)->plaintext);
     $job_arr['source'] = 'projektwerk';
     $city_parts = explode(" ", trim($class->find('p', 0)->plaintext));
    $job_arr['date']= substr(end($city_parts), 0, 6)."20".substr(end($city_parts), 6, 2);
     $job_arr['link']= 'https://www.projektwerk.com'.trim ($class->find('h3 a' ,0)->href);
     $job_arr['lang'] = "de";
     $job_arr['type'] = "search";
     $ads[] = $job_arr;
    
 }

     $pg++; 
}while((empty($html->find('#search'))));

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

    //get actual url for later use
    $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    $ads[$k]['link'] = $url;

    //split header from body
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $body = substr($content, $header_size);

    curl_close($ch);

    $html = str_get_html($body);


    $ads[$k]['body'] = trim($html->plaintext);

    }


/*
	 $arr= explode(" ",trim($class->find('h3[p]',3)->plaintext));
 
	 $job_arr['date'] = $arr[0];
	 
	 $job_arr['source'] = 'projektwerk';
*/


//echo "<pre>";
print_r($ads);