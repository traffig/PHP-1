<?php

//функция возвращает имя файла по его idx
function getOneGood($id)
{
    $sql = "SELECT * FROM `goods` WHERE id={$id}";
//var_dump($sql);
    $row = getAssocResult($sql);
    //var_dump($row[0]);
    return $row[0];
}

//увеличим число лайков на 1 одним запросом к базе
function add_likes($id)
{
    $sql = "UPDATE `goods` SET `likes` = `likes` + 1 WHERE id={$id}";
    executeQuery($sql);
}

function getGoods()
{
    $sql = "SELECT * FROM `goods` ORDER BY likes DESC";
    $images = getAssocResult($sql);
    return $images;
}