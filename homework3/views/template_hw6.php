<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .container {
            width: 100vw;
            height: 50vh;
        }

        .menu-position {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .margin-link {
            margin: 10px;
        }
    </style>
    <title>Document</title>
</head>
<body>
<div class="container menu-position">
    <ul class="nav nav-pills">
        <?php foreach ($array_links as $key_link => $val_link): ?>
            <?php if (!is_array($val_link)): ?>
                <li class="nav-item margin-link">
                    <a class="nav-link active" href="<?= $val_link ?>"><?= $key_link ?></a>
                </li>
            <?php endif; ?>
            <?php if (is_array($val_link)): ?>
                <li class="nav-item dropdown margin-link">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true"
                       aria-expanded="false"><?= $key_link ?></a>
                    <div class="dropdown-menu">
                        <?php foreach ($val_link as $key_drop => $val_drop): ?>
                            <a class="dropdown-item" href="<?= $val_drop ?>"><?= $key_drop ?></a>
                        <?php endforeach; ?>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>