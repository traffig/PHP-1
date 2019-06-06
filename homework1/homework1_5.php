<?php
$a = 1;
$b = 2;
echo nl2br("Даны переменные a = {$a} и b = {$b} " . PHP_EOL);

$a += $b;
$b = $a - $b;
$a -= $b;
echo nl2br("Теперь переменные a = {$a} и b = {$b} " . PHP_EOL);
