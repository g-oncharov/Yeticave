SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Доски и лыжи'),
(2, 'Крепления'),
(3, 'Ботинки'),
(4, 'Одежда'),
(5, 'Инструменты'),
(6, 'Разное');

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `price` int(100) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `items` (`id`, `category_id`, `name`, `description`, `price`, `url`, `user_id`) VALUES
(1, 1, '2014 Rossignol District Snowboard', 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив           снег           мощным щелчком и четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот           снаряд           отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом           кэмбер           позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,           просто           посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла           равнодушным.', 10999, 'img/lot-1.jpg', 4),
(2, 1, 'DC Ply Mens 2016/2017 Snowboard', 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив           снег           мощным щелчком и четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот           снаряд           отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом           кэмбер           позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,           просто           посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла           равнодушным.', 159999, 'img/lot-2.jpg', 4),
(3, 2, 'Крепление Union Contact Pro 2015 года размер L/XL', 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив           снег           мощным щелчком и четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот           снаряд           отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом           кэмбер           позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,           просто           посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла           равнодушным.', 8000, 'img/lot-3.jpg', 4),
(4, 3, 'Ботинки для сноуборда DC Muntiny Charocal', 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив           снег           мощным щелчком и четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот           снаряд           отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом           кэмбер           позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,           просто           посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла           равнодушным.', 10999, 'img/lot-4.jpg', 4),
(5, 4, 'Куртка для сноуборда DC Muntiny Charocal', 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив           снег           мощным щелчком и четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот           снаряд           отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом           кэмбер           позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,           просто           посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла           равнодушным.', 7500, 'img/lot-5.jpg', 4),
(6, 6, 'Маска Oakley Canopy', 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив           снег           мощным щелчком и четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот           снаряд           отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом           кэмбер           позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,           просто           посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла           равнодушным.', 5400, 'img/lot-6.jpg', 3),
(7, 1, 'Сноуборд Firefly Furious', 'Страна происхождения бренда: Австрия; Жесткость борда: 8; Форма: твин-тип (симметричный); Тип прогиба: классический (camber); Радиус бокового выреза: 6.5; Ростовка: 144; прогрессирующий; Уровень катания: новичок; Назначение: унисекс; Стиль катания: универсальный (all mountain)', 13999, 'img/pirate_blue_base-Kopie-1000x1000.png', 4),
(16, 5, 'Инструмент для нанесения воска на лыжи и сноуборд', 'Инструмент для нанесения воска на лыжи и сноуборд, наполовину нейлоновая и наполовину латунная щетка, инструмент для нанесения лака', 2000, 'img/изображение_2021-05-15_141537.png', 4);

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first-name` varchar(100) NOT NULL,
  `last-name` text NOT NULL,
  `img` varchar(255) DEFAULT 'img/user.png',
  `pass` varchar(60) NOT NULL,
  `status` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `userdata` (`id`, `email`, `first-name`, `last-name`, `img`, `pass`, `status`) VALUES
(1, 'ignat.v@gmail.com', 'Игнат', 'Петров', 'img/user.png', '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka', 0),
(2, 'kitty_93@li.ru', 'Катя', 'Иванова', 'img/user.png', '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa', 0),
(3, 'warrior07@mail.ru', 'Иван', 'Петров', 'img/user.png', '$2y$10$qMootW1TM4ZZmjbKe23p2OQZMywbE778UTBczKOpE0nGcoWvF/WxK', 0),
(4, 'admin@gmail.com', 'Влад', 'Ріпний', 'img/user.png', '$2y$10$7okAsOKNyxofcfCelxcsk.rWPsddWOcJH0ZkphAV4d815fFqYMvei', 10),
(5, 'asdasd96@mail.ua', 'Leon', 'Kennedy', 'img/user.png', '$2y$10$JJPrNVSgMGUIwsIxvc7OtevECYzE.GrXEF70VhPYK7FWMYv0yIzpG', 0),
(6, 'adsdas@gmail.com', 'Адольф', 'Гитлер', 'img/user.png', '$2y$10$EHkYVejvumetTelh/iNJD.d.VM0FBnwG1MpWgjcz1mt/i8uVSK.B6', 0),
(13, '80ka96@gmail.com', 'Alexey', 'Alexey', 'img/test-pravilno-li-vy-begaete_1560585055500577876.jpg', '$2y$10$nQosDbu8e0GwPh9cUosl.ujHI6y4G1pL.Ngjs2kecQto8QqaU6pQm', 0);

ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userdata` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
