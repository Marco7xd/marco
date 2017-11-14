<?php

include('simple_html_dom.php');

//letzte seite bei 3810, je Seite wird um 30 inkrementiert
$pg = 0;
$category_links = [];

//Holt sich die einzelnen Links für die Stellenanzeigen
do{
	$html = file_get_html('http://www.stellenmarkt.de/display_list.php?&art_id=2&ANZEIGE_DATUM=21&QUERY_OPT=1&hits_to_show=30&off='.$pg);
	$main = $html->find('.topjobs2');

	foreach ($main as $div) {
		foreach ($div->find('a') as $li) {
			$category_links[] = $li->href;
		}
	}
	$pg+=30;
}while(strpos($html, 'title=" Seite weiter"'));

$ads = [];

foreach($category_links as $k){
    $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_USERAGENT      => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
        CURLOPT_AUTOREFERER    => true,
        CURLOPT_CONNECTTIMEOUT => 120,
        CURLOPT_TIMEOUT        => 120,
        );

    $ch = curl_init(str_replace(" ", "%20", 'http://www.stellenmarkt.de'.$k));
    curl_setopt_array($ch, $options);

    $content  = curl_exec($ch);

    curl_close($ch);

    $html = str_get_html($content);
    //überprüft ob eine Postleitzahl vorhanden ist und häbgt sie an die Stadt
    	if (strpos($html->find('#bxcontent-center',0), 'PLZ') !== false) {
    		$city = trim($html->find('.bgnorm',2)->plaintext).' '.trim($html->find('.bgnorm',5)->plaintext);
    	}else{$city = trim($html->find('.bgnorm',2)->plaintext);}

    $job_arr['city'] = $city;
    //holt sich den Ttile aus der Überschrift
    $array = explode(' ', trim($html->find('h2',1)->plaintext));
    unset($array[0]);
    unset($array[1]);
    $title = implode(' ', $array);
    $job_arr['title'] = $title;
    $job_arr['source'] = "stellenmarkt";
    $job_arr['link'] = trim('http://www.stellenmarkt.de'.$k);
    $time = $html->find('.anzeige',0)->plaintext;
    $job_arr['date'] = trim(end(explode(' ', $time)));
    $job_arr['body'] = $html->plaintext;

    $ads[] = $job_arr;

}

echo "<pre>";
print_r($ads);