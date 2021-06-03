<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Регистрация</title>
  <link href="css/normalize.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="/img/favicon.png" type="image/png">
  <script src="js/validateRegistration.js" type="text/javascript"></script>
</head>
<body<? if (!$validation): ?> class="overflow-h"<? endif; ?>>
  <?php require('layout/header.php') ?>
<main>
  <?php require('layout/nav.php'); ?>
  <form class="form container" method="post" enctype="multipart/form-data" onsubmit="return validateRegistration(this);">
    <h2>Регистрация нового аккаунта</h2>
    <div class="form__item">
      <label for="email">E-mail</label>
      <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?= $emailText?>" class="form__item__input--email">
      <span class="form__error">Введите корректный e-mail</span>
    </div>
    <div class="form__item">
      <label for="name">Имя</label>
      <input id="name" type="text" name="name" placeholder="Введите имя" value="<?= $nameText?>" class="form__item__input--name">
      <span class="form__error">Введите имя</span>
    </div>
    <div class="form__item">
      <label for="lname">Фамилия</label>
      <input id="lname" type="text" name="lname" placeholder="Введите фамилия" value="<?= $lnameText?>" class="form__item__input--lname">
      <span class="form__error">Введите имя</span>
    </div>
    <div class="form__item">
      <label for="password">Пароль</label>
      <input id="password" type="password" name="password" placeholder="Введите пароль" class="form__item__input--pass">
      <span class="form__error">Длина пароля должна быть от 4 до 20 символов</span>
    </div>
    <div class="form__item">
      <input class="visually-hidden" type="file" name='photo' id="photo2" value="">
      <label for="photo2">
        Фото<br>
        <span class="photo">+ Добавить</span>
      </label>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <div class="form__buttons">
      <button type="submit" class="button">Зарегистрироваться</button>
      <a class="text-link" href="login.php">Уже есть аккаунт</a>
    </div>
  </form>
</main>
  <?php require('layout/footer.php'); ?>

  <? if (!$validation || $errorEmail): ?>
  <section class="modal-wrapper">
    <div class="modal">
        <h2>Ошибка входа</h2>
        <? if ($errorEmail): ?>
        <p>Эта почта уже занята.</p>
        <? else: ?>
        <p>Проверьте данные для входа.</p>
        <? endif; ?>
        <button type="button" class="button-close"></button>
    </div>
  </section>
  <script src="js/script.js" type="text/javascript"></script>
  <? else: ?>
    <section class="modal-wrapper">
      <div class="modal">
        <h2><?= $name?>, регистрация прошла успешно!</h2>
        <p>Ваша почта: <?= $email?></p>
        <p>Ваш пароль: <?= $pass?></p>
        <a href="/index.php" class="button">Окей!</a>
        <button type="button" class="button-close"></button>
      </div>
    </section>
    <script src="js/script.js" type="text/javascript"></script>
  <? endif; ?>
</body>
</html>
