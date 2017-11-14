<?php 
//1A Personal
//hier noch die simple html dom datei includen - download auf http://simplehtmldom.sourceforge.net/
include('simple_html_dom.php');
//hier wird nur der crawler ausgewählt, der aktiv ist, unwichtig..
//$db_crawler = Crawler::where('db_name', 'fazjob')->first();

//file get html zieht sich denn Quellcode der Seite - http://simplehtmldom.sourceforge.net/manual.htm

$html = file_get_html('http://www.1a-personalservice.de/front_content.php?idcat=79&page=0&size=40&column&jobtitle_id=&subjectarea_id=&query=&specialization_id=&typeofinstitution_id=');
$main = $html->find('.form-inline', 0);

$dummy_links = [];
//Sammelt die Links
foreach ($main->find('tr a') as $tr) {
	$dummy_links[] = $tr->href;
}
$array = array("null" => "datei", "eins" => "string", "drei" => "integer");

print_r($array);
exit();

$category_links = [];
//Duplikate entfernen, Key  Lücken füllen
$dummy_links = array_unique($dummy_links);
foreach ($dummy_links as $key) {
	$category_links[] = $key;
}

//Erstellt für jeden Link ein Array
foreach($category_links as $link){
	$file = 'http://www.1a-personalservice.de/' . $link;
	$file_headers = @get_headers($file);
	if($file_headers[0] != 'HTTP/1.1 200 OK') {
		//do nothing
	}else{

		$html = file_get_html('http://www.1a-personalservice.de/' . $link);
		$link_ol = $html->find('.stellenangebot_box_shadow', 0);
		//für jede stellenanzeige titel, firmenname etc. raussuchen

				$job_arr = [];
				//$job_arr['crawler_id'] = $db_crawler->id;

				//carbon formatiert nur das datum, siehe http://carbon.nesbot.com/docs/
				//$job_arr['ad_date'] = Carbon::createFromFormat('d.m.Y', substr(trim($job_link->last_child()->find('.job-date', 0)->plaintext), 0, -1))->format("Y-m-d");
				$city = explode("							" , trim($link_ol->find('#job_summery', 0)->children(3)->children(1)->plaintext));
				$job_arr['city'] = $city[2];
				$job_arr['source'] = "1a Personal";
				$job_arr['link'] = "http://www.1a-personalservice.de/" . $link;
				$job_arr['title'] = trim($link_ol->find('#job_summery', 0)->children(0)->children(1)->plaintext);
				$company_name = explode(" ", trim($link_ol->find('.col-xs-10', 0)->plaintext));
				$job_arr['company_name'] = $company_name[0];

				$ads[] = $job_arr;
	}
}
echo "<pre>";
print_r($ads);
echo "<pre>";