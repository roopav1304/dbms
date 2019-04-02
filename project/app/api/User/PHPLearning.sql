SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET AUTOCOMMIT = 0;

START TRANSACTION;

SET time_zone = "+00:00";



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8mb4 */;


--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `s_name` varchar(25) NOT NULL,
  `sem` varchar(10) NOT NULL, `department` varchar(25) NOT NULL, `address` varchar(500
) NOT NULL, `phone_no` varchar(10) ,`email` varchar(25))
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `login` (
  `id` int(10) NOT NULL references student(id) on delete cascade,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `department` (
  `d_id` int(10) NOT NULL ,
  `d_name` varchar(25) NOT NULL,
  `hod_id` varchar(10) NOT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `course` (
  `c_id` int(10) NOT NULL ,
  `c_name` varchar(25) NOT NULL,
  `c_type` varchar(25) NOT NULL, `c_deptid` int(10) NOT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `faculty` (
  `f_id` varchar(10) NOT NULL ,
  `f_name` varchar(30) NOT NULL,
  `qualification` varchar(30) NOT NULL, `age` int(10) NOT NULL
, `designation` varchar(30) NOT NULL) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `exam` (
  `exam_id` varchar(10) NOT NULL ,
  `exam_name` varchar(25) NOT NULL,
  `exam_date` varchar(25) NOT NULL, `timings` varchar(20) NOT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `academics` (
  `s_id` int(10) NOT NULL  references student(id) on delete cascade,
  `c_id` int(10) NOT NULL references course(c_id) on delete cascade,
  `grade` varchar(10) NOT NULL, `attendance` varchar(10) NOT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `enroll` (
  `s_id` int(10) NOT NULL references student(id) on delete cascade,
  `c_id` int(10) NOT NULL references course(c_id) on delete cascade,
  `c_name` varchar(25) NOT NULL references course(c_name) on delete cascade
) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data for table `login`--



INSERT INTO `student` (`id`, `s_name`, `sem` , `department` , `address` , `phone_no` , `email`) VALUES
(1, 'Anu', 'I' , 'IS' , 'Mysore' , '9087452367' , 'anu@gmail.com');
INSERT INTO `login` (`username`, `password`, `id`) VALUES
( 'anu123', 'YW51QDEyMw==', 1);
INSERT INTO `department` (`d_id`, `d_name`, `hod_id`) VALUES(101,'IS','I01');
INSERT INTO `department` (`d_id`, `d_name`, `hod_id`) VALUES(102,'CS','C02');
INSERT INTO `department` (`d_id`, `d_name`, `hod_id`) VALUES(103,'ME','M01');
INSERT INTO `department` (`d_id`, `d_name`, `hod_id`) VALUES(104,'EC','E02');
INSERT INTO `department` (`d_id`, `d_name`, `hod_id`) VALUES(105,'EE','E12');
INSERT INTO `course` (`c_id`, `c_name`, `c_type`, `c_deptid`) VALUES(12,'J2EE','Programming language',101);
INSERT INTO `course` (`c_id`, `c_name`, `c_type`, `c_deptid`) VALUES(23,'Python','Programming language',102);
INSERT INTO `course` (`c_id`, `c_name`, `c_type`, `c_deptid`) VALUES(34,'CAED','Computerized drawing',103);
INSERT INTO `course` (`c_id`, `c_name`, `c_type`, `c_deptid`) VALUES(45,'Aurdino','Hardware',104);
INSERT INTO `course` (`c_id`, `c_name`, `c_type`, `c_deptid`) VALUES(56,'IoT','Hardware',105);
INSERT INTO `faculty` (`f_id`, `f_name`, `qualification`, `age`, `designation`) VALUES('C02','Radha','BE,MTECH,PHD',42,'HOD');
INSERT INTO `faculty` (`f_id`, `f_name`, `qualification`, `age`, `designation`) VALUES('E04','Ramesh','BE,MTECH',38,'Associate Professor');
INSERT INTO `faculty` (`f_id`, `f_name`, `qualification`, `age`, `designation`) VALUES('E25','Arun','BE,MTECH',40,'Associate Professor');
INSERT INTO `faculty` (`f_id`, `f_name`, `qualification`, `age`, `designation`) VALUES('I01','Meera','BE,MTECH,PHD',46,'HOD');
INSERT INTO `faculty` (`f_id`, `f_name`, `qualification`, `age`, `designation`) VALUES('M03','Asha','BE,MTECH',28,'Associate Professor');
INSERT INTO `exam` (`exam_id`, `exam_name`, `exam_date`, `timings`) VALUES('E01','J2EE','13-12-2018','1 p.m-4 p.m');
INSERT INTO `exam` (`exam_id`, `exam_name`, `exam_date`, `timings`) VALUES('E02','IoT','16-12-2018','1 p.m-4 p.m');
INSERT INTO `exam` (`exam_id`, `exam_name`, `exam_date`, `timings`) VALUES('E03','Python','19-12-2018','1 p.m-4 p.m');
INSERT INTO `exam` (`exam_id`, `exam_name`, `exam_date`, `timings`) VALUES('E04','CAED','22-12-2018','1 p.m-4 p.m');
INSERT INTO `exam` (`exam_id`, `exam_name`, `exam_date`, `timings`) VALUES('E05','Aurdino','26-12-2018','1 p.m-4 p.m');
--
-- Indexes for dumped tables
--


--
-- Indexes for table `login`
--

ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `login`
  ADD PRIMARY KEY (`id`,`username`);
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

ALTER TABLE `faculty`
  ADD PRIMARY KEY (`f_id`);

ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- AUTO_INCREMENT for dumped tables
--


--
-- AUTO_INCREMENT for table `login`
--

ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
