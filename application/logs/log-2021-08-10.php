<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-08-10 09:29:58 --> Query error: Unknown column 'start_time' in 'field list' - Invalid query: SELECT `OSL_std_course`.`id`, `std_id`, `bat_id`, `cos_id`, `OSL_std_course`.`activate_date`, `OSL_std_course`.`status`, `cos_title`, `cos_image`, `ref_key`, `batch_id`, `days`, `start_time`, `end_time`, `month_duration`, `day_duration`, `start_date`, `OSL_batch`.`released_date`, `slug_name`, `OSL_trainer`.`name` as `trainer`, `fees`
FROM `OSL_std_course`
LEFT JOIN `OSL_course` ON `OSL_course`.`id` = `OSL_std_course`.`cos_id`
LEFT JOIN `OSL_batch` ON `OSL_batch`.`id` = `OSL_std_course`.`bat_id`
LEFT JOIN `OSL_trainer` ON `OSL_trainer`.`id` = `OSL_batch`.`trainer_id`
WHERE `OSL_std_course`.`std_id` = '3'
ORDER BY `OSL_std_course`.`id` DESC
 LIMIT 4
ERROR - 2021-08-10 09:30:05 --> Query error: Unknown column 'start_time' in 'field list' - Invalid query: SELECT `OSL_std_course`.`id`, `std_id`, `bat_id`, `cos_id`, `OSL_std_course`.`activate_date`, `OSL_std_course`.`status`, `cos_title`, `cos_image`, `ref_key`, `batch_id`, `days`, `start_time`, `end_time`, `month_duration`, `day_duration`, `start_date`, `OSL_batch`.`released_date`, `slug_name`, `OSL_trainer`.`name` as `trainer`, `fees`
FROM `OSL_std_course`
LEFT JOIN `OSL_course` ON `OSL_course`.`id` = `OSL_std_course`.`cos_id`
LEFT JOIN `OSL_batch` ON `OSL_batch`.`id` = `OSL_std_course`.`bat_id`
LEFT JOIN `OSL_trainer` ON `OSL_trainer`.`id` = `OSL_batch`.`trainer_id`
WHERE `OSL_std_course`.`std_id` = '3'
ORDER BY `OSL_std_course`.`id` DESC
 LIMIT 4
ERROR - 2021-08-10 09:30:11 --> Query error: Unknown column 'start_time' in 'field list' - Invalid query: SELECT `OSL_std_course`.`id`, `std_id`, `bat_id`, `cos_id`, `OSL_std_course`.`activate_date`, `OSL_std_course`.`status`, `cos_title`, `cos_image`, `ref_key`, `batch_id`, `days`, `start_time`, `end_time`, `month_duration`, `day_duration`, `start_date`, `OSL_batch`.`released_date`, `slug_name`, `OSL_trainer`.`name` as `trainer`, `fees`
FROM `OSL_std_course`
LEFT JOIN `OSL_course` ON `OSL_course`.`id` = `OSL_std_course`.`cos_id`
LEFT JOIN `OSL_batch` ON `OSL_batch`.`id` = `OSL_std_course`.`bat_id`
LEFT JOIN `OSL_trainer` ON `OSL_trainer`.`id` = `OSL_batch`.`trainer_id`
WHERE `OSL_std_course`.`std_id` = '3'
ORDER BY `OSL_std_course`.`id` DESC
 LIMIT 4
ERROR - 2021-08-10 09:30:15 --> Query error: Unknown column 'start_time' in 'field list' - Invalid query: SELECT `OSL_std_course`.`id`, `std_id`, `bat_id`, `cos_id`, `OSL_std_course`.`activate_date`, `OSL_std_course`.`status`, `cos_title`, `cos_image`, `ref_key`, `batch_id`, `days`, `start_time`, `end_time`, `month_duration`, `day_duration`, `start_date`, `OSL_batch`.`released_date`, `slug_name`, `OSL_trainer`.`name` as `trainer`, `fees`
FROM `OSL_std_course`
LEFT JOIN `OSL_course` ON `OSL_course`.`id` = `OSL_std_course`.`cos_id`
LEFT JOIN `OSL_batch` ON `OSL_batch`.`id` = `OSL_std_course`.`bat_id`
LEFT JOIN `OSL_trainer` ON `OSL_trainer`.`id` = `OSL_batch`.`trainer_id`
WHERE `OSL_std_course`.`std_id` = '3'
ORDER BY `OSL_std_course`.`id` DESC
 LIMIT 4
