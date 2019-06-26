-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 24 2019 г., 20:50
-- Версия сервера: 5.6.43
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `message`, `date`, `id_image`) VALUES
(2, 'Алекс', 'Привет!', '2019-06-24 17:13:40', 15),
(3, 'Влад', 'Что нового?', '2019-06-24 17:34:10', 15),
(4, 'Алиса', 'Круто!', '2019-06-24 17:34:58', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `images_list`
--

CREATE TABLE `images_list` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images_list`
--

INSERT INTO `images_list` (`id`, `name`, `width`, `height`, `rating`) VALUES
(1, '01.jpg', 150, 100, 0),
(3, '03.jpg', 150, 100, 17),
(4, '04.jpg', 150, 100, 0),
(5, '05.jpg', 150, 100, 0),
(6, '06.jpg', 150, 100, 0),
(7, '07.jpg', 150, 100, 1),
(8, '08.jpg', 150, 100, 3),
(9, '09.jpg', 150, 100, 1),
(10, '10.jpg', 150, 100, 0),
(11, '11.jpg', 150, 100, 1),
(12, '12.jpg', 150, 100, 2),
(13, '13.jpg', 150, 100, 7),
(14, '14.jpg', 150, 100, 1),
(15, '15.jpg', 150, 100, 77),
(22, '02.jpg', 150, 100, 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images_list`
--
ALTER TABLE `images_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `images_list`
--
ALTER TABLE `images_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
