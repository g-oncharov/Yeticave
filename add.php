<?php
require_once('functions.php');
$from = renderTemplate('pages/add.php', []);
$lot = renderTemplate('pages/add-lot.php', ['_POST' => $_POST]);
session_start();
 $name = $_POST['lot-name'] ?? '';
 $category = $_POST['category'] ?? '';
 $message = $_POST['message'] ?? '';
 $rate = $_POST['lot-rate'] ?? '';
 $step = $_POST['lot-step'] ?? '';
 $date = $_POST['lot-date'] ?? '';

$erorrs = ['form' => ''];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($erorrs as $key => $value) {
        if ($erorrs[$keys] == 'form__item-invalid') {
            echo "success ";
        }
        if (empty($_POST['lot-name'])) {
            $erorrs[1] = 'form__item-invalid';
        } else {
            $erorrs[1] = '';
        };
        if (empty($_POST['message'])) {
            $erorrs[2] = 'form__item-invalid';
        } else {
            $erorrs[2] = '';
        };
        if (!filter_var($_POST['lot-rate'], FILTER_VALIDATE_INT) || empty($_POST['lot-rate'])) {
            $erorrs[3] = 'form__item-invalid';
        } else {
            $erorrs[3] = '';
        };
        if (!empty($_FILES['photo']['name'])) {
            move_uploaded_file($_FILES['photo']['tmp_name'], 'img/' . $_FILES['photo']['name']);
        } else {
            $erorrs[3] = 'form__item-invalid';
        }
    }

    for ($i=1; $i < count($erorrs); $i++) {
        if (!empty($erorrs[$i])) {
            $erorrs['form'] = 'form--invalid';
        }
    }

    require 'data/db.php';
    $insertUrl = 'img/' . $_FILES['photo']['name'];
    $insertName = $_POST['lot-name'];
    $insertRate = intval($_POST['lot-rate']);
    $insertDesc = $_POST['message'];
    $cat = $_POST['category'];
    $insertCat = mysqli_fetch_assoc(mysqli_query($mysql, "SELECT `id` FROM `categories` WHERE `category` = '".$cat."'"));
    $insertCat = $insertCat['id'];
    $userId = $_SESSION['user-id'];
    if (empty($erorrs['form'])) {
        mysqli_query($mysql, "INSERT INTO `items` (`category_id`, `name`,`description`, `price`, `url`, `user_id`) VALUES('$insertCat','$insertName','$insertDesc', '$insertRate', '$insertUrl', '$userId')");
        $result = mysqli_query($mysql, "SELECT * FROM `items`");
        $count = mysqli_fetch_assoc(mysqli_query($mysql, "SELECT COUNT(`id`) FROM `items`"));
        $count = $count['COUNT(`id`)'];
        for ($i=0; $i < $count; $i++) {
            $r1 = mysqli_fetch_assoc($result);
        }
        header('Location: /mylots.php');
    }
} else {
    if ($_SESSION['auth'] == true) {
        echo $from;
    } else {
        http_response_code(403);
        echo "403 Forbidden";
        exit();
    }
}
