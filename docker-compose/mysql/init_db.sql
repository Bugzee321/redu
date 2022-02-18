-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DELIMITER ;;

DROP PROCEDURE IF EXISTS `getPin`;;
CREATE PROCEDURE `getPin`()
BEGIN
        DECLARE random INT DEFAULT 0;
        DECLARE myloop BOOL;
        SET myloop = 1;
        WHILE myloop = 1 DO
            SET random = LPAD(FLOOR(RAND() * 999999.99), 4, '0');
            IF (SELECT count('pin') FROM `pins` WHERE `pin` = random) = 0 AND LENGTH(random) = 4 THEN
                INSERT INTO `pins`(`pin`) VALUES(random);
                SELECT random;
                SET myloop = 0;
            END IF;
        END WHILE;
        END;;

DELIMITER ;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `pins`;
CREATE TABLE `pins` (
  `pin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2022_02_17_135408_create_pins_table', 1);

-- 2022-02-18 08:41:37

