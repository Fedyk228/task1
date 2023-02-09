-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 09 2023 г., 14:25
-- Версия сервера: 10.1.44-MariaDB
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task1_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `theme` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `title`, `text`, `theme`, `tags`, `level`, `user_id`) VALUES
(1, 'comment 1', 'text1', 'IT', '[\"HTML\",\"CSS\"]', 'Junior', 1),
(2, 'comment 2', 'text2', 'Backend', '[\"PHP\",\"MySQL\"]', 'Middle', 1),
(3, 'comment 3', 'text3', 'Frontend', '[\"HTML\",\"CSS\",\"JS\"]', 'Middle', 3),
(4, 'comment 4', 'text4', 'Frontend', '[\"JS\"]', 'Senior', 3),
(5, 'comment 5', 'text5', 'QA', '[\"JS\",\"PHP\",\"MySQL\"]', 'Senior', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pass`) VALUES
(1, 'Vasya', 'vasya@mail.ru', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Pavel', 'pasha@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(3, 'Irina', 'irina@yandex.ru', '6572bdaff799084b973320f43f09b363');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
