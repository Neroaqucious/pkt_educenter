<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-07-25 15:16:16 --> Query error: Unknown column 'lecture' in 'field list' - Invalid query: SELECT `OSL_batch`.`id`, `fees`, `days`, `times`, `duration`, `lecture`, `OSL_batch`.`status`, `OSL_batch`.`released_date`, `OSL_batch`.`closed_date`, `OSL_course`.`cos_des1`, `OSL_course`.`slug_name`, `OSL_course`.`cos_title`, `OSL_course`.`cos_image`, `OSL_course`.`ref_key`, `OSL_course`.`status` as `cos_status`, `OSL_level`.`name` as `level`, `OSL_trainer`.`name` as `trainer`
FROM `OSL_batch`
LEFT JOIN `OSL_course` ON `OSL_course`.`id` = `OSL_batch`.`course_id`
LEFT JOIN `OSL_trainer` ON `OSL_trainer`.`id` = `OSL_course`.`trainer_id`
LEFT JOIN `OSL_level` ON `OSL_level`.`id` = `OSL_course`.`level_id`
WHERE `OSL_course`.`status` = '1'
ERROR - 2021-07-25 15:16:16 --> Query error: Unknown column 'lecture' in 'field list' - Invalid query: SELECT `OSL_batch`.`id`, `fees`, `days`, `times`, `duration`, `lecture`, `OSL_batch`.`status`, `OSL_batch`.`released_date`, `OSL_batch`.`closed_date`, `OSL_course`.`cos_des1`, `OSL_course`.`slug_name`, `OSL_course`.`cos_title`, `OSL_course`.`cos_image`, `OSL_course`.`ref_key`, `OSL_course`.`status` as `cos_status`, `OSL_level`.`name` as `level`, `OSL_trainer`.`name` as `trainer`
FROM `OSL_batch`
LEFT JOIN `OSL_course` ON `OSL_course`.`id` = `OSL_batch`.`course_id`
LEFT JOIN `OSL_trainer` ON `OSL_trainer`.`id` = `OSL_course`.`trainer_id`
LEFT JOIN `OSL_level` ON `OSL_level`.`id` = `OSL_course`.`level_id`
WHERE `OSL_course`.`status` = '1'
ERROR - 2021-07-25 15:35:38 --> Query error: Unknown column 'lecture' in 'field list' - Invalid query: SELECT `OSL_batch`.`id`, `fees`, `days`, `times`, `duration`, `lecture`, `OSL_batch`.`status`, `OSL_batch`.`released_date`, `OSL_batch`.`closed_date`, `OSL_course`.`cos_des1`, `OSL_course`.`slug_name`, `OSL_course`.`cos_title`, `OSL_course`.`cos_image`, `OSL_course`.`ref_key`, `OSL_course`.`status` as `cos_status`, `OSL_level`.`name` as `level`, `OSL_trainer`.`name` as `trainer`
FROM `OSL_batch`
LEFT JOIN `OSL_course` ON `OSL_course`.`id` = `OSL_batch`.`course_id`
LEFT JOIN `OSL_trainer` ON `OSL_trainer`.`id` = `OSL_course`.`trainer_id`
LEFT JOIN `OSL_level` ON `OSL_level`.`id` = `OSL_course`.`level_id`
WHERE `OSL_course`.`status` = '1'
ERROR - 2021-07-25 15:35:38 --> Query error: Unknown column 'lecture' in 'field list' - Invalid query: SELECT `OSL_batch`.`id`, `fees`, `days`, `times`, `duration`, `lecture`, `OSL_batch`.`status`, `OSL_batch`.`released_date`, `OSL_batch`.`closed_date`, `OSL_course`.`cos_des1`, `OSL_course`.`slug_name`, `OSL_course`.`cos_title`, `OSL_course`.`cos_image`, `OSL_course`.`ref_key`, `OSL_course`.`status` as `cos_status`, `OSL_level`.`name` as `level`, `OSL_trainer`.`name` as `trainer`
FROM `OSL_batch`
LEFT JOIN `OSL_course` ON `OSL_course`.`id` = `OSL_batch`.`course_id`
LEFT JOIN `OSL_trainer` ON `OSL_trainer`.`id` = `OSL_course`.`trainer_id`
LEFT JOIN `OSL_level` ON `OSL_level`.`id` = `OSL_course`.`level_id`
WHERE `OSL_course`.`status` = '1'
ERROR - 2021-07-25 15:36:07 --> Query error: Unknown column 'OSL_course.trainer_id' in 'on clause' - Invalid query: SELECT `OSL_batch`.`id`, `fees`, `days`, `times`, `duration`, `OSL_batch`.`status`, `OSL_batch`.`released_date`, `OSL_batch`.`closed_date`, `OSL_course`.`cos_des1`, `OSL_course`.`slug_name`, `OSL_course`.`cos_title`, `OSL_course`.`cos_image`, `OSL_course`.`ref_key`, `OSL_course`.`status` as `cos_status`, `OSL_level`.`name` as `level`, `OSL_trainer`.`name` as `trainer`
FROM `OSL_batch`
LEFT JOIN `OSL_course` ON `OSL_course`.`id` = `OSL_batch`.`course_id`
LEFT JOIN `OSL_trainer` ON `OSL_trainer`.`id` = `OSL_course`.`trainer_id`
LEFT JOIN `OSL_level` ON `OSL_level`.`id` = `OSL_course`.`level_id`
WHERE `OSL_course`.`status` = '1'
ERROR - 2021-07-25 15:36:07 --> Query error: Unknown column 'OSL_course.trainer_id' in 'on clause' - Invalid query: SELECT `OSL_batch`.`id`, `fees`, `days`, `times`, `duration`, `OSL_batch`.`status`, `OSL_batch`.`released_date`, `OSL_batch`.`closed_date`, `OSL_course`.`cos_des1`, `OSL_course`.`slug_name`, `OSL_course`.`cos_title`, `OSL_course`.`cos_image`, `OSL_course`.`ref_key`, `OSL_course`.`status` as `cos_status`, `OSL_level`.`name` as `level`, `OSL_trainer`.`name` as `trainer`
FROM `OSL_batch`
LEFT JOIN `OSL_course` ON `OSL_course`.`id` = `OSL_batch`.`course_id`
LEFT JOIN `OSL_trainer` ON `OSL_trainer`.`id` = `OSL_course`.`trainer_id`
LEFT JOIN `OSL_level` ON `OSL_level`.`id` = `OSL_course`.`level_id`
WHERE `OSL_course`.`status` = '1'
ERROR - 2021-07-25 15:36:52 --> Query error: Table 'osl_pktedcuation_v_2.osl_new_tags' doesn't exist - Invalid query: SELECT *, `OSL_new`.`id` as `id`
FROM `OSL_new`
LEFT JOIN `OSL_new_tags` ON `OSL_new_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`status` = '1'
ERROR - 2021-07-25 15:36:52 --> Query error: Table 'osl_pktedcuation_v_2.osl_new_tags' doesn't exist - Invalid query: SELECT *, `OSL_new`.`id` as `id`
FROM `OSL_new`
LEFT JOIN `OSL_new_tags` ON `OSL_new_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`status` = '1'
ERROR - 2021-07-25 15:38:27 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:38:27 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:38:27 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:38:27 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:38:27 --> Severity: Notice --> Undefined variable: protfoTag /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 310
ERROR - 2021-07-25 15:38:27 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 310
ERROR - 2021-07-25 15:38:27 --> Severity: Notice --> Undefined variable: protfo /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 319
ERROR - 2021-07-25 15:38:27 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 319
ERROR - 2021-07-25 11:08:27 --> 404 Page Not Found: Upload/images
ERROR - 2021-07-25 11:08:27 --> 404 Page Not Found: Upload/images
ERROR - 2021-07-25 11:08:27 --> 404 Page Not Found: Upload/images
ERROR - 2021-07-25 11:08:27 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:08:27 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:08:27 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:08:27 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:08:27 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:08:27 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:08:27 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:08:27 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:08:32 --> 404 Page Not Found: Upload/images
ERROR - 2021-07-25 11:08:32 --> 404 Page Not Found: Upload/images
ERROR - 2021-07-25 11:08:32 --> 404 Page Not Found: Upload/images
ERROR - 2021-07-25 11:08:32 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:08:32 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:08:32 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 15:38:32 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:38:32 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:38:32 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:38:32 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:38:32 --> Severity: Notice --> Undefined variable: protfoTag /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 310
ERROR - 2021-07-25 15:38:32 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 310
ERROR - 2021-07-25 15:38:32 --> Severity: Notice --> Undefined variable: protfo /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 319
ERROR - 2021-07-25 15:38:32 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 319
ERROR - 2021-07-25 15:39:34 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:39:34 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:39:34 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:39:34 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 11:09:35 --> 404 Page Not Found: Upload/images
ERROR - 2021-07-25 11:09:35 --> 404 Page Not Found: Upload/images
ERROR - 2021-07-25 11:09:35 --> 404 Page Not Found: Upload/images
ERROR - 2021-07-25 11:09:35 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:09:35 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:09:35 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:09:35 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:09:35 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:09:35 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:09:35 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:09:35 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:09:35 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:09:36 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 15:39:36 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:39:36 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:39:36 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:39:36 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:40:07 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:40:07 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:40:07 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:40:07 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 11:10:08 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:10:08 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:10:08 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:10:08 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:10:08 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:10:08 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:10:08 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:10:08 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:10:08 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:10:08 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 15:40:08 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:40:08 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:40:08 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:40:08 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:43:05 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:43:05 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:43:05 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:43:05 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 11:13:10 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:13:10 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:13:10 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:13:10 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:13:10 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:13:10 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:13:10 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:13:10 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:13:10 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:13:10 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 15:43:11 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:43:11 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:43:11 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:43:11 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 158
ERROR - 2021-07-25 15:43:53 --> Severity: Notice --> Undefined property: stdClass::$batch_id /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 154
ERROR - 2021-07-25 15:43:53 --> Severity: Notice --> Undefined property: stdClass::$batch_id /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 154
ERROR - 2021-07-25 15:43:53 --> Severity: Notice --> Undefined property: stdClass::$batch_id /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 154
ERROR - 2021-07-25 15:43:53 --> Severity: Notice --> Undefined property: stdClass::$batch_id /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 154
ERROR - 2021-07-25 15:43:53 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 159
ERROR - 2021-07-25 15:43:53 --> Severity: Notice --> Undefined property: stdClass::$batch_id /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 154
ERROR - 2021-07-25 15:43:53 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 159
ERROR - 2021-07-25 15:43:53 --> Severity: Notice --> Undefined property: stdClass::$batch_id /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 154
ERROR - 2021-07-25 15:43:53 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 159
ERROR - 2021-07-25 15:43:53 --> Severity: Notice --> Undefined property: stdClass::$batch_id /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 154
ERROR - 2021-07-25 15:43:53 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 159
ERROR - 2021-07-25 11:13:53 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:13:53 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:13:53 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:13:53 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:13:53 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:13:53 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:13:53 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:13:53 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:13:53 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:13:53 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 15:43:54 --> Severity: Notice --> Undefined property: stdClass::$batch_id /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 154
ERROR - 2021-07-25 15:43:54 --> Severity: Notice --> Undefined property: stdClass::$batch_id /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 154
ERROR - 2021-07-25 15:43:54 --> Severity: Notice --> Undefined property: stdClass::$batch_id /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 154
ERROR - 2021-07-25 15:43:54 --> Severity: Notice --> Undefined property: stdClass::$batch_id /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 154
ERROR - 2021-07-25 15:43:54 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 159
ERROR - 2021-07-25 15:43:54 --> Severity: Notice --> Undefined property: stdClass::$batch_id /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 154
ERROR - 2021-07-25 15:43:54 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 159
ERROR - 2021-07-25 15:43:54 --> Severity: Notice --> Undefined property: stdClass::$batch_id /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 154
ERROR - 2021-07-25 15:43:54 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 159
ERROR - 2021-07-25 15:43:54 --> Severity: Notice --> Undefined property: stdClass::$batch_id /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 154
ERROR - 2021-07-25 15:43:54 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 159
ERROR - 2021-07-25 15:44:53 --> Severity: Notice --> Undefined index: lists /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/Home.php 35
ERROR - 2021-07-25 15:44:53 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/Home.php 35
ERROR - 2021-07-25 15:44:53 --> Severity: Notice --> Undefined index: lists /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/Home.php 35
ERROR - 2021-07-25 15:44:53 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/Home.php 35
ERROR - 2021-07-25 15:47:24 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 159
ERROR - 2021-07-25 15:47:24 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 159
ERROR - 2021-07-25 15:47:24 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 159
ERROR - 2021-07-25 15:47:24 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 159
ERROR - 2021-07-25 11:17:25 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:17:25 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:17:25 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:17:25 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:17:25 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:17:25 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:17:25 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:17:25 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:17:25 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:17:25 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 15:47:25 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 159
ERROR - 2021-07-25 15:47:25 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 159
ERROR - 2021-07-25 15:47:25 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 159
ERROR - 2021-07-25 15:47:25 --> Severity: Notice --> Undefined property: stdClass::$lecture /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/home.php 159
ERROR - 2021-07-25 11:18:37 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:18:37 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:18:37 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:18:37 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:18:37 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:18:37 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:18:37 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:18:37 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:18:37 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:18:37 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:18:59 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:18:59 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:18:59 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:18:59 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:18:59 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:18:59 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:18:59 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:18:59 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:18:59 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:18:59 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:19:16 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:19:16 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:19:16 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:19:16 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:19:16 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:19:16 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:19:16 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:19:16 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:19:16 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:19:16 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:19:34 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:19:34 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:19:34 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:19:34 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:19:34 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:19:34 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:19:34 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:19:34 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:19:34 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:19:34 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:19:49 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:19:49 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:19:49 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:19:49 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:19:49 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:19:49 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:19:49 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:19:49 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:19:49 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:19:49 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:21:35 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:21:35 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:21:35 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:21:35 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:21:35 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:21:36 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:21:36 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:21:36 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:21:36 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:21:36 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:21:54 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:21:54 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:21:54 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:21:54 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:21:54 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:21:54 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:21:54 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:21:54 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:21:54 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:21:54 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:22:18 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:22:18 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:22:18 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:22:18 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:22:18 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:22:18 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:22:18 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:22:18 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:22:18 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:22:18 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:22:51 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:22:51 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:22:51 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:22:51 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:22:51 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:22:51 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:22:51 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:22:51 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:22:51 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:22:51 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:22:56 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:22:56 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:22:56 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:22:56 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:22:56 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:22:56 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:22:56 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:22:56 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:22:56 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:22:56 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:23:32 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:23:52 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:23:52 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:23:52 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:23:52 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:23:52 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:23:52 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:23:52 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:23:52 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:23:52 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:23:52 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:24:21 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:24:21 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:24:21 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:24:21 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:24:21 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:24:21 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:24:21 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:24:21 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:24:21 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:25:15 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:25:15 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:25:15 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:25:15 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:25:15 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:25:15 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:25:15 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:25:15 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:25:15 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:26:00 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:26:00 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:26:00 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:26:00 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:26:00 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:26:00 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:26:00 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:26:00 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:26:00 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:26:10 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:26:10 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:26:10 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:26:10 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:26:10 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:26:10 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:26:10 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:26:10 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:26:10 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:26:21 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:26:21 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:26:21 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:26:21 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:26:21 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:26:21 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:26:21 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:26:21 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:26:25 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:26:25 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:27:28 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:27:28 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:27:28 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:27:28 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:27:28 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:27:28 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:27:28 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:27:28 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:27:33 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:27:33 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:27:59 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:27:59 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:27:59 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:27:59 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:27:59 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:27:59 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:27:59 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:27:59 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:28:04 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:28:04 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:28:43 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:28:43 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:28:43 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:28:43 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:28:43 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:28:43 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:28:43 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:28:43 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:28:43 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:29:29 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:29:29 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:29:29 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:29:29 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:29:29 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:29:29 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:29:29 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:29:29 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:29:29 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:29:42 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:29:42 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:29:42 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:29:42 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:29:42 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:29:42 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:29:42 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:29:42 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:29:42 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:30:28 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:30:28 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:30:28 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:30:28 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:30:28 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:30:28 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:30:28 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:30:28 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:30:28 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:31:13 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:31:13 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:31:13 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:31:13 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:31:13 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:31:13 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:31:13 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:31:13 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:31:13 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:31:41 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:31:41 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:31:41 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:31:41 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:31:41 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:31:41 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:31:41 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:31:41 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:31:41 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:38:10 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:38:10 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:38:10 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:38:10 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:38:10 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:38:10 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:38:10 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:38:10 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:38:10 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:38:52 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:38:52 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:38:52 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:38:52 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:38:53 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:38:53 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:38:53 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:38:53 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:38:57 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:38:57 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:40:14 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:40:14 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:40:14 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:40:14 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:40:14 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:40:14 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:40:14 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:40:14 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:40:14 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:40:56 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:40:56 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:40:56 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:40:56 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:40:56 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:40:56 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:40:56 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:40:56 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:40:56 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:40:56 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:41:57 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:41:57 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:41:57 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:41:57 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:41:57 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:41:57 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:41:57 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:41:57 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:41:57 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:42:29 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:42:29 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:42:29 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:42:29 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:42:29 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:42:29 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:42:29 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:42:29 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:42:29 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:42:43 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:42:43 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:42:43 --> 404 Page Not Found: Upload/trainer
ERROR - 2021-07-25 11:42:43 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:42:43 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:42:43 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:42:43 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:42:43 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:42:43 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:43:47 --> 404 Page Not Found: Upload/assets
ERROR - 2021-07-25 11:43:47 --> 404 Page Not Found: Upload/assets
ERROR - 2021-07-25 11:43:47 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:43:47 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:43:47 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:43:47 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:43:47 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:43:52 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:43:52 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:44:18 --> 404 Page Not Found: Upload/assets
ERROR - 2021-07-25 11:44:20 --> 404 Page Not Found: Upload/assets
ERROR - 2021-07-25 11:46:19 --> 404 Page Not Found: Upload/assets
ERROR - 2021-07-25 11:46:21 --> 404 Page Not Found: Upload/assets
ERROR - 2021-07-25 11:46:33 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:46:33 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:46:33 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:46:33 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:46:33 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:46:37 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:46:37 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:47:17 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:47:17 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:47:18 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:47:18 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:47:18 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:47:22 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:47:22 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:47:53 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:47:53 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:47:53 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:47:53 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:47:53 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:47:53 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:49:21 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:49:21 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:49:21 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:49:21 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:49:21 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:49:21 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:50:48 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:50:48 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:50:48 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:50:48 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:50:48 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:50:48 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:51:08 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:51:08 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:51:08 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:51:08 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:51:08 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 11:51:08 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:55:54 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:58:31 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:58:58 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:59:24 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 11:59:55 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 12:01:13 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 12:04:58 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 12:05:16 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 12:05:46 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 12:06:41 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 12:06:55 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 16:44:50 --> Query error: Table 'osl_pktedcuation_v_2.osl_new_tags' doesn't exist - Invalid query: SELECT `OSL_new`.`id`, `OSL_new`.`title`, `OSL_new`.`content`, `OSL_new`.`photo`, `OSL_new`.`upload_date`, `OSL_new`.`status`, `OSL_new_tags`.`name`
FROM `OSL_new`
LEFT JOIN `OSL_new_tags` ON `OSL_new_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`id` = '6'
ERROR - 2021-07-25 16:44:51 --> Query error: Table 'osl_pktedcuation_v_2.osl_new_tags' doesn't exist - Invalid query: SELECT `OSL_new`.`id`, `OSL_new`.`title`, `OSL_new`.`content`, `OSL_new`.`photo`, `OSL_new`.`upload_date`, `OSL_new`.`status`, `OSL_new_tags`.`name`
FROM `OSL_new`
LEFT JOIN `OSL_new_tags` ON `OSL_new_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`id` = '6'
ERROR - 2021-07-25 16:44:56 --> Query error: Table 'osl_pktedcuation_v_2.osl_new_tags' doesn't exist - Invalid query: SELECT `OSL_new`.`id`, `OSL_new`.`title`, `OSL_new`.`content`, `OSL_new`.`photo`, `OSL_new`.`upload_date`, `OSL_new`.`status`, `OSL_new_tags`.`name`
FROM `OSL_new`
LEFT JOIN `OSL_new_tags` ON `OSL_new_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`status` = '1'
 LIMIT 4
ERROR - 2021-07-25 16:44:56 --> Query error: Table 'osl_pktedcuation_v_2.osl_new_tags' doesn't exist - Invalid query: SELECT `OSL_new`.`id`, `OSL_new`.`title`, `OSL_new`.`content`, `OSL_new`.`photo`, `OSL_new`.`upload_date`, `OSL_new`.`status`, `OSL_new_tags`.`name`
FROM `OSL_new`
LEFT JOIN `OSL_new_tags` ON `OSL_new_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`status` = '1'
 LIMIT 4
