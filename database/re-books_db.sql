-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.30 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных re-books
CREATE DATABASE IF NOT EXISTS `re-books` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `re-books`;

-- Дамп структуры для таблица re-books.books
CREATE TABLE IF NOT EXISTS `books` (
  `bookID` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `clicks` bigint DEFAULT NULL,
  PRIMARY KEY (`bookID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы re-books.books: ~3 rows (приблизительно)
INSERT INTO `books` (`bookID`, `title`, `author`, `description`, `image`, `category`, `date`, `rating`, `clicks`) VALUES
	(15, 'aR', 'NIGGER RIMSA', 'adkoahwdioawhjdoahwdioahjidoahjwdokjwiohdaiosdhoadhoawdhaiowdhaowdhaidhwaiodhoaid', 'uploads/16736252531003w-4he1eqkeAQg.webp', 'Drama', '2022-12-28', 12, NULL),
	(16, 'awdawddawda', 'wdawdadad', 'dddddd', 'uploads/1673988439step-3-15.png', 'awdadawdadawda', '2023-01-22', 1, NULL),
	(22, 'FOOL MAN', 'Emīls Strēlis', 'nav', 'uploads/167398950715ef99d3621dba3c18818ad9cc0407f5.jpg', 'Drama', '2023-01-15', NULL, NULL);

-- Дамп структуры для таблица re-books.category
CREATE TABLE IF NOT EXISTS `category` (
  `categoryID` int NOT NULL AUTO_INCREMENT,
  `CategName` varchar(100) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы re-books.category: ~2 rows (приблизительно)
INSERT INTO `category` (`categoryID`, `CategName`) VALUES
	(1, 'Fantāzija'),
	(2, 'Fantastika');

-- Дамп структуры для таблица re-books.favourites
CREATE TABLE IF NOT EXISTS `favourites` (
  `favouritesID` int NOT NULL AUTO_INCREMENT,
  `FK_booksID` int DEFAULT NULL,
  `FK_userID` int DEFAULT NULL,
  PRIMARY KEY (`favouritesID`) USING BTREE,
  KEY `favourites_ibfk_1` (`FK_userID`) USING BTREE,
  KEY `books_ID` (`FK_booksID`) USING BTREE,
  CONSTRAINT `FK_favourites_books` FOREIGN KEY (`FK_booksID`) REFERENCES `books` (`bookID`),
  CONSTRAINT `FK_favourites_users` FOREIGN KEY (`FK_userID`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы re-books.favourites: ~2 rows (приблизительно)
INSERT INTO `favourites` (`favouritesID`, `FK_booksID`, `FK_userID`) VALUES
	(27, 16, 14),
	(36, 15, 14);

-- Дамп структуры для таблица re-books.ratingsystem
CREATE TABLE IF NOT EXISTS `ratingsystem` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rateIndex` tinyint DEFAULT NULL,
  `FK_userID` int DEFAULT NULL,
  `FK_bookID` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ratingsystem_users` (`FK_userID`),
  KEY `FK_ratingsystem_books` (`FK_bookID`),
  CONSTRAINT `FK_ratingsystem_books` FOREIGN KEY (`FK_bookID`) REFERENCES `books` (`bookID`),
  CONSTRAINT `FK_ratingsystem_users` FOREIGN KEY (`FK_userID`) REFERENCES `users` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы re-books.ratingsystem: ~5 rows (приблизительно)
INSERT INTO `ratingsystem` (`id`, `rateIndex`, `FK_userID`, `FK_bookID`) VALUES
	(168, 3, 14, 15),
	(169, 1, 13, 15),
	(171, 2, 13, 16),
	(172, 2, 14, 16),
	(174, 4, 26, 16);

-- Дамп структуры для таблица re-books.users
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы re-books.users: ~3 rows (приблизительно)
INSERT INTO `users` (`userID`, `email`, `username`, `password`, `admin`) VALUES
	(13, 'ilarimsa937@gmail.com', 'fowik', '202cb962ac59075b964b07152d234b70', 1),
	(14, 'cheaterrrrr123@gmail.com', 'zerlog', '202cb962ac59075b964b07152d234b70', 0),
	(26, 'test@test.com', 'test', '202cb962ac59075b964b07152d234b70', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
