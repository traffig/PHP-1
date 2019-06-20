<?php

function getParams($page)
{
    $params = [];
    switch ($page) {
        case 'index':
            include "../engine/SimpleImage.php";
            include "../engine/upload_img.php";
            include "../engine/delete_img.php";
            $params = ['img_names' => getDataDb_toArray(),
                'error_msg' => getErrorMsg($_GET['msg'])
            ];
            remove_img();
            break;
        case 'image':
            $id = (int)$_GET['id'];
            setRating($id);
            $params['img'] = getDataDb_toAssoc($id);
            break;
    }
    return $params;
}

function render($page, array $params = [])
{
    $content = renderTemlate(LAYOUTS_DIR . 'main', [
        'content' => renderTemlate($page, $params),
    ]);
    return $content;
}

function renderTemlate($page, array $param = [])
{
    ob_start();

    if (!is_null($param)) {
        extract($param);
    }

    $fileName = TEMPLATES_DIR . $page . ".php";

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        die("Страницы {$fileName} не существует.");
    }

    return ob_get_clean();
}
