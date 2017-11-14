<?php
include('simple_html_dom.php');

$html = file_get_html("https://stonefire.io/search?game=730&q=&currency=EUR");

$linkarray = [];
   
   foreach($html->find('.dropdown.open', 0)->find('.dropdown-toggle') as $dropdown){
      foreach($dropdown->find('.dropdown-menu')->find('.btn-search-query')->find("a") as $link){
          $linkarray[] = 'https:'.$link->href;
         }
      }

print_r($linkarray);


//foreach($html->find('.dropdown'))
		
		

	 