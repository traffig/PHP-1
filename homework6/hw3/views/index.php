<?php if (!empty($error_msg)): ?>
    <p><?= $error_msg ?></p>
<?php endif; ?>
<?php foreach ($img_names as $image): ?>
    <a href="/index/?deleteId=<?= $image['id'] ?>" class="btn_del"><img src="/img/del.png" alt="delete"></a>
    <a rel="gallery" class="photo" href="/image/?id=<?= $image['id'] ?>">
        <img src="<?= IMG_SMALL_DIR . $image['name'] ?>" width="<?= $image['width'] ?>" height="<?= $image['height'] ?>"
             alt="<?= $image['name'] ?>"/>
    </a>
<?php endforeach; ?>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="file_img">
    <input type="submit" name="submit_file_img">
</form>
