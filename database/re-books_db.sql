
-- Дамп структуры базы данных re-books
CREATE DATABASE IF NOT EXISTS `re-books`;
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
  `clicks` bigint DEFAULT NULL,
  PRIMARY KEY (`bookID`)
) ENGINE=InnoDB AUTO_INCREMENT=30;

-- Дамп структуры для таблица re-books.category
CREATE TABLE IF NOT EXISTS `category` (
  `categoryID` int NOT NULL AUTO_INCREMENT,
  `CategName` varchar(100) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=30;

-- Дамп данных таблицы re-books.category: ~10 rows (приблизительно)
INSERT INTO `category` (`categoryID`, `CategName`) VALUES
	(1, 'Fantāzija'),
	(2, 'Fantastika'),
	(3, 'Detektīvi'),
	(4, 'Mīlas romāni'),
	(5, 'Biznesa literatūra'),
	(6, 'Datorliteratūra'),
	(7, 'Psiholoģija'),
	(8, 'Vēsture'),
	(9, 'Skolas mācību grāmatas'),
	(10, 'Ārpusskolas lasīšana');

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
) ENGINE=InnoDB AUTO_INCREMENT=43;

-- Дамп данных таблицы re-books.favourites: ~1 rows (приблизительно)
INSERT INTO `favourites` (`favouritesID`, `FK_booksID`, `FK_userID`) VALUES
	(42, 29, 13);

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
) ENGINE=InnoDB AUTO_INCREMENT=177 ;

-- Дамп данных таблицы re-books.ratingsystem: ~1 rows (приблизительно)
INSERT INTO `ratingsystem` (`id`, `rateIndex`, `FK_userID`, `FK_bookID`) VALUES
	(176, 4, 13, 29);

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(100)  DEFAULT NULL,
  `password` varchar(255)  DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`userID`)
);

-- Дамп данных таблицы re-books.users: ~3 rows (приблизительно)
INSERT INTO `users` (`userID`, `email`, `username`, `password`, `admin`) VALUES
	(13, 'ilarimsa937@gmail.com', 'fowik', '202cb962ac59075b964b07152d234b70', 1),
	(14, 'cheaterrrrr123@gmail.com', 'zerlog', '202cb962ac59075b964b07152d234b70', 0),
	(26, 'test@test.com', 'test', '202cb962ac59075b964b07152d234b70', 0);
