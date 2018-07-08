-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 08 2018 г., 15:58
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
(2, 'ooooooooooo', 'Kira_Taran', 'Kira_Taran', '2018-07-08 15:55:08', 'no', 99);

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'dddddddddddddddddddddd', 'Ni\'karton_O\'railly', 'none', '2018-05-18 22:10:41', 'no', 'no', 0),
(2, 'eeeeeeeee', 'Kira_Taran', 'none', '2018-05-18 22:11:16', 'no', 'no', 0),
(3, 'dddddddddddddddddd', 'Ni\'karton_O\'railly', 'none', '2018-05-18 22:14:30', 'no', 'no', 0),
(4, 'dddddddddddddddd', 'Ni\'karton_O\'railly', 'none', '2018-05-18 22:15:01', 'no', 'no', 0),
(5, 'ddddddddddddddd', 'Ni\'karton_O\'railly', 'none', '2018-05-18 22:15:33', 'no', 'no', 0),
(6, 'cccccccccccccc', 'Ni\'karton_O\'railly', 'none', '2018-06-15 19:37:59', 'no', 'no', 0),
(7, 'cccccccccc', 'Ni\'karton_O\'railly', 'none', '2018-06-15 19:38:04', 'no', 'no', 0),
(8, 'uuuuuuuuuuuuuuuu', 'Kira_Taran', 'none', '2018-06-15 21:18:48', 'no', 'no', 0),
(9, 'kkkkkkkkkkkkkkkkkk', 'Бобков_Сергей_1', 'none', '2018-06-15 23:09:05', 'no', 'no', 0),
(16, 'ggggggggg', 'Kira_Taran', 'none', '2018-06-22 21:03:19', 'no', 'no', 0),
(17, 'gggggggg', 'Kira_Taran', 'none', '2018-06-22 21:03:26', 'no', 'no', 0),
(20, 'dddddd', 'Бобков_Сергей_1', 'none', '2018-06-22 21:13:05', 'no', 'no', 0),
(21, 'ddddddd', 'Бобков_Сергей_1', 'none', '2018-06-22 21:13:11', 'no', 'no', 0),
(33, 'gggggggggg', 'Kira_Taran', 'none', '2018-06-22 21:29:51', 'no', 'no', 0),
(34, 'ыыыыыыыы', 'Kira_Taran', 'none', '2018-06-22 21:33:34', 'no', 'no', 0),
(35, 'fffff', 'John_Doe', 'none', '2018-06-24 17:27:28', 'no', 'no', 0),
(46, 'dddddd', 'Kira_Taran', 'none', '2018-06-24 18:41:43', 'no', 'no', 0),
(60, 'ыыыыыы', 'Kira_Taran', 'none', '2018-06-24 19:00:38', 'no', 'no', 0),
(68, 'tttttttttttttttttttt', 'Kira_Taran', 'none', '2018-06-24 19:22:11', 'no', 'no', 0),
(74, 'llllllllllll', 'Kira_Taran', 'none', '2018-06-24 19:24:54', 'no', 'no', 0),
(75, 'llllllllllll', 'Kira_Taran', 'none', '2018-06-24 19:27:26', 'no', 'no', 0),
(76, 'ccccccccccccccccccc', 'Kira_Taran', 'none', '2018-06-24 19:27:38', 'no', 'no', 0),
(80, 'dddddddddd', 'Ni\'karton_O\'railly', 'none', '2018-06-24 19:35:36', 'no', 'no', 0),
(81, 'dddddddddd', 'Ni\'karton_O\'railly', 'none', '2018-06-24 19:36:47', 'no', 'no', 0),
(90, 'gggggggg', 'Ni\'karton_O\'railly', 'none', '2018-06-24 20:05:00', 'no', 'no', 0),
(91, 'ggggggggggg', 'Kira_Taran', 'none', '2018-06-24 20:07:55', 'no', 'no', 0),
(93, 'njj', 'Ni\'karton_O\'railly', 'none', '2018-06-24 20:11:02', 'no', 'no', 0),
(96, 'dddddddddd', 'Ni\'karton_O\'railly', 'none', '2018-06-24 20:16:26', 'no', 'no', 0),
(97, 'ddddddd', 'Ni\'karton_O\'railly', 'none', '2018-06-24 20:16:47', 'no', 'no', 0),
(98, 'ffffffffff', 'Ni\'karton_O\'railly', 'none', '2018-06-24 20:19:20', 'no', 'no', 0),
(99, 'eeeeeeeeeeee', 'Kira_Taran', 'none', '2018-06-24 20:29:57', 'no', 'no', 0),
(100, 'ccc', 'b\'obkov_s\'ergey', 'none', '2018-06-25 10:10:24', 'no', 'no', 0),
(101, 'hhhhhhhhhhhhhh', 'b\'obkov_s\'ergey', 'none', '2018-07-06 09:56:10', 'no', 'no', 0),
(102, 'sdeeeeee', 'Ni\'karton_O\'railly', 'none', '2018-07-08 12:53:14', 'no', 'no', 0),
(103, 'ыыыыыыыыыыыыыыыы', 'mickey_mouse', 'none', '2018-07-08 12:55:41', 'no', 'no', 0),
(104, 'вася', 'mickey_mouse', 'none', '2018-07-08 12:55:49', 'no', 'no', 0),
(105, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut dignissim nisl, quis fermentum massa. Nulla venenatis neque vitae enim tristique varius. Nam vel tellus lorem. Sed purus massa, consequat aliquam justo vitae, tempor accumsan lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sit amet dapibus leo, sed blandit sapien. Ut luctus arcu eu vestibulum ornare.', 'Сергей_Бобков', 'none', '2018-07-08 13:06:52', 'no', 'no', 0),
(106, 'eeeeeee', 'Bobkov_Sergey', 'none', '2018-07-08 13:59:23', 'no', 'no', 0);

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
(4, 'Kira', 'Taran', 'Kira_Taran', 'taran.kira@rambler.ru', 'e10adc3949ba59abbe56e057f20f883e', '2018-04-17', 'assets/images/profile_pics/defaults/head_emerald.png', 10, 0, 'no', ',Сергей_Бобков,mickey_mouse,Ni\'karton_O\'railly,'),
(5, 'mickey', 'mouse', 'mickey_mouse', 'mickey@mail.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-04-17', 'assets/images/profile_pics/defaults/head_deep_blue.png', 2, 0, 'no', ',Kira_Taran,'),
(9, 'Ni\'karton', 'O\'railly', 'Ni\'karton_O\'railly', 'sergey_bobkov11@inbox.ru', 'e10adc3949ba59abbe56e057f20f883e', '2018-04-26', 'assets/images/profile_pics/defaults/head_emerald.png', 8, 0, 'no', ',Kira_Taran,'),
(19, 'Сергей', 'Бобков', 'Сергей_Бобков', 'sergey_bobkov@inbox.ru', 'e98154b6878043f5175ff12874410c73', '2018-07-08', 'assets/images/profile_pics/defaults/head_emerald.png', 1, 0, 'no', ',Kira_Taran,'),
(20, 'Bobkov', 'Sergey', 'Bobkov_Sergey', 'pktitanseo@yandex.ru', 'e10adc3949ba59abbe56e057f20f883e', '2018-07-08', 'assets/images/profile_pics/defaults/head_deep_blue.png', 1, 0, 'no', ',');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
