-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 03 2018 г., 22:44
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
  PRIMARY KEY (`pension_request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tour_list`
--

CREATE TABLE IF NOT EXISTS `tour_list` (
  `tour_id` int(255) NOT NULL AUTO_INCREMENT,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci NOT NULL,
  `imgs` blob NOT NULL,
  `phone_number` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(255) NOT NULL,
  `spaces` int(255) NOT NULL,
  PRIMARY KEY (`tour_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
