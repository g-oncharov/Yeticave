<?php
session_start();
require 'functions.php';
require 'data/db.php';
$userId = $_SESSION['user-id'];
$result = mysqli_query($mysql,"SELECT `items`.`id` as id , `category`, `name`, `description`, `price`, `url`, `user_id`
                               FROM `items` INNER JOIN `categories`
                               ON `items`.category_id = `categories`.`id`
                               WHERE `user_id` = '$userId'
                               ORDER BY `id` DESC");
$count = mysqli_fetch_array(mysqli_query($mysql, "SELECT COUNT(`user_id`) FROM `items` WHERE `user_id` = '$userId'"))[0];
for ($i=0; $i < $count; $i++) {
    $items[$i] = mysqli_fetch_assoc($result);
}
require 'pages/mylots.php';
