<?php
function setRatingDb($id)
{
    $connect_db = getConnectDb();
    @mysqli_query($connect_db, "UPDATE `goods` SET `rating` = `rating` + 1 WHERE `id`='$id';")
    or die('Ошибка обновления рейтинга: ' . mysqli_connect_error());
    return;
}

function addImgDb($image)
{
    $connect_db = getConnectDb();
    @mysqli_query($connect_db, "INSERT INTO `goods`(`image`, `width`, `height`, `rating`) 
VALUES ('$image', 150, 100, 0);") or die(mysqli_connect_error($connect_db));
    return;
}

function removeImgDb($id)
{
    $connect_db = getConnectDb();
    $name_img = getImageDb($id)['image'];
    @mysqli_query($connect_db, "DELETE FROM `goods` WHERE `id`='$id'")
    or die(mysqli_connect_error($connect_db));
    return $name_img;
}

function removeFeedbackDb($id)
{
    $connect_db = getConnectDb();
    @mysqli_query($connect_db, "DELETE FROM `feedback` WHERE `id_goods`='$id'")
    or die(mysqli_connect_error($connect_db));
    return;
}

function addFeedbackDb()
{
    if (!empty($_POST)) {
        $connect_db = getConnectDb();
        $name = safeVarDb($connect_db, $_POST['name']);
        $message = safeVarDb($connect_db, $_POST['message']);
        $id_img = (int)$_GET['id'];
        mysqli_query($connect_db, "INSERT INTO `feedback`(`name`, `message`, `id_goods`)
 VALUES ('{$name}', '{$message}', '{$id_img}');");
        header("location: /image/?id={$id_img}");
        die();
    }
    return;
}


