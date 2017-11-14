<?php

include('simple_html_dom.php');

$html = file_get_html('http://www.quoka.de/qmca/search/search.html?redirect=0&catid=33_3306&pageNo=1');
$main = $html->find('.alist',0);

foreach($main->find('li') as $li){
	if (!preg_match('/toplist/', $li)) {
		if (isset($li->find('a', 1)->href)) {
		}else{
			echo $li->find('a[id]',0);
		}
	}
}