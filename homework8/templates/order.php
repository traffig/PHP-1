<h2>Оформление заказа.</h2>
<?php if (isset($msg)): ?>
    <p><?= $msg ?></p>
<?php endif; ?>
<? foreach ($basket as $item): ?>
    <div id="item_<?= $item['basket_id'] ?>">
        <?= $item['name'] ?> <br>
        <a href="/image/<?= $item['good_id'] ?>">
            <img src="/img/small/<?= $item['image'] ?>" width="150" height="100">
        </a><br>
        <button class="delete" id="<?= $item['basket_id'] ?>">Удалить</button>
        <br>
        Цена: <?= $item['price'] ?> <br>
    </div>
<? endforeach; ?>
<br>

Общая стоимость: <?= $summ ?><br>
<form method="post">
    <p>Введите почту для заказа.</p>
    <label>Email: <input type="email" name="email"></label>
    <input type="submit" name="order">
</form>