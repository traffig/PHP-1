<h2>Каталог:</h2>
<? foreach ($images as $image): ?>
    <a href="/good/<?= $image['id'] ?>">
        <img src="/img/small/<?= $image['image'] ?>" width="150" height="100">

    </a>
    <?= $image['likes'] ?>

<? endforeach; ?>
