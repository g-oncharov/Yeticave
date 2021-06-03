<?php
$mysql = mysqli_connect('localhost', 'root', 'root', 'yeticave');
if ($mysql == false) {
  echo "База данных не подключенна";
  exit();
}
