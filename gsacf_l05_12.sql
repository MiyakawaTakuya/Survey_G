-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 6 月 04 日 09:29
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_l05_12`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `Daylight`
--

CREATE TABLE `Daylight` (
  `id` int(12) NOT NULL,
  `room` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `win` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sflo` decimal(4,2) NOT NULL,
  `Swin` decimal(4,2) NOT NULL,
  `H` int(11) NOT NULL,
  `D` int(11) NOT NULL,
  `P` decimal(2,2) NOT NULL,
  `Result` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `Daylight`
--

INSERT INTO `Daylight` (`id`, `room`, `win`, `Sflo`, `Swin`, `H`, `D`, `P`, `Result`) VALUES
(1, 'メインベッドルーム', '北側', '11.20', '3.50', 6500, 800, '0.11', 'Not required'),
(3, 'メインベッドルーム', '北側', '11.50', '3.60', 6200, 1000, '0.18', 'Required'),
(4, '子供部屋', '南側', '9.50', '2.70', 5500, 1500, '0.32', 'Required'),
(5, '子供部屋', '西側', '6.50', '2.50', 6500, 1200, '0.21', 'Required'),
(6, '子供部屋B', '西側', '10.00', '3.00', 6500, 1200, '0.19', 'Required'),
(7, '秘密の部屋', '社会の窓', '30.00', '5.55', 3600, 1000, '0.26', 'Required'),
(8, '徹子の部屋', '徹子の後ろ側', '35.50', '4.00', 7800, 1200, '0.06', 'Not required');

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(12) NOT NULL,
  `todo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 'SQL練習', '2021-06-01', '2021-06-01 12:01:15', '2021-06-01 12:01:15'),
(2, '課題のブラッシュアップ', '2021-06-01', '2021-06-01 00:00:00', '2021-06-01 00:00:00'),
(3, 'さらに課題のブラッシュアップ', '2021-06-01', '2021-06-01 12:05:00', '2021-06-01 12:05:00'),
(4, 'さらにさらにブラッシュアップ', '2021-06-01', '2021-06-01 12:07:00', '2021-06-01 12:07:00'),
(5, 'さらに追加機能を！', '2021-06-01', '2021-06-01 12:09:00', '2021-06-01 12:09:00'),
(6, '4432234', '2021-06-02', '2021-06-01 16:56:02', '2021-06-01 16:56:02');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `Daylight`
--
ALTER TABLE `Daylight`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `Daylight`
--
ALTER TABLE `Daylight`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
