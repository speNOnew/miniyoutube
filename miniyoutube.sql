-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2021 a las 05:42:07
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `miniyoutube`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `video_id` int(255) NOT NULL,
  `body` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `video_id`, `body`, `created_at`, `updated_at`) VALUES
(7, 3, 9, 'Esa coñaza que?', '2021-04-27 17:55:00', '2021-04-27 17:55:00'),
(9, 5, 9, 'Soy may :c', '2021-04-27 19:14:34', '2021-04-27 19:14:34'),
(10, 3, 8, 'Soy el admin xD', '2021-04-27 19:23:27', '2021-04-27 19:23:27'),
(11, 4, 6, 'Hola soy yibrna', '2021-04-27 21:13:38', '2021-04-27 21:13:38'),
(13, 3, 9, 'Nuevo comentario jejejeje', '2021-05-01 22:38:39', '2021-05-01 22:38:39'),
(14, 3, 8, 'kakakakaka', '2021-05-07 02:32:08', '2021-05-07 02:32:08'),
(15, 3, 10, 'Te mamaste naileth xD', '2021-05-07 03:17:45', '2021-05-07 03:17:45'),
(16, 3, 10, 'XD', '2021-05-10 19:36:06', '2021-05-10 19:36:06'),
(17, 3, 10, 'XD', '2021-05-10 19:38:47', '2021-05-10 19:38:47'),
(18, 3, 10, 'DDDD', '2021-05-10 19:50:06', '2021-05-10 19:50:06'),
(20, 3, 10, 'nmms', '2021-05-13 01:00:25', '2021-05-13 01:00:25'),
(21, 3, 10, 'sssss', '2021-05-13 01:02:08', '2021-05-13 01:02:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `surname` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `surname`, `email`, `password`, `image`, `created_at`, `updated_at`, `remember_token`) VALUES
(3, NULL, 'Yibran', 'Pereira', 'yibranpereira@gmail.com', '$2y$10$Scx93iXLNTH7ILWvVWNE3.kpLmi7VlakSP9ifTE6y/XQDxEeGLaK2', NULL, '2021-04-15 01:24:48', '2021-05-13 01:18:28', 'vBgTRE17S3fGcxAQfSi7g5EtGQp1FP0VHLm8b70q72Bc0sYbvdqN4CChU4AO'),
(4, NULL, 'Naileth', 'Toledo', 'naileth_n@hotmail.com', '$2y$10$3Da1WIUpkQT8YmLyCDKQA.PEVKvgHJakJN/hbSC6EJ4iPzIAxIA/a', NULL, '2021-04-27 19:09:14', '2021-05-12 21:16:03', 'lHqVSk69Oac6cjVRKTCU2gGYzQbPQ6gK8BwV0fL1cBso5rrH4uKAf2JK5T7r'),
(5, NULL, 'Mariana', 'Marquez', 'mariana-674@hotmail.com', '$2y$10$8RFMByDzwzyzgbYWpAwgCe/79cAsE4Dg1SF5cng3yPF1j0tc8CBAC', NULL, '2021-04-27 19:10:58', '2021-04-27 19:14:43', 'xb3Z4fg46AgqiKj3QVmMu3vNUJ6QlHaNlNMPHANQFwpQodo9nGmzzSxMXbUb'),
(6, NULL, 'Luis', NULL, 'mari-bebe@hotmail.com', '$2y$10$wluUJHSAdecRiGu8uQdlnOK119eYkNN4ZJSga.H6zXpMbLHOx6e/a', NULL, '2021-05-12 03:03:58', '2021-05-12 21:23:20', 'eJibdhwGP6tqqvPD4lcUthadOXgKtrUs2y8JO1MvP8PFz0dNjWV9ZsvHeyMS'),
(7, NULL, 'Cristina', NULL, 'saravivassosa@gmail.com', '$2y$10$IFeDAYz0dXuvi7xJoL/YxuG/hKVYvh9zEAH3YawAhiAXtqUGRwTOe', NULL, '2021-05-12 21:23:47', '2021-05-16 03:36:13', '0faxofhCbPXRfnrypMD5i2DymyMp8Ig8ExltFdUORbs1oDFjCif9C0jR9qdC'),
(8, NULL, 'Paladinx', NULL, 'pala@dinx.com', '$2y$10$C0m8EEy7qk.oJIexto1cNezaRbk9AfYe7SDPnIaFA2qefO7TwUieG', NULL, '2021-05-12 21:50:12', '2021-05-12 21:53:41', 'hOX3YgvxzzevnwYexpv2A2i2RRjeC0HF7zpVmuxtsxX4w6DvznEZONzpr9zp'),
(9, NULL, 'ola', 'kase', 'ola@kase.com', '$2y$10$1DffmuGHDmHZrP5e0yG6X.9NFYG8nDl5KF8Lo5a0el9hCxEHtpGxW', NULL, '2021-05-12 21:54:04', '2021-05-12 22:06:45', 'daAI3fzGYryImYwUR6E4bSY054jbBRp9K3Oma9K2ZhtmUEHMYLBTYqTfr4v6'),
(10, NULL, 'Dead', 'Pool', 'deadpool@gmail.com', '$2y$10$8ZuQAdFAqop0MeB1m9WxUuSOxKcPcX2rS/rlY1MkHfzL7AOduUo8O', NULL, '2021-05-13 19:03:37', '2021-05-13 19:05:01', '59SXnNpzv1sP4Qe2Oz1SWiuaKt88qXno0cZHhtfTYT3LcOTqHhu5PFIMFWfu'),
(11, NULL, 'Yohander', 'Zapata', 'yohander@zapata.com', '$2y$10$m0P2bX8mkbBX6OIUTbX5g.H2iSTJ/TO/s0JLIlKhiNhlx4x4Y0S9K', NULL, '2021-05-13 22:40:09', '2021-05-13 22:49:54', 'MIbP1TJjBnKWWgkmQ9OwQA4iG7I1xM2nJiVyLjIoSxArMCDatHByfTPhqVgP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video_path` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `user_id`, `title`, `description`, `status`, `image`, `video_path`, `created_at`, `updated_at`, `remember_token`) VALUES
(3, 3, 'Ciudad brillante', 'Una ciudad muy bella por la noche', NULL, '1620083989_466161_3229878284671_1495175901_o.jpg', '1620083989_Pexels Videos 1654216.mp4', '2021-04-21 02:26:24', '2021-05-03 23:19:49', NULL),
(4, 3, 'Negro fumando ', 'Un negro fumando cosa rara', NULL, '1620083694_6091291207_54702f705f_z.jpg', '1620083694_production ID_4835143.mp4', '2021-04-21 03:34:40', '2021-05-03 23:14:54', NULL),
(6, 3, 'Golazo de Yii', 'Un golazo de Yibran grabado en vivo.', NULL, '1620083177_\'          \'Cɑя̣los\'Salas.gif', '1618977266Golazoxd.mp4', '2021-04-21 03:54:26', '2021-05-03 23:06:17', NULL),
(8, 3, 'Yibran posando xd', 'Un video de yibran posando', NULL, '1620082800_IMG_20140705_163626.jpg', '1619075883VID_20140705_163508.mp4', '2021-04-22 07:18:03', '2021-05-03 23:00:00', NULL),
(9, 3, 'Yii y May', 'Yibran y Mariana', NULL, '1620082440_21462731_10210315094650710_4876062551018441181_n.jpg', '1619942815_DSC_1738MP4_upload_version.mp4', '2021-04-23 02:48:09', '2021-05-03 22:54:00', NULL),
(10, 4, 'Como colocar leche a tu café', 'El video claramente muestra como colocarle leche a tu cafe de manera muy detallada.', NULL, '1620357365Pablo.jpg', '1620357365video (2).mp4', '2021-05-07 03:16:05', '2021-05-07 03:17:15', NULL),
(14, 7, 'Torta', 'Un video de prueba haciendome pasar por la titi', NULL, '1620869159IMG00227-20150322-1943.jpg', '1620869159video (2).mp4', '2021-05-13 01:25:59', '2021-05-16 03:17:39', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_coment_video` (`video_id`),
  ADD KEY `fk_coment_user` (`user_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_videos_users` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_coment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_coment_video` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`);

--
-- Filtros para la tabla `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `fk_videos_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
