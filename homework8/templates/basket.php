<h2>Корзина</h2>

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

<a href="/order/">Оформить заказ</a>

<script>

    $(document).ready(function () {

        $(".delete").on('click', function (e) {
            let id = e.target.id;
            (async () => {
                const response = await fetch('/api/deleteFromBasket/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                $('#item_' + answer.id).remove();
                $('#counter').html(answer.count);
                console.log(answer);
            })();
        });

    });

</script>
