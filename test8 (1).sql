-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 10:51 AM
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
(1, 2, 'วีรชน', 'ใจกล้า', 'admin', '1234', '0876675007', 1, '1.png'),
(2, 3, 'สมจิตร', 'ศรีงาม', 'doc1', '1234', '0675668755', 2, '2.png'),
(3, 4, 'สมพงษ์', 'ใจดี', 'doc2', '1234', '0980004522', 2, '3.png');

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

--
-- Dumping data for table `tb_alert`
--

INSERT INTO `tb_alert` (`id_alert`, `id_user`, `day_alert`, `time_alert`, `detail_alert`, `status_alert`) VALUES
(1, 2, '2024-01-16', '05:58:00', 'ทานยา', 'y');

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

--
-- Dumping data for table `tb_answer`
--

INSERT INTO `tb_answer` (`id_ans`, `id_ques`, `id_ques_n`, `type_ques_n`, `answer`) VALUES
(1, 11, 1, 1, '4'),
(2, 12, 1, 1, '4'),
(3, 13, 1, 1, '4'),
(4, 14, 1, 1, '4'),
(5, 15, 1, 1, '4'),
(6, 16, 1, 1, '4'),
(7, 17, 1, 1, '4'),
(8, 18, 1, 1, '4'),
(9, 19, 1, 1, '4'),
(10, 20, 1, 1, '4'),
(11, 1, 2, 2, '4'),
(12, 2, 2, 2, '4'),
(13, 3, 2, 2, '4'),
(14, 4, 2, 2, '4'),
(15, 5, 2, 2, '4'),
(16, 6, 2, 2, '4'),
(17, 7, 2, 2, '4'),
(18, 8, 2, 2, '4'),
(19, 9, 2, 2, '4'),
(20, 10, 2, 2, '4');

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

--
-- Dumping data for table `tb_chat`
--

INSERT INTO `tb_chat` (`id_chat`, `id_user`, `id_his`, `day_chat`, `time_chat`, `detail_chat`, `type_chat`, `status_chat`) VALUES
(1, 1, 1, '2024-01-15', '15:12:59', 'Help ', 1, 'y'),
(2, 3, 1, '2024-01-15', '15:13:07', 'what?', 2, 'y'),
(3, 2, 3, '2024-01-15', '15:52:10', 'hi', 1, 'y'),
(4, 3, 3, '2024-01-15', '15:52:17', 'what?', 2, 'y');

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

--
-- Dumping data for table `tb_chat_f`
--

INSERT INTO `tb_chat_f` (`id_chat`, `id_user`, `id_friend`, `day_chat`, `time_chat`, `detail_chat`) VALUES
(1, 2, 1, '2024-01-15', '15:56:43', 'hi'),
(2, 1, 1, '2024-01-15', '15:56:51', 'Hello');

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

--
-- Dumping data for table `tb_comment`
--

INSERT INTO `tb_comment` (`id_com`, `id_user`, `id_news`, `day_com`, `time_com`, `comment`) VALUES
(1, 1, 1, '2024-01-14', '22:12:48', 'hi'),
(2, 2, 6, '2024-01-15', '15:55:26', 'เป็นประโยชน์มากค่ะ'),
(3, 2, 5, '2024-01-15', '15:55:34', 'น่ากลัวมาก');

-- --------------------------------------------------------

--
-- Table structure for table `tb_friend`
--

