<?php
include "../config/config.php";
$url = '';
$page = '';
$url = explode('/', $_SERVER['REQUEST_URI']);
if ($url[1] == '') {
    $page = 'index';
} else {
    $page = $url[1];
}
$params = getParams($page);
echo render($page, $params);
echo var_dump($page);
