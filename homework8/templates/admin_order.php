<?php if ($allow): ?>
    <?php if (get_user() == 'admin'): ?>
        <table style="border: 1px solid black; width: 50%; border-collapse: collapse;">
            <tr style="border: 1px solid black; height: 50px; font-weight: bolder;">
                <td>Заказчик</td>
                <td>Товар</td>
                <td>Цена</td>
                <td>Статус</td>
                <td></td>
            </tr>
            <?php foreach ($orders as $order): ?>
                <tr style="border: 1px solid black; height: 50px;">
                    <td><?= $order['email'] ?></td>
                    <td><?= $order['name'] ?></td>
                    <td><?= $order['price'] ?></td>
                    <td><?= ($order['status'] == 0) ? 'Ожидает' : 'В обработке' ?></td>
                    <td>
                        <a href="/admin_order/?<?= ($order['status'] == 0) ? 'order_ok=' . $order['id'] . '\">Принять' : 'order_cancel=' . $order['id'] . '\">Отменить.' ?></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php else: ?>
        <?php die('Нет доступа.'); ?>
    <?php endif; ?>
<?php else: ?>
    <?php die('Нет доступа.'); ?>
<?php endif; ?>