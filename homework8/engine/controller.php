<?php


function prepareVariables($page, $action, $id)
{
    $params = [];

    $allow = false;

    if (is_auth()) {
        $allow = true;
        $params['user'] = get_user();
    }
    $params['allow'] = $allow;

    switch ($page) {
        case 'index':
            break;

        case 'login':
            login();
            header("Location: /");
            break;

        case 'logout':
            session_destroy();
            setcookie("hash");

            header("Location: /");
            break;

        case 'news':
            $params['news'] = getNews();
            break;

        case 'newspage':
            $content = getNewsContent($id);
            $params['prev'] = $content['prev'];
            $params['text'] = $content['text'];
            break;

        case 'catalog':

            $params['images'] = getGoods();

            break;

        case "good":


            if ($action != 'edit') {
                $id = (int)$id;
                $params = doFeedbackActionImage($action, $id);
            } else {

                $params = doFeedbackActionImage($action, $id);
                $params['edit_id'] = $id;
                $id = (int)$_GET['backid'];

            }


            add_likes($id);

            $good = getOneGood($id);


            $params['image'] = $good['image'];
            $params['name'] = $good['name'];
            $params['description'] = $good['description'];
            $params['price'] = $good['price'];
            $params['likes'] = $good['likes'];
            $params['id'] = $good['id'];
            // var_dump($params);
            break;

        case 'api':
            if ($action == "deleteFromBasket") {
                $data = json_decode(file_get_contents('php://input'));
                $id = (int)$data->id;

                deleteFromBasket($id);
                $params['count'] = getBasketCount();

                $params['id'] = $id;

                header("Content-type: application/json");
                echo json_encode($params);
                die();
            }

            if ($action == "buy") {
                $data = json_decode(file_get_contents('php://input'));
                $id = (int)$data->id;

                addToBasket($id);


                $params['count'] = getBasketCount();

                header("Content-type: application/json");
                echo json_encode($params);
                die();
            }

            if ($action == "addlike") {

                $data = json_decode(file_get_contents('php://input'));


                $id = (int)$data->id;
                add_likes($id);
                $image = getOneGood($id);
                $params['likes'] = $image['likes'];

                header("Content-type: application/json");
                echo json_encode($params);
                die();
            }
            break;

        case "basket":

            $params['basket'] = getBasket();
            $params['summ'] = getBasketSumm();

            break;

        case 'order':

            $params['basket'] = getBasket();
            $params['summ'] = getBasketSumm();
            if ($_GET['msg'] === 'ok') {
                $params['msg'] = 'Заказ принят на рассмотрение!';
            }
            addNewOrder();

            break;

        case 'admin_order':

            $params['orders'] = getAllOrders();
            setOrderStatus();

            break;

        case "feedback":

            $params = doFeedbackAction($action, $id);

            break;


    }
    return $params;
}





