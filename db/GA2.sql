-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2021 at 07:45 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2170db`
--

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `username` varchar(64) NOT NULL,
  `follow` varchar(2048) DEFAULT NULL,
  `follower` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`username`, `follow`, `follower`) VALUES
('cong', ',Rey Skywalker,Yoda,', ',Nafiz Mazumder,'),
('elon', ',Yoda,', ',Nafiz Mazumder,'),
('jad', ',', ','),
('luke', ',Yoda,', ','),
('nafiz', ',15,Rey Skywalker,Yoda,Nafiz Mazumder,', ','),
('raham', ',nam,', ','),
('rey', ',Nafiz Mazumder,', ',Yoda,'),
('yoda', ',Rey Skywalker,Luke Skywalker,Yoda,Nafiz Mazumder,', ',yoda,rey,');

-- --------------------------------------------------------

--
-- Table structure for table `jediblog`
--

CREATE TABLE `jediblog` (
  `jedi_post_id` int(11) NOT NULL,
  `jedi_author` varchar(64) NOT NULL,
  `jedi_post_date` date NOT NULL,
  `jedi_post_category` varchar(64) NOT NULL,
  `jedi_post_title` varchar(256) NOT NULL,
  `jedi_post_content` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jediblog`
--

INSERT INTO `jediblog` (`jedi_post_id`, `jedi_author`, `jedi_post_date`, `jedi_post_category`, `jedi_post_title`, `jedi_post_content`) VALUES
(1, 'Rey Skywalker', '2021-01-01', 'Introduction; The Force', 'I am Rey Skywalker', 'I know my past but my past does not define my path. I cannot avoid my Palpatine ancestry, but from now, I am Rey Skywalker. I am creating my own path using the Force to guide me.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel varius sem. Vivamus vel erat et massa pretium condimentum quis eget quam. Suspendisse cursus mollis metus, quis sodales felis sodales ut. Praesent luctus eu augue at malesuada. \r\n\r\nInteger nec mauris enim. Morbi est risus, suscipit quis fringilla eget, commodo id diam. Suspendisse cursus urna vitae tempus consequat. Proin euismod felis nisi, a dictum arcu eleifend sit amet. Aliquam leo nisi, dapibus a odio sit amet, mollis vulputate nunc. Donec ex mi, pharetra ac urna nec, pretium malesuada metus. Etiam et tortor sagittis, facilisis purus eu, auctor ex.'),
(2, 'Luke Skywalker', '2021-01-10', 'The Force', 'From beyond the physical dimension', 'I did not realize that this \"\"land\"\" beyond the physical dimension or realm was this astonishing. I get to hang out with Master Yoda, Obi-Wan, my dad in his Anakin form, my sister, Han and their kid. It is pretry cool!\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel varius sem. Vivamus vel erat et massa pretium condimentum quis eget quam. Suspendisse cursus mollis metus, quis sodales felis sodales ut. Praesent luctus eu augue at malesuada. Integer nec mauris enim. Morbi est risus, suscipit quis fringilla eget, commodo id diam. Suspendisse cursus urna vitae tempus consequat.\r\n\r\nProin euismod felis nisi, a dictum arcu eleifend sit amet. Aliquam leo nisi, dapibus a odio sit amet, mollis vulputate nunc. Donec ex mi, pharetra ac urna nec, pretium malesuada metus. Etiam et tortor sagittis, facilisis purus eu, auctor ex.'),
(3, 'Yoda', '2021-01-18', 'The Force; Resolve', 'Sharing thoughts, I am', 'Do or do not. There is no try.'),
(7, 'Yoda', '2021-02-18', 'Test Category; The Force', 'Test post', 'This is a test post'),
(9, 'Yoda', '2021-02-18', 'The Force; Jedi; Sith', 'Destroyed, The Sith Are!', 'The Sith were finally destroyed in the end of &quot;The Rise of Skywalker&quot;'),
(10, 'Yoda', '2021-04-06', 'Test; Jedi Blog;', 'I did it', 'Done.'),
(12, 'Yoda', '2021-04-09', 'Jedi; Force; Last; The one', 'The last one', 'okay'),
(14, 'Nafiz Mazumder', '2021-04-10', 'Test; Jedi Blog;', 'My first tweep', 'Hellow, I am a Jedi. Hehe.'),
(15, 'Nafiz Mazumder', '2021-04-10', 'yuyu', 'I did it', 'ytgfutyu'),
(16, 'Yoda ', '2021-04-10', 'Test; Jedi Blog;', 'The last one', 'We are good');

