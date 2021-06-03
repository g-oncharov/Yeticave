<?php
session_start();
$title = 'Главная';
require_once('functions.php');
require './data/db.php';

$num = 6;
// Извлекаем из URL текущую страницу
$page = $_GET['page'];
// Определяем общее число сообщений в базе данных
$posts = mysqli_fetch_array(mysqli_query($mysql, "SELECT COUNT(`id`) FROM `items`"))[0];

$total = intval(($posts - 1) / $num) + 1;
$page = intval($page);

if(empty($page) || $page < 0) $page = 1;
if($page > $total) $page = $total;

$start = $page * $num - $num;

$result = mysqli_query($mysql,"SELECT `items`.`id` as id , `category`, `name`, `description`, `price`, `url`, `user_id`
                               FROM `items` INNER JOIN `categories`
                               ON `items`.category_id = `categories`.`id`
                               ORDER BY `id` DESC LIMIT $start, $num");
//$result = mysqli_query($mysql,"SELECT * FROM `items` LIMIT $start, $num");
while ( $items[] = mysqli_fetch_assoc($result));
if ($page != 1) {
  $pervpage = '<a href= ./index.php?page='. ($page - 1) .'>Назад</a> ';
}
// Проверяем нужны ли стрелки вперед
if ($page != $total) {
 $nextpage = '<a href= ./index.php?page='. ($page + 1) .'>Вперед</a>';
}

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 2 > 0) $page2left = '<a href= ./index.php?page='. ($page - 2) .'>'. ($page - 2) .'</a>';
if($page - 1 > 0) $page1left = '<a href= ./index.php?page='. ($page - 1) .'>'. ($page - 1) .'</a>';
if($page + 2 <= $total) $page2right = '<a href= ./index.php?page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = '<a href= ./index.php?page='. ($page + 1) .'>'. ($page + 1) .'</a>';
//////////////////////
require './pages/index.php';
