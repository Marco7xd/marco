<?php 
//Jobbörse

include('simple_html_dom.php');

$html = file_get_html('http://www.jobboerse.de/allgemein-gesucherubriken');
$main = $html->find('table');

$category = [];
$category_sub = [];
$category_link = [];
foreach ($main[0]->children(4)->children(1)->children(6)->find('a') as $li) {
$category[] = $li->href;	
}


	
//erzeugt array mit kategorie links
foreach ($category as $li) {
$link = 'http://www.jobboerse.de/'. $li;
$html_sub = file_get_html($link);
$main_sub = $html_sub->find('table');
//looped durch die Unterkategorie
foreach ($main_sub[0]->children(4)->children(1)->children(6)->find('a') as $li) {
$category_sub[] = $li->href;
}
}

//erzeugt array mit unterkategorie links
foreach ($category_sub as $li) {
$link = 'http://www.jobboerse.de/'. $li;
$html_link = file_get_html($link);
$main_link = $html_link->find('table');
//looped durch die links
if(strpos($main_link[0], 'gefunden.')){
foreach ($main_link[0]->children(4)->children(1)->children(2)->children(0)->children(0)->children(1)->children(6)->find('a') as $li) {
if($li->href !== '#'){
$category_link[] = $li->href;	
}
}
}
}

echo "<pre>";
print_r($category_link);
echo "</pre>";
	


