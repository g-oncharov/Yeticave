<?php
session_start();
$validation = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
    $error = false;

    if (mb_strlen($email) < 8 || mb_strlen($email) > 60) {
        $error = true;
    } else {
        $error = false;
    }

    if (mb_strlen($pass) < 2 || mb_strlen($pass) > 60) {
        $error = true;
    }

    if (empty($error)) {
        require('./data/db.php');
        $user = mysqli_fetch_assoc(mysqli_query($mysql, "SELECT `status`, `pass`, `id` FROM `userdata` WHERE `email` = '$email'"));

        if (password_verify($pass, $user['pass'])) {
            $_SESSION['auth'] = true;
            $_SESSION['user-id'] = $user['id'];
            $_SESSION['status']  = $user['status'];
            header('Location: /index.php');
        } else {
            $validation = false;
        }
        
        mysqli_close($mysql);
    } else {
      $validation = false;
    }
}

$emailText = $_POST['email'] ?? '';
require 'pages/login.php';
