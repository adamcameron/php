<?php
$wordCounter = function($content){
    return str_word_count($content);
};

ob_start($wordCounter);

echo '
Ko te moemoea a Maui kia haere ngatahi ai ratou ko ona tuakana ki te hii ika.
I te hokinga mai o ona tuakana ki tatahi, ka kii atu a Maui,
"ka taea e au te haramai i to koutou na taha ki te hii ika?"
Engari, ko te whakautu o ona tuakana ki a ia ano, "Kao, he rangatahi noa iho koe.
Kaore he wahi mau kei te waka nei, na reira me noho tau ki tatahi ke"
';
$wordCount = flush();

echo $wordCount;