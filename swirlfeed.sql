-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 25 2018 г., 00:11
-- Версия сервера: 5.7.16
-- Версия PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `swirlfeed`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `singup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `singup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(1, 'Сергей', 'Бобков', 'bobkov_sergey', 'sergey_bobkov@inbox.ru', '1987bob1954', '2018-04-12', 'dddd', 1, 1, 'no', ''),
(4, 'Kira', 'Taran', 'Kira_Taran', 'taran.kira@rambler.ru', 'e10adc3949ba59abbe56e057f20f883e', '2018-04-17', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ','),
(5, 'mickey', 'mouse', 'mickey_mouse', 'mickey@mail.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-04-17', 'assets/images/profile_pics/defaults/head_deep_blue.png', 0, 0, 'no', ','),
(6, 'guf', 'guf', 'guf_guf', 'guf@mail.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-04-17', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ','),
(7, 'Бобков', 'Сергей', 'Бобков_Сергей', 'sergey_bobkov2@inbox.ru', 'e10adc3949ba59abbe56e057f20f883e', '2018-04-17', 'assets/images/profile_pics/defaults/head_emerald.png', 0, 0, 'no', ',');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
