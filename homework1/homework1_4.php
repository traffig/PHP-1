<?php
$title_text = 'Урок 1 задание 4.';
$h1_text = 'Решение задания №4 по уроку 1.';
$today = getdate();
$year = $today['year'];
$wrapper_content = "<h1>$h1_text</h1>" . "<p>Текущий год: $year</p>";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title_text ?></title>
</head>
<body>
<?= $wrapper_content ?>
</body>
</html>