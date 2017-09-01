-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2017 at 03:07 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `partner`
--

-- --------------------------------------------------------

--
-- Table structure for table `cluster_ngo_partner`
--

CREATE TABLE `cluster_ngo_partner` (
  `legal_name` varchar(50) NOT NULL,
  `ngo_status` varchar(10) NOT NULL,
  `ho_location` varchar(50) NOT NULL,
  `ho_address` varchar(50) NOT NULL,
  `key_trustee_name` varchar(50) NOT NULL,
  `trustee_contact_mobile` varchar(50) NOT NULL,
  `trustee_email` varchar(50) NOT NULL,
  `modelName` varchar(10) NOT NULL,
  `partner_type` varchar(50) NOT NULL,
  `valid` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cluster_ngo_partner`
--

INSERT INTO `cluster_ngo_partner` (`legal_name`, `ngo_status`, `ho_location`, `ho_address`, `key_trustee_name`, `trustee_contact_mobile`, `trustee_email`, `modelName`, `partner_type`, `valid`) VALUES
('sanjay', 'society', 'bengaluru', 'Vijayanagar', 'Gopi', '8877887788', 'g@gmail.com', 'yes', 'cluster_ngo', 'yes'),
('Rajesh', 'proprietor', 'Bengaluru', 'Yelahanka', 'Gopi', '8877887788', 'g@gmail.com', 'yes', 'cluster_ngo', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `core_committee`
--

CREATE TABLE `core_committee` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_committee`
--

INSERT INTO `core_committee` (`id`, `email`) VALUES
(1, 'sansa090@live.com'),
(2, 'sansa091@live.com'),
(3, 'sansa090@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `corporate_implementation_partner`
--

CREATE TABLE `corporate_implementation_partner` (
  `corporate_legal_name` varchar(50) NOT NULL,
  `csr_director_name` varchar(50) NOT NULL,
  `csr_director_mobile` varchar(50) NOT NULL,
  `number_csr_locations` varchar(50) NOT NULL,
  `number_shareable_csr_locations` varchar(50) NOT NULL,
  `spectfic_instruction_to_HHH` varchar(50) NOT NULL,
  `csr_budgets_available_this_FY_for_trainer_salaries` varchar(10) NOT NULL,
  `other_temp_staff_to_help_HHH_student_mobilization` varchar(10) NOT NULL,
  `location_csr_rep_name` varchar(50) NOT NULL,
  `location_csr_rep_email` varchar(50) NOT NULL,
  `template_for_data_collection_from_MIC` varchar(10) NOT NULL,
  `csr_director_email` varchar(50) NOT NULL,
  `valid` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corporate_implementation_partner`
--

INSERT INTO `corporate_implementation_partner` (`corporate_legal_name`, `csr_director_name`, `csr_director_mobile`, `number_csr_locations`, `number_shareable_csr_locations`, `spectfic_instruction_to_HHH`, `csr_budgets_available_this_FY_for_trainer_salaries`, `other_temp_staff_to_help_HHH_student_mobilization`, `location_csr_rep_name`, `location_csr_rep_email`, `template_for_data_collection_from_MIC`, `csr_director_email`, `valid`) VALUES
('rt', 'fg', '435', 'trg', 'erg', 'dfg', '', 'yes', 'undefined', 'undefined', 'no', 'g@g', 'no'),
('ui', 'er', '67', 'uk', 'uyky', 'yu', '', 'no', 'undefined', 'undefined', 'yes', 'k@k', 'no'),
('tr', 'dfh', '56', 'ytg', 'uk', 'huk', '', 'no', '[object Object]', 'undefined', 'yes', 'oO@io', 'no'),
('tr', 'dfh', '56', 'ytg', 'uk', 'huk', '', 'no', '[object Object]', 'undefined', 'yes', 'oO@io', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `fully_funded_project_implementation_partner`
--

CREATE TABLE `fully_funded_project_implementation_partner` (
  `f_legal_name` varchar(50) NOT NULL,
  `f_ngo_status` varchar(50) NOT NULL,
  `f_ho_location` varchar(50) NOT NULL,
  `f_ho_address` varchar(50) NOT NULL,
  `f_key_trustee_name` varchar(50) NOT NULL,
  `f_trustee_contact_mobile` varchar(50) NOT NULL,
  `f_trustee_email` varchar(50) NOT NULL,
  `number_center_ready_with_facilities` varchar(50) NOT NULL,
  `discussed_approximate_cost_per_student_in_residential_format` varchar(10) NOT NULL,
  `accomodation_to_HHH_Trainer_at_no_cost` varchar(10) NOT NULL,
  `discussed_cost_of_mobilization_for_MIC_program` varchar(10) NOT NULL,
  `dedicated_project_manager_for_HHH_program` varchar(10) NOT NULL,
  `valid` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fully_funded_project_implementation_partner`
--

INSERT INTO `fully_funded_project_implementation_partner` (`f_legal_name`, `f_ngo_status`, `f_ho_location`, `f_ho_address`, `f_key_trustee_name`, `f_trustee_contact_mobile`, `f_trustee_email`, `number_center_ready_with_facilities`, `discussed_approximate_cost_per_student_in_residential_format`, `accomodation_to_HHH_Trainer_at_no_cost`, `discussed_cost_of_mobilization_for_MIC_program`, `dedicated_project_manager_for_HHH_program`, `valid`) VALUES
('undefined', 'society', 'e', 'r', 'r', 't', 't', 't', 'no', 'yes', 'no', 'yes', 'no'),
('undefined', 'society', 'w', 'e', 'r', 't', 'y@y', 'rt', 'no', 'yes', 'no', 'yes', 'no'),
('san', 'proprietorship', 'ew', 'qw', 'e', '3', 'f@f', 'e', 'no', 'yes', 'no', 'yes', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `participative_partner_with_self-sustenance`
--

CREATE TABLE `participative_partner_with_self-sustenance` (
  `p_legal_name` varchar(50) NOT NULL,
  `p_ngo_status` varchar(50) NOT NULL,
  `p_ho_location` varchar(50) NOT NULL,
  `p_ho_address` varchar(50) NOT NULL,
  `p_key_trustee_name` varchar(50) NOT NULL,
  `p_trustee_contact_mobile` varchar(50) NOT NULL,
  `p_trustee_email` varchar(50) NOT NULL,
  `number_center_to_start` varchar(50) NOT NULL,
  `number_of_staff_to_be_nominated_for_TTT_at_Tumkur` varchar(50) NOT NULL,
  `it_infra_readiness_for_MIC` varchar(50) NOT NULL,
  `domain_technical_training_to_add_to_MIC_program` varchar(50) NOT NULL,
  `domain_details_number_training_hours_needed` varchar(50) NOT NULL,
  `valid` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `partner_id` int(11) NOT NULL,
  `partner_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `core_committee`
--
ALTER TABLE `core_committee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`partner_id`),
  ADD UNIQUE KEY `partner_id` (`partner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `core_committee`
--
ALTER TABLE `core_committee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
