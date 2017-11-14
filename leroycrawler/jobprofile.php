<?php

//jobprofile
//https://www.jobprofile.de/personalpool/0/0/standard

include('simple_html_dom.php');

$html = file_get_html('https://www.jobprofile.de/personalpool/0/0/standard');

$pos = strpos($html, 'td-table');
echo $pos;
exit();
$main = $html->find('table', 0);

echo $main;

exit();

$category_links = [];