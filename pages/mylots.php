<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Мои товары</title>
  <link href="css/normalize.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="/img/favicon.png" type="image/png">
</head>
<body>
  <?php require('layout/header.php') ?>
  <?php require('layout/nav.php') ?>
<main class="container">
<section class="lots">
    <div class="lots__header">
        <h2>Мои Товары</h2>
    </div>
    <ul class="lots__list">
      <?php if(!empty($items)): ?>
        <?php for($i = 0; $i < $count; $i++): ?>
        <li class="lots__item lot">
          <a class="link" href="lot.php<?= "?id=" . ($items[$i]['id']); ?>">
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
        <?php endfor; ?>
      <?php else: ?>
        <h2>Ничего не найденно</h2>
      <?php endif; ?>
    </ul>
</section>
</main>
  <?php require('layout/footer.php') ?>
</body>
</html>
