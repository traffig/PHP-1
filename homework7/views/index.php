<div class="post_title"><h2>Товары</h2></div>
<?php if (!empty($error_msg)): ?>
    <p><?= $error_msg ?></p>
<?php endif; ?>
<div class="gallery">
    <?php foreach ($goodsAll as $goods): ?>
        <div style="display: inline-block">
            <a href="/index/?deleteId=<?= $goods['id'] ?>" class="btn_del"><img src="/img/del.png" alt="delete"></a>
            <a rel="gallery" class="photo" href="/image/?id=<?= $goods['id'] ?>">
                <img src="<?= IMG_SMALL_DIR . $goods['image'] ?>" width="<?= $goods['width'] ?>"
                     height="<?= $goods['height'] ?>"
                     alt="<?= $goods['image'] ?>"/>
                <span"><?= $goods['name'] ?> за <?= $goods['price'] ?> руб.</span>
            </a>
            <a href="/index/?goods=<?= $goods['id'] ?>&session=user123"
               style="width: 150px; display: block; margin-left: 10px; background: white; text-decoration: none;
                text-align: center;">Добавить в корзину</a>
        </div>
    <?php endforeach; ?>
</div>
<a href="/basket/" style="display: block; margin: 20px;">В корзине: <?= $countBasket['count'] ?> товара</a>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="file_img">
    <input type="submit" name="submit_file_img">
</form>
