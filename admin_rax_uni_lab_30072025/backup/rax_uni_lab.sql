

CREATE TABLE `rax_uni_category` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `category_id` mediumtext NOT NULL,
  `category_name` mediumtext NOT NULL,
  `parent` mediumtext NOT NULL,
  `parent_category_id` mediumtext NOT NULL,
  `parent_category_name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('1','2025-07-24 16:27:46','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d6a51774e7a49774d6a55774e4449334e445a664d484a6865463931626d6c66593246305a576476636e6c664d513d3d','52334a68626d5167593246305a576476636e6b3d','parent','NULL','NULL','5a334a68626d5167593246305a576476636e6b3d','1');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('2','2025-07-24 16:28:06','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d6a51774e7a49774d6a55774e4449344d445a664d484a6865463931626d6c66593246305a576476636e6c664d673d3d','59326870624751676232356c','child','4d6a51774e7a49774d6a55774e4449334e445a664d484a6865463931626d6c66593246305a576476636e6c664d513d3d','52334a68626d5167593246305a576476636e6b3d','59326870624751676232356c','1');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('3','2025-07-24 16:28:21','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d6a51774e7a49774d6a55774e4449344d6a46664d484a6865463931626d6c66593246305a576476636e6c664d773d3d','593268706247516764486476','child','4d6a51774e7a49774d6a55774e4449334e445a664d484a6865463931626d6c66593246305a576476636e6c664d513d3d','52334a68626d5167593246305a576476636e6b3d','593268706247516764486476','1');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('4','2025-07-24 16:28:57','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d6a51774e7a49774d6a55774e4449344e5464664d484a6865463931626d6c66593246305a576476636e6c664e413d3d','52334a68626d5167593246305a576476636e6b6764486476','parent','NULL','NULL','5a334a68626d5167593246305a576476636e6b6764486476','1');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('5','2025-07-24 16:29:12','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d6a51774e7a49774d6a55774e4449354d544a664d484a6865463931626d6c66593246305a576476636e6c664e513d3d','5932687062475167644768795a57553d','child','4d6a51774e7a49774d6a55774e4449344e5464664d484a6865463931626d6c66593246305a576476636e6c664e413d3d','52334a68626d5167593246305a576476636e6b6764486476','5932687062475167644768795a57553d','1');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('6','2025-07-24 16:29:22','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d6a51774e7a49774d6a55774e4449354d6a4a664d484a6865463931626d6c66593246305a576476636e6c664e673d3d','59326870624751675a6d393163673d3d','child','4d6a51774e7a49774d6a55774e4449344e5464664d484a6865463931626d6c66593246305a576476636e6c664e413d3d','52334a68626d5167593246305a576476636e6b6764486476','59326870624751675a6d393163673d3d','1');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('7','2025-07-25 12:50:31','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d6a55774e7a49774d6a55784d6a55774d7a46664d484a6865463931626d6c66593246305a576476636e6c664e773d3d','5932463059576476636e6b674d513d3d','child','4d6a51774e7a49774d6a55774e4449334e445a664d484a6865463931626d6c66593246305a576476636e6c664d513d3d','52334a68626d5167593246305a576476636e6b3d','5932463059576476636e6b674d513d3d','1');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('8','2025-08-01 16:39:38','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d4445774f4449774d6a55774e444d354d7a68664d484a6865463931626d6c66593246305a576476636e6c664f413d3d','566d6c69636d463062334a3549454e316343424e61577873','parent','NULL','NULL','646d6c69636d463062334a3549474e316343427461577873','1');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('9','2025-08-01 16:50:05','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d4445774f4449774d6a55774e4455774d4456664d484a6865463931626d6c66593246305a576476636e6c664f513d3d','566d6c69636d463062334a3549454e316343424e61577873','parent','NULL','NULL','646d6c69636d463062334a3549474e316343427461577873','0');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('10','2025-08-01 16:50:19','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d4445774f4449774d6a55774e4455774d546c66636d4634583356756156396a5958526c5a323979655638784d413d3d','5347467462575679494531706247773d','parent','NULL','NULL','6147467462575679494731706247773d','0');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('11','2025-08-01 16:50:33','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d4445774f4449774d6a55774e4455774d7a4e66636d4634583356756156396a5958526c5a323979655638784d513d3d','516d46736243424e6157787363773d3d','parent','NULL','NULL','596d4673624342746157787363773d3d','0');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('12','2025-08-01 16:50:47','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d4445774f4449774d6a55774e4455774e446466636d4634583356756156396a5958526c5a323979655638784d673d3d','53486c6b636d463162476c6a494642795a584e7a','parent','NULL','NULL','61486c6b636d463162476c6a494842795a584e7a','0');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('13','2025-08-01 16:51:07','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d4445774f4449774d6a55774e4455784d446466636d4634583356756156396a5958526c5a323979655638784d773d3d','536d463349454e7964584e6f5a584a7a','parent','NULL','NULL','616d463349474e7964584e6f5a584a7a','0');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('14','2025-08-01 16:51:20','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d4445774f4449774d6a55774e4455784d6a4266636d4634583356756156396a5958526c5a323979655638784e413d3d','54576c6a636d3867516b56464946423162485a6c636d6c365a58493d','parent','NULL','NULL','62576c6a636d3867596d566c4948423162485a6c636d6c365a58493d','0');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('15','2025-08-01 16:51:31','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d4445774f4449774d6a55774e4455784d7a4666636d4634583356756156396a5958526c5a323979655638784e513d3d','556d39736247567949454e7964584e6f5a58493d','parent','NULL','NULL','636d39736247567949474e7964584e6f5a58493d','0');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('16','2025-08-01 16:51:43','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d4445774f4449774d6a55774e4455784e444e66636d4634583356756156396a5958526c5a323979655638784e673d3d','51585630627942455a584e7059324e686447397963773d3d','parent','NULL','NULL','595856306279426b5a584e7059324e686447397963773d3d','0');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('17','2025-08-01 16:52:01','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d4445774f4449774d6a55774e4455794d444666636d4634583356756156396a5958526c5a323979655638784e773d3d','534856746157527064486b675132686862574a6c63673d3d','parent','NULL','NULL','614856746157527064486b675932686862574a6c63673d3d','0');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('18','2025-08-01 16:52:14','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d4445774f4449774d6a55774e4455794d545266636d4634583356756156396a5958526c5a323979655638784f413d3d','526e5679626d466a5a534268626d516754335a6c626e4d3d','parent','NULL','NULL','5a6e5679626d466a5a534268626d516762335a6c626e4d3d','0');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('19','2025-08-01 16:52:54','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d4445774f4449774d6a55774e4455794e545266636d4634583356756156396a5958526c5a323979655638784f513d3d','5130394f4946463159575167553246746347786c49455270646d6b3d','parent','NULL','NULL','593239754948463159575167633246746347786c49475270646d6b3d','0');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('20','2025-08-01 16:53:08','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d4445774f4449774d6a55774e44557a4d446c66636d4634583356756156396a5958526c5a323979655638794d413d3d','526e56745a5342496232396b49454e68596d6c755a58513d','parent','NULL','NULL','5a6e56745a53426f6232396b49474e68596d6c755a58513d','0');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('21','2025-08-01 16:53:23','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d4445774f4449774d6a55774e44557a4d6a4e66636d4634583356756156396a5958526c5a323979655638794d513d3d','556d463449464e775a574679','parent','NULL','NULL','636d463449484e775a574679','0');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('22','2025-08-01 16:57:03','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d4445774f4449774d6a55774e4455334d444e66636d4634583356756156396a5958526c5a323979655638794d673d3d','556b46594c56524255434254615756325a534254614746725a58493d','parent','NULL','NULL','636d46344c5852686343427a615756325a53427a614746725a58493d','0');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('23','2025-08-01 16:57:19','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d4445774f4449774d6a55774e4455334d546c66636d4634583356756156396a5958526c5a323979655638794d773d3d','516d39745969424459577876636d6c745a58526c63673d3d','parent','NULL','NULL','596d39745969426a59577876636d6c745a58526c63673d3d','0');

INSERT INTO rax_uni_category (id, created_date_time, creator, creator_name, bill_company_id, category_id, category_name, parent, parent_category_id, parent_category_name, lower_case_name, deleted) VALUES ('24','2025-08-01 16:58:47','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','','4d4445774f4449774d6a55774e4455344e446466636d4634583356756156396a5958526c5a323979655638794e413d3d','556d6c6d5a6d786c6369417449464e68625842735a5342456158593d','parent','NULL','NULL','636d6c6d5a6d786c6369417449484e68625842735a53426b6158593d','0');


CREATE TABLE `rax_uni_company` (
  `id` int(100) NOT NULL,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `company_id` mediumtext NOT NULL,
  `name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `address` mediumtext NOT NULL,
  `state` mediumtext NOT NULL,
  `district` mediumtext NOT NULL,
  `city` mediumtext NOT NULL,
  `others_city` mediumtext NOT NULL,
  `pincode` mediumtext NOT NULL,
  `mobile_number` mediumtext NOT NULL,
  `logo` mediumtext NOT NULL,
  `watermark_logo` mediumtext NOT NULL,
  `company_details` mediumtext NOT NULL,
  `primary_company` int(100) NOT NULL,
  `email` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO rax_uni_company (id, created_date_time, creator, creator_name, company_id, name, lower_case_name, address, state, district, city, others_city, pincode, mobile_number, logo, watermark_logo, company_details, primary_company, email, deleted) VALUES ('1','2025-05-26 16:33:18','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','4d6a59774e5449774d6a55774e444d7a4d546c664d44453d','5247393049454e766258423149464e766248563061573975','344b3634344b2b4e344b3677344b2b41494f437575654375734f437576794467727058677234666772702f677234336772702f677272446772722f6772706e67723430674a6d46746344746862584137494f43756d754375734f43766a65437574654376674f4375754f43766a513d3d','56693467344b3661344b2b42344b3671344b2b4e344b3671344b2b42344b3677344b362b344b3663344b2b4e494f43756c654376682b43756e2b43766a6543756e2b4375734f4375762b43756d6543766a534467727137677272376772726a677234336772702f6772724467723430674e79387a4d6a5167344b3671344b3663344b3670344b2b49344b3656344b2b4e494f43756c654376692b437574654375762b4375737543766a534467727154677234626772724467723445754451726772726a67723433677272446772344167344b3661344b366f344b2b4e344b366b344b3670344b3675344b362b344b3677344b362f344b3676344b3675344b2b4e344b3675344b3670344b2b4e494f43756c654376692b437574654375762b4375737543766a534467726f586772724467723448677270586772722f6772724c6772343073494f4375714f4375767543756d7543766a6543756d754375762b4375722b437576754375734f43766a654375717543756e2b43766a6543756e2b43757679343d','5647467461577767546d466b64513d3d','566d6c796457526f645735685a324679','55334a70646d6c7362476c776458526f6458493d','Srivilliputhur','4e6a49324d54497a','4e7a4d334d7a637a4e7a45784f513d3d','logo_26_06_2025_05_39_25.jpeg','watermark_logo_26_06_2025_05_39_33.jpeg','344b3634344b2b4e344b3677344b2b41494f437575654375734f437576794467727058677234666772702f677234336772702f677272446772722f6772706e67723430674a694467727072677272446772343367727258677234446772726a677234306b4a4352574c694467727072677234486772717267723433677271726772344867727244677272376772707a6772343067344b3656344b2b48344b3666344b2b4e344b3666344b3677344b362f344b365a344b2b4e494f43757275437576754375754f43766a6543756e2b4375734f43766a5341334c7a4d794e4344677271726772707a6772716e6772346a677270586772343067344b3656344b2b4c344b3631344b362f344b3679344b2b4e494f4375704f437668754375734f43766753346b4a43546772726a67723433677272446772344167344b3661344b366f344b2b4e344b366b344b3670344b3675344b362b344b3677344b362f344b3676344b3675344b2b4e344b3675344b3670344b2b4e494f43756c654376692b437574654375762b4375737543766a534467726f586772724467723448677270586772722f6772724c6772343073494f4375714f4375767543756d7543766a6543756d754375762b4375722b437576754375734f43766a654375717543756e2b43766a6543756e2b43757679346b4a435254636d6c3261577873615842316447683163694174494459794e6a45794d79516b4a465a70636e566b61485675595764686369416f52476c7a644334704a43516b5647467461577767546d466b6453516b4a454e76626e5268593351674f6a637a4e7a4d334d7a63784d546b3d','1','srihari90@gmail.com','0');


