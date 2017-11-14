<?php

include('simple_html_dom.php');

$html = file_get_html('https://www.jobber.de/_1_myjobber/jobs-praktika-liste.html');


$job_arr = [];

do {
	$link = $html->find('div[align=right] a' , 0)->href;
	
	foreach ($html->find('.suchergebnis-zeile') as $li) {
		
		$e = explode("<br>", $li->find('.tabjoblist', 1)->outertext);
		$job_arr['company_name'] = trim($e[0]); 
		$job_arr['source'] = "Jobber";
		$job_arr['link'] = trim('http://www.jobber.de/_1_myjobber/' . $li->find('a', 2)->href);
		$file = 'http://www.jobber.de/_1_myjobber/' . $li->find('a', 2)->href;
		$file_headers = @get_headers($file);
		if($file_headers[0] == 'HTTP/1.1 200 OK') {$job_html = file_get_html($file);
		$job_arr['ad_date'] = trim($job_html->find('span',2)->plaintext);
		$job_arr['title'] =  trim($job_html->find('.main',5)->plaintext);
		$job_arr['city'] = trim($job_html->find('.main',7)->plaintext);
		}

		$ads[] = $job_arr;
	}

	$html = file_get_html('http://www.jobber.de/_1_myjobber/' . $link);
} while (strpos($html->find('table' , 13)->plaintext, 'Weiter'));

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

			curl_close($ch);

		    $html = str_get_html($content);

		    //save it
		    $ads[$k]['body'] = $html->plaintext;

		}

	echo "<pre>";
	print_r($ads);