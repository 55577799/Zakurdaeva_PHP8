-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 09 2020 г., 22:31
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gbphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `info` text NOT NULL,
  `img` varchar(40) NOT NULL,
  `price` varchar(7) NOT NULL,
  `count` int(11) unsigned NOT NULL default 1,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`name`, `info`, `img`, `price`, `count`) VALUES
('Товар1', 'Информация1', 'good1.jpg', '100', 10),
('Товар2', 'Информация2', 'good2.jpg', '200', 20),
('Товар3', 'Информация3', 'good3.jpg', '300', 30),
('Товар4', 'Информация4', 'good4.jpg', '400', 40),
('Товар5', 'Информация5', 'good5.jpg', '500', 50);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fio` varchar(150) NOT NULL DEFAULT 'N/O',
  `login` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL COMMENT 'Дата рождения',
  `is_admin` tinyint unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`fio`, `login`, `password`, `date`, `is_admin`) VALUES
('Иванов Иван Иванович', 'admin', '$2y$10$P71Zkb5Nkw/dU1KI3ESlHORGC0BnOYgHmzC1.yL0ao31QYqcST5mi', '1999-01-24', 1),
('Сидеров Сидор Сидорович', 'user1', '$2y$10$P71Zkb5Nkw/dU1KI3ESlHORGC0BnOYgHmzC1.yL0ao31QYqcST5mi', '1980-04-04', 0),
('Петров Петр Петрович', 'user2', '$2y$10$P71Zkb5Nkw/dU1KI3ESlHORGC0BnOYgHmzC1.yL0ao31QYqcST5mi', '1989-12-17', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `price` varchar(7) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `orders` (`user_id`, `price`, `date`) VALUES
(1, '1000', '2020-01-24'),
(1, '500', '2020-03-12'),
(3, '600', '2020-04-02'),
(3, '400', '2020-02-11');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `order_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `good_id` int(11) NOT NULL,
  `count` int(11) unsigned NOT NULL default 1,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `order_goods` (`order_id`, `good_id`, `count`) VALUES
(1, 1, 3),
(1, 2, 1),
(2, 2, 1),
(2, 3, 2),
(3, 1, 2),
(4, 4, 4);


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
