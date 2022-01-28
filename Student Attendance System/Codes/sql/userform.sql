--
-- Database: `sas_db`
--
CREATE database sas_db;
-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `code` mediumint(50),
  `status` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `sas_db`.`usertable` (`name`, `email`, `password`, `usertype`,`code`, `status`) VALUES ('Admin', 'admin@sc.edu.my', 'admin','admin', NULL, NULL);
INSERT INTO `sas_db`.`usertable` (`name`, `email`, `password`, `usertype`,`code`, `status`) VALUES ('Lecturer1', 'lecturer1@sc.edu.my', 'lecturer','lecturer', NULL, NULL);
INSERT INTO `sas_db`.`usertable` (`name`, `email`, `password`, `usertype`,`code`, `status`) VALUES ('Lecturer2', 'lecturer2@sc.edu.my', 'lecturer','lecturer', NULL, NULL);
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
