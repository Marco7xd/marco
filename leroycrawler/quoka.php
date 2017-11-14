<?php

include('simple_html_dom.php');

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

//Quoka
$pg = 1;

$job_arr = [];

do{
	$html = file_get_html('http://www.quoka.de/qmca/search/search.html?redirect=0&catid=33_3306&pageNo='.$pg);
//looped durch die Zeilen
	foreach($html->find('#ResultListData',0)->find('.hlisting') as $li){
		//Holt sich die Stellen mit Href
		if(!strpos($li, 'TOP')){
			if (isset($li->find('a', 1)->href)) {
					$job_arr['source'] = "Quoka";
					$job_arr['link'] = trim('http://www.quoka.de' . $li->find('a', 1)->href);
					//$job_arr['date'] = trim($li->find('.date',0)->plaintext);
					$job_arr['title'] =  trim($li->find('h2', 0)->plaintext);
					$job_arr['city'] = trim(preg_replace( "/\r|\n/", "", str_replace('D -', '', $li->find('.address ,location',0)->plaintext) ));
					$job_arr['lang'] = 'de';
					$job_arr['type'] = 'search';

					$options = array(
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_HEADER         => false,
						CURLOPT_FOLLOWLOCATION => true,
						CURLOPT_USERAGENT      => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
						CURLOPT_AUTOREFERER    => true,
						CURLOPT_CONNECTTIMEOUT => 120,
						CURLOPT_TIMEOUT        => 120,
						);
					$ch = curl_init(str_replace(" ", "%20", 'http://www.quoka.de' . $li->find('a', 1)->href));
					curl_setopt_array($ch, $options);
					$content  = curl_exec($ch);

					$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
					$job_arr['link'] = $url;

					$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
					$body = substr($content, $header_size);

					curl_close($ch);

					$job_arr['body'] = trim($body->plaintext);
					$ads[] = $job_arr;

				}else{
					$job_arr['source'] = "Quoka";
					$id = get_string_between($li->find('a[data-qng-prg]',0)->outertext,'data-qng-prg="','|');

					$fields = array(
						'prg_adno' => $id
						);

					$fields_string = http_build_query($fields);
					$options = array(
						CURLOPT_POST 		   => count($fields),
						CURLOPT_POSTFIELDS 	   => $fields_string,
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_HEADER         => false,
						CURLOPT_FOLLOWLOCATION => true,
						CURLOPT_USERAGENT      => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
						CURLOPT_AUTOREFERER    => true,
						CURLOPT_CONNECTTIMEOUT => 120,
						CURLOPT_TIMEOUT        => 120,
						);

					$ch = curl_init('http://www.quoka.de/qmca/search/search.html?redirect=0&catid=33_3306&pageNo='.$pg);
					curl_setopt_array($ch, $options);

					$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
					$job_arr['link'] = $url;

					$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
					$body = substr($content, $header_size);

					$content  = curl_exec($ch);
					$info = curl_getinfo($ch);
					curl_close($ch);
					$job_arr['link'] = trim($info['url']);
					//$job_arr['date'] = trim($li->find('.date',0)->plaintext);
					$job_arr['title'] =  trim($li->find('h2', 0)->plaintext);
					$job_arr['city'] = trim(preg_replace( "/\r|\n/", "", str_replace('D -', '',$li->find('.address ,location',0)->plaintext) ));
					$job_arr['lang'] = 'de';
					$job_arr['type'] = 'search';

					$job_arr['body'] = trim($body->plaintext);
					$ads[] = $job_arr;

				}
			}
		}
	$pg++;
	

}while(preg_match('/<li class="arr-rgt active">/',$html));


//Holt sich die Topstellen
$html = file_get_html('http://www.quoka.de/kleinanzeigen/cat_33_3306_ct_0_page_1.html?only=toplist');

	foreach($html->find('#ResultListData',0)->find('.hlisting') as $li){
		//Holt sich die Stellen mit Href
			if (isset($li->find('a', 1)->href)) {
					$job_arr['source'] = "Quoka";
					$job_arr['link'] = trim('http://www.quoka.de' . $li->find('a', 1)->href);
					//$job_arr['date'] = trim($li->find('.date',0)->plaintext);
					$job_arr['title'] =  trim($li->find('h2', 0)->plaintext);
					$job_arr['city'] = trim(preg_replace( "/\r|\n/", "", str_replace('D -', '', $li->find('.address ,location',0)->plaintext) ));
					$job_arr['lang'] = 'de';
					$job_arr['type'] = 'search';

					$options = array(
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_HEADER         => false,
						CURLOPT_FOLLOWLOCATION => true,
						CURLOPT_USERAGENT      => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
						CURLOPT_AUTOREFERER    => true,
						CURLOPT_CONNECTTIMEOUT => 120,
						CURLOPT_TIMEOUT        => 120,
						);
					$ch = curl_init(str_replace(" ", "%20", 'http://www.quoka.de' . $li->find('a', 1)->href));
					curl_setopt_array($ch, $options);
					$content  = curl_exec($ch);

					$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
					$job_arr['link'] = $url;

					$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
					$body = substr($content, $header_size);

					curl_close($ch);

					$job_arr['body'] = trim($body->plaintext);
					$ads[] = $job_arr;

				}else{
					$job_arr['source'] = "Quoka";
					$id = get_string_between($li->find('a[data-qng-prg]',0)->outertext,'data-qng-prg="','|');

					$fields = array(
						'prg_adno' => $id
						);

					$fields_string = http_build_query($fields);
					$options = array(
						CURLOPT_POST 		   => count($fields),
						CURLOPT_POSTFIELDS 	   => $fields_string,
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_HEADER         => false,
						CURLOPT_FOLLOWLOCATION => true,
						CURLOPT_USERAGENT      => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
						CURLOPT_AUTOREFERER    => true,
						CURLOPT_CONNECTTIMEOUT => 120,
						CURLOPT_TIMEOUT        => 120,
						);

					$ch = curl_init('http://www.quoka.de/qmca/search/search.html?redirect=0&catid=33_3306&pageNo='.$pg);
					curl_setopt_array($ch, $options);

					$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
					$job_arr['link'] = $url;

					$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
					$body = substr($content, $header_size);

					$content  = curl_exec($ch);
					$info = curl_getinfo($ch);
					curl_close($ch);
					$job_arr['link'] = trim($info['url']);
					//$job_arr['date'] = trim($li->find('.date',0)->plaintext);
					$job_arr['title'] =  trim($li->find('h2', 0)->plaintext);
					$job_arr['city'] = trim(preg_replace( "/\r|\n/", "", str_replace('D -', '',$li->find('.address ,location',0)->plaintext) ));
					$job_arr['lang'] = 'de';
					$job_arr['type'] = 'search';

					$job_arr['body'] = trim($body->plaintext);
					$ads[] = $job_arr;

				}
	}

echo "<pre>";
print_r($ads);
