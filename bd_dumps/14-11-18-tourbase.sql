-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 14 2018 г., 03:23
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
  PRIMARY KEY (`pension_request_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `pension_request`
--

INSERT INTO `pension_request` (`pension_request_id`, `title`, `tags`, `phone_number`, `price`, `max_space`, `email`, `request_date`, `imgs`) VALUES
(1, 'Sample text', '', 2147483647, 4125, 93, 'pensionat0@botmail.com', '2018-11-14 02:43:09', 'null'),
(2, 'Sample text', '', 2147483647, 5540, 11, 'pensionat10@botmail.com', '2018-11-14 02:43:09', 'null'),
(3, 'Sample text', '', 2147483647, 6045, 14, 'pensionat24@botmail.com', '2018-11-14 02:43:09', 'null'),
(4, 'Sample text', '', 2147483647, 7996, 48, 'pensionat8@botmail.com', '2018-11-14 02:43:09', 'null'),
(5, 'Sample text', '', 255611426, 8592, 31, 'pensionat10@botmail.com', '2018-11-14 02:43:09', 'null');

-- --------------------------------------------------------

--
-- Структура таблицы `tour_list`
--

CREATE TABLE IF NOT EXISTS `tour_list` (
  `tour_id` int(255) NOT NULL AUTO_INCREMENT,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci NOT NULL,
  `imgs` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(255) NOT NULL,
  `spaces` int(255) NOT NULL,
  PRIMARY KEY (`tour_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `tour_list`
--

INSERT INTO `tour_list` (`tour_id`, `address`, `tags`, `imgs`, `phone_number`, `price`, `spaces`) VALUES
(1, 'Pushkin street 14', '', 'null', '4109029985', 8097, 67),
(2, 'Pushkin street 49', '', 'null', '4371063769', 5500, 30);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `tour_request`
--

INSERT INTO `tour_request` (`tour_request_id`, `tour_id`, `spaces`, `days`, `user_id`, `result`, `request_date`) VALUES
(1, 1, 1, 5, 3, 0, '2018-11-14 02:26:49'),
(2, 3, 1, 4, 6, 0, '2018-11-14 02:26:49'),
(3, 2, 1, 13, 2, 0, '2018-11-14 02:26:49'),
(4, 4, 1, 6, 6, 0, '2018-11-14 02:26:49'),
(5, 5, 1, 30, 5, 1, '2018-11-14 02:26:49'),
(6, 1, 1, 23, 6, 0, '2018-11-14 02:42:24'),
(7, 1, 1, 24, 6, 0, '2018-11-14 02:42:25'),
(8, 1, 1, 18, 3, 0, '2018-11-14 02:42:25'),
(9, 1, 1, 26, 2, 1, '2018-11-14 02:42:25'),
(10, 1, 1, 26, 3, 0, '2018-11-14 02:42:25'),
(11, 1, 2, 43, 6, 0, '2018-11-14 03:17:59'),
(12, 1, 2, 43, 6, 1, '2018-11-14 03:18:10');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `user_list`
--

INSERT INTO `user_list` (`user_id`, `user_name`, `user_surname`, `nickname`, `password`, `mobilephone_number`, `acsses`, `email`, `register_date`, `last_login`) VALUES
(1, 'bot17', 'motherborders', 'boter_motherborders1', 'FylvGt6Yyb6n+zTXcJHwjBawOY/w3QSZxF7rdUJLqhA=', 2147483647, 0, 'boter_motherborders1@botmail.com', '2018-11-14 02:07:57', '2018-11-14 02:07:57'),
(2, 'bot20', 'motherborders', 'boter_motherborders2', 'zXawqeFwv8nEdbL1AgY4bhrJ3THUFw+kN9yw2CW6dBnVzRKVXpIymwQ7BHJ3+TPt57HFmV3vEk75SHbfFxFh5A==', 2147483647, 2, 'boter_motherborders2@botmail.com', '2018-11-14 02:07:58', '2018-11-14 02:07:58'),
(3, 'bot33', 'motherborders', 'boter_motherborders3', 'yvWadeFU/6UuS3H9Y8MKXCy/y5XGCYowOS6+LaGcqSfXUi0jb7cebDmbXYoC2pkiOAiFRq5mjsxzgqlnhc/MGQ==', 744690760, 2, 'boter_motherborders3@botmail.com', '2018-11-14 02:07:58', '2018-11-14 02:07:58'),
(4, 'bot45', 'motherborders', 'boter_motherborders4', 'X4QSwWFudpL7i/YuPEpvuwJYUE/E94xjhA2v7ybRco+V9PdMIwsu+2ZZI1zwYopMirOM9VVvETpip0gFkxkf0A==', 2147483647, 2, 'boter_motherborders4@botmail.com', '2018-11-14 02:07:58', '2018-11-14 02:07:58'),
(5, 'bot54', 'motherborders', 'boter_motherborders5', 'p18TotDQJd4/G8F3GjG77Pfl9b3d6uDEf3jyrpDsRW2dYXjCE2KMiL3ykK+4S5V8NKXAQHne71xXGeDOzVHMxA==', 2147483647, 0, 'boter_motherborders5@botmail.com', '2018-11-14 02:07:58', '2018-11-14 02:07:58'),
(6, 'Jony', 'Xaire', 'fulldroper', 'O7xKYN9FfywCu/zVRu43/uNCoM/+D0kSfm9c2gJRjTY=', 2147483647, 1, 'post@me.cc', '2018-11-14 02:08:37', '2018-11-14 03:18:20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
