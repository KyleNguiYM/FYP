-- --------------------------------------------------------

--
-- Table structure for table `attend`
--
CREATE TABLE `attend` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`subject_code` VARCHAR(30) NULL DEFAULT NULL,
	`student_id` VARCHAR(10) NULL DEFAULT NULL,
	`timeslot` VARCHAR(50) NULL DEFAULT NULL,
	`attendstatus` CHAR(20) NULL DEFAULT NULL,
	`dateofclass` DATE NULL DEFAULT NULL,
	`leave` VARCHAR(10) NULL DEFAULT NULL,
	`leave_details` VARCHAR(10) NULL DEFAULT NULL,
	`signing_time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)
COMMENT='Attendance for 2022A'
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `attend_2022B`
--
CREATE TABLE `attend_2022B` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`subject_code` VARCHAR(30) NULL DEFAULT NULL,
	`student_id` VARCHAR(10) NULL DEFAULT NULL,
	`timeslot` VARCHAR(50) NULL DEFAULT NULL,
	`attendstatus` CHAR(20) NULL DEFAULT NULL,
	`dateofclass` DATE NULL DEFAULT NULL,
	`leave` VARCHAR(10) NULL DEFAULT NULL,
	`leave_details` VARCHAR(10) NULL DEFAULT NULL,
	`signing_time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)
COMMENT='Attendance for 2022B'
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------
--
-- Table structure for table `class`
--


CREATE TABLE `class` (
  `subject_code` varchar(50) NOT NULL DEFAULT '',
  `subject` varchar(50) NOT NULL,
  `lecturer` varchar(50) NOT NULL,
  `weekday` VARCHAR(50) NOT NULL DEFAULT '',
  `start_time` varchar(12) NOT NULL DEFAULT '',
  `end_time` varchar(12) NOT NULL DEFAULT '',
  `venue` varchar(50) NOT NULL,
	PRIMARY KEY (`subject_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`subject`, `subject_code`, `lecturer`, `weekday`, `start_time`,`end_time`, `venue`) VALUES
('Account System', 'ACCA2033', 'Nor Amalina bin Saleh', 'Monday', '1:00 p.m.','3:00 p.m.','L001'),
('Software Engineering', 'BTSE2003', 'Nor Fatihah bt Mazlam', 'Thursday', '10:00 a.m.','12:00 p.m.','H017');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` varchar(30) NOT NULL PRIMARY KEY,
  `course` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `description`) VALUES
(1, 'Sample Course', 'Sample Course'),
(2, 'Course 2', ' Course 2'),
(3, 'Course 3', ' Course 3'),
(4, 'Course 4', ' Course 4');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_list`
--

CREATE TABLE `enroll_list` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`subject_code` VARCHAR(50) NULL DEFAULT NULL,
	`id_no` VARCHAR(50) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(30) NOT NULL,
  `id_no` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `email` varchar(200) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`,`id_no`, `name`, `email`) VALUES
('1','FAD','Faculty of Art and design', 'fad@sc.edu.my'),
('2','FBM','Faculty of Business And Management', 'fbm@sc.edu.my'),
('3','FCM','Faculty of Chinese Medicine', 'fcm@sc.edu.my'),
('4','FEIT','Faculty of Engineering and Information Technology', 'feit@sc.edu.my'),
('5','FEP','Faculty of Education and Psychology', 'fep@sc.edu.my'),
('6','FHSS','Faculty of Human and Social Science', 'fhss@sc.edu.my'),
('7','SITE','Southern Institute of Technical Education', 'site@sc.edu.my'),
('8','SFS','School of Foundation Studies', 'sfs@sc.edu.my'),
('9','SPACE','School of Professional and Continuing Education', 'space@sc.edu.my'),
('10','SMYCE','Sim Mow Yu Chinese Education and Teacher Training Centre', 'symce@sc.edu.my');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_data`
--

CREATE TABLE `feedback_data` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`quality_score` TINYINT(4) NULL DEFAULT NULL,
	`suggestion` TEXT NULL,
	`feedback` TEXT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id_no` varchar(50) NOT NULL,
  `batch_id` varchar(30) NOT NULL,
  `name` text NOT NULL
  PRIMARY KEY (`id_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id_no`, `batch_id`, `name`) VALUES
('06232014', 'sample1', 'Claire Blake'),
('123456', 'sample2', 'George Wilson');
