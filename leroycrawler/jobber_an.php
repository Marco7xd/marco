<?php

include('simple_html_dom.php');

$html = file_get_html('http://www.jobber.de/_1_myjobber/studenten-bewerberprofile-liste,1,kx,,kx,00,0,1.html#ergebnis');
//Holt sich den Link zur nächsten Seite, falls vorhanden
$pg = $html->find('table', 5)->find('tr table', 4)->find('td',2);



$category_links = [];
//Looped durch alle Seiten
while(!empty($pg->find('a', 0)->href)){

//Speichert die Link Anzeigen (ohne Anmeldung) der jeweiligen Seiten
	foreach ($html->find('table', 11)->find('tr') as $li) {
		//Überprüft ob es sich um eine Premiumanzeige handelt
		if(!strpos($li , "Sichtbar für angemeldete Benutzer")){
			//speichert den ersten Link
			if(!empty($li->find('td td a', 0)->href)){
				$category_links[] = trim($li->find('td td a', 0)->href);
			}
		}
	}

	//Speichert Link zur nächsten Seite
	$html = file_get_html('http://www.jobber.de/_1_myjobber/' . $pg->find('a', 0)->href);
	$pg = $html->find('table', 5)->find('tr table', 4)->find('td',2);
}

//Speichert die links der Anzeigen der letzten Seite
foreach ($html->find('table', 11)->find('tr') as $li) {
	if(!strpos($li , "Sichtbar für angemeldete Benutzer")){
		if(!empty($li->find('td td a', 0)->href)){
			$category_links[] = $li->find('td td a', 0)->href;
		}
	}
}


$ads = [];

	foreach ($category_links as $link) {

			$html = file_get_html('http://www.jobber.de/_1_myjobber/' . $link);
			$job_arr = [];

					$job_arr['title'] = trim($html->find('.main', 3));
					$job_arr['ad_date'] = trim(substr($html->find('.small', 9)->plaintext, 37));
					//$job_arr['crawler_id'] = $db_crawler->id;
					//$job_arr['ad_date'] = Carbon::createFromFormat('d.m.Y', substr(trim($job_link->last_child()->find('.job-date', 0)->plaintext), 0, -1))->format("Y-m-d");
					$job_arr['city'] = trim($html->find('.main', 7)->plaintext);
					$job_arr['source'] = "jobber";
					$job_arr['link'] = "http://www.jobber.de/_1_myjobber/" . $link;
					$ads[] = $job_arr;
	}

echo "<pre>";
print_r($ads);
