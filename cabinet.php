<?php
session_start();
if (!$_SESSION['auth']) {
  header('Location: /login.php');
}else {
  $userId = $_SESSION['user-id'];
  require 'data/db.php';
  $info = mysqli_fetch_assoc(mysqli_query($mysql, "SELECT `email`, `first-name`, `last-name`, `img` FROM `userdata` WHERE `id` = '$userId'"));

  $serverPost = $_SERVER['REQUEST_METHOD'] == 'POST';
  if ($serverPost) {

    $success = false;
    $equal = false;
    
    $pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
    $pass2 = filter_var(trim($_POST['password2']), FILTER_SANITIZE_STRING);

    if ($pass != $pass2) {
      $userPass = mysqli_fetch_array(mysqli_query($mysql, "SELECT `pass` FROM `userdata` WHERE `id` = '$userId'"))[0];
      if (password_verify($pass, $userPass)) {
        $passH = password_hash($pass2, PASSWORD_BCRYPT);
        mysqli_query($mysql, "UPDATE `userdata` SET `pass` = '$passH' WHERE `id` = '$userId'");
        $success = true;
      }
    }else {
      $equal = true;
    }

  }
  require 'pages/cabinet.php';
}
