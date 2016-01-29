<?php
$dataFilePath = __DIR__ . "\data.csv";
$rawAffiliates = file($dataFilePath);

$affiliates = array_map(function($rawAffiliate){
	$rawAffiliateArray = explode(",", $rawAffiliate);
	return [
		'accountId' => $rawAffiliateArray[0],
		'currency' => $rawAffiliateArray[1],
		'accountNumber' => $rawAffiliateArray[2],
		'brand' => $rawAffiliateArray[3],
		'category' => $rawAffiliateArray[4],
		'refSource' => trim($rawAffiliateArray[5])
	];
}, $rawAffiliates);


$templateId = 122;
$affiliateMap = array_reduce($affiliates, function($map, $affiliate) use (&$templateId){
	extract($affiliate);
	$templateId++;
	$map['affiliateTemplate'][$refSource] = $templateId;
	$map['templateCurrency'][$templateId] = $currency;
	
$template = <<<"EOD"
<img src="//bat.bing.com/action/0?ti={$accountId}&Ver=2&gv={{ subs.depositValue }}" height="0" width="0" style="display:none; visibility: hidden;" />
<script>
window.uetq = window.uetq || []; 
window.uetq.push({ 'gv': {{ subs.depositValue }} // deposit{$currency}
});  </script>
<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"{$accountNumber}"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script><noscript><img src="//bat.bing.com/action/0?ti={$accountNumber}&Ver=2" height="0" width="0" style="display:none; visibility: hidden;" /></noscript>
EOD;
	$templateFilePath = __DIR__ . "\\$templateId.html.twig";
	file_put_contents($templateFilePath, $template);
	
	return $map;
	
}, ['affiliateTemplate'=>[], 'templateCurrency'=>[]]);

$mapFilePath = __DIR__ . '\map.json';
file_put_contents($mapFilePath, json_encode($affiliateMap));

