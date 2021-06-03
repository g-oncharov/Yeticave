<?php
require('./data/db.php');
require('functions.php');
$header = renderTemplate('layout/header.php', []);
$footer = renderTemplate('layout/footer.php', []);

$resultId = intval($_GET['id']);
$items = mysqli_fetch_assoc(mysqli_query($mysql,"SELECT `items`.`id` as id , `category`, `name`, `description`, `price`, `url`, `user_id`
                               FROM `items` INNER JOIN `categories`
                               ON `items`.category_id = `categories`.`id`
                               WHERE `items`.id = '$resultId'
                               ORDER BY `id` DESC"));

require('pages/lot.php');
