-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 11:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `task_tbl`
--

CREATE TABLE `task_tbl` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `task_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `task_des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_tbl`
--

INSERT INTO `task_tbl` (`id`, `emp_id`, `task_date`, `task_des`) VALUES
(1, 39, '2022-07-28 19:00:00', 'Type letters for ERP '),
(2, 44, '2022-07-28 19:00:00', 'Do data entry of commercial data'),
(3, 40, '2022-07-28 19:00:00', 'Type letters for cbs'),
(5, 40, '2022-07-31 19:00:00', 'Data Entry of Powerhouses and Grid Stations'),
(6, 37, '2022-08-01 19:00:00', 'List the reports of HR. '),
(7, 39, '2022-08-01 19:00:00', 'Finalize the list of Files in DIT in printed form.\r\nShow receipt and despatch  registers after completion. '),
(8, 44, '2022-08-01 19:00:00', 'Finalize the commercial data of MZD and present its report. '),
(9, 38, '2022-08-02 19:00:00', 'CERP Software Dashboard and CERP Software complete testing. Detail Report should be submitted at the end of the day. '),
(10, 39, '2022-08-02 19:00:00', 'Testing of Human Resource Module of CERP Software and Data Entry.'),
(11, 40, '2022-08-02 19:00:00', 'Complete and Correct Minutes of Meeting.\r\nTesting of Inventory Module in CERP.\r\nSubmit detail report of both task.'),
(12, 44, '2022-08-02 19:00:00', 'For Circle Mirpur, Data entry of the Month May 2022 in both excel and Commercial reporting Software.'),
(13, 37, '2022-08-02 19:00:00', 'Testing of Human Resource Module of CERP Software and Data Entry.'),
(14, 37, '2022-08-03 19:00:00', 'Testing of Human Resource Module of CERP Software and list down all the errors you faced in the sheet provided by Mudassar Sab.\r\nData Entry of HR Module'),
(15, 38, '2022-08-03 19:00:00', 'CERP Software Dashboard and CERP Software complete testing. List down all the errors you faced in sheet provided by Mudassar Sab and Present Report.'),
(16, 39, '2022-08-03 19:00:00', 'Finalize the list of Files in DIT in printed form. Show receipt and\r\ndispatch registers after completion.'),
(17, 40, '2022-08-03 19:00:00', 'Complete and Correct Minutes of today Meeting and Present it after completion. \r\nTesting of Inventory Module in CERP, list down all the errors you faced in sheet provided by Mudassar Sab and present Report.'),
(18, 44, '2022-08-03 19:00:00', ' Data entry of the Month May 2022 in Commercial reporting Software.');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg_tbl`
--

