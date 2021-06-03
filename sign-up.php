<?php
session_start();
require('data/db.php');
$validation = true;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $lname = filter_var(trim($_POST['lname']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
    $error = false;
    $errorEmail = false;

    if (mb_strlen($email) < 8 || mb_strlen($email) > 60) {
        $error = true;
    } elseif (mb_strlen($name) > 30) {
        $error = true;
    } elseif (mb_strlen($lname) > 30) {
        $error = true;
    } elseif (mb_strlen($pass) < 4 || mb_strlen($pass) > 60) {
        $error = true;
    }

    if (!empty($_FILES['photo']['name'])) {
        $photoName = 'img/' . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], $photoName);
    }

    $passH = password_hash($pass, PASSWORD_BCRYPT);

    $resultEmail = mysqli_fetch_assoc(mysqli_query($mysql, "SELECT `email` FROM `userdata` WHERE  `email` = '$email'"))['email'];
    if ($resultEmail == $email) {
        $errorEmail = true;
        $errorText = "Эта почта уже занята";
        $validation = false;
    }
    if (!$error && !$errorEmail) {

      if (!empty($_FILES['photo']['name'])) {
        mysqli_query($mysql, "INSERT INTO `userdata` (`email`, `first-name`, `last-name`,`img`, `pass`) VALUES('$email', '$name', '$lname','$photoName', '$passH')");
      }else {
        mysqli_query($mysql, "INSERT INTO `userdata` (`email`, `first-name`, `last-name`, `pass`) VALUES('$email', '$name', '$lname', '$passH')");
      }
      $id = mysqli_fetch_array(mysqli_query($mysql, "SELECT `id` FROM `userdata` WHERE  `email` = '$email'"))[0];
      mysqli_close($mysql);
      $_SESSION['auth'] = true;
      $_SESSION['user-id'] = $id;
      $_SESSION['status'] = 0;
      header('Location: /cabinet.php');
    }else {
      $validation = false;
    }
}
$emailText = $_POST['email'] ?? '';
$nameText = $_POST['name'] ?? '';
$lnameText = $_POST['lname'] ?? '';
require 'pages/sign-up.php';
