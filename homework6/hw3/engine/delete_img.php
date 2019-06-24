<?php
if (isset($_GET['deleteId'])) {
    $id = (int)$_GET['deleteId'];
    $image = removeImgDb($id);
    removeFeedbackDb($id);
    unlink('.' . IMG_BIG_DIR . $image);
    unlink('.' . IMG_SMALL_DIR . $image);
    header('location: /index/?msg=ok_delete');
    die();
}