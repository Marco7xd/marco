<?php
include('simple_html_dom.php');

$itemliste = [];

$html = file_get_html('https://jardeals.com/');

$Linkarray = [];

foreach ($html->find('.dropdown-toggle'))
	
 
 