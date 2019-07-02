<?php
function addNewOrder()
{
    if (isset($_POST['order'])) {
        $email = safeValue($_POST['email']);
        $session_id = session_id();
        $status = 0;
        $sql = "INSERT INTO `orders`(`email`, `session_id`, `status`) VALUES ('{$email}', '{$session_id}', '{$status}')";
        executeQuery($sql);
        header('location: /order/?msg=ok');
        die();
    }
    return;
}

function getAllOrders()
{
    $sql = "SELECT `orders`.`id`, `orders`.`email`, `orders`.`status`, `goods`.`name`, `goods`.`price` FROM `orders`, `basket`, `goods` WHERE `orders`.`session_id` = `basket`.`session_id` AND `basket`.`goods_id` = `goods`.`id` ORDER BY `orders`.`email`";
    $result = getAssocResult($sql);
    return $result;
}

function setOrderStatus()
{
    if (isset($_GET['order_ok']) && get_user() == 'admin') {
        $id_order = (int)$_GET['order_ok'];
        $sql = "UPDATE `orders` SET `status` = 1 WHERE `id` = '{$id_order}'";
        executeQuery($sql);
        header('location: /admin_order/');
        die();
    } elseif (isset($_GET['order_cancel']) && get_user() == 'admin') {
        $id_order = (int)$_GET['order_cancel'];
        $sql = "UPDATE `orders` SET `status` = 0 WHERE `id` = '{$id_order}'";
        executeQuery($sql);
        header('location: /admin_order/');
        die();
    }
    return;
}