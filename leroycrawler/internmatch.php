<?php

include('simple_html_dom.php');

$ads = [];
$pg = 112027;

$c = 1;

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

	$ch = curl_init(str_replace(" ", "%20", 'https://profiles.looksharp.com/'.$pg));
	curl_setopt_array($ch, $options);

	$content  = curl_exec($ch);

	curl_close($ch);


	$html = str_get_html($content);

if(!preg_match('/We couldn’t find anything here/', $html)) {

		$job_arr['name'] = trim($html->find('.name',0)->plaintext);
		$job_arr['title'] = trim($html->find('.medium-font',0)->plaintext);
		$job_arr['city'] = trim($html->find('p[itemprop=name]',0)->plaintext);
		$job_arr['link'] = 'https://profiles.looksharp.com/'.$pg;
		$job_arr['source'] = 'Internmatch';
		$job_arr['type'] = "search";
		$job_arr['lang'] = "US";
		//$job_arr['body'] = $html->plaintext;

		$ads[] = $job_arr;
		print_r($job_arr);
		//setzt den integer wieder auf 0
		$c = 0;

}else{
	$c++;
}
	$pg++;

}while($c <= 5);
