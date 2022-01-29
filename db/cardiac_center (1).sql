-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2022 at 12:59 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cardiac center`
--

-- --------------------------------------------------------

--
-- Table structure for table `confirm_pt`
--

CREATE TABLE `confirm_pt` (
  `con_id` int(255) NOT NULL,
  `con_HN` varchar(255) NOT NULL,
  `con_d` varchar(255) NOT NULL,
  `con_code` varchar(255) NOT NULL,
  `con_n` varchar(255) NOT NULL,
  `con_med` int(100) NOT NULL,
  `con_c` varchar(255) NOT NULL COMMENT '0=ยืนยัน 1=ลืม',
  `con_f` int(100) NOT NULL,
  `con_r` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `confirm_pt`
--

INSERT INTO `confirm_pt` (`con_id`, `con_HN`, `con_d`, `con_code`, `con_n`, `con_med`, `con_c`, `con_f`, `con_r`) VALUES
(2, '610610257', '22-01-29', '559+565', 'pjojojoko', 9, '0', 0, 9),
(3, '610610257', '22-01-29', 'ANAT05', 'ANapril *TAB. 20 MG.', 4, '0', 0, 4),
(4, '610610257', '22-01-29', 'ard46', 'fyasffugw85', 9, '0', 0, 9),
(5, '610610257', '22-01-29', 'FURT02', 'Furosemide Tab 40 mg', 1, '0', 0, 1),
(6, '610610257', '22-01-29', 'LIST02', 'Lispril Tab   5  mg', 2, '0', 0, 2),
(7, '610610257', '22-01-29', 'TRIT07', 'Tritace Tab 2.5 mg', 2, '1', 1, 1),
(8, '610610257', '22-01-29', 'TRIT08', 'Tritace Tab 5 mg', 3, '1', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `med_id` int(25) NOT NULL,
  `med_code` varchar(100) NOT NULL,
  `med_n` varchar(100) NOT NULL,
  `med_unit` varchar(100) NOT NULL,
  `med_pp` varchar(100) NOT NULL,
  `med_pm` varchar(100) NOT NULL,
  `med_p` varchar(500) NOT NULL,
  `med_e` varchar(500) NOT NULL,
  `med_w` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`med_id`, `med_code`, `med_n`, `med_unit`, `med_pp`, `med_pm`, `med_p`, `med_e`, `med_w`) VALUES
(5, 'LIST02', 'Lispril Tab   5  mg', '', 'Lispril5.jfif', 'Lispril tab 5.gif', 'เป็นยาสำหรับรักษาโรคความดันโลหิตสูง เมื่อความดันโลหิตลดลงจะช่วยป้องกันโรคหลอดเลือดสมอง (Strokes) โรคกล้ามเนื้อหัวใจตายจากการขาดเลือด (Heart attacks) และโรคไต', 'โดยปกติ อาจทำให้เกิดผลข้างเคียง เช่น วิงเวียนศีรษะ ปวดศีรษะ ไอแห้ง', 'ผู้ป่วยไม่ควรใช้ยานี้ หากมีประวัติแพ้ยาต้านเอนไซม์เอซีอี'),
(8, 'ANAT03', 'Anapril Tab 5 mg', '', 'Anapril tab 5(1.jpg', 'Anapril tab 5.gif.jpg', 'ใช้ในการรักษาความผิดปกติของหัวใจห้องล่างซ้ายซึ่งทำหน้าที่ส่งเลือดไปเลี้ยงส่วนต่าง ๆ ของร่างกาย', 'ผลข้างเคียงที่พบบ่อย ได้แก่ มึนงงหรือหน้ามืด รู้สึกเหนื่อย ไอ', 'Enalapril อาจส่งผลกระทบต่อไต หัวใจ และระดับอิเล็กโทรไลต์ (Electrolyte) ในร่างกาย ซึ่งทำให้เกิดอาการบวมอักเสบตามร่างกาย ปัสสาวะน้อย น้ำหนักขึ้นอย่างรวดเร็ว หายใจติดขัด เจ็บหน้าอก หัวใจเต้นแรง ชีพจรลดหรืออ่อนลง รู้สึกอ่อนแรง หรือกล้ามเนื้อตึง หากผู้ป่วยมีอาการเหล่านี้ควรแจ้งให้แพทย์ทราบ'),
(9, 'ANAT05', 'ANapril *TAB. 20 MG.', '', 'Anapril tab 5(,.jpg', 'Anapril tab 20.gif', 'ใช้ในการรักษาความผิดปกติของหัวใจห้องล่างซ้ายซึ่งทำหน้าที่ส่งเลือดไปเลี้ยงส่วนต่าง ๆ ของร่างกาย', 'ผลข้างเคียงที่พบบ่อย ได้แก่ มึนงงหรือหน้ามืด รู้สึกเหนื่อย ไอ', 'ผู้ป่วยที่เคยแพ้ยาในกลุ่มนี มีโรคลมพิษแบบแองจิโออีดีมา (Angioedema) ซึ่งคืออาการบวมภายใต้ผิวหนังอ่อนโดยเฉพาะหนังตาและริมฝีปาก ไม่ควรใช้ยานี้'),
(10, 'TRIT07', 'Tritace Tab 2.5 mg', '', 'Tritace tab 2.5 1.jpg', 'Tritace tab 2.5.gif', 'ใช้ป้องกันโรคหัวใจและโรคหลอดเลือดหัวใจในผู้ป่วยที่มีความเสี่ยงสูง', 'ผลข้างเคียงที่พบได้ทั่วไป เช่น ปวดศีรษะ ไอแห้ง เวียนศีรษะ อ่อนเพลีย ตามัว มีเหงื่อออก และรู้สึกเหนื่อย เป็นต้น', 'สำหรับผู้ป่วยโรคเบาหวาน ห้ามใช้ยาชนิดนี้ร่วมกับยาที่มีส่วนผสมของอะลิสคิเรน เช่น เทคเทอร์นา หรือเทกแคมโล เป็นต้น'),
(11, 'TRIT08', 'Tritace Tab 5 mg', '', 'Tritace tab 5 1.jpg', 'Tritace tab 5.gif', 'ใช้ป้องกันโรคหัวใจและโรคหลอดเลือดหัวใจในผู้ป่วยที่มีความเสี่ยงสูง', 'ผลข้างเคียงที่พบได้ทั่วไป เช่น ปวดศีรษะ ไอแห้ง เวียนศีรษะ อ่อนเพลีย ตามัว มีเหงื่อออก และรู้สึกเหนื่อย เป็นต้น', 'สำหรับผู้ป่วยโรคเบาหวาน ห้ามใช้ยาชนิดนี้ร่วมกับยาที่มีส่วนผสมของอะลิสคิเรน เช่น เทคเทอร์นา หรือเทกแคมโล เป็นต้น'),
(15, 'FURT01', 'Furosemide Tab 40 mg', '', 'Furetic_Furetic-S6002PPS0.jfif', 'Furetic tab 40 mg.gif', 'ขับน้ำ และ โซเดียมส่วนเกิดออกจากร่างกาย', 'อาจทำให้เกิดอาการไม่พึงประสงค์ได้แก่ หัวใจเต้นผิดจังหวะ ความดันต่ำในขณะเปลี่ยนท่าทาง ปฏิกิริยาผื่นแพ้ทางผิวหนัง', 'ห้ามใช้ในผู้ป่วยที่มีภาวะปัสสาวะออกน้อยผิดปกติ (anuria)'),
(16, 'FURT02', 'Furosemide Tab 40 mg', '', 'Furetic_Furetic-S6002PPS0.jfif', 'Furetic tab 40 mg.gif', 'ขับน้ำ และ โซเดียมส่วนเกิดออกจากร่างกาย', 'อาจทำให้เกิดอาการไม่พึงประสงค์ได้แก่ หัวใจเต้นผิดจังหวะ ความดันต่ำในขณะเปลี่ยนท่าทาง ปฏิกิริยาผื่นแพ้ทางผิวหนัง', 'ห้ามใช้ในผู้ป่วยที่มีภาวะปัสสาวะออกน้อยผิดปกติ (anuria)'),
(22, 'กเกเ้เีดีเั', 'ส่ส่่ยน่นย่', '', 'logo-Check.png', 'logo_popup.png', 'าา่่บ่าฟบก', 'นห้ญฯฐฯ๋', 'ะนหะ่บหยา'),
(23, '559+565', 'pjojojoko', 'ขวด', '', '', 'aepgjpjo[', 'oeosgkakgpkdl', '[w[aot[o[pg[d;g[v'),
(24, '', '', '', '', '', '', '', ''),
(26, 'ard46', 'fyasffugw85', 'หลอด', '', '', '-ตาราง product จะเหมือนกับสมุดบันทึกรายการสินค้าที่มีอยู่ในคงคลัีงทั้งหมด (บันทึกข้อมูลลักษณะของสินค้า)\r\n-พระองค์ ผู้ที่นับถืออย่างสูง เช่น พระพุทธเจ้า พระราชา เทวดาที่เป็นใหญ่ เจ้านายชั้นสูง\r\n', 'โดยปกติ อาจทำให้เกิดผลข้างเคียง เช่น วิงเวียนศีรษะ ปวดศีรษะ ไอแห้ง', 'knjliniomklm');

-- --------------------------------------------------------

--
-- Table structure for table `ordermed`
--

CREATE TABLE `ordermed` (
  `or_id` int(11) NOT NULL,
  `or_HN` varchar(100) NOT NULL,
  `or_code` varchar(255) NOT NULL,
  `or_n` varchar(255) NOT NULL,
  `or_tt` int(11) NOT NULL,
  `or_time` varchar(100) NOT NULL,
  `or_ptime` varchar(100) NOT NULL,
  `or_day` int(11) NOT NULL,
  `or_unit` varchar(255) NOT NULL,
  `or_med` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordermed`
