<?php
/* 5. ВАЖНОЕ! Написать функцию renderTemplate возвращающую шаблон в виде текста, вынесите весь повторяющийся код из
шаблона страниц (doctype, menu, header, footer) в отдельный шаблон (layout), сделайте отдельный шаблон страницы с
приветствием. Обеспечьте формирование результирующей страницы используя только функцию renderTemplate, т.е. в layout
должен вставиться подшаблончик страницы с приветствием. */

function renderTemplate($page, $content = '')
{
    ob_start();
    include "{$page}.php";
    return ob_get_clean();
}

$content = renderTemplate('content');
echo renderTemplate('layout', $content);