<?php
$math_operation = ['sum' => '+', 'difference' => '-', 'multiplication' => '*', 'divide' => '/'];
if (!empty($_GET)) {
    $argument1 = (float)$_GET['argument1'];
    $operation = strip_tags(htmlspecialchars($_GET['math_operation']));
    $argument2 = (float)$_GET['argument2'];
    switch ($operation) {
        case 'sum':
            $result = $argument1 + $argument2;
            break;
        case 'difference':
            $result = $argument1 - $argument2;
            break;
        case 'multiplication':
            $result = $argument1 * $argument2;
            break;
        case 'divide':
            if ($argument2 !== (float)0) {
                $result = $argument1 / $argument2;
            } else {
                $result = 'делить на ноль запрещено';
            }
            break;
        default:
            $result = 'Неверные данные';
    }
} else {
    $argument1 = 0;
    $argument2 = 0;
    $result = 0;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Калькулятор</h1>
<form method="get">
    <div>
        <input type="text" name="argument1" value="<?= $argument1 ?>">
        <select name="math_operation">
            <?php foreach ($math_operation as $key => $val): ?>
                <?php if ($operation === $key): ?>
                    <option value="<?= $key ?>" selected><?= $val ?></option>
                    <?php continue; ?>
                <?php endif; ?>
                <option value="<?= $key ?>"><?= $val ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="argument2" value="<?= $argument2 ?>"> <span> = <?= $result ?></span>
    </div>
    <br>
    <input type="submit">
</form>
</body>
</html>
