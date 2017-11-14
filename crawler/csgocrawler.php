<?php
include('simple_html_dom.php');
$itemliste = [];

$pg = 1;
$hasmore = true;

do{
	$html = file_get_html('https://csgo.igvault.com/Items/Rifle/M4A1-S?page='.$pg);
	if($html->find('.pro', 0) == ""){
		$hasmore = false;
	}

	if($hasmore){

		foreach ($html->find('.pro') as $class) {

			$item_arr['waffen_name'] = $class->find('.f14', 0)->plaintext;
			$item_arr['klassifizierung'] = $class->find('.f12', 0)->plaintext;
			$item_arr['preis'] = $class->find('.f20', 0)->plaintext;
			$item_arr['wear'] = $class->find('span.fl', 1)->plaintext;
			$item_arr['link'] = 'https:'.$class->find('a', 0)->href; 
			$item_arr['bildlink'] = 'https'.$class->find('img', 0)->src;

			$itemliste[] = $item_arr;
		}
		
		$pg++;
	}
} while ($hasmore); 
print_r($itemliste);exit();