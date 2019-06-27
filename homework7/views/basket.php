<a href="/index/">На главную</a>
<div class="post_title"><h2>Корзина</h2></div>
<div class="basket">
    <?php for ($i = 0; count($goodsAll) > $i; $i++): ?>
        <div class="basket_row">
            <p><?= $i + 1 ?>. <?= $goodsAll[$i]['name'] ?> цена: <?= $goodsAll[$i]['price'] ?> руб.
                <a href="/basket/?session=user123&del_basket=<?= $goodsAll[$i]['id'] ?>"> [X] </a></p>
        </div>
    <?php endfor; ?>
    <p>Общая стоимость: <?= $sum['sum_price'] ?> руб.</p>
</div>