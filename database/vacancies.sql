-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2022 at 08:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vacancy3`
--

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` int(11) NOT NULL,
  `required_employee` int(11) NOT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`id`, `position_id`, `cover_image`, `description`, `requirements`, `location_id`, `required_employee`, `job_type`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '', '<ul><li>Conduct market r<span style=\"font-size: 1rem;\">esearch to identify&nbsp;</span><span style=\"font-size: 1rem;\">selling</span></li><li><span style=\"font-size: 1rem;\">possibilities and&nbsp;</span><span style=\"font-size: 1rem;\">evaluate customer&nbsp;</span><span style=\"font-size: 1rem;\">needs</span></li><li>Actively seek out&nbsp;<span style=\"font-size: 1rem;\">new sales&nbsp;</span><span style=\"font-size: 1rem;\">opportunities&nbsp;</span><span style=\"font-size: 1rem;\">through cold calling,&nbsp;</span><span style=\"font-size: 1rem;\">networking and&nbsp;</span><span style=\"font-size: 1rem;\">social media</span></li><li>Set up meetings with&nbsp;<span style=\"font-size: 1rem;\">potential clients and&nbsp;</span>listen to their wishes&nbsp;<span style=\"font-size: 1rem;\">and concerns</span></li></ul><div id=\"description\"><span style=\"font-size: 1rem;\"></span></div><div id=\"description\"></div>', '<ul><li>Proven experience as a Sales&nbsp;<span style=\"font-size: 1rem;\">Executive or relevant role</span></li></ul><div id=\"requirement\"><span style=\"font-size: 1rem;\"><ul><li>Proficiency in English&nbsp;<span style=\"font-size: 1rem;\">Excellent knowledge of MS&nbsp;</span><span style=\"font-size: 1rem;\">Office</span></li></ul><div id=\"requirement\"><span style=\"font-size: 1rem;\"><ul><li>Hands-on experience with&nbsp;<span style=\"font-size: 1rem;\">CRM software is a plus</span></li></ul><div id=\"requirement\"><span style=\"font-size: 1rem;\"><ul><li>Thorough understanding of&nbsp;<span style=\"font-size: 1rem;\">marketing and negotiating&nbsp;</span><span style=\"font-size: 1rem;\">techniques&nbsp;</span><span style=\"font-size: 1rem;\">Fast learner and passion for&nbsp;</span><span style=\"font-size: 1rem;\">sales</span></li></ul></span></div></span></div></span></div><div id=\"requirement\"></div>', 1, 5, 'FTE', 1, NULL, '2022-09-02 10:06:11', '2022-09-02 10:06:11'),
