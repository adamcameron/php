<?php
// variations.php

function returnsFalse() {
    return false;
}

function returnsNull($message='') {
    if (strlen($message)) echo $message;
    return null;
}

function defaulter(){
    echo 'DEFAULTER CALLED<br>';
    return 'default';
}

echo('<h4>defaulting null</h4>');
$result = null ?? defaulter('null');
echo "Result: [$result]<hr>";;

echo('<h4>defaulting false</h4>');
$result = false ?? defaulter('false');
echo "Result: [$result]<hr>";

echo('<h4>defaulting empty string</h4>');
$result = '' ?? defaulter('');
echo "Result: [$result]<hr>";

echo '<h4>defaulting returnsFalse()</h4>';
$result = returnsFalse() ?? defaulter('returnsFalse()');
echo "Result: [$result]<hr>";

echo('<h4>defaulting returnsNull()</h4>');
$result = returnsNull() ?? defaulter('returnsNull()');
echo "Result: [$result]<hr>";

echo('<h4>example of chaining</h4>');
$result = returnsNull('first call to returnsNull()<br>') ?? returnsNull('second call to returnsNull()<br>') ?? returnsNull('third call to returnsNull()<br>') ?? defaulter('chained');
echo "Result: [$result]<hr>";

