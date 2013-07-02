CREATE TABLE `employee_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(64) DEFAULT NULL,
  `email1` varchar(100) DEFAULT NULL,
  `email2` varchar(100) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `company_name` varchar(128) DEFAULT NULL,
  `company_phone` char(11) DEFAULT NULL,
  `company_address` varchar(128) DEFAULT NULL,
  `job_title` varchar(128) DEFAULT NULL,
  `salary` varchar(10) DEFAULT NULL,
  `permission_level` varchar(32) DEFAULT NULL,
  `is_permission_level_active` char(5) DEFAULT NULL,
  `start_date` date DEFAULT NULL
);

