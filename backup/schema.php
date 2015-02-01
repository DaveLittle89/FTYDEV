-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 24, 2015 at 01:18 AM
-- Server version: 5.1.73-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thornhill_fty_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `affiliates`
--

CREATE TABLE IF NOT EXISTS `affiliates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyName` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `contactName` varchar(255) NOT NULL,
  `contactEmail` varchar(255) NOT NULL,
  `contactNumber` varchar(20) NOT NULL,
  `address1` int(255) NOT NULL,
  `address2` int(255) NOT NULL,
  `city` int(100) NOT NULL,
  `county` varchar(100) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `country` varchar(2) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_users`
--

CREATE TABLE IF NOT EXISTS `affiliate_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `affiliateID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
  `categoryDescription` text NOT NULL,
  `homepage` tinyint(4) NOT NULL,
  `listOrder` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE IF NOT EXISTS `channels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `name`) VALUES
(1, 'Self Generated'),
(2, 'Affiliate Link'),
(3, 'Google Adwords'),
(4, 'Promo Code');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `platformName` varchar(50) NOT NULL,
  `deviceName` varchar(20) NOT NULL DEFAULT 'PC',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `platformName`, `deviceName`) VALUES
(1, '/windows nt 6.3/i', 'Windows 8.1'),
(2, '/windows nt 6.2/i', 'Windows 8'),
(3, '/windows nt 6.1/i', 'Windows 7'),
(4, '/windows nt 6.0/i', 'Windows Vista'),
(5, '/windows nt 5.2/i', 'Windows Server 2003/'),
(6, '/windows nt 5.1/i', 'Windows XP'),
(7, '/windows xp/i', 'Windows XP'),
(8, '/windows nt 5.0/i', 'Windows 2000'),
(9, '/windows me/i', 'Windows ME'),
(10, '/win98/i', 'Windows 98'),
(11, '/win95/i', 'Windows 95'),
(12, '/win16/i', 'Windows 3.11'),
(13, '/macintosh|mac os x/i', 'Mac OS X'),
(14, '/mac_powerpc/i', 'Mac OS 9'),
(15, '/linux/i', 'Linux'),
(16, '/ubuntu/i', 'Ubuntu'),
(17, '/iphone/i', 'iPhone'),
(18, '/ipod/i', 'iPod'),
(19, '/ipad/i', 'iPad'),
(20, '/android/i', 'Android'),
(21, '/blackberry/i', 'BlackBerry'),
(22, '/webos/i', 'Mobile');

-- --------------------------------------------------------

--
-- Table structure for table `discount_type`
--

CREATE TABLE IF NOT EXISTS `discount_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `discount_type`
--

INSERT INTO `discount_type` (`id`, `type`) VALUES
(1, 'Percent OFF'),
(2, 'Percent ON'),
(3, 'Amount OFF'),
(4, 'Amount ON');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Master Administrator'),
(2, 'manager', 'Management Privalidges'),
(3, 'affiliate', 'Affiliate'),
(4, 'customer', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryID` int(11) NOT NULL,
  `itemName` int(11) NOT NULL,
  `itemShortDescription` int(11) NOT NULL,
  `itemLongDescription` int(11) NOT NULL,
  `img` int(11) NOT NULL,
  `standardPrice` int(11) NOT NULL,
  `netPrice` int(11) NOT NULL,
  `taxID` int(11) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `commision` decimal(10,0) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `item_addons`
--

CREATE TABLE IF NOT EXISTS `item_addons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(100) NOT NULL,
  `discount_type` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `childOf` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `moduleName` text NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  `manager` tinyint(4) NOT NULL DEFAULT '0',
  `affiliate` tinyint(4) NOT NULL DEFAULT '0',
  `customer` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `policy_documents`
--

CREATE TABLE IF NOT EXISTS `policy_documents` (
  `id` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `policy_information`
--

CREATE TABLE IF NOT EXISTS `policy_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemID` int(11) NOT NULL,
  `agentID` varchar(100) NOT NULL,
  `agentRef` varchar(100) NOT NULL,
  `pType` varchar(255) NOT NULL,
  `policyType` varchar(255) NOT NULL,
  `policyTitle` varchar(255) NOT NULL,
  `underWriter` varchar(255) NOT NULL,
  `dayNum` int(11) NOT NULL,
  `tocURL` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE IF NOT EXISTS `promo_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `source` varchar(20) NOT NULL,
  `affilliateID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `promo_code_discounts`
--

CREATE TABLE IF NOT EXISTS `promo_code_discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `promoID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `startDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `endDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tax_codes`
--

CREATE TABLE IF NOT EXISTS `tax_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tax_codes`
--

INSERT INTO `tax_codes` (`id`, `name`, `rate`) VALUES
(1, 'None', '0.00'),
(2, 'VAT', '0.20'),
(3, 'Standard rate IPT', '0.06'),
(4, 'Higher rate IPT', '0.20');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userID` int(11) NOT NULL,
  `channelID` int(11) NOT NULL,
  `channelParam` varchar(100) NOT NULL COMMENT 'e.g. promocode, affiliate',
  `channelParam1` varchar(100) NOT NULL,
  `netTotal` decimal(10,2) NOT NULL,
  `paid` tinyint(4) NOT NULL DEFAULT '0',
  `creditCardCharge` decimal(10,2) NOT NULL,
  `WPTransactionID` varchar(255) NOT NULL,
  `refundAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cancel` tinyint(4) NOT NULL DEFAULT '0',
  `cancelDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `notes` text NOT NULL,
  `sourceWebsite` varchar(255) NOT NULL,
  `totalCommission` decimal(10,2) NOT NULL,
  `commissionPaid` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE IF NOT EXISTS `transaction_items` (
  `id` int(11) NOT NULL,
  `transactionID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `discountTotal` int(11) NOT NULL,
  `taxRate` int(11) NOT NULL,
  `taxID` int(11) NOT NULL,
  `netTotal` int(11) NOT NULL,
  `commission` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items_addon`
--

CREATE TABLE IF NOT EXISTS `transaction_items_addon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transactionItemID` int(11) NOT NULL,
  `addOnID` int(11) NOT NULL,
  `addOnTitle` int(11) NOT NULL,
  `addOnAmount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_policy_data`
--

CREATE TABLE IF NOT EXISTS `transaction_policy_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transactionItemID` int(11) NOT NULL,
  `inseptionDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expiryDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dayNum` int(11) NOT NULL,
  `pType` varchar(100) NOT NULL,
  `policyType` int(100) NOT NULL,
  `policyTitle` varchar(255) NOT NULL,
  `underwriter` varchar(255) NOT NULL,
  `title` varchar(12) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `postcode` varchar(12) NOT NULL,
  `country` varchar(5) NOT NULL,
  `agentID` varchar(100) NOT NULL,
  `agentRef` varchar(100) NOT NULL,
  `agentName` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1268889823, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `county` varchar(50) NOT NULL,
  `postcode` int(20) NOT NULL,
  `country` varchar(2) NOT NULL,
  `csrfToken` varchar(255) DEFAULT NULL,
  `cardExpiry` date NOT NULL DEFAULT '0000-00-00',
  `fytEmail` tinyint(4) NOT NULL DEFAULT '1',
  `shareEmail` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_devices`
--

CREATE TABLE IF NOT EXISTS `user_devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `deviceID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
