<?php

include('simple_html_dom.php');

function in_array_r($needle, $haystack) {
    $found = false;
    foreach ($haystack as $item) {
    if ($item === $needle) { 
            $found = true; 
            break; 
        } elseif (is_array($item)) {
            $found = in_array_r($needle, $item); 
            if($found) { 
                break; 
            } 
        }    
    }
    return $found;
}

    $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_USERAGENT      => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
        CURLOPT_AUTOREFERER    => true,
        CURLOPT_CONNECTTIMEOUT => 120,
        CURLOPT_TIMEOUT        => 120,
        );

	$ch = curl_init(str_replace(" ", "%20", 'https://geekli.st/communities'));
	curl_setopt_array($ch, $options);

	$content  = curl_exec($ch);

	curl_close($ch);

$list = str_get_html($content);

$c = 1;

foreach ($list->find('.list-items',0)->find('a') as $arr_link) {
$pg = 1;

	do{
		$html = file_get_html('https://geekli.st'.$arr_link->href.'/members/active?page='.$pg);
		foreach ($html->find('#body-center',0)->find('.user-item') as $li) {
			if(!empty($li->find('.name',0)->plaintext)){
				if(in_array_r('https://geekli.st'.$li->find('.screen_name a',0)->href,$job_arr) == false){
					$job_arr['name'] = $li->find('.name',0)->plaintext;
					$job_arr['title'] = $li->find('.title',0)->plaintext;
					$job_arr['city'] = $li->find('.location',0)->plaintext; 
					$job_arr['link'] = 'https://geekli.st'.$li->find('.screen_name a',0)->href;
					$job_arr['source'] = 'geekli.st'; 
					$job_arr['type'] = "search";
					$job_arr['lang'] = "us";

					$ads[] = $job_arr;
				}
			}
		}
		$pg++;
	}while (!preg_match('/Missing Params/', $html));
}


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