-- --------------------------------------------------------

--
-- Table structure for table `jedilikes`
--

CREATE TABLE `jedilikes` (
  `jedi_user` varchar(255) NOT NULL,
  `jedi_post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jedilikes`
--

INSERT INTO `jedilikes` (`jedi_user`, `jedi_post_id`) VALUES
('yoda', 1),
('yoda', 2),
('yoda', 16);

-- --------------------------------------------------------

--
-- Table structure for table `jedilogin`
--

CREATE TABLE `jedilogin` (
  `jedi_id` int(11) NOT NULL,
  `jedi_username` varchar(128) NOT NULL,
  `jedi_password` varchar(256) NOT NULL,
  `jedi_firstname` varchar(128) NOT NULL,
  `jedi_lastname` varchar(128) NOT NULL,
  `jedi_email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jedilogin`
--

INSERT INTO `jedilogin` (`jedi_id`, `jedi_username`, `jedi_password`, `jedi_firstname`, `jedi_lastname`, `jedi_email`) VALUES
(1, 'yoda', '1234', 'Yoda', '', 'yoda@theforce.org'),
(2, 'luke', '1234', 'Luke', 'Skywalker', 'luke@theforce.org'),
(3, 'rey', '1234', 'Rey', 'Skywalker', 'rey@theforce.org'),
(4, 'nafiz', '1234', 'Nafiz', 'Mazumder', 'nafiz.m');

-- --------------------------------------------------------

--
-- Table structure for table `jedishares`
--

CREATE TABLE `jedishares` (
  `jedi_user` varchar(255) NOT NULL,
  `jedi_post_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jedishares`
--

INSERT INTO `jedishares` (`jedi_user`, `jedi_post_id`) VALUES
('luke', 15),
('yoda', 1),
('yoda', 9),
('yoda', 16);

-- --------------------------------------------------------

--
-- Table structure for table `simplebooks-inventory`
--

CREATE TABLE `simplebooks-inventory` (
  `BookID` int(11) NOT NULL,
  `BookName` varchar(255) NOT NULL,
  `AuthorName` varchar(255) NOT NULL,
  `BookSummary` varchar(640) NOT NULL,
  `PublishedYear` varchar(4) NOT NULL,
  `ISBN` varchar(12) NOT NULL,
  `QuantityOrdered` int(11) NOT NULL,
  `QuantityAvailable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `simplebooks-inventory`
--

INSERT INTO `simplebooks-inventory` (`BookID`, `BookName`, `AuthorName`, `BookSummary`, `PublishedYear`, `ISBN`, `QuantityOrdered`, `QuantityAvailable`) VALUES
(1, 'Sage Of My Imagination', 'Linda Myers', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia', '1986', '1843563327', 8, 2),
(2, 'Rats Of The Curse', 'Dr Mary Rivera', 'The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way. ', '1918', '1843564524', 4, 4),
(3, 'Thieves Without Glory', 'Dr Carol Leonard', 'Pityful a rethoric question ran over her cheek, then she continued her way. On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word \"and\" and the Little Blind Text should turn around and return to its own, safe country.', '1979', '1843561582', 12, 4),
(4, 'Priests And Slaves', 'Barbara Mcdonald', 'And if she hasn’t been rewritten, then they are still using her. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', '1964', '1843564825', 11, 1),
(5, 'Spies', 'Amanda Johnson', 'Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', '1960', '1843562752', 15, 3),
(6, 'Country Of The South', 'Stephanie Davis', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.', '2009', '1843563780', 15, 0),
(7, 'Game Of The Mountain', 'Jessica Miller', 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way', '1880', '1843561563', 3, 3),
(8, 'Arriving At The West', 'Sarah Smith', 'The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word \"and\" and the Little Blind Text should turn around and return to its own, safe country.', '1858', '1843564466', 1, 0),
(9, 'Separated At My Enemies', 'Elizabeth Wilson', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar', '1824', '1843561662', 9, 0),
(10, 'Turtle Of The Ocean', 'Ashley Taylor', 'The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. ', '1841', '1843563335', 1, 1),
(11, 'Turtles Of The Plague', 'Ashley Taylor', 'The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word \"and\" and the Little Blind Text should turn around and return to its own, safe country.', '1903', '1843560572', 14, 6),
(12, 'Fish Of Water', 'Ashley Taylor', 'It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.', '1922', '1843560324', 14, 14),
(13, 'Serpents And Butchers', 'Jessica Blaese', 'Pityful a rethoric question ran over her cheek, then she continued her way. On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word \"and\" and the Little Blind Text should turn around and return to its own, safe country', '1940', '1843564540', 3, 3),
(14, 'Family Of The Banished', 'Heather Jones', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. ', '1977', '1843565857', 1, 1),
(15, 'Staff Of Water', 'Heather Jones', 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. ', '1978', '1843561164', 10, 3),
(16, 'Chasing The Immortals', 'Xiang Miller', 'Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth', '1881', '1843564016', 15, 0),
(17, 'Dancing In A Storm', 'Bo Chang', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar', '1944', '1843561196', 8, 7),
(18, 'God Of Fire', 'Juan Ling', 'The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. ', '2014', '1843564028', 14, 11),
(19, 'Lord Of The Plague', 'Bo Chang', 'The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word \"and\" and the Little Blind Text should turn around and return to its own, safe country.', '1880', '1843562045', 2, 0),
(20, 'Spiders Of The Ancestors', 'Tara Sharma', 'It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.', '1912', '1843560739', 3, 3),
(21, 'Lords Of The Eclipse', 'Tara Sharma', 'Pityful a rethoric question ran over her cheek, then she continued her way. On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word \"and\" and the Little Blind Text should turn around and return to its own, safe country', '2017', '1843561236', 5, 2),
(22, 'Heirs And Foes', 'Tara Sharma', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. ', '1906', '1843565813', 2, 0),
(23, 'Horse In The Window', 'Tarun Kumar', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar', '1807', '1843565589', 7, 5),
(24, 'The Comedian', 'Tarun Kumar', 'The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. ', '1822', '1843562438', 8, 1),
(25, 'Spoofs Of The Village', 'Ravi Patel', 'The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word \"and\" and the Little Blind Text should turn around and return to its own, safe country.', '1933', '1843564429', 8, 0),
(26, 'Injury Plan', 'Ranveer Singh', 'It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.', '1994', '1843560714', 10, 1),
(27, 'Respect For My System', 'Ranveer Singh', 'Pityful a rethoric question ran over her cheek, then she continued her way. On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word \"and\" and the Little Blind Text should turn around and return to its own, safe country', '1804', '1843562272', 7, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `jediblog`
--
ALTER TABLE `jediblog`
  ADD PRIMARY KEY (`jedi_post_id`);

--
-- Indexes for table `jedilikes`
--
ALTER TABLE `jedilikes`
  ADD PRIMARY KEY (`jedi_user`,`jedi_post_id`);

--
-- Indexes for table `jedilogin`
--
ALTER TABLE `jedilogin`
  ADD PRIMARY KEY (`jedi_id`);

--
-- Indexes for table `jedishares`
--
ALTER TABLE `jedishares`
  ADD PRIMARY KEY (`jedi_user`,`jedi_post_id`);

--
-- Indexes for table `simplebooks-inventory`
--
ALTER TABLE `simplebooks-inventory`
  ADD PRIMARY KEY (`BookID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jediblog`
--
ALTER TABLE `jediblog`
  MODIFY `jedi_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jedilogin`
--
ALTER TABLE `jedilogin`
  MODIFY `jedi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `simplebooks-inventory`
--
ALTER TABLE `simplebooks-inventory`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
