<?php

namespace App\Http\Controllers\Frontend\Crawlers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Crawler;
use App\JobAd;

use Carbon\Carbon;

class JobvectorCrawlerController extends Controller
{
    public function crawl()
	{
		$db_crawler = Crawler::where('db_name', 'jobvector')->first();

		$current_page = "http://www.jobvector.de/stellensuche.html?keywords=&locations=&locations_lat=&locations_lng=&locations_string=&sort=_score&_pn=1";
		$has_more = true;
		$ads = [];

		while($has_more){
			$ads = [];
			$html = file_get_html($current_page);
			if(strpos($html->find('#jv_search_pagination_next', 0)->class, "disabled") === FALSE){
				$current_page = $html->find('#jv_search_pagination_next', 0)->href;
				$jobs = $html->find('#jv_joblist', 0);
				//get all ads in each category
				foreach($jobs->find('.list-group-item') as $job){
					$job_arr = [];
					$job_arr['crawler_id'] = $db_crawler->id;
					if(trim($job->find('.media-body .list-inline', 0)->first_child()->plaintext) == "TOP JOB"){
						$job_arr['ad_date'] = Carbon::now()->format("Y-m-d");
						if($job->find('.media-body .list-inline .bulletpoint-orange', 0) != ""){
							$job_arr['city'] = trim($job->find('.media-body .list-inline .bulletpoint-orange', 0)->plaintext);
						} else {
							$job_arr['city'] = "";
						}
					} else {
						$job_arr['ad_date'] = Carbon::parse(trim($job->find('.media-body .list-inline', 0)->first_child()->plaintext))->format("Y-m-d");
						if($job->find('.media-body .list-inline .bulletpoint-orange', 1) != ""){
							$job_arr['city'] = trim($job->find('.media-body .list-inline .bulletpoint-orange', 1)->plaintext);
						} else {
							$job_arr['city'] = "";
						}
					}
					$job_arr['source'] = "jobvector";
					$job_arr['link'] = $job->find('.media-body a', 0)->href;
					$job_arr['title'] = trim($job->find('.media-body a', 0)->children(0)->plaintext);
					$job_arr['company_name'] = trim($job->find('.media-body a', 0)->children(1)->children(1)->plaintext);
					$job_arr['ad_timestamp'] = Carbon::parse($job_arr['ad_date'])->timestamp;
					$job_arr['type'] = "search";
					$job_arr['lang'] = "de";

					$ads[] = $job_arr;
				}
				//get job ad html
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

				    if($html != ""){
					    if($html->find('#cd_iframe', 0) != ""){
					    	$url = "http://www.jobvector.de" . $html->find('#cd_iframe', 0)->src;
						} elseif($html->find('#vacancy_vacancy', 0) != ""){
							$ads[$k]['body'] = $html->find('#vacancy_vacancy', 0)->plaintext;
							$url = "";
						} else {
							$ads[$k]['body'] = $html->plaintext;
							$url = "";
						}

						if($url != ""){
						    $ch = curl_init(str_replace(" ", "%20", $url));
						    curl_setopt_array($ch, $options);

						    $content  = curl_exec($ch);

							curl_close($ch);

						    $html = str_get_html($content);

						    //save it
						    $ads[$k]['body'] = $html->plaintext;
						}

						$ads[$k]['body'] = htmlentities(remove_bs($ads[$k]['body']));

					    $current = JobAd::where('link', $ads[$k]['link'])->first();
					    if($current == null){
					    	$new_job = JobAd::create($ads[$k]);
					    	$new_job->document()->save();
					    } else {
					    	$current->update([
					    		'title' => $ads[$k]['title'],
					    		'city' => $ads[$k]['city'],
					    		'body' => $ads[$k]['body']
					    	]);
					    }
					}
				}
			} else {
				$has_more = false;
			}
		}
	}
}
