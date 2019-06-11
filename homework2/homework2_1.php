<?php
/* 1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт,
который работает по следующему принципу:
если $a и $b положительные, вывести их разность;
если $а и $b отрицательные, вывести их произведение;
если $а и $b разных знаков, вывести их сумму;
Ноль можно считать положительным числом. */

$task = 1;
$msg_task = 'Задание №';
echo $msg_task . $task++ . '<br>';

$a = rand(-10, 10);
$b = rand(-10, 10);

if ($a >= 0 && $b >= 0) {
    $difference = $a - $b;
    echo "a = {$a}, b = {$b} (положительные) a - b = {$difference}";
} elseif ($a < 0 && $b < 0) {
    $multiplication = $a * $b;
    echo "a = {$a}, b = {$b} (отрицательные) a * b = {$multiplication}";
} else {
    $sum = $a * $b;
    echo "a = {$a}, b = {$b} (разных знаков) a * b = {$sum}";
}


/* 2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать
вывод чисел от $a до 15. *. сделайте это через цикл if */
echo '<br><br>' . $msg_task . $task++ . '<br>';
$a = rand(0, 15);
$copy_a = $a;

echo "Задано число {$a}" . '<br><br>';

//Решение при помощи switch
echo 'switch: ';
switch ($a) {
    case 0:
        echo $a++ . ', ';
    case 1:
        echo $a++ . ', ';
    case 2:
        echo $a++ . ', ';
    case 3:
        echo $a++ . ', ';
    case 4:
        echo $a++ . ', ';
    case 5:
        echo $a++ . ', ';
    case 6:
        echo $a++ . ', ';
    case 7:
        echo $a++ . ', ';
    case 8:
        echo $a++ . ', ';
    case 9:
        echo $a++ . ', ';
    case 10:
        echo $a++ . ', ';
    case 11:
        echo $a++ . ', ';
    case 12:
        echo $a++ . ', ';
    case 13:
        echo $a++ . ', ';
    case 14:
        echo $a++ . ', ';
    case 15:
        echo $a;
        break;
    default:
        echo 'Что-то пошло не так!';
}

//Решение при помощи if
echo '<br><br>' . 'if: ';
$i = 15;

condition:
if ($i > $copy_a) {
    echo $copy_a . ', ';
    $copy_a++;
    goto condition;
} elseif ($i === $copy_a) {
    echo $copy_a;
} else {
    echo "Что-то пошло не так!";
}


/* 3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать
оператор return. В делении на 0 сделайте проверку и вывод сообщения об ошибке. */
echo '<br><br>' . $msg_task . $task++ . '<br>';

/**
 * @param $a integer первое число.
 * @param $b integer второе число.
 * @return integer взвращает результат суммы чисел.
 */
function sum($a, $b)
{
    return $a + $b;
}

/**
 * @param $a integer первое число.
 * @param $b integer второе число.
 * @return integer взвращает результат разности чисел.
 */
function difference($a, $b)
{
    return $a - $b;
}

/**
 * @param $a integer первое число.
 * @param $b integer второе число.
 * @return integer взвращает результат умножения чисел.
 */
function multiplication($a, $b)
{
    return $a * $b;
}

/**
 * @param $a integer первое число.
 * @param $b integer второе число.
 * @return integer взвращает результат деления чисел.
 */
function divide($a, $b)
{
    if ($b === 0) {
        return 'Делить на 0 нельзя!';
    }
    return $a / $b;
}

$a = rand(-10, 10);
$b = rand(-10, 10);

echo "{$a} + {$b} = " . sum($a, $b) . '<br>';
echo "{$a} - {$b} = " . difference($a, $b) . '<br>';
echo "{$a} * {$b} = " . multiplication($a, $b) . '<br>';
echo "{$a} / {$b} = " . divide($a, $b) . '<br>';


/* 4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 –
значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции
выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение
(использовать switch). */
echo '<br><br>' . $msg_task . $task++ . '<br>';

/**
 * @param $arg1 integer первое число.
 * @param $arg2 integer второе число.
 * @param $operation string математическая операция над числами.
 * @return integer возврат числа полученного в результате выполнения запрошенной математической операции.
 */
function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case '+':
        case 'сумма':
            return sum($arg1, $arg2);
        case '-':
        case 'разность':
            return difference($arg1, $arg2);
        case '*':
        case 'произведение':
            return multiplication($arg1, $arg2);
        case '/':
        case 'деление':
            return divide($arg1, $arg2);
    }
    return "Такой операции нет в программе {$operation}";
}

echo "{$a} + {$b} = " . mathOperation($a, $b, '+') . '<br>';
echo "{$a} - {$b} = " . mathOperation($a, $b, '-') . '<br>';
echo "{$a} * {$b} = " . mathOperation($a, $b, '*') . '<br>';
echo "{$a} / {$b} = " . mathOperation($a, $b, '/') . '<br>';


/* 5. ВАЖНОЕ! Написать функцию renderTemplate возвращающую шаблон в виде текста, вынесите весь повторяющийся код из
шаблона страниц (doctype, menu, header, footer) в отдельный шаблон (layout), сделайте отдельный шаблон страницы с
приветствием. Обеспечьте формирование результирующей страницы используя только функцию renderTemplate, т.е. в layout
должен вставиться подшаблончик страницы с приветствием. */
echo '<br><br>' . $msg_task . $task++ . ' находится по адресу <a href="homework2_5.php">=> Ссылка на ДЗ <=</a><br>';


/* 6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где
$val – заданное число, $pow – степень. Отрицательные можно не делать. При желании сделайте фукнцию анонимной
и организуйте рекурсию через замыкание. */
echo '<br><br>' . $msg_task . $task++ . '<br>';

$val = rand(1, 10);
$pow = rand(1, 4);

/**
 * @param $val integer число больше 0 для возведения в степень.
 * @param $pow integer степень больше 0 в которую происходит возведение числа.
 * @return integer число полученное после возведения числа $val в степень $pow.
 */
function power($val, $pow)
{
    if ($pow > 0) {
        $result = $val * power($val, $pow - 1);
    } elseif ($pow === 0) {
        return 1;
    } else {
        return 'Что-то пошло не так';
    }
    return $result;
}

echo "{$val} в степени  {$pow} = " . power($val, $pow);

/* 7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты */
echo '<br><br>' . $msg_task . $task++ . '<br>';

/**
 * @param $hours integer час который склоняем.
 * @param $minutes integer минута которую склоняем.
 * @return string возврат времени склоненного в зависимости от переданного значения часов и минут.
 */
function get_time($hours, $minutes)
{
    if ($hours === 1 || $hours === 21) {
        $hours = "{$hours} час ";
    } elseif ($hours === 2 || $hours === 3 || $hours == 4 || $hours === 22 || $hours === 23 || $hours == 24) {
        $hours = "{$hours} часа ";
    } else {
        $hours = "{$hours} часов ";
    }

    if ($minutes % 10 === 1 && $minutes !== 11) {
        $minutes = "{$minutes} минута";
    } elseif ($minutes % 10 === 2 && $minutes !== 12 || $minutes % 10 === 3 && $minutes !== 13 || $minutes % 10 === 4
        && $minutes !== 14) {
        $minutes = "{$minutes} минуты";
    } else {
        $minutes = "{$minutes} минут";
    }

    return $hours . $minutes;
}

$hours = (int)date('H'); //получаем час
$minutes = (int)date('i'); // получаем минуты

echo 'Время: ' . get_time($hours, $minutes);