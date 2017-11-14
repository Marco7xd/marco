<?php

include('simple_html_dom.php');

//http://it.toolbox.com/people/community_member/?u=1
//http://it.toolbox.com/people/community_member/?u=89695
$pg = 275;
$ads = [];

do{
    $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_USERAGENT      => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
        CURLOPT_AUTOREFERER    => true,
        CURLOPT_CONNECTTIMEOUT => 120,
        CURLOPT_TIMEOUT        => 120,
        );

    $ch = curl_init(str_replace(" ", "%20", 'http://it.toolbox.com/people/community_member/?u='.$pg));
    curl_setopt_array($ch, $options);

    $content  = curl_exec($ch);
    curl_close($ch);

    $html = str_get_html($content);

    if (preg_match('/Server Error in/', $html) == false) {
		    $job_arr['name'] = $html->find('.blue',0)->plaintext;
		    $job_arr['city'] = $html->find('#m_m_About_about_location',0)->plaintext;
		    $job_arr['title'] = $html->find('#m_m_t_rptTabContents_ctl00_esr',0)->plaintext;
		    $job_arr['link'] = 'http://it.toolbox.com/people/community_member/?u='.$pg;
		    $job_arr['source'] = 'toolbox'; 
		    $job_arr['type'] = "search";
		    $job_arr['lang'] = "us";
		    $ads[] = $job_arr;
	}

    $pg++;
}while(!empty($job_arr['name']));

array_pop($ads);

print_r($ads);