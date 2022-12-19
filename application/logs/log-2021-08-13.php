<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-08-13 09:49:59 --> Query error: Unknown column 'times' in 'field list' - Invalid query: SELECT `OSL_batch`.`id`, `course_id`, `batch_id`, `fees`, `days`, `times`, `duration`, `OSL_batch`.`status`, `OSL_batch`.`released_date`, `OSL_batch`.`closed_date`, `OSL_course`.`cos_des1`, `OSL_course`.`slug_name`, `OSL_course`.`cos_title`, `OSL_course`.`cos_image`, `OSL_course`.`ref_key`, `OSL_course`.`status` as `cos_status`, `OSL_level`.`name` as `level`, `OSL_trainer`.`name` as `trainer`
FROM `OSL_batch`
LEFT JOIN `OSL_course` ON `OSL_course`.`id` = `OSL_batch`.`course_id`
LEFT JOIN `OSL_trainer` ON `OSL_trainer`.`id` = `OSL_batch`.`trainer_id`
LEFT JOIN `OSL_level` ON `OSL_level`.`id` = `OSL_course`.`level_id`
WHERE `OSL_course`.`status` = '1'
AND `OSL_batch`.`released_date` < '2021-08-13 09:49:59'
AND `OSL_batch`.`closed_date` > '2021-08-13 09:49:59'
ERROR - 2021-08-13 12:20:11 --> 404 Page Not Found: Home/index
ERROR - 2021-08-13 09:50:13 --> Query error: Unknown column 'times' in 'field list' - Invalid query: SELECT `OSL_batch`.`id`, `course_id`, `batch_id`, `fees`, `days`, `times`, `duration`, `OSL_batch`.`status`, `OSL_batch`.`released_date`, `OSL_batch`.`closed_date`, `OSL_course`.`cos_des1`, `OSL_course`.`slug_name`, `OSL_course`.`cos_title`, `OSL_course`.`cos_image`, `OSL_course`.`ref_key`, `OSL_course`.`status` as `cos_status`, `OSL_level`.`name` as `level`, `OSL_trainer`.`name` as `trainer`
FROM `OSL_batch`
LEFT JOIN `OSL_course` ON `OSL_course`.`id` = `OSL_batch`.`course_id`
LEFT JOIN `OSL_trainer` ON `OSL_trainer`.`id` = `OSL_batch`.`trainer_id`
LEFT JOIN `OSL_level` ON `OSL_level`.`id` = `OSL_course`.`level_id`
WHERE `OSL_course`.`status` = '1'
AND `OSL_batch`.`released_date` < '2021-08-13 09:50:13'
AND `OSL_batch`.`closed_date` > '2021-08-13 09:50:13'
ERROR - 2021-08-13 09:50:20 --> Query error: Unknown column 'times' in 'field list' - Invalid query: SELECT `OSL_batch`.`id`, `course_id`, `batch_id`, `fees`, `days`, `times`, `duration`, `OSL_batch`.`status`, `OSL_batch`.`released_date`, `OSL_batch`.`closed_date`, `OSL_course`.`cos_des1`, `OSL_course`.`slug_name`, `OSL_course`.`cos_title`, `OSL_course`.`cos_image`, `OSL_course`.`ref_key`, `OSL_course`.`status` as `cos_status`, `OSL_level`.`name` as `level`, `OSL_trainer`.`name` as `trainer`
FROM `OSL_batch`
LEFT JOIN `OSL_course` ON `OSL_course`.`id` = `OSL_batch`.`course_id`
LEFT JOIN `OSL_trainer` ON `OSL_trainer`.`id` = `OSL_batch`.`trainer_id`
LEFT JOIN `OSL_level` ON `OSL_level`.`id` = `OSL_course`.`level_id`
WHERE `OSL_course`.`status` = '1'
AND `OSL_batch`.`released_date` < '2021-08-13 09:50:20'
AND `OSL_batch`.`closed_date` > '2021-08-13 09:50:20'
ERROR - 2021-08-13 09:50:47 --> Severity: error --> Exception: Call to undefined function get_uri() /home/tomatoferret18/www/pkt/application/views/template/header.php 63
ERROR - 2021-08-13 09:53:59 --> Severity: 8192 --> Function mcrypt_get_iv_size() is deprecated /home/tomatoferret18/www/pkt/system/libraries/Encrypt.php 274
ERROR - 2021-08-13 09:53:59 --> Severity: 8192 --> Function mcrypt_create_iv() is deprecated /home/tomatoferret18/www/pkt/system/libraries/Encrypt.php 275
ERROR - 2021-08-13 09:53:59 --> Severity: 8192 --> Function mcrypt_encrypt() is deprecated /home/tomatoferret18/www/pkt/system/libraries/Encrypt.php 276
ERROR - 2021-08-13 09:56:06 --> Severity: 8192 --> Function mcrypt_get_iv_size() is deprecated /home/tomatoferret18/www/pkt/system/libraries/Encrypt.php 274
ERROR - 2021-08-13 09:56:06 --> Severity: 8192 --> Function mcrypt_create_iv() is deprecated /home/tomatoferret18/www/pkt/system/libraries/Encrypt.php 275
ERROR - 2021-08-13 09:56:06 --> Severity: 8192 --> Function mcrypt_encrypt() is deprecated /home/tomatoferret18/www/pkt/system/libraries/Encrypt.php 276
ERROR - 2021-08-13 10:01:55 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 326
ERROR - 2021-08-13 10:02:11 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 326
ERROR - 2021-08-13 10:02:46 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 326
ERROR - 2021-08-13 10:03:12 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 326
ERROR - 2021-08-13 10:03:15 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 326
ERROR - 2021-08-13 10:03:22 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 326
ERROR - 2021-08-13 10:03:25 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 326
ERROR - 2021-08-13 10:03:47 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 326
ERROR - 2021-08-13 10:04:35 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 326
ERROR - 2021-08-13 10:04:42 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 326
ERROR - 2021-08-13 12:35:01 --> 404 Page Not Found: Student/course
ERROR - 2021-08-13 12:35:07 --> 404 Page Not Found: Student/course
ERROR - 2021-08-13 10:05:11 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 326
ERROR - 2021-08-13 10:05:12 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 326
ERROR - 2021-08-13 12:35:19 --> 404 Page Not Found: Student/course
ERROR - 2021-08-13 12:35:56 --> 404 Page Not Found: Student/course
ERROR - 2021-08-13 10:06:21 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 326
ERROR - 2021-08-13 10:07:40 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 326
ERROR - 2021-08-13 10:07:55 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 326
ERROR - 2021-08-13 10:12:37 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 327
ERROR - 2021-08-13 10:13:23 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 327
ERROR - 2021-08-13 10:13:49 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 327
ERROR - 2021-08-13 10:14:26 --> Severity: 8192 --> Function mcrypt_get_iv_size() is deprecated /home/tomatoferret18/www/pkt/system/libraries/Encrypt.php 274
ERROR - 2021-08-13 10:14:26 --> Severity: 8192 --> Function mcrypt_create_iv() is deprecated /home/tomatoferret18/www/pkt/system/libraries/Encrypt.php 275
ERROR - 2021-08-13 10:14:26 --> Severity: 8192 --> Function mcrypt_encrypt() is deprecated /home/tomatoferret18/www/pkt/system/libraries/Encrypt.php 276
ERROR - 2021-08-13 10:14:42 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 327
ERROR - 2021-08-13 10:15:04 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 327
ERROR - 2021-08-13 10:16:05 --> Severity: Notice --> Undefined variable: target /home/tomatoferret18/www/pkt/application/libraries/Userconfig.php 327
ERROR - 2021-08-13 12:46:42 --> Non-existent class: Userconfig
ERROR - 2021-08-13 12:52:47 --> 404 Page Not Found: Upload/assets
ERROR - 2021-08-13 13:16:11 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-13 13:16:11 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-13 13:16:12 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-13 13:16:52 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-13 13:16:52 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-13 13:16:52 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-13 13:18:09 --> 404 Page Not Found: Adm/portal
ERROR - 2021-08-13 13:18:17 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-13 13:18:17 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-13 13:18:17 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-13 13:26:21 --> 404 Page Not Found: Upload/assets
ERROR - 2021-08-13 13:27:08 --> 404 Page Not Found: Upload/assets
ERROR - 2021-08-13 13:28:08 --> 404 Page Not Found: Upload/assets
ERROR - 2021-08-13 13:53:48 --> 404 Page Not Found: Student/course
ERROR - 2021-08-13 14:13:22 --> 404 Page Not Found: Upload/assets
ERROR - 2021-08-13 14:13:30 --> 404 Page Not Found: Upload/assets
ERROR - 2021-08-13 14:15:37 --> 404 Page Not Found: Upload/assets
ERROR - 2021-08-13 14:16:10 --> 404 Page Not Found: Upload/assets
ERROR - 2021-08-13 14:16:31 --> 404 Page Not Found: Upload/assets
ERROR - 2021-08-13 14:16:54 --> 404 Page Not Found: Upload/assets
ERROR - 2021-08-13 14:23:29 --> 404 Page Not Found: Upload/assets
ERROR - 2021-08-13 14:31:47 --> 404 Page Not Found: Upload/assets
ERROR - 2021-08-13 14:31:55 --> 404 Page Not Found: Upload/assets
ERROR - 2021-08-13 14:56:42 --> 404 Page Not Found: Upload/assets
ERROR - 2021-08-13 12:28:55 --> Severity: Notice --> Trying to get property 'class_date' of non-object /home/tomatoferret18/www/pkt/application/controllers/Student.php 248
ERROR - 2021-08-13 12:28:55 --> Severity: Warning --> Creating default object from empty value /home/tomatoferret18/www/pkt/application/controllers/Student.php 248
ERROR - 2021-08-13 12:28:55 --> Severity: Warning --> Invalid argument supplied for foreach() /home/tomatoferret18/www/pkt/application/views/auth/course_detail.php 88
ERROR - 2021-08-13 12:30:07 --> Severity: Notice --> Trying to get property 'class_date' of non-object /home/tomatoferret18/www/pkt/application/controllers/Student.php 248
ERROR - 2021-08-13 12:30:07 --> Severity: Warning --> Creating default object from empty value /home/tomatoferret18/www/pkt/application/controllers/Student.php 248
ERROR - 2021-08-13 12:30:07 --> Severity: Warning --> Invalid argument supplied for foreach() /home/tomatoferret18/www/pkt/application/views/auth/course_detail.php 88
ERROR - 2021-08-13 12:31:04 --> Severity: Notice --> Trying to get property 'class_date' of non-object /home/tomatoferret18/www/pkt/application/controllers/Student.php 248
ERROR - 2021-08-13 12:31:04 --> Severity: Warning --> Creating default object from empty value /home/tomatoferret18/www/pkt/application/controllers/Student.php 248
ERROR - 2021-08-13 12:31:04 --> Severity: Warning --> Invalid argument supplied for foreach() /home/tomatoferret18/www/pkt/application/views/auth/course_detail.php 88
ERROR - 2021-08-13 12:32:08 --> Severity: Notice --> Trying to get property 'class_date' of non-object /home/tomatoferret18/www/pkt/application/controllers/Student.php 248
ERROR - 2021-08-13 12:32:08 --> Severity: Warning --> Creating default object from empty value /home/tomatoferret18/www/pkt/application/controllers/Student.php 248
ERROR - 2021-08-13 12:32:08 --> Severity: Warning --> Invalid argument supplied for foreach() /home/tomatoferret18/www/pkt/application/views/auth/course_detail.php 88
ERROR - 2021-08-13 12:40:37 --> Severity: Notice --> Undefined property: stdClass::$calendar_day /home/tomatoferret18/www/pkt/application/views/auth/course_detail.php 88
ERROR - 2021-08-13 12:40:37 --> Severity: Warning --> Invalid argument supplied for foreach() /home/tomatoferret18/www/pkt/application/views/auth/course_detail.php 88
ERROR - 2021-08-13 12:41:36 --> Severity: Notice --> Trying to get property 'class_date' of non-object /home/tomatoferret18/www/pkt/application/controllers/Student.php 249
ERROR - 2021-08-13 12:41:36 --> Severity: Warning --> Creating default object from empty value /home/tomatoferret18/www/pkt/application/controllers/Student.php 249
ERROR - 2021-08-13 12:41:36 --> Severity: Warning --> Invalid argument supplied for foreach() /home/tomatoferret18/www/pkt/application/views/auth/course_detail.php 88
ERROR - 2021-08-13 12:41:52 --> Severity: Notice --> Trying to get property 'class_date' of non-object /home/tomatoferret18/www/pkt/application/controllers/Student.php 248
ERROR - 2021-08-13 12:41:52 --> Severity: Notice --> Trying to get property 'class_date' of non-object /home/tomatoferret18/www/pkt/application/controllers/Student.php 249
ERROR - 2021-08-13 12:41:52 --> Severity: Warning --> Creating default object from empty value /home/tomatoferret18/www/pkt/application/controllers/Student.php 249
ERROR - 2021-08-13 12:41:52 --> Severity: Warning --> Invalid argument supplied for foreach() /home/tomatoferret18/www/pkt/application/views/auth/course_detail.php 88
ERROR - 2021-08-13 12:47:01 --> Severity: Notice --> Trying to get property 'class_date' of non-object /home/tomatoferret18/www/pkt/application/controllers/Student.php 248
ERROR - 2021-08-13 12:47:01 --> Severity: Notice --> Trying to get property 'class_date' of non-object /home/tomatoferret18/www/pkt/application/controllers/Student.php 249
ERROR - 2021-08-13 12:47:01 --> Severity: Warning --> Creating default object from empty value /home/tomatoferret18/www/pkt/application/controllers/Student.php 249
ERROR - 2021-08-13 12:47:01 --> Severity: Warning --> Invalid argument supplied for foreach() /home/tomatoferret18/www/pkt/application/views/auth/course_detail.php 88
ERROR - 2021-08-13 15:17:40 --> 404 Page Not Found: Adm/portal
ERROR - 2021-08-13 12:52:02 --> Severity: Notice --> Trying to get property 'class_date' of non-object /home/tomatoferret18/www/pkt/application/controllers/Student.php 248
ERROR - 2021-08-13 12:52:02 --> Severity: Notice --> Trying to get property 'class_date' of non-object /home/tomatoferret18/www/pkt/application/controllers/Student.php 249
ERROR - 2021-08-13 12:52:02 --> Severity: Warning --> Creating default object from empty value /home/tomatoferret18/www/pkt/application/controllers/Student.php 249
ERROR - 2021-08-13 12:52:02 --> Severity: Warning --> Invalid argument supplied for foreach() /home/tomatoferret18/www/pkt/application/views/auth/course_detail.php 88
ERROR - 2021-08-13 12:52:17 --> Severity: Notice --> Trying to get property 'class_date' of non-object /home/tomatoferret18/www/pkt/application/controllers/Student.php 248
ERROR - 2021-08-13 12:52:17 --> Severity: Notice --> Trying to get property 'class_date' of non-object /home/tomatoferret18/www/pkt/application/controllers/Student.php 249
ERROR - 2021-08-13 12:52:17 --> Severity: Warning --> Creating default object from empty value /home/tomatoferret18/www/pkt/application/controllers/Student.php 249
ERROR - 2021-08-13 12:52:17 --> Severity: Warning --> Invalid argument supplied for foreach() /home/tomatoferret18/www/pkt/application/views/auth/course_detail.php 88
ERROR - 2021-08-13 12:53:13 --> Severity: Notice --> Trying to get property 'class_date' of non-object /home/tomatoferret18/www/pkt/application/controllers/Student.php 248
ERROR - 2021-08-13 12:53:13 --> Severity: Notice --> Trying to get property 'class_date' of non-object /home/tomatoferret18/www/pkt/application/controllers/Student.php 249
ERROR - 2021-08-13 12:53:13 --> Severity: Warning --> Creating default object from empty value /home/tomatoferret18/www/pkt/application/controllers/Student.php 249
ERROR - 2021-08-13 12:53:13 --> Severity: Warning --> Invalid argument supplied for foreach() /home/tomatoferret18/www/pkt/application/views/auth/course_detail.php 88
