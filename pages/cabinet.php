<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Кабинет</title>
  <link href="css/normalize.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="/img/favicon.png" type="image/png">
  <script src="js/validatePassword.js" type="text/javascript"></script>
</head>
<body<? if ($serverPost && !$success): ?> class="overflow-h"<? endif; ?>>
  <?php require('layout/header.php') ?>
  <?php require('layout/nav.php') ?>
<main class="container">
  <h1>Личный кабинет</h1>
  <section class="info">
    <div class="info__block">
      <h3>Ваши данные</h3>
      <div class="block__photo">
        <img src="<?= $info['img'] ?>" alt="">
      </div>
      <p>Имя: <?= $info['first-name'] ?></p>
      <p>Фамилия: <?= $info['last-name'] ?></p>
      <p>Почта: <?= $info['email'] ?></p>
      <a href="mylots.php" class="button">Мои товары</a>
    </div>
    <div class="password-block">
    <form class="form" method="post" onsubmit="return validatePassword(this);">
      <h3>Изменить пароль</h3>
      <div class="form__item">
        <label for="password">Старый пароль</label>
        <input id="password" type="password" name="password" placeholder="Введите пароль" class="form__item__input--pass form__item__input--pass-old">
        <span class="form__error">Длина пароля должна быть от 4 до 20 символов</span>
      </div>
      <div class="form__item">
        <label for="password2">Новый Пароль</label>
        <input id="password2" type="password" name="password2" placeholder="Введите пароль" class="form__item__input--pass form__item__input--pass-new">
        <span class="form__error">Длина пароля должна быть от 4 до 20 символов</span>
      </div>
      <button type="submit" class="button">Изменить</button>
        <?php if ($success): ?>
          <p>Успех</p>
        <?php endif; ?>
    </form>
    </div>
  </section>
    <?php if ($serverPost): ?>
      <?php if (!$success || $equal): ?>
      <section class="modal-wrapper">
        <div class="modal">
            <h2>Ошибка</h2>
            <?php if ($equal): ?>
              <p>Пароли совпадают.</p>
            <?php else: ?>
              <p>Не верный пароль.</p>
            <?php endif; ?>
            <button type="button" class="button-close"></button>
        </div>
      </section>
      <?php endif; ?>
      <script src="js/script.js" type="text/javascript"></script>
    <?php endif; ?>
</main>
  <?php require('layout/footer.php') ?>
</body>
</html>
