-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 09:04 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_travels`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `CATEGORY_ID` varchar(50) NOT NULL,
  `PARENT_ID` varchar(50) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `METATITLE` varchar(100) NOT NULL,
  `SLUG` varchar(50) NOT NULL,
  `CONTENT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`CATEGORY_ID`, `PARENT_ID`, `TITLE`, `METATITLE`, `SLUG`, `CONTENT`) VALUES
('111', '', 'India', '', '', ''),
('112', '', 'Dubai', '', '', ''),
('113', '', 'Australia', '', '', ''),
('114', '', 'Brazil', '', '', ''),
('115', '', 'Italy', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `member_details`
--

CREATE TABLE `member_details` (
  `USER_ID` varchar(50) NOT NULL,
  `FIRST_NAME` varchar(50) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `MOBILE` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `PROFILE` varchar(50) NOT NULL,
  `INTRO` varchar(100) NOT NULL,
  `LAST_LOGIN` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_details`
--

INSERT INTO `member_details` (`USER_ID`, `FIRST_NAME`, `LAST_NAME`, `MOBILE`, `EMAIL`, `DOB`, `PASSWORD`, `PROFILE`, `INTRO`, `LAST_LOGIN`) VALUES
('101', 'Himanshu', 'Patil', '8082512517', 'himanshumilindpatil@gmail.com', '1994-11-07', '123456', 'Author', '', '2020-09-22 12:24:29'),
('102', 'Akanksha', 'Parulekar', '9890830559', 'abc@abc.com', '0000-00-00', '123', 'Guest', '', '2020-09-22 12:22:14'),
('103', 'Hema', 'Korlekar', '7261905141', 'abv@bvd.com', '0000-00-00', '123', 'Guest', '', '2020-09-20 19:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `post_category_table`
--

CREATE TABLE `post_category_table` (
  `POST_ID` varchar(50) NOT NULL,
  `CATEGORY_ID` varchar(50) NOT NULL,
  `DELFLAG` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-NOt Deleted, 2- Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_category_table`
--

INSERT INTO `post_category_table` (`POST_ID`, `CATEGORY_ID`, `DELFLAG`) VALUES
('201', '111', 1),
('202', '111', 1),
('203', '111', 1),
('204', '112', 1),
('205', '112', 1),
('206', '113', 1),
('207', '113', 1),
('208', '113', 1),
('209', '114', 1),
('210', '115', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_details`
--

CREATE TABLE `post_details` (
  `POST_ID` varchar(50) NOT NULL,
  `USER_ID` varchar(50) NOT NULL,
  `PARENT_ID` varchar(50) NOT NULL,
  `TITLE` varchar(50) NOT NULL,
  `SLUG` varchar(50) NOT NULL,
  `SUMMARY` varchar(500) NOT NULL,
  `PUBLISHED` tinyint(4) NOT NULL COMMENT '1-Published, 2-Unpublished',
  `DATE_CREATED` datetime NOT NULL,
  `DATE_MODIFIED` datetime NOT NULL,
  `PUBLISHED_ON` date NOT NULL,
  `CONTENT` longtext NOT NULL,
  `DELFLAG` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1- Not Deleted, 2- Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_details`
--

INSERT INTO `post_details` (`POST_ID`, `USER_ID`, `PARENT_ID`, `TITLE`, `SLUG`, `SUMMARY`, `PUBLISHED`, `DATE_CREATED`, `DATE_MODIFIED`, `PUBLISHED_ON`, `CONTENT`, `DELFLAG`) VALUES
('201', '101', '', 'The Hampi Trail', '', 'Marvelous Place to Visit, Highly Recommended', 1, '2020-09-21 12:02:25', '2020-09-21 12:02:25', '2020-09-21', 'So this is the description of Hampi.\r\nKishkinda is a part of Hampi.\r\nThe place where Hanuman met Lord Rama and where The Great Vali died.\r\nSenile surrounding. One of the highest-rated place in India.', 1),
('202', '101', '', 'Ooty, Tamil Nadu', '', 'Hill station, Blissful Environment', 1, '2020-09-21 12:13:13', '2020-09-21 12:13:13', '2020-09-21', 'Nestled amidst Nilgiri hills, Oooty, is also known as Udagamandalam, is a hill station in Tamil Nadu which serves as a top-rated tourist destination.', 1),
('203', '101', '', 'Himachal Pradesh', '', 'Land of God', 1, '2020-09-21 12:21:45', '2020-09-21 12:21:45', '2020-09-21', 'Endowed with lofty Himalayan mountains, ancient religious sites and a cheerful culture, Himachal Pardesh is home to famous tourist destinations like Kullu, Manali, Chamba and Shimla', 1),
('204', '101', '', 'Burj Khalifa', '', 'The Tallest Building', 1, '2020-09-21 12:21:45', '2020-09-21 12:21:45', '2020-09-21', 'Burj Khalifa, as popularly known as the tallest building is situated in Dubai.\r\nThe top view from 147th floor is amazing and also the ground floor is openend to people as mall.\r\nTop 4 floors are residential floors.', 1),
('205', '101', '', 'Al-ain Zoo', '', 'One of the best zoo to visit', 1, '2020-09-21 12:21:45', '2020-09-21 12:21:45', '2020-09-21', 'Al-ain Zoo is one of the best zoo to visit with number of varities of animals.\r\nPeople can also rest and have family time in small areas situated at various interval.\r\nThere is a mini train which takes the tourist around the zoo.', 1),
('206', '101', '', 'Cruise Michaelmas Cay ', '', 'Michaelmas Cay, Great Barrier Reef, Queensland.', 1, '2020-09-21 19:56:19', '2020-09-21 19:56:19', '2020-09-21', 'Visit the Great Barrier Reef in style on board Ocean Spirit, a 32-metre (105-foot), high-performance catamaran. It sails daily from Cairns to Michaelmas Cay, a stunning reef sand island. You can dive and snorkel the reef among the turtles and colourful fish, lie on the deck and soak up the sun or enjoy a glass-bottomed boat tour. Michaelmas Cay is also home to more than 23 species of seabird and is one of the most significant bird sanctuaries on the Great Barrier Reef.', 1),
('207', '101', '', 'Seaplane over Heart Reef', '', 'Heart Reef, The Whitsundays, Queensland.\r\n', 1, '2020-09-21 19:56:19', '2020-09-21 19:56:19', '2020-09-21', 'Create the perfect romantic surprise for a loved one by flying over the world-famous natural wonder, Heart Reef. From above, you\'ll not only marvel at the pure turquoise waters, but also see the composition of coral that has naturally shaped itself into a heart. This scenic flight is just one of the tours offered by Air Whitsunday and GSL Aviation, with the white silica sand of Whitehaven Beach on Whitsunday Island also on the menu.', 1),
('208', '101', '', 'Cruise the Agincourt Reef', '', 'Scuba diving at Agincourt Reef, Tropical North Queensland\r\n', 1, '2020-09-21 19:56:19', '2020-09-21 19:56:19', '2020-09-21', 'Agincourt Reef is home to over 16 different dive sites, making it a popular destinations for divers and snorkellers. Quicksilver Cruises will take you on a journey to the renowned jewel-like ribbon reef on the very edge of the Great Barrier Reef. From the spacious activity platform you can snorkel, dive and helmet walk in an underwater world filled with a kaleidoscope of colour and brilliance. ', 1),
('209', '101', '', 'Cristo Redentor and Corcovado', '', 'Cristo Redentor and Corcovado, Rio de Janeiro', 1, '2020-09-21 20:21:48', '2020-09-21 20:21:55', '2020-09-21', 'With arms outstretched 28 meters, as if to encompass all of humanity, the colossal Art Deco statue of Christ, called Cristo Redentor (Christ the Redeemer), gazes out over Rio de Janeiro and the bay from the summit of Corcovado.\r\n\r\nThe 709-meter height on which it stands is part of the Tijuca National Park, and a rack railway climbs 3.5 kilometers to its top, where a broad plaza surrounds the statue. Completed in 1931, the 30-meter statue was the work of Polish-French sculptor Paul Landowski and Brazilian engineer Heitor da Silva Costa, and is constructed of reinforced concrete and soapstone.\r\n\r\nThe eight-meter base encloses a chapel that is popular for weddings. Although this is one of Brazil\'s most readily recognized icons, it is often mistakenly called The Christ of the Andes, confused with the older statue marking the boundary between Argentina and Chile.\r\n\r\nA mid-point stop on the railway leads to trails through the Tijuca National Park, a huge forest that protects springs, waterfalls, and a wide variety of tropical birds, butterflies, and plants. Several more viewpoints open out within the park.', 1),
('210', '101', '', 'Rome', '', 'Rome. Just hearing the name conjures up some of the most famous landmarks in the world…the Colosseum, the Sistine Chapel, and the Vatican. ', 1, '2020-09-21 20:21:59', '2020-09-21 20:22:06', '2020-09-21', 'Rome. Just hearing the name conjures up some of the most famous landmarks in the world…the Colosseum, the Sistine Chapel, and the Vatican. The history here spans 28 centuries, making Rome one of the oldest inhabited cites in Europe (and one of the best places to visit in Italy).\r\n\r\nThis city is a wonderful blend of historical sites, charming piazzas and neighborhoods, world-class museums, and iconic sites. For the first-time visitor, Rome belongs at or near the top of your list. It’s a big, bustling city but the main sites are clustered around the historic city center.\r\n\r\nTop Experiences: The Colosseum, the Pantheon, Trevi Fountain, the Vatican Museum and Sistine Chapel, and the Borghese Museum. Walk through the historic heart of Rome, explore Piazza Navona and Campo de Fiori, and have dinner in Trastevere.\r\n\r\nIdeas for Traveling with Kids: Rent bikes and bike the Appian Way. It’s a fun way to spend a morning or afternoon and it’s the perfect sightseeing break for kids.\r\n\r\nHow Much Time Should You Spend in Rome? You can hit the main sites in a rushed one-day tour of the city. With two to three busy days you can visit the highlights, what we list above under top experiences. With even more time, you can explore Rome’s nooks and crannies, take a food tour, and venture off-the-beaten-path.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD UNIQUE KEY `CATEGORY_ID` (`CATEGORY_ID`);

--
-- Indexes for table `member_details`
--
ALTER TABLE `member_details`
  ADD UNIQUE KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `post_category_table`
--
ALTER TABLE `post_category_table`
  ADD UNIQUE KEY `POST_ID` (`POST_ID`);

--
-- Indexes for table `post_details`
--
ALTER TABLE `post_details`
  ADD UNIQUE KEY `POST_ID` (`POST_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
