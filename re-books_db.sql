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

-- Дамп структуры для таблица re-books.book
CREATE TABLE IF NOT EXISTS `book` (
  `Book_ID` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Author` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Image` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Category` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Rating` int DEFAULT NULL,
  PRIMARY KEY (`Book_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы re-books.book: ~2 rows (приблизительно)
INSERT INTO `book` (`Book_ID`, `Title`, `Author`, `Description`, `Image`, `Category`, `Date`, `Rating`) VALUES
	(2, 'awdadw', NULL, NULL, '', NULL, NULL, NULL),
	(3, 'NIGGA', NULL, NULL, '', NULL, NULL, NULL);

-- Дамп структуры для таблица re-books.favourites
CREATE TABLE IF NOT EXISTS `favourites` (
  `favourites_ID` int NOT NULL AUTO_INCREMENT,
  `books_ID` int NOT NULL,
  `user_ID` int NOT NULL,
  PRIMARY KEY (`favourites_ID`),
  KEY `favourites_ibfk_1` (`user_ID`),
  KEY `books_ID` (`books_ID`),
  CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`UserID`),
  CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`books_ID`) REFERENCES `book` (`Book_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы re-books.favourites: ~0 rows (приблизительно)

-- Дамп структуры для таблица re-books.user
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(60) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы re-books.user: ~4 rows (приблизительно)
INSERT INTO `user` (`UserID`, `Email`, `Username`, `Password`, `Admin`) VALUES
	(1, 'bebrs@gmail.com', 'bumbina', '$2y$10$MOqGEeUz5vpS6n3eTEEi..x6lifk2dRd/3AhJ.hj5dbbavX9kzjcO', 0),
	(2, 'ilarimsa937@gmail.com', 'fowik', '$2y$10$wMa9PWjKUfUsuToRSoBVeuGU7zYqukcurxMthZM6ECryKnSKSnZw2', 1),
	(3, 'birze@gmail.com', 'a', '$2y$10$pJdHyVxKB4aoWXbFP78ooOEqZSAe6NlrfQvrmoVOLD.4TjtVxMESG', 0),
	(14, 'ad@d.lv', 'awd', '$2y$10$iyaS.V.7Z1PZWTd4R.5nredNHoMIJdNzZzVqqQunVqbBgmD96WjMy', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