ERROR - 2021-07-25 16:45:03 --> Query error: Table 'osl_pktedcuation_v_2.osl_new_tags' doesn't exist - Invalid query: SELECT `OSL_new`.`id`, `OSL_new`.`title`, `OSL_new`.`content`, `OSL_new`.`photo`, `OSL_new`.`upload_date`, `OSL_new`.`status`, `OSL_new_tags`.`name`
FROM `OSL_new`
LEFT JOIN `OSL_new_tags` ON `OSL_new_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`status` = '1'
 LIMIT 4
ERROR - 2021-07-25 16:45:03 --> Query error: Table 'osl_pktedcuation_v_2.osl_new_tags' doesn't exist - Invalid query: SELECT `OSL_new`.`id`, `OSL_new`.`title`, `OSL_new`.`content`, `OSL_new`.`photo`, `OSL_new`.`upload_date`, `OSL_new`.`status`, `OSL_new_tags`.`name`
FROM `OSL_new`
LEFT JOIN `OSL_new_tags` ON `OSL_new_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`status` = '1'
 LIMIT 4
ERROR - 2021-07-25 12:17:14 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 12:17:14 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 12:18:40 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 12:20:24 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 16:50:34 --> Query error: Table 'osl_pktedcuation_v_2.osl_new_tags' doesn't exist - Invalid query: SELECT `OSL_new`.`id`, `OSL_new`.`title`, `OSL_new`.`content`, `OSL_new`.`photo`, `OSL_new`.`upload_date`, `OSL_new`.`status`, `OSL_new_tags`.`name`
FROM `OSL_new`
LEFT JOIN `OSL_new_tags` ON `OSL_new_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`status` = '1'
 LIMIT 4
ERROR - 2021-07-25 16:50:34 --> Query error: Table 'osl_pktedcuation_v_2.osl_new_tags' doesn't exist - Invalid query: SELECT `OSL_new`.`id`, `OSL_new`.`title`, `OSL_new`.`content`, `OSL_new`.`photo`, `OSL_new`.`upload_date`, `OSL_new`.`status`, `OSL_new_tags`.`name`
FROM `OSL_new`
LEFT JOIN `OSL_new_tags` ON `OSL_new_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`status` = '1'
 LIMIT 4
