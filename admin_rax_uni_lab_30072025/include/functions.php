<?php
	include("basic_functions.php");
	include("creation_functions.php");
	include("billing_functions.php");
	
	class billing extends Basic_Functions {
		public function getProjectTitle() {
			$string = parent::getProjectTitle();
			return $string;
		}
			// Creation Functions
		public function creation_function_object() {
			$create_obj = "";		
			$create_obj = new Creation_functions();
			return $create_obj;
		}

		public function encode_decode($action, $string) {
			$string = parent::encode_decode($action, $string);
			return $string;
		}	
		
		public function numberFormat($number, $decimals) {
			$list = 0;
			$list = parent::numberFormat($number, $decimals);
			return $list;
		}


		public function InsertSQL($table, $columns, $values, $custom_id, $unique_number, $action){
			$last_insert_id = "";		
			$last_insert_id = parent::InsertSQL($table, $columns, $values, $custom_id, $unique_number, $action);
			return $last_insert_id;
		}	
		public function CompanyCount() {
			$list = 0;
			$list = parent::CompanyCount();
			return $list;
		}
		public function UpdateSQL($table, $update_id, $columns, $values, $action) {
			$msg = "";		
			$msg = parent::UpdateSQL($table, $update_id, $columns, $values, $action);
			return $msg;
		}
		public function getTableColumnValue($table, $column, $value, $return_value) {
			$result = "";
			$result = parent::getTableColumnValue($table, $column, $value, $return_value);
			return $result;
		}
		public function getTableRecords($table, $column, $value) {
			$result = "";		
			$result = parent::getTableRecords($table, $column, $value);
			return $result;
		}

		public function daily_db_backup() {
			$result = "";		
			$result = parent::daily_db_backup();
			return $result;
		}
		public function image_directory() {
			$target_dir = "";		
			$target_dir = parent::image_directory();
			return $target_dir;
		}
		public function front_image_directory() {
			$target_dir = "";		
			$target_dir = parent::front_image_directory();
			return $target_dir;
		}
		public function front_end_description_directory() {
			$target_dir = "";		
			$target_dir = parent::front_end_description_directory();
			return $target_dir;
		}
		public function temp_image_directory() {
			$temp_dir = "";		
			$temp_dir = parent::temp_image_directory();
			return $temp_dir;
		}
		public function clear_temp_image_directory() {
			$res = "";		
			$res = parent::clear_temp_image_directory();
			return $res;
		}
		
		public function check_user_id_ip_address() {
			$check_login_id = "";			
			$check_login_id = parent::check_user_id_ip_address();			
			return $check_login_id;	
		}
		public function checkUser() {
			$login_user_id = "";			
			$login_user_id = parent::checkUser();			
			return $login_user_id;	
		}
		public function getDailyReport($from_date, $to_date) {
			$list = array();
			$list = parent::getDailyReport($from_date, $to_date);
			return $list;
		}
		
		public function send_mobile_details($phone_number, $msg) {
			$res = "";
			$res = parent::send_mobile_details($phone_number, $msg);
			return true;
		}		
		public function automate_number($table, $column) {
			$next_number = "";
			$next_number = parent::automate_number($table, $column);
			return $next_number;
		}
		
		public function getAllRecords($table, $column, $value) {
			$res = "";		
			$res = parent::getAllRecords($table, $column, $value);
			return $res;
		}
		// public function CheckRoleAccessPage($role_id,$permission_page) {
		// 	$access = "";
		// 	$access = parent::CheckRoleAccessPage($role_id,$permission_page);
		// 	return $access;
		// }
		public function CheckRoleAccessPage($bil_company_id,$role_id,$permission_page) {
			$access = "";
			$access = parent::CheckRoleAccessPage($bil_company_id,$role_id,$permission_page);
			return $access;
		}
		public function getOtherCityList($district) {
			$list = array();
			$list = parent::getOtherCityList($district);
			return $list;
		}

		
		public function billing_function_object() {
			$billobj = "";		
			$billobj = new Billing_Functions();
			return $billobj;
		}


		public function CheckUserIDAlreadyExists($user_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$list = array();
			$list = $create_obj->CheckUserIDAlreadyExists($user_id);
			return $list;
		}
		public function CheckProductAlreadyExists($category_id, $dish_id, $product_name) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->CheckProductAlreadyExists($category_id, $dish_id, $product_name);
			return $result;
		}
		public function CheckUserNoAlreadyExists($mobile_number) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$list = array();
			$list = $create_obj->CheckUserNoAlreadyExists($mobile_number);
			return $list;
		}
		public function CheckRoleAlreadyExists($bill_company_id,$lower_case_name) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->CheckRoleAlreadyExists($bill_company_id,$lower_case_name);
			return $result;
		}
		// public function GetProductLinkedCount($product_id) {
		// 	$create_obj = "";
		// 	$create_obj = $this->creation_function_object();
		// 	$result = "";
		// 	$result = $create_obj->GetProductLinkedCount($product_id);
		// 	return $result;
		// }
		
		public function GetRoleLinkedCount($role_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->GetRoleLinkedCount($role_id);
			return $result;
		}

		public function getPermissionId($bill_company_id,$role_id,$module_key) {
			$creationobj = "";
			$creationobj = $this->creation_function_object();
			$result = "";
			$result = $creationobj->getPermissionId($bill_company_id,$role_id,$module_key);
			return $result;
		}

		public function getRolePermissionId($bill_company_id,$role_id,$module_key) {
			$creationobj = "";
			$creationobj = $this->creation_function_object();
			$result = "";
			$result = $creationobj->getRolePermissionId($bill_company_id,$role_id,$module_key);
			return $result;
		}
		public function BillCompanyDetails($bill_company_id, $table) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$bill_company_details = "";
			$bill_company_details = $create_obj->BillCompanyDetails($bill_company_id, $table);
			return $bill_company_details;
		}
		
		
		public function setClearTableRecords($table) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$list = array();
			$list = $create_obj->setClearTableRecords($table);
			return $list;
		}
		public function getClearTableRecords($tables) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->getClearTableRecords($tables);
			return $result;
		}
		public function accessPageAction($bil_company_id,$role_id,$permission_module) {
			$access = "";
			$access = parent::accessPageAction($bil_company_id,$role_id,$permission_module);
			return $access;
		}
		public function CheckStaffAccessPage($staff_id, $bill_company_id, $permission_page) {
			$access = "";
			$access = parent::CheckStaffAccessPage($staff_id, $bill_company_id, $permission_page);
			return $access;
		}


		public function getCategoryParentList($category_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$list = array();
			$list = $create_obj->getCategoryParentList($category_id);
			return $list;
		}
		public function CheckCategoryAlreadyExists($category_name,$edit_id) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();
			$result = "";
			$result = $create_obj->CheckCategoryAlreadyExists($category_name,$edit_id);
			return $result;
		}
		public function getProductID($category_id, $sub_category_id, $lower_case_name) {
			$create_obj = "";
			$create_obj = $this->creation_function_object();

			$product_id = "";
			$product_id = $create_obj->getProductID($category_id, $sub_category_id, $lower_case_name);
			return $product_id;	
		}
		public function getProductList($category_id, $sub_category_id,) {
			$create_obj = "";
			$create_obj = $this->Creation_function_object();

			$list = array();
			$list = $create_obj->getProductList($category_id, $sub_category_id,);
			return $list;	
		}
		public function SortingImages($images, $positions) {
			$create_obj = "";
			$create_obj = $this->Creation_function_object();
			
			$list = array();
			$list = $create_obj->SortingImages($images, $positions);
			return $list;
		}
		public function getCategoryFilterList($parent, $category_id,) {
			$create_obj = "";
			$create_obj = $this->Creation_function_object();

			$list = array();
			$list = $create_obj->getCategoryFilterList($parent, $category_id,);
			return $list;	
		}
		public function getProductListByCategory($category_id, $sub_category_id) {
			$create_obj = "";
			$create_obj = $this->Creation_function_object();

			$list = array();
			$list = $create_obj->getProductListByCategory($category_id, $sub_category_id);
			return $list;	
		}
	}
?>