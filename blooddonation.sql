-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2015 at 12:33 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blooddonation`
--

-- --------------------------------------------------------

--
-- Table structure for table `elig`
--

CREATE TABLE IF NOT EXISTS `elig` (
  `description` varchar(132) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_right` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elig`
--

INSERT INTO `elig` (`description`, `gender`, `is_right`) VALUES
('Ever volunteered to donate blood before ?', '3', '1'),
('Ever been advised not to give blood ?', '3', '1'),
('Ever suffered from anaemia or any blood disorder ?', '3', '1'),
('Ever had a serious illness , operation or been  admitted to hospital ?', '3', '1'),
('Had a neurosurgical procedure involving the head,brain or spinal cord between a year?', '3', '1'),
('Ever received a transplant or graft(organ,bone marrow,cornea,dura mater,bone,etc)?', '3', '1'),
('Received injection of human growth hormone for short stature or human pituitary hormone for infertility prior to 2015?', '3', '1'),
('Ever suffered from a head injury,stroke or epilepsy?', '3', '1'),
('Ever had a heart or blood pressure problem,chest pain,rheumatic fever or a heart murmur?', '3', '1'),
('Ever had a bowel disease,stomach or duodenal problems or ulcers?', '3', '1'),
('Ever had kidney, liver or lung problems including tuberculosis(TB)?', '3', '1'),
('Ever had diabetes,a thyroid disorder or an autoimmune disease e.g. rheumatoid arthritis or lupus?', '3', '1'),
('Ever had cancer of any kind including melanoma?', '3', '1'),
('Ever had malaria, Ross River fever, Q fever, leptospirosis or Changas'' disease?', '3', '1'),
('Ever had jaundices(yellow eyes/skin) or hepatitis?', '3', '1'),
('Are you feeling and well?', '2', '1'),
('Have you ever been pregnant (including miscarriage and termination of pregnancy?', '2', '1'),
('have you been pregnant in the last 9  months?', '2', '1'),
('In the last week ,have you:Had dental work, cleaning, fillings or extractions?', '3', '1'),
('Taken any aspirin, pain killers or anti-inflammatory preparations?', '3', '1'),
('Had any cuts,abrasions, sores or rashses?', '3', '1'),
('Had a gastric upset, diarrhoea, abdominal pain or vomiting?', '3', '1'),
('Been unwell, or seen a doctor or any other health care practioner, had an operation (surgical procedure) or any tests/investigation?', '3', '1'),
('Had chest pain/anginaor an irregular heartbeat?', '3', '1'),
('Taken tablets for acen or a skin condition?', '3', '1'),
('Taken any other medication, including regular or clinical trial medication?', '3', '1'),
('Worked in an abattoir?', '3', '1'),
('Had a sexually transmidded infection eg. gonorrhoea, syphilis or genital herpes?', '3', '1'),
('Had any immmunisations/vaccinations including as part of a clinical trials?', '3', '1'),
('Had shingles or chickenpox?', '3', '1'),
('Do you know of anyone in your family who had or has:Creutzfeldt-jakob disease(CJD)?', '3', '1'),
('Gerstmann-Straussler-Scheinker syndrome(GSS)?', '3', '1'),
('Fatal familial insomnia(FFI)?', '3', '1'),
('Thought you could be infected with HIV or gave AIDS?', '3', '1'),
('Use drugs by injection or been injected, even once, with drugs not prescribed by a doctor or dentist?', '3', '1'),
('Had treatment with clotting factors such as Factor Vlll or Factor IX?', '3', '1'),
('Had a test which showed you had hepatitis B, hepatitis C, HIV or HTLV?', '3', '1'),
('In the last 12 months have you:<br>Had an illness with swollen glands and a rash, with or without a fever?', '3', '1'),
('Engaged in sexual activity with someone you might think would answer "yes" to any of questions(1-5)?', '3', '1'),
('Had sexual activity with a new partner who currently lives or has previously lived overseas?', '3', '1'),
('Had sex (with or without a condom) with a man who you think may have had oral or anal?', '3', '1'),
('Had male to male sex(that is ,oral or anal sex ) with or without a condom?', '3', '1'),
('Been a male or female sex worker (eg.received payment for sex in money,gifts or drugs)?', '3', '1'),
('Engaged in sexual activity with a male or female sex worker ?', '3', '1'),
('Been imprisoned in a prison or been held in a lock-up or detention center?', '3', '1'),
('Had a blood transfusion?', '3', '1'),
('Had (yellow) jaundice or hepatitis or been in contact with someone who has?', '3', '1'),
('In the last 6 months have you:<br>Been injured with a used needle(needlestick)?', '3', '1'),
('Had a blood/body fluid splash to eyes,mouth,nose or to broken skin?', '3', '1'),
('Had a tattoo(including cosmetic tattooing), body and/or ear piercin,electrolysis or acupuncture(including dry-needling)?', '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bd_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_bd_admin` (
`admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `login_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_bd_admin`
--

INSERT INTO `tbl_bd_admin` (`admin_id`, `admin_name`, `login_email`, `password`) VALUES
(2, 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bd_appointment`
--

CREATE TABLE IF NOT EXISTS `tbl_bd_appointment` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bloodbank_id` int(11) NOT NULL,
  `appointment_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_bd_appointment`
--

INSERT INTO `tbl_bd_appointment` (`id`, `user_id`, `bloodbank_id`, `appointment_date`, `status`) VALUES
(3, 5, 1, '2015-08-05 11:54:41', 2),
(11, 6, 3, '2015-08-10 13:20:09', 2),
(12, 6, 2, '2015-08-10 13:54:03', 2),
(13, 7, 2, '2015-08-10 15:14:16', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bd_available_blood`
--

CREATE TABLE IF NOT EXISTS `tbl_bd_available_blood` (
`id` int(11) NOT NULL,
  `bloodbank_id` int(11) NOT NULL,
  `bloodtype_id` int(11) NOT NULL,
  `available_count` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_bd_available_blood`
--

INSERT INTO `tbl_bd_available_blood` (`id`, `bloodbank_id`, `bloodtype_id`, `available_count`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 0),
(3, 1, 3, 0),
(4, 1, 4, 0),
(5, 2, 1, 0),
(6, 2, 2, 0),
(7, 2, 3, 1),
(8, 2, 4, 1),
(9, 3, 1, 0),
(10, 3, 2, 0),
(11, 3, 3, 1),
(12, 3, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bd_bloodbank`
--

CREATE TABLE IF NOT EXISTS `tbl_bd_bloodbank` (
`id` int(11) NOT NULL,
  `bank_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_bd_bloodbank`
--

INSERT INTO `tbl_bd_bloodbank` (`id`, `bank_name`, `address`) VALUES
(1, 'National Blood Bank', 'La Thar'),
(2, 'San Pya Hospital', 'Thingungyun'),
(3, 'Insain Hospital', 'Insain');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bd_blood_type`
--

CREATE TABLE IF NOT EXISTS `tbl_bd_blood_type` (
`id` int(11) NOT NULL,
  `blood_type_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_bd_blood_type`
--

INSERT INTO `tbl_bd_blood_type` (`id`, `blood_type_name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'O'),
(4, 'AB');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bd_eligibility`
--

CREATE TABLE IF NOT EXISTS `tbl_bd_eligibility` (
`id` int(11) NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gender` bigint(11) NOT NULL,
  `is_right` bigint(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=115 ;

--
-- Dumping data for table `tbl_bd_eligibility`
--

INSERT INTO `tbl_bd_eligibility` (`id`, `description`, `gender`, `is_right`) VALUES
(65, 'Ever volunteered to donate blood before ?', 3, 1),
(66, 'Ever been advised not to give blood ?', 3, 1),
(67, 'Ever suffered from anaemia or any blood disorder ?', 3, 1),
(68, 'Ever had a serious illness , operation or been  admitted to hospital ?', 3, 1),
(69, 'Had a neurosurgical procedure involving the head,brain or spinal cord between a year?', 3, 1),
(70, 'Ever received a transplant or graft(organ,bone marrow,cornea,dura mater,bone,etc)?', 3, 1),
(71, 'Received injection of human growth hormone for short stature or human pituitary hormone for infertility prior to 2015?', 3, 1),
(72, 'Ever suffered from a head injury,stroke or epilepsy?', 3, 1),
(73, 'Ever had a heart or blood pressure problem,chest pain,rheumatic fever or a heart murmur?', 3, 1),
(74, 'Ever had a bowel disease,stomach or duodenal problems or ulcers?', 3, 1),
(75, 'Ever had kidney, liver or lung problems including tuberculosis(TB)?', 3, 1),
(76, 'Ever had diabetes,a thyroid disorder or an autoimmune disease e.g. rheumatoid arthritis or lupus?', 3, 1),
(77, 'Ever had cancer of any kind including melanoma?', 3, 1),
(78, 'Ever had malaria, Ross River fever, Q fever, leptospirosis or Changas'' disease?', 3, 1),
(79, 'Ever had jaundices(yellow eyes/skin) or hepatitis?', 3, 1),
(80, 'Are you feeling and well?', 2, 1),
(81, 'Have you ever been pregnant (including miscarriage and termination of pregnancy?', 2, 1),
(82, 'have you been pregnant in the last 9  months?', 2, 1),
(83, 'In the last week ,have you:Had dental work, cleaning, fillings or extractions?', 3, 1),
(84, 'Taken any aspirin, pain killers or anti-inflammatory preparations?', 3, 1),
(85, 'Had any cuts,abrasions, sores or rashses?', 3, 1),
(86, 'Had a gastric upset, diarrhoea, abdominal pain or vomiting?', 3, 1),
(87, 'Been unwell, or seen a doctor or any other health care practioner, had an operation (surgical procedure) or any tests/investigation?', 3, 1),
(88, 'Had chest pain/anginaor an irregular heartbeat?', 3, 1),
(89, 'Taken tablets for acen or a skin condition?', 3, 1),
(90, 'Taken any other medication, including regular or clinical trial medication?', 3, 1),
(91, 'Worked in an abattoir?', 3, 1),
(92, 'Had a sexually transmidded infection eg. gonorrhoea, syphilis or genital herpes?', 3, 1),
(93, 'Had any immmunisations/vaccinations including as part of a clinical trials?', 3, 1),
(94, 'Had shingles or chickenpox?', 3, 1),
(95, 'Do you know of anyone in your family who had or has:Creutzfeldt-jakob disease(CJD)?', 3, 1),
(96, 'Gerstmann-Straussler-Scheinker syndrome(GSS)?', 3, 1),
(97, 'Fatal familial insomnia(FFI)?', 3, 1),
(98, 'Thought you could be infected with HIV or gave AIDS?', 3, 1),
(99, 'Use drugs by injection or been injected, even once, with drugs not prescribed by a doctor or dentist?', 3, 1),
(100, 'Had treatment with clotting factors such as Factor Vlll or Factor IX?', 3, 1),
(101, 'Had a test which showed you had hepatitis B, hepatitis C, HIV or HTLV?', 3, 1),
(102, 'In the last 12 months have you:<br>Had an illness with swollen glands and a rash, with or without a fever?', 3, 1),
(103, 'Engaged in sexual activity with someone you might think would answer "yes" to any of questions(1-5)?', 3, 1),
(104, 'Had sexual activity with a new partner who currently lives or has previously lived overseas?', 3, 1),
(105, 'Had sex (with or without a condom) with a man who you think may have had oral or anal?', 3, 1),
(106, 'Had male to male sex(that is ,oral or anal sex ) with or without a condom?', 3, 1),
(107, 'Been a male or female sex worker (eg.received payment for sex in money,gifts or drugs)?', 3, 1),
(108, 'Engaged in sexual activity with a male or female sex worker ?', 3, 1),
(109, 'Been imprisoned in a prison or been held in a lock-up or detention center?', 3, 1),
(110, 'Had a blood transfusion?', 3, 1),
(111, 'Had (yellow) jaundice or hepatitis or been in contact with someone who has?', 3, 1),
(112, 'In the last 6 months have you:<br>Been injured with a used needle(needlestick)?', 3, 1),
(113, 'Had a blood/body fluid splash to eyes,mouth,nose or to broken skin?', 3, 1),
(114, 'Had a tattoo(including cosmetic tattooing), body and/or ear piercin,electrolysis or acupuncture(including dry-needling)?', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bd_user`
--

CREATE TABLE IF NOT EXISTS `tbl_bd_user` (
`id` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_gender` bigint(20) NOT NULL,
  `user_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `blood_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_bd_user`
--

INSERT INTO `tbl_bd_user` (`id`, `user_name`, `user_email`, `user_password`, `user_gender`, `user_address`, `user_phone`, `blood_type_id`) VALUES
(4, 'test', 'test@gmail.com', 'test', 1, 'test', '12345', 1),
(5, 'Aung Hein That', 'aungheinthat@gmail.com', 'aaa', 1, 'Hlaing Thar yar', '12345', 1),
(6, 'Pan Ei Phyu', 'panpan.m@gmail.com', 'panpan', 2, 'la tar', '29249', 3),
(7, 'Nan Dar Oo', 'nandaroo@gmail.com', 'nandaroo', 2, 'Hlaedan', '12123', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bd_admin`
--
ALTER TABLE `tbl_bd_admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_bd_appointment`
--
ALTER TABLE `tbl_bd_appointment`
 ADD PRIMARY KEY (`id`), ADD KEY `bloodbank_id` (`bloodbank_id`);

--
-- Indexes for table `tbl_bd_available_blood`
--
ALTER TABLE `tbl_bd_available_blood`
 ADD PRIMARY KEY (`id`), ADD KEY `bloodbank_id` (`bloodbank_id`), ADD KEY `bloodtype_id` (`bloodtype_id`);

--
-- Indexes for table `tbl_bd_bloodbank`
--
ALTER TABLE `tbl_bd_bloodbank`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bd_blood_type`
--
ALTER TABLE `tbl_bd_blood_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bd_eligibility`
--
ALTER TABLE `tbl_bd_eligibility`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bd_user`
--
ALTER TABLE `tbl_bd_user`
 ADD PRIMARY KEY (`id`), ADD KEY `blood_type_id` (`blood_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bd_admin`
--
ALTER TABLE `tbl_bd_admin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_bd_appointment`
--
ALTER TABLE `tbl_bd_appointment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_bd_available_blood`
--
ALTER TABLE `tbl_bd_available_blood`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_bd_bloodbank`
--
ALTER TABLE `tbl_bd_bloodbank`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_bd_blood_type`
--
ALTER TABLE `tbl_bd_blood_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_bd_eligibility`
--
ALTER TABLE `tbl_bd_eligibility`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `tbl_bd_user`
--
ALTER TABLE `tbl_bd_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bd_appointment`
--
ALTER TABLE `tbl_bd_appointment`
ADD CONSTRAINT `tbl_bd_appointment_ibfk_1` FOREIGN KEY (`bloodbank_id`) REFERENCES `tbl_bd_bloodbank` (`id`);

--
-- Constraints for table `tbl_bd_available_blood`
--
ALTER TABLE `tbl_bd_available_blood`
ADD CONSTRAINT `tbl_bd_available_blood_ibfk_1` FOREIGN KEY (`bloodbank_id`) REFERENCES `tbl_bd_bloodbank` (`id`),
ADD CONSTRAINT `tbl_bd_available_blood_ibfk_2` FOREIGN KEY (`bloodtype_id`) REFERENCES `tbl_bd_blood_type` (`id`);

--
-- Constraints for table `tbl_bd_user`
--
ALTER TABLE `tbl_bd_user`
ADD CONSTRAINT `tbl_bd_user_ibfk_1` FOREIGN KEY (`blood_type_id`) REFERENCES `tbl_bd_blood_type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
