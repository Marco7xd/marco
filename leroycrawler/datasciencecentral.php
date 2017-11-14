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

$pg = 3990;

do{
$html = file_get_html('http://www.datasciencecentral.com/profiles/friend/list?page='.$pg);


$main = $html->find('.members_list',0);

	foreach($main->find('.member_item') as $li){
		$url = file_get_html('http://www.datasciencecentral.com'.$li->find('a',0)->href);

		$job_arr['name'] = trim($url->find('.xg_module_body',1)->find('span',0)->plaintext);
		$job_arr['city'] = trim($li->find('p',0)->plaintext);
		//holt sich den Job Titel aus den dd Tags
			if (preg_match('/Your Job Title/', $url)) {
				$arr = explode('<dl >', $url);
				foreach ($arr as $s) {
					if (preg_match('/Your Job Title/', $s)) {
						$dd  = $s;
						break;
					}
				}
				$job_arr['title'] = get_string_between($dd,'<dd>','</dd>');
			}else if(preg_match('/Field of Expertise/', $url)){
				$arr = explode('<dl >', $url);
				foreach ($arr as $s) {
					if (preg_match('/Field of Expertise/', $s)) {
						$dd  = $s;
						break;
					}
				}
				$job_arr['title'] = get_string_between($dd,'<dd>','</dd>');
			}else{	$job_arr['title'] = '';}
		

		$job_arr['source'] = 'datasciencecentral';
		$job_arr['link'] = 'http://www.datasciencecentral.com'.trim($li->find('a',0)->href);
		print_r($job_arr);
		$ads[] = $job_arr;
	}
	$pg++;
}while(preg_match('/xg_source=profiles_memberList_next/', $html));

exit();
echo '<pre>';
print_r($ads);
