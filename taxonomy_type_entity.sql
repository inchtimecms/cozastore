-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-10-21 18:31:14
-- 服务器版本： 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.11-1+ubuntu18.04.1+deb.sury.org+1

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- SET AUTOCOMMIT = 0;
-- START TRANSACTION;
-- SET time_zone = "+00:00";
--
--
-- /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
-- /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
-- /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
-- /*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inchtimework`
--

-- --------------------------------------------------------

--
-- 表的结构 `taxonomy_type_entity`
--
--
-- CREATE TABLE `taxonomy_type_entity` (
--   `id` int(11) NOT NULL,
--   `taxonomy_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `taxonomy_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `taxonomy_alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `taxonomy_type_entity`
--

INSERT INTO `taxonomy_type_entity` (`id`, `taxonomy_name`, `taxonomy_desc`, `taxonomy_alias`) VALUES
(1, '分类标签', '系统自带的基本分类标签类型.', 'tags');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `taxonomy_type_entity`
--
-- ALTER TABLE `taxonomy_type_entity`
--   ADD PRIMARY KEY (`id`),
--   ADD UNIQUE KEY `UNIQ_586E409AB40BAF39` (`taxonomy_alias`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `taxonomy_type_entity`
--
-- ALTER TABLE `taxonomy_type_entity`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
-- COMMIT;

-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
