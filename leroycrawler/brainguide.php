<?php

include('simple_html_dom.php');

$cat = array('Aufsichtsrat-Beirat/_s','Autor/_s','Berater/_s','Business-Angel/_s','Mediator/_s','Referent/_s','Sachverstaendiger-Gutachter/_s','/Trainer-Coach/Management/_sc');

$ads = [];

foreach($cat as $link){
$html =	file_get_html('http://www.brainguide.de/'.$link);

$c = 0;
	do{
		foreach ($html->find('.ten-white-section') as $li) {
			$job_arr['name'] = trim(preg_replace('/\s+/S', " ", $li->find('.ten-expert-name',0)->plaintext));
			$job_arr['title'] = trim($li->find('.ten-expert-expertise',0)->plaintext).' '.trim($li->find('.ten-expert-company',0)->plaintext);
			$job_arr['city'] = trim($li->find('.ten-expert-location',0)->plaintext);
			$job_arr['link'] = 'http://www.brainguide.de'.$li->find('.ten-expert-name a',0)->href;
			$job_arr['nr'] = $p.' '.$link;
			$job_arr['source'] = 'Brainguide';
			$job_arr['type'] = "search";
			$job_arr['lang'] = "de";

			$ads[] = $job_arr;
			print_r($job_arr);
		}

		if (!preg_match('/href/','http://www.brainguide.de/'.$html->find('.tx-pagebrowse-last',0)->outertext)) {
			$c++;
		}
		
		$html = file_get_html('http://www.brainguide.de/'.$html->find('.tx-pagebrowse-last a',0)->href);
		
	}while($c < 1);
}

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

	curl_close($ch);


	$html = str_get_html($content);

	$ads[$k]['body'] = trim($html->plaintext);
}
