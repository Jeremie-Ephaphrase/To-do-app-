

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `task` varchar(30) NOT NULL,
  `discription` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `members` (`id`, `task`, `discription`, `date`) VALUES
(1, 'neovic', 'devierte', ''),
(2, 'gemalyn', 'cepe', ''),
(9, 'julyn', 'divinagracia', '');


--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

