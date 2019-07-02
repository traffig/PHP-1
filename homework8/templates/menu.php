<div>
    <form method="post" action="/login/">
        <a href="/">Главная</a>
        <a href="/news/">Новости</a>
        <a href="/catalog/">Каталог</a>
        <a href="/feedback/">Отзывы</a>
        <?php if (get_user() == 'admin'): ?>
            <a href="/admin_order/">Администрирование заказов</a>
        <?php endif; ?>
        <a href="/basket/">Корзина <span id="counter"><?= $count ?></span></a>

        <? if (!$allow): ?>

        <input type='text' name='login' placeholder='Логин'>
        <input type='password' name='pass' placeholder='Пароль'>
        Save? <input type='checkbox' name='save'>
        <input type='submit' name='send' value="Войти">
    </form>
    <? else: ?>
        <p>Добро пожаловать <?= $user ?><a href='/logout/'>выход</a></p>
    <? endif; ?>
</div>