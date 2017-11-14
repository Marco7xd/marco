		<?php
		include('simple_html_dom.php');
		$itemliste = [];
		
        $pg = 1;
	    $hasmore = true;

					
		do {
			$html = file_get_html('https://skinxchange.com/market/search?text=&filters[game_id]=730&page='.$pg);
			echo $html;exit();
	    if($html->find('.item-content.px2.py1.m1', 0) == "") {
	    	$hasmore = false;
	     }
		
		if($hasmore){
		

			foreach ($html->find('.item-content.px2.py1.m1') as $class){

			$item_arr['waffen_name'] = $class->find('.table-cell align-bottom', 0)->plaintext;
			$item_arr['klassifizierung'] = $class->find('.table-cell align-bottom', 1)->plaintext;
			$item_arr['preis'] = $class->find('.item-price-text', 0)->plaintext;
			//$item_arr['wear'] = $class->find('span.fl', 1)->plaintext;
			$item_arr['link'] = 'https:'.$class->find('a', 0)->href; 
			$item_arr['bildlink'] = 'https'.$class->find('.fit', 0)->src;

			$itemliste[] = $item_arr;	
			print_r($item_arr);exit();
			}

			$pg++;
		}

		} while ($hasmore);
	
