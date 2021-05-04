-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table wannabe_tinder.images: ~6 rows (approximately)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `user_email`, `original_name`, `path`) VALUES
	(1, 'johndoe@example.com', 'JohnDoe.png', 'Pictures/JohnDoe.png'),
	(2, 'janedoe@example.com', 'JaneDoe.png', 'Pictures/JaneDoe.png'),
	(3, 'bradpit@example.com', 'BradPit.png', 'Pictures/BradPit.png'),
	(4, 'angelinajolie@example.com', 'AngelinaJolie.png', 'Pictures/AngelinaJolie.png'),
	(5, 'andrisberzins@example.com', 'AndrisBerzins.png', 'Pictures/AndrisBerzins.png'),
	(6, 'ligaberzina@example.com', 'LigaBerzina.png', 'Pictures/LigaBerzina.png');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping data for table wannabe_tinder.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`name`, `surname`, `email`, `gender`, `password`) VALUES
	('Andris', 'Berzins', 'andrisberzins@example.com', 'male', '$2y$10$K96JvqaKnss3KLJsRR99eO4HTElDiwwLVSGjAdAIuGW7/XgZ5JyDy'),
	('Angelina', 'Jolie', 'angelinajolie@example.com', 'female', '$2y$10$w80GlwvsoIany72mVJhKSek6hnoZMaSNg/BEoyD4AENOeElvmCQg.'),
	('Brad', 'Pit', 'bradpit@example.com', 'male', '$2y$10$EPcQk5.sPedmXShnLFUOZ.082GW70fbtNLlh4xqoFtWGHC8iAkxbS'),
	('Jane', 'Doe', 'janedoe@example.com', 'female', '$2y$10$IgosoupXGz9I0wsvxPKI3eu.7elkJCcYd7fT50KfmbKUVb8TSifGO'),
	('John', 'Doe', 'johndoe@example.com', 'male', '$2y$10$wA7rvmz9bDBQI7W6Ff8j.eyydBx6ry/0vo3fD3ten6iCmWP/r7Pee'),
	('Liga', 'Berzina', 'ligaberzina@example.com', 'female', '$2y$10$HAPps4bmxaU3An9u.Nx0HuhuQIGjigdhJlEIsZvYkPZAbRuwXTcdO');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping data for table wannabe_tinder.users_likes: ~8 rows (approximately)
/*!40000 ALTER TABLE `users_likes` DISABLE KEYS */;
INSERT INTO `users_likes` (`id`, `user_email`, `person`, `liked`) VALUES
	(9, 'johndoe@example.com', 'angelinajolie@example.com', 'like'),
	(12, 'janedoe@example.com', 'andrisberzins@example.com', 'dislike'),
	(13, 'janedoe@example.com ', 'johndoe@example.com ', 'like'),
	(14, 'johndoe@example.com', 'ligaberzina@example.com', 'like'),
	(15, 'janedoe@example.com', 'bradpit@example.com', 'like'),
	(16, 'johndoe@example.com', 'janedoe@example.com', 'like'),
	(17, 'bradpit@example.com', 'angelinajolie@example.com', 'like'),
	(18, 'bradpit@example.com', 'janedoe@example.com', 'dislike'),
	(19, 'bradpit@example.com', 'ligaberzina@example.com', 'like');
/*!40000 ALTER TABLE `users_likes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
