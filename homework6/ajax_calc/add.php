<?php

$argument1 = (int)$_POST['operand1'];
$argument2 = (int)$_POST['operand2'];
$operation = (string)$_POST['operation'];

switch ($operation) {
    case '+':
        $response['result'] = $argument1 + $argument2;
        break;
    case '-':
        $response['result'] = $argument1 - $argument2;
        break;
    case '*':
        $response['result'] = $argument1 * $argument2;
        break;
    case '/':
        if ($argument2 !== (float)0) {
            $response['result'] = $argument1 / $argument2;
        } else {
            $response['result'] = 'делить на ноль запрещено';
        }
        break;
    default:
        $response['result'] = 'Неверные данные';
}

echo json_encode($response);