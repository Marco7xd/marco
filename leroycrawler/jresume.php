<?php

include('simple_html_dom.php');

//http://www.jobing.com/jresumes

$html = file_get_html('http://www.jobing.com/jresumes');

foreach($html->find('.GlobSubTextLg',0)->find('a') as $abc ){
	echo $abc->href;
}