--

INSERT INTO `ordermed` (`or_id`, `or_HN`, `or_code`, `or_n`, `or_tt`, `or_time`, `or_ptime`, `or_day`, `or_unit`, `or_med`) VALUES
(127, '610610257', 'TRIT07', 'Tritace Tab 2.5 mg', 90, 'ก่อนอาหาร', '1,2,3', 3, '', 9),
(128, '610610257', 'TRIT07', 'Tritace Tab 2.5 mg', 80, 'ก่อนอาหาร', '1,2,3', 2, '', 6),
(129, '610610257', 'ANAT05', 'ANapril *TAB. 20 MG.', 80, 'หลังอาหาร', '1,2', 2, '', 4),
(130, '610610257', 'FURT02', 'Furosemide Tab 40 mg', 30, 'ก่อนนอน', '4', 1, '', 1),
(131, '610610257', 'LIST02', 'Lispril Tab   5  mg', 60, 'ก่อนอาหาร', '3', 2, '', 2),
(132, '610610257', 'TRIT07', 'Tritace Tab 2.5 mg', 60, 'หลังอาหาร', '3', 2, '', 2),
(133, '610610257', 'TRIT08', 'Tritace Tab 5 mg', 90, 'หลังอาหาร', '3', 3, '', 3),
(134, '610610257', 'ard46', 'fyasffugw85', 90, 'ก่อนอาหาร', '1,2,3', 3, 'หลอด', 9),
(135, '610610257', '559+565', 'pjojojoko', 90, 'ก่อนอาหาร', '1,2,3', 3, 'ขวด', 9);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `member_id` int(25) NOT NULL,
  `member_HN` int(11) NOT NULL,
  `member_fname` varchar(100) NOT NULL,
  `member_lname` varchar(100) NOT NULL,
  `member_gender` varchar(100) NOT NULL,
  `member_birth` varchar(255) NOT NULL,
  `member_age` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`member_id`, `member_HN`, `member_fname`, `member_lname`, `member_gender`, `member_birth`, `member_age`) VALUES
