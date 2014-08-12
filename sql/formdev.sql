-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2014 at 09:20 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `formdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `announcement` text NOT NULL,
  `datePosted` date DEFAULT NULL,
  `description` text NOT NULL,
  `postedByFaciId` int(11) NOT NULL,
  PRIMARY KEY (`pk`),
  KEY `fk_Announcement_Faci1_idx` (`postedByFaciId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`pk`, `announcement`, `datePosted`, `description`, `postedByFaciId`) VALUES
(2, 'No FORMDEV Classes', '2014-03-26', 'There will be no FORMDEV Classes on the first term of the Academic School year 2014-2015.', 11111111),
(3, 'FORMDEV Website is released!', '2014-03-26', 'After a term of development, the website is in its beta testing period. ', 11111111);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `answer` text,
  `reply` text,
  `dateAnswered` date DEFAULT NULL,
  `dateReplied` date DEFAULT NULL,
  `dateOpened` date DEFAULT NULL,
  `questionFk` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `faciId` int(11) NOT NULL,
  PRIMARY KEY (`pk`),
  KEY `fk_Answer_Question1_idx` (`questionFk`),
  KEY `fk_Answer_Student1_idx` (`studentId`),
  KEY `fk_Answer_Faci1_idx` (`faciId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`pk`, `answer`, `reply`, `dateAnswered`, `dateReplied`, `dateOpened`, `questionFk`, `studentId`, `faciId`) VALUES
(2, '1. His parents died when he was young, so he had to take care of his younger siblings.\r\n2. Fr. Roland died and La Salle was now responsible for the Sisters of Child Jesus.\r\n3. La Salle’s faith never faltered.', '\r\n', '2014-04-06', NULL, NULL, 11, 11135433, 11021270),
(3, 'He gave up his family’s wealth to found a school that teaches the poor. He took a leap of faith and he succeeded!\r\n', NULL, '2014-04-06', NULL, NULL, 12, 11135433, 11021270),
(4, 'Jesus’ calling was to redeem us, and thus, he gave his life for us.  It is because God loves us so much that He sacrificed his only son to save us from sin.', NULL, '2014-04-06', NULL, NULL, 13, 11135433, 11021270);

-- --------------------------------------------------------

--
-- Table structure for table `biblestudyattendancerecord`
--

CREATE TABLE IF NOT EXISTS `biblestudyattendancerecord` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `faciId` int(11) NOT NULL,
  `biblestudyFk` int(11) NOT NULL,
  PRIMARY KEY (`pk`),
  KEY `fk_BibleStudyAttendanceRecord_Faci1_idx` (`faciId`),
  KEY `fk_bibleStudyGroupID_idx` (`biblestudyFk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `biblestudyattendancerecord`
--


-- --------------------------------------------------------

--
-- Table structure for table `biblestudygroup`
--

CREATE TABLE IF NOT EXISTS `biblestudygroup` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `year` smallint(6) NOT NULL,
  `term` tinyint(4) NOT NULL,
  `book` varchar(45) NOT NULL,
  `studyLeaderId` int(11) NOT NULL,
  PRIMARY KEY (`pk`),
  KEY `fk_BibleStudyGroup_Faci1_idx` (`studyLeaderId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `biblestudygroup`
--

INSERT INTO `biblestudygroup` (`pk`, `year`, `term`, `book`, `studyLeaderId`) VALUES
(4, 2014, 3, 'Gospel of John', 11125020),
(5, 2014, 3, 'Revelation', 11111111),
(6, 2014, 3, 'Romans', 11132892);

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE IF NOT EXISTS `chapter` (
  `pk` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `story` text NOT NULL,
  PRIMARY KEY (`pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`pk`, `title`, `story`) VALUES
(1, 'The Preparatory Years', 'John Baptist de La Salle (J ean-Baptiste de La Salle) was born in Reims, France on April 30, 1651, during the reign of Louis XIV, when France was the most powerful country in Europe. His father, Louis de La Salle, was a judge of the presidial court of Reims and belonged to a family of wealthy textile merchants. His mother, Nicole Mu''jet, belonged to the aristocracy. He was the eldest of eleven children.\r\nAs a child, John loved listening to faith stories about Jesus and the saints, which his maternal grandmother regaled him with. Inspired perhaps by these stories, he felt called to become a parish priest, and so took up theology at the prestigious University of Paris while attending the renowned Seminary of Saint Sulpice. While in the said seminary, he taught catechism to poor children from the most crime-ridden districts of Paris and learned to have zeal for the salvation of souls.\r\nWhen John was 20, the death of his mother and then of his father about nine months later led him to abort his studies in Paris and return to Reims to take care of his six surviving siblings. Following the counsel of his spiritual\r\nadviser, Father Nicolas Roland, De La Salle eventually resumed his theological studies at the University of Reims, from which he received his doctorate in theology at age 29.\r\nDe La Salle was almost 27 when he was ordained priest. Nine years before that, he was given the very prestigious office of a canon of the cathedral of Reims. (Three popes, 23 cardinals, more than 30 bishops, and one saint were former canons of the\r\ncathedral or Reims.) As a young priest and canon, he invited his fellow priests to his family mansion to discuss common problems, pray together, and share a community experience.\r\nA few weeks after De La Salleâ€™s ordination, Fr. Roland died and left\r\nto De La Salle the task of securing legal recognition of the Sisters of the Child Jesus, which Fr. Roland had established for the education of poor girls in Reims.\r\nâ€œFor I know the plans I have for you, says the LORD. â€œThey are plans for good and not for disaster, to give you a future and a hope.â€ - Jeremiah 29:11'),
(2, 'Beginnings in Reims', 'When De La Salle was 28, he had a â€œchanceâ€ encounter at the convent of the Sisters of the Child Jesus With a man named Adrian Nyel. Nyel had come to Reims to establish a charity school for poor boys patterned on those begun in Rouen by Father Nicolas BarrÃ©, who would also become De La Salleâ€™s spiritual adviser. With De La Salle''s help, the archdiocese of Reims agreed to support the new school. When Nyel retired to Rouen six years later, this\r\nschool and all the others that were later established in Reims and nearby towns would be left entirely in De La Salleâ€™s hands.\r\nNyel had the gift of starting schools, but not of training and supervising the poor, unskilled, and therefore jobless men Whom he and De La Salle had recruited to become teachers. Because there were no teacher-training schools at that time, De La Salle decided to bring the poor and uncultured recruits to his familyâ€™s mansion, following Fr. BarrÃ©''s advice, to the horror of his wealthy relatives. There he not only taught the recruits how to teach, but also taught them how to strengthen their faith in God (mainly through constant prayer and. daily Bible reading and reflection) and, by extension, their zeal for their mission of bringing the Gospel of Jesus Christ to poor boys through education. It was important that their zeal be rooted in faith; otherwise, their zeal would run dry sooner or later.\r\nWhen the family mansion was sold at an auction due to a family lawsuit, De La Salle further shocked his relatives by renting a simple house for himself and his small community of teachers in the poorer part of the town. The house was on Rue Neuve (â€œrueâ€ is French for â€œstreetâ€), Which would become the "cradle" of the Institute of the Brothers of the Christian Schools, as they would come to be called. He also gave up his canonry at the cathedral, and the large annual income that came With it, in order to have more time with his Brothers. During a severe famine, De La Salle finally gave his inherited wealth to\r\nthe poor who flocked to Rue Neuve for\r\nfood; thus he became one with his Brothers in their poverty.'),
(3, 'Beginnings in Paris', 'standard. - Romans 3\r\nFor everyone has sinned; we all fall short of Godâ€™s glorious\r\n23\r\nmess: delight of the poor.\r\nschools were set up in Paris and nearby towns, to the\r\nparish church for mass. Soon after, other Lasallian needed to strengthen their faith and\r\nthe Brothers to Vaugirard for an intense spiritual retreat, because he by extension\r\nand where he established a formal novitiate. He then summoned all\r\nUpon recovery, he returned to Reims,\r\nmade to his former teacher,\r\nthere, in fulfillment of a promise he had girard, near Paris, to which he transferred the Brothers\r\ncramped school building in Saint Sulpice. He found a house in Vau\r\nsive house for the Brothers in Paris, all of Whom who lived in the\r\nothers leave and they are reduced to begging for food. After the heroic vow, De La Salle looked for a large but inexpen\r\nand Nicolas Vuyart, to take With him a "heroic vow" to remain in community until they establish the Institute even if all\r\na While, he asked two of his closest Brothers, Gabriel Drolin\r\nWhen De La Salle was 37\r\ntual condition, which De La Salle faithfully read and replied to.\r\nstructed them to send him monthly letters about their work and spiri\r\npice, to take over the charity\r\nback to Paris, to the parish of Saint SulLa Salle sent the Brothers back to their schools and communities\r\nbrought their students, lined up two by two\r\nthe subjects were taught in French (rather than in Latin), and regular classroom prayers were instituted. During the long vacant period between the morning and afternoon sessions, the Brothers\r\nwas required, emphasis was placed on useful subjects (e.g., reading, writing, mathematics),\r\nTwo years after he arrived in Paris, De La Salle almost\r\ndied due to exhaustion and the austerity of his lifestyle. Where eight of the\r\nsixteen Brothers he had left had lost their zeal and left the society. He placed the Brothers in Paris under the leadership of Brother Henri lâ€™HeureuX, Whom he had groomed to replace him as Superiorâ€˜ Brother Henri died, however, While De La Salle was in Reims, to De La Salleâ€™s great sorrow. After\r\npleased, and playing cards was the favorite pastime! All this changed When De La Salle and the Brothers took over: regular attendance\r\nBrothers. The school in Saint Sulpice was a students came and went as they\r\nthe parishâ€™s pastor. With him were two\r\nhe went\r\nschool\r\nwho was now\r\nt0 the\r\nresidence\r\ntheir zeal. When De he in\r\n'),
(4, 'Crises in Paris', 'Although De La Salle and his Brothers, through their faith in God. and zeal for the salvation of their students from spiritual death and material poverty, brought hope to the poor of Paris, not all were impressed. In fact, nowhere were De La Salle and his Brothers persecuted more than in Paris. From the religious sector, De La Salleâ€™s persecutors were parish priests and archbishops. His main nemesis was the new parish priest of Saint Sulpice, Father De La Chetardie, who appreciated the Brothersâ€™ work but did not like De La Salle personally. Once, when De La Salle was away, a novice fled to De La Chetardie after being beaten severely by Brother Ponce, Whom De La Salle placed in charge of the community of Brothers in Paris. Using this incident, De La Chetardie managed to convince ithe Archbishop of Paris, Cardinal Noailles, to remove De in La Salle as Superior of the Brothers and appoint another ". priest as their Superior. When the Brothers did not accept narrlinq] anrinnq'' anninfnn hp fn nvnp] â€œP y Cardinal Noailles'' appointee, he threatened to expel De â€˜3! La Salle from France (I). He changed his mind, however, i: when he heard that the Brothers were getting ready to\r\nleave France together with De La Salle (Without De La\r\nSalleâ€™s knowledge).\r\nPersecution also came from the educational establishment. The so-called Masters of the Little Schools, who taught children of the merchant class, and, of course, charged tuition, were angry to learn that their students were slowly transferring to the highly reputable (and free!) Lasallian schools. (By that time, there were 1200 students in four Lasallian schools in Paris run efficiently by 18 Brothers.) There was also the Guild of the so-called Writing Masters, which wanted to retain monopoly over the teaching of writing. Together, these two groups succeeded in getting the courts to forbid the Brothers from living in community and from teaching in certain districts. All the while, De La Chetardie did not lift a finger to defend the Brothers when he could and should have, because the charity schools were under the jurisdiction of the church and not of\r\nthe courts. When the Brothers, Who could no longer teach, began to leave Paris, the poor parents panicked and pressed De Le Chetardie to do something. It was only then that De La Chetardie decided to defend the Brothers and ask De La Salle to call\r\nthe Brothers back to reopen the '' schools. S''eek the Kingdom of God above all A else, and live righteously, and he will give you everything you need.\r\nSeek the Kingdom of God above all\r\nelse, and live righteously, and he A A ''\r\nwill give you everything you need.\r\nelse, and live righteously, and he will give you everything you need. - Matthew 6:33\r\n'),
(5, 'Beginnings in Rouen', 'story 5'),
(6, 'Dark Night of the Soul', 'story 6'),
(7, 'The Last Years', 'story 7'),
(8, 'Enduring Years', 'story 8');

-- --------------------------------------------------------

--
-- Table structure for table `chapterpermission`
--

CREATE TABLE IF NOT EXISTS `chapterpermission` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `dueDate` date NOT NULL,
  `releaseDate` date NOT NULL,
  `chapterFk` int(11) NOT NULL,
  `classFk` int(11) NOT NULL,
  PRIMARY KEY (`pk`,`chapterFk`,`classFk`),
  KEY `chapter_fk_idx` (`chapterFk`),
  KEY `class_fk` (`classFk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `chapterpermission`
--

INSERT INTO `chapterpermission` (`pk`, `dueDate`, `releaseDate`, `chapterFk`, `classFk`) VALUES
(1, '2014-02-10', '2014-02-17', 1, 2),
(2, '2014-02-13', '2014-02-20', 1, 3),
(3, '2014-02-17', '2014-02-24', 2, 2),
(4, '2014-02-20', '2014-02-27', 2, 3),
(5, '2014-02-24', '2014-03-03', 3, 2),
(6, '2014-02-27', '2014-03-06', 3, 3),
(7, '2014-03-03', '2014-03-10', 4, 2),
(8, '2014-03-06', '2014-03-13', 4, 3),
(9, '2014-03-10', '2014-03-17', 5, 2),
(10, '2014-03-13', '2014-03-20', 5, 3),
(11, '2014-03-17', '2014-03-24', 6, 2),
(12, '2014-03-20', '2014-03-27', 6, 3),
(13, '2014-03-24', '2014-03-31', 7, 2),
(14, '2014-03-27', '2014-04-03', 7, 3),
(15, '2014-03-31', '2014-04-07', 8, 2),
(16, '2014-04-03', '2014-04-10', 8, 3),
(17, '2014-02-19', '2014-02-12', 1, 1),
(18, '2014-02-26', '2014-02-19', 2, 1),
(19, '2014-03-05', '2014-02-26', 3, 1),
(20, '2014-03-22', '2014-03-05', 4, 1),
(21, '2014-03-29', '2014-03-22', 5, 1),
(22, '2014-04-05', '2014-03-29', 6, 1),
(23, '2014-04-12', '2014-04-05', 7, 1),
(24, '2014-04-19', '2014-04-12', 8, 1),
(25, '2014-02-11', '2014-02-18', 1, 4),
(26, '2014-02-18', '2014-02-25', 2, 4),
(27, '2014-02-25', '2014-03-04', 3, 4),
(28, '2014-03-04', '2014-03-11', 4, 4),
(29, '2014-03-11', '2014-03-18', 5, 4),
(30, '2014-03-18', '2014-03-25', 6, 4),
(31, '2014-03-25', '2014-04-01', 7, 4),
(32, '2014-04-01', '2014-04-08', 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('3e917f4275cd5d4b875b2164fca394b5', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/27.0.1453.110 Safari/537.36', 1396352336, '');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(5) NOT NULL,
  `year` smallint(6) NOT NULL,
  `term` tinyint(4) NOT NULL,
  `venue` varchar(10) NOT NULL,
  `day` varchar(2) NOT NULL,
  `timeStart` varchar(45) NOT NULL,
  `timeEnd` varchar(45) NOT NULL,
  `classFaciId` int(11) NOT NULL,
  PRIMARY KEY (`pk`),
  KEY `fk_Class_Faci1_idx` (`classFaciId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`pk`, `section`, `year`, `term`, `venue`, `day`, `timeStart`, `timeEnd`, `classFaciId`) VALUES
(1, 'S17', 2014, 2, 'G207', 'M', '13:00', '14:30', 1),
(2, 'S17', 2014, 3, 'G203', 'M', '14:40', '16:10', 5),
(3, 'S18', 2014, 3, 'G210', 'H', '11:20', '12:50', 2),
(4, 'S20', 2014, 3, 'G201', 'T', '9:40', '11:10', 11111111);

-- --------------------------------------------------------

--
-- Table structure for table `currentterm`
--

CREATE TABLE IF NOT EXISTS `currentterm` (
  `year` smallint(6) NOT NULL,
  `term` tinyint(4) NOT NULL,
  PRIMARY KEY (`year`,`term`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currentterm`
--

INSERT INTO `currentterm` (`year`, `term`) VALUES
(2014, 3);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(64) NOT NULL,
  `description` text,
  `eventDate` datetime DEFAULT NULL,
  `datePosted` date DEFAULT NULL,
  `postedByFaciId` int(11) NOT NULL,
  PRIMARY KEY (`pk`),
  KEY `fk_Event_Faci1_idx` (`postedByFaciId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`pk`, `event`, `description`, `eventDate`, `datePosted`, `postedByFaciId`) VALUES
(3, 'FORMDEV Faci Outreach', 'We''re having an outreach for the students of MaSci!', '2014-02-26 00:00:00', '2014-03-26', 11111111),
(4, 'Class outreach', 'Last term, we went to GK Enchanted Farm. Where do you think we''ll be off to next?', '2014-02-24 00:00:00', '2014-03-26', 11111111),
(5, 'Jomas', 'Our friend Jomas is studying in Technical University of the Philippines (TUP). If you can help him out, please do!', '2014-04-05 00:00:00', '2014-03-26', 11111111);

-- --------------------------------------------------------

--
-- Table structure for table `faci`
--

CREATE TABLE IF NOT EXISTS `faci` (
  `id` int(11) NOT NULL,
  `bibleStudyGroupFk` int(11) DEFAULT NULL,
  `classFk` int(11) DEFAULT NULL,
  `batch` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_Faci_BibleStudyGroup1_idx` (`bibleStudyGroupFk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faci`
--

INSERT INTO `faci` (`id`, `bibleStudyGroupFk`, `classFk`, `batch`) VALUES
(1, NULL, NULL, '13a'),
(2, NULL, NULL, '13a'),
(3, NULL, NULL, '13a'),
(4, NULL, NULL, '13b'),
(5, NULL, NULL, '13b'),
(6, NULL, NULL, '14a'),
(7, NULL, NULL, '14a'),
(8, NULL, NULL, '14a'),
(10754758, 4, NULL, '11a'),
(11021270, 4, NULL, '11a'),
(11101873, 6, NULL, '14a'),
(11101874, NULL, NULL, '14a'),
(11101875, NULL, NULL, '14a'),
(11111111, 5, NULL, '14b'),
(11121262, 5, NULL, '11a'),
(11121289, 6, NULL, '11a'),
(11125020, 4, NULL, '14b'),
(11132825, 5, NULL, '11a'),
(11132833, NULL, NULL, '11a'),
(11132841, NULL, NULL, '11a'),
(11132868, NULL, NULL, '11a'),
(11132876, NULL, NULL, '11a'),
(11132884, NULL, NULL, '11a'),
(11132892, 6, NULL, '11a'),
(11132906, NULL, NULL, '11a');

-- --------------------------------------------------------

--
-- Table structure for table `faciclassattendancerecord`
--

CREATE TABLE IF NOT EXISTS `faciclassattendancerecord` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `faciId` int(11) NOT NULL,
  `classFk` int(11) NOT NULL,
  PRIMARY KEY (`pk`),
  KEY `fk_FaciClassAttendanceRecord_Faci1_idx` (`faciId`),
  KEY `fk_FaciClass_idx` (`classFk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `faciclassattendancerecord`
--


-- --------------------------------------------------------

--
-- Table structure for table `facirolemap`
--

CREATE TABLE IF NOT EXISTS `facirolemap` (
  `faciId` int(11) NOT NULL,
  `faciTypeFk` int(11) NOT NULL,
  KEY `fk_FaciRoleMap_Faci1_idx` (`faciId`),
  KEY `fk_FaciRoleMap_FaciType1_idx` (`faciTypeFk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facirolemap`
--

INSERT INTO `facirolemap` (`faciId`, `faciTypeFk`) VALUES
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(1, 1),
(8, 8),
(11125020, 8),
(11111111, 1),
(10754758, 8),
(10754758, 8),
(11021270, 8),
(11101873, 8),
(11101874, 8),
(11101875, 8),
(11121262, 8),
(11121289, 8),
(11132825, 8),
(11132833, 8),
(11132841, 8),
(11132868, 8),
(11132876, 8),
(11132884, 8),
(11132892, 8),
(11132906, 8);

-- --------------------------------------------------------

--
-- Table structure for table `facitype`
--

CREATE TABLE IF NOT EXISTS `facitype` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `description` text,
  PRIMARY KEY (`pk`),
  UNIQUE KEY `title_UNIQUE` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `facitype`
--

INSERT INTO `facitype` (`pk`, `title`, `description`) VALUES
(1, 'Student Head', NULL),
(2, 'Class Facilitator', NULL),
(3, 'Bible Study Leader', NULL),
(4, 'Outreach Head', NULL),
(5, 'IMC Head', NULL),
(6, 'Communications Head', NULL),
(7, 'Monitoring Head', NULL),
(8, 'Facilitator', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grading`
--

CREATE TABLE IF NOT EXISTS `grading` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `gradingComponentFk` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `score` float NOT NULL,
  PRIMARY KEY (`pk`),
  KEY `fkToGradingComponent_idx` (`gradingComponentFk`),
  KEY `fk_Grading_Student1_idx` (`studentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `grading`
--


-- --------------------------------------------------------

--
-- Table structure for table `gradingcomponent`
--

CREATE TABLE IF NOT EXISTS `gradingcomponent` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `maxpoints` float NOT NULL,
  PRIMARY KEY (`pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gradingcomponent`
--


-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `groupFaciId` int(11) DEFAULT NULL,
  `classFk` int(11) NOT NULL,
  PRIMARY KEY (`pk`),
  KEY `fk_Group_Class1_idx` (`classFk`),
  KEY `fk_Group_Faci1_idx` (`groupFaciId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`pk`, `groupFaciId`, `classFk`) VALUES
(1, 10754758, 4),
(2, 11132906, 4),
(3, 11121262, 4),
(4, 11021270, 4),
(5, 11132825, 4),
(6, 11132833, 4),
(7, 11132841, 4),
(8, 11132868, 3),
(9, 11132876, 3),
(10, 11132884, 3),
(16, 11132892, 3),
(17, 11132906, 3);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person` int(11) NOT NULL,
  `action` text,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fkPersonLogs_idx` (`person`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `logs`
--


-- --------------------------------------------------------

--
-- Table structure for table `outreachactivities`
--

CREATE TABLE IF NOT EXISTS `outreachactivities` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `year` smallint(6) NOT NULL,
  `term` tinyint(4) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `ledByFaciId` int(11) NOT NULL,
  `isDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`pk`),
  KEY `fk_OutreachActivities_Faci1_idx` (`ledByFaciId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `outreachactivities`
--

INSERT INTO `outreachactivities` (`pk`, `year`, `term`, `title`, `description`, `ledByFaciId`, `isDeleted`) VALUES
(2, 2014, 3, 'FORMDEV at GK Pinagsama', 'FORMDEV facilitators and handles help build houses in Barangay Pinagsama, Taguig.', 11111111, 0),
(3, 2013, 2, 'FORMDEV at GK Enchanted Farm', 'It''s like Enchanted Kingdom, but a farm.', 11021270, 0),
(4, 2014, 1, 'FORMDEV MaSci', 'FORMDEV facilitators and handles teach COMPRO1 to high school students of Manila Science', 11101875, 0);

-- --------------------------------------------------------

--
-- Table structure for table `outreachattendancerecord`
--

CREATE TABLE IF NOT EXISTS `outreachattendancerecord` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `remarks` varchar(45) NOT NULL,
  `outreachFk` int(11) NOT NULL,
  `faciId` int(11) NOT NULL,
  PRIMARY KEY (`pk`),
  KEY `fk_Outreach_idx` (`outreachFk`),
  KEY `fk_OutreachAttendanceRecord_Faci1_idx` (`faciId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `outreachattendancerecord`
--


-- --------------------------------------------------------

--
-- Table structure for table `personalinfo`
--

CREATE TABLE IF NOT EXISTS `personalinfo` (
  `id` int(11) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `middleName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `course` varchar(45) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personalinfo`
--

INSERT INTO `personalinfo` (`id`, `password`, `firstName`, `middleName`, `lastName`, `course`, `birthDate`, `email`) VALUES
(1, '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'Student', NULL, 'Head', NULL, NULL, NULL),
(2, 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', 'Class', NULL, 'Facilitator', NULL, NULL, NULL),
(3, '4e07408562bedb8b60ce05c1decfe3ad16b72230967de01f640b7e4729b49fce', 'Bible Study', NULL, 'Leader', NULL, NULL, NULL),
(4, '4b227777d4dd1fc61c6f884f48641d02b4d121d3fd328cb08b5531fcacdabf8a', 'Outreach', NULL, 'Head', NULL, NULL, NULL),
(5, 'ef2d127de37b942baad06145e54b0c619a1f22327b2ebbcfbec78f5564afe39d', 'IMC', NULL, 'Head', NULL, NULL, NULL),
(6, 'e7f6c011776e8db7cd330b54174fd76f7d0216b612387a5ffcfb81e6f0919683', 'Communications', NULL, 'Head', NULL, NULL, NULL),
(7, '7902699be42c8a8e46fbbb4501726517e86b22c56a189f7625a6da49081b2451', 'Monitoring', NULL, 'Head', NULL, NULL, NULL),
(8, '2c624232cdd221771294dfbb310aca000a0df6ac8b66b696d90ef06fdefb64a3', 'Facilitator', NULL, 'Facilitator', NULL, NULL, NULL),
(9, '19581e27de7ced00ff1ce50b2047e7a567c76b1cbaebabe5ef03f7c3017bb5b7', 'Student', NULL, 'Student', NULL, NULL, NULL),
(10754758, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Chryzel', NULL, 'Lim', 'BS-CS ST', NULL, NULL),
(11021270, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Erika', NULL, 'Magpayo', 'BS-CS IST', NULL, NULL),
(11101873, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Ivan', NULL, 'Paner', 'BS CS-ST', NULL, NULL),
(11101874, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Jayvan', NULL, 'Paner', 'BS CS-ST', NULL, NULL),
(11101875, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Kayvan', NULL, 'Paner', 'BS CS-ST', NULL, NULL),
(11107928, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Nyx', NULL, 'Rodas', 'BS-CS NE', NULL, NULL),
(11111111, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Darren Karl', 'Abanilla', 'Sapalo', NULL, '1993-01-01', 'darren.sapalo@gmail.com'),
(11121262, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Patricia', NULL, 'Eugenio', 'BS-CS CSE', NULL, NULL),
(11121289, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Edmon', NULL, 'Kua', 'BS-CS ST', NULL, NULL),
(11125020, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Alron Jan', 'Fernandez', 'Lam', NULL, '1994-12-20', NULL),
(11132825, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Janet', NULL, 'Almonguera', 'BS-CS ST', NULL, NULL),
(11132833, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Michael Angelo', NULL, 'Arianza', 'BS-CS CSE', NULL, NULL),
(11132841, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Joshua', NULL, 'Avecilla', 'BS-CS NE', NULL, NULL),
(11132868, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Bernadyn', NULL, 'Cagampan', 'BS-CS IST', NULL, NULL),
(11132876, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Joy Luville', NULL, 'Mahinay', 'BS-INSYS', NULL, NULL),
(11132884, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Krystyn', NULL, 'Uy', 'BS-CS ST', NULL, NULL),
(11132892, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Celine', NULL, 'Villafuerte', 'BS-INSYS', NULL, NULL),
(11132906, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Czarnin', NULL, 'Villareal', 'BS-INSYS', NULL, NULL),
(11135239, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Alex', NULL, 'Almero', 'BS-CS ST', NULL, NULL),
(11135247, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Jillianne', NULL, 'Barrientos', 'BS-CS NE', NULL, NULL),
(11135255, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Marvin Neil', NULL, 'Bables', 'BS-CS ST', NULL, NULL),
(11135263, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Mitchel', NULL, 'Cabuloy', 'BS-CS NE', NULL, NULL),
(11135271, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Gary Daniel', NULL, 'Yap', 'BS-CS CSE', NULL, NULL),
(11135298, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Ryan', NULL, 'Sagabaen', 'BS-CS NE', NULL, NULL),
(11135301, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Dannison Heinrich', NULL, 'Yao', 'BS-CS NE', NULL, NULL),
(11135328, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Alain', NULL, 'Yao', 'BS-CS NE', NULL, NULL),
(11135336, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Tiffany', NULL, 'Mandap', 'BS-CS NE', NULL, NULL),
(11135344, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Kimberly', NULL, 'Dy', 'BS-CS NE', NULL, NULL),
(11135352, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'John Paul', NULL, 'Gonzales', 'BS-CS NE', NULL, NULL),
(11135360, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Wilbert', NULL, 'Luy', 'BS-CS CSE', NULL, NULL),
(11135379, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Carlos Javier', NULL, 'Reyes', 'BS-CS NE', NULL, NULL),
(11135387, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Beatrice', NULL, 'Luz', 'BS-CS ST', NULL, NULL),
(11135395, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Keiko', NULL, 'Nagano', 'BS-CS NE', NULL, NULL),
(11135409, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Rufino', NULL, 'Rebebes', 'BS-CS NE', NULL, NULL),
(11135417, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Jericho', NULL, 'Concepcion', 'BS-CS NE', NULL, NULL),
(11135425, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Bob', NULL, 'Chan', 'BS-CS NE', NULL, NULL),
(11135433, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Roberto', NULL, 'Cruz', 'BS-CS ST', NULL, NULL),
(11135441, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Lorenzo', NULL, 'Viernes', 'BS-CS NE', NULL, NULL),
(11135468, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Arianne', NULL, 'Ong', 'BS-CS ST', NULL, NULL),
(11135476, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Greg', NULL, 'Siy', 'BS-CS NE', NULL, NULL),
(11135484, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Sarah', NULL, 'Didulo', 'BS-CS NE', NULL, NULL),
(11135492, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Albert', NULL, 'Dizon', 'BS-CS ST', NULL, NULL),
(11135506, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Carl', NULL, 'Chan', 'BS-CS ST', NULL, NULL),
(11135514, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Jefferson', NULL, 'Cordero', 'BS-CS ST', NULL, NULL),
(11135522, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Jeremiah', NULL, 'Luy', 'BS-CS ST', NULL, NULL),
(11135530, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Sharmaine', NULL, 'Lim', 'BS-CS ST', NULL, NULL),
(11135549, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Marvin', NULL, 'Suangco', 'BS-CS ST', NULL, NULL),
(11135557, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Theresa', NULL, 'Mendoza', 'BS-CS ST', NULL, NULL),
(11135565, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Charlene', NULL, 'Ho', 'BS-CS ST', NULL, NULL),
(11135573, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Yu Sin', NULL, 'Kim', 'BS-CS ST', NULL, NULL),
(11135581, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Janno', NULL, 'Monicimpo', 'BS-CS ST', NULL, NULL),
(11135603, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Andrenel', NULL, 'Reyes', 'BS-CS NE', NULL, NULL),
(11135611, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Baron', NULL, 'Dimaranan', 'BS-CS CSE', NULL, NULL),
(11135638, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Jan Adrien', NULL, 'Mariposa', 'BS-CS IST', NULL, NULL),
(11135646, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Paolo', NULL, 'Portugalete', 'BS-CS NE', NULL, NULL),
(11135654, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Marc', NULL, 'Ngo', 'BS-CS ST', NULL, NULL),
(11143320, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Darren Karl', NULL, 'Sapalo', 'BS-CS ST', NULL, NULL),
(11143584, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Hazel', NULL, 'Garcia', 'BS-CS ST', NULL, NULL),
(11161574, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Wing San', NULL, 'Wong', 'BS-CS ST', NULL, NULL),
(11162600, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Lance', NULL, 'Monteverde', 'BS-CS ST', NULL, NULL),
(11162619, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Miguel', NULL, 'Collantes', 'BS-CS ST', NULL, NULL),
(11162627, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Joyce', NULL, 'Uy', 'BS-CS ST', NULL, NULL),
(11162635, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Louis', NULL, 'Dumlao', 'BS-CS ST', NULL, NULL),
(11162643, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Dannika', NULL, 'Rodriguez', 'BS-CS ST', NULL, NULL),
(11162651, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Rhett', NULL, 'Buzon', 'BS-CS ST', NULL, NULL),
(11162678, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Micaela', NULL, 'Mangubat', 'BS-CS ST', NULL, NULL),
(11162686, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Walter', NULL, 'Leanzon', 'BS-CS ST', NULL, NULL),
(11162694, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Jamila', NULL, 'Sy', 'BS-CS ST', NULL, NULL),
(11162708, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Maureen', NULL, 'Hipe', 'BS-CS ST', NULL, NULL),
(11162716, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Rosabel', NULL, 'Ang', 'BS-CS ST', NULL, NULL),
(11162724, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Edwil', NULL, 'Tan', 'BS-CS ST', NULL, NULL),
(11162732, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'David', NULL, 'Ricafort', 'BS-CS ST', NULL, NULL),
(11162740, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Jerome', NULL, 'Iba?ez', 'BS-CS ST', NULL, NULL),
(11162759, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Jarvin', NULL, 'Li', 'BS-CS ST', NULL, NULL),
(11162767, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Timothy', NULL, 'Purganan', 'BS-CS ST', NULL, NULL),
(11162775, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Kevin', NULL, 'Rivera', 'BS-CS ST', NULL, NULL),
(11162783, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Aldrich', NULL, 'Gutierrez', 'BS-CS ST', NULL, NULL),
(11162791, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Joshua', NULL, 'Cruz', 'BS-CS ST', NULL, NULL),
(11162805, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Andrew', NULL, 'Laron', 'BS-CS ST', NULL, NULL),
(11162813, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Michael', NULL, 'Lazaro', 'BS-CS ST', NULL, NULL),
(11162821, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Paulette', NULL, 'Constantino', 'BS-CS ST', NULL, NULL),
(11162848, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Joshua', NULL, 'Guevara', 'BS-CS ST', NULL, NULL),
(11162856, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Timothy', NULL, 'Rodriguez', 'BS-CS ST', NULL, NULL),
(11162864, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Desiree', NULL, 'Chung', 'BS-CS IST', NULL, NULL),
(11162872, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Justine', NULL, 'Ramos', 'BS-CS NE', NULL, NULL),
(11162880, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Samantha', NULL, 'Segovia', 'BS-CS NE', NULL, NULL),
(11162899, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Mark', NULL, 'Cabie', 'BS-CS ST', NULL, NULL),
(11162902, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Gero', NULL, 'Tan Seng', 'BS-CS CSE', NULL, NULL),
(11162910, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Aldric', NULL, 'Gonzales', 'BS-CS IST', NULL, NULL),
(11162929, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Carol', NULL, 'Alvarez', 'BS-CS ST', NULL, NULL),
(11174609, '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Kevin', NULL, 'Meniano', 'BS-CS ST', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `question` text,
  `chapterFk` int(11) NOT NULL,
  PRIMARY KEY (`pk`),
  KEY `fk_Question_Chapter1_idx` (`chapterFk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`pk`, `question`, `chapterFk`) VALUES
(11, 'Chapter 1 Question 1\r\nEnumerate what you think were the things that enabled De La Salle to discover his true calling. Discuss these with your faci.', 1),
(12, 'Chapter 1 Question 2\r\nWhat did La Salle give up to fulfill his calling?', 1),
(13, 'Chapter 1 Question 3\r\nWhat was Jesus calling? What did he have to give up to fulfill this? Why? Read Romans 5:8 and John 3:16-18, then write below your answers to the three questions.', 1),
(21, 'Chapter 2 Question 1', 2),
(22, 'Chapter 2 Question 2', 2),
(23, 'Chapter 2 Question 3', 2),
(24, 'Chapter 2 Question 4', 2),
(31, 'Chapter 3 Question 1', 3),
(32, 'Chapter 3 Question 2', 3),
(41, 'Chapter 4 Question 1', 4),
(42, 'Chapter 4 Question 2', 4),
(43, 'Chapter 4 Question 3', 4),
(44, 'Chapter 4 Question 4', 4),
(45, 'Chapter 4 Question 5', 4),
(46, 'Chapter 4 Question 6', 4);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL,
  `groupFk` int(11) DEFAULT NULL,
  `classFk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_Student_Group1_idx` (`groupFk`),
  KEY `classFk` (`classFk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `groupFk`, `classFk`) VALUES
(1, NULL, NULL),
(2, NULL, NULL),
(3, NULL, NULL),
(4, NULL, NULL),
(5, NULL, NULL),
(6, NULL, NULL),
(7, NULL, NULL),
(8, NULL, NULL),
(9, NULL, NULL),
(11107928, 1, 4),
(11111111, NULL, NULL),
(11125020, NULL, NULL),
(11135239, 1, 4),
(11135247, 1, 4),
(11135255, 1, 4),
(11135263, 1, 4),
(11135271, 1, 4),
(11135298, 1, 4),
(11135301, 2, 4),
(11135328, 2, 4),
(11135336, 2, 4),
(11135344, 2, 4),
(11135352, 2, 4),
(11135360, 2, 4),
(11135379, 3, 4),
(11135387, 3, 4),
(11135395, 3, 4),
(11135409, 3, 4),
(11135417, 3, 4),
(11135425, 3, 4),
(11135433, 4, 4),
(11135441, 4, 4),
(11135468, 4, 4),
(11135476, 4, 4),
(11135484, 4, 4),
(11135492, 4, 4),
(11135506, 5, 4),
(11135514, 5, 4),
(11135522, 5, 4),
(11135530, 5, 4),
(11135549, 5, 4),
(11135557, 6, 4),
(11135565, 6, 4),
(11135573, 6, 4),
(11135581, 6, 4),
(11135603, 6, 4),
(11135611, 7, 4),
(11135638, 7, 4),
(11135646, 7, 4),
(11135654, 7, 4),
(11143320, 7, 4),
(11143584, 7, 4),
(11161574, 6, 4),
(11162600, 8, 3),
(11162619, 8, 3),
(11162627, 8, 3),
(11162635, 8, 3),
(11162643, 8, 3),
(11162651, 8, 3),
(11162678, 8, 3),
(11162686, 9, 3),
(11162694, 9, 3),
(11162708, 9, 3),
(11162716, 9, 3),
(11162724, 9, 3),
(11162732, 9, 3),
(11162740, 10, 3),
(11162759, 10, 3),
(11162767, 10, 3),
(11162775, 10, 3),
(11162783, 10, 3),
(11162791, 10, 3),
(11162805, 16, 3),
(11162813, 16, 3),
(11162821, 16, 3),
(11162848, 16, 3),
(11162856, 16, 3),
(11162864, 16, 3),
(11162872, 17, 3),
(11162880, 17, 3),
(11162899, 17, 3),
(11162902, 17, 3),
(11162910, 17, 3),
(11162929, 17, 3),
(11174609, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `studentclassattendancerecord`
--

CREATE TABLE IF NOT EXISTS `studentclassattendancerecord` (
  `pk` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `studentId` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  PRIMARY KEY (`pk`),
  KEY `fk_StudentClassAttendanceRecord_Student1_idx` (`studentId`),
  KEY `fk_AttendanceStudentClass_idx` (`classId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentclassattendancerecord`
--


-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `dateGiven` date DEFAULT NULL,
  `dateExpected` date DEFAULT NULL,
  `dateCompleted` date DEFAULT NULL,
  `faciAssignedID` int(11) NOT NULL,
  `faciCreatorID` int(11) NOT NULL,
  `isDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`pk`),
  KEY `fk_Task_Faci1_idx` (`faciAssignedID`),
  KEY `fk_Task_Faci2_idx` (`faciCreatorID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`pk`, `description`, `dateGiven`, `dateExpected`, `dateCompleted`, `faciAssignedID`, `faciCreatorID`, `isDeleted`) VALUES
(1, 'LEAP Preparations', '2014-02-22', '2014-02-28', '2014-03-26', 11111111, 11125020, 0),
(2, 'Buy Materials for FORMDEV Classes', '2014-02-22', '2014-02-28', NULL, 11125020, 11111111, 0),
(3, 'Update Bulletin Board', '2014-02-22', '2014-02-28', NULL, 11111111, 11125020, 0);

-- --------------------------------------------------------

--
-- Table structure for table `verse`
--

CREATE TABLE IF NOT EXISTS `verse` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `book` varchar(15) NOT NULL,
  `chapter` int(11) NOT NULL,
  `verse` varchar(10) NOT NULL,
  PRIMARY KEY (`pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `verse`
--


-- --------------------------------------------------------

--
-- Table structure for table `verseoftheweek`
--

CREATE TABLE IF NOT EXISTS `verseoftheweek` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `verseFk` int(11) NOT NULL,
  `week` date NOT NULL,
  PRIMARY KEY (`pk`),
  KEY `fkVerse_idx` (`verseFk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `verseoftheweek`
--


-- --------------------------------------------------------

--
-- Table structure for table `versetags`
--

CREATE TABLE IF NOT EXISTS `versetags` (
  `pk` int(11) NOT NULL AUTO_INCREMENT,
  `verse` int(11) NOT NULL,
  `tags` varchar(45) NOT NULL,
  PRIMARY KEY (`pk`),
  KEY `fkVerse_idx` (`verse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `versetags`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `fk_Announcement_Faci1` FOREIGN KEY (`postedByFaciId`) REFERENCES `faci` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `fk_Answer_Faci1` FOREIGN KEY (`faciId`) REFERENCES `faci` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Answer_Question1` FOREIGN KEY (`questionFk`) REFERENCES `question` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Answer_Student1` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `biblestudyattendancerecord`
--
ALTER TABLE `biblestudyattendancerecord`
  ADD CONSTRAINT `fk_BibleStudyAttendanceRecord_Faci1` FOREIGN KEY (`faciId`) REFERENCES `faci` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bibleStudyGroupID` FOREIGN KEY (`biblestudyFk`) REFERENCES `biblestudygroup` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `biblestudygroup`
--
ALTER TABLE `biblestudygroup`
  ADD CONSTRAINT `fk_BibleStudyGroup_Faci1` FOREIGN KEY (`studyLeaderId`) REFERENCES `faci` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chapterpermission`
--
ALTER TABLE `chapterpermission`
  ADD CONSTRAINT `chapter_fk` FOREIGN KEY (`chapterFk`) REFERENCES `chapter` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `class_fk` FOREIGN KEY (`classFk`) REFERENCES `class` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `fk_Class_Faci1` FOREIGN KEY (`classFaciId`) REFERENCES `faci` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_Event_Faci1` FOREIGN KEY (`postedByFaciId`) REFERENCES `faci` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `faci`
--
ALTER TABLE `faci`
  ADD CONSTRAINT `fk_Faci_BibleStudyGroup1` FOREIGN KEY (`bibleStudyGroupFk`) REFERENCES `biblestudygroup` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Faci_PersonalInfo1` FOREIGN KEY (`id`) REFERENCES `personalinfo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `faciclassattendancerecord`
--
ALTER TABLE `faciclassattendancerecord`
  ADD CONSTRAINT `fk_FaciClass` FOREIGN KEY (`classFk`) REFERENCES `class` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FaciClassAttendanceRecord_Faci1` FOREIGN KEY (`faciId`) REFERENCES `faci` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `facirolemap`
--
ALTER TABLE `facirolemap`
  ADD CONSTRAINT `fk_FaciRoleMap_Faci1` FOREIGN KEY (`faciId`) REFERENCES `faci` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FaciRoleMap_FaciType1` FOREIGN KEY (`faciTypeFk`) REFERENCES `facitype` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `grading`
--
ALTER TABLE `grading`
  ADD CONSTRAINT `fkToGradingComponent` FOREIGN KEY (`gradingComponentFk`) REFERENCES `gradingcomponent` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Grading_Student1` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `fk_Group_Class1` FOREIGN KEY (`classFk`) REFERENCES `class` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Group_Faci1` FOREIGN KEY (`groupFaciId`) REFERENCES `faci` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fkPersonLogs` FOREIGN KEY (`person`) REFERENCES `personalinfo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `outreachactivities`
--
ALTER TABLE `outreachactivities`
  ADD CONSTRAINT `fk_OutreachActivities_Faci1` FOREIGN KEY (`ledByFaciId`) REFERENCES `faci` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `outreachattendancerecord`
--
ALTER TABLE `outreachattendancerecord`
  ADD CONSTRAINT `fk_Outreach` FOREIGN KEY (`outreachFk`) REFERENCES `outreachactivities` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OutreachAttendanceRecord_Faci1` FOREIGN KEY (`faciId`) REFERENCES `faci` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_Question_Chapter1` FOREIGN KEY (`chapterFk`) REFERENCES `chapter` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_Student_Group1` FOREIGN KEY (`groupFk`) REFERENCES `group` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Student_PersonalInfo1` FOREIGN KEY (`id`) REFERENCES `personalinfo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`classFk`) REFERENCES `class` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `studentclassattendancerecord`
--
ALTER TABLE `studentclassattendancerecord`
  ADD CONSTRAINT `fk_AttendanceStudentClass` FOREIGN KEY (`classId`) REFERENCES `class` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_StudentClassAttendanceRecord_Student1` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_Task_Faci1` FOREIGN KEY (`faciAssignedID`) REFERENCES `faci` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Task_Faci2` FOREIGN KEY (`faciCreatorID`) REFERENCES `faci` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `verseoftheweek`
--
ALTER TABLE `verseoftheweek`
  ADD CONSTRAINT `fkVerseWeekToVerse` FOREIGN KEY (`verseFk`) REFERENCES `verse` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `versetags`
--
ALTER TABLE `versetags`
  ADD CONSTRAINT `fkVerseTagToVerse` FOREIGN KEY (`verse`) REFERENCES `verse` (`pk`) ON DELETE NO ACTION ON UPDATE NO ACTION;
