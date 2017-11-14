<?php

namespace App\Http\Controllers\Frontend\Crawlers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Crawler;
use App\JobAd;

use Carbon\Carbon;
use \DateTimeZone;

class JobwareCrawlerController extends Controller
{
    public function crawl()
    {
    	$xml = download_xml("http://jobs.jobware.net/jobsearch/exports/joblink_campus_feed");
        $jobs = simplexml_load_string($xml, null, LIBXML_NOCDATA | LIBXML_PARSEHUGE);
        $links = [];

        foreach($jobs as $job){
            $links[] = $job->link->__toString();
            $job_ad = $this->find_or_create_job_ad($job);
        }

        $xml = download_xml("http://jobs.jobware.net/jobsearch/exports/joblink_basic_feed");
        $jobs = simplexml_load_string($xml, null, LIBXML_NOCDATA | LIBXML_PARSEHUGE);

        foreach($jobs as $job){
            $links[] = $job->link->__toString();
            $job_ad = $this->find_or_create_job_ad($job, true);
        }


        $job_ads = JobAd::whereNotIn('link', $links)->where('source', 'jobware')->get();
        foreach($job_ads as $ad){
        	$ad->delete();
        }
    }

    /**
     * Creates or updates a job ad
     *
     * @param  object $job
     * @return void
     */
    private function find_or_create_job_ad($job)
    {
        $job_ad = JobAd::where('link', $job->link)->where('source', 'jobware')->first();

        if($job->datum->__toString() != ""){
            $ad_date = Carbon::parse($job->datum->__toString())->format("Y-m-d H:i:s");
        } else {
            $ad_date = Carbon::now(new DateTimeZone('Europe/Berlin'))->format("Y-m-d H:i:s");
        }

        if($job_ad == null){


            $job_description = $job->text->__toString();

            $db_crawler = Crawler::where('db_name', 'jobware')->first();

            $job_ad = JobAd::create([
            	'crawler_id' => $db_crawler->id,
                'title' => $job->titel->__toString(),
                'link' => $job->link->__toString(),
                'body' => $job_description,
                'ad_date' => $ad_date,
                'ad_timestamp' => Carbon::parse($ad_date)->timestamp,
				'type' => 'search',
				'lang' => 'de',
                'source' => "jobware",
                'company_name' => $job->firma->__toString(),
                'city' => $job->ort->__toString()
            ]);
        }
    }
}
