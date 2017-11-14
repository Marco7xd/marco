<?php

include('simple_html_dom.php');

/*

"bcookie="v=2&dd47dcea-2bed-4a44-8936-269fcac63e99"; bscookie="v=1&2016120818412137b7a468-c09f-48a4-8ee7-ba04e0935655AQH09fGlc_gua3ok90mYsdKikUEQWpIr"; visit="v=1&M"; _ga=GA1.2.1956921487.1481222504; lang="v=2&lang=de-de&fid=9012fa9da37649c98f7d9fe5ff2b0066"; lidc="b=TGST01:g=261:u=1:i=1481818851:t=1481905251:s=AQGq7SGT0q_HHcTNEgI7kmaxjaRiUSlw"; _gat=1; RT=s=1481818892895&r=https%3A%2F%2Fwww.linkedin.com%2Fdirectory%2Fpeople-a-1-1-1%2F; join_wall=v=2&AQFAeKAXLR_UWgAAAVkDSei_f2ssRuBn47-E2DBTXISMYA8tskWoyyujp8GhaAFLDrsUC9j84oY6T94Jz8tfymKZL1idRUd0sNMjcDEWeCYPBAus2WwEJ9QNlVnN7YRd97IirQgdcEpFrsPr71b2tzHYFEpa5Tz_dDsMkJ0; JSESSIONID="ajax:3418690716497581194"; oz_props_fetch_size1_undefined=undefined; wutan=eNnZNU886KmcCozivlAV8hucWxyGPNf7DOD/zf+ceps=; share_setting=PUBLIC; sdsc=1%3A1SZM1shxDNbLt36wZwCgPgvN58iw%3D; leo_auth_token="GST:ZWAG0bO_PH39YMBQgEzXHC1xRv33BM-0-vRG6Z1EtHUsynB8PNSPNr:1481818917:8cfa4e8e72c7e736d7bc35ca9c5100be95333b95""

*/

$options = array(
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HEADER         => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_USERAGENT      => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36",
	CURLOPT_AUTOREFERER    => true,
	CURLOPT_CONNECTTIMEOUT => 120,
	CURLOPT_TIMEOUT        => 120,
	);
$ch = curl_init(str_replace(" ", "%20", 'https://www.linkedin.com/in/a-karim-jouda-9005aa56'));
curl_setopt_array($ch, $options);
$html  = curl_exec($ch);

curl_close($ch);

echo $html;