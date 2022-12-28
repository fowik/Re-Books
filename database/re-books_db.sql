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
  PRIMARY KEY (`bookID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы re-books.books: ~8 rows (приблизительно)
INSERT INTO `books` (`bookID`, `title`, `author`, `description`, `image`, `category`, `date`, `rating`) VALUES
	(2, 'asdad', 'asdad', 'adawdawdasuidhauisdhauiowdhnioawdhuioawdhjioadhnoadhoasdhjoaisdhjioadjioasjdioasdjiad', NULL, 'Drama', NULL, 2),
	(3, 'asdad', NULL, NULL, '', NULL, NULL, NULL),
	(6, 'awdawdawdawda', NULL, NULL, '', NULL, NULL, NULL),
	(7, 'awdawdawdad', NULL, NULL, '', NULL, NULL, NULL),
	(8, 'awdawdawd', NULL, NULL, '', NULL, NULL, NULL),
	(9, 'asdasdadad', NULL, NULL, '', NULL, NULL, NULL),
	(10, '', NULL, NULL, 'elektroniskais čeks.png', NULL, NULL, NULL),
	(11, 'awdawd', NULL, NULL, 'uploads/1672251049elektroniskais čeks.png', NULL, NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы re-books.favourites: ~0 rows (приблизительно)

-- Дамп структуры для таблица re-books.users
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Дамп данных таблицы re-books.users: ~2 rows (приблизительно)
INSERT INTO `users` (`userID`, `email`, `username`, `password`, `admin`) VALUES
	(2, 'ilarimsa937@gmail.com', 'fowik', '202cb962ac59075b964b07152d234b70', 0),
	(7, 'ilarimsa937@gmail.com', 'zerlog', '202cb962ac59075b964b07152d234b70', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