CREATE TABLE `tb_friend` (
  `id_friend` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_user2` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_friend`
--

INSERT INTO `tb_friend` (`id_friend`, `id_user`, `id_user2`) VALUES
(1, 2, 1),
(2, 2, 3);

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

--
-- Dumping data for table `tb_his`
--

INSERT INTO `tb_his` (`id_his`, `id_user`, `sys`, `dia`, `heart`, `detail`, `status_mem`, `coin_user`, `day_in`, `status_his`) VALUES
(1, 1, 160, 120, 100, 'bad', 7, -1, '2024-01-15', 'y'),
(2, 1, 112, 90, 89, '', 1, 5, '2024-01-15', 'y'),
(3, 2, 160, 100, 100, 'bad', 7, -1, '2024-01-15', 'y');

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

--
-- Dumping data for table `tb_like`
--

INSERT INTO `tb_like` (`id_like`, `id_user`, `id_wques`, `status_like`) VALUES
(1, 2, 2, 'y'),
(2, 1, 2, 'y'),
(3, 2, 1, 'y');

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

--
-- Dumping data for table `tb_meet`
--

INSERT INTO `tb_meet` (`id_meet`, `id_user`, `day_meet`, `time_meet`, `detail_meet`, `status_meet`, `type_cost`, `total`) VALUES
(1, 1, '2024-01-16', '06:13:00', 'นัดตรวจร่างกาย', 'y', 1, 1670),
(2, 1, '2024-01-24', '08:14:00', 'ตรวจ', 'y', 2, 1170),
(3, 2, '2024-01-17', '07:52:00', 'นัด', 'y', 1, 1670);

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
(1, 'โควิด-19 คืออะไร??', 'โควิด 19 คือเชื้อโคโรนาสายพันธ์ุใหม่ที่พึ่งถูกค้นพบล่าสุด โดยเกิดขึ้นในช่วงของปลายปี 2019 จึงได้ชื่อว่า โควิด 19 อาการแรกเริ่มที่สังเกตุได้ชัดสำหรับเชื้อนี้คือ การรับรู้ทางรสชาติ และกลิ่นที่ลดลง ปัจจุบันรักษาได้ง่ายด้วยตัวเองแล้วไม่เป็นอันตรายมากถึงชีวิตเหมือนตอนแรกเริ่มที่ได้ถือกำเนิดขึ้น', '2024-01-15', '1.png', 11),
(2, 'ผลไม้ที่มีประโยชน์ต่อผู้สูงวัย', 'ผลไม้นั้นมีมากมายหลากหลายชนิด และมีประโยชน์ต่อร่างกายของเราเป็นอย่างมาก แต่วันนี้เราจะมานำเสนอผลไม้ที่มีประโยชน์ต่อผู้สูงอายุ ได้แก่ สับปะรด ส้มเขียวหวาน แตงโม และมะละกอ', '2024-01-15', '2.png', 0),
(3, 'สัตว์เลี้ยงกับผู้สูงอายุ', 'เมื่อเราเห็นผู้สูงอายุเราก็มักจะเห็นท่านอยู่กับเหล่าสัตว์เลี้ยงอยู่บ่อยๆ แต่จะมีใครทราบหรือไม่ว่าการให้ท่านได้เล่นกับเหล่าสัตว์เลี้ยงมีประโยชน์กว่าที่คิดเพราะนอกจากจะช่วยให้อารมณ์ดีขึ้นแล้วยังช่วยในเรื่องของความจำอีกด้วย', '2024-01-15', '3.png', 0),
(4, 'ดูแลสุขภาพผู้สูงวัยอย่างไร?', 'เมื่อแก่ตัวลงร่างกายของเราก็เริ่มมีการเสื่อมสภาพมากขึ้น ทำให้เสี่ยงต่อการเป็นโรคต่างๆได้ง่าย แต่วันนี้เรามีวิธีการดูแลตัวเองให้มีสุขภาพที่แข็งแรงและห่างไกลโรคสำหรับผู้สูงวัยกัน ได้แก่ การพักผ่อนและดื่มน้ำให้เพียงพอ รวมไปถึงการออกกำลังกายวันละเล็กๆน้อยๆ ก็ช่วยได้เช่นกัน', '2024-01-15', '4.png', 0),
(5, 'อาการขาดน้ำที่ไม่ควรมองข้าม', 'อาการขาดน้ำในผู้สูงวัยนั้น สามารถเกิดขึ้นได้ง่ายมากและอันตรายมากอีกด้วยเนื่องจากการรับรู้ในส่วนต่างๆของร่างกายที่ลดลงทำให้ร่างกายไม่รู้สึกถึงการขาดน้ำเราจึงควรคอยสังเกตุอาการอย่างใกล้ชิด อาการในแรกเริ่มที่เห็นได้ง่ายก็คือ ปากที่เริ่มซีด หน้าตาที่ดูไม่ค่อยสดใส', '2024-01-15', '5.png', 3),
(6, 'หูตึงเกิดจากอะไร', 'อาการหูตึงนั้นเกิดขึ้นได้จากหลายสาเหตุไม่เพียงแค่เพราะแก่ตัวลง เท่านั้นแต่บางครั้งก็เกิดมาจากการได้ยินเสียงอะไรที่ดังมากๆ บ่อยจนเกินไปหรือเป็นเวลานานจนทำให้เส้นประสาทในการได้ยินเสื่อมลงจนมาถึงอาการหูตึงในที่สุด', '2024-01-15', '6.png', 3);

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

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `id_user`, `id_pro`, `day_order`, `pay_order`, `num_order`, `type_order`, `total_order`, `no_order`, `status_order`) VALUES
(1, 1, 2, '2024-01-15', 1, 1, 2, 213, '2000475846781', 'y'),
(2, 2, 3, '2024-01-15', 3, 1, 1, 499, '2000475846782', 'y');

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
(3, 'สุขภาพดี', 2500, 'แพ็คเกจใส่ใจสุขภาพ ท่านจะได้รับบริการต่าง ๆ มากมาย เช่น ระบบบันทึกสุขภาพประจำวัน แต้มแลกซื้อสินค้าจากการบันทึกสุขภาพประจำวัน บริการปรึกษาปัญหาสุขภาพกับแพทย์โดยตรง รับใบนัดและส่วนลดจากค่าบริการทางการแพทย์ 5% !!!', 5),
(4, 'ใส่ใจสุขภาพ', 3500, 'แพ็คเกจใส่ใจสุขภาพ ท่านจะได้รับบริการต่าง ๆ มากมาย เช่น ระบบบันทึกสุขภาพประจำวัน แต้มแลกซื้อสินค้าจากการบันทึกสุขภาพประจำวัน บริการปรึกษาปัญหาสุขภาพกับแพทย์โดยตรง รับใบนัดและการแจ้งเตือนเวลารับประทานยาจากแพทย์ และส่วนลดจากค่าบริการทางการแพทย์ 10% !!!', 10);

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

