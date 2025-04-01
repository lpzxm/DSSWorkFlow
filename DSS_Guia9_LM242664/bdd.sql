create database IF NOT EXISTS `rest_api_demo`;
use `rest_api_demo`;

CREATE TABLE `users` (
  `user_id` int(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0'
);

insert into `users` values
(null,'bob','bob@mail.com',0),	
(null,'john','john@mail.com',1),	
(null,'mark','mark@mail.com',0),	
(null,'ville','ville@mail.com',0)	
