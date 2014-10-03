-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 03 2014 г., 11:38
-- Версия сервера: 5.5.37-cll
-- Версия PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `sakhweb_lib`
--

-- --------------------------------------------------------

--
-- Структура таблицы `sss_author`
--

CREATE TABLE IF NOT EXISTS `sss_author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `date_insert` datetime DEFAULT NULL,
  `date_upfate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `sss_author`
--

INSERT INTO `sss_author` (`id`, `name`, `date_insert`, `date_upfate`) VALUES
(1, 'Adword Yii', NULL, NULL),
(2, 'Sent Yii', NULL, NULL),
(3, 'Sent Yii', NULL, NULL),
(4, 'Den Yii', NULL, NULL),
(5, 'Some NoYii', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `sss_book`
--

CREATE TABLE IF NOT EXISTS `sss_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `date_insert` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `readers_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sss_book_sss_readers1_idx` (`readers_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `sss_book`
--

INSERT INTO `sss_book` (`id`, `name`, `date_insert`, `date_update`, `readers_id`) VALUES
(4, 'My first book', '2014-10-02 18:31:48', '2014-10-02 18:39:37', 2),
(6, 'My second Book', '2014-10-02 18:35:17', '2014-10-02 19:10:09', 3),
(7, 'Tom Soyer', '2014-10-02 19:11:14', '2014-10-02 19:11:14', NULL),
(8, 'Tom Soyer', '2014-10-02 19:11:17', '2014-10-02 19:11:17', 2),
(9, 'Tom Soyer', '2014-10-02 19:11:18', '2014-10-02 19:11:18', 1),
(10, 'Tom Soyer', '2014-10-02 19:11:19', '2014-10-02 19:11:19', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `sss_book_auth_lib`
--

CREATE TABLE IF NOT EXISTS `sss_book_auth_lib` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`book_id`,`author_id`),
  KEY `fk_sss_book_has_sss_author_sss_author1_idx` (`author_id`),
  KEY `fk_sss_book_has_sss_author_sss_book1_idx` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `sss_book_auth_lib`
--

INSERT INTO `sss_book_auth_lib` (`book_id`, `author_id`) VALUES
(4, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(4, 3),
(4, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `sss_readers`
--

CREATE TABLE IF NOT EXISTS `sss_readers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `date_insert` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `sss_readers`
--

INSERT INTO `sss_readers` (`id`, `name`, `date_insert`, `date_update`) VALUES
(1, 'New Readers 1', NULL, NULL),
(2, 'Redaers 2', NULL, NULL),
(3, 'Readers 3', NULL, NULL);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `sss_book`
--
ALTER TABLE `sss_book`
  ADD CONSTRAINT `fk_sss_book_sss_readers1` FOREIGN KEY (`readers_id`) REFERENCES `sss_readers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `sss_book_auth_lib`
--
ALTER TABLE `sss_book_auth_lib`
  ADD CONSTRAINT `fk_sss_book_has_sss_author_sss_book1` FOREIGN KEY (`book_id`) REFERENCES `sss_book` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sss_book_has_sss_author_sss_author1` FOREIGN KEY (`author_id`) REFERENCES `sss_author` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
