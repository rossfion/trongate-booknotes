-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 02:31 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trongate_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(3) UNSIGNED NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_status` tinyint(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `author_name`, `author_status`, `date_added`) VALUES
(1, 'Thomas Cleary', 1, '2024-07-19 14:00:58'),
(2, 'Jean Shinoda Bolen', 1, '2024-07-19 14:00:58'),
(3, 'Vance Packard', 1, '2024-07-19 14:00:58'),
(4, 'José Silva and Philip Miele', 1, '2024-07-19 14:00:58'),
(5, 'Niccolo Machiavelli', 1, '2024-07-19 14:00:58'),
(6, 'Emile Coué & C.H. Brooks', 1, '2024-07-19 14:00:58'),
(7, 'Anatole France', 1, '2024-07-19 14:00:58'),
(8, 'Napoleon Hill', 1, '2024-07-19 14:00:58'),
(9, 'Dale Carnegie', 1, '2024-07-19 14:00:58'),
(10, 'William Irwin Thompson', 1, '2024-07-19 14:00:58'),
(11, 'Masaru Emoto', 1, '2024-07-19 14:00:58'),
(12, 'George S. Clason', 1, '2024-07-19 14:00:58'),
(13, 'Clyde W. Ford', 1, '2024-07-19 14:00:58'),
(14, 'John Kehoe', 1, '2024-07-19 14:00:58'),
(15, 'Paul Zane Pilzer', 1, '2024-07-19 14:00:58'),
(16, 'Barbara Thiering', 1, '2024-07-19 14:00:58'),
(17, 'Jeff A. Benner', 1, '2024-07-19 14:00:58'),
(18, 'Master Lam Kam Chuen', 1, '2024-07-19 14:00:58'),
(19, 'Daniel Reid', 1, '2024-07-19 14:00:58'),
(20, 'Mark Cohen', 1, '2024-07-19 14:00:58'),
(21, 'Esther and Jerry Hicks', 1, '2024-07-19 14:00:58'),
(22, 'June Singer', 1, '2024-07-19 14:00:58'),
(23, 'Stephen Hoeller', 1, '2024-07-19 14:00:58'),
(24, 'Hans Jonas', 1, '2024-07-19 14:00:58'),
(25, 'Kevin Yank', 1, '2024-07-19 14:00:58'),
(26, 'Chogyam Trungpa', 1, '2024-07-19 14:00:58'),
(27, 'Edwin A. Abbott', 1, '2024-07-19 14:00:58'),
(28, 'Joyce Farrell', 1, '2024-07-19 14:00:58'),
(29, 'Patrick McNeil', 1, '2024-07-19 14:00:58'),
(30, 'Elaine Pagels', 1, '2024-07-19 14:00:58'),
(32, 'Fritjof Capra', 1, '2024-07-19 14:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(3) UNSIGNED NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `book_subtitle` text DEFAULT NULL,
  `book_edition` varchar(5) DEFAULT NULL,
  `author_id` int(3) DEFAULT NULL,
  `publisher_id` int(3) DEFAULT NULL,
  `category_id` int(3) DEFAULT NULL,
  `publication_year` int(3) DEFAULT NULL,
  `book_isbn` text NOT NULL,
  `book_url` varchar(255) DEFAULT NULL,
  `book_cover_image` varchar(255) NOT NULL,
  `date_read` date NOT NULL,
  `book_notes` text NOT NULL,
  `book_status` tinyint(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_title`, `book_subtitle`, `book_edition`, `author_id`, `publisher_id`, `category_id`, `publication_year`, `book_isbn`, `book_url`, `book_cover_image`, `date_read`, `book_notes`, `book_status`, `date_added`) VALUES
