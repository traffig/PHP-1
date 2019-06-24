<?php
function remove_img()
{
    if (isset($_GET['deleteId'])) {
        $id = (int)$_GET['deleteId'];
        $image = removeImgDb($id);
        unlink(IMG_BIG_DIR . $image);
        unlink(IMG_SMALL_DIR . $image);
        header('location: index.php?msg=ok_delete');
        die();
    }
    return;
}