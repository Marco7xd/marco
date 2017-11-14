<?php

namespace App\Http\Controllers\Frontend\Crawlers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\City;
use App\Crawler;
use App\JobAd;

use Carbon\Carbon;

class JobsterneCrawlerController extends Controller
{
    public function crawl()
	{
		$db_crawler = Crawler::where('db_name', 'jobsterne')->first();

		//feed
		$xml = download_xml("http://stellenanzeige.jobsterne.de/exportfree/07ed501ddbde77663cfa744e384b6849491eb566/joblink.xml");
    	$jobs = simplexml_load_string($xml, null, LIBXML_NOCDATA | LIBXML_PARSEHUGE);

    	$all_links = [];

    	foreach($jobs->jobs->job as $job){

    		$job_arr = [];

    		$ad_date = Carbon::parse($job->datum)->format("Y-m-d H:i:s");

    		$job_arr = ['crawler_id' => $db_crawler->id,
				'company_name' => $job->firma->__toString(),
				'source' => 'jobsterne',
				'title' => $job->titel->__toString(),
				'link' => strtok($job->url->__toString(), '?'),
				'body' => $job->jobbeschreibung->__toString(),
				'ad_date' => $ad_date,
				'source' => "jobsterne",
				'ad_timestamp' => Carbon::parse($ad_date)->timestamp,
				'type' => 'search',
				'lang' => 'de',
				'zip' => $job->plz->__toString(),
				'city' => $job->ort->__toString()
			];

			$all_links[] = strtok($job->url->__toString(), '?');


			$current = JobAd::where('link', $job_arr['link'])->first();
	    	if($current == null){
	    		$new_job = JobAd::create($job_arr);
	    	} else {
	    		$current->update([
	    			'city' => $job_arr['city'],
	    			'title' => $job_arr['title'],
	    			'body' => $job_arr['body']
	    		]);
	    	}
    	}


		//normal crawler

		$cities = [];

		$html = file_get_html("http://www.jobsterne.de/jobs-orte");
		foreach($html->find('.BrowseTable a') as $link){
			$cities[] = $link->href;
		}

		foreach($cities as $city){
			$ads = [];
			$html = file_get_html('http://www.jobsterne.de/' . $city);
			$main_content = $html->find('.InnerCenter', 0);
			if($main_content != ""){
				foreach($main_content->find('.LeftJobOfferStandardCol') as $job_div){
					if($job_div->next_sibling() != ""){
						$job_arr = [];
						$job_arr['city'] = trim($job_div->next_sibling()->first_child()->plaintext);
						$job_arr['ad_date'] = Carbon::parse(trim($job_div->next_sibling()->last_child()->plaintext))->format("Y-m-d");
						$job_arr['source'] = "jobsterne";
						$job_arr['link'] = $job_div->find('.JobTitle', 0)->href;
						$job_arr['title'] = trim($job_div->children(0)->plaintext);
						$job_arr['company_name'] = trim($job_div->children(1)->children(0)->plaintext);
						$job_arr['crawler_id'] = $db_crawler->id;
						$job_arr['ad_timestamp'] = Carbon::parse($job_arr['ad_date'])->timestamp;
						$job_arr['type'] = "search";
						$job_arr['lang'] = "de";
						$ads[] = $job_arr;
						$all_links[] = $job_div->find('.JobTitle', 0)->href;
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
				    $job_link =  $html->find('#OfferFrame', 0);

				    if($job_link != ""){

					    $ch = curl_init(str_replace(" ", "%20", "http://www.jobsterne.de/" . $job_link->src));
					    curl_setopt_array($ch, $options);

					    $content  = curl_exec($ch);

						curl_close($ch);

					    $html = str_get_html($content);
					    $ads[$k]['body'] = trim($html->plaintext);
					} else {
						$ads[$k]['body'] = trim($content);
					}

					$ads[$k]['body'] = str_replace("Weiterleitungwindow.location.replace('", "", remove_bs($ads[$k]['body']));

				    $current = JobAd::where('link', $ads[$k]['link'])->first();
				    if($current == null){
				    	$new_job = JobAd::create($ads[$k]);
				    } else {
				    	$current->update([
				    		'title' => $ads[$k]['title'],
				    		'city' => $ads[$k]['city'],
				    		'body' => $ads[$k]['body']
				    	]);
				    }
				}
			}
		}

		//JobAd::where('source', 'jobsterne')->where('type', 'search')->whereNotIn('link', $all_links)->delete();
	}
}
