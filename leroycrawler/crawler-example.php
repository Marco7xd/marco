<?php
//hier noch die simple html dom datei includen - download auf http://simplehtmldom.sourceforge.net/
include('simple_html_dom.php');
//hier wird nur der crawler ausgewählt, der aktiv ist, unwichtig..
//$db_crawler = Crawler::where('db_name', 'fazjob')->first();

//file get html zieht sich denn Quellcode der Seite - http://simplehtmldom.sourceforge.net/manual.htm
$html = file_get_html('https://stellenmarkt.faz.net/jobsuche-branchen/a-z/');

//suche nach dem einem element mit der id main-content
$main_content = $html->find('#main-content', 0);
$category_links = [];

//sammle die links zu allen kategorien
foreach($main_content->find('.quicklink-list-item') as $li){
	if($li->first_child() != ""){
		$category_links[] = $li->first_child()->href;
	}
}

$ads = [];


//suche in jeder kategorie alle links zu stellenanzeigen raus
foreach($category_links as $link){
	$html = file_get_html('https://stellenmarkt.faz.net' . $link);
	$link_ol = $html->find('#main-content', 0);
	//für jede stellenanzeige titel, firmenname etc. raussuchen
	foreach($link_ol->find('a') as $job_link){
		if(trim($job_link->plaintext) != "Weitere Jobs finden ..."){
			$job_arr = [];
			//$job_arr['crawler_id'] = $db_crawler->id;

			//carbon formatiert nur das datum, siehe http://carbon.nesbot.com/docs/
			//$job_arr['ad_date'] = Carbon::createFromFormat('d.m.Y', substr(trim($job_link->last_child()->find('.job-date', 0)->plaintext), 0, -1))->format("Y-m-d");
			$job_arr['city'] = trim($job_link->last_child()->find('.location-city', 0)->plaintext);
			$job_arr['source'] = "fazjob";
			$job_arr['link'] = "https://stellenmarkt.faz.net" . $job_link->{'data-post-href'};
			$job_arr['title'] = trim($job_link->children(2)->children(0)->plaintext);
			$job_arr['company_name'] = trim($job_link->children(2)->children(1)->plaintext);

			$ads[] = $job_arr;
		}
	}
}

//hole den quelltext von jeder stellenanzeige per curl - siehe http://codular.com/curl-with-php
foreach($ads as $k => $v){
	$options = array(
		CURLOPT_POST		   => 1,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HEADER         => true,
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

	//save it
	if($html->find('#job_summary', 0) != "") {
		if($html->find('#job_summary', 0)->next_sibling() != ""){
			$ads[$k]['body'] = trim($html->find('#job_summary', 0)->next_sibling()->plaintext);
		} else {
			$ads[$k]['body'] = trim($html->plaintext);
		}
	} else {
		$ads[$k]['body'] = trim($html->plaintext);
	}

	//speichern in der datenbank, hier unwichtig
	/*
	$current = JobAd::where('link', $ads[$k]['link'])->first();
	if($current == null){
		JobAd::create($ads[$k]);
	}
	*/

	//ausgabe zum testen, es sollte das array mit der 1. stellenanzeige erscheinen
	print_r($ads[$k]);exit();
}
