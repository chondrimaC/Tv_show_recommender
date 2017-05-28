-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2017 at 06:12 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recommender_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bangla_genre`
--

CREATE TABLE `bangla_genre` (
  `id` int(10) NOT NULL,
  `genre_name` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bangla_genre`
--

INSERT INTO `bangla_genre` (`id`, `genre_name`) VALUES
(11, 'Adventure'),
(10, 'Animation'),
(2, 'Comedy'),
(13, 'Detective'),
(8, 'Documentary'),
(1, 'Drama'),
(4, 'Family'),
(12, 'Fantasy'),
(5, 'Mystery'),
(7, 'Reality'),
(3, 'Romance'),
(9, 'Supernatural'),
(14, 'Talk Show'),
(6, 'Thriller');

-- --------------------------------------------------------

--
-- Table structure for table `bangla_list`
--

CREATE TABLE `bangla_list` (
  `show_id` varchar(10) NOT NULL,
  `show_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bangla_list`
--

INSERT INTO `bangla_list` (`show_id`, `show_name`) VALUES
('s1', 'Mon theke dure noi'),
('s10', 'Badol Diner Prothom Kodom Ful'),
('s11', 'Dokkhinayoner Din'),
('s12', 'Ochena Protibimbo'),
('s13', 'Tarun Turki'),
('s14', 'PITA'),
('s15', 'BENE BOU'),
('s16', 'Ki Kore Toke Bolbo'),
('s17', 'Motu Patlu'),
('s18', 'Dashi'),
('s19', 'Dweep Jwele Jai'),
('s2', 'Crime Petrol'),
('s20', 'STREE'),
('s21', 'BHUTU'),
('s22', 'RAADHA'),
('s23', 'Dadagiri Unlimited'),
('s24', 'Ichche Nodee'),
('s25', 'Khokababu'),
('s26', 'Rakhi Bandhan'),
('s3', 'Dohon'),
('s4', 'Nir Khoje Gangchil'),
('s5', 'Raju 420'),
('s6', 'Bohubrihi'),
('s7', 'Kothao Keu Nei'),
('s8', 'Aaj Robibar'),
('s9', 'Bishaash');

-- --------------------------------------------------------

--
-- Table structure for table `bangla_show_genre`
--

CREATE TABLE `bangla_show_genre` (
  `show_id` varchar(10) NOT NULL,
  `genre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bangla_show_genre`
--

INSERT INTO `bangla_show_genre` (`show_id`, `genre`) VALUES
('s1', 1),
('s2', 5),
('s2', 6),
('s2', 7),
('s2', 8),
('s3', 1),
('s4', 2),
('s4', 3),
('s5', 1),
('s5', 2),
('s6', 2),
('s7', 2),
('s7', 4),
('s8', 2),
('s8', 1),
('s9', 1),
('s9', 9),
('s9', 11),
('s9', 5),
('s9', 12),
('s9', 13),
('s10', 1),
('s11', 1),
('s12', 1),
('s13', 1),
('s14', 4),
('s15', 4),
('s15', 3),
('s16', 3),
('s17', 10),
('s18', 1),
('s19', 3),
('s20', 3),
('s21', 2),
('s22', 2),
('s22', 3),
('s24', 3),
('s25', 2),
('s25', 3),
('s26', 2);

-- --------------------------------------------------------

--
-- Table structure for table `english_genre`
--

CREATE TABLE `english_genre` (
  `genre_id` int(10) NOT NULL,
  `genre_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `english_genre`
--

INSERT INTO `english_genre` (`genre_id`, `genre_name`) VALUES
(1, 'Drama'),
(2, 'Comedy'),
(3, 'Romance'),
(4, 'Family'),
(5, 'Mystery'),
(6, 'Thriller'),
(7, 'Reality'),
(8, 'Documentary'),
(9, 'Animation'),
(10, 'Adventure'),
(11, 'Fantasy'),
(12, 'Action'),
(13, 'Crime'),
(14, 'Talk Show'),
(15, 'Horror'),
(16, 'Sci-Fi'),
(17, 'History');

-- --------------------------------------------------------

--
-- Table structure for table `english_show_genre`
--

CREATE TABLE `english_show_genre` (
  `show_id` varchar(20) NOT NULL,
  `genre_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `english_show_genre`
--

INSERT INTO `english_show_genre` (`show_id`, `genre_id`) VALUES
('tt0455275', 12),
('tt0455275', 13),
('tt1796960', 5),
('tt1796960', 13),
('tt0369179', 2),
('tt0369179', 3),
('tt0320037', 2),
('tt0320037', 14),
('tt4428122', 5),
('tt4428122', 13),
('tt0445883', 2),
('tt0445883', 14),
('tt4094300', 2),
('tt3205802', 5),
('tt3205802', 13),
('tt1442437', 2),
('tt1442437', 3),
('tt2741602', 5),
('tt2741602', 13),
('tt0773262', 5),
('tt0773262', 13),
('tt1475582', 5),
('tt1475582', 13),
('tt0460681', 11),
('tt0460681', 15),
('tt2191671', 5),
('tt2191671', 13),
('tt0218787', 8),
('tt0096697', 2),
('tt0096697', 9),
('tt0944947', 10),
('tt0944947', 11),
('tt0452046', 5),
('tt0452046', 13),
('tt2712740', 2),
('tt1844624', 6),
('tt1844624', 15),
('tt4052886', 11),
('tt4052886', 13),
('tt3107288', 10),
('tt3107288', 12),
('tt2193021', 10),
('tt2193021', 12),
('tt2193021', 13),
('tt4532368', 10),
('tt4532368', 12),
('tt3501584', 2),
('tt3501584', 13),
('tt0182576', 2),
('tt0182576', 9),
('tt3228904', 1),
('tt3749900', 13),
('tt3749900', 12),
('tt1826940', 2),
('tt4798814', 2),
('tt4798814', 9),
('tt5345490', 12),
('tt5345490', 13),
('tt1520211', 6),
('tt1520211', 15),
('tt0106179', 5),
('tt0106179', 16),
('tt0412142', 1),
('tt0412142', 5),
('tt0303461', 10),
('tt0303461', 16),
('tt0436992', 4),
('tt0436992', 10),
('tt1856010', 1),
('tt1188927', 5),
('tt1188927', 13),
('tt2442560', 13),
('tt3636060', 3),
('tt3636060', 17),
('tt2306299', 12),
('tt2306299', 17),
('tt2245988', 8),
('tt2245988', 12),
('tt5807292', 12),
('tt5807292', 17),
('tt0413573', 3),
('tt1843230', 3),
('tt1843230', 10),
('tt1843230', 11),
('tt2364582', 12),
('tt2364582', 16),
('tt3475734', 10),
('tt3475734', 12),
('tt3475734', 16),
('tt1219024', 2),
('tt1219024', 13),
('tt0411008', 10),
('tt0411008', 11),
('tt0118276', 11),
('tt0118276', 12),
('tt0279600', 3),
('tt0279600', 10),
('tt0343314', 9),
('tt0343314', 10),
('tt0343314', 12),
('tt5807292', 8);

-- --------------------------------------------------------

--
-- Table structure for table `english_show_list`
--

CREATE TABLE `english_show_list` (
  `show_id` varchar(20) NOT NULL,
  `show_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `english_show_list`
--

INSERT INTO `english_show_list` (`show_id`, `show_name`) VALUES
('tt0096697', 'The Simpsons'),
('tt0106179', 'The X-Files'),
('tt0118276', 'Buffy the Vampire Slayer'),
('tt0182576', 'Family Guy'),
('tt0218787', 'Ripley''s Believe It or Not'),
('tt0279600', 'Smallville'),
('tt0303461', 'Firefly'),
('tt0320037', 'Jimmy Kimmel Live!'),
('tt0343314', 'Teen Titans'),
('tt0369179', 'Two and a Half Men'),
('tt0411008', 'Lost'),
('tt0412142', 'House'),
('tt0413573', 'Grey''s Anatomy'),
('tt0436992', 'Doctor Who'),
('tt0445883', 'Koffee with Karan'),
('tt0452046', 'Criminal Minds'),
('tt0455275', 'Prison Break'),
('tt0460681', 'Supernatural'),
('tt0773262', 'Dexter'),
('tt0944947', 'Game of Thrones'),
('tt1188927', 'Criminal Justice'),
('tt1219024', 'Castle'),
('tt1442437', 'Modern Family'),
('tt1475582', 'Sherlock'),
('tt1520211', 'The Walking Dead'),
('tt1796960', 'Homeland'),
('tt1826940', 'New Girl'),
('tt1843230', 'Once Upon a Time'),
('tt1844624', 'American Horror Story'),
('tt1856010', 'House of Cards'),
('tt2191671', 'Elementary'),
('tt2193021', 'Arrow'),
('tt2245988', 'The Bible'),
('tt2306299', 'Vikings'),
('tt2364582', 'Agents of S.H.I.E.L.D.'),
('tt2442560', 'Peaky Blinders'),
('tt2712740', 'The Goldbergs'),
('tt2741602', 'The Blacklist'),
('tt3107288', 'The Flash'),
('tt3205802', 'How to Get Away with Murder'),
('tt3228904', 'Empire'),
('tt3475734', 'Agent Carter'),
('tt3501584', 'iZombie'),
('tt3636060', 'Poldark'),
('tt3749900', 'Gotham'),
('tt4052886', 'Lucifer'),
('tt4094300', 'Crazy Ex-Girlfriend'),
('tt4428122', 'Quantico'),
('tt4532368', 'Legends of Tomorrow'),
('tt4798814', 'Son of Zorn'),
('tt5345490', '24: Legacy'),
('tt5807292', 'Barbarians Rising');

-- --------------------------------------------------------

--
-- Table structure for table `hindi_genre`
--

CREATE TABLE `hindi_genre` (
  `genre_id` int(10) NOT NULL,
  `genre_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hindi_genre`
--

INSERT INTO `hindi_genre` (`genre_id`, `genre_name`) VALUES
(1, 'Drama'),
(2, 'Comedy'),
(3, 'Romance'),
(4, 'Family'),
(5, 'Thriller'),
(6, 'Reality'),
(7, 'Documentary'),
(8, 'Fantasy'),
(9, 'Crime'),
(10, 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `hindi_show_genre`
--

CREATE TABLE `hindi_show_genre` (
  `show_id` varchar(10) NOT NULL,
  `genre_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hindi_show_genre`
--

INSERT INTO `hindi_show_genre` (`show_id`, `genre_id`) VALUES
('h1', 3),
('h2', 3),
('h3', 1),
('h4', 3),
('h5', 1),
('h6', 3),
('h6', 4),
('h7', 3),
('h7', 8),
('h8', 1),
('h9', 1),
('h10', 3),
('h10', 4),
('h11', 6),
('h11', 7),
('h12', 3),
('h12', 5),
('h13', 3),
('h14', 6),
('h14', 7),
('h15', 3),
('h15', 8),
('h16', 6),
('h16', 7),
('h16', 9),
('h17', 2),
('h18', 9),
('h18', 10),
('h18', 3),
('h18', 5),
('h19', 4),
('h20', 3),
('h20', 4),
('h21', 3);

-- --------------------------------------------------------

--
-- Table structure for table `hindi_show_list`
--

CREATE TABLE `hindi_show_list` (
  `show_id` varchar(50) NOT NULL,
  `show_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hindi_show_list`
--

INSERT INTO `hindi_show_list` (`show_id`, `show_name`) VALUES
('h1', 'Ye Hai Mohabbatein'),
('h10', 'Ek Shringaar-Swabhiman'),
('h11', 'Crime Patrol'),
('h12', 'Beyhadh'),
('h13', 'Ek Rishta Saajhedari Ka'),
('h14', 'Peshwa Bajirao'),
('h15', 'Kuch Rang Pyar Ke Aise Bhi'),
('h16', 'Savdhaan India'),
('h17', 'Har Mard Ka Dard'),
('h18', 'Ghulaam'),
('h19', 'Sanyukt'),
('h2', 'Naamkarann'),
('h20', 'Kumkum Bhagya'),
('h21', 'Kaala Teeka'),
('h3', 'Ishqbaaaz'),
('h4', 'Pardes Mein Hai Mera Dil'),
('h5', 'Meri Durga'),
('h6', 'Shakti — Astitva Ke Ehsaas Ki'),
('h7', 'Kasam'),
('h8', 'UDAAN'),
('h9', 'Devanshi');

-- --------------------------------------------------------

--
-- Table structure for table `question_answer`
--

CREATE TABLE `question_answer` (
  `Sl_no` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `query1` varchar(20) NOT NULL,
  `query2` varchar(20) NOT NULL,
  `query3` varchar(20) NOT NULL,
  `query4` varchar(20) NOT NULL,
  `query5` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question_answer`
--

INSERT INTO `question_answer` (`Sl_no`, `username`, `full_name`, `query1`, `query2`, `query3`, `query4`, `query5`) VALUES
(1, '755725751242728', 'Chondrima Chowdhury', '1', '2', 's1', 'h4', 'tt0455275'),
(2, 'Ahijit ', 'Ahijit Chowdhury', '10', '5', 's2', 'h8', 'tt0773262'),
(3, 'Aradhya', 'Aradhuya Sebika', '8', '3', 's5', 'h16', 'tt1475582'),
(4, 'Ashit', 'Ashit Kanti Chowdhury ', '1', '2', 's6', 'h1', 'tt0460681'),
(5, 'Aurin', 'Aurin Mehjabin', '1', '4', 's6', 'h9', 'tt0944947'),
(6, 'Chondrima', 'Chondrima Chowdhury', '10', '2', 's1', 'h1', 'tt0455275'),
(7, 'Etu', 'Etu Chowdhury', '1', '11', 's7', 'h16', 'tt3107288'),
(8, 'Eva', 'Nahid Eva', '14', '2', 's8', 'h11', 'tt2193021'),
(9, 'Iffat', 'Iffat Jannat', '10', '2', 's9', 'h11', 'tt4532368'),
(10, 'Najia', 'Najia Sultana', '1', '7', 's6', 'h16', 'tt5345490'),
(11, 'Nishat', 'Nishat Farjana', '14', '3', 's7', 'h21', 'tt1520211'),
(12, 'Parama', 'Parama Chowdhury', '14', '6', 's1', 'h20', 'tt0106179'),
(13, 'Poly', 'Poly Das', '1', '3', 's4', 'h19', 'tt0412142'),
(14, 'Sazid', 'Sazidur Rahman', '1', '2', 's6', 'h17', 'tt3636060'),
(15, 'Shamit', 'Shamit Das', '14', '12', 's7', 'h16', 'tt2306299'),
(16, 'Sharad', 'Sharad Chowdhury', '14', '6', 's8', 'h15', 'tt2245988'),
(17, 'Shuvajit', 'Shuvajit Das', '8', '7', 's9', 'h14', 'tt5807292'),
(18, 'Singsing', 'Singsing Talukdar', '10', '11', 's25', 'h13', 'tt0413573'),
(19, 'Sudrity', 'Sudrity Das', '10', '9', 's24', 'h11', 'tt1843230'),
(20, 'Tapati', 'Tapati Chowdhury', '8', '3', 's23', 'h10', 'tt2364582'),
(21, 'Tarit', 'Tarit Kanti Chowdhury', '10', '5', 's23', 'h9', 'tt0411008'),
(22, 'Tropa', 'Saborny Sengupta', '10', '12', 's23', 'h8', 'tt0214341'),
(23, 'Pinky', 'Pinky Chowdhury', '1', '2', 's21', 'h7', 'tt0374463'),
(24, 'Dipti', 'Dipti Das', '8', '3', 's25', 'h6', 'tt0343314'),
(25, 'Dipta', 'Dipta Das', '8', '11', 's21', 'h1', 'tt0279600'),
(26, 'Sanjid', 'Sanjid Sultana', '10', '12', 's5', 'h2', 'tt0455275'),
(27, 'Abhijit', 'Avijit Chowdhury', '8', '2', 's1', 'h21', 'tt0455275'),
(28, 'Avijit', 'Avijit Das', '1', '3', 's2', 'h9', 'tt0944947'),
(29, 'Urmi', 'Urmi Das', '14', '11', 's5', 'h17', 'tt0944947'),
(30, 'Akram', 'Akram Khan', '10', '12', 's1', 'h3', 'tt0944947'),
(31, 'Nipa', 'Nipa Das', '10', '13', 's2', 'h9', 'tt2364582'),
(32, 'Mifta', 'MIftaul Jannat', '1', '6', 's6', 'h6', 'tt3107288'),
(33, 'Bristy', 'Sumaiya Bristy ', '1', '7', 's7', 'h4', 'tt3107288'),
(34, 'Arif', 'Arif Khan', '1', '5', 's8', 'h15', 'tt0944947'),
(35, 'Emdad', 'Emdad Khan', '10', '4', 's9', 'h11', 'tt2193021'),
(36, 'Biman ', 'Biman Saha', '10', '9', 's10', 'h19', 'tt2306299'),
(37, 'Anindita', 'Anindita Saha', '8', '9', 's26', 'h9', 'tt2306299'),
(38, 'Dip', 'Dip Saha', '1', '4', 's25', 'h4', 'tt0106179'),
(39, 'Mithun', 'Mithun Das', '10', '7', 's24', 'h1', 'tt0106179'),
(40, 'Bayezid', 'Bayezid Islam', '8', '11', 's23', 'h1', 'tt2442560'),
(41, 'Osman', 'Osman Goni', '1', '12', 's23', 'h16', 'tt1520211'),
(42, 'Pranab', 'Pranab Kumar', '10', '11', 's25', 'h11', 'tt1520211'),
(43, 'Pranata', 'Pranata Dhar', '8', '12', 's21', 'h11', 'tt0412142'),
(44, 'Tarun', 'Tarun', '1', '2', 's20', 'h10', 'tt4532368'),
(45, 'Uttam', 'Uttam Kumar', '1', '3', 's19', 'h9', 'tt0944947'),
(46, 'Sucharita', 'Sucharita Barua', '8', '3', 's19', 'h8', 'tt0455275'),
(47, 'Nabonita', 'Nabonita Barua', '10', '2', 's21', 'h7', 'tt0369179'),
(48, 'Mouni', 'Mouni Sharmin', '14', '13', 's17', 'h6', 'tt0320037'),
(49, 'Anik', 'Anik Saha', '14', '5', 's17', 'h4', 'tt0108778'),
(50, 'Hoimanti', 'Hoimanti Saha', '10', '6', 's15', 'h1', 'tt0108778'),
(51, 'Sujan', 'Sujan Chowdhury', '1', '2', 's21', 'h1', 'tt0944947'),
(52, 'Fujaila', 'Fujaila Tarin', '1', '6', 's23', 'h11', 'tt0455275');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `Username` varchar(220) NOT NULL,
  `Password` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Username`, `Password`) VALUES
('Ahijit_chowdhury', 'ahijit'),
('Arefin', 'arefin'),
('Ashit', 'ashit'),
('Chondrima', 'chondrima'),
('Dipta', 'dipta'),
('Dipti', 'dipti'),
('Etu', 'etu'),
('Eva', 'eva'),
('Fahima', 'fahima'),
('Najia', 'najia'),
('Parama', 'parama'),
('Poly', 'poly'),
('Samit', 'samit'),
('Sazid', 'sazid'),
('Sharad', 'sharad'),
('Singsing', 'singsing'),
('Sudrity', 'sudrity'),
('Sujan', 'sujan'),
('Tapati', 'tapati'),
('Tarit', 'tarit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangla_genre`
--
ALTER TABLE `bangla_genre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genre_name` (`genre_name`);

--
-- Indexes for table `bangla_list`
--
ALTER TABLE `bangla_list`
  ADD PRIMARY KEY (`show_id`);

--
-- Indexes for table `english_genre`
--
ALTER TABLE `english_genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `english_show_list`
--
ALTER TABLE `english_show_list`
  ADD PRIMARY KEY (`show_id`);

--
-- Indexes for table `hindi_genre`
--
ALTER TABLE `hindi_genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `hindi_show_list`
--
ALTER TABLE `hindi_show_list`
  ADD PRIMARY KEY (`show_id`);

--
-- Indexes for table `question_answer`
--
ALTER TABLE `question_answer`
  ADD PRIMARY KEY (`Sl_no`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`Username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
