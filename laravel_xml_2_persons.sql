--
-- Adatbázis: `laravel_xml_2_persons`
--
CREATE DATABASE IF NOT EXISTS `laravel_xml_2_persons` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_hu_0900_ai_ci;
USE `laravel_xml_2_persons`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `person_id` int DEFAULT NULL,
  `tax_number` int DEFAULT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_id` int DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `leave_date` date DEFAULT NULL,
  `email_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `insert_status` enum('successful','failed') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logs_person_id_foreign` (`person_id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `persons`
--

DROP TABLE IF EXISTS `persons`;
CREATE TABLE IF NOT EXISTS `persons` (
  `person_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tax_number` int NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_id` int NOT NULL,
  `entry_date` date NOT NULL,
  `leave_date` date DEFAULT NULL,
  `email_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `record_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`person_id`),
  UNIQUE KEY `persons_tax_number_unique` (`tax_number`),
  UNIQUE KEY `persons_other_id_unique` (`other_id`),
  UNIQUE KEY `persons_email_address_unique` (`email_address`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
