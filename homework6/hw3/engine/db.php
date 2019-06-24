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

function getArrayImagesDb($sql = "SELECT * FROM `images_list` ORDER BY `rating` DESC;")
{
    $dataDb = getDataDb($sql);
    $dataArray = [];
    while ($row = mysqli_fetch_assoc($dataDb)) {
        $dataArray[] = $row;
    }
    return $dataArray;
}

function getAllFeedback($id)
{
    $dataDb = getDataDb("SELECT * FROM `feedback` WHERE `id_image`='{$id}' ORDER BY `date` DESC;");
    $dataArray = [];
    while ($row = mysqli_fetch_assoc($dataDb)) {
        $dataArray[] = $row;
    }
    return $dataArray;
}

function getImageDb($id)
{
    $dataDb = getDataDb("SELECT `id`, `name`,`rating` FROM `images_list` WHERE `id`='$id';");
    $row = mysqli_fetch_assoc($dataDb);
    return $row;
}

function safeVarDb($connect_db, $var)
{
    $result = mysqli_real_escape_string($connect_db, strip_tags(htmlspecialchars($var)));
    return $result;
}

function closeDb()
{
    return mysqli_close(getConnectDb());
}