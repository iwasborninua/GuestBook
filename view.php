<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guest Book</title>
</head>
<body>
    <form action="controller.php" method="POST">
        <input type="text" name="title" placeholder="Заголовок"></br>
        <textarea name="content" cols="60" rows="5" placeholder="Введите ваш контент"></textarea></br>
        <input type="submit" name="add" value="Добавить">
    </form>

    <?php foreach ($notes as $note):?>
        <h4><?=$note['title'];?></h4>
        <p><?=$note['content'];?></p>
    <?endforeach;?>
</body>
</html>