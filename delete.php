<?php
session_start();
require 'data/db.php';
$itemId = $_GET['id'];
$userId = $_SESSION['user-id'];
$userStatus = $_SESSION['status'];

$access = mysqli_fetch_array(mysqli_query($mysql, "SELECT COUNT(`user_id`) FROM `items` WHERE `id` = '$itemId' AND `user_id` = '$userId'"))[0];

if ($userStatus == 10 || $access) {
  $sql = "DELETE FROM `items` WHERE `id` = '$itemId'";
  mysqli_query($mysql, $sql);
}
header("Location: mylots.php");
