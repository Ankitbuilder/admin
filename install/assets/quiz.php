-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2025 at 12:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elite_quiz_233`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audio_question`
--

CREATE TABLE `tbl_audio_question` (
`id` int(11) NOT NULL,
`category` int(11) NOT NULL,
`subcategory` int(11) NOT NULL,
`language_id` int(11) NOT NULL DEFAULT 0,
`audio_type` int(11) NOT NULL COMMENT '1=link,2=upload',
`audio` varchar(255) NOT NULL,
`question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`question_type` tinyint(4) NOT NULL COMMENT '1=normal, 2=true/false',
`optiona` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optionb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optionc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optiond` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optione` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
`answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_authenticate`
--

CREATE TABLE `tbl_authenticate` (
`auth_id` int(11) NOT NULL,
`auth_username` varchar(12) NOT NULL,
`auth_pass` text NOT NULL,
`role` varchar(32) NOT NULL,
`permissions` mediumtext NOT NULL,
`status` int(11) NOT NULL DEFAULT 0,
`language` varchar(255) NOT NULL DEFAULT 'english',
`created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_authenticate`
--

INSERT INTO `tbl_authenticate` (`auth_id`, `auth_username`, `auth_pass`, `role`, `permissions`, `status`, `language`, `created`) VALUES
(1, 'admin', '$2y$10$Qz.wZ38P0dVFRpAlqzm8g.MzVT3l0BBYEeTALjwJis6yq4M4dPzNa', 'admin', '', 1, 'english', '2020-11-02 10:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_badges`
--

CREATE TABLE `tbl_badges` (
`id` int(11) NOT NULL,
`language_id` int(11) DEFAULT 14,
`type` varchar(100) NOT NULL,
`badge_label` varchar(200) NOT NULL,
`badge_note` text NOT NULL,
`badge_reward` int(11) NOT NULL,
`badge_icon` varchar(100) NOT NULL,
`badge_counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_badges`
--

INSERT INTO `tbl_badges` (`id`, `language_id`, `type`, `badge_label`, `badge_note`, `badge_reward`, `badge_icon`, `badge_counter`) VALUES
(1, 14, 'dashing_debut', 'Dashing Debut', 'Play first quiz zone game', 2, '1636692664.png', 1),
(2, 14, 'combat_winner', 'Combat Winner', 'Won random battle. If both users have completed the battle then the badge will unlock.', 5, '16366926641.png', 1),
(3, 14, 'clash_winner', 'Clash Winner', 'Won group battle. If a minimum of one opponent user has completed the battle then the badge will unlock.', 2, '16366926642.png', 1),
(4, 14, 'most_wanted_winner', 'Most Wanted Winner', 'Won contest', 10, '16366926643.png', 1),
(5, 14, 'ultimate_player', 'Ultimate Player', 'Highest point Gainer', 1, '16366926644.png', 0),
(6, 14, 'quiz_warrior', 'Quiz Warrior', 'Won back-to-back three random battles. If both users have completed the battle then the badge will unlock.', 1, '16366926645.png', 3),
(7, 14, 'super_sonic', 'Super Sonic', 'Fastest puzzle solver. Need minimum 5 questions to unlock this badge.', 1, '16366926646.png', 25),
(8, 14, 'flashback', 'Flashback', 'Average time to solve fun & learn quiz questions. Need minimum 5 questions to unlock this badge.', 1, '16366926647.png', 8),
(9, 14, 'brainiac', 'Brainiac', 'Completed 100% quiz without using a lifeline. Need minimum 5 questions to unlock this badge.', 1, '16366926648.png', 0),
(10, 14, 'big_thing', 'Big Thing', '5k correct answer', 1, '16366926649.png', 5000),
(11, 14, 'elite', 'Elite', 'Earn coins more than 5k ', 1, '163669266410.png', 200),
(12, 14, 'thirsty', 'Thirty', 'Play daily quiz continuously 30 days', 1, '163669266411.png', 30),
(13, 14, 'power_elite', 'Power Elite', 'Achieved more than 10 badges', 1, '163669266412.png', 10),
(14, 14, 'sharing_caring', 'Sharing is Caring', 'Share application to more than 50 users', 1, '163669266413.png', 50),
(15, 14, 'streak', 'Streak', 'Maintain streak for 30 days', 1, '163669266414.png', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_battle_questions`
--

CREATE TABLE `tbl_battle_questions` (
`id` int(11) NOT NULL,
`match_id` varchar(128) NOT NULL,
`questions` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`date_created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_battle_statistics`
--

CREATE TABLE `tbl_battle_statistics` (
`id` int(11) NOT NULL,
`user_id1` int(11) NOT NULL,
`user_id2` int(11) NOT NULL,
`is_drawn` tinyint(4) NOT NULL,
`winner_id` int(11) NOT NULL,
`date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookmark`
--

CREATE TABLE `tbl_bookmark` (
`id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`question_id` int(11) NOT NULL,
`status` int(11) NOT NULL,
`type` int(11) NOT NULL COMMENT '1-quiz_zone, 3-guess_the_word, 4-audio_question'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
`id` int(11) NOT NULL,
`language_id` int(11) NOT NULL DEFAULT 0,
`category_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`slug` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
`type` int(11) NOT NULL,
`is_premium` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 - no , 1 - yes',
`coins` int(11) NOT NULL DEFAULT 0,
`image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
`row_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coin_store`
--

CREATE TABLE `tbl_coin_store` (
`id` int(11) NOT NULL,
`title` varchar(50) NOT NULL,
`coins` int(11) NOT NULL,
`type` int(11) NOT NULL DEFAULT 0 COMMENT '1=ads',
`product_id` varchar(150) NOT NULL,
`image` text DEFAULT NULL,
`description` text NOT NULL,
`status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 - OFF , 1 - ON'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_coin_store`
--

INSERT INTO `tbl_coin_store` (`id`, `title`, `coins`, `type`, `product_id`, `image`, `description`, `status`) VALUES
(1, '5 Coins', 5, 0, '5_consumable_coin', NULL, 'Small Pack', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contest`
--

CREATE TABLE `tbl_contest` (
`id` int(11) NOT NULL,
`language_id` int(11) NOT NULL DEFAULT 0,
`name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`start_date` datetime NOT NULL,
`end_date` datetime NOT NULL,
`description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`image` varchar(512) NOT NULL,
`entry` int(11) NOT NULL,
`prize_status` int(11) NOT NULL,
`date_created` datetime NOT NULL,
`status` int(11) NOT NULL COMMENT '0=deactive,1=active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contest_leaderboard`
--

CREATE TABLE `tbl_contest_leaderboard` (
`id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`contest_id` int(11) NOT NULL,
`questions_attended` int(11) NOT NULL,
`correct_answers` int(11) NOT NULL,
`score` double NOT NULL,
`last_updated` datetime NOT NULL,
`date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contest_prize`
--

CREATE TABLE `tbl_contest_prize` (
`id` int(11) NOT NULL,
`contest_id` int(11) NOT NULL,
`top_winner` int(11) NOT NULL,
`points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contest_question`
--

CREATE TABLE `tbl_contest_question` (
`id` int(11) NOT NULL,
`langauge_id` int(11) NOT NULL DEFAULT 0,
`contest_id` int(11) NOT NULL,
`image` varchar(256) NOT NULL,
`question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`question_type` int(11) NOT NULL COMMENT '1= normal, 2= true/false',
`optiona` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optionb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optionc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optiond` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optione` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`answer` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daily_quiz`
--

CREATE TABLE `tbl_daily_quiz` (
`id` int(11) NOT NULL,
`language_id` int(11) NOT NULL,
`questions_id` text NOT NULL,
`date_published` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daily_quiz_user`
--

CREATE TABLE `tbl_daily_quiz_user` (
`id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_module`
--

CREATE TABLE `tbl_exam_module` (
`id` int(11) NOT NULL,
`language_id` int(11) NOT NULL DEFAULT 0,
`title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`date` date NOT NULL,
`exam_key` varchar(100) NOT NULL,
`duration` int(11) NOT NULL,
`status` int(11) NOT NULL DEFAULT 0,
`answer_again` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_module_question`
--

CREATE TABLE `tbl_exam_module_question` (
`id` int(11) NOT NULL,
`exam_module_id` int(11) NOT NULL,
`image` varchar(512) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`marks` int(11) NOT NULL,
`question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`question_type` tinyint(4) NOT NULL COMMENT '1=normal, 2=true/false',
`optiona` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optionb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optionc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optiond` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optione` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
`answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_module_result`
--

CREATE TABLE `tbl_exam_module_result` (
`id` int(11) NOT NULL,
`exam_module_id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`obtained_marks` varchar(200) NOT NULL,
`total_duration` varchar(20) NOT NULL,
`statistics` longtext NOT NULL,
`status` int(11) NOT NULL COMMENT '2-in_exam, 3-completed',
`rules_violated` tinyint(4) NOT NULL,
`captured_question_ids` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fun_n_learn`
--

CREATE TABLE `tbl_fun_n_learn` (
`id` int(11) NOT NULL,
`language_id` int(11) NOT NULL DEFAULT 0,
`category` int(11) NOT NULL,
`subcategory` int(11) NOT NULL,
`title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`status` int(11) NOT NULL DEFAULT 0,
`content_type` tinyint(4) NOT NULL DEFAULT 0,
`content_data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fun_n_learn_question`
--

CREATE TABLE `tbl_fun_n_learn_question` (
`id` int(11) NOT NULL,
`fun_n_learn_id` int(11) NOT NULL,
`question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`question_type` int(11) NOT NULL COMMENT '1= normal, 2= true/false',
`optiona` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optionb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optionc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optiond` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optione` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`answer` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guess_the_word`
--

CREATE TABLE `tbl_guess_the_word` (
`id` int(11) NOT NULL,
`language_id` int(11) NOT NULL,
`category` int(11) NOT NULL,
`subcategory` int(11) NOT NULL,
`image` text NOT NULL,
`question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_languages`
--

CREATE TABLE `tbl_languages` (
`id` int(11) NOT NULL,
`language` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`code` varchar(11) NOT NULL,
`status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=Enabled, 0=Disabled',
`type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=active, 0=deactive',
`default_active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_languages`
--

INSERT INTO `tbl_languages` (`id`, `language`, `code`, `status`, `type`, `default_active`) VALUES
(1, 'Amharic', 'am', 0, 0, 0),
(2, 'Arabic', 'ar', 0, 0, 0),
(3, 'Basque', 'eu', 0, 0, 0),
(4, 'Bengali', 'bn', 0, 0, 0),
(5, 'English (UK)', 'en-GB', 0, 0, 0),
(6, 'Portuguese (Brazil)', 'pt-BR', 0, 0, 0),
(7, 'Bulgarian', 'bg', 0, 0, 0),
(8, 'Catalan', 'ca', 0, 0, 0),
(9, 'Cherokee', 'chr', 0, 0, 0),
(10, 'Croatian', 'hr', 0, 0, 0),
(11, 'Czech', 'cs', 0, 0, 0),
(12, 'Danish', 'da', 0, 0, 0),
(13, 'Dutch', 'nl', 0, 0, 0),
(14, 'English (US)', 'en', 1, 1, 1),
(15, 'Estonian', 'et', 0, 0, 0),
(16, 'Filipino', 'fil', 0, 0, 0),
(17, 'Finnish', 'fi', 0, 0, 0),
(18, 'French', 'fr', 0, 0, 0),
(19, 'Greek', 'el', 0, 0, 0),
(20, 'Gujarati', 'gu', 0, 0, 0),
(21, 'Hebrew', 'iw', 0, 0, 0),
(22, 'Hindi', 'hi', 0, 0, 0),
(23, 'Hungarian', 'hu', 0, 0, 0),
(24, 'Icelandic', 'is', 0, 0, 0),
(25, 'Indonesian', 'id', 0, 0, 0),
(26, 'German', 'de', 0, 0, 0),
(27, 'Italian', 'it', 0, 0, 0),
(28, 'Japanese', 'ja', 0, 0, 0),
(29, 'Kannada', 'kn', 0, 0, 0),
(30, 'Korean', 'ko', 0, 0, 0),
(31, 'Latvian', 'lv', 0, 0, 0),
(32, 'Lithuanian', 'lt', 0, 0, 0),
(33, 'Malay', 'ms', 0, 0, 0),
(34, 'Malayalam', 'ml', 0, 0, 0),
(35, 'Marathi', 'mr', 0, 0, 0),
(36, 'Norwegian', 'no', 0, 0, 0),
(37, 'Polish', 'pl', 0, 0, 0),
(38, 'Portuguese (Portugal)', 'pt-PT', 0, 0, 0),
(39, 'Romanian', 'ro', 0, 0, 0),
(40, 'Russian', 'ru', 0, 0, 0),
(41, 'Serbian', 'sr', 0, 0, 0),
(42, 'Chinese (PRC)', 'zh-CN', 0, 0, 0),
(43, 'Slovak', 'sk', 0, 0, 0),
(44, 'Slovenian', 'sl', 0, 0, 0),
(45, 'Spanish', 'es', 0, 0, 0),
(46, 'Swahili', 'sw', 0, 0, 0),
(47, 'Swedish', 'sv', 0, 0, 0),
(48, 'Tamil', 'ta', 0, 0, 0),
(49, 'Telugu', 'te', 0, 0, 0),
(50, 'Thai', 'th', 0, 0, 0),
(51, 'Chinese (Taiwan)', 'zh-TW', 0, 0, 0),
(52, 'Turkish', 'tr', 0, 0, 0),
(53, 'Urdu', 'ur', 0, 0, 0),
(54, 'Ukrainian', 'uk', 0, 0, 0),
(55, 'Vietnamese', 'vi', 0, 0, 0),
(56, 'Welsh', 'cy', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leaderboard_daily`
--

CREATE TABLE `tbl_leaderboard_daily` (
`id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`score` int(11) NOT NULL,
`date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leaderboard_monthly`
--

CREATE TABLE `tbl_leaderboard_monthly` (
`id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`score` int(11) NOT NULL,
`last_updated` datetime NOT NULL,
`date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
`id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`category` int(11) NOT NULL,
`subcategory` int(11) NOT NULL,
`level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_maths_question`
--

CREATE TABLE `tbl_maths_question` (
`id` int(11) NOT NULL,
`category` int(11) NOT NULL,
`subcategory` int(11) NOT NULL,
`language_id` int(11) NOT NULL DEFAULT 0,
`image` varchar(512) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`question_type` tinyint(4) NOT NULL COMMENT '1=normal, 2=true/false',
`optiona` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optionb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optionc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optiond` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optione` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
`answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_month_week`
--

CREATE TABLE `tbl_month_week` (
`id` int(11) NOT NULL,
`name` varchar(100) NOT NULL,
`type` int(11) NOT NULL COMMENT '1=month,2=week'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tbl_month_week`
--

INSERT INTO `tbl_month_week` (`id`, `name`, `type`) VALUES
(1, 'January', 1),
(2, 'February', 1),
(3, 'March', 1),
(4, 'April', 1),
(5, 'May', 1),
(6, 'June', 1),
(7, 'July', 1),
(8, 'August', 1),
(9, 'September', 1),
(10, 'October', 1),
(11, 'November', 1),
(12, 'December', 1),
(13, 'Sunday', 2),
(14, 'Monday', 2),
(15, 'Tuesday', 2),
(16, 'Wednesday', 2),
(17, 'Thursday', 2),
(18, 'Friday', 2),
(19, 'Saturday', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_multi_match`
--

CREATE TABLE `tbl_multi_match` (
`id` int(11) NOT NULL,
`category` int(11) NOT NULL,
`subcategory` int(11) NOT NULL,
`language_id` int(11) NOT NULL DEFAULT 0,
`image` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`question_type` tinyint(4) NOT NULL COMMENT '1=normal, 2=true/false',
`optiona` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optionb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optionc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optiond` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optione` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
`answer_type` tinyint(4) NOT NULL COMMENT '1=multiselect,2=sequence',
`answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`level` int(11) NOT NULL,
`note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_multi_match_level`
--

CREATE TABLE `tbl_multi_match_level` (
`id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`category` int(11) NOT NULL,
`subcategory` int(11) NOT NULL,
`level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_multi_match_question_reports`
--

CREATE TABLE `tbl_multi_match_question_reports` (
`id` int(11) NOT NULL,
`question_id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`message` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE `tbl_notifications` (
`id` int(11) NOT NULL,
`title` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`users` varchar(8) NOT NULL DEFAULT 'all',
`user_id` longtext DEFAULT NULL,
`type` varchar(250) NOT NULL,
`type_id` int(11) NOT NULL,
`image` varchar(128) NOT NULL,
`date_sent` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_request`
--

CREATE TABLE `tbl_payment_request` (
`id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`uid` text NOT NULL,
`payment_type` varchar(100) NOT NULL,
`payment_address` varchar(225) NOT NULL,
`payment_amount` varchar(20) NOT NULL,
`coin_used` varchar(20) NOT NULL,
`details` text NOT NULL,
`status` tinyint(4) NOT NULL COMMENT '0-pending, 1-completed, 2-invalid details',
`date` datetime NOT NULL,
`status_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
`id` int(11) NOT NULL,
`category` int(11) NOT NULL,
`subcategory` int(11) NOT NULL,
`language_id` int(11) NOT NULL DEFAULT 0,
`image` varchar(512) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`question_type` tinyint(4) NOT NULL COMMENT '1=normal, 2=true/false',
`optiona` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optionb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optionc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optiond` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`optione` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
`answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`level` int(11) NOT NULL,
`note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question_reports`
--

CREATE TABLE `tbl_question_reports` (
`id` int(11) NOT NULL,
`question_id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`message` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_categories`
--

CREATE TABLE `tbl_quiz_categories` (
`id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`type` int(11) NOT NULL COMMENT '2-fun_n_learn, 3-guess_the_word, 4-audio_question',
`type_id` int(11) NOT NULL,
`category` int(11) NOT NULL,
`subcategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
`id` int(11) NOT NULL,
`room_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`user_id` int(11) NOT NULL,
`room_type` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
`category_id` int(11) NOT NULL,
`no_of_que` int(11) NOT NULL,
`questions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
`date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
`id` int(11) NOT NULL,
`type` varchar(512) NOT NULL,
`message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `type`, `message`) VALUES
(1, 'about_us', '<p>Welcome to <strong>Elite Quiz</strong></p>\r\n<p>Best Android app for elite quiz is here. We guarantee you the best quizing experience for your dedicated users.</p>\r\n<p>&nbsp;</p>\r\n<p>Made with &lt;3 by <a href=\"https://wrteam.in\"><strong>WRTeam</strong></a></p>'),
(2, 'contact_us', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>'),
(3, 'instructions', '<p><strong>Instructions</strong></p>\r\n<p>Elite Quiz game has 4 or 5 options</p>\r\n<p>For each right answer 5 points will be given.</p>\r\n<p>Minus 2 points for each question.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Use of Lifeline</strong> : You can use only once per level</p>\r\n<p><strong>50 - 50</strong> : For remove two option out of four (deduct 4 coins).</p>\r\n<p><strong>Skip question</strong> : You can pass question without minus points(deduct 4 coins).</p>\r\n<p><strong>Audience poll</strong> : Use audience poll to&nbsp;check other users choose option(deduct 4&nbsp;coins).</p>\r\n<p><strong>Reset timer</strong> : Reset timer again if you needed more time score (deduct 4 coins).</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Leaderboard</strong></p>\r\n<p>You can compare your score with other&nbsp;users of app.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Contest Rules</strong></p>\r\n<p>To provide fair and equal chance of winning to all Elite Quiz readers, the following are the official rules for all contests on Elite Quiz.</p>\r\n<p><strong>ELIGIBILITY: </strong>All player/users can play contest.</p>\r\n<p><strong>HOW TO ENTER: </strong>User can Play Contest&nbsp;by spending number of coins specified as an entry fees in contest details.</p>\r\n<p><strong>CHOICE OF LAW:&nbsp;</strong>All the Contest and Operations are belongs to WRTeam. and Apple is not involved in any way with the contest.&nbsp;</p>\r\n<p>&nbsp;</p>'),
(4, 'privacy_policy', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>'),
(5, 'terms_conditions', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>'),
(6, 'answer_mode', '1'),
(7, 'false_value', 'False'),
(8, 'true_value', 'True'),
(9, 'app_version', '1.0.0+1'),
(10, 'reward_coin', '4'),
(11, 'earn_coin', '100'),
(12, 'refer_coin', '50'),
(13, 'ios_more_apps', ''),
(14, 'ios_app_link', 'https://testflight.apple.com'),
(15, 'more_apps', ''),
(16, 'app_link', 'https://play.google.com/'),
(17, 'system_timezone_gmt', '+05:30'),
(18, 'system_timezone', 'Asia/Kolkata'),
(19, 'language_mode', '1'),
(20, 'option_e_mode', '0'),
(21, 'quiz_zone_total_level_question', '10'),
(22, 'quiz_zone_fix_level_question', '1'),
(23, 'shareapp_text', 'Hello, This is a \'simple\' share \"text\". User will be happy to read '),
(24, 'contest_mode', '1'),
(25, 'daily_quiz_mode', '1'),
(26, 'force_update', '0'),
(27, 'fcm_server_key', ''),
(28, 'battle_mode_random_category', '1'),
(29, 'battle_group_category_mode', '1'),
(30, 'app_name', 'Elite Quiz'),
(31, 'full_logo', '1705488796.svg'),
(32, 'half_logo', '17054887961.svg'),
(33, 'jwt_key', 'set_your_strong_jwt_secret_key'),
(34, 'system_version', '2.3.3'),
(35, 'system_key', '$2y$10$HzGScX/jWRc0MgE5SIN9Lu7MCpf2D1AV8W1rWbrOkgNRq36n3wjDC'),
(36, 'configuration_key', '$2y$10$Ftv8MRLm5IfAkprJrcnSkelJMoY8uIUcB3RapZW0GopU0SrkkyFR.'),
(38, 'fun_n_learn_question', '1'),
(39, 'guess_the_word_question', '1'),
(40, 'audio_mode_question', '1'),
(41, 'total_audio_time', '10'),
(42, 'app_version_ios', '1.0.0+1'),
(43, 'in_app_ads_mode', '0'),
(44, 'ads_type', '1'),
(45, 'android_banner_id', 'Android Banner Id'),
(46, 'android_interstitial_id', 'Android Interstitial Id'),
(47, 'android_rewarded_id', 'Android Rewarded Id'),
(48, 'ios_banner_id', 'IOS Banner Id'),
(49, 'ios_interstitial_id', 'IOS Interstitial Id'),
(50, 'ios_rewarded_id', 'IOS Rewarded Id'),
(56, 'ios_fb_banner_id', 'YOUR_PLACEMENT_ID'),
(55, 'android_fb_rewarded_id', 'YOUR_PLACEMENT_ID'),
(54, 'android_fb_interstitial_id', 'YOUR_PLACEMENT_ID'),
(53, 'android_fb_banner_id', 'YOUR_PLACEMENT_ID'),
(57, 'ios_fb_interstitial_id', 'YOUR_PLACEMENT_ID'),
(58, 'ios_fb_rewarded_id', 'YOUR_PLACEMENT_ID'),
(59, 'exam_module', '1'),
(60, 'payment_mode', '1'),
(61, 'payment_message', ''),
(62, 'per_coin', '10'),
(63, 'coin_amount', '1'),
(64, 'coin_limit', '100'),
(65, 'self_challenge_mode', '1'),
(66, 'in_app_purchase_mode', '0'),
(67, 'difference_hours', '48'),
(68, 'app_maintenance', '0'),
(69, 'maths_quiz_mode', '1'),
(71, 'android_game_id', 'Android Game Id'),
(72, 'ios_game_id', 'IOS Game Id'),
(73, 'maximum_winning_coins', '4'),
(74, 'minimum_coins_winning_percentage', '70'),
(75, 'score', '4'),
(76, 'quiz_zone_duration', '30'),
(77, 'self_challenge_max_minutes', '30'),
(78, 'guess_the_word_seconds', '60'),
(79, 'maths_quiz_seconds', '30'),
(80, 'fun_and_learn_time_in_seconds', '60'),
(81, 'battle_mode_one', '1'),
(82, 'battle_mode_group', '1'),
(83, 'true_false_mode', '1'),
(84, 'audio_quiz_seconds', '30'),
(85, 'battle_mode_random_in_seconds', '30'),
(86, 'welcome_bonus_coin', '10'),
(87, 'quiz_zone_lifeline_deduct_coin', '10'),
(88, 'battle_mode_random_entry_coin', '5'),
(89, 'guess_the_word_max_winning_coin', '10'),
(90, 'review_answers_deduct_coin', '10'),
(91, 'currency_symbol', '$'),
(92, 'daily_ads_visibility', '0'),
(93, 'daily_ads_coins', '5'),
(94, 'daily_ads_counter', '1'),
(95, 'quiz_zone_mode', '1'),
(96, 'quiz_winning_percentage', '30'),
(97, 'quiz_zone_wrong_answer_deduct_score', '4'),
(98, 'quiz_zone_correct_answer_credit_score', '4'),
(99, 'guess_the_word_fix_question', '0'),
(100, 'guess_the_word_total_question', '10'),
(101, 'guess_the_word_max_hints', '2'),
(102, 'guess_the_word_wrong_answer_deduct_score', '4'),
(103, 'guess_the_word_correct_answer_credit_score', '4'),
(104, 'audio_quiz_fix_question', '1'),
(105, 'audio_quiz_total_question', '10'),
(106, 'audio_quiz_wrong_answer_deduct_score', '4'),
(107, 'audio_quiz_correct_answer_credit_score', '4'),
(108, 'maths_quiz_fix_question', '1'),
(109, 'maths_quiz_total_question', '10'),
(110, 'maths_quiz_wrong_answer_deduct_score', '4'),
(111, 'maths_quiz_correct_answer_credit_score', '4'),
(112, 'fun_n_learn_quiz_fix_question', '1'),
(113, 'fun_n_learn_total_question', '10'),
(114, 'fun_n_learn_quiz_wrong_answer_deduct_score', '4'),
(115, 'fun_n_learn_quiz_correct_answer_credit_score', '4'),
(116, 'true_false_quiz_fix_question', '1'),
(117, 'true_false_total_question', '10'),
(118, 'true_false_quiz_in_seconds', '30'),
(119, 'true_false_quiz_wrong_answer_deduct_score', '4'),
(120, 'fun_n_learn_correct_answer_credit_score', '4'),
(121, 'battle_mode_one_category', '1'),
(122, 'battle_mode_one_fix_question', '1'),
(123, 'battle_mode_one_total_question', '10'),
(124, 'battle_mode_one_in_seconds', '30'),
(125, 'battle_mode_one_wrong_answer_deduct_score', '4'),
(126, 'battle_mode_one_correct_answer_credit_score', '4'),
(127, 'battle_mode_one_quickest_correct_answer_extra_score', '2'),
(128, 'battle_mode_one_second_quickest_correct_answer_extra_score', '1'),
(129, 'battle_mode_one_code_char', '1'),
(130, 'battle_mode_one_entry_coin', '5'),
(131, 'battle_mode_group_category', '1'),
(132, 'battle_mode_group_fix_question', '1'),
(133, 'battle_mode_group_total_question', '10'),
(134, 'battle_mode_group_in_seconds', '30'),
(135, 'battle_mode_group_wrong_answer_deduct_score', '10'),
(136, 'battle_mode_group_correct_answer_credit_score', '10'),
(137, 'battle_mode_group_quickest_correct_answer_extra_score', '10'),
(138, 'battle_mode_group_second_quickest_correct_answer_extra_score', '10'),
(139, 'battle_mode_group_code_char', '1'),
(140, 'battle_mode_group_entry_coin', '5'),
(141, 'battle_mode_random_fix_question', '1'),
(142, 'battle_mode_random_total_question', '10'),
(143, 'battle_mode_random_wrong_answer_deduct_score', '4'),
(144, 'battle_mode_random_correct_answer_credit_score', '4'),
(145, 'battle_mode_random_quickest_correct_answer_extra_score', '2'),
(146, 'battle_mode_random_second_quickest_correct_answer_extra_score', '1'),
(147, 'battle_mode_random_search_duration', '30'),
(148, 'self_challenge_max_questions', '30'),
(149, 'exam_module_resume_exam_timeout', '5'),
(150, 'question_shuffle_mode', '1'),
(151, 'option_shuffle_mode', '1'),
(152, 'battle_mode_random', '1'),
(153, 'true_false_quiz_correct_answer_credit_score', '4'),
(154, 'contest_mode_wrong_deduct_score', '4'),
(155, 'contest_mode_correct_credit_score', '4'),
(156, 'app_package_name', ''),
(157, 'shared_secrets', ''),
(158, 'fun_n_learn_quiz_total_question', '10'),
(159, 'true_false_quiz_total_question', '10'),
(160, 'latex_mode', '0'),
(161, 'exam_latex_mode', '0'),
(162, 'gmail_login', '1'),
(163, 'email_login', '1'),
(164, 'phone_login', '1'),
(165, 'apple_login', '1'),
(166, 'multi_match_mode', '1'),
(167, 'multi_match_fix_level_question', '1'),
(168, 'multi_match_total_level_question', '10'),
(169, 'multi_match_duration', '30'),
(170, 'multi_match_wrong_answer_deduct_score', '10'),
(171, 'multi_match_correct_answer_credit_score', '20'),
(172, 'guess_the_word_hint_deduct_coin', '1'),
(173, 'footer_copyrights_text', ''),
(174, 'theme_color', '#F05387FF');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
`id` int(11) NOT NULL,
`language_id` int(11) NOT NULL,
`image` varchar(255) NOT NULL,
`title` text NOT NULL,
`description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
`id` int(11) NOT NULL,
`language_id` int(11) NOT NULL DEFAULT 0,
`maincat_id` int(11) NOT NULL,
`subcategory_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`slug` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
`image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
`status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Deactive',
`is_premium` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 - no , 1 - yes',
`coins` int(11) NOT NULL DEFAULT 0,
`row_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracker`
--

CREATE TABLE `tbl_tracker` (
`id` int(255) NOT NULL,
`user_id` int(11) NOT NULL,
`uid` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`points` varchar(255) NOT NULL,
`type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`status` tinyint(4) NOT NULL COMMENT '0-add, 1-deduct',
`date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upload_languages`
--

CREATE TABLE `tbl_upload_languages` (
`id` int(11) NOT NULL,
`name` varchar(512) NOT NULL,
`title` varchar(512) NOT NULL,
`app_version` varchar(100) NOT NULL DEFAULT '0',
`web_version` varchar(100) NOT NULL DEFAULT '0',
`app_rtl_support` tinyint(4) NOT NULL DEFAULT 0,
`web_rtl_support` tinyint(4) NOT NULL DEFAULT 0,
`app_status` tinyint(4) NOT NULL DEFAULT 0,
`web_status` tinyint(4) NOT NULL DEFAULT 0,
`app_default` tinyint(4) NOT NULL DEFAULT 0,
`web_default` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_upload_languages`
--

INSERT INTO `tbl_upload_languages` (`id`, `name`, `title`, `app_version`, `web_version`, `app_rtl_support`, `web_rtl_support`, `app_status`, `web_status`, `app_default`, `web_default`) VALUES
(1, 'english', 'English', '0.0.1', '0.0.1', 0, 0, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
`id` int(10) UNSIGNED NOT NULL,
`firebase_id` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
`name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
`email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`mobile` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`type` varchar(16) NOT NULL,
`profile` varchar(128) NOT NULL,
`fcm_id` varchar(1024) DEFAULT NULL,
`web_fcm_id` varchar(1024) DEFAULT NULL,
`coins` int(11) NOT NULL DEFAULT 0,
`refer_code` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
`friends_code` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
`remove_ads` tinyint(4) NOT NULL DEFAULT 0,
`daily_ads_counter` int(11) NOT NULL DEFAULT 0 COMMENT 'Daily ads counter',
`daily_ads_date` date NOT NULL DEFAULT '2023-10-19' COMMENT 'Daily ads date',
`status` int(10) UNSIGNED DEFAULT 0,
`date_registered` datetime NOT NULL,
`api_token` longtext NOT NULL,
`app_language` varchar(512) DEFAULT NULL,
`web_language` varchar(512) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_badges`
--

CREATE TABLE `tbl_users_badges` (
`id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`dashing_debut` int(11) NOT NULL,
`dashing_debut_counter` int(11) NOT NULL,
`combat_winner` int(11) NOT NULL,
`combat_winner_counter` int(11) NOT NULL,
`clash_winner` int(11) NOT NULL,
`clash_winner_counter` int(11) NOT NULL,
`most_wanted_winner` int(11) NOT NULL,
`most_wanted_winner_counter` int(11) NOT NULL,
`ultimate_player` int(11) NOT NULL,
`quiz_warrior` int(11) NOT NULL,
`quiz_warrior_counter` int(11) NOT NULL,
`super_sonic` int(11) NOT NULL,
`flashback` int(11) NOT NULL,
`brainiac` int(11) NOT NULL,
`big_thing` int(11) NOT NULL,
`elite` int(11) NOT NULL,
`thirsty` int(11) NOT NULL,
`thirsty_date` date DEFAULT NULL,
`thirsty_counter` int(11) NOT NULL,
`power_elite` int(11) NOT NULL,
`power_elite_counter` int(11) NOT NULL,
`sharing_caring` int(11) NOT NULL,
`streak` int(11) NOT NULL,
`streak_date` date DEFAULT NULL,
`streak_counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_in_app`
--

CREATE TABLE `tbl_users_in_app` (
`id` int(11) NOT NULL,
`pay_from` tinyint(4) NOT NULL COMMENT '1=android,2=ios',
`uid` longtext NOT NULL,
`user_id` int(11) NOT NULL,
`product_id` text NOT NULL,
`amount` int(11) NOT NULL,
`status` varchar(50) NOT NULL,
`transaction_id` text NOT NULL,
`date` datetime NOT NULL,
`purchase_token` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
`responseData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_statistics`
--

CREATE TABLE `tbl_users_statistics` (
`id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`questions_answered` int(11) NOT NULL,
`correct_answers` int(11) NOT NULL,
`strong_category` int(11) NOT NULL,
`ratio1` double NOT NULL,
`weak_category` int(11) NOT NULL,
`ratio2` double NOT NULL,
`best_position` int(11) NOT NULL,
`date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_category`
--

CREATE TABLE `tbl_user_category` (
`id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_subcategory`
--

CREATE TABLE `tbl_user_subcategory` (
`id` int(11) NOT NULL,
`user_id` int(11) NOT NULL,
`subcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_settings`
--

CREATE TABLE `tbl_web_settings` (
`id` int(11) NOT NULL,
`language_id` int(11) DEFAULT 14,
`type` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
`message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_web_settings`
--

INSERT INTO `tbl_web_settings` (`id`, `language_id`, `type`, `message`) VALUES
(1, 14, 'favicon', 'favicon-1680233344.png'),
(2, 14, 'header_logo', 'header_logo-1679987557.svg'),
(3, 14, 'footer_logo', 'footer_logo-1679987557.svg'),
(4, 14, 'sticky_header_logo', 'sticky_header_logo-1679987557.svg'),
(5, 14, 'quiz_zone_icon', 'quiz_zone_icon-1680083222.svg'),
(6, 14, 'daily_quiz_icon', 'daily_quiz_icon-1680083222.svg'),
(7, 14, 'true_false_icon', 'true_false_icon-1680263423.svg'),
(8, 14, 'fun_learn_icon', 'fun_learn_icon-1680083222.svg'),
(9, 14, 'self_challange_icon', 'self_challange_icon-1680083222.svg'),
(10, 14, 'contest_play_icon', 'contest_play_icon-1680083222.svg'),
(11, 14, 'one_one_battle_icon', 'one_one_battle_icon-1680083222.svg'),
(12, 14, 'group_battle_icon', 'group_battle_icon-1680083222.svg'),
(13, 14, 'audio_question_icon', 'audio_question_icon-1680083222.svg'),
(14, 14, 'math_mania_icon', 'math_mania_icon-1680083222.svg'),
(15, 14, 'exam_icon', 'exam_icon-1680083222.svg'),
(16, 14, 'guess_the_word_icon', 'guess_the_word_icon-1680083222.svg'),
(17, 14, 'section1_heading', 'Why Choose Us Our Elite Quiz'),
(18, 14, 'section1_heading', 'Why Choose Us Our Elite Quiz'),
(19, 14, 'section1_title1', 'Life Lines'),
(20, 14, 'section1_title2', 'Leaderboard'),
(21, 14, 'section1_title3', 'Money Withdrawal'),
(22, 14, 'section1_image1', 'section1_image1.svg'),
(23, 14, 'section1_image2', 'section1_image2.svg'),
(24, 14, 'section1_image3', 'section1_image3.svg'),
(25, 14, 'section1_desc1', 'These lifelines are your secret weapons to help you secure the correct answers during gameplay. Use them wisely to boost your chances of winning!'),
(26, 14, 'section1_desc2', 'Check out our Leaderboard to discover the top scorers in various quizzes. Join the competition and climb the ranks.'),
(27, 14, 'section1_desc3', 'Unlock Money Withdrawal and transform quiz victories into tangible cash rewards. Earn while you quiz!'),
(28, 14, 'section2_heading', 'Incredible Quiz Features'),
(29, 14, 'section2_title1', 'Quizzes by category'),
(30, 14, 'section2_title2', 'Quizzes by Language'),
(31, 14, 'section2_title3', 'Battle Quiz'),
(32, 14, 'section2_title4', 'Guess the Word'),
(33, 14, 'section2_image1', 'section2_image1.svg'),
(34, 14, 'section2_image2', 'section2_image2.svg'),
(35, 14, 'section2_image3', 'section2_image3.svg'),
(36, 14, 'section2_image4', 'section2_image4.svg'),
(37, 14, 'section2_desc1', 'Dive into category-based quizzes for an engaging and informative challenge.'),
(38, 14, 'section2_desc2', 'Explore quizzes tailored to your language preference for a personalized quiz experience.'),
(39, 14, 'section2_desc3', 'Engage in epic quiz battles and prove your knowledge supremacy.'),
(40, 14, 'section2_desc4', 'Put your vocabulary to the test with our challenging Guess the Word Quiz.'),
(41, 14, 'section3_heading', 'Elite QuizBest Part'),
(42, 14, 'section3_title1', 'Regular Udpates'),
(43, 14, 'section3_title2', 'Competitive Fun'),
(44, 14, 'section3_title3', 'Global Community'),
(45, 14, 'section3_title4', 'All-age Inclusivity'),
(46, 14, 'section3_image1', 'section3_image1.svg'),
(47, 14, 'section3_image2', 'section3_image2.svg'),
(48, 14, 'section3_image3', 'section3_image3.svg'),
(49, 14, 'section3_image4', 'section3_image4.svg'),
(50, 14, 'section3_desc1', 'Regularly Updated Quizzes for a Fresh and Exciting Learning Experience.'),
(51, 14, 'section3_desc2', 'Test Your Knowledge and Challenge Others. Compete, Test, Challenge!'),
(52, 14, 'section3_desc3', 'Join the Elite Quiz Global Community and Expand Your Knowledge Together!'),
(53, 14, 'section3_desc4', 'Elite Quiz for Kids, Teens, & Adults - Fun Learning for Everyone!'),
(54, 14, 'section_1_mode', '1'),
(55, 14, 'section_2_mode', '1'),
(56, 14, 'section_3_mode', '1'),
(57, 14, 'notification_title', 'Congratulations !'),
(58, 14, 'notification_body', 'You have unlocked new badge.'),
(59, 14, 'primary_color', '#EF5388FF'),
(60, 14, 'footer_color', '#090029FF'),
(61, 14, 'firebase_api_key', ''),
(62, 14, 'firebase_auth_domain', ''),
(63, 14, 'firebase_database_url', ''),
(64, 14, 'firebase_project_id', ''),
(65, 14, 'firebase_storage_bucket', ''),
(66, 14, 'firebase_messager_sender_id', ''),
(67, 14, 'firebase_app_id', ''),
(68, 14, 'firebase_measurement_id', ''),
(70, 14, 'company_name_footer', 'elite'),
(71, 14, 'email_footer', 'xyz@gmail.com'),
(72, 14, 'phone_number_footer', '+91 9876543210'),
(73, 14, 'web_link_footer', 'https://xyz.in/'),
(74, 14, 'company_text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(75, 14, 'address_text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(76, 14, 'social_media', '[{\"link\":\"https:\\/\\/www.facebook.com\\/\",\"icon\":\"social_media-1723629667.png\"}]'),
(77, 14, 'multi_match_icon', 'multi_match_icon-1746608378.svg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_audio_question`
--
ALTER TABLE `tbl_audio_question`
ADD PRIMARY KEY (`id`),
ADD KEY `category` (`category`),
ADD KEY `subcategory` (`subcategory`) USING BTREE,
ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `tbl_authenticate`
--
ALTER TABLE `tbl_authenticate`
ADD PRIMARY KEY (`auth_id`),
ADD UNIQUE KEY `auth_username` (`auth_username`);

--
-- Indexes for table `tbl_badges`
--
ALTER TABLE `tbl_badges`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_battle_questions`
--
ALTER TABLE `tbl_battle_questions`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `match_id` (`match_id`);

--
-- Indexes for table `tbl_battle_statistics`
--
ALTER TABLE `tbl_battle_statistics`
ADD PRIMARY KEY (`id`),
ADD KEY `user_id1` (`user_id1`),
ADD KEY `user_id2` (`user_id2`);

--
-- Indexes for table `tbl_bookmark`
--
ALTER TABLE `tbl_bookmark`
ADD PRIMARY KEY (`id`),
ADD KEY `user_id` (`user_id`),
ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
ADD PRIMARY KEY (`id`),
ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `tbl_coin_store`
--
ALTER TABLE `tbl_coin_store`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_contest`
--
ALTER TABLE `tbl_contest`
ADD PRIMARY KEY (`id`),
ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `tbl_contest_leaderboard`
--
ALTER TABLE `tbl_contest_leaderboard`
ADD PRIMARY KEY (`id`),
ADD KEY `score` (`score`),
ADD KEY `user_id` (`user_id`),
ADD KEY `contest_id` (`contest_id`);

--
-- Indexes for table `tbl_contest_prize`
--
ALTER TABLE `tbl_contest_prize`
ADD PRIMARY KEY (`id`),
ADD KEY `contest_id` (`contest_id`);

--
-- Indexes for table `tbl_contest_question`
--
ALTER TABLE `tbl_contest_question`
ADD PRIMARY KEY (`id`),
ADD KEY `contest_id` (`contest_id`) USING BTREE;

--
-- Indexes for table `tbl_daily_quiz`
--
ALTER TABLE `tbl_daily_quiz`
ADD PRIMARY KEY (`id`),
ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `tbl_daily_quiz_user`
--
ALTER TABLE `tbl_daily_quiz_user`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exam_module`
--
ALTER TABLE `tbl_exam_module`
ADD PRIMARY KEY (`id`),
ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `tbl_exam_module_question`
--
ALTER TABLE `tbl_exam_module_question`
ADD PRIMARY KEY (`id`),
ADD KEY `category` (`exam_module_id`);

--
-- Indexes for table `tbl_exam_module_result`
--
ALTER TABLE `tbl_exam_module_result`
ADD PRIMARY KEY (`id`),
ADD KEY `exam_module_id` (`exam_module_id`),
ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_fun_n_learn`
--
ALTER TABLE `tbl_fun_n_learn`
ADD PRIMARY KEY (`id`),
ADD KEY `category` (`category`),
ADD KEY `subcategory` (`subcategory`);

--
-- Indexes for table `tbl_fun_n_learn_question`
--
ALTER TABLE `tbl_fun_n_learn_question`
ADD PRIMARY KEY (`id`),
ADD KEY `contest_id` (`fun_n_learn_id`) USING BTREE;

--
-- Indexes for table `tbl_guess_the_word`
--
ALTER TABLE `tbl_guess_the_word`
ADD PRIMARY KEY (`id`),
ADD KEY `category` (`category`),
ADD KEY `subcategory` (`subcategory`);

--
-- Indexes for table `tbl_languages`
--
ALTER TABLE `tbl_languages`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_leaderboard_daily`
--
ALTER TABLE `tbl_leaderboard_daily`
ADD PRIMARY KEY (`id`),
ADD KEY `user_id` (`user_id`,`date_created`);

--
-- Indexes for table `tbl_leaderboard_monthly`
--
ALTER TABLE `tbl_leaderboard_monthly`
ADD PRIMARY KEY (`id`),
ADD KEY `user_id` (`user_id`,`date_created`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
ADD PRIMARY KEY (`id`),
ADD KEY `user_id` (`user_id`),
ADD KEY `category` (`category`),
ADD KEY `subcategory` (`subcategory`);

--
-- Indexes for table `tbl_maths_question`
--
ALTER TABLE `tbl_maths_question`
ADD PRIMARY KEY (`id`),
ADD KEY `category` (`category`),
ADD KEY `subcategory` (`subcategory`) USING BTREE,
ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `tbl_month_week`
--
ALTER TABLE `tbl_month_week`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_multi_match`
--
ALTER TABLE `tbl_multi_match`
ADD PRIMARY KEY (`id`),
ADD KEY `category` (`category`),
ADD KEY `subcategory` (`subcategory`) USING BTREE,
ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `tbl_multi_match_level`
--
ALTER TABLE `tbl_multi_match_level`
ADD PRIMARY KEY (`id`),
ADD KEY `user_id` (`user_id`),
ADD KEY `category` (`category`),
ADD KEY `subcategory` (`subcategory`);

--
-- Indexes for table `tbl_multi_match_question_reports`
--
ALTER TABLE `tbl_multi_match_question_reports`
ADD PRIMARY KEY (`id`),
ADD KEY `question_id` (`question_id`),
ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment_request`
--
ALTER TABLE `tbl_payment_request`
ADD PRIMARY KEY (`id`),
ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
ADD PRIMARY KEY (`id`),
ADD KEY `category` (`category`),
ADD KEY `subcategory` (`subcategory`) USING BTREE,
ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `tbl_question_reports`
--
ALTER TABLE `tbl_question_reports`
ADD PRIMARY KEY (`id`),
ADD KEY `question_id` (`question_id`),
ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_quiz_categories`
--
ALTER TABLE `tbl_quiz_categories`
ADD PRIMARY KEY (`id`),
ADD KEY `user_id` (`user_id`),
ADD KEY `type` (`type`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
ADD PRIMARY KEY (`id`),
ADD KEY `user_id` (`user_id`),
ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
ADD PRIMARY KEY (`id`),
ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
ADD PRIMARY KEY (`id`),
ADD KEY `language_id` (`language_id`),
ADD KEY `maincat_id` (`maincat_id`);

--
-- Indexes for table `tbl_tracker`
--
ALTER TABLE `tbl_tracker`
ADD PRIMARY KEY (`id`),
ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_upload_languages`
--
ALTER TABLE `tbl_upload_languages`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
ADD PRIMARY KEY (`id`),
ADD KEY `email` (`email`,`mobile`),
ADD KEY `firebase_id` (`firebase_id`(333)),
ADD KEY `fcm_id` (`fcm_id`(333)),
ADD KEY `web_fcm_id` (`web_fcm_id`(333));

--
-- Indexes for table `tbl_users_badges`
--
ALTER TABLE `tbl_users_badges`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_in_app`
--
ALTER TABLE `tbl_users_in_app`
ADD PRIMARY KEY (`id`),
ADD KEY `user_id` (`user_id`),
ADD KEY `uid` (`uid`(3072)),
ADD KEY `product_id` (`product_id`(3072));

--
-- Indexes for table `tbl_users_statistics`
--
ALTER TABLE `tbl_users_statistics`
ADD PRIMARY KEY (`id`),
ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_user_category`
--
ALTER TABLE `tbl_user_category`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `user_id` (`user_id`,`category_id`);

--
-- Indexes for table `tbl_user_subcategory`
--
ALTER TABLE `tbl_user_subcategory`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `user_id` (`user_id`,`subcategory_id`);

--
-- Indexes for table `tbl_web_settings`
--
ALTER TABLE `tbl_web_settings`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_audio_question`
--
ALTER TABLE `tbl_audio_question`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_authenticate`
--
ALTER TABLE `tbl_authenticate`
MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_badges`
--
ALTER TABLE `tbl_badges`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_battle_questions`
--
ALTER TABLE `tbl_battle_questions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_battle_statistics`
--
ALTER TABLE `tbl_battle_statistics`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bookmark`
--
ALTER TABLE `tbl_bookmark`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_coin_store`
--
ALTER TABLE `tbl_coin_store`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contest`
--
ALTER TABLE `tbl_contest`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contest_leaderboard`
--
ALTER TABLE `tbl_contest_leaderboard`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contest_prize`
--
ALTER TABLE `tbl_contest_prize`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contest_question`
--
ALTER TABLE `tbl_contest_question`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_daily_quiz`
--
ALTER TABLE `tbl_daily_quiz`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_daily_quiz_user`
--
ALTER TABLE `tbl_daily_quiz_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_exam_module`
--
ALTER TABLE `tbl_exam_module`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_exam_module_question`
--
ALTER TABLE `tbl_exam_module_question`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_exam_module_result`
--
ALTER TABLE `tbl_exam_module_result`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_fun_n_learn`
--
ALTER TABLE `tbl_fun_n_learn`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_fun_n_learn_question`
--
ALTER TABLE `tbl_fun_n_learn_question`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_guess_the_word`
--
ALTER TABLE `tbl_guess_the_word`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_languages`
--
ALTER TABLE `tbl_languages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_leaderboard_daily`
--
ALTER TABLE `tbl_leaderboard_daily`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_leaderboard_monthly`
--
ALTER TABLE `tbl_leaderboard_monthly`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_maths_question`
--
ALTER TABLE `tbl_maths_question`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_month_week`
--
ALTER TABLE `tbl_month_week`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_multi_match`
--
ALTER TABLE `tbl_multi_match`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_multi_match_level`
--
ALTER TABLE `tbl_multi_match_level`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_multi_match_question_reports`
--
ALTER TABLE `tbl_multi_match_question_reports`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payment_request`
--
ALTER TABLE `tbl_payment_request`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_question_reports`
--
ALTER TABLE `tbl_question_reports`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_quiz_categories`
--
ALTER TABLE `tbl_quiz_categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tracker`
--
ALTER TABLE `tbl_tracker`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_upload_languages`
--
ALTER TABLE `tbl_upload_languages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users_badges`
--
ALTER TABLE `tbl_users_badges`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users_in_app`
--
ALTER TABLE `tbl_users_in_app`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users_statistics`
--
ALTER TABLE `tbl_users_statistics`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_category`
--
ALTER TABLE `tbl_user_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_subcategory`
--
ALTER TABLE `tbl_user_subcategory`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_web_settings`
--
ALTER TABLE `tbl_web_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;