(2, 2, '', '<ul><li>Financial modelling</li><li>Variance Analysis</li><li>Pricing</li><li>Reporting</li><li>Defining business&nbsp;<span style=\"font-size: 1rem;\">requirements and&nbsp;</span><span style=\"font-size: 1rem;\">reporting them back&nbsp;</span><span style=\"font-size: 1rem;\">to stakeholders</span></li></ul><div id=\"description\"></div>', '<ul><li>Experience working with&nbsp;<span style=\"font-size: 1rem;\">senior decision makers</span></li><li>Strong&nbsp;<span style=\"font-size: 1rem;\">communication/interpersonal&nbsp;</span><span style=\"font-size: 1rem;\">skills</span></li><li>Proven analytical background</li><li>Advanced Excel skills</li></ul><div id=\"requirement\"></div>', 1, 3, 'FTE', 1, NULL, '2022-09-02 10:09:07', '2022-09-02 10:09:07'),
(3, 3, '', '<ul><li>using specialist tools&nbsp;<span style=\"font-size: 1rem;\">to extract the data&nbsp;</span><span style=\"font-size: 1rem;\">needed</span></li><li>responding to data-<span style=\"font-size: 1rem;\">related queries and&nbsp;</span><span style=\"font-size: 1rem;\">keeping track of </span><span style=\"font-size: 1rem;\">these&nbsp;</span><span style=\"font-size: 1rem;\">analyzing data to&nbsp;</span><span style=\"font-size: 1rem;\">identify trends</span></li><li>setting up processes&nbsp;<span style=\"font-size: 1rem;\">and systems to make&nbsp;</span><span style=\"font-size: 1rem;\">working with data&nbsp;</span><span style=\"font-size: 1rem;\">more efficient</span></li><li>producing reports&nbsp;<span style=\"font-size: 1rem;\">and charts&nbsp;</span><span style=\"font-size: 1rem;\">communicating&nbsp;</span><span style=\"font-size: 1rem;\">trends within data to&nbsp;</span><span style=\"font-size: 1rem;\">non-specialists</span></li><li>presenting&nbsp;<span style=\"font-size: 1rem;\">information&nbsp;</span><span style=\"font-size: 1rem;\">generated from data&nbsp;</span><span style=\"font-size: 1rem;\">to clients and&nbsp;</span><span style=\"font-size: 1rem;\">managers.</span></li></ul><div id=\"description\"></div>', '<ul><li>A high level of mathematical&nbsp;<span style=\"font-size: 1rem;\">ability.</span></li><li>The ability to analyse, model&nbsp;<span style=\"font-size: 1rem;\">and interpret data.</span></li><li>Problem-solving skills.</li><li>A methodical and logical&nbsp;<span style=\"font-size: 1rem;\">approach.</span></li><li>The ability to plan work and&nbsp;<span style=\"font-size: 1rem;\">meet deadlines.</span></li><li>Accuracy and attention to&nbsp;<span style=\"font-size: 1rem;\">detail.</span></li></ul><div id=\"requirement\"></div>', 1, 1, 'FTE', 1, NULL, '2022-09-02 10:18:42', '2022-09-02 10:18:42'),
(4, 4, '', '<ul><li>Create buy-in for the&nbsp;<span style=\"font-size: 1rem;\">product vision both&nbsp;</span><span style=\"font-size: 1rem;\">internally and with&nbsp;</span><span style=\"font-size: 1rem;\">key external&nbsp;</span><span style=\"font-size: 1rem;\">partners</span></li></ul><div id=\"description\"><span style=\"font-size: 1rem;\"><ul><li>Develop product&nbsp;<span style=\"font-size: 1rem;\">pricing and&nbsp;</span><span style=\"font-size: 1rem;\">positioning&nbsp;</span><span style=\"font-size: 1rem;\">strategies</span></li><li>Translate product&nbsp;<span style=\"font-size: 1rem;\">strategy into&nbsp;</span><span style=\"font-size: 1rem;\">detailed&nbsp;</span><span style=\"font-size: 1rem;\">requirements and&nbsp;</span><span style=\"font-size: 1rem;\">prototypes</span></li><li>Scope and prioritize&nbsp;<span style=\"font-size: 1rem;\">activities based on&nbsp;</span><span style=\"font-size: 1rem;\">business and&nbsp;</span><span style=\"font-size: 1rem;\">customer impact</span></li><li>Work closely with&nbsp;<span style=\"font-size: 1rem;\">engineering teams to&nbsp;</span><span style=\"font-size: 1rem;\">deliver with quick&nbsp;</span><span style=\"font-size: 1rem;\">time-to-market and&nbsp;</span><span style=\"font-size: 1rem;\">optimal resources</span></li></ul></span></div><div id=\"description\"></div>', '<ul><li>Proven ability to develop&nbsp;<span style=\"font-size: 1rem;\">product and marketing&nbsp;</span><span style=\"font-size: 1rem;\">strategies and effectively&nbsp;</span><span style=\"font-size: 1rem;\">communicate&nbsp;</span><span style=\"font-size: 1rem;\">recommendations to&nbsp;</span><span style=\"font-size: 1rem;\">executive management</span></li></ul><div id=\"requirement\"><span style=\"font-size: 1rem;\"><ul><li>Solid technical background&nbsp;<span style=\"font-size: 1rem;\">with understanding and/or&nbsp;</span><span style=\"font-size: 1rem;\">hands-on experience in&nbsp;</span><span style=\"font-size: 1rem;\">software development and&nbsp;</span><span style=\"font-size: 1rem;\">web technologies</span></li><li>Strong problem solving skills&nbsp;<span style=\"font-size: 1rem;\">and willingness to roll up&nbsp;</span><span style=\"font-size: 1rem;\">one’s sleeves to get the job</span></li><li>Skilled at working effectively&nbsp;<span style=\"font-size: 1rem;\">with cross functional teams in&nbsp;</span><span style=\"font-size: 1rem;\">a matrix organization</span></li><li>Excellent written and verbal&nbsp;<span style=\"font-size: 1rem;\">communication skills</span></li></ul></span></div><div id=\"requirement\"></div>', 1, 1, 'FTE', 1, NULL, '2022-09-02 10:23:18', '2022-09-02 10:23:18'),
(6, 5, '', '<ul><li style=\"font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Create visually&nbsp;<span style=\"font-size: 1rem;\">appealing and user-</span><span style=\"font-size: 1rem;\">friendly web pages&nbsp;</span><span style=\"font-size: 1rem;\">that move an&nbsp;</span><span style=\"font-size: 1rem;\">audience to&nbsp;</span><span style=\"font-size: 1rem;\">Analyzing UI flows</span></li></ul><ul><li style=\"font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Creating project&nbsp;<span style=\"font-size: 1rem;\">timelines and&nbsp;</span><span style=\"font-size: 1rem;\">deadlines</span></li><li style=\"font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Design work with&nbsp;<span style=\"font-size: 1rem;\">less supervision,&nbsp;</span><span style=\"font-size: 1rem;\">such as mock-ups for&nbsp;</span><span style=\"font-size: 1rem;\">reporting, assist with&nbsp;</span><span style=\"font-size: 1rem;\">low fidelity wire-</span><span style=\"font-size: 1rem;\">framing, and&nbsp;</span><span style=\"font-size: 1rem;\">development of&nbsp;</span><span style=\"font-size: 1rem;\">instructional&nbsp;</span><span style=\"font-size: 1rem;\">materials</span></li><li style=\"font-family: system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, &quot;Noto Sans&quot;, &quot;Liberation Sans&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\"><span style=\"font-size: 1rem;\">requirements are&nbsp;</span></li></ul><div id=\"description\"></div>', '<ul><li>Solid understanding of the&nbsp;<span style=\"font-size: 1rem;\">web environment, GUI&nbsp;</span><span style=\"font-size: 1rem;\">(screen layouts and&nbsp;</span><span style=\"font-size: 1rem;\">composition)</span></li><li>At least 5 years of job&nbsp;<span style=\"font-size: 1rem;\">experience in UI/UX planning&nbsp;</span><span style=\"font-size: 1rem;\">at emarket place (online&nbsp;</span><span style=\"font-size: 1rem;\">shopping site)</span></li><li>Experience working in an&nbsp;<span style=\"font-size: 1rem;\">emarket place(online&nbsp;</span><span style=\"font-size: 1rem;\">shopping site)</span></li><li>Experience on web analytics&nbsp;<span style=\"font-size: 1rem;\">and project leading</span></li><li>Familiarity with third party&nbsp;<span style=\"font-size: 1rem;\">components like DevExpress&nbsp;</span><span style=\"font-size: 1rem;\">and Infragistics</span></li></ul><div id=\"requirement\"></div>', 1, 2, 'FTE', 1, NULL, '2022-09-02 10:30:47', '2022-09-02 10:35:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
