<?php 

include_once('simple_html_dom.php'); 

$produkte = file_get_html('https://csgo.igvault.com/'); 
$produkte = array();

echo $produkte
