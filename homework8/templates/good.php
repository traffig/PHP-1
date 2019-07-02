<button class="action" id="likeButton" data-id="<?=$id?>">Like</button><br>
Просмотров: <span id='like'><?= $likes?></span><br>
<?=$name?><br>
<img src="/img/big/<?= $image?>" width="300"><br>
<?=$description?><br>


Стоимость: <?=$price?><br>
<button class="buy" id="<?=$id?>" data-id="<?=$id?>">Купить</button>
<br>
<h2>Отзывы</h2>

<form action="/good/<?=$formAction?>/?backid=<?=$id?>" method="post">
    <?=$status?> <br>
    <input hidden type="text" name="id" value="<?=$edit_id?>"><br>
    <input type="text" name="name" placeholder="Ваше имя" value="<?=$name?>"><br>
    <input type="text" name="message" placeholder="Текст отзыва" value="<?=$message?>"><br>
    <input type="submit" name="send" value="<?=$textAction?>">
</form>


<? foreach ($feedback as $item): ?>
    <p><b><?= $item['name'] ?></b>: <?= $item['feedback'] ?>
        <a href="/good/edit/<?=$item['id']?>/?backid=<?=$id?>">[edit]</a>
        <a href="/good/delete/<?=$item['id']?>/?backid=<?=$id?>">[X]</a>
    </p>

<? endforeach; ?>


<script>

    $(document).ready(function(){
        $(".action").on('click', function(){
            let id = $("#likeButton").attr("data-id");
            (async () => {
                const response = await fetch('/api/addlike/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                $('#like').html(answer.likes);
                console.log(answer);
            })();
        });


        $(".buy").on('click', function(e){
            let id = e.target.id;
            (async () => {
                const response = await fetch('/api/buy/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                $('#counter').html(answer.count);
                console.log(answer);
            })();
        });

    });
/*
    $(document).ready(function(){
        $(".action").on('click', function(){
            var id = $("#likeButton").attr("data-id");

            $.ajax({
                url: "/api/addlike/",
                type: "POST",
                dataType : "json",
                data:{
                    id: id,
                },
                error: function() {alert("Что-то пошло не так...");},
                success: function(answer){
                    $('#like').html(answer.likes);
                }

            })
        });

    });
   */
</script>