CREATE TABLE `user_reg_tbl` (
  `emp_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_des` varchar(100) NOT NULL,
  `user_section` varchar(100) NOT NULL,
  `user_scale` varchar(100) NOT NULL,
  `user_res` text NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_reg_tbl`
--

INSERT INTO `user_reg_tbl` (`emp_id`, `user_name`, `user_des`, `user_section`, `user_scale`, `user_res`, `user_id`, `user_pass`, `user_role`) VALUES
(36, 'Madu Web Tech', 'Director IT ', 'DIT', 'BPS-19', 'Supervision of IT department               ', 'muddsar', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0),
(37, 'Shahid Ismail', 'Stenographer', 'DIT', 'BPS-14', 'Human Resources\r\n*Testing\r\n* Data Entry                            ', 'ShahidIsmail', 'e781bda0f23566eff81fe4b84491c4ad28a5e123', 1),
(38, 'Moheeb Ul Haq', 'Stenographer', 'DIT', 'BPS-14', 'Work Related to Human Resources \r\nand Testing CERP                            ', 'moheeb@667', '2afb6ea72fdae5861dd6dac8e6f9783028057c86', 1),
(39, 'Muhammad Shahid Shabbir', 'Stenographer', 'DIT', 'BPS-14', 'Work Related to HR Module \r\nType of director IT and Telephone                            ', 'shahidshabbir415', 'edfbf6b94e3df067db727942f55d7989f3b6f13e', 1),
(40, 'Ali Ahmed', 'Stenographer', 'DIT', 'BPS-14', 'Work Related to Inventory Control Management.              ', 'Aliahmed', '3b09707417a4f8cd9e9b9c45410f684def09ae15', 1),
(43, 'Muddsar Qayyum', 'Computer Programmer', 'DIT', 'BPS-17', 'Design and develop web applications and websites for AJKED                                                      ', 'muddsar', 'a4e6c8a34eacbb111ed65506d1d29fff3e67fffc', 1),
(44, 'Rubina Asif', 'Stenographer', 'DIT', 'BPS-14', 'Data entry of commercial data                             ', 'rubina', '5ab2cdeb56bf1b098f94d9ff4bbd73ac33f5a7bc', 1),
(46, 'Usman Rasheed', 'Stenographer', 'DIT', 'BPS-14', 'CERP HR Module Data Entry and Testing            ', 'usmanrasheed', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1),
(47, 'Abid Hussain', 'Stenographer', 'DIT', 'BPS-14', 'CERP Inventory Module Data Entry and Testing              ', 'abidhussain', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1);

-- --------------------------------------------------------

--
-- Table structure for table `work_tbl`
--

CREATE TABLE `work_tbl` (
  `employee_id` int(11) NOT NULL,
  `work_date` date NOT NULL,
  `work_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_tbl`
--

INSERT INTO `work_tbl` (`employee_id`, `work_date`, `work_desc`) VALUES
(44, '2022-07-21', 'Data not provided'),
(37, '2022-07-21', 'Today perfome duties\r\n*Enter data of employees of basic record \r\n* Service record\r\n* Appointment Record\r\n*  Transfer record nd other 2 haed enter. In last promotion & demotion giving error wile written da'),
(40, '2022-07-21', 'Prepared Minutes of meeting held on 20.07.2022\r\nTyping official letters\r\nTyping order '),
(38, '2022-07-21', 'Today\'s Progress Report.\r\n1) Check different modules in AJKED-Customized Enterprise Resource Planning like\r\nâ€¢Dashboard\r\nâ€¢Employee basic data\r\nâ€¢Add employee basic data, some bugs are mentioned over record\r\n'),
(40, '2022-07-22', 'Typing letters\r\nTyping tender notice\r\n'),
(37, '2022-07-22', 'Do some work on promotion & Demotion data after that internet was not working cannot do anything .'),
(39, '2022-07-22', '5letter taype \r\nOffice work\r\nMeeting letter issues '),
(39, '2022-07-26', 'All Mail ðŸ’Œ check check and reply\r\nLetter type\r\nPreparation of Record\r\n'),
(40, '2022-07-26', 'Prepared Minutes of meeting\r\nTyping letters'),
(37, '2022-07-27', 'Nothing to be done due to internet problem\r\n'),
(39, '2022-07-27', 'All Mail ðŸ“¬ check\r\nFile sign\r\nType the letter âœ‰ï¸'),
(38, '2022-07-28', 'Dear Sir,\r\nI hope you are doing well.\r\nWorking in human Resource applications and testing different modules.'),
(37, '2022-07-29', 'Today meet with Mr Hayat sb demmenf for work related HRM but no work guven by them. Due to internet  no work done on HRM portal today.'),
(39, '2022-07-29', 'All file page numbering\r\nAll Mail ðŸ“¬ check\r\nType the letter âœ‰ï¸'),
(40, '2022-07-29', 'Typing letters'),
(38, '2022-07-29', 'Dear Sir,\r\nHappy weekend ðŸ˜‡\r\nToday I am working in HR modules.\r\n1) Employees\' Record\r\nCheck all the functionality of employees\' records.\r\nThank you. '),
(44, '2022-08-01', 'Enter commercial data of Muzaffarabad circle of month June 2022'),
(40, '2022-08-01', 'Data Entry of powerhouses and Grid Stations\r\nTyping letters'),
(37, '2022-08-01', 'Do some work on hrm website due to internet speed qork couldnot perform very well '),
(38, '2022-08-01', 'Dear Sir,\r\nI hope you are doing well. \r\nIn the office, no internet provides to the user for working. Today I have no work done because no internet and no system is available.'),
(39, '2022-08-01', 'All Mail ðŸ’Œ check and received\r\nHr medule testing\r\nType leeter'),
(44, '2022-08-02', 'cross match commercial data of Muzaffarabad circle 6-2022'),
(39, '2022-08-02', 'Finalize list check the director sab\r\nReceipt and received despatch register completely check director sab'),
(40, '2022-08-02', 'Typing letters\r\nTyping Minutes of Meeting held on 02/08/2022'),
(38, '2022-08-02', 'Dear Sir,\r\nHope you are doing well.\r\nWorking in the different modules in Human Resources '),
(44, '2022-08-03', 'Enter the data of Mirpur circle 5-2022 in Excel. Internet is not working so commercial data can\'t be enter in commercial reporting software.'),
(39, '2022-08-03', 'Dear sir\r\nKindly check my assigned my duity\r\nMeeting mints check and corrections\r\nLetter type\r\nFile listing\r\nMail check DIT sab\r\nMail check Cheif programs sab '),
(37, '2022-08-03', 'Due to internet breakdown couldn\'t do any work on software. One conection we have in that CERP software didn\'t work only loading nd giving error.'),
(40, '2022-08-03', 'Finalize minutes of meeting, \r\nTyping letters.\r\nNon availability of internet no work on Inventory Module'),
(38, '2022-08-03', 'Actually, I am working in software AJKED-Customized Enterprise Resource Planning as a tester but the internet is not available in the office. So I am not working properly, please provide internet as s'),
(39, '2022-08-04', 'All ready check finalize file DiT printed from and already show the received and dispatch Registered.'),
(37, '2022-08-04', 'Today do nothing due to internet connection not available in ERP lab.\r\n'),
(40, '2022-08-04', 'Typing letters\r\nTyping Minutes of meeting'),
(38, '2022-08-04', 'No internet available in the ERP lab already discuss with mudsar'),
(40, '2022-08-15', 'Typing minutes of meeting'),
(37, '2022-08-16', 'First time take part in employees strike.\r\nAfter that work.on HRM module first work on employee basic data after that work on service record enter all nedeed data in software after that other employees use that system. We have only one sytem thats why cou'),
(39, '2022-08-16', 'Type electricity schedule of DIT\r\n\r\n'),
(44, '2022-08-17', 'System and internet is not available '),
(37, '2022-08-17', 'Enter data in CERP software  tabe Employee record service record , employee permotion record enter data till Transfer to post . The drop down list of this tab post of transfer . I have tell to Mr Muddasair about this error nd as well write down it in page'),
(40, '2022-08-17', 'Typing letters '),
(39, '2022-08-17', 'All Mail Receive and dispatch\r\nAll Mail check DIT\r\nType of letter s');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task_tbl`
--
ALTER TABLE `task_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reg_tbl`
--
ALTER TABLE `user_reg_tbl`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task_tbl`
--
ALTER TABLE `task_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_reg_tbl`
--
ALTER TABLE `user_reg_tbl`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
