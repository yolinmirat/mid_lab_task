<?php
$numbers = [10, 45, 67, 89, 45, 100, 99];

$uniqueNumbers = array_unique($numbers);

rsort($uniqueNumbers);

if (count($uniqueNumbers) >= 2) 
    {
        echo "Second Maximum = " . $uniqueNumbers[1];
    } 
else 
    {
        echo "Array does not have a second maximum.";
    }
?>
