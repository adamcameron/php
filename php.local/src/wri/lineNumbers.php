<?php
$baseDir = $argv[1];

$lineCounts = ['php'=>0, 'js'=>0, 'total'=>0];

$directory = new RecursiveDirectoryIterator($baseDir);
$iterator = new RecursiveIteratorIterator($directory);
$codeFiles = new RegexIterator($iterator, '/^.+\.(?:php|js)$/i', RecursiveRegexIterator::GET_MATCH);

foreach ($codeFiles as $codeFilePathAsArray) {
    $codeFilePath = $codeFilePathAsArray[0];

    if (strpos($codeFilePath, '\\vendor\\') !== false) {
        continue;
    }
    if (strpos($codeFilePath, '\\test\\') !== false) {
        continue;
    }
    $code = file($codeFilePath);
    $bareCode = array_filter($code, function($line){
        return strlen(trim($line)) > 0;
    });

    $lines = count($bareCode);
    $extension = pathinfo($codeFilePath, PATHINFO_EXTENSION);

    $lineCounts[$extension] += $lines;
    $lineCounts['total'] += $lines;
}


echo "Lines of code in $baseDir:" . PHP_EOL;
printf("PHP: %d%s", $lineCounts['php'], PHP_EOL);
printf("JS: %d%s", $lineCounts['js'], PHP_EOL);
printf("Total: %d%s", $lineCounts['total'], PHP_EOL);

$percentageThatIsJavaScript = ($lineCounts['js'] / $lineCounts['total']) * 100;
printf("Percentage of code that is JavaScript: %d%%%s", $percentageThatIsJavaScript, PHP_EOL);
