<?php

namespace App\Http\Controllers\Frontend\Crawlers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Crawler;
use App\JobAd;

use Carbon\Carbon;

class GNetzwerkArbeitCrawlerController extends Controller
{
    public function crawl()
    {
    	$db_crawler = Crawler::where('db_name', 'netzwerkarbeit')->first();

		$ads = [];

			$options = array(
		        CURLOPT_RETURNTRANSFER => true,
		        CURLOPT_HEADER         => false,
		        CURLOPT_FOLLOWLOCATION => true,
		        CURLOPT_USERAGENT      => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
		        CURLOPT_AUTOREFERER    => true,
		        CURLOPT_CONNECTTIMEOUT => 120,
		        CURLOPT_TIMEOUT        => 120,
		    );

		    $ch = curl_init(str_replace(" ", "%20", 'https://cloud-70.datenbanken24.de/apps/jobs/public.nsf/View2StdF3?openview&Count=1000&ResortDescending=4&view=View2Std&FN=F3'));
		    curl_setopt_array($ch, $options);

		    $content  = curl_exec($ch);

			curl_close($ch);

		    $html = str_get_html($content);

		    $ads = [];
		    $job_arr = [];
		    
		    preg_match_all('/DocLine.DocNumber =(.*?);/', $html, $doc);
		    preg_match_all('/DocLine.ID =(.*?);/', $html, $ID);
		    preg_match_all('/DocLine.V1 =(.*?);/', $html, $v1);
		    preg_match_all('/DocLine.V2 =(.*?);/', $html, $v2);
		    preg_match_all('/DocLine.V3 =(.*?);/', $html, $v3);
		    preg_match_all('/DocLine.V4 =(.*?);/', $html, $v4);
		    
		    for ($u=0; $u <= 443; $u++) { 

		    	$tmpdn = str_replace('"', "",$doc[1][$u]); 
		    	$dn = $tmpdn;  
		    	$tmpid = str_replace('"', "",$ID[1][$u]); 
		    	$d = $tmpid; 
		    	$tmpdate = str_replace('"', "",$v1[1][$u]);
		    	$job_arr['ad_date'] = Carbon::parse(trim($tmpdate))->format("Y-m-d");
		    	$tmptitle = str_replace('"', "",$v2[1][$u]);
		    	$job_arr['title'] = $tmptitle;
		    	$tmpzip = str_replace('"', "",$v3[1][$u]);
		    	$job_arr['zip'] = $tmpzip;
		    	$tmpcity = str_replace('"', "",$v4[1][$u]);
		    	$job_arr['city'] = $tmpcity;
		    	$job_arr['link'] = str_replace(' ', "",'https://cloud-70.datenbanken24.de/apps/jobs/public.nsf/IDs/'.$d.'?opendocument&UI=Intern&ID='.$d.'&FromView=View2StdF3&ViewEntry='.$dn.'&currentResort=ResortDescending=4');
		    	$job_arr['company_name'] = "";
		    	$job_arr['crawler_id'] = $db_crawler->id;
		    	$job_arr['ad_timestamp'] = Carbon::parse($job_arr['ad_date'])->timestamp;
		    	$job_arr['type'] = "request";
		    	$job_arr['lang'] = "de";
		    	$job_arr['source'] = "netzwerkarbeit";

		    	$ads[] = $job_arr;
		    }	

		    
		//get job ad html
		foreach($ads as $k => $v){

			$html = file_get_html(str_replace(" ", "%20", $v['link']));


			$ads[$k]['body'] = trim(remove_bs($html->plaintext));

			$current = JobAd::where('link', $ads[$k]['link'])->first();
			if($current == null){
			    $new_job = JobAd::create($ads[$k]);
			    $new_job->document()->save();
			}
		}
		//
	}
}
