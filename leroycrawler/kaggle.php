<?php

include('simple_html_dom.php');

function curl($link){
	$options = array(

		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HEADER         => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_USERAGENT      => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
		CURLOPT_AUTOREFERER    => true,
		CURLOPT_CONNECTTIMEOUT => 120,
		CURLOPT_TIMEOUT        => 120,
		);

	$ch = curl_init(str_replace(" ", "%20", $link));
	curl_setopt_array($ch, $options);
	
	$content = curl_exec($ch);

	curl_close($ch);

	$html = str_get_html($content);
	return $html; 
}

function in_array_r($needle, $haystack) {
    $found = false;
    foreach ($haystack as $item) {
    if ($item === $needle) { 
            $found = true; 
            break; 
        } elseif (is_array($item)) {
            $found = in_array_r($needle, $item); 
            if($found) { 
                break; 
            } 
        }    
    }
    return $found;
}


//https://www.kaggle.com/t/1000/
//leaderboard-container
$pg = 7000;
$arr = [];
$c = [];

do{

	$html = curl('https://www.kaggle.com/t/'.$pg.'/');

	if(!preg_match('/alt="404 Error"/', $html)){
		//überprüft ob die challenge schon im array ist
		if (!in_array($html->find('#competition',0)->find('h1',0)->find('a',0)->href, $c)) {

			$pj = curl('https://www.kaggle.com'.$html->find('#competition',0)->find('h1',0)->find('a',0)->href.'/leaderboard');

			if (!preg_match('/Create an account/', $pj)) {
				if(!preg_match('/alt="404 Error"/', $pj)){
				//trägt die challenge in ein vergleichsarray
				$c[] = $html->find('#competition',0)->find('h1',0)->find('a',0)->href;

					foreach ($pj->find('#leaderboard-container',0)->find('.team-link') as $li) {
						if (!in_array($li->href,$arr)) {
							$arr[] = $li->href; 
							print_r($c);
						}
					}
				}
			}
		}
	}




echo $pg;
$pg++;

}while($pg <= 9000);
