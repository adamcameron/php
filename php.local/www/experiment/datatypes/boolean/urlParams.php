<?php
$b = $_GET['b'];
if ($b) {
	echo "it was true<br>";
} else {
	echo "it was false<br>";
}

echo "Using (bool): " . ((bool) $b) . "<br>";
echo "Using boolval(): " . (boolval($b)) . "<br>";
echo "Using filter_var(): " . (filter_var($b, FILTER_VALIDATE_BOOLEAN)) . "<br>";
