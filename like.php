<?php

/** Данные для подключения к Базе Данных */
$host = 'localhost';
$database = 'test_bd';
$user = 'root';
$password = '';

/** Подключаемся в Базе Данных */
$pdo = new PDO('mysql:host='. $host .';dbname='.$database.';charset=utf8', $user, $password);
$pdo->exec("SET NAMES utf8");

/** Получаем наш ID статьи из запроса */
$id = intval($_POST['id']);
$count = 0;
$message = '';
$error = true;

/** Если нам передали ID то обновляем */
if($id){
	/** Обновляем количество лайков в статье */
	
	$query = $pdo->prepare("UPDATE article SET count_like = count_like+1  WHERE id = :id");
	$query->execute(array(':id'=>$id));
	
	/** Выбираем количество лайков в статье */
	$query = $pdo->prepare("SELECT count_like FROM article WHERE id = :id");
	$query->execute(array(':id'=>$id));
	$result = $query->fetch(PDO::FETCH_ASSOC);
	$count = isset($result['count_like']) ? $result['count_like']  : 0;
	
	$error = false;
}else{
	/** Если ID пуст - возвращаем ошибку */
	
	$error = true;
	$message = 'Статья не найдена';
}


/** Возвращаем ответ скрипту */

// Формируем масив данных для отправки
$out = array(
	'error' => $error,
	'message' => $message,
	'count' => $count,
);

// Устанавливаем заголовот ответа в формате json
header('Content-Type: text/json; charset=utf-8');

// Кодируем данные в формат json и отправляем
echo json_encode($out);

