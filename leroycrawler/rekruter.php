<?php

include('simple_html_dom.php');

$html = file_get_html('http://jobs.rekruter.de/jobs/Account.htm');

$i = 1;
$job_arr = [];
foreach ($html->find('.table_r3') as $tb) {
	foreach ($tb->find('tr') as $li) {
		if (strpos($li, '<h4>')) {
			$match = [];
			preg_match('/^Arbeitsort:(.*),/', $li, $match);
			print_r($match);
		/*
        $job_arr['company name'] =  $cpn->find('.opttitle',0)->plaintext;
        $job_arr['ad_date'] = trim($li->find('.anzeigedate',0)->plaintext);
        $job_arr['source'] = "stellenmarkt";
        $job_arr['link'] = trim('https://stellenmarkt.de' . $li->find('.lhi a', 0)->href);
        $job_arr['title'] =  trim($li->find('.lhi a[title]', 0)->plaintext);
        $job_arr['city'] = trim($li->find('.white a',1)->plaintext);
        $ads[] = $job_arr;
        */
    	}
	}
}

