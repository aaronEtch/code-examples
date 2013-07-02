SELECT `username`,`email1`,`start_date`,`salary`,`company_name` 
FROM `employee_info` 
WHERE `permission_level` = 'admin' AND `is_permission_level_active` = 'true'