<?php

include('simple_html_dom.php');

$pg = "56427412100";
$c  = "56427512100";


//https://www.mendeley.com/authors/56427412100/

do{
	echo $pg;
	$options = array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HEADER         => false,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_USERAGENT      => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
		CURLOPT_AUTOREFERER    => true,
		CURLOPT_CONNECTTIMEOUT => 120,
		CURLOPT_TIMEOUT        => 120,
		);

	$ch = curl_init(str_replace(" ", "%20", 'https://www.mendeley.com/authors/'.$pg));
	curl_setopt_array($ch, $options);

	$content  = curl_exec($ch);

	curl_close($ch);

	$link = str_get_html($content);

	$tmp = $link->find('.summary-nested',0)->innertext;
	$n = preg_replace('/\s+/S', " ", $tmp);
	echo $n;
	$pg++;
}while($pg != $c);