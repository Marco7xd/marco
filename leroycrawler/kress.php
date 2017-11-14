<?php

include('simple_html_dom.php');

$ads = [];
$pg = 2;

$c = 1;

do{
	$html = file_get_html('https://kress.de/koepfe/kresskoepfe-detail/profil/'.$pg.'.html');

if(!preg_match('/Ergebnisse:/', $html)) {
	$job_arr['name'] = trim($html->find('.medium-10',0)->plaintext);
		if (empty($html->find('.large-6',0)->find('b',0)->plaintext)) {
			$job_arr['title'] = '';
		}else{
		$job_arr['title'] = trim($html->find('.large-6',0)->find('b',0)->plaintext);
		}
	$city = preg_split('/<br[^>]*>/i', $html->find('.large-6',1)->find('p',0)->innertext);
	$job_arr['city'] = trim(preg_replace('/\s+/S', " ", $city[1]));
	$job_arr['link'] = 'https://kress.de/koepfe/kresskoepfe-detail/profil/'.$pg.'.html';
	$job_arr['source'] = 'Kress';
	$job_arr['type'] = "search";
	$job_arr['lang'] = "de";
	$job_arr['body'] = $html->plaintext;

	$ads[] = $job_arr;
	//setzt den integer wieder auf 0
	$c = 0;
}else{
	//erhöht sich bei leerer Stellenanzeige
	$c++;
}
	$pg++;

}while($c <= 5);


echo '<pre>';
print_r($ads);