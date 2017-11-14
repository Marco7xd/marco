<?php 

include('simple_html_dom.php');



		$html = file_get_html("http://www.kalaydo.de/jobboerse/stellengesuche/?page=1");

		$pagination = $html->find('.markt_pagination_pageLinkLast',0)->find('a',0)->href;
		$int = preg_replace('/\D+/', '', $pagination);

		echo $int;