ERROR - 2021-07-25 16:58:16 --> Severity: error --> Exception: Call to undefined method News::__preSessionDataSet() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 24
ERROR - 2021-07-25 16:58:16 --> Severity: error --> Exception: Call to undefined method News::__preSessionDataSet() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 24
ERROR - 2021-07-25 16:58:45 --> Query error: Unknown column 'OSL_new.upload_date' in 'field list' - Invalid query: SELECT `OSL_new`.`id`, `OSL_new`.`title`, `OSL_new`.`content`, `OSL_new`.`photo`, `OSL_new`.`upload_date`, `OSL_new`.`status`, `OSL_new_tags`.`name`
FROM `OSL_new`
LEFT JOIN `OSL_tags` ON `OSL_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`status` = '1'
 LIMIT 4
ERROR - 2021-07-25 16:58:45 --> Query error: Unknown column 'OSL_new.upload_date' in 'field list' - Invalid query: SELECT `OSL_new`.`id`, `OSL_new`.`title`, `OSL_new`.`content`, `OSL_new`.`photo`, `OSL_new`.`upload_date`, `OSL_new`.`status`, `OSL_new_tags`.`name`
FROM `OSL_new`
LEFT JOIN `OSL_tags` ON `OSL_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`status` = '1'
 LIMIT 4
