-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 11 2018 г., 08:57
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `tourbase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pension_request`
--

CREATE TABLE IF NOT EXISTS `pension_request` (
  `pension_request_id` int(255) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` int(10) NOT NULL,
  `price` int(255) NOT NULL,
  `max_space` int(255) NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `request_date` text COLLATE utf8_unicode_ci NOT NULL,
  `imgs` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `accept` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pension_request_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `pension_request`
--

INSERT INTO `pension_request` (`pension_request_id`, `title`, `tags`, `phone_number`, `price`, `max_space`, `email`, `request_date`, `imgs`, `address`, `accept`) VALUES
(1, 'Tittled', '', 2147483647, 125, 554, 'почта', '2018-12-04 01:19:40', 'https://cdn.discordapp.com/attachments/509761567529631754/519257944878219274/picfgfgghgdgd01.png', 'Addresssd', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tour_list`
--

CREATE TABLE IF NOT EXISTS `tour_list` (
  `tour_id` int(255) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci NOT NULL,
  `imgs` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(255) NOT NULL,
  `spaces` int(255) NOT NULL,
  PRIMARY KEY (`tour_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `tour_list`
--

INSERT INTO `tour_list` (`tour_id`, `title`, `email`, `address`, `tags`, `imgs`, `phone_number`, `price`, `spaces`) VALUES
(1, 'uyfshsdffsd', 'sadasdas@botmail.com', 'aaawd asd sa', 'sadasddd', 'null', '232131', 2333, 22),
(2, 'the111', 'pensionat16@botmail.com', 'Pushkin street 45', 'sadas', 'null', '5798216637', 2542, 65),
(3, 'the13', 'pensionat16@botmail.com', 'Pushkin street 45', 'sadas', 'null', '5798216637', 2542, 65),
(4, 'the111', 'pensionat16@botmail.com', 'Pushkin street 45', 'sadas', 'null', '5798216637', 2542, 65),
(5, 'the111', 'pensionat16@botmail.com', 'Pushkin street 45', 'sadas', 'null', '5798216637', 2542, 65),
(6, 'the111', 'pensionat16@botmail.com', 'Pushkin street 45', 'sadas', 'null', '5798216637', 2542, 65),
(7, 'the111', 'pensionat16@botmail.com', 'Pushkin street 45', 'sadas', 'null', '5798216637', 2542, 65),
(8, 'the111', 'pensionat16@botmail.com', 'Pushkin street 45', 'sadas', 'null', '5798216637', 2542, 65),
(9, 'the111', 'pensionat16@botmail.com', 'Pushkin street 45', 'sadas', 'null', '5798216637', 2542, 65),
(10, 'the111', 'pensionat16@botmail.com', 'Pushkin street 45', 'sadas', 'null', '5798216637', 2542, 65),
(11, 'the111', 'pensionat16@botmail.com', 'Pushkin street 45', 'sadas', 'null', '5798216637', 2542, 65);

-- --------------------------------------------------------

--
-- Структура таблицы `tour_request`
--

CREATE TABLE IF NOT EXISTS `tour_request` (
  `tour_request_id` int(255) NOT NULL AUTO_INCREMENT,
  `tour_id` int(255) NOT NULL,
  `spaces` int(255) NOT NULL,
  `days` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `result` int(1) NOT NULL,
  `request_date` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`tour_request_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `tour_request`
--

INSERT INTO `tour_request` (`tour_request_id`, `tour_id`, `spaces`, `days`, `user_id`, `result`, `request_date`) VALUES
(1, 4, 5, 10, 2, 0, '2018-12-04 00:19:43');

-- --------------------------------------------------------

--
-- Структура таблицы `user_list`
--

CREATE TABLE IF NOT EXISTS `user_list` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_name` text COLLATE utf8_unicode_ci NOT NULL,
  `user_surname` text COLLATE utf8_unicode_ci NOT NULL,
  `nickname` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `mobilephone_number` int(10) NOT NULL,
  `acsses` int(1) NOT NULL DEFAULT '0',
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `register_date` text COLLATE utf8_unicode_ci NOT NULL,
  `last_login` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `user_list`
--

INSERT INTO `user_list` (`user_id`, `user_name`, `user_surname`, `nickname`, `password`, `mobilephone_number`, `acsses`, `email`, `register_date`, `last_login`) VALUES
(1, 'Админушка', 'Админский', 'fulldroper', 'RVF/255mcC2vHXJ5QeN4mtl1wqVBk70APl633TuPuA8=', 2147483647, 1, 'full_droper@protonmail.com', '2018-12-03 04:20:04', '2018-12-09 23:49:23'),
(2, 'Pavel', 'Pavel', 'corvin8', '88JRd+ggsWO5t4OzBMjvSfOaNenj0CQYaI6gRm8Boc4=', 962557151, 1, 'pahkhan89@gmail.com', '2018-12-03 22:12:27', '2018-12-10 00:20:51');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
