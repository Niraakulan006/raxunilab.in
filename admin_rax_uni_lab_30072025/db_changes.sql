ALTER TABLE `rax_uni_newsletter` ADD `pdf_name` MEDIUMTEXT NOT NULL AFTER `newsletter_pdfs`; 
ALTER TABLE `rax_uni_product` ADD `is_home_product` INT(100) NOT NULL AFTER `description`; 
CREATE TABLE `rax_uni_home_banner` (
  `id` int(100) NOT NULL,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `home_banner_id` mediumtext NOT NULL,
  `home_screen_images` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `rax_uni_home_banner`
  ADD PRIMARY KEY (`id`);

  ALTER TABLE `rax_uni_home_banner`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


  
CREATE TABLE `rax_uni_mobile_banner` (
  `id` int(100) NOT NULL,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `mobile_banner_id` mediumtext NOT NULL,
  `mobile_screen_images` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `rax_uni_mobile_banner`
  ADD PRIMARY KEY (`id`);

  ALTER TABLE `rax_uni_mobile_banner`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

  