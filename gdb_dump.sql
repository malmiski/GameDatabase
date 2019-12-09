-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2019 at 05:42 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

USE gdb;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE IF NOT EXISTS `accessories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `console` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`id`, `name`, `console`) VALUES
(1, 'NES Adapter', 'NES'),
(2, 'SNES Adapter', 'Adapter');

-- --------------------------------------------------------

--
-- Table structure for table `consoles`
--

CREATE TABLE IF NOT EXISTS `consoles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `consoles`
--

INSERT INTO `consoles` (`id`, `name`) VALUES
(4, 'GameCube'),
(3, 'N64'),
(1, 'NES'),
(7, 'PS1'),
(8, 'PS2'),
(9, 'PS3'),
(2, 'SNES'),
(5, 'Wii'),
(6, 'Wii U'),
(10, 'Xbox 360');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `console` varchar(150) NOT NULL,
  `publisher` varchar(150) NOT NULL,
  `publish_date` date NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` text,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Table for games' AUTO_INCREMENT=70 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `name`, `console`, `publisher`, `publish_date`, `price`, `image`, `description`) VALUES
(4, 'Donkey Kong Classics', 'NES', 'Nintendo', '1989-10-01', NULL, 'img_cover_donkey_kong_classics.png', 'Donkey Kong Classics is a video game collection of the Donkey Kong series, consisting of the games Donkey Kong and Donkey Kong Jr.. This compilation is for the Nintendo Entertainment System, which was developed by Nintendo EAD.\r\n\r\nIt was released on October 1988 in the US, three years after the original release of the NES, and August 10, 1989 in Europe. It was never released in Japan.\r\n\r\nNothing has changed in gameplay and modes. The only difference is the title screen. It is now a blue color, and the player can switch between the two games and the single and multi-player modes from there. They are exactly the same as the NES versions of the games. '),
(5, 'Super Mario Bros. 3', 'NES', 'Nintendo', '1989-02-12', NULL, 'img_cover_super_mario_bros_3.png', ''),
(14, 'Mario Party 7', 'GameCube', 'Nintendo', '2005-11-07', NULL, 'img_cover_mario_party_7.png', ''),
(15, 'The Lion King', 'SNES', 'Virgin Active', '1994-12-09', NULL, 'img_cover_the_lion_king.jpg', ''),
(16, 'Mario Kart 8', 'Wii U', 'Nintendo', '2014-05-30', NULL, 'img_cover_mario_kart_8.jpg', ''),
(20, 'Gears of War', 'Xbox 360', 'Microsoft Studios', '2006-11-07', NULL, 'img_cover_gears_of_war.png', ''),
(21, 'Gears of War 2', 'Xbox 360', 'Microsoft Studios', '2008-11-07', NULL, 'img_cover_gears_of_war_2.jpg', ''),
(22, 'New Super Mario Bros. U', 'Wii U', 'Nintendo', '2012-11-18', NULL, 'img_cover_new_super_mario_bros_u.jpg', ''),
(23, 'Madden NFL 09', 'PS3', 'EA Sports', '2008-08-12', NULL, 'img_cover_madden_nfl_09.jpg', ''),
(24, 'Dark Souls', 'PS3', 'Namco Bandai', '2011-10-04', NULL, 'img_cover_dark_souls.jpg', ''),
(25, 'The Legend of Zelda: Ocarina of Time', 'N64', 'Nintendo', '1998-11-03', NULL, 'img_cover_loz_oot.jpg', ''),
(26, 'Mario Kart Wii', 'Wii', 'Nintendo', '2008-04-27', NULL, 'img_cover_mario_kart_wii.jpg', ''),
(27, 'Crash Bandicoot', 'PS1', 'Sony Computer Entertainment', '1996-09-09', NULL, 'img_cover_crash_bandicoot.png', ''),
(28, 'Grand Theft Auto: San Andreas', 'PS2', 'Rockstar Games', '2004-10-26', NULL, 'img_cover_gta_san_andreas.jpg', ''),
(29, 'Chip ''n Dale Rescue Rangers', 'NES', 'Capcom', '1990-06-01', NULL, 'img_cover_chip_n_dale_rescue_rangers.jpg', ''),
(32, 'Super Dodge Ball', 'NES', 'CSG Imagesoft', '1989-06-01', NULL, 'img_cover_super_dodge_ball.jpg', ''),
(33, 'NES Play Action Football', 'NES', 'Nintendo', '1990-09-01', NULL, 'img_cover_nes_play_action_football.jpg', ''),
(34, 'The Jungle Book', 'NES', 'Virgin Interactive', '1994-00-00', NULL, 'img_cover_the_jungle_book.jpg', ''),
(35, 'Kirby''s Adventure', 'NES', 'Nintendo', '1993-05-01', NULL, 'img_cover_kirbys_adventure.png', ''),
(36, 'Super Mario Bros./Duck Hunt', 'NES', 'Nintendo', '1985-10-18', NULL, 'img_cover_super_mario_bros_duck_hunt.jpg', ''),
(37, 'Metroid', 'NES', 'Nintendo', '1987-08-00', NULL, 'img_cover_metroid.jpg', ''),
(38, 'Mystery Quest', 'NES', 'Taxan', '1989-04-00', NULL, 'img_cover_mystery_quest.jpg', ''),
(39, 'Operation Wolf', 'NES', 'Taito', '1989-00-00', NULL, 'img_cover_operation_wolf.jpg', ''),
(40, 'Popeye', 'NES', 'Nintendo', '0000-00-00', NULL, 'img_cover_popeye.jpg', ''),
(41, 'Robo Warrior', 'NES', 'Jaleco', '1988-12-00', NULL, 'img_cover_robo_warrior.jpg', ''),
(42, 'Castlevania II: Simon''s Quest', 'NES', 'Konami', '1988-12-01', NULL, 'img_castlevania_II_simons_quest.jpg', ''),
(43, 'Stealth ATF', 'NES', 'Activision', '1989-10-00', NULL, 'img_stealth_atf.jpg', ''),
(44, 'Super Mario Bros. 2', 'NES', 'Nintendo', '1988-10-10', NULL, 'img_super_mario_bros_2.jpg', ''),
(45, 'Super Mario Bros./Duck Hunt/World Class Track Meet', 'NES', 'Nintendo', '1985-10-18', NULL, 'img_super_mario_bros_duck_hunt_world_class_track_meet.jpg', ''),
(46, 'Teenage Mutant Ninja Turtles', 'NES', 'Ultra Games', '1989-06-00', NULL, 'img_teenage_mutant_ninja_turtles.jpg', ''),
(47, 'Teenage Mutant Ninja Turtles II: The Arcade Game', 'NES', 'Ultra Games', '1990-12-00', NULL, 'img_teenage_mutant_ninja_turtles_2.jpg', ''),
(48, 'Teenage Mutant Ninja Turtles: Turtles in Time', 'SNES', 'Konami', '1992-08-00', NULL, 'img_cover_teenage_mutant_ninja_turtles_turtles_in_time.jpg', ''),
(49, 'Kirby''s Avalanche', 'SNES', 'Nintendo', '1995-04-25', NULL, 'img_cover_kirbys_avalanche.png', ''),
(50, 'Super Mario RPG: Legend of the Seven Stars', 'SNES', 'Nintendo', '1996-05-18', NULL, 'img_cover_super_mario_rpg_the_legend_of_the_seven_stars.jpg', ''),
(51, 'Super Mario All-Stars + Super Mario World', 'SNES', 'Nintendo', '1994-12-00', NULL, 'img_cover_super_mario_all_stars_+_super_mario_world.jpg', ''),
(52, 'Pac-Man 2: The New Adventures', 'SNES', 'Namco', '1994-04-06', NULL, 'img_cover_pac_man_2_the_new_adventures.jpg', ''),
(53, 'Batman Forever', 'SNES', 'Acclaim', '1996-00-00', NULL, 'img_cover_batman_forever.jpg', ''),
(54, 'Killer Instinct', 'SNES', 'Midway/Rareware/Nintendo', '1995-08-30', NULL, 'img_cover_killer_instinct.jpg', ''),
(55, 'Lost Vikings 2', 'SNES', 'Interplay Entertainment', '1997-05-00', NULL, 'img_cover_lost_vikings_2.jpg', ''),
(56, 'Doom', 'SNES', 'Id Software/Williams Entertainment', '1995-09-01', NULL, 'img_cover_doom.jpg', ''),
(57, 'Shaq Fu', 'SNES', 'Electronic Arts', '1994-10-28', NULL, 'img_cover_shaq_fu.jpg', ''),
(58, 'Kirby Super Star', 'SNES', 'Nintendo', '1996-09-20', NULL, 'img_cover_kirby_super_star.jpg', ''),
(59, 'Aaahh!!! Real Monsters', 'SNES', 'Viacom New Media', '1995-08-15', NULL, 'img_aaahh_real_monsters.jpg', ''),
(60, 'Donkey Kong Country 3: Dixie Kong''s Double Trouble!', 'SNES', 'Nintendo', '1996-11-22', NULL, 'img_cover_donkey_kong_country_3_dixie_kongs_double_trouble.jpg', ''),
(61, 'Cliffhanger', 'SNES', 'Sony Imagesoft/Psygnosis', '1993-11-00', NULL, 'img_cover_cliffhanger.jpg', ''),
(62, 'Wario''s Woods', 'SNES', 'Nintendo', '1994-12-10', NULL, 'img_cover_warios_woods.png', ''),
(63, 'Ultimate Mortal Kombat 3', 'SNES', 'Midway Games/Williams Entertainment', '1996-06-00', NULL, 'img_cover_ultimate_mortal_kombat_3.jpg', ''),
(64, 'The Legend of Zelda: A Link to the Past', 'SNES', 'Nintendo', '1992-04-13', NULL, 'img_cover_the_legend_of_zelda_a_link_to_the_past.jpg', ''),
(65, 'Super Punch-Out!!', 'SNES', 'Nintendo', '1994-09-14', NULL, 'img_cover_super_punch_out.jpg', ''),
(66, 'Ken Griffey, Jr.''s Winning Run', 'SNES', 'Nintendo', '1996-06-00', NULL, 'img_cover_ken_griffey_jrs_winning_run.png', ''),
(67, 'Metal Gear Solid', 'PS1', 'Konami', '1998-10-21', NULL, 'img_cover_metal_gear_solid.png', ''),
(68, 'Metal Gear Solid 4: Guns of the Patriots', 'PS3', 'Konami', '2008-06-12', NULL, 'img_cover_mgs4.jpg', ''),
(69, 'WWF WretleMania 2000', 'N64', 'THQ', '1999-10-31', NULL, 'img_cover_wrestlemania_2000.jpg', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