CREATE TABLE `rax_uni_home_banner` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `home_banner_id` mediumtext NOT NULL,
  `home_screen_images` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO rax_uni_home_banner (id, created_date_time, creator, creator_name, home_banner_id, home_screen_images, deleted) VALUES ('1','2025-07-31 16:30:32','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','4d7a45774e7a49774d6a55774e444d774d7a4a664d484a6865463931626d6c66614739745a563969595735755a584a664d513d3d','home_banner_image_01_08_2025_02_02_03.png','0');


CREATE TABLE `rax_uni_login` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `loginer_name` mediumtext NOT NULL,
  `login_date_time` datetime NOT NULL,
  `logout_date_time` datetime NOT NULL,
  `ip_address` mediumtext NOT NULL,
  `browser` mediumtext NOT NULL,
  `os_detail` mediumtext NOT NULL,
  `type` mediumtext NOT NULL,
  `user_id` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('1','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-07-24 13:11:17','2025-07-24 13:11:17','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','Windows NT JAGAN 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('2','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-07-25 09:23:44','2025-07-25 09:23:44','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','Windows NT JAGAN 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('3','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-07-25 16:24:01','2025-07-25 16:24:01','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','Windows NT JAGAN 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('4','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-07-26 09:29:49','2025-07-26 09:29:49','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','Windows NT JAGAN 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('5','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-07-28 09:23:28','2025-07-28 16:24:57','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','Windows NT JAGAN 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('6','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-07-28 16:24:58','2025-07-28 16:24:58','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','Windows NT JAGAN 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('7','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-07-28 16:34:16','2025-07-28 16:34:16','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','Windows NT JAGAN 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('8','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-07-30 11:13:31','2025-07-30 11:13:31','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','Windows NT JAGAN 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('9','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-07-30 16:47:12','2025-07-30 16:47:12','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','Windows NT JAGAN 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('10','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-07-30 18:15:12','2025-07-30 18:15:12','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','Windows NT JAGAN 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('11','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-07-30 19:38:16','2025-07-30 19:38:16','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0','Windows NT DESKTOP-CO15G4U 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('12','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-07-31 09:31:46','2025-07-31 11:29:13','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0','Windows NT DESKTOP-CO15G4U 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('13','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-07-31 11:18:24','2025-07-31 11:18:24','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0','Windows NT DESKTOP-CO15G4U 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('14','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-07-31 11:32:44','2025-07-31 11:32:44','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0','Windows NT DESKTOP-CO15G4U 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('15','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-07-31 15:24:35','2025-07-31 15:55:19','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0','Windows NT DESKTOP-CO15G4U 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('16','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-07-31 16:24:05','2025-07-31 16:24:05','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0','Windows NT DESKTOP-CO15G4U 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('17','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-08-01 13:58:36','2025-08-01 14:07:18','103.104.58.164','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0','Linux sg2plmcpnl486913.prod.sin2.secureserver.net 4.18.0-553.51.1.lve.el8.x86_64 #1 SMP Tue May 6 15:14:12 UTC 2025 x86_64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('18','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-08-01 14:07:34','2025-08-01 14:07:34','103.104.58.164','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0','Linux sg2plmcpnl486913.prod.sin2.secureserver.net 4.18.0-553.51.1.lve.el8.x86_64 #1 SMP Tue May 6 15:14:12 UTC 2025 x86_64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('19','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-08-01 14:45:05','2025-08-01 14:45:05','103.104.58.164','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0','Linux sg2plmcpnl486913.prod.sin2.secureserver.net 4.18.0-553.51.1.lve.el8.x86_64 #1 SMP Tue May 6 15:14:12 UTC 2025 x86_64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('20','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-08-01 14:51:26','2025-08-01 14:51:26','106.195.44.110','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0','Linux sg2plmcpnl486913.prod.sin2.secureserver.net 4.18.0-553.51.1.lve.el8.x86_64 #1 SMP Tue May 6 15:14:12 UTC 2025 x86_64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('21','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-08-01 15:26:04','2025-08-01 15:26:04','106.195.44.110','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0','Linux sg2plmcpnl486913.prod.sin2.secureserver.net 4.18.0-553.51.1.lve.el8.x86_64 #1 SMP Tue May 6 15:14:12 UTC 2025 x86_64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('22','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-08-01 15:29:50','2025-08-01 15:29:50','106.195.44.110','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:138.0) Gecko/20100101 Firefox/138.0','Linux sg2plmcpnl486913.prod.sin2.secureserver.net 4.18.0-553.51.1.lve.el8.x86_64 #1 SMP Tue May 6 15:14:12 UTC 2025 x86_64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('23','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-08-01 16:38:18','2025-08-01 16:38:18','103.104.58.164','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0','Linux sg2plmcpnl486913.prod.sin2.secureserver.net 4.18.0-553.51.1.lve.el8.x86_64 #1 SMP Tue May 6 15:14:12 UTC 2025 x86_64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('24','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-08-01 17:11:08','2025-08-01 17:11:08','103.104.58.164','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0','Linux sg2plmcpnl486913.prod.sin2.secureserver.net 4.18.0-553.51.1.lve.el8.x86_64 #1 SMP Tue May 6 15:14:12 UTC 2025 x86_64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('25','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-08-01 18:24:33','2025-08-01 18:24:33','103.104.58.164','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0','Linux sg2plmcpnl486913.prod.sin2.secureserver.net 4.18.0-553.51.1.lve.el8.x86_64 #1 SMP Tue May 6 15:14:12 UTC 2025 x86_64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('26','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-08-01 18:35:00','2025-08-01 18:35:00','103.104.58.164','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0','Linux sg2plmcpnl486913.prod.sin2.secureserver.net 4.18.0-553.51.1.lve.el8.x86_64 #1 SMP Tue May 6 15:14:12 UTC 2025 x86_64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('27','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-08-01 18:35:38','2025-08-01 18:35:38','103.104.58.164','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0','Linux sg2plmcpnl486913.prod.sin2.secureserver.net 4.18.0-553.51.1.lve.el8.x86_64 #1 SMP Tue May 6 15:14:12 UTC 2025 x86_64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');

INSERT INTO rax_uni_login (id, loginer_name, login_date_time, logout_date_time, ip_address, browser, os_detail, type, user_id, deleted) VALUES ('28','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','2025-08-02 10:03:18','2025-08-02 10:03:18','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:141.0) Gecko/20100101 Firefox/141.0','Windows NT DESKTOP-CO15G4U 10.0 build 26100 (Windows 11) AMD64','Super Admin','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','0');


CREATE TABLE `rax_uni_mobile_banner` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `mobile_banner_id` mediumtext NOT NULL,
  `mobile_screen_images` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO rax_uni_mobile_banner (id, created_date_time, creator, creator_name, mobile_banner_id, mobile_screen_images, deleted) VALUES ('1','2025-07-31 16:32:53','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','4d7a45774e7a49774d6a55774e444d794e544e664d484a6865463931626d6c66625739696157786c58324a68626d356c636c3878','mobile_banner_image_01_08_2025_02_06_53.jpg','0');


CREATE TABLE `rax_uni_newsletter` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `newsletter_id` mediumtext NOT NULL,
  `newsletter_pdfs` mediumtext NOT NULL,
  `pdf_name` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO rax_uni_newsletter (id, created_date_time, creator, creator_name, newsletter_id, newsletter_pdfs, pdf_name, deleted) VALUES ('1','2025-07-28 09:40:20','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','4d6a67774e7a49774d6a55774f5451774d6a42664d484a6865463931626d6c66626d56336332786c6448526c636c3878','newsletter_pdf_31_07_2025_10_44_35.pdf$$$newsletter_pdf_31_07_2025_10_45_02.pdf$$$newsletter_pdf_31_07_2025_10_45_28.pdf$$$newsletter_pdf_31_07_2025_10_46_17.pdf$$$newsletter_pdf_01_08_2025_07_59_05.pdf','Stock Report,Asian Sparklers Payroll,Robo Crackers 2025,Virgin Pyro,NEWs','0');


CREATE TABLE `rax_uni_product` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `product_id` mediumtext NOT NULL,
  `product_name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `category_id` mediumtext NOT NULL,
  `category_name` mediumtext NOT NULL,
  `sub_category_id` mediumtext NOT NULL,
  `sub_category_name` mediumtext NOT NULL,
  `related_products` mediumtext NOT NULL,
  `images` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `is_home_product` int(100) NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO rax_uni_product (id, created_date_time, creator, creator_name, product_id, product_name, lower_case_name, category_id, category_name, sub_category_id, sub_category_name, related_products, images, description, is_home_product, deleted) VALUES ('1','2025-07-24 18:40:12','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','4d6a51774e7a49774d6a55774e6a51774d544a664d484a6865463931626d6c6663484a765a48566a64463878','63484a765a48566a644342306432383d','63484a765a48566a644342306432383d','4d6a51774e7a49774d6a55774e4449334e445a664d484a6865463931626d6c66593246305a576476636e6c664d513d3d','52334a68626d5167593246305a576476636e6b3d','4d6a51774e7a49774d6a55774e4449344d445a664d484a6865463931626d6c66593246305a576476636e6c664d673d3d','59326870624751676232356c','NULL','product_image_24_07_2025_06_39_56.png,product_image_24_07_2025_06_40_02.png','4a6d78304f3267794a6d64304f795a7364447468494768795a5759394a6e4631623351376148523063484d364c79396c654746746347786c4c6d4e7662535a78645739304f795a6e644476776e35536c49464e775a574e705957776754325a6d5a584967536e567a6443426d623349675757393149535a736444737659535a6e6444736d624851374c3267794a6d64304f77304b4a6d78304f33416d5a3351374a6d78304f32456761484a6c5a6a306d635856766444746f64485277637a6f764c3256345957317762475575593239744a6e4631623351374a6d64304f30646c6443423163434230627941314d43556762325a6d4947397549473931636942735958526c6333516763484a765a48566a64484d754945787062576c305a57516764476c745a5342765a6d5a6c63693467524739754a6d46746344747963334631627a74304947317063334d676233563049535a736444737659535a6e6444736d624851374c33416d5a33513744516f6d6248513763435a6e6444736d624851375953426f636d566d50535a78645739304f3268306448427a4f6938765a586868625842735a53356a6232306d635856766444736d5a3351374a6d467463447475596e4e774f79416d595731774f3235696333413749435a6862584137626d4a7a634473674a6d467463447475596e4e774f79425461473977494535766479416d595731774f3235696333413749435a6862584137626d4a7a634473674a6d467463447475596e4e774f795a736444737659535a6e6444736d624851374c33416d5a335137','1','1');

INSERT INTO rax_uni_product (id, created_date_time, creator, creator_name, product_id, product_name, lower_case_name, category_id, category_name, sub_category_id, sub_category_name, related_products, images, description, is_home_product, deleted) VALUES ('2','2025-07-25 11:11:40','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','4d6a55774e7a49774d6a55784d5445784e4442664d484a6865463931626d6c6663484a765a48566a64463879','5a6d6c795a53426d62334a6c6333513d','5a6d6c795a53426d62334a6c6333513d','4d6a51774e7a49774d6a55774e4449344e5464664d484a6865463931626d6c66593246305a576476636e6c664e413d3d','52334a68626d5167593246305a576476636e6b6764486476','4d6a51774e7a49774d6a55774e4449354d544a664d484a6865463931626d6c66593246305a576476636e6c664e513d3d','5932687062475167644768795a57553d','4d6a51774e7a49774d6a55774e6a51774d544a664d484a6865463931626d6c6663484a765a48566a64463878','product_image_25_07_2025_11_11_24.jpg,product_image_25_07_2025_11_11_28.jpg','4a6d78304f325a705a3356795a53426a6247467a637a306d635856766444743059574a735a535a78645739304f795a6e6444736d62485137644746696247556d5a3351374a6d78304f33526f5a57466b4a6d64304f795a736444743063695a6e6444736d624851376447676d5a3351376332466b4a6d78304f79393061435a6e6444736d624851376447676d5a3351376332516d624851374c33526f4a6d64304f795a736444743061435a6e644474545245464252464d6d624851374c33526f4a6d64304f795a736444743061435a6e6444744555305a456332526d4a6d78304f79393061435a6e6444736d624851376447676d5a3351376332526d4a6d78304f79393061435a6e6444736d624851376447676d5a3351376332526d4a6d78304f79393061435a6e6444736d624851374c3352794a6d64304f795a73644473766447686c5957516d5a3351374a6d78304f335269623252354a6d64304f795a736444743063695a6e6444736d624851376447676d5a3351376332526d6332516d624851374c33526f4a6d64304f795a73644474305a435a6e6444736d6248513763435a6e6444747a5a475a7a5a475a7a5a475a686332526d4a6d78304f7939774a6d64304f795a736444746d61576431636d55675932786863334d394a6e463162335137615731685a325567615731685a325574633352356247557463326c6b5a535a78645739304f795a6e6444736d624851376157316e49484e79597a306d63585676644474706257466e5a584d7659327466645842736232466b4c7a59344f444d794e7a4e694e57466c4d5751746147467763486c665a6d6c795a586476636d747a4c6e42755a795a78645739304f79427a64486c735a54306d63585676644474336157523061446f674d5441774a54736d63585676644473674c795a6e6444736d624851374c325a705a3356795a535a6e6444736d624851374c33526b4a6d64304f795a73644474305a435a6e6444736d595731774f323569633341374a6d78304f7939305a435a6e6444736d624851376447516d5a3351374a6d467463447475596e4e774f795a73644473766447516d5a3351374a6d78304f33526b4a6d64304f795a6862584137626d4a7a6344736d624851374c33526b4a6d64304f795a73644474305a435a6e6444736d595731774f323569633341374a6d78304f7939305a435a6e6444736d624851374c3352794a6d64304f795a736444737664474a765a486b6d5a3351374a6d78304f79393059574a735a535a6e6444736d624851374c325a705a3356795a535a6e6444736d6248513763435a6e6444736d595731774f323569633341374a6d78304f7939774a6d64304f773d3d','0','1');

INSERT INTO rax_uni_product (id, created_date_time, creator, creator_name, product_id, product_name, lower_case_name, category_id, category_name, sub_category_id, sub_category_name, related_products, images, description, is_home_product, deleted) VALUES ('3','2025-07-25 11:18:07','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','4d6a55774e7a49774d6a55784d5445344d4464664d484a6865463931626d6c6663484a765a48566a6446387a','5547393059585276','6347393059585276','4d6a51774e7a49774d6a55774e4449344e5464664d484a6865463931626d6c66593246305a576476636e6c664e413d3d','52334a68626d5167593246305a576476636e6b6764486476','4d6a51774e7a49774d6a55774e4449354d6a4a664d484a6865463931626d6c66593246305a576476636e6c664e673d3d','59326870624751675a6d393163673d3d','4d6a55774e7a49774d6a55784d5445784e4442664d484a6865463931626d6c6663484a765a48566a64463879,4d6a51774e7a49774d6a55774e6a51774d544a664d484a6865463931626d6c6663484a765a48566a64463878','default_image.png','4a6d78304f33416d5a3351375a575270644739795357357a644746755932556d624851374c33416d5a3351374a6d78304f33416d5a3351374a6d467463447475596e4e774f795a736444737663435a6e6444736d6248513763435a6e6444736d595731774f323569633341374a6d78304f7939774a6d64304f795a73644474774a6d64304f33646c5a474d6d624851374c33416d5a3351374a6d78304f33416d5a3351374a6d467463447475596e4e774f795a736444737663435a6e6444736d624851375a6d6c6e64584a6c49474e7359584e7a50535a78645739304f326c745957646c49476c745957646c4c584e306557786c4c584e705a47556d635856766444736d5a3351374a6d78304f326c745a79427a636d4d394a6e463162335137615731685a32567a4c324e7258335677624739685a4338324f44677a4d574d784d6a45355a546b354c5768686348423558325a70636d563362334a7263793577626d636d635856766444736763335235624755394a6e46316233513764326c6b64476736494445774d4355374a6e4631623351374943386d5a3351374a6d78304f79396d61576431636d556d5a3351374a6d78304f33416d5a3351375a47467a4a6d78304f7939774a6d64304f795a73644474774a6d64304f32467a5a47467a4a6d78304f7939774a6d64304f795a73644474774a6d64304f32467a5a47467a5a435a736444737663435a6e6444736d6248513763435a6e6444736d595731774f323569633341374a6d78304f7939774a6d64304f795a73644474774a6d64304f795a6862584137626d4a7a6344736d624851374c33416d5a3351374a6d78304f33416d5a33513759584e6b59584e6b4a6d78304f7939774a6d64304f795a73644474774a6d64304f795a6862584137626d4a7a6344736d624851374c33416d5a3351374a6d78304f33416d5a3351374a6d467463447475596e4e774f795a736444737663435a6e6444736d6248513763435a6e6444736d595731774f323569633341374a6d78304f7939774a6d64304f795a73644474774a6d64304f795a6862584137626d4a7a6344736d624851374c33416d5a3351374a6d78304f33416d5a3351374a6d467463447475596e4e774f795a736444737663435a6e6444736d6248513763435a6e6444746b6332467a5a435a736444737663435a6e6444733d','0','1');

INSERT INTO rax_uni_product (id, created_date_time, creator, creator_name, product_id, product_name, lower_case_name, category_id, category_name, sub_category_id, sub_category_name, related_products, images, description, is_home_product, deleted) VALUES ('4','2025-07-25 12:46:08','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','4d6a55774e7a49774d6a55784d6a51324d4468664d484a6865463931626d6c6663484a765a48566a64463830','63484a765a48566a64434276626d553d','63484a765a48566a64434276626d553d','4d6a51774e7a49774d6a55774e4449334e445a664d484a6865463931626d6c66593246305a576476636e6c664d513d3d','52334a68626d5167593246305a576476636e6b3d','4d6a55774e7a49774d6a55784d6a55774d7a46664d484a6865463931626d6c66593246305a576476636e6c664e773d3d','5932463059576476636e6b674d513d3d','NULL','product_image_25_07_2025_03_17_47.jpg,product_image_25_07_2025_03_18_26.jpg','4a6d78304f33416763335235624755394a6e4631623351376347466b5a476c755a7931735a575a304f6941304d4842344f795a78645739304f795a6e6444736d6248513761575a795957316c49484e79597a306d63585676644473764c336433647935356233563064574a6c4c6d4e766253396c62574a6c5a4339705331703557575233557a4e585a795a78645739304f794233615752306144306d63585676644473314e6a416d6358567664447367614756705a32683050535a78645739304f7a4d784e435a78645739304f7942686247787664325a316247787a59334a6c5a5734394a6e463162335137595778736233646d6457787363324e795a5756754a6e4631623351374a6d64304f795a736444737661575a795957316c4a6d64304f795a736444737663435a6e6444734e43695a736444746d61576431636d55675932786863334d394a6e463162335137644746696247556d635856766444736d5a33513744516f6d62485137644746696247556d5a33513744516f6d624851376447686c5957516d5a33513744516f6d624851376448496d5a33513744516f6d624851376447676d5a33513744516f6d624851375a6d6c6e64584a6c49474e7359584e7a50535a78645739304f326c745957646c4a6e4631623351374a6d64304f795a73644474706257636763335235624755394a6e46316233513764326c6b64476736494445774d4355374a6e46316233513749484e79597a306d63585676644474706257466e5a584d7659327466645842736232466b4c7a59344f444d795a545130596a457a4d7a4d74615731685a325575616e426c5a795a78645739304f794268624851394a6e4631623351374d5377774d44417249454a6c633351675257786c63476868626e5167535731685a32567a49435a686258413762576c6b5a4739304f7941784d44416c49455a795a5755674c6934754a6e4631623351374943386d5a3351374a6d78304f79396d61576431636d556d5a33513744516f6d624851374c33526f4a6d64304f77304b4a6d78304f33526f4a6d64304f3256735a58426f595735304a6d467463447475596e4e774f795a73644473766447676d5a33513744516f6d624851374c3352794a6d64304f77304b4a6d78304f793930614756685a435a6e6444734e43695a7364447430596d396b65535a6e6444734e43695a736444743063695a6e6444734e43695a73644474305a435a6e6444736d595731774f323569633341374a6d78304f7939305a435a6e6444734e43695a73644474305a435a6e6444736d595731774f323569633341374a6d78304f7939305a435a6e6444734e43695a73644473766448496d5a33513744516f6d624851374c335269623252354a6d64304f77304b4a6d78304f79393059574a735a535a6e6444734e43695a73644473765a6d6c6e64584a6c4a6d64304f773d3d','1','1');

INSERT INTO rax_uni_product (id, created_date_time, creator, creator_name, product_id, product_name, lower_case_name, category_id, category_name, sub_category_id, sub_category_name, related_products, images, description, is_home_product, deleted) VALUES ('5','2025-07-30 18:16:21','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','4d7a41774e7a49774d6a55774e6a45324d6a46664d484a6865463931626d6c6663484a765a48566a64463831','63484a765a48566a6443423061484a6c5a513d3d','63484a765a48566a6443423061484a6c5a513d3d','4d6a51774e7a49774d6a55774e4449344e5464664d484a6865463931626d6c66593246305a576476636e6c664e413d3d','52334a68626d5167593246305a576476636e6b6764486476','NULL','NULL','4d6a55774e7a49774d6a55784d6a51324d4468664d484a6865463931626d6c6663484a765a48566a64463830,4d6a51774e7a49774d6a55774e6a51774d544a664d484a6865463931626d6c6663484a765a48566a64463878','default_image.png','NULL','1','1');

INSERT INTO rax_uni_product (id, created_date_time, creator, creator_name, product_id, product_name, lower_case_name, category_id, category_name, sub_category_id, sub_category_name, related_products, images, description, is_home_product, deleted) VALUES ('6','2025-08-01 17:12:36','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','4d4445774f4449774d6a55774e5445794d7a5a664d484a6865463931626d6c6663484a765a48566a64463832','536d463349454e7964584e6f5a58493d','616d463349474e7964584e6f5a58493d','4d4445774f4449774d6a55774e4455784d446466636d4634583356756156396a5958526c5a323979655638784d773d3d','536d463349454e7964584e6f5a584a7a','NULL','NULL','NULL','NULL','5048412b50484e30636d39755a7a3544636e567a61476c755a79424d64573177637942765a69424d6157316c63335276626d557349456c796232346762334a6c4c447776633352796232356e506a7869636a3438633352796232356e506b7868644756796158526c4c43424462476c75613256794c6a7776633352796232356e506a7776634434386344346d626d4a7a634473384c33412b50476778506a7870506e646c64334a33636a7776615434384c326778506a78316244343862476b2b50476b2b64585631645856316458563150433970506a777662476b2b50477870506d6c7061576c7061576c706154777662476b2b50433931624434386232772b50477870506b566863326c736553427462335a68596d786c49457042567942476158683064584a6c637a777662476b2b50477870506b4a6c6248516752335668636d5173494556745a584a6e5a57356a655342546447397749464e336158526a61437738596e492b5430785349475a76636942746233527663694277636d39305a574e30615739754c434244525342466247566a64484a705932467350474a79506e4e685a6d5630655334384c327870506a77766232772b50485673506a78736154354e6233567564476c755a7a6f6755336c7a64475674637942336157787349474a6c4948427962335a705a47566b50474a79506e6470644767676447686c4945467564476b67566d6c69636d463061573975494642685a484d7349484e6c634746795958526c50474a79506b4e76626d4e795a58526c49453176645735306157356e49473576644342795a58463161584a6c5a4334384c327870506a78736154354e62335276636a6f674e556851494338674d33426f59584e6c494338674d5451304d464a5154547869636a3438596e492b50476c745a79427a636d4d39496d6c745957646c6379396a6131393163477876595751764e6a67345a4745775a444a6b4e7a42685a6931706257466e5a584d784d444177654445774d4441754d533577626d636949484e306557786c50534a336157523061446f674e54416c4f32686c6157646f64446f674e54416c4f7949674c7a3438596e492b4a6d35696333413750433973615434384c335673506a786d61576431636d55675932786863334d39496e5268596d786c496a3438644746696247552b5048526962325235506a7830636a34386447512b4a6d356963334137504339305a4434386447512b55484a70626d4e70634746734a6d356963334137504339305a4434386447512b55484a7062574679655477766447512b5048526b506c4e6c593239755a474679655477766447512b50433930636a34386448492b5048526b506b5a6c5a57516755326c365a5477766447512b5048526b50695a73644473674d546777625730384c33526b506a78305a44346d62485137494445794e573174504339305a4434386447512b4a6d78304f7941344d473174504339305a4434384c335279506a7830636a34386447512b5433563063485630504339305a4434386447512b4d6a5567346f435449445177625730674b45466b61696b384c33526b506a78305a4434784d694469674a4d674d6a56746253416f515752714b535a75596e4e774f7a77766447512b5048526b506a4a7462534469674a4d674d544a746253416f515752714b5477766447512b50433930636a34386448492b5048526b506b70686479424e54304d384c33526b506a78305a44354959584a6b5a57356c5a4342546447566c624477766447512b5048526b506b6868636d526c626d566b49464e305a575673504339305a4434386447512b534746795a4756755a5751675533526c5a5777384c33526b506a77766448492b50485279506a78305a443550634852706232356862447869636a354259324e6c63334e76636d6c6c637a77766447512b5048526b506b523163335167513239736247566a64476c7662694231626d6c30504339305a4434386447512b5248567a64434244623278735a574e306157397549485675615851384c33526b506a78305a44354564584e3049454e766247786c593352706232346764573570644477766447512b50433930636a34384c33526962325235506a7776644746696247552b5043396d61576431636d552b5048412b4a6d35696333413750433977506a786d61576431636d55675932786863334d39496e5268596d786c496a3438644746696247552b5048526962325235506a7830636a34386447512b4a6d356963334137504339305a4434386447512b54576c756153424b5958636751334a316332686c636a77766447512b50433930636a34386448492b5048526b506b5a6c5a57516755326c365a5477766447512b5048526b50695a73644473304d473174504339305a4434384c335279506a7830636a34386447512b5433563063485630504339305a4434386447512b4d6d31744c544577625730674b45466b61696b384c33526b506a77766448492b50485279506a78305a44354b5958636754553944504339305a4434386447512b53476c6e6143424459584a696232346753476c6e6143424461484a7662575538596e492b625746305a584a70595777674c79424e5957356e5957356c633255675533526c5a5777674c7a7869636a35556457356e6333526c6269424459584a696157526c504339305a4434384c335279506a7830636a34386447512b54334230615739755957776751574e6a5a584e7a62334a705a584d6d626d4a7a634473384c33526b506a78305a44354564584e3049454e766247786c593352706232346764573570644477766447512b50433930636a34384c33526962325235506a7776644746696247552b5043396d61576431636d552b','0','0');


CREATE TABLE `rax_uni_role` (
  `id` int(100) NOT NULL,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `role_id` mediumtext NOT NULL,
  `role_name` mediumtext NOT NULL,
  `lower_case_name` mediumtext NOT NULL,
  `type` mediumtext NOT NULL,
  `admin` mediumtext NOT NULL,
  `access_pages` mediumtext NOT NULL,
  `access_page_actions` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO rax_uni_role (id, created_date_time, creator, creator_name, bill_company_id, role_id, role_name, lower_case_name, type, admin, access_pages, access_page_actions, deleted) VALUES ('1','2025-06-26 16:35:44','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','4d6a59774e5449774d6a55774e444d7a4d546c664d44453d','4d6a59774e6a49774d6a55774e444d314e4452664d47687a593139796232786c587a453d','553352685a6d593d','633352685a6d593d','Staff','0','','','0');


CREATE TABLE `rax_uni_role_permission` (
  `id` int(100) NOT NULL,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `bill_company_id` mediumtext NOT NULL,
  `role_permission_id` mediumtext NOT NULL,
  `role_id` mediumtext NOT NULL,
  `module` mediumtext NOT NULL,
  `module_actions` mediumtext NOT NULL,
  `deleted` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `rax_uni_user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_date_time` datetime NOT NULL,
  `creator` mediumtext NOT NULL,
  `creator_name` mediumtext NOT NULL,
  `user_id` mediumtext NOT NULL,
  `name` mediumtext NOT NULL,
  `mobile_number` mediumtext NOT NULL,
  `name_mobile` mediumtext NOT NULL,
  `role_id` mediumtext NOT NULL,
  `login_id` mediumtext NOT NULL,
  `lower_case_login_id` mediumtext NOT NULL,
  `password` mediumtext NOT NULL,
  `admin` int(100) NOT NULL,
  `deleted` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO rax_uni_user (id, created_date_time, creator, creator_name, user_id, name, mobile_number, name_mobile, role_id, login_id, lower_case_login_id, password, admin, deleted) VALUES ('1','2025-04-29 10:08:39','','63334a706332396d64486468636d5636','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','4f5459314e5451314e6a45324e773d3d','63334a706332396d64486468636d5636494367354e6a55314e4455324d5459334b513d3d','NULL','55334a706332396d64486468636d5636','63334a706332396d64486468636d5636','51575274615734784d6a4e41','1','0');

INSERT INTO rax_uni_user (id, created_date_time, creator, creator_name, user_id, name, mobile_number, name_mobile, role_id, login_id, lower_case_login_id, password, admin, deleted) VALUES ('2','2025-07-24 15:38:38','4d6a6b774e4449774d6a55784d4441344d7a6c664d44453d','63334a706332396d64486468636d5636','4d6a51774e7a49774d6a55774d7a4d344d7a68664d484a6865463931626d6c6664584e6c636c3879','59584a755957786b','4e54497a4d7a4d7a4d7a4d7a4d773d3d','59584a755957786b494367314d6a4d7a4d7a4d7a4d7a4d7a4b513d3d','4d6a59774e6a49774d6a55774e444d314e4452664d47687a593139796232786c587a453d','55334a706332396d64413d3d','63334a706332396d64413d3d','51575274615734784d6a4e41','0','0');
