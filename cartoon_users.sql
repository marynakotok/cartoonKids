-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 12 2017 г., 22:50
-- Версия сервера: 10.1.28-MariaDB
-- Версия PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cartoon_users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `idComment` int(11) NOT NULL,
  `nickname` text NOT NULL,
  `date` date NOT NULL,
  `message` text NOT NULL,
  `idVideo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`idComment`, `nickname`, `date`, `message`, `idVideo`) VALUES
(1, 'Marina', '2017-12-12', 'I like your movies, Thank you very much!!', 2),
(2, 'Daniel', '2017-12-11', 'More movies . I enjoy it. Dont stop.. ', 1),
(3, 'Daniel', '2017-12-11', 'More movies . I enjoy it. Dont stop.. ', 1),
(4, 'Daniel', '2017-12-11', 'More movies . I enjoy it. Dont stop.. ', 3),
(5, 'Daniel', '2017-12-11', 'More movies . I enjoy it. Dont stop.. ', 4),
(6, 'Daniel', '2017-12-11', 'More movies . I enjoy it. Dont stop.. ', 5),
(7, 'Daniel', '2017-12-11', 'More movies . I enjoy it. Dont stop.. ', 6),
(8, 'Daniel', '2017-12-11', 'More movies . I enjoy it. Dont stop.. ', 7),
(9, 'Daniel', '2017-12-11', 'More movies . I enjoy it. Dont stop.. ', 8),
(10, 'Daniel', '2017-12-11', 'More movies . I enjoy it. Dont stop.. ', 9),
(11, 'Daniel', '2017-12-11', 'More movies . I enjoy it. Dont stop.. ', 10),
(12, 'Daniel', '2017-12-11', 'More movies . I enjoy it. Dont stop.. ', 11),
(13, 'Daniel', '2017-12-11', 'More movies . I enjoy it. Dont stop.. ', 12),
(14, 'Daniel', '2017-12-11', 'More movies . I enjoy it. Dont stop.. ', 5),
(15, 'Daniel', '2017-12-11', 'More movies . I enjoy it. Dont stop.. ', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `favlists`
--

CREATE TABLE `favlists` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idPlaylist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `favlists`
--

INSERT INTO `favlists` (`id`, `idUser`, `idPlaylist`) VALUES
(3, 2, 6),
(4, 2, 7),
(5, 3, 2),
(6, 3, 3),
(7, 3, 4),
(8, 3, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `favvid`
--

CREATE TABLE `favvid` (
  `id` int(11) NOT NULL,
  `idVideo` int(11) NOT NULL,
  `idPlaylist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `favvid`
--

