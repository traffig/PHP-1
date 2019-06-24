<?php
function getConnectDb()
{
    static $connect_db = null;
    if ($connect_db === null) {
        $connect_db = @mysqli_connect(HOST_DB, USER_DB, PASS_DB, DATA_NAME_DB)
        or die ('Ошибка соединения: ' . mysqli_connect_error());
    }
    return $connect_db;
}

function getDataDb($sql)
{
    $connect_db = getConnectDb();
    $dataDb = @mysqli_query($connect_db, $sql) or die(mysqli_connect_error($connect_db));
    return $dataDb;
}

function getDataDb_toArray($sql = "SELECT * FROM `images_list` ORDER BY `rating` DESC;")
{
    $dataDb = getDataDb($sql);
    $dataArray = [];
    while ($row = mysqli_fetch_assoc($dataDb)) {
        $dataArray[] = $row;
    }
    return $dataArray;
}

function getDataDb_toAssoc($id)
{
    $dataDb = getDataDb("SELECT `name`,`rating` FROM `images_list` WHERE `id`='$id';");
    $row = mysqli_fetch_assoc($dataDb);
    return $row;
}

function setRating($id)
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
    $name_img = getDataDb_toAssoc($id)['name'];
    @mysqli_query($connect_db, "DELETE FROM `images_list` WHERE `id`='$id'")
    or die(mysqli_connect_error($connect_db));
    return $name_img;
}

function closeDb()
{
    return mysqli_close(getConnectDb());
}