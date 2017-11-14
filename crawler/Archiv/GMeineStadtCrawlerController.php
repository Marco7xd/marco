<?php

namespace App\Http\Controllers\Frontend\Crawlers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Crawler;
use App\JobAd;

use Carbon\Carbon;
use \ForceUTF8\Encoding;

class GMeineStadtCrawlerController extends Controller
{
    public function crawl()
    {
    	$db_crawler = Crawler::where('db_name', 'meinestadt')->first();

    	$categories = [];

    	$html = file_get_html("http://www.meinestadt.de/deutschland/stellengesuche");

    	foreach($html->find('.ms-categories-list-parent .ms-categories-list-item') as $category){
    		$categories[] = $category->find('a', 0)->href;
    	}

    	foreach($categories as $cat){
	    	$html = file_get_html($cat);
	    	$current_page = 1;
	    	if($html->find('.ms-pagination-logarithmic', 0) != ""){
	    		$last_page = $html->find('.ms-pagination-logarithmic', 0)->last_child()->plaintext;
	    	} else {
	    		$last_page = 1;
	    	}

	    	while($current_page <= $last_page){
	    		$ads = [];
	    		$html = file_get_html($cat."?page=".$current_page);
	    		foreach($html->find('.ms-maincontent .ms-result-item ') as $job){
	    			$job_arr = [];
	    			$job_arr['crawler_id'] = $db_crawler->id;
	    			$job_arr['source'] = "meinestadt";
	    			$job_arr['ad_date'] = Carbon::createFromFormat('d.m.Y', trim($job->find('.ms-result-info-row', 0)->find('.ms-result-info-box-value', 0)->plaintext))->format("Y-m-d");
	    			$job_arr['city'] = remove_bs(trim($job->find('.ms-icon-address_active', 0)->parent()->plaintext));
	    			//filter city and zip if possible
	    			$job_arr['zip'] = "";
	    			$pattern = '=[\d]{5}=is';
	    			preg_match($pattern, $job_arr['city'], $matches);
	    			if(isset($matches[0])){
	    				$job_arr['zip'] = trim($matches[0]);
	    				$job_arr['city'] = trim(str_replace($matches[0], "", $job_arr['city']));
	    				if($job_arr['city'] == "bundesweit") $job_arr['city'] = "deutschland";
	    			}

	    			$city_found = false;
                    $old_city = $job_arr['city'];

	    			if($job_arr['zip'] != ""){
	    				$job_arr['city'] = findCity($job_arr['zip'], true);
	    				if($job_arr['city'] != false){
	    					$city_found = true;
	    				}
	    			}

	    			if($city_found == false) {
                		$job_arr['city'] = $old_city;

                		$job_arr['city'] = findCity($job_arr['city']);
                		if($job_arr['city'] == false){
                			$job_arr['city'] = $old_city;
                		}
                	}

                	$job_arr['city'] = Encoding::toUTF8($job_arr['city']);

					$job_arr['link'] = trim($job->find('.ms-result-item-headline', 0)->find('a', 0)->href);
					$job_arr['title'] = Encoding::toUTF8(remove_bs(trim($job->find('.ms-result-item-headline', 0)->find('a', 0)->plaintext)));
					$job_arr['type'] = "request";
					$job_arr['lang'] = "de";
					$job_arr['company_name'] = "";
					$job_arr['ad_timestamp'] = Carbon::parse($job_arr['ad_date'])->timestamp;

					$current = JobAd::where('link', $job_arr['link'])->first();
					if($current == null){
						$ads[] = $job_arr;
					} else {
						$current->update([
							'title' => $job_arr['title'],
							'city' => $job_arr['city'],
							'zip' => $job_arr['zip']
						]);
					}
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

				    if(!is_bool($html)){

					    if($html->find('.content', 0) != ""||$html->find('.main2', 0) != ""){
					    	if($html->find('.content', 0) == ""){
					    		$ads[$k]['body'] = trim($html->find('.main2', 0)->plaintext);
					    	} else {
					    		$ads[$k]['body'] = trim($html->find('.content', 0)->plaintext);
					    	}

					    	$ads[$k]['body'] = Encoding::toUTF8(remove_bs($ads[$k]['body']));

						    $current = JobAd::where('link', $ads[$k]['link'])->first();
						    if($current == null){
						    	$new_job = JobAd::create($ads[$k]);
						    	$new_job->document()->save();
						    }
						}
					}
		    	}

	    		$current_page++;
	    	}
    	}
    }
}