INSERT INTO `favvid` (`id`, `idVideo`, `idPlaylist`) VALUES
(3, 1, 2),
(4, 6, 2),
(5, 4, 2),
(6, 5, 2),
(7, 8, 2),
(8, 9, 2),
(9, 7, 2),
(10, 6, 4),
(11, 5, 4),
(12, 11, 4),
(13, 4, 4),
(14, 9, 3),
(15, 5, 3),
(16, 12, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `playlists`
--

CREATE TABLE `playlists` (
  `idPlaylist` int(11) NOT NULL,
  `title` text NOT NULL,
  `amVid` int(11) NOT NULL,
  `type` text NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `playlists`
--

INSERT INTO `playlists` (`idPlaylist`, `title`, `amVid`, `type`, `idUser`) VALUES
(2, 'myholidays', 0, 'Private', 2),
(3, 'goodmorning', 0, 'Public', 2),
(4, 'Mycat', 0, 'Private', 2),
(5, 'BecauseIwant', 0, 'Public', 2),
(6, 'Helloworld', 0, 'Public', 3),
(7, 'Iwant10', 0, 'Private', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` text NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `photopath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nickname`, `login`, `password`, `photopath`) VALUES
(2, 'marenakms', 'kotokm@list.ru', '$2y$10$MwOnddOZfZYbwfxfgH0EKOfUVfst/KQi6Vl5tHSgjCcqx3p/bPLgu', '../img/profile_pic.png'),
(3, 'marenakms', 'marenakms@gmail.com', '$2y$10$O2edBE/fRxZX.ZTHsIIIKOIQYXQwAjLHYnGRCVIpRKMSSTopj3Ona', '../img/profile_pic.png');

-- --------------------------------------------------------

--
-- Структура таблицы `videos`
--

CREATE TABLE `videos` (
  `idVideos` int(11) NOT NULL,
  `path` text NOT NULL,
  `title` text NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `videos`
--

INSERT INTO `videos` (`idVideos`, `path`, `title`, `likes`, `dislikes`, `views`, `description`) VALUES
(1, '../img/home_pictures/1.png', 'Cooking Spaghetti', 0, 0, 0, 'Mr Bean tries to cook spaghetti for Irma but it will not * fit in the pan. He tries to boil it in his bath instead.* From animated episode Dinner for Two.'),
(2, '../img/home_pictures/2.png', 'Penguins of Madagascar', 0, 0, 0, 'Official opening minutes from The Penguins of Madagascar'),
(3, '../img/home_pictures/3.png', 'Behind the Scenes With The Cast', 0, 0, 0, 'Mr Bean tries to cook spaghetti for Irma but it will not * fit in the pan. He tries to boil it in his bath instead. * From animated episode Dinner for Two.'),
(4, '../img/home_pictures/4.png', 'Helga Has Self-Respect | Hey Arnold! | The Splat', 0, 0, 0, 'The Splat is your late-night destination for your * favorite childhood Nickelodeon cartoons and live-action shows.* We dont question football-shaped heads, but embrace them *along with Reptar bars, a Big Ear of Corn, orange soda, *and even slime for Pete (and Petes) sake.'),
(5, '../img/home_pictures/5.png', 'Lilo and Stitch Meets The Proud Family', 0, 0, 0, 'In no particular order, intros, outros, and inbetweentros* of shows from the late 80s, 90s, and early 00s. I could *by no means find all of the shows I wanted to include.'),
(6, '../img/home_pictures/6.png', 'Disneys Proud Family Movie: Dance Off', 0, 0, 0, 'A scene from the Disneys Proud Family Movie where Penny *and her friends dance battle the peanuts.'),
(7, '../img/home_pictures/7.png', 'Masha And The Bear', 0, 0, 0, 'Masha and the Hare are having an epic game of hockey.* When the game is at its peak, Masha goes off to find *the missing puck and stumbles upon a broom. *Now this is much better than a hockey.'),
(8, '../img/home_pictures/8.png', 'Handsome Squidward ~ The Short Version', 0, 0, 0, 'Squidward becomes handsome after a few door slams from *Spongbob square pants.'),
(9, '../img/home_pictures/9.png', 'SpongeBob SquarePants | Krabby Patty Contest | Nickelodeon UK', 0, 0, 0, 'It is the Krabby Patty contest, the Visitors vs. the *Krusty Krab, whoever can eat the most Krabby Pattys *is the winner!'),
(10, '../img/home_pictures/10.png', 'SpongeBob SquarePants | Kenny the Cat | Nickelodeon UK', 0, 0, 0, 'SpongeBob and Patrick spend all night waiting for the legendary* Kenny the Cat to arrive in Bikini Bottom!  *When Kenny finally arrives, SpongeBob invites him *for a signature Krabby Patty at the Krusty Krab... *Only to find out Kennys secret!'),
(11, '../img/home_pictures/11.png', 'SpongeBob SquarePants', 0, 0, 0, 'Welcome to the official Nickelodeon UK YouTube channel! *We share sneak-peeks, behind the scenes gossip and *hilarious videos from all of your favourite Nickelodeon shows!'),
(12, '../img/home_pictures/12.png', 'Mr Bean: cartoon \"Artful Bean\"', 0, 0, 0, 'Mr Bean cartoon/animation  Complete Collection *Like me on Facebook Friends!  For free new movies!');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`);

--
-- Индексы таблицы `favlists`
--
ALTER TABLE `favlists`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `favvid`
--
ALTER TABLE `favvid`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`idPlaylist`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`idVideos`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `favlists`
--
ALTER TABLE `favlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `favvid`
--
ALTER TABLE `favvid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `playlists`
--
ALTER TABLE `playlists`
  MODIFY `idPlaylist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `videos`
--
ALTER TABLE `videos`
  MODIFY `idVideos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
