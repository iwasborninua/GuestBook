<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Guest Book</title>
</head>
<body>
<div class="container">
    <form action="controller.php" method="POST">
        <input type="text" name="title" placeholder="Заголовок или имя" class="title"></ br>
    <textarea name="content"  rows="5" placeholder="Ваше сообщение..." class="content"></textarea></ br>
<input type="submit" name="add" value="Добавить" class="button">
</ form>
<?php foreach ($notes as $note):?>
    <section>
        <h4><?=$note['title'];?></h4>
        <p><?=$note['content'];?></p>
        <p class="date"><?=dateFormat($note['date']);?></p>
    </section>
<?endforeach;?>

<ul class="pagination">
    <?php for ($i = 0; $i < $pagination; $i++) { ?>
        <li <?=isset($_GET['page']) && $i + 1 == $_GET['page'] ? 'class="active"' : '';?>
            <?=!isset($_GET['page']) && ($i + 1) == 1 ? 'class="active"': ''?>>
            <a href="?page=<?=$i+1?>"><?=$i + 1;?></a>
        </li>
    <?php }?>
</ul>
</ div>
<script src="js/guest_book.js"></script>
</ body>
</ html>