<?php

namespace App\Http\Controllers\Frontend\Crawlers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Crawler;
use App\JobAd;

use Carbon\Carbon;

class GQuokaCrawlerController extends Controller
{
    public function crawl()
	{
		$db_crawler = Crawler::where('db_name', 'quoka')->first();

		$html = file_get_html('http://www.quoka.de/stellenmarkt/stellengesuche/');
		$current_page = 1;
		$last_page = trim(str_replace("Seite 1 von ", "", $html->find('.nothing', 0)->plaintext));

		while($current_page <= $last_page){
			$ads = [];
			$html = file_get_html("http://www.quoka.de/qmca/search/search.html?redirect=0&catid=33_3306&pageNo=".$current_page);

			foreach($html->find('.hlisting') as $job_div){
				if(isset($job_div->find('a', 1)->href)){
					$job_arr = [];
					if($job_div->find('.locality', 0) != ""){
						$job_arr['city'] = trim($job_div->find('.locality', 0)->plaintext);
					} else {
						$job_arr['city'] = "";
					}
					$date = trim($job_div->find('.date', 0)->plaintext);
					$date_pattern = '=vor.*Monaten=isU';

					if($date == "TOP"){
						$job_arr['ad_date'] = Carbon::now()->format("Y-m-d");
					} elseif($date == "Gestern"){
						$job_arr['ad_date'] = Carbon::now()->subDay()->format("Y-m-d");
					} elseif(strpos($date, "Heute") !== FALSE){
						$job_arr['ad_date'] = Carbon::now()->format("Y-m-d");
					} elseif(preg_match($date_pattern, $date, $matches) == 1){
						$final_date_pattern = '=[\d]=isU';
						preg_match($final_date_pattern, $date, $date_matches);
						if(isset($date_matches[0])){
							$job_arr['ad_date'] = Carbon::now()->subMonths(trim($date_matches[0]))->format("Y-m-d");
						}
					} else {
						$job_arr['ad_date'] = Carbon::parse(substr(trim($job_div->find('.date', 0)->plaintext), 0, -2)."2016")->format("Y-m-d");
					}

					$old_city = $job_arr['city'];
					$job_arr['city'] = findCity($job_arr['city']);
					if($job_arr['city'] == false){
						$job_arr['city'] = $old_city;
					}

					$job_arr['source'] = "quoka";
					$job_arr['link'] = "http://www.quoka.de".$job_div->find('a', 1)->href;
					$job_arr['title'] = trim($job_div->find('a', 1)->plaintext);
					$job_arr['company_name'] = trim($job_div->find('a', 1)->plaintext);
					$job_arr['crawler_id'] = $db_crawler->id;
					$job_arr['ad_timestamp'] = Carbon::parse($job_arr['ad_date'])->timestamp;
					$job_arr['type'] = "request";
					$job_arr['lang'] = "de";

					$current = JobAd::where('link', $job_arr['link'])->first();
					if($current == null && strpos($job_arr['link'], "stellengesuche") !== FALSE){
						$ads[] = $job_arr;
					} else {
						if($current != null){
							if(strpos($current->link, "stellengesuche") === FALSE){
								$current->delete();
							}
						} else {
							$current->update([
								"ad_date" => $job_arr['ad_date'],
								'title' => $job_arr['title'],
								'city' => $job_arr['city']
							]);
						}
					}
				}
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
				    if($html->find('#RelatedAdsList', 0) != ""){
				    	$html->find('#RelatedAdsList', 0)->outertext = "";
					}

				    if($html->find('.detail', 0) != ""){
				    	$ads[$k]['body'] = $html->find('.detail', 0)->plaintext;
				    } else {
				    	$ads[$k]['body'] = $html->plaintext;
				    }

					$ads[$k]['body'] = trim(remove_bs($ads[$k]['body']));

					$current = JobAd::where('link', $ads[$k]['link'])->first();
					if($current == null){
					    $new_job = JobAd::create($ads[$k]);
					    $new_job->document()->save();
					}
				}
			}

			$current_page++;
		}
	}
}
