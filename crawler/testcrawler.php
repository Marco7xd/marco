<?php 

include_once('simple_html_dom.php'); 
$html = file_get_html('https://csgo.igvault.com/'); 
$title= $html->find('div class=pro-box e-imageload' ,0)->innertext;
print_r($title);
?>





