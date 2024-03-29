<?php

//Точка входа в приложение, сюда мы попадаем каждый раз когда загружаем страницу
//Первым делом подключим файл с константами настроек

include "../config/config.php";

//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
$params = [];
switch ($page) {
    case 'index':
        $params = ['img_names' => array_slice(scandir('./gallery_img/big/'), 2)];
}

//Вызываем рендер, и передаем в него имя шаблона и массив подстановок
echo render($page, $params);






