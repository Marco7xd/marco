<?php 
//Stellengesuche

include('simple_html_dom.php');

//Erstellt Linkliste für Seite eins 
$category_links = [];
	$html = file_get_html('http://www.stellengesuche-personal.de/profile/personalvermittlung/news-0-1.html');
	$main = $html->find('.content', 0);

	foreach ($main->find('.textnews') as $a) {
		$category_links[] = $a->first_child()->href;
	}

//Bestimmt erste Anzeige, beliebige seite
function check($page){
$html = file_get_html('http://www.stellengesuche-personal.de/profile/personalvermittlung/news-0-'.$page.'.html');
$main = $html->find('.content', 0);

$check = [];
	foreach ($main->find('div[class=news_list]') as $li) {
		$check[] = $li->first_child()->plaintext;
	}

return $check[0];
}

//Looped durch alle Seiten, vergleicht alle Seiten mit der ersten 
$i = 2;
while(check(1) !== check($i)){
	$html = file_get_html('http://www.stellengesuche-personal.de/profile/personalvermittlung/news-0-'.$i.'.html');
	$main = $html->find('.content', 0);

	foreach ($main->find('.textnews') as $a) {
		$category_links[] = $a->first_child()->href;
	}
	$i++;
}

//Erstellt für jeden Link ein Array
foreach($category_links as $link){
	$file = 'http://www.stellengesuche-personal.de' . $link;
	$file_headers = @get_headers($file);
	if($file_headers[0] != 'HTTP/1.1 200 OK') {
		//do nothing
	}else{

		$html = file_get_html('http://www.stellengesuche-personal.de' . $link);
		$link_ol = $html->find('div[class=news_list]', 0);
		//für jede stellenanzeige titel, firmenname etc. raussuchen

				$job_arr = [];


				//$job_arr['crawler_id'] = $db_crawler->id;

				//carbon formatiert nur das datum, siehe http://carbon.nesbot.com/docs/
				//$job_arr['ad_date'] = Carbon::createFromFormat('d.m.Y', substr(trim($job_link->last_child()->find('.job-date', 0)->plaintext), 0, -1))->format("Y-m-d");

				echo $job_arr['city'] = trim($link_ol->children(1)->children(6)->children(0)->children(0)->children(1)->children(1));
				exit();
				$job_arr['source'] = "Stellengesuche";
				$job_arr['link'] = "http://www.stellengesuche-personal.de/" . $link;
				$job_arr['title'] = trim($link_ol->children(1)->children(2)->children(0)->children(1)->children(1)->children(1)->plaintext);
				$job_arr['company_name'] = '';


				$ads[] = $job_arr;

		
	}
}


echo "<pre>";
print_r($ads);
echo "<pre>";



