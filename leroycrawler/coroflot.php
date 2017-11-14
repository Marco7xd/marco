<?php

include_once('simple_html_dom.php');
$ads = [];
$pg = 1;

//rekurisve suche
function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}

//string zwischen 2 strings
function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

	do{

		$fields = array(
		  'fields[word_trunc]' => '',
		  'fields[truncate_str]' => '[object Window]',
		  'fields[insert]' => 'undefined[object Window]',
		  'page_number' => $pg,
		  'keyword[word_trunc]' => '',
		  'keyword[truncate_str]' => '[object Window]',
		  'keyword[insert]' => 'undefined[object Window]',
		  'location_search[word_trunc]' => '',
		  'location_search[truncate_str]' => '[object Window]',
		  'location_search[insert]' => 'undefined[object Window]',
		  'year_of_exp_range[word_trunc]' => '',
		  'year_of_exp_range[truncate_str]' => '[object Window]',
		  'year_of_exp_range[insert]' => 'undefined[object Window]',
		  'sort_by' => 6,
		  'currently_featured' => 'false'
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

		$ch = curl_init("http://www.coroflot.com/people");
		curl_setopt_array($ch, $options);

		$content_tmp  = curl_exec($ch);

		$content = get_string_between($content_tmp, '<section class="col col780 col780_add_20px">','<script src="/javascripts/site_search.js"></script>');

		curl_close($ch);

		preg_match_all('#<li data-c-asset-id(.*?)</li>#', $content, $arr);
		
		$t =  count($arr[0]);
		$d = [];

		//print_r($arr[0]);
/*
		for ($i=0; $i < $t ; $i++) { 
			$html = str_get_html($arr[0][$i]);

			$d[] = $html->find('a',0)->href;
		}
		print_r($d);


		if (count($arr[0]) == 0) {
			exit();
		}

*/
	for ($i=0; $i < $t ; $i++) { 
		$li = str_get_html($arr[0][$i]);

			if(!in_array_r(trim($li->find('a',0)->href), $ads)) {
				
				$job_arr['name'] = trim($li->find('strong',0)->plaintext);
				$job_arr['title'] = trim($li->find('.specialty_list',0)->plaintext);
				$job_arr['link'] =  trim($li->find('a',0)->href);
				$job_arr['city'] =  trim($li->find('.p_loc',0)->plaintext);
				$job_arr['source'] = "Coroflot";
				$tmp = explode('"', $li->find('.meta_hover',0)->plaintext);
				$date = explode(' ', $tmp[0]);
				$job_arr['ad_date'] = trim($date[4].' '.$date[5].' '.$date[6]);
				$job_arr['type'] = "search";
				$job_arr['lang'] = "us";

				$ads[] = $job_arr; 
			}
	}

	$pg++;

	}while(count($arr[0]) != 0);

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

    $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    $ads[$k]['link'] = $url;

    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $body = substr($content, $header_size);

    curl_close($ch);

    $html = str_get_html($body);

    $ads[$k]['body'] = trim($html->plaintext);
}
