<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title><?= $items['name'] ?></title>
  <link href="css/normalize.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="/img/favicon.png" type="image/png">
</head>
<body>
  <?php require('layout/header.php') ?>
<main>
  <?php require('layout/nav.php') ?>
  <section class="lot-item container">
    <div class="lot-item__content">
      <div class="lot-item__left">
        <div class="lot-item__image">
          <img src="<?= $items['url'] ?>">
        </div>
        <div class="lot-item__description">
          <span class="description__title">Описание:</span>
          <p><?= $items['description'] ?></p>
        </div>
      </div>
      <div class="lot-item__right">
        <div class="lot-item__state">
          <h2><?= $items['name'] ?></h2>
          <div class="lot-item__cost-state">
            <div class="lot-item__rate">
              <span class="lot-item__amount">Цена:</span>
              <span class="lot-item__cost"><?= priceFun($items['price']); ?></span>
            </div>
          </div>
          <p class="lot-item__category">Категория: <span><?= $items['category'] ?></span></p>
          <div class="lot-item__button-block">
            <? if ($_SESSION['auth'] == 1): ?>
              <? if ($_SESSION['status'] == 10 || $_SESSION['user-id'] == $items['user_id']): ?>
                <a class="button button-del" href="delete.php?id=<?=$items['id']?>">Удалить</a>
              <? else: ?>
                <button class="button button-confirm" type="button">Заказать</button>
              <? endif; ?>
            <? else: ?>
              <a class="button" href="login.php">Заказать</a>
            <? endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="modal-wrapper">
    <div class="modal">
      <h2>Подтвердите свой заказ</h2>
      <input type="text" class="search" name="search" placeholder="Введите свой телефон..." minlength="5"><br>
      <button type="button" class="button button-success">Подтвердить</button>
      <button type="button" class="button-close"></button>
      <div class="success"><h3>В течение 15 минут наши операторы свяжутся с вами!!!</h3></div>
    </div>
  </section>
</main>
  <?php require('layout/footer.php') ?>
  <script src="../js/script.js" type="text/javascript"></script>
</body>
</html>
