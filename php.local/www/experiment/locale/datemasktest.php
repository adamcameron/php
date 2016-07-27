<html lang="ja">
<head>  
<title>Running Projects</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
</head>
<body>
<div id="header">
<?php
header('content-type: text/html; charset=utf-8');
$currentLocale = setlocale(LC_ALL, "ja-JP");

$d = new DateTime("2016-06-24");
echo strftime("%a (%A) %d %m %y", $d->getTimeStamp());


?>
</div>
</body>
</html>