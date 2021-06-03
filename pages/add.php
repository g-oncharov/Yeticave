<?php
require_once('./functions.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Добавление лота</title>
  <link href="css/normalize.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="/img/favicon.png" type="image/png">
</head>
<body>
  <?php require('layout/header.php') ?>
<main>
  <?php require('layout/nav.php') ?>
  <form class="form form--add-lot <?php echo $erorrs['form'] ?>" action="add.php" method="post"  enctype="multipart/form-data">
    <div class="main-from">
    <h2>Добавление лота</h2>
    <div class="form__container-two">
      <div class="form__item" > <!-- form__item-invalid -->
        <label for="lot-name">Наименование</label>
        <input id="lot-name" class="<?php echo $erorrs[1]?>" value="<?php echo $name;?>" type="text" name="lot-name" placeholder="Введите наименование лота">
        <span class="form__error">Введите наименование лота</span>
      </div>
      <div class="form__item">
        <label for="category">Категория</label>
        <select id="category" value="<?php echo $category;?>" name="category">
          <option>Разное</option>
          <option>Доски и лыжи</option>
          <option>Крепления</option>
          <option>Ботинки</option>
          <option>Одежда</option>
          <option>Инструменты</option>
        </select>
        <span class="form__error">Выберите категорию</span>
      </div>
    </div>
    <div class="form__item form__item--wide">
      <label for="message">Описание</label>
      <textarea id="message" name="message" placeholder="Напишите описание лота" class="<?php echo $erorrs[2]; ?>"><?php echo $message;?></textarea>
      <span class="form__error">Напишите описание лота</span>
    </div>
    <div class="form__item form__item--file"> <!-- form__item-uploaded -->
      <label>Изображение</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
        </div>
      </div>
      <div class="form__input-file">
        <input class="visually-hidden" type="file" name='photo' id="photo2" value="">
        <label for="photo2">
          <span class="<?php echo $erorrs[3]; ?>">+ Добавить</span>
        </label>
      </div>
    </div>
    <div class="form__container-three">
      <div class="form__item form__item--small">
        <label for="lot-rate">Цена</label>
        <input id="lot-rate" class="<?php echo $erorrs[3]; ?>" type="number" name="lot-rate" value="<?php echo $rate;?>" placeholder="0">
        <span class="form__error">Введите начальную цену</span>
      </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
  </div>
  </form>
</main>
  <?php require('layout/footer.php') ?>
</body>
</html>
