<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/favicon.png" type="image/png">
</head>
<body>
  <?php require('layout/header.php') ?>
<main class="container">
  <section class="promo">
      <span id="time-node"></span>
      <h2 class="promo__title">Нужен стафф для катки?</h2>
      <p class="promo__text">На нашем интернет-магазине ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
      <ul class="promo__list">
          <li class="promo__item promo__item--boards">
              <a class="promo__link" href="categories.php?id=1">Доски и лыжи</a>
          </li>
          <li class="promo__item promo__item--attachment">
              <a class="promo__link" href="categories.php?id=2">Крепления</a>
          </li>
          <li class="promo__item promo__item--boots">
              <a class="promo__link" href="categories.php?id=3">Ботинки</a>
          </li>
          <li class="promo__item promo__item--clothing">
              <a class="promo__link" href="categories.php?id=4">Одежда</a>
          </li>
          <li class="promo__item promo__item--tools">
              <a class="promo__link" href="categories.php?id=5">Инструменты</a>
          </li>
          <li class="promo__item promo__item--other">
              <a class="promo__link" href="categories.php?id=6">Разное</a>
          </li>
      </ul>
  </section>
  <section class="lots">
      <div class="lots__header">
          <h2>Открытые лоты</h2>
      </div>
      <ul class="lots__list">
        <?php for($i = 0; $i < $num; $i++): ?>
          <?php if($items[$i] != NULL): ?>
          <li class="lots__item lot">
            <a class="link" href="lot.php<?php echo "?id=" . ($items[$i]['id']); ?>">
              <div class="lot__image">
                  <img src=<?= $items[$i]['url'];?> width="350" height="260" alt="<?= $items[$i]['name'];?>">
              </div>
              <div class="lot__info">
                  <span class="lot__category"><?= $items[$i]['category'];?></span>
                  <h3 class="lot__title"><?= $items[$i]['name'];?></h3>
                  <div class="lot__state">
                      <div class="lot__rate">
                          <span class="lot__amount">Цена:</span>
                          <span class="lot__cost"><?= pricefun($items[$i]['price']);?></span>
                      </div>
                  </div>
              </div>
              </a>
          </li>
          <?php endif; ?>
        <?php endfor; ?>
      </ul>
      <ul class="pagination-list">
        <li class="pagination-item pagination-item-prev"><?= $pervpage; ?></li>
        <li class="pagination-item"><?= $page2left; ?></li>
        <li class="pagination-item"><?= $page1left; ?></li>
        <li class="pagination-item pagination-item-active"><a href="#"><?= $page; ?></a></li>
        <li class="pagination-item"><?= $page1right; ?></li>
        <li class="pagination-item"><?= $page2right; ?></li>
        <li class="pagination-item pagination-item-next"><?= $nextpage; ?></li>
      </ul>
  </section>
</main>
  <?php require('layout/footer.php') ?>

 <script src="js/timer.js" type="text/javascript"></script>
</body>
</html>
