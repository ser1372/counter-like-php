<?php

/** Данные для подключения к Базе Данных */
$host = 'localhost';
$database = 'test_bd';
$user = 'root';
$password = '';

/** Подключаемся в Базе Данных */
$pdo = new PDO('mysql:host='. $host .';dbname='.$database.';charset=utf8', $user, $password);
$pdo->exec("SET NAMES utf8");

/** Выбираем статьи и выводим их */
$query = $pdo->prepare("SELECT * FROM article");
$query->execute();
$articles = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Cистема лайков на PHP и JQuery</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="/css/style.css" rel="stylesheet">
	
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="/js/script.js" type="text/javascript"></script>
</head>
<body>
	<div class="wrap">
        <?php if($articles):?>
            <?php foreach($articles as $article): ?>
            <div class="like" data-id="<?php print $article['id']?>"><span class="counter"><?php print $article['count_like'] ?></span></div>
            <?php endforeach; ?>
        <?php endif; ?>
	</div>
</body>
</html>