ERROR - 2021-07-25 16:59:23 --> Query error: Unknown column 'OSL_new_tags.name' in 'field list' - Invalid query: SELECT `OSL_new`.`id`, `OSL_new`.`title`, `OSL_new`.`content`, `OSL_new`.`photo`, `OSL_new`.`updated_at`, `OSL_new`.`status`, `OSL_new_tags`.`name`
FROM `OSL_new`
LEFT JOIN `OSL_tags` ON `OSL_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`status` = '1'
 LIMIT 4
ERROR - 2021-07-25 16:59:24 --> Query error: Unknown column 'OSL_new_tags.name' in 'field list' - Invalid query: SELECT `OSL_new`.`id`, `OSL_new`.`title`, `OSL_new`.`content`, `OSL_new`.`photo`, `OSL_new`.`updated_at`, `OSL_new`.`status`, `OSL_new_tags`.`name`
FROM `OSL_new`
LEFT JOIN `OSL_tags` ON `OSL_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`status` = '1'
 LIMIT 4
ERROR - 2021-07-25 16:59:37 --> Query error: Unknown column 'OSL_new_tags.name' in 'field list' - Invalid query: SELECT `OSL_new`.`id`, `OSL_new`.`title`, `OSL_new`.`content`, `OSL_new`.`photo`, `OSL_new`.`updated_at`, `OSL_new`.`status`, `OSL_new_tags`.`name`
FROM `OSL_new`
LEFT JOIN `OSL_tags` ON `OSL_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`status` = '1'
 LIMIT 4
ERROR - 2021-07-25 16:59:37 --> Query error: Unknown column 'OSL_new_tags.name' in 'field list' - Invalid query: SELECT `OSL_new`.`id`, `OSL_new`.`title`, `OSL_new`.`content`, `OSL_new`.`photo`, `OSL_new`.`updated_at`, `OSL_new`.`status`, `OSL_new_tags`.`name`
FROM `OSL_new`
LEFT JOIN `OSL_tags` ON `OSL_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`status` = '1'
 LIMIT 4
