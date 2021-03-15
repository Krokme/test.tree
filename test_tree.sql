DROP TABLE IF EXISTS `tree`;
CREATE TABLE IF NOT EXISTS `tree` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ParentId` int(10) UNSIGNED DEFAULT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`Id`) USING BTREE,
  KEY `ParentId` (`ParentId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tree` (`Id`, `ParentId`, `Name`, `Description`) VALUES
(18, NULL, '1.', '<p>Description of 1.</p>'),
(19, 18, '1.1.', ''),
(20, 19, '1.1.1.', ''),
(24, 18, '1.2.', ''),
(26, NULL, '2.', '<p>Description of 2.</p>'),
(29, 26, '2.1.', '');

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Psw` varchar(33) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Tocken` varchar(33) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Expires` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`Id`, `Username`, `Psw`, `Tocken`, `Expires`) VALUES
(2, 'test', '098f6bcd4621d373cade4e832627b4f6', '0vfbl1toqfcarb1l6533qjm8qn', 1562184618);


ALTER TABLE `tree`
  ADD CONSTRAINT `fk_tree_ParentId` FOREIGN KEY (`ParentId`) REFERENCES `tree` (`Id`) ON DELETE CASCADE;
