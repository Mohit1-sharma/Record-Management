<?php

//Arrays

$programminglanguages = ['PHP','java','Python'];


echo '<pre>';
print_r($programminglanguages);
echo '</pre>';

echo count($programminglanguages) ;
echo('<br>');

array_push($programminglanguages,'c++','c','go');



echo '<pre>';
print_r($programminglanguages);
echo '</pre>';
echo('<br>');
echo count($programminglanguages) ;
echo('<br>');


//arr using keys

$programminglanguages = [
    'php' => '8.0',
    'python' => '3.9'
];
$programminglanguages['go'] = '1.15';

echo '<pre>';
print_r($programminglanguages);
echo '</pre>';

echo $programminglanguages['php'];