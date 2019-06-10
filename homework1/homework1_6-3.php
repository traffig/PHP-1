<?php
$way = 3;
$title_text = "Урок 1 задание 6 способ {$way}.";
$h1_text = "Решение задания №6 способ {$way} по уроку 1.";
$today = getdate();
$year = $today['year'];

$content = file_get_contents("template/site.tmpl");
$content = str_replace("{{ TITLE }}", $title_text, $content);
$content = str_replace("{{ H1 }}", $h1_text, $content);
$content = str_replace("{{ YEAR }}", $year, $content);

echo $content;