<?php
require('./data/db.php');
$result = mysqli_query($mysql, "SELECT `category` FROM `categories`"); 
$i = 1;
?>
<nav class="nav">
    <ul class="nav__list container">
      <?php while (($cat = mysqli_fetch_assoc($result))): ?>
        <li class="nav__item">
            <a href="categories.php?id=<?= $i++ ?>"><?= $cat['category']?></a>
        </li>
      <?php endwhile; ?>
    </ul>
</nav>
<?php mysqli_close($mysql); ?>
