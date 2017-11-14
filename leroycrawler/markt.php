<?php
include('simple_html_dom.php');

//bestimmt die Seitenanzahl
//letzte seite 49
$pg = 1;

$html = file_get_html('http://www.markt.de/Jobs,+Karriere/Stellengesuche/categoryId,1801000000/page,50/suche.htm');

if (preg_match('/nächste Seite/', $html)) {
  echo 'is';
}else{
  echo 'not';
}
//array für die einzelnen stellen
$ads = [];

/*
//looped durch die einzelnen Seiten
do{
  $html = file_get_html('http://www.markt.de/Jobs,+Karriere/Stellengesuche/categoryId,1801000000/page,'.$pg.'/suche.htm');
   //looped holt sich durch find('.markt_aList',0) das Tabellen div
   //find('.markt_aList_item') einzelne stellenanzeigen
   foreach($html->find('.markt_aList',0)->find('.markt_aList_item') as $li){
    //ignoriet das ad
    if(!strpos($li, 'adMode') !== false){
      //ignoriert die beiden indeed Anzeigen pro Seite
      if(!strpos($li, 'indeed') !== false){
        $job_arr['date'] =  trim($li->find('.markt_aList_itemProperties2',0)->find('p',1)->plaintext);
        $job_arr['title'] =  trim($li->find('a[title]',0)->plaintext);
        $job_arr['link'] =  trim($li->find('a',0)->href);
        $job_arr['source'] = 'markt';
        $job_arr['city'] = trim($li->find('.markt_aList_itemProperties2',0)->find('p',0)->plaintext);
        $ads[] = $job_arr;
      }
    }
   }
   //inkrementiert die Seitenzahl um 1
   $pg++;
}while(strpos($html, 'nächste Seite'));

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

	//save it
	$ads[$k]['body'] = trim($html->plaintext);
}
*/
echo "<pre>";
print_r($ads);