--
-- Dumping data for table `tb_pr`
--

INSERT INTO `tb_pr` (`id_pr`, `name_pr`, `tel_pr`, `type_ques`, `price_pr`, `url_pr`, `detail_pr`, `pic_pr`) VALUES
(1, 'Care Your Heart', '0000000000', 4, 3500, 'http:carey', '', '1.png'),
(2, 'Care Your Heart', '0000000000', 4, 3500, 'http:carey', '', '2.png'),
(3, 'Care Your Heart', '0000000000', 4, 3500, 'http:carey', '', '3.png');

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
(1, 'Vitamin C', 299, 1, 20, 100, 'Vitamin C อาหารเสริมเพื่อสุขภาพ', '1.png'),
(2, 'Vitamin A', 250, 1, 15, 99, 'Vitamin A อาหารเสริมเพื่อสุขภาพ', '2.png'),
(3, 'ครีมบำรุง', 499, 2, 40, 99, 'dasddadsagrtujtyytjghjkghkkykluikjutrf', '3.png'),
(4, 'อุปกรณ์ออกกำลังกาย', 100, 1, 10, 150, 'อุปกรณ์ออกกำลังกายเพื่อสุขภาพ', '4.png'),
(5, 'เซรั่มบำรุงผิวหน้า', 399, 2, 30, 100, 'เซรั่มบำรุงผิวหน้าเพื่อผิวที่ดีขึ้น ลดริ้วรอย', '5.png'),
(6, 'แปรงสีฟัน', 60, 3, 6, 100, 'แปรงสีฟันเพื่อสุขภาพ', '6.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_question`
--

CREATE TABLE `tb_question` (
  `id_ques` int(10) NOT NULL,
  `question` varchar(100) NOT NULL,
  `type_ques_n` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_question`
--

INSERT INTO `tb_question` (`id_ques`, `question`, `type_ques_n`) VALUES
(1, 'แพทย์ให้คำปรึกษาได้อย่างรวดเร็ว', 2),
(2, 'แพทย์ให้คำปรึกษาในช่วงเวลาที่เหมาะสม', 2),
(3, 'แพทย์มีการซักถามประวัติอาการตามขั้นตอน', 2),
(4, 'แพทย์แสดงถึงความสามารถที่มีความน่าเชื่อถือได้', 2),
(5, 'แพทย์แสดงถึงพฤติกรรม และเจตคติที่ดีในการให้คำปรึกษา', 2),
(6, 'แพทย์เลือกใช้ถ้อยคำในการให้คำปรึกษาได้อย่างเหมาะสม เข้าใจง่าย', 2),
(7, 'แพทย์สามารถให้คำปรึกษาได้อย่างละเอียด', 2),
(8, 'แพทย์ให้ข้อมูลเพิ่มเติมที่เป็นประโยชน์ต่อผู้รับคำปรึกษา', 2),
(9, 'แพทย์ไม่ล่วงเกิน หรือซักถามข้อมูลเพิ่มเติมนอกเหนือจากการรักษา', 2),
(10, 'แพทย์มีการวินิจฉัยอาการที่ครอบคลุม และเป็นไปตามขั้นตอน', 2),
(11, 'การออกแบบของเว็บไซต์มีความสวยงามน่าดึงดูด', 1),
(12, 'การจัดวางรูป และเนื้อหาภายในเว็บไซต์มีความเหมาะสม', 1),
(13, 'ขนาดของตัวอักษมีความเหมาะสม', 1),
(14, 'ขั้นตอนการสมัครสมาชิกสะดวก และรวดเร็ว', 1),
(15, 'ข้อมูลภายในเว็บไซต์มีความถูกต้อง น่าเชื่อถือได้', 1),
(16, 'ข้อมูลภายในเว็บไซต์มีประโยชน์ต่อผู้รับคำปรึกษา', 1),
(17, 'ขั้นตอนการสั่งซื้อแพ็คเกจสะดวก และรวดเร็ว', 1),
(18, 'บันทึกสุขภาพใช้งานง่าย และมีการคำนวณที่ถูกต้อง', 1),
(19, 'การแจ้งเตือนจากเว็บไซต์เห็นได้ง่าย และชัดเจน', 1),
(20, 'เว็บไซต์มีความเหมาะสมกับผู้สูงวัย', 1);

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

--
-- Dumping data for table `tb_ques_n`
--

INSERT INTO `tb_ques_n` (`id_ques_n`, `id_user`, `day_ques_n`, `type_ques_n`, `status_n`) VALUES
(1, 1, '2024-01-15', 1, 'y'),
(2, 1, '2024-01-15', 2, 'y'),
(3, 2, '2024-01-15', 2, 'n');

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
  `pic_user` varchar(100) NOT NULL,
  `status_on` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `name_user`, `sname_user`, `user`, `pass`, `born`, `sex`, `tel`, `addr`, `sys`, `dia`, `heart`, `dise`, `status_mem`, `coin_user`, `id_pack`, `status_pack`, `pic_user`, `status_on`) VALUES
(1, 'เกียรติคุณ', 'มั่งมี', 'kiat', '1234', '1969-01-24', 1, '0678851002', 'Nan', 112, 90, 89, 'ข้อเข่าเสื่อม', 1, 9, 4, 'y', '1.png', 'y'),
(2, 'สมศรี', 'มีสุข', 'sri', '1234', '1965-07-14', 2, '0655556776', 'TH', 160, 100, 100, '', 7, 2, 4, 'y', '2.png', 'y'),
(3, 'ชูชัย', 'มีบุญ', 'chai', '1234', '1960-07-14', 1, '0901445465', 'TH', 118, 109, 90, 'โรคหัวใจ', 1, 5, 1, 'n', '3.png', 'n'),
(4, 'เสมมา', 'สุขศรี', 'sem', '1234', '1970-06-10', 1, '0895600113', 'Nan', 118, 108, 89, '', 1, 5, 1, 'n', '4.png', 'y');

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

--
-- Dumping data for table `tb_webanswer`
--

INSERT INTO `tb_webanswer` (`id_wans`, `id_user`, `id_wques`, `day_ans`, `time_ans`, `detail_ans`, `type_ans`) VALUES
(1, 1, 1, '2024-01-15', '13:18:02', 'เริ่มจากการนอนพักผ่อนให้เพียงพอง่ายๆเเลยครับ^^', 2),
(2, 1, 2, '2024-01-15', '15:57:16', 'สั่งในเมนูสินค้าดูได้นะ', 1),
(3, 1, 2, '2024-01-15', '15:57:47', 'เลือกเมนู \"สินค้า\" ด้านหน้าเว็บไซต์ได้เลยครับ', 2),
(4, 2, 1, '2024-01-15', '16:01:37', 'หรือให้เราไปดูแลแทนก็ได้นะ-//-', 1);

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
-- Dumping data for table `tb_webques`
--

INSERT INTO `tb_webques` (`id_wques`, `id_user`, `day_ques`, `time_ques`, `detail_ques`, `type_ques`, `pic_ques`) VALUES
(1, 1, '2024-01-14', '22:16:32', 'ผมอยากดูแลตัวเองทำไรบ้างดีครับ', 1, ''),
(2, 2, '2024-01-15', '15:56:01', 'เราอยากสั่งครีมทำไงหรอคะ?', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_ad`),
  ADD KEY `id_pack` (`id_pack`);

--
-- Indexes for table `tb_alert`
--
ALTER TABLE `tb_alert`
  ADD PRIMARY KEY (`id_alert`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_answer`
--
ALTER TABLE `tb_answer`
  ADD PRIMARY KEY (`id_ans`),
  ADD KEY `id_ques` (`id_ques`),
  ADD KEY `id_ques_n` (`id_ques_n`);

--
-- Indexes for table `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_his` (`id_his`);

--
-- Indexes for table `tb_chat_f`
--
ALTER TABLE `tb_chat_f`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_friend` (`id_friend`);

--
-- Indexes for table `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_news` (`id_news`);

--
-- Indexes for table `tb_friend`
--
ALTER TABLE `tb_friend`
  ADD PRIMARY KEY (`id_friend`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_his`
--
ALTER TABLE `tb_his`
  ADD PRIMARY KEY (`id_his`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_like`
--
ALTER TABLE `tb_like`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_wques` (`id_wques`);

--
-- Indexes for table `tb_meet`
--
ALTER TABLE `tb_meet`
  ADD PRIMARY KEY (`id_meet`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pro` (`id_pro`);

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
  ADD PRIMARY KEY (`id_ques_n`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_pack` (`id_pack`);

--
-- Indexes for table `tb_webanswer`
--
ALTER TABLE `tb_webanswer`
  ADD PRIMARY KEY (`id_wans`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_wques` (`id_wques`);

--
-- Indexes for table `tb_webques`
--
ALTER TABLE `tb_webques`
  ADD PRIMARY KEY (`id_wques`),
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id_alert` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_answer`
--
ALTER TABLE `tb_answer`
  MODIFY `id_ans` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `id_chat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_chat_f`
--
ALTER TABLE `tb_chat_f`
  MODIFY `id_chat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_comment`
--
ALTER TABLE `tb_comment`
  MODIFY `id_com` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_friend`
--
ALTER TABLE `tb_friend`
  MODIFY `id_friend` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_his`
--
ALTER TABLE `tb_his`
  MODIFY `id_his` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_like`
--
ALTER TABLE `tb_like`
  MODIFY `id_like` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_meet`
--
ALTER TABLE `tb_meet`
  MODIFY `id_meet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id_news` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_package`
--
ALTER TABLE `tb_package`
  MODIFY `id_pack` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pr`
--
ALTER TABLE `tb_pr`
  MODIFY `id_pr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_pro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_question`
--
ALTER TABLE `tb_question`
  MODIFY `id_ques` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_ques_n`
--
ALTER TABLE `tb_ques_n`
  MODIFY `id_ques_n` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_webanswer`
--
ALTER TABLE `tb_webanswer`
  MODIFY `id_wans` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_webques`
--
ALTER TABLE `tb_webques`
  MODIFY `id_wques` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`id_pack`) REFERENCES `tb_package` (`id_pack`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_alert`
--
ALTER TABLE `tb_alert`
  ADD CONSTRAINT `tb_alert_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_answer`
--
ALTER TABLE `tb_answer`
  ADD CONSTRAINT `tb_answer_ibfk_1` FOREIGN KEY (`id_ques`) REFERENCES `tb_question` (`id_ques`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_answer_ibfk_2` FOREIGN KEY (`id_ques_n`) REFERENCES `tb_ques_n` (`id_ques_n`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD CONSTRAINT `tb_chat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_chat_ibfk_2` FOREIGN KEY (`id_his`) REFERENCES `tb_his` (`id_his`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_chat_f`
--
ALTER TABLE `tb_chat_f`
  ADD CONSTRAINT `tb_chat_f_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_chat_f_ibfk_2` FOREIGN KEY (`id_friend`) REFERENCES `tb_friend` (`id_friend`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD CONSTRAINT `tb_comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_comment_ibfk_2` FOREIGN KEY (`id_news`) REFERENCES `tb_news` (`id_news`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_his`
--
ALTER TABLE `tb_his`
  ADD CONSTRAINT `tb_his_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_like`
--
ALTER TABLE `tb_like`
  ADD CONSTRAINT `tb_like_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_meet`
--
ALTER TABLE `tb_meet`
  ADD CONSTRAINT `tb_meet_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_order_ibfk_2` FOREIGN KEY (`id_pro`) REFERENCES `tb_product` (`id_pro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_ques_n`
--
ALTER TABLE `tb_ques_n`
  ADD CONSTRAINT `tb_ques_n_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_pack`) REFERENCES `tb_package` (`id_pack`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_webanswer`
--
ALTER TABLE `tb_webanswer`
  ADD CONSTRAINT `tb_webanswer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_webanswer_ibfk_2` FOREIGN KEY (`id_wques`) REFERENCES `tb_webques` (`id_wques`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_webques`
--
ALTER TABLE `tb_webques`
  ADD CONSTRAINT `tb_webques_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
