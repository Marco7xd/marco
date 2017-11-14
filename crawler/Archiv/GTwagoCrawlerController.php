<?php

namespace App\Http\Controllers\Frontend\Crawlers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Crawler;
use App\JobAd;

use Carbon\Carbon;

class GTwagoCrawlerController extends Controller
{
    public function crawl()
	{
		$db_crawler = Crawler::where('db_name', 'twago')->first();

		$html = file_get_html('https://www.twago.de/search/freelancer?cat=freelancer&pageNumber=1');
		$current_page = 1;
		$last_page = ceil(trim(str_replace("Freelancern", "", str_replace("1 - 10 von ", "", $html->find('.search-results-pager .summary', 0)->plaintext)))/10);

		while($current_page <= $last_page){
			$ads = [];
			$html = file_get_html("https://www.twago.de/search/freelancer?cat=freelancer&pageNumber=".$current_page);

			foreach($html->find('.js-search-result-box') as $job_div){
				$job_arr = [];
				if($job_div->find('#linkToCity', 0) != ""){
					$job_arr['city'] = substr(trim($job_div->find('#linkToCity', 0)->plaintext), 0, -1);
				} else {
					$job_arr['city'] = "";
				}

				$old_city = $job_arr['city'];
				$job_arr['city'] = findCity($job_arr['city']);
				if($job_arr['city'] == false){
					$job_arr['city'] = $old_city;
				}

				$job_arr['ad_date'] = Carbon::now()->format("Y-m-d");
				$job_arr['source'] = "twago";
				$job_arr['link'] = $job_div->find('a', 0)->href;
				$job_arr['title'] = trim($job_div->find('a', 0)->plaintext);
				$job_arr['company_name'] = "";
				$job_arr['crawler_id'] = $db_crawler->id;
				$job_arr['ad_timestamp'] = Carbon::parse($job_arr['ad_date'])->timestamp;
				$job_arr['type'] = "request";
				$job_arr['lang'] = "de";

				$current = JobAd::where('link', $job_arr['link'])->first();
				if($current == null){
					$ads[] = $job_arr;
				} else {
					$current->update([
						'title' => $job_arr['title'],
						'city' => $job_arr['city']
					]);
				}
			}

			//get job ad html
			foreach($ads as $k => $v){

				$html = file_get_html(str_replace(" ", "%20", $v['link']));

				if($html->find('#profileFrame', 0) != ""){
					$ads[$k]['body'] = trim(remove_bs($html->find('#profileFrame', 0)->plaintext));
				} else {
					$ads[$k]['body'] = trim($html->plaintext);
				}

				$ads[$k]['body'] = trim(preg_replace('=Freelancer finden.*Alle Orte=isU', '', $ads[$k]['body']));

				$current = JobAd::where('link', $ads[$k]['link'])->first();
				if($current == null){
				    $new_job = JobAd::create($ads[$k]);
				    $new_job->document()->save();
				}
			}

			$current_page++;
		}
	}
}
