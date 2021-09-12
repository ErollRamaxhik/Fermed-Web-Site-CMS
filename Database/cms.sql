-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 06:15 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidate_id` int(11) NOT NULL,
  `candidate_fullname` varchar(255) NOT NULL,
  `candidate_gender` varchar(255) NOT NULL,
  `candidate_birthdate` varchar(255) NOT NULL,
  `candidate_email` varchar(255) NOT NULL,
  `candidate_phone` varchar(15) NOT NULL,
  `candidate_location` varchar(255) NOT NULL,
  `candidate_image` text NOT NULL,
  `candidate_education` varchar(255) NOT NULL,
  `candidate_branch` varchar(255) NOT NULL,
  `candidate_profile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `candidate_fullname`, `candidate_gender`, `candidate_birthdate`, `candidate_email`, `candidate_phone`, `candidate_location`, `candidate_image`, `candidate_education`, `candidate_branch`, `candidate_profile`) VALUES
(8, 'Eroll Ramaxhik', 'Male', '1991-11-28', 'erolramacik@gmail.com', '+38349133736', 'Prishtine', 'erollramaxhik.jpg', 'Ege University - Computer Engineering', 'Engineer', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n'),
(9, 'Ferdi Mazrek', 'Male', '1989-03-08', 'ferdi@gmail.com', '+38349133736', 'Prishtine, Kosovo', 'ferdimazrek.jpg', 'Istanbul University - Dentistry', 'Dentist', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. '),
(10, 'Faruk Ramaxhik', 'Male', '1926-02-18', 'faruk@gmail.com', '+905511994249', 'Zurich, Switzerland', 'eroll.jpg', 'Beograd University', 'Construct Engineer', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(4) NOT NULL,
  `category_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Event'),
(2, 'Products'),
(3, 'Webinar'),
(18, 'Blog'),
(19, 'Career'),
(21, 'Item'),
(24, 'Game'),
(25, 'Fun'),
(26, 'Sun'),
(27, 'Scooter'),
(28, 'Vacancy');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(4) NOT NULL,
  `comment_post_id` int(4) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(25) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(30, 63, 'Erol', 'erol_ramacik@gmail.com', 'Hellooooo', 'Approved', '2021-02-25'),
(31, 62, 'ahmet', 'ahmet@gmail.com', 'Hello my friend', 'Approved', '2021-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image_product_title` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_product_title`, `image_name`) VALUES
(10, 'Alet', 'eroll.jpg'),
(11, 'Alet', 'erollramaxhik.jpg'),
(12, 'Alet', 'id.jpg'),
(13, 'Alet', 'imza.jpg'),
(14, 'Hello', '1.jpg'),
(28, 'er', 'header-2.png'),
(29, 'er', 'header-3.jpg'),
(30, 'er', 'hospital1.jpg'),
(31, 'er', 'hospital2.jpg'),
(32, 'er', 'header-2.png'),
(33, 'er', 'header-3.jpg'),
(34, 'er', 'hospital1.jpg'),
(35, 'er', 'hospital2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_employer` varchar(255) NOT NULL,
  `job_position` varchar(255) NOT NULL,
  `job_date` date NOT NULL,
  `job_deadline` date NOT NULL,
  `job_location` varchar(255) NOT NULL,
  `job_time` varchar(255) NOT NULL,
  `Job_phone` varchar(255) NOT NULL,
  `job_email` varchar(255) NOT NULL,
  `job_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `job_employer`, `job_position`, `job_date`, `job_deadline`, `job_location`, `job_time`, `Job_phone`, `job_email`, `job_description`) VALUES
(1, 'Assistente E Stomatologjise', 'Fermed', 'Assistant', '2021-03-08', '2021-03-24', 'Prishtina, Kosovo', 'Full Time', '+3834941337365', 'fermed@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop'),
(5, 'Jakablank Recrutigin', 'Jaka ', 'Software ', '2021-03-09', '2021-03-30', 'Mitrovice', 'Part Time', '+383494133736', 'jaka@hotmail.com', 'Lorem Ipsum is simply dummy'),
(6, 'Yeni', 'Sukka', 'Barbar', '2021-03-14', '2021-12-16', 'Moscow', 'Full Time', '+383444444', 'sukka@windowslive.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo officia obcaecati in debitis qui esse perspiciatis vel ipsum, alias impedit sint eius laboriosam. Modi, nisi! Ex dolorem suscipit error molestias!');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(4) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views`) VALUES
(44, 1, 'How to be a Dentist Madafaka bum bum', 'Eroll Ramaxhik', '2021-02-13', 'resim-1.jpg', '<p>asdasdaaaaaaaaaaaaaaaaaaaaaaaa regfdsfgdfg</p>', 'asdasd', 0, 'Published', 143),
(46, 1, 'Hekimler', 'Eroll Ramaxhik', '2021-02-22', 'FermedLogo-01.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eu luctus ante. Pellentesque iaculis posuere libero, at interdum mauris efficitur et. Suspendisse potenti. Ut vitae hendrerit nibh. Curabitur pulvinar ultricies odio, ultrices aliquet nisi porttitor ut. Sed rutrum eleifend diam, sit amet rutrum mauris faucibus eget. Pellentesque tristique libero a est pellentesque dictum.', 'erol, ahmet', 0, 'Draft', 16),
(53, 1, 'Hekimler', 'Eroll Ramaxhik', '2021-02-24', 'FermedLogo-01.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eu luctus ante. Pellentesque iaculis posuere libero, at interdum mauris efficitur et. Suspendisse potenti. Ut vitae hendrerit nibh. Curabitur pulvinar ultricies odio, ultrices aliquet nisi porttitor ut. Sed rutrum eleifend diam, sit amet rutrum mauris faucibus eget. Pellentesque tristique libero a est pellentesque dictum.', 'erol, ahmet', 0, 'Draft', 8),
(62, 1, 'Deneme', 'Eroll Ramaxhik', '2021-02-24', 'FermedLogo-01.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><iframe frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/t8Mah-UU4Vg\" width=\"560\"></iframe>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n', 'erol, ahmet', 0, 'Published', 22),
(63, 18, 'Erol', 'Nusreta Hot', '2021-02-24', 'snapshot_2021_01_25_09_44_57_80146.png', '<p style=\"text-align:center\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here</p>\r\n\r\n<p style=\"text-align:center\"><iframe frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/A7HQfOsBz4o\" width=\"560\"></iframe></p>\r\n\r\n<p style=\"text-align:center\">It is a long established fact that a reader will be distracted by the readable content of a page w</p>', 'erol, ahmet', 0, 'Published', 76),
(64, 18, 'Erol', 'Nusreta Hot', '2021-03-01', 'snapshot_2021_01_25_09_44_57_80146.png', '<p style=\"text-align:center\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here</p>\r\n\r\n<p style=\"text-align:center\"><iframe frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/A7HQfOsBz4o\" width=\"560\"></iframe></p>\r\n\r\n<p style=\"text-align:center\">It is a long established fact that a reader will be distracted by the readable content of a page w</p>', 'erol, ahmet', 0, 'Published', 1),
(65, 1, 'Deneme', 'Eroll Ramaxhik', '2021-03-01', 'FermedLogo-01.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><iframe frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/t8Mah-UU4Vg\" width=\"560\"></iframe>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n', 'erol, ahmet', 0, 'Published', 1),
(66, 1, 'Hekimler', 'Eroll Ramaxhik', '2021-03-01', 'FermedLogo-01.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eu luctus ante. Pellentesque iaculis posuere libero, at interdum mauris efficitur et. Suspendisse potenti. Ut vitae hendrerit nibh. Curabitur pulvinar ultricies odio, ultrices aliquet nisi porttitor ut. Sed rutrum eleifend diam, sit amet rutrum mauris faucibus eget. Pellentesque tristique libero a est pellentesque dictum.', 'erol, ahmet', 0, 'Draft', 2),
(67, 1, 'Hekimler', 'Eroll Ramaxhik', '2021-03-01', 'FermedLogo-01.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eu luctus ante. Pellentesque iaculis posuere libero, at interdum mauris efficitur et. Suspendisse potenti. Ut vitae hendrerit nibh. Curabitur pulvinar ultricies odio, ultrices aliquet nisi porttitor ut. Sed rutrum eleifend diam, sit amet rutrum mauris faucibus eget. Pellentesque tristique libero a est pellentesque dictum.', 'erol, ahmet', 0, 'Draft', 5),
(68, 1, 'How to be a Dentist Madafaka bum bum', 'Eroll Ramaxhik', '2021-03-07', 'imza.jpg', '<p>asdasdaaaaaaaaaaaaaaaaaaaaaaaa</p>\r\n', 'asdasd', 0, 'Published', 16),
(69, 1, 'asdasd', 'Eroll Ramaxhik', '2021-03-14', 'imza.jpg', '<ul>\r\n	<li><strong>sadasdasd</strong></li>\r\n	<li><strong>asdasda</strong></li>\r\n	<li><strong>sadasd</strong></li>\r\n	<li><strong>asdasdasdasdasdasd</strong></li>\r\n</ul>', 'asd', 0, 'Published', 6);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_date` date NOT NULL,
  `product_phone` varchar(15) NOT NULL,
  `product_email` varchar(255) NOT NULL,
  `product_content` text NOT NULL,
  `product_location` varchar(255) NOT NULL,
  `product_price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_date`, `product_phone`, `product_email`, `product_content`, `product_location`, `product_price`) VALUES
(9, 'Alet', '0000-00-00', '', '', '', '', '150'),
(10, 'Hello', '0000-00-00', '', '', '', '', '250'),
(15, 'er', '2021-03-23', '+38349133736', 'erolramacik@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptates, non laboriosam quidem maxime voluptatum maiores delectus unde veniam, quasi soluta neque facere? Praesentium officia deserunt ab! Molestiae, id. Corrupti.', 'Prishtine', 'er'),
(16, 'er', '2021-03-23', 'er', 'erolramacik@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptates, non laboriosam quidem maxime voluptatum maiores delectus unde veniam, quasi soluta neque facere? Praesentium officia deserunt ab! Molestiae, id. Corrupti.', 'er', 'er');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_fullname`, `user_email`, `user_image`, `user_role`, `user_token`) VALUES
(26, 'erol', '$2y$10$JNyNYdsDtkKEAYnf3/jH9OVi8uScivcME1CPgz82ewYDn28FGEUQy', 'Eroll Ramaxhik', 'erolramacik@gmail.com', '', 'Admin', 'b3ab0caa63a108205c4afe60e9fd778a4c7f4a0d9e1a484ece8c62ee82abe242ef27fda53160303991981acb0bc4a4fe3d20'),
(27, 'nur', '$2y$12$rGJnbqulgwgdtUgZnWrz0eWtdyKWcU3Vg148vv6M3PjP1xMPi2eGq', 'Nusreta', 'nur@gmail.com', '', 'Subscriber', ''),
(30, 'ferdi', '$2y$10$VQaBZw1PFPvH/Y9WdgAt1uPkIKBq6bkFnQDp9AZUZD49dXbiCTTYu', 'Ferdi Mazrek', 'ferdi@gmail.com', '', 'Admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `users_online_id` int(11) NOT NULL,
  `users_online_session` varchar(255) NOT NULL,
  `users_online_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`users_online_id`, `users_online_session`, `users_online_time`) VALUES
(1, 'lg4ueo470mjnn2gg20jiluodq1', 1613294788),
(2, 'ofqckn07jcu5878orrrdmqetgc', 1613294372),
(3, '2l7jjpp0v56a3ngre42p0gav7h', 1613573833),
(4, 'hne47v95heorlvorhgevmftp25', 1613572786),
(5, '0g17on0k5chppk3o5010bl879v', 1613576057),
(6, 'jl6jj233jdnj3ich46rjts72hv', 1613576795),
(7, 'h52mpcnj28d8q60409tqj7djta', 1613658239),
(8, 'qla2h6ok7o1c4dsiu4k5mrq8ff', 1613755433),
(9, 's59m5qvopk65d7svpfhebkaeog', 1613756346),
(10, '9hi3veogjn676oq21fl6q6gklf', 1613758338),
(11, 'vdcr5ipq47s8c7l5uqs73jbca5', 1613769798),
(12, 'iegi1m5gvigeb3lebccbgfm1u2', 1613770499),
(13, 'k1gagafpiup99ke2hs5ff848eo', 1613932086),
(14, '07juprs7fcm9ibh5ioneg0pmh4', 1614031597),
(15, 'uujpltu0f4cntcd7nopvpvfpvc', 1614105246),
(16, 'qk4qcl21ie9jfhepb3o63f8smt', 1614113122),
(17, 'd5qo0ir5r926f2usn57psdcia9', 1614129736),
(18, '6vhn3v5m8gbmpd1pkj23l9lc42', 1614192524),
(19, '3otnr33jcnhpssef9ol96lo2sa', 1614212073),
(20, '88dkbqr924mlsv7iem2ihsodnt', 1614287364),
(21, 'gq0s02ucau6a7sgv76o8s1ekke', 1614318971),
(22, 'urac7q4j8t6o6beahni7mstemd', 1614381343),
(23, 'j0cja47g754m614r47bl1jbeq1', 1614405753),
(24, '2t5d8pveb2acmb5cokhmakv1nk', 1614599102),
(25, '1gtrqttv8cpgj5qv39n0nu6ht3', 1614857049),
(26, 'ei38mnljgpolpqrpkltnvt6ape', 1614976598),
(27, 'thdat7pf86qds82afm3lihqrrj', 1614971477),
(28, 'dkflb9gc4cgs9ggqdfk2lhp1t1', 1615031753),
(29, 'o654vr2n99demu5cp2p2slrif9', 1615027193),
(30, '16eljo53je98pe3mjqlfb6erkl', 1615139686),
(31, 'i3lpprokg5fn9r5gbsb047v0pa', 1615140173),
(32, '5nt72nadnl1c5hnvoodk8fcmdc', 1615230783),
(33, '80oqemqbj21b2rb1d2rpnjcj18', 1615695108),
(34, 'ppsf1u7kmjksdmsn9ik058kurt', 1615698010),
(35, 'fnvvhuetdrjfuuotmtllffhk4i', 1615705028),
(36, 'f57lruq746p7tbi474u89svbu7', 1615705002),
(37, '60o8trvo29d6nidc8h23i5ogs0', 1615793967),
(38, 't61q7mnsdp033qtvpdt6cuh3vf', 1615860700),
(39, 'ei2b7pc0dddpls2tr82vcibeae', 1616057669),
(40, 'h1dpdvpc6m8gn1kha212us8vdb', 1616336883),
(41, '7mqi0nrr2sqh5lck48ajk8ptli', 1616530808);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`users_online_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `users_online_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
