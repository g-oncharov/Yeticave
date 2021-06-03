
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Вход</title>
  <link href="css/normalize.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="/img/favicon.png" type="image/png">
  <script src="js/validateLogin.js" type="text/javascript"></script>
</head>
<body<? if (!$validation): ?> class="overflow-h"<? endif; ?>>
  <?php require('layout/header.php') ?>
<main>
  <?php require('layout/nav.php') ?>
  <form class="form form-login container" method="post" onsubmit="return validateLogin(this);">
    <h2>Вход</h2>
    <div class="form__item">
      <label for="email">E-mail</label>
      <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?= $emailText?>" class="form__item__input--email">
      <span class="form__error">Введите корректный e-mail</span>
    </div>
    <div class="form__item form__item--last">
      <label for="password">Пароль</label>
      <input id="password" type="password" name="password" placeholder="Введите пароль" class="form__item__input--pass">
      <span class="form__error">Длина пароля должна быть от 4 до 20 символов</span>
    </div>
    <button type="submit" class="button">Войти</button>
  </form>
</main>
  <?php require('layout/footer.php') ?>

  <? if (!$validation): ?>
  <section class="modal-wrapper">
    <div class="modal">
        <h2>Ошибка входа</h2>
        <p>Проверьте данные для входа.</p>
        <button type="button" class="button-close"></button>
    </div>
  </section>
  <script src="js/script.js" type="text/javascript"></script>
  <? endif; ?>
</body>
</html>
