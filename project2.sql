-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2026 at 06:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

SET FOREIGN_KEY_CHECKS=0;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--

CREATE DATABASE IF NOT EXISTS `project2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project2`;

--
-- Drop existing tables so the file can be imported more than once
--

DROP TABLE IF EXISTS `EOI`;
DROP TABLE IF EXISTS `jobs`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `about_members`;

-- --------------------------------------------------------

--
-- Table structure for table `about_members`
--

CREATE TABLE `about_members` (
  `member_id` int(11) NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `contribution` text DEFAULT NULL,
  `translation` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_members`
--

INSERT INTO `about_members` (`member_id`, `student_id`, `image`, `contribution`, `translation`) VALUES
(1, '103815210', 'images/Member1.png', 'I have contributed to the index.html page, including layout structure, navigation bar, hero section, maintaining consistency, and accessibility features. \"চেষ্টা করলে সব সম্ভব\"', 'Translation: With effort, everything is possible.'),
(2, '103534492', 'images/Member2.png', 'I have contributed on the jobs.html page for this project. \"ইট মারলে পাটকেল খেতে হয়।\"', 'Translation: If you throw a brick at someone, you will also be hit by a brick at some point.'),
(3, '106319524', 'images/Member3.png', 'I have contributed to the apply.html application page. I have made a form for users to fill out with their details for joining the smart city infrastructure consultancy team. \"Palos y piedras pueden romper mis huesos, pero las palabras nunca me harán daño\"', 'Translation: Sticks and stones may break your bones but words can never hurt you!'),
(4, '106504032', 'images/Member4.png', 'I worked on the About.html page(this one!), \"強力な労働力の鍵はオープンなコミュニケーションです\"', 'Translation: The key to a strong workforce is open communication.');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `ref_number` varchar(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `reporting_line` varchar(100) DEFAULT NULL,
  `employment_type` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `responsibilities` text DEFAULT NULL,
  `essential_req` text DEFAULT NULL,
  `preferable_req` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `ref_number`, `title`, `description`, `salary`, `reporting_line`, `employment_type`, `location`, `responsibilities`, `essential_req`, `preferable_req`) VALUES
(1, 'ST001', 'Smart Transport Systems Engineer', 'Join our Transport & Mobility team to design, implement, and maintain intelligent transport monitoring systems across metropolitan and regional councils. You will work directly with transport authorities and local government partners to deliver real-time traffic management and public transit solutions.', '$90,000 – $110,000 per annum + superannuation', 'Reports to the Director of Smart Infrastructure', 'Full-time, Permanent', 'Melbourne, VIC (Hybrid)', 'Design and deploy intelligent transport monitoring systems for council partners.|Integrate real-time traffic data feeds into urban management dashboards.|Collaborate with transport authorities to identify system improvement opportunities.|Conduct regular performance audits of deployed transport infrastructure.|Prepare technical documentation, reports, and presentations for stakeholders.|Ensure all systems comply with relevant safety and accessibility standards.', 'Bachelor degree in Electrical Engineering, Computer Science, or related field.|Minimum 3 years experience in transport systems, ITS, or smart infrastructure.|Proficiency in network communications protocols (TCP/IP, MQTT, REST APIs).|Strong analytical and problem-solving skills in complex system environments.|Excellent written and verbal communication skills for stakeholder reporting.', 'Experience working with Australian state or local government transport agencies.|Familiarity with GIS mapping tools and spatial data analysis platforms.|Knowledge of SCATS or SCOOT traffic signal control systems.|Postgraduate qualification in Smart Cities, Urban Engineering, or similar.'),
(2, 'UD002', 'Urban Data Analyst', 'As an Urban Data Analyst within our Data & Intelligence team, you will collect, process, and interpret large datasets generated by city infrastructure sensors, public services, and energy monitoring platforms. Your insights will directly inform council decision-making and urban planning strategies.', '$80,000 – $98,000 per annum + superannuation', 'Reports to the Head of Data & Intelligence', 'Full-time, Permanent', 'Melbourne, VIC (Hybrid)', 'Collect and process datasets from smart city sensors, IoT devices, and public APIs.|Develop interactive dashboards and visualisations for council and government partners.|Identify trends and anomalies in urban infrastructure performance data.|Prepare detailed analytical reports and present findings to non-technical stakeholders.|Maintain data pipelines and ensure data quality, integrity, and security.|Support cross-functional teams with data-driven recommendations.', 'Bachelor degree in Data Science, Statistics, Computer Science, or related field.|Minimum 2 years experience in data analysis or business intelligence roles.|Proficiency in Python or R for data processing and statistical analysis.|Experience with data visualisation tools such as Tableau, Power BI, or similar.|Strong understanding of database querying using SQL.', 'Experience working with IoT sensor data or geospatial datasets.|Familiarity with cloud data platforms such as AWS, Azure, or Google Cloud.|Knowledge of open government data standards and public sector reporting.|Postgraduate qualification in Data Analytics, Urban Informatics, or similar.'),
(3, 'CP003', 'Smart City Project Manager', 'As a Smart City Project Manager, you will lead the planning, execution, and delivery of digital urban infrastructure projects in partnership with local councils, transport authorities, and energy providers. You will bridge the gap between technical teams and government stakeholders to ensure projects are delivered on time, within budget, and to specification.', '$105,000 – $125,000 per annum + superannuation', 'Reports to the General Manager of Project Delivery', 'Full-time, Permanent', 'Melbourne, VIC (On-site & Travel Required)', 'Lead end-to-end project delivery for smart city infrastructure initiatives.|Define project scope, goals, milestones, and resource requirements.|Manage relationships with council, government, and industry stakeholders.|Monitor project budgets, timelines, and risk registers throughout delivery.|Coordinate cross-functional teams including engineers, analysts, and designers.|Report project progress and outcomes to senior leadership and external partners.', 'Bachelor degree in Project Management, Engineering, Business, or related field.|Minimum 5 years experience managing complex technology or infrastructure projects.|Demonstrated experience using Agile, Scrum, or PRINCE2 methodologies.|Strong stakeholder management and communication skills.|PMP, PRINCE2, or equivalent project management certification.', 'Prior experience delivering projects within local or state government contexts.|Familiarity with smart city frameworks, digital twin technologies, or urban IoT.|Experience managing projects with budgets exceeding $1 million.|Postgraduate qualification in Urban Planning, Smart Cities, or related discipline.'),
(4, 'CE004', 'IoT & Connected Infrastructure Specialist', 'As our IoT & Connected Infrastructure Specialist, you will design, deploy, and manage networks of connected sensors and smart devices embedded across urban environments. From energy monitoring nodes to environmental sensors, you will ensure our connected infrastructure operates reliably, securely, and at scale across partner council deployments.', '$95,000 – $115,000 per annum + superannuation', 'Reports to the Director of Smart Infrastructure', 'Full-time, Permanent', 'Melbourne, VIC (Hybrid)', 'Design and deploy IoT sensor networks across urban infrastructure environments.|Configure and maintain connected devices including gateways, edge nodes, and controllers.|Monitor network performance and resolve connectivity or hardware issues promptly.|Implement cybersecurity best practices across all connected infrastructure systems.|Integrate IoT data streams with central urban management platforms and dashboards.|Document system architecture, configurations, and maintenance procedures.', 'Bachelor degree in Electronics Engineering, Computer Engineering, or related field.|Minimum 3 years hands-on experience deploying and managing IoT systems.|Strong knowledge of IoT communication protocols including MQTT, CoAP, and LoRaWAN.|Experience with embedded systems, microcontrollers, and edge computing platforms.|Understanding of network security principles and IoT-specific cybersecurity risks.', 'Experience deploying IoT solutions in outdoor or harsh urban environments.|Familiarity with smart metering, environmental monitoring, or energy management systems.|Knowledge of Australian telecommunications standards and spectrum regulations.|Relevant certifications in IoT, networking, or cybersecurity (e.g. CCNA, CompTIA).'),
(5, 'CS005', 'Community & Stakeholder Engagement Officer', 'As our Community & Stakeholder Engagement Officer, you will serve as the vital link between UrbanSync Consultancy, local councils, and the communities we serve. You will lead public consultation processes, communicate the benefits of smart city initiatives to diverse audiences, and ensure that all community voices including those of Aboriginal and Torres Strait Islander peoples are meaningfully included in urban planning and digital infrastructure decisions.', '$75,000 – $90,000 per annum + superannuation', 'Reports to the Manager of Community Relations', 'Full-time, Permanent', 'Melbourne, VIC (On-site & Community Travel Required)', 'Plan and deliver public consultation sessions for smart city projects in local communities.|Develop accessible communication materials explaining smart infrastructure initiatives.|Build and maintain relationships with council representatives, community groups, and advocacy organisations.|Ensure engagement processes are inclusive, accessible, and culturally appropriate.|Coordinate with Aboriginal and Torres Strait Islander community leaders on relevant projects.|Compile community feedback reports and present recommendations to project teams.', 'Bachelor degree in Communications, Community Development, Social Science, or related field.|Minimum 2 years experience in community engagement, public affairs, or stakeholder relations.|Demonstrated ability to communicate complex technical topics to general audiences.|Strong interpersonal skills with experience working across diverse community groups.|Understanding of culturally safe engagement practices with First Nations communities.', 'Experience working within local government, urban planning, or technology sectors.|Knowledge of the IAP2 (International Association for Public Participation) framework.|Lived experience or demonstrated connection to Aboriginal and Torres Strait Islander communities.|Proficiency in a second language relevant to Melbourne diverse communities.');

-- --------------------------------------------------------

--
-- Table structure for table `EOI`
--

CREATE TABLE `EOI` (
  `EOInumber` int(11) NOT NULL,
  `job_reference` varchar(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(40) NOT NULL,
  `suburbtown` varchar(40) NOT NULL,
  `state` varchar(4) NOT NULL,
  `postcode` varchar(4) NOT NULL,
  `communication` tinyint(1) DEFAULT NULL,
  `problem_solving` tinyint(1) DEFAULT NULL,
  `leadership` tinyint(1) DEFAULT NULL,
  `technical` tinyint(1) DEFAULT NULL,
  `time_management` tinyint(1) DEFAULT NULL,
  `teamwork` tinyint(1) DEFAULT NULL,
  `adaptability` tinyint(1) DEFAULT NULL,
  `data_analysis` tinyint(1) DEFAULT NULL,
  `customer_service` tinyint(1) DEFAULT NULL,
  `project_management` tinyint(1) DEFAULT NULL,
  `critical_thinking` tinyint(1) DEFAULT NULL,
  `attention_to_detail` tinyint(1) DEFAULT NULL,
  `other_skills` text DEFAULT NULL,
  `status` enum('New','Current','Final') NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--
-- Username: admin
-- Password: admin
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$0PmHpvaqgX6uUddBkNDhbOdm5vk1wI2Tj9R7yX2M2zVk/sZT5QXgq', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_members`
--
ALTER TABLE `about_members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD UNIQUE KEY `unique_ref_number` (`ref_number`);

--
-- Indexes for table `EOI`
--
ALTER TABLE `EOI`
  ADD PRIMARY KEY (`EOInumber`),
  ADD KEY `idx_eoi_job_reference` (`job_reference`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_members`
--
ALTER TABLE `about_members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `EOI`
--
ALTER TABLE `EOI`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for table `EOI`
--
ALTER TABLE `EOI`
  ADD CONSTRAINT `fk_eoi_job_reference`
  FOREIGN KEY (`job_reference`) REFERENCES `jobs` (`ref_number`)
  ON UPDATE CASCADE
  ON DELETE RESTRICT;

SET FOREIGN_KEY_CHECKS=1;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
