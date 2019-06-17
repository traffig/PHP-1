<?php
if (isset($_POST['submit_file_img'])) {
    $allowed_type = ['image/jpeg', 'image/png', 'image/gif'];
    $file_type = $_FILES['file_img']['type'];
    if (in_array($file_type, $allowed_type)) {
        if ($_FILES['file_img']['size'] > 1024 * 1 * 1024) {
            Die('Фото должно быть больше 5 мб');
        }
        $path_big = IMG_BIG_DIR . $_FILES['file_img']['name'];
        if (file_exists($path_big)) {
            Die("Фото с именем: \"{$_FILES['file_img']['name']}\" уже существует, измените имя файла.");
        }
        $path_small = IMG_SMALL_DIR . $_FILES['file_img']['name'];
        move_uploaded_file($_FILES['file_img']['tmp_name'], $path_big);

        $image = new SimpleImage();
        $image->load($path_big);
        $image->resize(150, 100);
        $image->save($path_small);
        header('location: index.php');

    } elseif (!empty($_FILES['file_img']['error'])) {
        header('location: index.php');
    } else {
        Die('Фото должно быть типа: jpg, png, gif');
    }
}
