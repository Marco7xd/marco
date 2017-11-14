<?php
include('simple_html_dom.php');

$html = file_get_html('https://www.google.de/search?q=google&oq=go&aqs=chrome.1.69i57j0l2j35i39l2j0.2350j0j7&sourceid=chrome&ie=UTF-8');

echo "$html";