<?php
function addGoodsInBasket()
{
    if (isset($_GET['session']) && isset($_GET['goods'])) {
        $connection_db = getConnectDb();
        $id_session = safeVarDb($connection_db, $_GET['session']);
        $id_goods = safeVarDb($connection_db, $_GET['goods']);
        mysqli_query($connection_db, "INSERT INTO basket (id_session, id_goods) VALUES ('$id_session', '$id_goods');");
        header('location: /');
        die();
    }
}

function removeGoodsInBasket()
{
    if (isset($_GET['del_basket'])) {
        $connect_db = getConnectDb();
        $id = safeVarDb($connect_db, $_GET['del_basket']);
        mysqli_query($connect_db, "DELETE FROM `basket` WHERE `id` = '{$id}'");
        header('location:/basket/');
        die();
    }
}

function getBasketCount($session_id = 'user123')
{
    $connection_db = getConnectDb();
    $countBasket = mysqli_query($connection_db,
        "SELECT COUNT(id) AS `count` FROM `basket` WHERE `id_session` = '{$session_id}';");
    $row = mysqli_fetch_assoc($countBasket);
    return $row;
}

function getBasketSum($session_id = 'user123')
{
    $connection_db = getConnectDb();
    $countBasket = mysqli_query($connection_db,
        "SELECT SUM(`price`) AS `sum_price` FROM `basket`, `goods` WHERE `basket`.`id_session` = '{$session_id}'
 AND `goods`.`id` = `basket`.`id_goods`;");
    $row = mysqli_fetch_assoc($countBasket);
    return $row;
}

function getAllGoodsInBasket($session_id = 'user123')
{
    $dataDb = getDataDb("SELECT `goods`.`name` AS `name`, `goods`.`price` AS `price`, `basket`.`id` 
FROM `basket`, `goods` WHERE `basket`.`id_session` = '{$session_id}' AND `goods`.`id` = `basket`.`id_goods`;");
    $dataArray = [];
    while ($row = mysqli_fetch_assoc($dataDb)) {
        $dataArray[] = $row;
    }
    return $dataArray;
}