-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 19 2018 г., 15:00
-- Версия сервера: 5.7.20
-- Версия PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `post_body`, `posted_by`, `posted_to`, `date_added`, `removed`, `post_id`) VALUES
(1, 'dddddddddddddddd', 'Kira_Taran', 'mickey_mouse', '2018-07-08 15:51:48', 'no', 104),
(2, 'ooooooooooo', 'Kira_Taran', 'Kira_Taran', '2018-07-08 15:55:08', 'no', 99),
(8, 'wwwwwwww', 'Kira_Taran', 'mickey_mouse', '2018-07-21 13:11:15', 'no', 104),
(9, 'wwwwwwwwwwww', 'Kira_Taran', 'mickey_mouse', '2018-07-21 13:11:32', 'no', 103),
(26, 'dddddddddddddd', 'Sergey_Bobkov', 'Sergey_Bobkov', '2018-07-22 21:44:04', 'no', 107),
(27, 'ddddddddddddddddd', 'Kira_Taran', 'Sergey_Bobkov', '2018-07-22 21:48:25', 'no', 107),
(28, 'dddddd', 'Kira_Taran', 'Sergey_Bobkov', '2018-08-04 10:55:55', 'no', 107),
(29, 'ddddd', 'Kira_Taran', 'Kira_Taran', '2018-08-04 10:56:14', 'no', 108);

-- --------------------------------------------------------

--
-- Структура таблицы `friend_request`
--

CREATE TABLE `friend_request` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `friend_request`
--

INSERT INTO `friend_request` (`id`, `user_to`, `user_from`) VALUES
(2, 'mickey_mouse', 'Kira_Taran');

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id`, `username`, `post_id`) VALUES
(4, 'Sergey_Bobkov', 107),
(5, 'Sergey_Bobkov', 99),
(6, 'Sergey_Bobkov', 109),
(7, 'Sergey_Bobkov', 108),
(8, 'Kira_Taran', 114),
(9, 'Sergey_Bobkov', 114);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`) VALUES
(2, 'eeeeeeeee', 'Kira_Taran', 'none', '2018-05-18 22:11:16', 'no', 'no', 0),
(8, 'uuuuuuuuuuuuuuuu', 'Kira_Taran', 'none', '2018-06-15 21:18:48', 'no', 'no', 0),
(16, 'ggggggggg', 'Kira_Taran', 'none', '2018-06-22 21:03:19', 'no', 'no', 0),
(17, 'gggggggg', 'Kira_Taran', 'none', '2018-06-22 21:03:26', 'no', 'no', 0),
(33, 'gggggggggg', 'Kira_Taran', 'none', '2018-06-22 21:29:51', 'no', 'no', 0),
(34, 'ыыыыыыыы', 'Kira_Taran', 'none', '2018-06-22 21:33:34', 'no', 'no', 0),
(46, 'dddddd', 'Kira_Taran', 'none', '2018-06-24 18:41:43', 'no', 'no', 0),
(60, 'ыыыыыы', 'Kira_Taran', 'none', '2018-06-24 19:00:38', 'no', 'no', 0),
(68, 'tttttttttttttttttttt', 'Kira_Taran', 'none', '2018-06-24 19:22:11', 'no', 'no', 0),
(74, 'llllllllllll', 'Kira_Taran', 'none', '2018-06-24 19:24:54', 'no', 'no', 0),
(75, 'llllllllllll', 'Kira_Taran', 'none', '2018-06-24 19:27:26', 'no', 'no', 0),
(76, 'ccccccccccccccccccc', 'Kira_Taran', 'none', '2018-06-24 19:27:38', 'no', 'no', 0),
(91, 'ggggggggggg', 'Kira_Taran', 'none', '2018-06-24 20:07:55', 'no', 'no', 0),
(99, 'eeeeeeeeeeee', 'Kira_Taran', 'none', '2018-06-24 20:29:57', 'no', 'no', 2),
(103, 'ыыыыыыыыыыыыыыыы', 'mickey_mouse', 'none', '2018-07-08 12:55:41', 'no', 'no', 1),
(104, 'вася', 'mickey_mouse', 'none', '2018-07-08 12:55:49', 'no', 'no', 0),
(107, 'Всем привет', 'Sergey_Bobkov', 'none', '2018-07-22 20:52:01', 'no', 'no', 1),
(108, 'ааааааааааааа', 'Kira_Taran', 'none', '2018-07-22 22:06:51', 'no', 'no', 1),
(109, 'Что то', 'Kira_Taran', 'none', '2018-09-07 15:27:40', 'no', 'no', 1),
(110, 'some', 'Kira_Taran', 'none', '2018-10-19 12:39:07', 'no', 'no', 0),
(111, 'some', 'Kira_Taran', 'none', '2018-10-19 12:39:23', 'no', 'no', 0),
(112, 'some', 'Kira_Taran', 'none', '2018-10-19 12:39:32', 'no', 'no', 0),
(113, 'some', 'Kira_Taran', 'none', '2018-10-19 12:39:40', 'no', 'no', 0),
(114, 'some one', 'Kira_Taran', 'none', '2018-10-19 12:40:27', 'no', 'no', 2);

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
(4, 'Kira', 'Taran', 'Kira_Taran', 'taran.kira@rambler.ru', 'e10adc3949ba59abbe56e057f20f883e', '2018-04-17', 'assets/images/profile_pics/defaults/head_emerald.png', 17, 6, 'no', ',Sergey_Bobkov,'),
(5, 'mickey', 'mouse', 'mickey_mouse', 'mickey@mail.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-04-17', 'assets/images/profile_pics/defaults/head_deep_blue.png', 2, 1, 'no', ','),
(21, 'Sergey', 'Bobkov', 'Sergey_Bobkov', 'sergey_bobkov@inbox.ru', 'e98154b6878043f5175ff12874410c73', '2018-07-22', 'assets/images/profile_pics/defaults/head_deep_blue.png', 1, 1, 'no', ',Kira_Taran,');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
