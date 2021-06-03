<?php
session_start();
?>
<header class="main-header">
<div class="main-header__container container">
    <h1 class="visually-hidden">YetiCave</h1>
    <a class="main-header__logo" href="index.php">
        <img src="img/logo.svg" width="160" height="39" alt="Логотип компании YetiCave">
    </a>
    <form class="main-header__search" method="get" action="../search.php">
        <input type="text" class="search" name="search" placeholder="Поиск" required>
        <input class="main-header__search-btn" type="submit">
    </form>
    <?php if ($_SESSION['auth'] == true): ?>
    <a class="main-header__add-lot button" href="add.php">Добавить товар</a>
    <?php endif; ?>
    <nav class="user-menu">
      <ul class="user-menu__list">
        <?php if ($_SESSION['auth'] == true): ?>
        <li class="user-menu__item">
          <a href="cabinet.php">Личный кабинет</a>
        </li>
        <li class="user-menu__item">
          <a href="logout.php">Выход</a>
        </li>
        <?php else: ?>
        <li class="user-menu__item">
          <a href="sign-up.php">Регистрация</a>
        </li>
        <li class="user-menu__item">
          <a href="login.php">Вход</a>
        </li>
        <?php endif; ?>
      </ul>
    </nav>
</div>
</header>
