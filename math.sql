-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 192.168.1.119:3306
-- Время создания: Фев 08 2025 г., 20:42
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `math`
--

-- --------------------------------------------------------

--
-- Структура таблицы `shapes`
--

CREATE TABLE `shapes` (
  `id` int NOT NULL,
  `title` varchar(200) NOT NULL,
  `level` int NOT NULL,
  `creator_id` int NOT NULL,
  `student_file` varchar(500) NOT NULL,
  `teacher_file` varchar(500) NOT NULL,
  `html_file` varchar(500) NOT NULL,
  `date_of_creation` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `shapes`
--

INSERT INTO `shapes` (`id`, `title`, `level`, `creator_id`, `student_file`, `teacher_file`, `html_file`, `date_of_creation`, `status`) VALUES
(1, 'Куб', 2, 1, 'uploads/img/model_id1_student.png', 'uploads/img/model_id1-teacher.png', 'uploads/html/model_id1.html', '2025-01-16', 1),
(2, 'Тетраэдр', 1, 2, 'uploads/img/model_id2_student.png', 'uploads/img/model_id2-teacher.png', 'uploads/html/model_id1.html', '2025-01-16', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `limitations` varchar(100) NOT NULL,
  `uploaded_data` int NOT NULL,
  `data_downloads` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id`, `email`, `password`, `name`, `limitations`, `uploaded_data`, `data_downloads`) VALUES
(1, 'vya-job@mail.ru', '!slrdf-3421', 'admin', '', 0, 0),
(2, 'pechenov.vv@yandex.ru', '!slrdf-3421', 'Вячеслав Алексеевич Печенов', '', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `work`
--

CREATE TABLE `work` (
  `id` int NOT NULL,
  `logo` varchar(500) NOT NULL,
  `title` varchar(200) NOT NULL,
  `subtitle` varchar(500) NOT NULL,
  `k` int NOT NULL,
  `maxImagesPerPage` int NOT NULL,
  `columns` int NOT NULL,
  `margin` int NOT NULL,
  `horizontalGutter` int NOT NULL,
  `verticalGutter` int NOT NULL,
  `creator_id` int NOT NULL,
  `likes` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `work`
--

INSERT INTO `work` (`id`, `logo`, `title`, `subtitle`, `k`, `maxImagesPerPage`, `columns`, `margin`, `horizontalGutter`, `verticalGutter`, `creator_id`, `likes`, `status`) VALUES
(1, '', 'Тестовое соревнование', '12121', 10, 20, 4, 5, 30, 10, 1, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `work_shapes`
--

CREATE TABLE `work_shapes` (
  `id` int NOT NULL,
  `work_id` int NOT NULL,
  `shapes_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `work_shapes`
--

INSERT INTO `work_shapes` (`id`, `work_id`, `shapes_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `shapes`
--
ALTER TABLE `shapes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `work_shapes`
--
ALTER TABLE `work_shapes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `shapes`
--
ALTER TABLE `shapes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `work`
--
ALTER TABLE `work`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `work_shapes`
--
ALTER TABLE `work_shapes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
