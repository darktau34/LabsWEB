-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 02 2022 г., 12:13
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pizza_delivery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Хит'),
(2, 'Мясная'),
(3, 'Больше сыра'),
(4, 'Острое'),
(5, 'Без мяса');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `img_path` varchar(45) NOT NULL DEFAULT 'no_img.png',
  `name` varchar(45) NOT NULL,
  `id_category` int(10) UNSIGNED NOT NULL,
  `recipe` varchar(255) DEFAULT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `img_path`, `name`, `id_category`, `recipe`, `cost`) VALUES
(1, 'carbonara.jpg', 'Карбонара', 1, 'Бекон, сыры чеддер и пармезан, моцарелла, томаты, красный лук, чеснок, фирменный соус альфредо, итальянские травы', 429),
(2, 'pesto_pizza.jpg', 'Песто', 1, 'Цыпленок, соус песто, кубики брынзы, томаты, моцарелла, фирменный соус альфредо', 429),
(3, 'chicken_rancho.jpg', 'Цыпленок ранчо', 2, 'Цыпленок, ветчина, соус ранч, моцарелла, томаты, чеснок', 429),
(4, 'double_pepperoni.jpg', 'Двойная пепперони', 2, 'Двойная порция пикантной пепперони, увеличенная порция моцареллы, фирменный томатный соус', 429),
(5, 'homelike.jpg', 'Домашняя', 2, 'Пикантная пепперони, ветчина, маринованные огурчики, томаты, моцарелла, фирменный томатный соус', 399),
(6, 'meat_mix.jpg', 'Мясной микс', 2, 'Пастрами из индейки, острая чоризо, пикантная пепперони, бекон, моцарелла, фирменный томатный соус', 429),
(7, 'meat_pizza.jpg', 'Мясная', 2, 'Цыпленок, ветчина, пикантная пепперони, острая чоризо, моцарелла, фирменный томатный соус', 429),
(8, 'pepperoni.jpg', 'Пепперони', 2, 'Пикантная пепперони, увеличенная порция моцареллы, фирменный томатный соус', 399),
(9, 'pepperoni_frash.jpg', 'Пепперони фреш', 2, 'Пикантная пепперони, увеличенная порция моцареллы, томаты, фирменный томатный соус', 289),
(10, 'chees.jpg', 'Сырная', 3, 'Моцарелла, сыры чеддер и пармезан, фирменный соус альфредо', 289),
(11, 'chicken_cheese.jpg', 'Сырный цыпленок', 3, 'Цыпленок, моцарелла, сыры чеддер и пармезан, сырный соус, томаты, фирменный соус альфредо, чеснок', 429),
(12, 'four_cheese.jpg', 'Четыре сыра', 3, 'Сыр блю чиз, смесь сыров чеддер и пармезан, моцарелла, фирменный соус альфредо', 429),
(13, 'four_seasons.jpg', 'Четыре сезона', 3, 'Увеличенная порция моцареллы, ветчина, пикантная пепперони, кубики брынзы, томаты, шампиньоны, итальянские травы, фирменный томатный соус', 399),
(14, 'hawaii_pizza.jpg', 'Гавайская', 3, 'Ветчина, ананасы, моцарелла, фирменный томатный соус', 399),
(15, 'vetchina_chees.jpg', 'Ветчина и сыр', 3, 'Ветчина, моцарелла, фирменный соус альфредо', 309),
(16, 'vetchina_mushrooms.jpg', 'Ветчина и грибы', 3, 'Ветчина, шампиньоны, увеличенная порция моцареллы, фирменный томатный соус', 349),
(17, 'choriso_frash.jpg', 'Чоризо фреш', 4, 'Фирменный томатный соус, моцарелла, острая чоризо, сладкий перец', 289),
(18, 'diablo.jpg', 'Диабло', 4, 'Острая чоризо, острый перец халапеньо, соус барбекю, митболы, томаты, сладкий перец, красный лук, моцарелла, фирменный томатный соус', 429),
(19, 'cheeseburger_pizza.jpg', 'Чизбургер пицца', 5, 'Соус бургер, маринованные огурчики, томаты, красный лук, моцарелла', 399),
(20, 'vegetables_grill.jpg', 'Овощи гриль', 5, 'Овощи гриль, томаты, красный лук, моцарелла, соус песто, фирменный томатный соус, чеснок', 429);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `date_birthday` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `sex` int(5) DEFAULT NULL,
  `interests` varchar(255) DEFAULT NULL,
  `blood_type` int(5) DEFAULT NULL,
  `factor` varchar(25) DEFAULT NULL,
  `vk` varchar(125) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `date_birthday`, `address`, `sex`, `interests`, `blood_type`, `factor`, `vk`, `password`, `salt`) VALUES
(7, 'nesterov.slavok@gmail.com', '2002-10-25', 'Мой адрес', 1, 'Люблю сидеть, спать, сидеть', 1, 'plus', 'https://vk.com/darktau34', '7a0110a4c4925a0d1a24a13586c41688', 'B\"u=CAEr'),
(8, 'nesterov_kotelnikovo@mail.ru', '2002-10-25', '', 1, '', 4, 'minus', '', 'acabcfdbace0bfd4b650c984a72112bf', 'PF`j<K}'),
(10, 'example@example.com', '0000-00-00', '', 1, '', 1, 'plus', '', '38d339fc649e81df463160a65c4a96aa', '2][w6w+i'),
(12, 'ivtb-201_137194@volsu.ru', '0000-00-00', '', 1, '', 1, 'plus', '', '7555296a881b505ec6494633bb05ddd4', 'Pp<xP\'='),
(13, 'mail@mail.ru', '2002-10-25', 'Мой адрес', 1, 'Мои интересы', 1, 'plus', 'https://vk.com/darktau34', '421f1b58bb42ebfb2106b7f700739f5b', '?eP{wpUr');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_1` (`name`),
  ADD KEY `foreign_key_1` (`id_category`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `foreign_key_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
