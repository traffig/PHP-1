<?php
function setRatingDb($id)
{
    $connect_db = getConnectDb();
    @mysqli_query($connect_db, "UPDATE `images_list` SET `rating` = `rating` + 1 WHERE `id`='$id';")
    or die('Ошибка обновления рейтинга: ' . mysqli_connect_error());
    return;
}

function addImgDb($name)
{
    $connect_db = getConnectDb();
    @mysqli_query($connect_db, "INSERT INTO `images_list`(`name`, `width`, `height`, `rating`) 
VALUES ('$name', 150, 100, 0);") or die(mysqli_connect_error($connect_db));
    return;
}

function removeImgDb($id)
{
    $connect_db = getConnectDb();
    $name_img = getImageDb($id)['name'];
    @mysqli_query($connect_db, "DELETE FROM `images_list` WHERE `id`='$id'")
    or die(mysqli_connect_error($connect_db));
    return $name_img;
}

function removeFeedbackDb($id)
{
    $connect_db = getConnectDb();
    @mysqli_query($connect_db, "DELETE FROM `feedback` WHERE `id_image`='$id'")
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
        mysqli_query($connect_db, "INSERT INTO `feedback`(`name`, `message`, `id_image`)
 VALUES ('{$name}', '{$message}', '{$id_img}');");
        header("location: /image/?id={$id_img}");
        die();
    }
    return;
}