ERROR - 2021-08-10 09:30:15 --> Query error: Unknown column 'start_time' in 'field list' - Invalid query: SELECT `OSL_std_course`.`id`, `std_id`, `bat_id`, `cos_id`, `OSL_std_course`.`activate_date`, `OSL_std_course`.`status`, `cos_title`, `cos_image`, `ref_key`, `batch_id`, `days`, `start_time`, `end_time`, `month_duration`, `day_duration`, `start_date`, `OSL_batch`.`released_date`, `slug_name`, `OSL_trainer`.`name` as `trainer`, `fees`
FROM `OSL_std_course`
LEFT JOIN `OSL_course` ON `OSL_course`.`id` = `OSL_std_course`.`cos_id`
LEFT JOIN `OSL_batch` ON `OSL_batch`.`id` = `OSL_std_course`.`bat_id`
LEFT JOIN `OSL_trainer` ON `OSL_trainer`.`id` = `OSL_batch`.`trainer_id`
WHERE `OSL_std_course`.`std_id` = '3'
ORDER BY `OSL_std_course`.`id` DESC
 LIMIT 4
ERROR - 2021-08-10 12:00:34 --> 404 Page Not Found: Adm/protal
ERROR - 2021-08-10 12:00:47 --> 404 Page Not Found: Admin/protal
ERROR - 2021-08-10 12:01:15 --> 404 Page Not Found: Adm/portal
ERROR - 2021-08-10 12:05:46 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 12:05:46 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 12:05:47 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 09:35:56 --> Query error: Unknown column 'month_duration' in 'field list' - Invalid query: SELECT `batch_id`, `fees`, `member`, `month_duration`, `day_duration`, `start_date`, `OSL_batch`.`released_date`, `OSL_batch`.`closed_date`, `OSL_batch`.`id`, `OSL_course`.`cos_title` as `title`, `OSL_course`.`ref_key`, `OSL_batch`.`status`
FROM `OSL_batch`
LEFT JOIN `OSL_course` ON `OSL_course`.`id` = `OSL_batch`.`course_id`
WHERE `ref_key` = 'online'
ORDER BY `OSL_batch`.`id` DESC
ERROR - 2021-08-10 12:16:15 --> 404 Page Not Found: Upload/assets
ERROR - 2021-08-10 12:16:16 --> 404 Page Not Found: Upload/assets
ERROR - 2021-08-10 12:16:34 --> 404 Page Not Found: Asset/images
ERROR - 2021-08-10 12:17:55 --> 404 Page Not Found: Upload/assets
ERROR - 2021-08-10 12:23:11 --> 404 Page Not Found: Admin/portal
ERROR - 2021-08-10 13:15:47 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 13:15:47 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 13:15:48 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 13:17:16 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 13:17:16 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 13:17:16 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 13:24:58 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 13:24:58 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 13:24:58 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:13:51 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:13:51 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:13:52 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:14:00 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:14:00 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:14:00 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:20:24 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:20:24 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:20:24 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:20:31 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:20:31 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:20:31 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:20:36 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:20:36 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:20:36 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:24:39 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:24:39 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:24:39 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:24:50 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:24:50 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:24:50 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:29:52 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:29:52 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:29:53 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:31:41 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:31:41 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:31:41 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:34:59 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:34:59 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:35:00 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:37:12 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:37:12 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:37:12 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:39:19 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:39:19 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:39:19 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:42:46 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:42:46 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:42:46 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:43:47 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:43:47 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 14:43:47 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:01:25 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:01:25 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:01:26 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:05:36 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:05:36 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:05:37 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:06:48 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:06:48 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:06:49 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:08:48 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:08:48 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:08:48 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:09:23 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:09:23 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:09:24 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:25:51 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:25:51 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:25:52 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:28:03 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:28:03 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:28:04 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:28:29 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:28:29 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:28:29 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:30:11 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:30:11 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:30:12 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 19:01:46 --> Severity: error --> Exception: syntax error, unexpected 'if' (T_IF) /home/tomatoferret18/www/pkt/application/views/dashboard/batch/edit.php 321
ERROR - 2021-08-10 19:02:11 --> Severity: error --> Exception: syntax error, unexpected 'if' (T_IF) /home/tomatoferret18/www/pkt/application/views/dashboard/batch/edit.php 321
ERROR - 2021-08-10 21:32:37 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:32:37 --> 404 Page Not Found: Asset/admin
ERROR - 2021-08-10 21:32:37 --> 404 Page Not Found: Asset/admin
