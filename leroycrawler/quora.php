<?php

include('simple_html_dom.php');

$pg = 1;

do{

	$options = array(

		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HEADER         => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_USERAGENT      => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
		CURLOPT_AUTOREFERER    => true,
		CURLOPT_CONNECTTIMEOUT => 120,
		CURLOPT_TIMEOUT        => 120,
		);

	$ch = curl_init(str_replace(" ", "%20", 'https://www.quora.com/sitemap/people?page_id='.$pg));
	curl_setopt_array($ch, $options);
	$content = curl_exec($ch);
	curl_close($ch);

	$html = str_get_html($content);

	foreach($html->find('.ContentWrapper',0)->children(0)->children(2)->find('a') as $li){

		$options = array(

			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HEADER         => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_USERAGENT      => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
			CURLOPT_AUTOREFERER    => true,
			CURLOPT_CONNECTTIMEOUT => 120,
			CURLOPT_TIMEOUT        => 120,
			);

		$ch = curl_init(str_replace(" ", "%20", $li->href));
		curl_setopt_array($ch, $options);

		$content  = curl_exec($ch);

		curl_close($ch);

		$link = str_get_html($content);

		$job_arr['name'] = trim($link->find('.user',0)->plaintext);

		if (preg_match('/WorkCredentialListItem/', $link->find('.contents',0))) {
			$job_arr['title'] = trim($link->find('.contents',0)->find('.WorkCredentialListItem',0)->plaintext);
		}elseif (preg_match('/SchoolCredentialListItem/', $link->find('.contents',0))) {
			$job_arr['title'] = trim($link->find('.contents',0)->find('.SchoolCredentialListItem',0)->plaintext);
		}else{
			$job_arr['title'] = ' ';
		}

		if (preg_match('/LocationCredentialListItem/', $link->find('.contents',0))) {
			$arr = explode(' ', $link->find('.contents',0)->find('.LocationCredentialListItem',0)->plaintext);
			unset($arr[0]);
			unset($arr[1]);
			$city = implode(' ', $arr);
			$job_arr['city'] = trim($city);
		}else{
			$job_arr['city'] = ' ';
		}

			$job_arr['link'] = trim($li->href);
			$job_arr['source'] = 'Quora';
			$job_arr['type'] = "search";
			$job_arr['lang'] = "US";
			$job_arr['body'] = trim($link->plaintext);
			print_r($job_arr);
			sleep(20);
			$ads[] = $job_arr;
	}
	$pg++;
}while(preg_match('/rel="next"/', $html->find('.ContentWrapper',0)));
