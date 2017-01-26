<?php

foreach ($_GET as $k=>$v){
	printf("Key: [%s]<br>", $k);
	echo "<pre>";
	print_r($v);
	echo "</pre><hr>";
}