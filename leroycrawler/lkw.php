<?php

include('simple_html_dom.php');


//LKW Fahrer Jobs
//zählt die Anzeigen (Pro Seite 20)
$cntr = 1;
//überprüft ob die Anzeige aktiv ist
$a = true;
//Gibt die Nummer der Seitenzahl an
$pg = 1;

$job_arr = [];
do{
	$html = file_get_html('http://lkw-fahrer-gesucht.com/lkw-fahrer-jobs.html?&seite='.$pg);
//looped durch die Zeilen
	foreach($html->find('.job-teaser') as $li){
		if(!strpos($li, 'expired')){
			if($cntr < 21){

				$job_arr['company name'] =  trim($li->find('small a', 0)->plaintext);
				$job_arr['source'] = "lkw-fahrer-gesucht";
				$job_arr['link'] = trim('http://lkw-fahrer-gesucht.com/' . $li->find('h2 a', 0)->href);
				$job_arr['title'] =  trim($li->find('h2 a[title]', 0)->plaintext);
				$job_arr['city'] = trim($li->find('.orange',0)->plaintext);
				$ads[] = $job_arr;

			}
		}else{$a = false;}
		//inkrementiert den Anzeigen-zähler um 1
		$cntr++;
	}
	//setzt den Zähler auf 1 zurück
	$cntr = 1;
	$pg++;

}while($a == true || strpos($html, 'Keine Stellenanzeigen gefunden'));

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

		    //save it
	$ads[$k]['body'] = $html->plaintext;

}
echo "<pre>";
print_r($ads);

