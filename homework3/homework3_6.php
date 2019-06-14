<?php
$arr_content = [
    'array_links' => [
        'Начальная' => '#',
        'Товары' => [
            'Куртки' => '#',
            'Джинсы' => '#',
            'Шапки' => '#',
        ],
        'О нас' => '#',
        'Вопросы' => '#',
    ]
];

function renderTemplate($page, array $content = [])
{
    ob_start();
    if (!empty($content)) {
        extract($content);
    }
    $file_name = "views/{$page}.php";
    if (file_exists($file_name)) {
        include $file_name;
    } else {
        die('Error 404');
    }
    return ob_get_clean();
}

echo renderTemplate('template_hw6', $arr_content);