-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 02:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test8`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_ad` int(10) NOT NULL,
  `id_pack` int(10) NOT NULL,
  `name_ad` varchar(100) NOT NULL,
  `sname_ad` varchar(100) NOT NULL,
  `user_ad` varchar(100) NOT NULL,
  `pass_ad` varchar(100) NOT NULL,
  `tel_ad` varchar(10) NOT NULL,
  `type_ad` int(1) NOT NULL,
  `pic_ad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_ad`, `id_pack`, `name_ad`, `sname_ad`, `user_ad`, `pass_ad`, `tel_ad`, `type_ad`, `pic_ad`) VALUES
(1, 2, 'วีรชน', 'ใจกล้า', 'admin', '1234', '0876675007', 1, ''),
(2, 3, 'สมจิตร', 'ศรีงาม', 'doc1', '1234', '0675668755', 2, ''),
(3, 4, 'สมพงษ์', 'ใจดี', 'doc2', '1234', '0980004522', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alert`
--

CREATE TABLE `tb_alert` (
  `id_alert` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `day_alert` date NOT NULL,
  `time_alert` time NOT NULL,
  `detail_alert` text NOT NULL,
  `status_alert` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_answer`
--

CREATE TABLE `tb_answer` (
  `id_ans` int(10) NOT NULL,
  `id_ques` int(10) NOT NULL,
  `id_ques_n` int(10) NOT NULL,
  `type_ques_n` int(1) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_chat`
--

CREATE TABLE `tb_chat` (
  `id_chat` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_his` int(10) NOT NULL,
  `day_chat` date NOT NULL,
  `time_chat` time NOT NULL,
  `detail_chat` text NOT NULL,
  `type_chat` int(1) NOT NULL,
  `status_chat` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_chat_f`
--

CREATE TABLE `tb_chat_f` (
  `id_chat` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_friend` int(10) NOT NULL,
  `day_chat` date NOT NULL,
  `time_chat` time NOT NULL,
  `detail_chat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment`
--

CREATE TABLE `tb_comment` (
  `id_com` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_news` int(10) NOT NULL,
  `day_com` date NOT NULL,
  `time_com` time NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_friend`
--

CREATE TABLE `tb_friend` (
  `id_friend` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_user2` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_his`
--

CREATE TABLE `tb_his` (
  `id_his` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `sys` int(10) NOT NULL,
  `dia` int(10) NOT NULL,
  `heart` int(10) NOT NULL,
  `detail` text NOT NULL,
  `status_mem` int(1) NOT NULL,
  `coin_user` int(10) NOT NULL,
  `day_in` date NOT NULL,
  `status_his` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_like`
--

CREATE TABLE `tb_like` (
  `id_like` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_wques` int(10) NOT NULL,
  `status_like` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_meet`
--

CREATE TABLE `tb_meet` (
  `id_meet` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `day_meet` date NOT NULL,
  `time_meet` time NOT NULL,
  `detail_meet` text NOT NULL,
  `status_meet` char(1) NOT NULL,
  `type_cost` int(1) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_news`
--

CREATE TABLE `tb_news` (
  `id_news` int(10) NOT NULL,
  `head_news` varchar(100) NOT NULL,
  `detail_news` text NOT NULL,
  `day_up` date NOT NULL,
  `pic_news` varchar(100) NOT NULL,
  `count_news` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_news`
--

INSERT INTO `tb_news` (`id_news`, `head_news`, `detail_news`, `day_up`, `pic_news`, `count_news`) VALUES
(1, 'News1', 'news11111 news11111...........................\r\n..........................................................................', '2024-01-14', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_pro` int(10) NOT NULL,
  `day_order` date NOT NULL,
  `pay_order` int(1) NOT NULL,
  `num_order` int(10) NOT NULL,
  `type_order` int(1) NOT NULL,
  `total_order` int(10) NOT NULL,
  `no_order` varchar(20) NOT NULL,
  `status_order` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_package`
--

CREATE TABLE `tb_package` (
  `id_pack` int(10) NOT NULL,
  `name_pack` varchar(100) NOT NULL,
  `price_pack` int(10) NOT NULL,
  `detail_pack` text NOT NULL,
  `disc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_package`
--

INSERT INTO `tb_package` (`id_pack`, `name_pack`, `price_pack`, `detail_pack`, `disc`) VALUES
(1, 'แพ็คเกจธรรมดา', 0, '', 0),
(2, 'แอดมิน', 0, '', 0),
(3, 'สุขภาพดี', 2500, '', 5),
(4, 'ใส่ใจสุขภาพ', 3500, '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pr`
--

CREATE TABLE `tb_pr` (
  `id_pr` int(10) NOT NULL,
  `name_pr` varchar(100) NOT NULL,
  `tel_pr` varchar(13) NOT NULL,
  `type_ques` int(1) NOT NULL,
  `price_pr` int(10) NOT NULL,
  `url_pr` varchar(10) NOT NULL,
  `detail_pr` text NOT NULL,
  `pic_pr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id_pro` int(10) NOT NULL,
  `name_pro` varchar(100) NOT NULL,
  `price_pro` int(10) NOT NULL,
  `type_ques` int(1) NOT NULL,
  `coin` int(10) NOT NULL,
  `num_pro` int(10) NOT NULL,
  `detail_pro` text NOT NULL,
  `pic_pro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id_pro`, `name_pro`, `price_pro`, `type_ques`, `coin`, `num_pro`, `detail_pro`, `pic_pro`) VALUES
(1, 'Vitamin C', 299, 1, 20, 100, 'vitamin C...................................................\r\n....................................', ''),
(2, 'Vitamin A', 250, 1, 15, 100, 'vitamin A.....................................................\r\n.......................................', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_question`
--

CREATE TABLE `tb_question` (
  `id_ques` int(10) NOT NULL,
  `question` varchar(100) NOT NULL,
  `type_ques_n` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ques_n`
--

CREATE TABLE `tb_ques_n` (
  `id_ques_n` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `day_ques_n` date NOT NULL,
  `type_ques_n` int(1) NOT NULL,
  `status_n` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `name_user` varchar(100) NOT NULL,
  `sname_user` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `born` date NOT NULL,
  `sex` int(1) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `addr` text NOT NULL,
  `sys` int(10) NOT NULL,
  `dia` int(10) NOT NULL,
  `heart` int(10) NOT NULL,
  `dise` text NOT NULL,
  `status_mem` int(1) NOT NULL,
  `coin_user` int(10) NOT NULL,
  `id_pack` int(10) NOT NULL,
  `status_pack` char(1) NOT NULL,
  `pic_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `name_user`, `sname_user`, `user`, `pass`, `born`, `sex`, `tel`, `addr`, `sys`, `dia`, `heart`, `dise`, `status_mem`, `coin_user`, `id_pack`, `status_pack`, `pic_user`) VALUES
(1, 'เกียรติคุณ', 'มั่งมี', 'kiat', '1234', '1969-01-24', 1, '0678851002', 'Nan', 108, 98, 88, 'ข้อเข่าเสื่อม', 1, 25, 1, 'y', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_webanswer`
--

CREATE TABLE `tb_webanswer` (
  `id_wans` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_wques` int(10) NOT NULL,
  `day_ans` date NOT NULL,
  `time_ans` time NOT NULL,
  `detail_ans` text NOT NULL,
  `type_ans` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_webques`
--

CREATE TABLE `tb_webques` (
  `id_wques` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `day_ques` date NOT NULL,
  `time_ques` time NOT NULL,
  `detail_ques` text NOT NULL,
  `type_ques` int(1) NOT NULL,
  `pic_ques` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_ad`);

--
-- Indexes for table `tb_alert`
--
ALTER TABLE `tb_alert`
  ADD PRIMARY KEY (`id_alert`);

--
-- Indexes for table `tb_answer`
--
ALTER TABLE `tb_answer`
  ADD PRIMARY KEY (`id_ans`);

--
-- Indexes for table `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `tb_chat_f`
--
ALTER TABLE `tb_chat_f`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD PRIMARY KEY (`id_com`);

--
-- Indexes for table `tb_friend`
--
ALTER TABLE `tb_friend`
  ADD PRIMARY KEY (`id_friend`);

--
-- Indexes for table `tb_his`
--
ALTER TABLE `tb_his`
  ADD PRIMARY KEY (`id_his`);

--
-- Indexes for table `tb_like`
--
ALTER TABLE `tb_like`
  ADD PRIMARY KEY (`id_like`);

--
-- Indexes for table `tb_meet`
--
ALTER TABLE `tb_meet`
  ADD PRIMARY KEY (`id_meet`);

--
-- Indexes for table `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tb_package`
--
ALTER TABLE `tb_package`
  ADD PRIMARY KEY (`id_pack`);

--
-- Indexes for table `tb_pr`
--
ALTER TABLE `tb_pr`
  ADD PRIMARY KEY (`id_pr`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indexes for table `tb_question`
--
ALTER TABLE `tb_question`
  ADD PRIMARY KEY (`id_ques`);

--
-- Indexes for table `tb_ques_n`
--
ALTER TABLE `tb_ques_n`
  ADD PRIMARY KEY (`id_ques_n`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_webanswer`
--
ALTER TABLE `tb_webanswer`
  ADD PRIMARY KEY (`id_wans`);

--
-- Indexes for table `tb_webques`
--
ALTER TABLE `tb_webques`
  ADD PRIMARY KEY (`id_wques`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_ad` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_alert`
--
ALTER TABLE `tb_alert`
  MODIFY `id_alert` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_answer`
--
ALTER TABLE `tb_answer`
  MODIFY `id_ans` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `id_chat` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_chat_f`
--
ALTER TABLE `tb_chat_f`
  MODIFY `id_chat` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_comment`
--
ALTER TABLE `tb_comment`
  MODIFY `id_com` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_friend`
--
ALTER TABLE `tb_friend`
  MODIFY `id_friend` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_his`
--
ALTER TABLE `tb_his`
  MODIFY `id_his` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_like`
--
ALTER TABLE `tb_like`
  MODIFY `id_like` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_meet`
--
ALTER TABLE `tb_meet`
  MODIFY `id_meet` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id_news` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_package`
--
ALTER TABLE `tb_package`
  MODIFY `id_pack` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pr`
--
ALTER TABLE `tb_pr`
  MODIFY `id_pr` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_pro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_question`
--
ALTER TABLE `tb_question`
  MODIFY `id_ques` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_ques_n`
--
ALTER TABLE `tb_ques_n`
  MODIFY `id_ques_n` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_webanswer`
--
ALTER TABLE `tb_webanswer`
  MODIFY `id_wans` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_webques`
--
ALTER TABLE `tb_webques`
  MODIFY `id_wques` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
