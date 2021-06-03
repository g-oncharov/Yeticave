<?php
session_start();
require 'functions.php';
require 'data/db.php';

// Извлекаем из URL текущую страницу
$page = intval($_GET['page']);
$number = $_GET['id'];
$num = 6;
// Определяем общее число сообщений в базе данных
$postsCount = mysqli_fetch_array(mysqli_query($mysql, "SELECT COUNT(`id`)
                                                       FROM `items`
                                                       WHERE `category_id` = '".$number."'"))[0];

$total = intval(($postsCount - 1) / $num) + 1;

if(empty($page) || $page < 0) $page = 1;
if($page > $total) $page = $total;

$start = $page * $num - $num;

$result = mysqli_query($mysql, "SELECT `items`.`id` as id , `category`, `name`, `description`, `price`, `url`, `user_id`
                                FROM `items` INNER JOIN `categories`
                                ON `items`.category_id = `categories`.`id`
                                WHERE `category_id` = '".$number."'
                                ORDER BY `id` DESC LIMIT $start, $num");

$count = mysqli_fetch_array(mysqli_query($mysql, "SELECT COUNT(`category_id`) FROM `items` WHERE `category_id` = '".$number."'"))[0];

for ($i=0; $i < $count; $i++) {
    $items[$i] = mysqli_fetch_assoc($result);
}


$getRequest = '&id='. $number ;
if ($page != 1) {
  $pervpage = '<a href= ./categories.php?page='. ($page - 1) . $getRequest .'>Назад</a> ';
}
// Проверяем нужны ли стрелки вперед
if ($page != $total) {
 $nextpage = '<a href= ./categories.php?page='. ($page + 1) . $getRequest .'>Вперед</a>';
}

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 2 > 0) $page2left = '<a href= ./categories.php?page='. ($page - 2) . $getRequest .'>'. ($page - 2) .'</a>';
if($page - 1 > 0) $page1left = '<a href= ./categories.php?page='. ($page - 1) . $getRequest .'>'. ($page - 1) .'</a>';
if($page + 2 <= $total) $page2right = '<a href= ./categories.php?page='. ($page + 2) . $getRequest .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = '<a href= ./categories.php?page='. ($page + 1) . $getRequest .'>'. ($page + 1) .'</a>';

require 'pages/categories.php';
