<?php

include('simple_html_dom.php');


$html = file_get_html('http://www.stellenmarkt.de/branchen');
$main = $html->find('.well .span9',0);

$category_link = [];
//speichert die Branchen links im array
foreach ($main->find('.a') as $li) {
    $category_link[] = $li->href;
}

$job_arr = [];
foreach ($category_link as $suf) {

//holt sich den table mit den links und looped durch die Seiten
    do{
        $url = 'https://stellenmarkt.de'. $suf;
        $html = file_get_html($url);
        $main = $html->find('#resultlist',0);

        foreach ($main->find('tr') as $li) {
            //Wirft die Werbung und das erste <TR> raus aus dem Array
            if (!empty($li->find('.jobsaver',0))) {
//überprüft ob der Link funktioniert, speichert Daten im array
                $file_headers = @get_headers('http://www.stellenmarkt.de'.$li->find('.small a',0)->href);
                if($file_headers[0] == 'HTTP/1.1 200 OK') {
                    //connected auf die company Seite um sich den Namen zu ziehen
                    $cpn = file_get_html('http://www.stellenmarkt.de'.$li->find('.small a',0)->href);
                    $job_arr['company name'] =  $cpn->find('.opttitle',0)->plaintext;
                    $job_arr['ad_date'] = trim($li->find('.anzeigedate',0)->plaintext);
                    $job_arr['source'] = "stellenmarkt";
                    $job_arr['link'] = trim('https://stellenmarkt.de' . $li->find('.lhi a', 0)->href);
                    $job_arr['title'] =  trim($li->find('.lhi a[title]', 0)->plaintext);
                    $job_arr['city'] = trim($li->find('.white a',1)->plaintext);
                    $ads[] = $job_arr;
                }
                
            }
        }
//pagination, speichert den link für die nächste Seite
        $suf = $html->find('.pagination ul',0)->last_child()->find('a',0)->href;
    }
//looped durch die Seiten bis er auf der letzten ist
    while(!empty(strpos($html->find('.pagination ul',0), 'weiter')));
}

foreach($ads as $k => $v){
    $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_USERAGENT      => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
        CURLOPT_AUTOREFERER    => true,
        CURLOPT_CONNECTTIMEOUT => 120,
        CURLOPT_TIMEOUT        => 120,
        );

    $ch = curl_init(str_replace(" ", "%20", $v['link']));
    curl_setopt_array($ch, $options);

    $content  = curl_exec($ch);

    curl_close($ch);

    $html = str_get_html($content);

            //save it, genau
    $ads[$k]['body'] = $html->plaintext;

}
echo "<pre>";
print_r($ads);

