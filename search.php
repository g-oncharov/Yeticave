<?php
session_start();
require 'data/db.php';
require 'functions.php';

  $query = $_GET['search'];
  $min_length = 1;
  $result;
  $i = 0;
  if (strlen($query) >= $min_length) {
      $query = htmlspecialchars($query);
      $query = mysqli_real_escape_string($mysql, $query);
      $raw_results = mysqli_query($mysql, "SELECT * FROM `items` WHERE (`name` LIKE '%".$query."%')") or die(mysql_error());
      $count = mysqli_num_rows($raw_results);
      if ($count > 0) {
          while ($results = mysqli_fetch_array($raw_results)) {
              $result[$i] = $results['name'];
              $i++;
          }
      }
  }
  for ($i=0; $i < $count; $i++) {
      $res = mysqli_query($mysql, "SELECT `items`.`id` as id , `category`, `name`, `description`, `price`, `url`, `user_id`
                                      FROM `items` INNER JOIN `categories`
                                      ON `items`.category_id = `categories`.`id`
                                      WHERE `name` = '".$result[$i]."'
                                      ORDER BY `id` DESC");
      $items[$i] = mysqli_fetch_assoc($res);
  }
require 'pages/search.php';
