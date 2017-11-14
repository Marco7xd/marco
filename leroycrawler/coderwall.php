<?php

include('simple_html_dom.php');

function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}

$ads = [];
$pg = 13;

do{

	$html = file_get_html('https://coderwall.com/trending/'.$pg);

	foreach ($html->find('.bg-white',1)->find('.font-sm') as $li) {
		if (in_array_r('https://coderwall.com'.$li->find('a',0)->href, $ads) == false) {
		
			$options = array(
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_HEADER         => false,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_USERAGENT      => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
				CURLOPT_AUTOREFERER    => true,
				CURLOPT_CONNECTTIMEOUT => 120,
				CURLOPT_TIMEOUT        => 120,
				);

			$ch = curl_init(str_replace(" ", "%20", 'https://coderwall.com'.$li->find('a',0)->href));
			curl_setopt_array($ch, $options);

			$content  = curl_exec($ch);

			curl_close($ch);


			$link = str_get_html($content);

			$job_arr['name'] = trim($link->find('h1[itemprop=name]',0)->plaintext);
			$title = '';
				if (preg_match('/Interests & Skills /', $link)) {
					foreach ($link->find('.mt3',2)->find('.diminish') as $t) {
						$title .= trim($t->plaintext).' ';
					}
				}else{$title = '';}
			$job_arr['title'] = $title;
			$job_arr['city'] = trim($link->find('div[itemprop=homeLocation]',0)->plaintext);
			$job_arr['link'] = 'https://coderwall.com'.$li->find('a',0)->href;
			$job_arr['source'] = 'Coderwall';
			$job_arr['type'] = "search";
			$job_arr['lang'] = "US";
			$job_arr['pg'] = $pg;
			$job_arr['body'] = $html->plaintext;
			$ads[] = $job_arr;
			print_r($job_arr);
		}

	}
	$pg++;
}while(preg_match('/next/', $html->find('.pr0',0)));