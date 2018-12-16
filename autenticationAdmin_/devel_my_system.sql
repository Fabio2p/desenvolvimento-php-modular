-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 14-Dez-2018 às 20:20
-- Versão do servidor: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devel_my_system`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `my_system_categories`
--

CREATE TABLE `my_system_categories` (
  `id_category` int(11) UNSIGNED NOT NULL,
  `title_category` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `my_system_categories`
--

INSERT INTO `my_system_categories` (`id_category`, `title_category`) VALUES
(1, 'Programação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `my_system_products`
--

CREATE TABLE `my_system_products` (
  `id_product` int(11) UNSIGNED NOT NULL,
  `id_category` int(11) NOT NULL,
  `title_product` varchar(80) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `introtext` mediumtext NOT NULL,
  `fulltext` longtext NOT NULL,
  `description_buy` text NOT NULL,
  `video_product` varchar(200) NOT NULL,
  `published` tinyint(2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `my_system_products`
--

INSERT INTO `my_system_products` (`id_product`, `id_category`, `title_product`, `photo`, `introtext`, `fulltext`, `description_buy`, `video_product`, `published`, `created`, `id_user`) VALUES
(1, 1, 'testes', 'logo.png', 'ffhfhfhfhfhf', 'ffdddfdddd', 'dddddddddfffffffccccccccccc', '33333dddddddf', 0, '2018-12-10 17:20:39', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `my_system_sessions`
--

CREATE TABLE `my_system_sessions` (
  `id_session` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `token` varchar(200) NOT NULL,
  `user_agent` varchar(200) NOT NULL,
  `access_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `my_system_sessions`
--

INSERT INTO `my_system_sessions` (`id_session`, `id_user`, `ip_address`, `token`, `user_agent`, `access_date`) VALUES
(1, 1, '127.0.0.1', 'bWlkbTFyMDJwNXBob2hhcWZ1ZWY2OGk4dmE=', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/70.0.3538.77 Chrome/70.0.3538.77 Safari/537.36', '2018-12-10 23:54:41'),
(2, 2, '127.0.0.1', 'dDc4b2J2bGY0c2NnamtzYjBuaXBoZzQ4MHQ=', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/70.0.3538.77 Chrome/70.0.3538.77 Safari/537.36', '2018-12-12 23:23:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `my_system_usergroups`
--

CREATE TABLE `my_system_usergroups` (
  `id_usergroup` int(11) UNSIGNED NOT NULL,
  `title_group` varchar(60) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `my_system_usergroups`
--

INSERT INTO `my_system_usergroups` (`id_usergroup`, `title_group`, `id_user`, `level`) VALUES
(1, 'Administrador', 1, 3),
(2, 'Publicador', 3, 2),
(3, 'Registrado', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `my_system_users`
--

CREATE TABLE `my_system_users` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `name_user` varchar(80) NOT NULL,
  `email_user` varchar(200) NOT NULL,
  `pass_user` varchar(200) NOT NULL,
  `blocked` tinyint(2) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `my_system_users`
--

INSERT INTO `my_system_users` (`id_user`, `name_user`, `email_user`, `pass_user`, `blocked`, `created`) VALUES
(1, 'Fabio', 'fabio@gmail.com', '$2y$10$N0oNITcwW7QYTrpdFJz.PeA6OwRKkUE9ba2P/wW/MnFgEvY7ejm8a', 0, '2018-12-10 13:44:47'),
(2, 'Pabinho', 'pabinho@gmail.com', '$2y$10$N0oNITcwW7QYTrpdFJz.PeA6OwRKkUE9ba2P/wW/MnFgEvY7ejm8a', 0, '2018-12-10 13:53:00'),
(3, 'Paula', 'paula@gmail.com', '$2y$10$N0oNITcwW7QYTrpdFJz.PeA6OwRKkUE9ba2P/wW/MnFgEvY7ejm8a', 0, '2018-12-10 13:53:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_system_categories`
--
ALTER TABLE `my_system_categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `my_system_products`
--
ALTER TABLE `my_system_products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `my_system_sessions`
--
ALTER TABLE `my_system_sessions`
  ADD PRIMARY KEY (`id_session`);

--
-- Indexes for table `my_system_usergroups`
--
ALTER TABLE `my_system_usergroups`
  ADD PRIMARY KEY (`id_usergroup`);

--
-- Indexes for table `my_system_users`
--
ALTER TABLE `my_system_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `name_user` (`name_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `my_system_categories`
--
ALTER TABLE `my_system_categories`
  MODIFY `id_category` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `my_system_products`
--
ALTER TABLE `my_system_products`
  MODIFY `id_product` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `my_system_sessions`
--
ALTER TABLE `my_system_sessions`
  MODIFY `id_session` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `my_system_usergroups`
--
ALTER TABLE `my_system_usergroups`
  MODIFY `id_usergroup` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `my_system_users`
--
ALTER TABLE `my_system_users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
