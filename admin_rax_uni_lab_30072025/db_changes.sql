ALTER TABLE `rax_uni_newsletter` ADD `pdf_name` MEDIUMTEXT NOT NULL AFTER `newsletter_pdfs`; 
ALTER TABLE `rax_uni_product` ADD `is_home_product` INT(100) NOT NULL AFTER `description`; 
CREATE TABLE `rax_uni_home_page` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `created_date_time` datetime NOT NULL,
 `creator` mediumtext NOT NULL,
 `creator_name` mediumtext NOT NULL,
 `position` mediumtext NOT NULL,
 `position_content` mediumtext NOT NULL,
 `deleted` int(11) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;