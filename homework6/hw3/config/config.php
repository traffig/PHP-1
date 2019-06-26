<?php
define("TEMPLATES_DIR", "../views/");
define("LAYOUTS_DIR", "./layouts/");
//Папки с изображениями
define("IMG_BIG_DIR", "/gallery_img/big/");
define("IMG_SMALL_DIR", "/gallery_img/small/");
//DB
define("HOST_DB", "localhost");
define("USER_DB", "root");
define("PASS_DB", "");
define("DATA_NAME_DB", "gallery");

include_once "../engine/msg.php";
include_once "../engine/functions.php";
include_once "../engine/db.php";
include_once "../engine/function_image.php";