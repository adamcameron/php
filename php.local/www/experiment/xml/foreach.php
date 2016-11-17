<?php
$raw = <<<'EOD'
<aaa>
    <bbb>
        <ccc ddd="eee" />
        <fff>ggg</fff>
        <fff>hhh</fff>
        <fff><iii/></fff>
        <fff>
            <jjj>
                <kkk>lll</kkk>
            </jjj>
        </fff>
    </bbb>
</aaa>
EOD;

$xml = new SimpleXMLElement($raw);

$bbbChildren = $xml->bbb->children();

echo 'Number of bbb child nodes: ' . count($bbbChildren) . PHP_EOL . PHP_EOL;
foreach ($bbbChildren as $key=>$value){
    var_dump($key);
    var_dump($value);
    echo "========" . PHP_EOL . PHP_EOL;
}
echo '==============================' . PHP_EOL . PHP_EOL;
$bbb = $xml->bbb;

echo 'Number of bbb nodes: ' . count($bbb) . PHP_EOL . PHP_EOL;
foreach ($bbb as $key=>$value){
    var_dump($key);
    var_dump($value);
    echo "========" . PHP_EOL . PHP_EOL;
}

