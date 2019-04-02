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
-- Table structure for table `enroll`
--




CREATE TABLE `enroll` (
  `s_id` int(10) NOT NULL references student(id) on delete cascade,
  `c_id` int(10) NOT NULL references login(id) on delete cascade,
  `c_name` varchar(25) NOT NULL
) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Dumping data for table `enroll`--





INSERT INTO `enroll` (`s_id`, `c_id`, `c_name`) VALUES
( 1 , 12 , 'J2EE' );


COMMIT;