(47, 610610257, 'ไอนา', 'ดี', 'Female', '2009-10-28', '19');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `or_id` int(11) NOT NULL,
  `or_HN` varchar(255) NOT NULL,
  `or_code` varchar(255) NOT NULL,
  `or_n` varchar(255) NOT NULL,
  `or_time` varchar(255) NOT NULL,
  `or_ptime` varchar(255) NOT NULL,
  `or_tt` int(100) NOT NULL,
  `or_day` int(100) NOT NULL,
  `or_unit` varchar(255) NOT NULL,
  `or_med` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`or_id`, `or_HN`, `or_code`, `or_n`, `or_time`, `or_ptime`, `or_tt`, `or_day`, `or_unit`, `or_med`) VALUES
(18, '610610257', 'TRIT07', 'Tritace Tab 2.5 mg', 'ก่อนอาหาร', '3', 230, 2, '', 2),
(19, '610610257', 'ANAT05', 'ANapril *TAB. 20 MG.', 'หลังอาหาร', '1,2', 80, 2, '', 4),
(20, '610610257', 'FURT02', 'Furosemide Tab 40 mg', 'ก่อนนอน', '4', 30, 1, '', 1),
(21, '610610257', 'LIST02', 'Lispril Tab   5  mg', 'ก่อนอาหาร', '3', 60, 2, '', 2),
(22, '610610257', 'TRIT08', 'Tritace Tab 5 mg', 'หลังอาหาร', '3', 90, 3, '', 3),
(23, '610610257', 'ard46', 'fyasffugw85', 'ก่อนอาหาร', '1,2,3', 90, 3, 'หลอด', 9),
(24, '610610257', '559+565', 'pjojojoko', 'ก่อนอาหาร', '1,2,3', 90, 3, 'ขวด', 9);

-- --------------------------------------------------------

--
-- Table structure for table `timea`
--

CREATE TABLE `timea` (
  `timeid` int(100) NOT NULL,
  `timed` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timea`
--

INSERT INTO `timea` (`timeid`, `timed`) VALUES
(1, 'ก่อนอาหาร'),
(2, 'หลังอาหาร'),
(3, 'ก่อนนอน');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(14, 'haru', 'harulee@gmail.com', '7a6a74cbe87bc60030a4bd041dd47b78');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `confirm_pt`
--
ALTER TABLE `confirm_pt`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`med_id`),
  ADD UNIQUE KEY `med_code` (`med_code`);

--
-- Indexes for table `ordermed`
--
ALTER TABLE `ordermed`
  ADD PRIMARY KEY (`or_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`or_id`);

--
-- Indexes for table `timea`
--
ALTER TABLE `timea`
  ADD PRIMARY KEY (`timeid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `confirm_pt`
--
ALTER TABLE `confirm_pt`
  MODIFY `con_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `med_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ordermed`
--
ALTER TABLE `ordermed`
  MODIFY `or_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `member_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `or_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `timea`
--
ALTER TABLE `timea`
  MODIFY `timeid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