ERROR - 2021-07-25 16:59:39 --> Query error: Unknown column 'OSL_new_tags.name' in 'field list' - Invalid query: SELECT `OSL_new`.`id`, `OSL_new`.`title`, `OSL_new`.`content`, `OSL_new`.`photo`, `OSL_new`.`updated_at`, `OSL_new`.`status`, `OSL_new_tags`.`name`
FROM `OSL_new`
LEFT JOIN `OSL_tags` ON `OSL_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`status` = '1'
 LIMIT 4
ERROR - 2021-07-25 16:59:39 --> Query error: Unknown column 'OSL_new_tags.name' in 'field list' - Invalid query: SELECT `OSL_new`.`id`, `OSL_new`.`title`, `OSL_new`.`content`, `OSL_new`.`photo`, `OSL_new`.`updated_at`, `OSL_new`.`status`, `OSL_new_tags`.`name`
FROM `OSL_new`
LEFT JOIN `OSL_tags` ON `OSL_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`status` = '1'
 LIMIT 4
ERROR - 2021-07-25 16:59:44 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 16:59:44 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 16:59:44 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 16:59:44 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 12:29:44 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:29:44 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:29:44 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:29:44 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 16:59:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 16:59:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 16:59:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 16:59:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 16:59:55 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 16:59:55 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 12:29:55 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:29:55 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 16:59:55 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 16:59:55 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 16:59:57 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 16:59:57 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 16:59:57 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 16:59:57 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 12:29:57 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:29:57 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:29:57 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 16:59:57 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 16:59:57 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 16:59:57 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 16:59:57 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Trying to access array offset on value of type null /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 61
ERROR - 2021-07-25 17:01:40 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 61
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Undefined variable: title /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/html head.php 14
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 63
ERROR - 2021-07-25 17:01:40 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:01:40 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 64
ERROR - 2021-07-25 17:01:40 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:01:40 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 65
ERROR - 2021-07-25 17:01:40 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:01:40 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 71
ERROR - 2021-07-25 17:01:40 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:01:40 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 72
ERROR - 2021-07-25 17:01:40 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:01:40 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 73
ERROR - 2021-07-25 17:01:40 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:01:40 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/breadcrumbs.php 12
ERROR - 2021-07-25 17:01:40 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/breadcrumbs.php 12
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:01:40 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 12:31:40 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:31:40 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:31:40 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:31:45 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Trying to access array offset on value of type null /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 61
ERROR - 2021-07-25 17:01:45 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 61
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Undefined variable: title /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/html head.php 14
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 63
ERROR - 2021-07-25 17:01:45 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:01:45 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 64
ERROR - 2021-07-25 17:01:45 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:01:45 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 65
ERROR - 2021-07-25 17:01:45 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:01:45 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 71
ERROR - 2021-07-25 17:01:45 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:01:45 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 72
ERROR - 2021-07-25 17:01:45 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:01:45 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 73
ERROR - 2021-07-25 17:01:45 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:01:45 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/breadcrumbs.php 12
ERROR - 2021-07-25 17:01:45 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/breadcrumbs.php 12
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:01:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:02:06 --> Severity: error --> Exception: Argument 2 passed to Mainconfig::_ArrayDataMarge() must be of the type array, null given, called in /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php on line 61 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/libraries/Mainconfig.php 37
ERROR - 2021-07-25 17:02:06 --> Severity: error --> Exception: Argument 2 passed to Mainconfig::_ArrayDataMarge() must be of the type array, null given, called in /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php on line 61 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/libraries/Mainconfig.php 37
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: data /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 65
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: title /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/html head.php 14
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 63
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 64
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 65
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 71
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 72
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 73
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/breadcrumbs.php 12
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/breadcrumbs.php 12
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: lists /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 9
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 9
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: pagination /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 37
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: data /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 65
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: title /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/html head.php 14
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 63
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 64
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 65
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 71
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 72
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 73
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/breadcrumbs.php 12
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/breadcrumbs.php 12
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: lists /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 9
ERROR - 2021-07-25 17:02:30 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 9
ERROR - 2021-07-25 17:02:30 --> Severity: Notice --> Undefined variable: pagination /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 37
ERROR - 2021-07-25 17:02:40 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:02:40 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:02:40 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:02:40 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 12:32:40 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:32:40 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:32:40 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 17:02:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:02:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:02:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:02:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:03:11 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:03:11 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:03:11 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:03:11 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:03:11 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:03:11 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:03:11 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:03:11 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news.php 17
ERROR - 2021-07-25 17:05:14 --> Query error: Unknown column 'OSL_new.upload_date' in 'field list' - Invalid query: SELECT `OSL_new`.`id`, `OSL_new`.`title`, `OSL_new`.`content`, `OSL_new`.`photo`, `OSL_new`.`upload_date`, `OSL_new`.`status`, `OSL_tags`.`name`
FROM `OSL_new`
LEFT JOIN `OSL_tags` ON `OSL_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`id` = '6'
ERROR - 2021-07-25 17:05:14 --> Query error: Unknown column 'OSL_new.upload_date' in 'field list' - Invalid query: SELECT `OSL_new`.`id`, `OSL_new`.`title`, `OSL_new`.`content`, `OSL_new`.`photo`, `OSL_new`.`upload_date`, `OSL_new`.`status`, `OSL_tags`.`name`
FROM `OSL_new`
LEFT JOIN `OSL_tags` ON `OSL_tags`.`id` = `OSL_new`.`tags_id`
WHERE `OSL_new`.`id` = '6'
ERROR - 2021-07-25 17:05:30 --> Severity: error --> Exception: Call to undefined method News::limit_text() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 84
ERROR - 2021-07-25 17:05:30 --> Severity: error --> Exception: Call to undefined method News::limit_text() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 84
ERROR - 2021-07-25 17:06:01 --> Severity: Notice --> Trying to access array offset on value of type null /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 82
ERROR - 2021-07-25 17:06:01 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 82
ERROR - 2021-07-25 17:06:01 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 19
ERROR - 2021-07-25 17:06:01 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:06:01 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:06:01 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:06:01 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:06:01 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 12:36:02 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:36:02 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:36:02 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:36:02 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:36:02 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:36:02 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 17:06:07 --> Severity: Notice --> Trying to access array offset on value of type null /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 82
ERROR - 2021-07-25 17:06:07 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 82
ERROR - 2021-07-25 17:06:07 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 19
ERROR - 2021-07-25 17:06:07 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:06:07 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:06:07 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:06:07 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:06:07 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Trying to access array offset on value of type null /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 82
ERROR - 2021-07-25 17:06:58 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 82
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined variable: title /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/html head.php 14
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 63
ERROR - 2021-07-25 17:06:58 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:06:58 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 64
ERROR - 2021-07-25 17:06:58 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:06:58 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 65
ERROR - 2021-07-25 17:06:58 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:06:58 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 71
ERROR - 2021-07-25 17:06:58 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:06:58 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 72
ERROR - 2021-07-25 17:06:58 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:06:58 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 73
ERROR - 2021-07-25 17:06:58 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:06:58 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/breadcrumbs.php 12
ERROR - 2021-07-25 17:06:58 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/breadcrumbs.php 12
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined variable: result /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 15
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Trying to get property 'photo' of non-object /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 15
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined variable: result /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 18
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Trying to get property 'name' of non-object /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 18
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined variable: result /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 19
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Trying to get property 'upload_date' of non-object /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 19
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined variable: result /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 24
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Trying to get property 'title' of non-object /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 24
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined variable: result /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 25
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Trying to get property 'content' of non-object /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 25
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Undefined variable: recent /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 21
ERROR - 2021-07-25 17:06:58 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 21
ERROR - 2021-07-25 17:06:58 --> Severity: Notice --> Trying to access array offset on value of type null /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 82
ERROR - 2021-07-25 17:06:58 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 82
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Trying to access array offset on value of type null /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 82
ERROR - 2021-07-25 17:07:03 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php 82
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined variable: title /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/html head.php 14
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 63
ERROR - 2021-07-25 17:07:03 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:07:03 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 64
ERROR - 2021-07-25 17:07:03 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:07:03 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 65
ERROR - 2021-07-25 17:07:03 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:07:03 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 71
ERROR - 2021-07-25 17:07:03 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:07:03 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 72
ERROR - 2021-07-25 17:07:03 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:07:03 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/header.php 73
ERROR - 2021-07-25 17:07:03 --> Severity: Warning --> array_keys() expects parameter 1 to be array, null given /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 5
ERROR - 2021-07-25 17:07:03 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 6
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined offset: 0 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/function.php 9
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined variable: pass /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/breadcrumbs.php 12
ERROR - 2021-07-25 17:07:03 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/breadcrumbs.php 12
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined variable: result /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 15
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Trying to get property 'photo' of non-object /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 15
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined variable: result /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 18
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Trying to get property 'name' of non-object /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 18
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined variable: result /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 19
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Trying to get property 'upload_date' of non-object /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 19
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined variable: result /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 24
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Trying to get property 'title' of non-object /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 24
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined variable: result /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 25
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Trying to get property 'content' of non-object /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 25
ERROR - 2021-07-25 17:07:03 --> Severity: Notice --> Undefined variable: recent /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 21
ERROR - 2021-07-25 17:07:03 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 21
ERROR - 2021-07-25 17:07:35 --> Severity: error --> Exception: Argument 2 passed to Mainconfig::_ArrayDataMarge() must be of the type array, null given, called in /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php on line 80 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/libraries/Mainconfig.php 37
ERROR - 2021-07-25 17:07:36 --> Severity: error --> Exception: Argument 2 passed to Mainconfig::_ArrayDataMarge() must be of the type array, null given, called in /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/News.php on line 80 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/libraries/Mainconfig.php 37
ERROR - 2021-07-25 17:08:13 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 19
ERROR - 2021-07-25 17:08:13 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:08:13 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:08:13 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:08:13 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:08:13 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 12:38:13 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:38:13 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:38:13 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:38:13 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:38:13 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:38:13 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 17:08:14 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 19
ERROR - 2021-07-25 17:08:14 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:08:14 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:08:14 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:08:14 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:08:14 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:08:47 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 19
ERROR - 2021-07-25 17:08:47 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:08:47 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:08:47 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:08:47 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:08:47 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 12:38:48 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:38:48 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:38:48 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:38:48 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:38:52 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 17:08:53 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 19
ERROR - 2021-07-25 17:08:53 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:08:53 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:08:53 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:08:53 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:08:53 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:09:16 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 21
ERROR - 2021-07-25 17:09:16 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:09:16 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:09:16 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:09:16 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:09:16 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 12:39:16 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:39:16 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:39:16 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:39:16 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:39:21 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 17:09:21 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/news_detail.php 21
ERROR - 2021-07-25 17:09:21 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:09:21 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:09:21 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:09:21 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:09:21 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:09:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:09:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:09:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:09:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:09:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 12:39:45 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:39:45 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:39:45 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:39:45 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:39:45 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 17:09:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:09:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:09:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:09:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:09:45 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 30
ERROR - 2021-07-25 17:10:02 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 21
ERROR - 2021-07-25 17:10:02 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 21
ERROR - 2021-07-25 17:10:02 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 21
ERROR - 2021-07-25 17:10:02 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 21
ERROR - 2021-07-25 17:10:02 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 21
ERROR - 2021-07-25 12:40:03 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:40:03 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:40:03 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:40:03 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 12:40:07 --> 404 Page Not Found: Upload/other
ERROR - 2021-07-25 17:10:08 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 21
ERROR - 2021-07-25 17:10:08 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 21
ERROR - 2021-07-25 17:10:08 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 21
ERROR - 2021-07-25 17:10:08 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 21
ERROR - 2021-07-25 17:10:08 --> Severity: Notice --> Undefined property: stdClass::$upload_date /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/template/sidebar_new.php 21
ERROR - 2021-07-25 13:34:50 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 13:44:12 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 18:16:25 --> Severity: Notice --> Undefined property: Aboutus::$Home_Model /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/Aboutus.php 31
ERROR - 2021-07-25 18:16:25 --> Severity: error --> Exception: Call to a member function getTrainer() on null /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/Aboutus.php 31
ERROR - 2021-07-25 18:16:25 --> Severity: Notice --> Undefined property: Aboutus::$Home_Model /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/Aboutus.php 31
ERROR - 2021-07-25 18:16:25 --> Severity: error --> Exception: Call to a member function getTrainer() on null /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/Aboutus.php 31
ERROR - 2021-07-25 18:17:40 --> Severity: Notice --> Undefined property: Aboutus::$db6 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/system/core/Model.php 73
ERROR - 2021-07-25 18:17:40 --> Severity: Notice --> Undefined property: Aboutus::$db6 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/system/core/Model.php 73
ERROR - 2021-07-25 18:17:40 --> Query error: No tables used - Invalid query: SELECT *
WHERE `OSL_`.`status` = '1'
ERROR - 2021-07-25 18:17:40 --> Severity: Notice --> Undefined property: Aboutus::$db6 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/system/core/Model.php 73
ERROR - 2021-07-25 18:17:40 --> Severity: Notice --> Undefined property: Aboutus::$db6 /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/system/core/Model.php 73
ERROR - 2021-07-25 18:17:40 --> Query error: No tables used - Invalid query: SELECT *
WHERE `OSL_`.`status` = '1'
ERROR - 2021-07-25 13:48:06 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 13:49:47 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 13:50:19 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 18:24:42 --> Severity: Notice --> Undefined variable: course /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/aboutus.php 41
ERROR - 2021-07-25 18:24:42 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/aboutus.php 41
ERROR - 2021-07-25 13:54:42 --> 404 Page Not Found: Asset/images
ERROR - 2021-07-25 18:24:42 --> Severity: Notice --> Undefined variable: course /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/aboutus.php 41
ERROR - 2021-07-25 18:24:42 --> Severity: Warning --> Invalid argument supplied for foreach() /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/views/page/aboutus.php 41
ERROR - 2021-07-25 18:44:08 --> Severity: Notice --> Undefined property: Contactus::$form_validation /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/Contactus.php 36
ERROR - 2021-07-25 18:44:08 --> Severity: error --> Exception: Call to a member function set_rules() on null /Applications/XAMPP/xamppfiles/htdocs/pkt2.0/application/controllers/Contactus.php 36
ERROR - 2021-07-25 14:14:35 --> Unable to load the requested class: Validation
ERROR - 2021-07-25 14:14:35 --> Unable to load the requested class: Validation
ERROR - 2021-07-25 14:14:35 --> Unable to load the requested class: Validation
ERROR - 2021-07-25 14:14:36 --> Unable to load the requested class: Validation
ERROR - 2021-07-25 14:14:37 --> Unable to load the requested class: Validation
ERROR - 2021-07-25 14:14:37 --> Unable to load the requested class: Validation
ERROR - 2021-07-25 14:14:41 --> Unable to load the requested class: Validation
ERROR - 2021-07-25 14:14:41 --> Unable to load the requested class: Validation
ERROR - 2021-07-25 14:14:43 --> Unable to load the requested class: Validation
ERROR - 2021-07-25 14:14:43 --> Unable to load the requested class: Validation
ERROR - 2021-07-25 14:15:33 --> 404 Page Not Found: Adm/feedback
ERROR - 2021-07-25 14:15:33 --> 404 Page Not Found: Adm/feedback
ERROR - 2021-07-25 14:17:24 --> 404 Page Not Found: Asset/admin
ERROR - 2021-07-25 14:17:24 --> 404 Page Not Found: Asset/admin
ERROR - 2021-07-25 14:17:24 --> 404 Page Not Found: Asset/admin
ERROR - 2021-07-25 14:17:26 --> 404 Page Not Found: Asset/admin
ERROR - 2021-07-25 14:17:26 --> 404 Page Not Found: Asset/admin
ERROR - 2021-07-25 14:17:26 --> 404 Page Not Found: Asset/admin
ERROR - 2021-07-25 14:18:14 --> 404 Page Not Found: Asset/admin
ERROR - 2021-07-25 14:18:14 --> 404 Page Not Found: Asset/admin
ERROR - 2021-07-25 14:18:14 --> 404 Page Not Found: Asset/admin
ERROR - 2021-07-25 21:34:58 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No such file or directory /home/tomatoferret18/www/pkt/system/database/drivers/mysqli/mysqli_driver.php 203
ERROR - 2021-07-25 21:34:58 --> Unable to connect to the database
ERROR - 2021-07-25 21:34:58 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No such file or directory /home/tomatoferret18/www/pkt/system/database/drivers/mysqli/mysqli_driver.php 203
ERROR - 2021-07-25 21:34:58 --> Unable to connect to the database
ERROR - 2021-07-25 21:40:57 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No such file or directory /home/tomatoferret18/www/pkt/system/database/drivers/mysqli/mysqli_driver.php 203
ERROR - 2021-07-25 21:40:57 --> Unable to connect to the database
ERROR - 2021-07-25 21:40:59 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No such file or directory /home/tomatoferret18/www/pkt/system/database/drivers/mysqli/mysqli_driver.php 203
ERROR - 2021-07-25 21:40:59 --> Unable to connect to the database
ERROR - 2021-07-25 21:41:06 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No such file or directory /home/tomatoferret18/www/pkt/system/database/drivers/mysqli/mysqli_driver.php 203
ERROR - 2021-07-25 21:41:06 --> Unable to connect to the database
ERROR - 2021-07-25 21:41:08 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No such file or directory /home/tomatoferret18/www/pkt/system/database/drivers/mysqli/mysqli_driver.php 203
ERROR - 2021-07-25 21:41:08 --> Unable to connect to the database
ERROR - 2021-07-25 21:41:08 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No such file or directory /home/tomatoferret18/www/pkt/system/database/drivers/mysqli/mysqli_driver.php 203
ERROR - 2021-07-25 21:41:08 --> Unable to connect to the database
ERROR - 2021-07-25 21:41:34 --> Severity: Warning --> mysqli::real_connect(): php_network_getaddresses: getaddrinfo failed: hostname nor servname provided, or not known /home/tomatoferret18/www/pkt/system/database/drivers/mysqli/mysqli_driver.php 203
ERROR - 2021-07-25 21:41:34 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): php_network_getaddresses: getaddrinfo failed: hostname nor servname provided, or not known /home/tomatoferret18/www/pkt/system/database/drivers/mysqli/mysqli_driver.php 203
ERROR - 2021-07-25 21:41:34 --> Unable to connect to the database
ERROR - 2021-07-25 21:41:35 --> Severity: Warning --> mysqli::real_connect(): php_network_getaddresses: getaddrinfo failed: hostname nor servname provided, or not known /home/tomatoferret18/www/pkt/system/database/drivers/mysqli/mysqli_driver.php 203
ERROR - 2021-07-25 21:41:35 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): php_network_getaddresses: getaddrinfo failed: hostname nor servname provided, or not known /home/tomatoferret18/www/pkt/system/database/drivers/mysqli/mysqli_driver.php 203
ERROR - 2021-07-25 21:41:35 --> Unable to connect to the database
ERROR - 2021-07-25 21:57:57 --> 404 Page Not Found: Login/index
ERROR - 2021-07-25 21:58:00 --> 404 Page Not Found: Login/index
ERROR - 2021-07-25 22:04:29 --> Severity: 8192 --> Function mcrypt_get_iv_size() is deprecated /home/tomatoferret18/www/pkt/system/libraries/Encrypt.php 274
ERROR - 2021-07-25 22:04:29 --> Severity: 8192 --> Function mcrypt_create_iv() is deprecated /home/tomatoferret18/www/pkt/system/libraries/Encrypt.php 275
ERROR - 2021-07-25 22:04:29 --> Severity: 8192 --> Function mcrypt_encrypt() is deprecated /home/tomatoferret18/www/pkt/system/libraries/Encrypt.php 276
