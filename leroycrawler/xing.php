<?php

include('simple_html_dom.php');

$abc = array('misc','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

$pg = 1;

foreach ($abc as $a) {

    do{ 
        $html = file_get_html('https://www.xing.com/people/pages/'.$a.'/1/'.$pg.'/');
        //Looped durch die anzeigen
        foreach ($html->find('.Card-content') as $li) {
            if(!preg_match('/Alle anzeigen/', $li)){
                $job_arr['name'] =  $li->find('span[itemprop=name]',0)->plaintext;
                $job_arr['title'] = $li->find('span[itemprop=jobTitle]',0)->plaintext;
                $job_arr['link'] =  'https:'.$li->find('a',0)->href;
                $job_arr['city'] =  $li->find('span[itemprop=addressLocality]',0)->plaintext;

                $ads[] = $job_arr;
            //request wenn mehrere profile über den gleichen namen verfügen um die einzeönen stellen zu kriegen
            }else{
                $tmp = file_get_html('https://www.xing.com'.$li->find('a',0)->href);
                foreach ($tmp->find('.Card-content') as $li) {
                    $job_arr['name'] =  $li->find('span[itemprop=name]',0)->plaintext;
                    $job_arr['title'] = $li->find('span[itemprop=jobTitle]',0)->plaintext;
                    $job_arr['link'] =  'https:'.$li->find('a',0)->href;
                    $job_arr['city'] =  $li->find('span[itemprop=addressLocality]',0)->plaintext;

                    $ads[] = $job_arr;
                }
            }
        }

        $pg++;
    }while (preg_match('/rel="next"/', $html));
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

    $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    $ads[$k]['link'] = $url;

    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $body = substr($content, $header_size);

    curl_close($ch);

    $html = str_get_html($body);

    $ads[$k]['body'] = trim($html->plaintext);
}

echo "<pre>";
print_r($ads);
