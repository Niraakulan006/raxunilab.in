<?php
	/*require 'mailin_sms/sms_api.php';
	$GLOBALS['mailin_sms_api_key'] = "zaG0R7cJBhkUbf54";*/

	date_default_timezone_set('Asia/Calcutta');
	$GLOBALS['create_date_time_label'] = date('Y-m-d H:i:s');
	$GLOBALS['site_name_user_prefix'] = "rax_uni_lab_".date("d-m-Y"); $GLOBALS['user_id'] = ""; $GLOBALS['creator'] = "";
	$GLOBALS['creator_name'] = ""; $GLOBALS['bill_company_id'] = ""; $GLOBALS['user_type'] = ""; $GLOBALS['null_value'] = "NULL";

	$GLOBALS['page_number'] = 1; $GLOBALS['page_limit'] = 10; $GLOBALS['page_limit_list'] = array("10", "25", "50", "100");

	$GLOBALS['backup_folder_name'] = 'backup'; $GLOBALS['log_backup_folder_name'] = 'backup/logs';
	$GLOBALS['log_backup_file'] = $GLOBALS['backup_folder_name']."/logs/".date("Y").".csv"; 
	$GLOBALS['max_log_file_count'] = 5; $GLOBALS['max_log_file_size_mb'] = 10; $GLOBALS['expire_log_file_days'] = 90;
	$GLOBALS['max_role_count'] = 5; $GLOBALS['max_user_count'] = 5; 
	$GLOBALS['max_company_count'] = 1; $GLOBALS['max_category_count'] = 4; $GLOBALS['home_position_banner'] = 1;
	
	// Tables
	$table_prefix = "rax_uni_";
	$GLOBALS['company_table'] = $table_prefix."company"; 
	$GLOBALS['login_table'] = $table_prefix."login"; 
	$GLOBALS['user_table'] = $table_prefix."user";  
	$GLOBALS['role_table'] = $table_prefix."role";
	$GLOBALS['category_table'] = $table_prefix."category";
	$GLOBALS['newsletter_table'] = $table_prefix."newsletter";
	$GLOBALS['product_table'] = $table_prefix."product";
	$GLOBALS['home_page_table'] = $table_prefix."home_page";

	$GLOBALS['Reset_to_one'] = "Reset To 1"; $GLOBALS['continue_last_number'] = "Continue from last number"; $GLOBALS['custom_number'] = "Custom Number";
	
	$GLOBALS['admin_user_type'] = "Super Admin"; $GLOBALS['staff_user_type'] = "Staff";

	if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'])) {
		$GLOBALS['creator'] = $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'];
	}

	if(!empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_name']) && isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_name'])) {
		$GLOBALS['creator_name'] = $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_name'];
	}

	if(!empty($_SESSION['bill_company_id']) && isset($_SESSION['bill_company_id'])) {
		$GLOBALS['bill_company_id'] = $_SESSION['bill_company_id'];
	}

	if(isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type']) && !empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type'])) {
		$GLOBALS['user_type'] = $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_type'];
	}

	// Modules

	$GLOBALS['product_module'] = "Product";



	$user_access_list = array();
	$user_access_list[] = $GLOBALS['product_module'];
	

	$GLOBALS['access_pages_list'] = $user_access_list;

	// Stock Actions
	$GLOBALS['stock_action_plus'] = "Plus"; $GLOBALS['stock_action_minus'] = "Minus";
?>