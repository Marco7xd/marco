<?php 

include('simple_html_dom.php');

$html = file_get_html('http://www.jobing.com/markets?change=local&i=&stay=');
//state-links

foreach ($html->find('.state-links',0)->find('li') as $li) {
	echo $li->find('a',0)->href.' ';
};
