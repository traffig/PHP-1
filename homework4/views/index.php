<?php foreach ($img_names as $image): ?>
    <a rel="gallery" class="photo" href="<?= IMG_BIG_DIR . $image ?>">
        <img src="<?= IMG_SMALL_DIR . $image ?>" width="150" height="100" alt="<?= $image ?>"/>
    </a>
<?php endforeach; ?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="file_img">
    <input type="submit" name="submit_file_img">
</form>