(4, 'Goddesses in Everywoman', 'Powerful Archetypes in Womens Lives', '20th', 2, 13, 18, 2004, '2147483647', '', 'https://covers.openlibrary.org/b/isbn/9780060572846.jpg', '0000-00-00', 'Vel eligendi sint culpa. Et sed explicabo omnis deleniti. Laboriosam minima consequatur tenetur quia aut voluptates.\r\nEst quaerat enim eos commodi vero. Velit adipisci temporibus atque ut quo nostrum. Consequatur culpa omnis dolor minima deleniti.', 1, '2024-07-19 16:08:35'),
(5, 'Shambhala', 'The Sacred Path of the Warrior', '', 26, 13, 3, 1984, '1590300416', 'https://openlibrary.org/isbn/1590300416', 'https://covers.openlibrary.org/b/isbn/1590300416.jpg', '0000-00-00', 'Vel eligendi sint culpa. Et sed explicabo omnis deleniti. Laboriosam minima consequatur tenetur quia aut voluptates.\r\n\r\nEst quaerat enim eos commodi vero. Velit adipisci temporibus atque ut quo nostrum. Consequatur culpa omnis dolor minima deleniti.\r\n\r\nAperiam autem consectetur iusto sunt. Minus et molestiae ducimus sunt. Laudantium sint debitis est. Itaque rerum dolor veritatis dolores repellendus eos ratione eveniet. Ut in ratione quas distinctio neque aperiam impedit.', 1, '2024-05-29 15:23:43'),
(6, 'Flatland', 'A Romance of Many Dimensions', '', 27, 9, 12, 1984, '451522907', 'https://openlibrary.org/isbn/0451522907', 'https://covers.openlibrary.org/b/isbn/0451522907.jpg', '0000-00-00', 'When I first ventured towards getting a Masters degree in Interactive Multimedia in the UK, this book was recommended reading at the University of Westminster, London. I bought it. However, I never managed to finish it. Many years later, I came across another mention of it by the late A.R. Bordon of the now defunct(?) Life Physics Group-California (LPG-C).', 1, '2024-05-29 15:23:43'),
(7, 'Java Programming', '', '4', 28, 2, 1, 2008, '2147483647', NULL, 'https://covers.openlibrary.org/b/isbn/9781432901280.jpg', '0000-00-00', 'I am currently working my way through this book for learning Java.', 1, '2024-05-29 15:23:43'),
(8, 'The Web Designer\'s Handbook Volume 3', 'Inspiration from todays best web design trends, themes, and styles', '3', 29, 11, 1, 2013, '2147483647', '', 'https://covers.openlibrary.org/b/isbn/9781440323966.jpg', '2024-05-17', 'This is more of a resource book when I need ideas for good web design. Many years ago, in my second lecturing position in the UK, I learnt to my utter embarrassment, that I did not have good design skills. While I am now very grateful for frameworks such as Bootstrap and Trongate, I continue to work on core fundamentals in this area.', 1, '2024-07-19 18:23:37'),
(9, 'The Inner Teachings of Taoism', '', '', 1, 13, 11, 1986, '2147483647', 'https://openlibrary.org/isbn/9781570627101\r\n', 'https://covers.openlibrary.org/b/isbn/9781570627101.jpg', '0000-00-00', 'Thomas Cleary is the translator of this work. The author is actually Chang Po-Tuan. This text is a distilled version of the classic Understanding Reality by the same author. ', 1, '2024-05-29 15:23:43'),
(10, 'The Gnostic Paul', 'Gnostic Exegesis of the Pauline Letters', '', 30, 10, 5, 1992, '2147483647', 'https://openlibrary.org/isbn/9781563380396\r\n', 'https://covers.openlibrary.org/b/isbn/9781563380396.jpg', '0000-00-00', 'Vel eligendi sint culpa. Et sed explicabo omnis deleniti. Laboriosam minima consequatur tenetur quia aut voluptates.\r\n\r\nEst quaerat enim eos commodi vero. Velit adipisci temporibus atque ut quo nostrum. Consequatur culpa omnis dolor minima deleniti.\r\n\r\nAperiam autem consectetur iusto sunt. Minus et molestiae ducimus sunt. Laudantium sint debitis est. Itaque rerum dolor veritatis dolores repellendus eos ratione eveniet. Ut in ratione quas distinctio neque aperiam impedit.', 1, '2024-05-29 15:23:43'),
(11, 'The Silva Mind Control Method', '', '', 4, 16, 2, 1978, '671452843', 'https://openlibrary.org/isbn/0671452843\r\n', 'https://covers.openlibrary.org/b/isbn/0671452843.jpg', '0000-00-00', 'Sed quaerat quo magnam aspernatur numquam. Mollitia non mollitia eaque dolores a occaecati suscipit. Officiis veritatis sequi ut provident et magnam. Ab architecto dolor fugiat reiciendis repellat rerum. Nulla quis rerum tenetur.', 1, '2024-05-29 15:23:43'),
(14, 'The Hidden Messages in Water', '', '', 11, 19, 14, 2004, '1582701148', 'https://openlibrary.org/isbn/1582701148\r\n', 'https://covers.openlibrary.org/b/isbn/1582701148.jpg', '0000-00-00', 'I heard about this book from an instructor on the Silva Life System course. The images are quite stunning.', 1, '2024-05-29 15:23:43'),
(15, 'Think and Grow Rich', '', '', 8, 20, 2, 1983, '449214923', 'https://openlibrary.org/isbn/0449214923\r\n', 'https://covers.openlibrary.org/b/isbn/0449214923.jpg', '0000-00-00', 'Eos quis quo ea. Aspernatur ipsum neque recusandae dolores inventore accusantium neque suscipit. A voluptas sunt hic odio omnis et magnam consequatur. Hic exercitationem quia autem et maxime autem in. Eum et id unde consequatur qui ipsam. Vitae molestias vitae quia.', 1, '2024-05-29 15:23:43'),
(17, 'Better and Better Every Day', 'Self Mastery Through Conscious Auto-Suggestion/The Practice of Auto-Suggestion by the Method of Emile Coué', '', 6, 22, 2, 1961, '0', NULL, '', '0000-00-00', 'Eos quis quo ea. Aspernatur ipsum neque recusandae dolores inventore accusantium neque suscipit. A voluptas sunt hic odio omnis et magnam consequatur. Hic exercitationem quia autem et maxime autem in. Eum et id unde consequatur qui ipsam. Vitae molestias vitae quia.', 1, '2024-05-29 15:23:43'),
(18, 'How To Win Friends and Influence People', '', '', 9, 16, 2, 1982, '2147483647', NULL, '', '0000-00-00', 'Aperiam autem consectetur iusto sunt. Minus et molestiae ducimus sunt. Laudantium sint debitis est. Itaque rerum dolor veritatis dolores repellendus eos ratione eveniet. Ut in ratione quas distinctio neque aperiam impedit.', 1, '2024-05-29 15:23:43'),
(23, 'The Tao of Physics', '', '3', 32, 13, 17, 1991, '877735948', '', 'https://covers.openlibrary.org/b/isbn/0877735948.jpg', '2024-06-04', 'Eos quis quo ea. Aspernatur ipsum neque recusandae dolores inventore accusantium neque suscipit. A voluptas sunt hic odio omnis et magnam consequatur. Hic exercitationem quia autem et maxime autem in. Eum et id unde consequatur qui ipsam. Vitae molestias vitae quia.', 1, '2024-07-19 16:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) UNSIGNED NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_status` tinyint(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_status`, `date_added`) VALUES
(1, 'Computer Technology', 1, '2024-07-19 15:27:20'),
(2, 'Self-Help/Psychology', 1, '2024-07-19 15:27:20'),
(3, 'Philosophy', 1, '2024-07-19 15:27:20'),
(4, 'Non-Fiction', 1, '2024-07-19 15:27:20'),
(5, 'Religion', 1, '2024-07-19 15:27:20'),
(6, 'Art', 1, '2024-07-19 15:27:20'),
(7, 'History', 1, '2024-07-19 15:27:20'),
(8, 'Economics', 1, '2024-07-19 15:27:20'),
(9, 'English Literature', 1, '2024-07-19 15:27:20'),
(10, 'American Literature', 1, '2024-07-19 15:27:20'),
(11, 'Taoism', 1, '2024-07-19 15:27:20'),
(12, 'Satire/Humor', 1, '2024-07-19 15:27:20'),
(13, 'Sociology & Anthropology', 1, '2024-07-19 15:27:20'),
(14, 'Science/Health', 1, '2024-07-19 15:27:20'),
(15, 'Reference', 1, '2024-07-19 15:27:20'),
(17, 'Science', 1, '2024-07-19 15:35:36'),
(18, 'Psychology', 1, '2024-07-19 16:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` int(3) UNSIGNED NOT NULL,
  `publisher_name` varchar(50) NOT NULL,
  `publisher_status` tinyint(1) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `publisher_name`, `publisher_status`, `date_added`) VALUES
(1, 'Addison-Wesley', 1, '2024-07-19 14:59:58'),
(2, 'Thomson Course Technology', 1, '2024-07-19 14:59:58'),
(3, 'Apress', 1, '2024-07-19 14:59:58'),
(4, 'Packt Publishing', 1, '2024-07-19 14:59:58'),
(5, 'Farrar, Straus and Giroux', 1, '2024-07-19 14:59:58'),
(6, 'YMAA Publication Center', 1, '2024-07-19 14:59:58'),
(7, 'Chritsian Fellowship Publishers, Inc', 1, '2024-07-19 14:59:58'),
(8, 'Sams Publishing', 1, '2024-07-19 14:59:58'),
(9, 'Signet Classic', 1, '2024-07-19 14:59:58'),
(10, 'Trinity Press International', 1, '2024-07-19 14:59:58'),
(11, 'HOW Books', 1, '2024-07-19 14:59:58'),
(12, 'Michael Wiese Productions', 1, '2024-07-19 14:59:58'),
(13, 'Shamballa Publications, Inc', 1, '2024-07-19 14:59:58'),
(14, 'Harper & Row', 1, '2024-07-19 14:59:58'),
(15, 'sitepoint', 1, '2024-07-19 14:59:58'),
(16, 'Pocket Books', 1, '2024-07-19 14:59:58'),
(17, 'Penguin Books', 1, '2024-07-19 14:59:58'),
(18, 'Bantam Books', 1, '2024-07-19 14:59:58'),
(19, 'Beyond Words Publishing', 1, '2024-07-19 14:59:58'),
(20, 'Ballantine Books', 1, '2024-07-19 14:59:58'),
(21, 'Dover Publications, Inc', 1, '2024-07-19 14:59:58'),
(22, 'Unwin Books', 1, '2024-07-19 14:59:58'),
(23, 'St. Martins Press', 1, '2024-07-19 14:59:58'),
(25, 'Barnes and Noble Publishing, Inc', 1, '2024-07-19 15:10:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
