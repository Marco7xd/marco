	<?php
	include('simple_html_dom.php');

	$categoryLinks = [];

	$itemliste = [];



	$html = file_get_html('https://stonefire.io/search/navigation/730');

	foreach($html->find('.btn-search-query') as $aTag){
		$categoryLinks[] = "https://stonefire.io/search/items/query.json?game=730&offset=0&limit=30&q=". str_replace(["/search?q=", "&amp;game=730", "+"], ["", "", "%20"], strtolower($aTag->href));
	}

	$offset = 0;

	foreach($categoryLinks as $link){
		$html = file_get_html($link);
		$html = json_decode($html);
		foreach($html->results as $result){
			$html = str_get_html($result->html);
			//echo $html->find('a', 0)->plaintext;
		} 
	} 

    foreach ($html->find('.item-box') as $class) {

    	$item_arr['waffen_name'] = $class->find('.item-name-link', 0)->plaintext; 
		//$item_arr['klassifizierung'] = $class->find('.item-name', 0,)->plaintext;
	    $item_arr['preis'] = $class->find('.item-eur-price', 0)->plaintext; 
		//$item_arr['wear'] = $class->find('span.fl', 1)->plaintext;
		$item_arr['link'] = 'https:'.$class->find('a', 0)->href; 
		$item_arr['bildlink'] = 'https'.$class->find('img-responsive', 0)->src;

		$itemliste[] = $item_arr;
        
    }

    print_r($itemliste);


















































