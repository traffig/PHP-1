<?php
/*
 * 5. *Используя только две переменные, поменяйте их значение местами. Например, если a = 1, b = 2, надо,
 * чтобы получилось b = 1, a = 2. Дополнительные переменные использовать нельзя.
*/

$a = 1;
$b = 2;
echo nl2br("Даны переменные a = {$a} и b = {$b} " . PHP_EOL);

$a += $b;
$b = $a - $b;
$a -= $b;
echo nl2br("Теперь переменные a = {$a} и b = {$b} " . PHP_EOL);