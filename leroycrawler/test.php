<?php

include('simple_html_dom.php');



//überprüft ob Stellen auf der Seite existieren
function page($main){

	if (strpos($main, "Keine Fahrerprofile gefunden")) {
		$page = false;
	}else{$page = true;}

	return $page;
}

//Lädt erste Seite 
$html = file_get_html('http://lkw-fahrer-gesucht.com/truckerboerse.html?&seite=1');
$main = $html->find('.page_content', 0);


$category = [];
$i = 1;

//Looped durch die Seiten, speichert href Link in array 

while ( page($main) == true) {
$html = file_get_html('http://lkw-fahrer-gesucht.com/truckerboerse.html?&seite='.$i);
$main = $html->find('.page_content', 0);
	foreach ($main->find('.row .col-xs-9 h2 a') as $li) {
		$category[] = $li->href;
	}
	$i++;
}



$ads = [];
		foreach($category as $link){
			$job_arr = [];

			$html = file_get_html('http://lkw-fahrer-gesucht.com' . $link);
			$title_ol = $html->find('#h1_headline', 0);

			$job_arr['title'] = trim($title_ol->plaintext);
			$link_ol = $html->find('table', 0);
					
					//$job_arr['crawler_id'] = $db_crawler->id;
					//$job_arr['ad_date'] = Carbon::createFromFormat('d.m.Y', substr(trim($job_link->last_child()->find('.job-date', 0)->plaintext), 0, -1))->format("Y-m-d");
					$job_arr['city'] = trim($link_ol->children(2)->children(1)->plaintext);
					$job_arr['source'] = "lkw-fahrer-gesucht";
					$job_arr['link'] = "http://lkw-fahrer-gesucht.com" . $link;
					//$job_arr['company_name'] = trim($job_link->children(2)->children(1)->plaintext);
					$ads[] = $job_arr;
		}
echo "<pre>";		
print_r($ads);
echo "</pre>";

/*
		foreach($ads as $k => $v){
			$options = array(
				CURLOPT_POST		   => 0,
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

		    echo $html;

		}
		*/
