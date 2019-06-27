<a href="/index/">На главную</a>
<img src="<?= IMG_BIG_DIR . $img['image'] ?>" alt="<?= $img['image'] ?>" width="100%">
<p><?= $img['description'] ?></p>
<p>Количество просмотров:<?= $img['rating'] ?></p>
<h3>Комментарии</h3>
<form method="post">
    <input type="text" name="name"><br>
    <input type="text" name="message"><br>
    <input type="submit">
</form>

<?php foreach ($feedback as $feed): ?>
    <div style="border: black 3px solid; margin: 0 20%; padding: 10px;">
        <p><b><?= $feed['name'] ?></b></p>
        <p><?= $feed['message'] ?></p>
        <p><?= $feed['date'] ?></p>
    </div>
<?php endforeach; ?>
