<?php 
    class Creation_functions extends Basic_Functions{

		public function BillCompanyDetails($bill_company_id, $table) {
			$bill_company_details = "";
			if(!empty($bill_company_id)) {
				$check_company = array();
				$check_company = $this->getTableRecords($GLOBALS['company_table'], 'company_id', $bill_company_id,'');
				if(!empty($check_company)) {
					foreach($check_company as $data) {
						
						if(!empty($data['name'])) {
							$bill_company_details = $this->encode_decode('decrypt', $data['name']);
						}
						if(!empty($data['address'])) {
							$bill_company_details = $bill_company_details."$$$".$this->encode_decode('decrypt', $data['address']);
						}
						if(!empty($data['state'])) {
							$bill_company_details = $bill_company_details."$$$".$this->encode_decode('decrypt', $data['state']);
						}
						if(!empty($data['district'])) {
							$bill_company_details = $bill_company_details."$$$".$this->encode_decode('decrypt', $data['district']);
						}
						if(!empty($data['city'])) {
							$bill_company_details = $bill_company_details."$$$".$this->encode_decode('decrypt', $data['city']);
						}
						if(!empty($data['mobile_number']) && $data['mobile_number'] != $GLOBALS['null_value']) {
							$bill_company_details = $bill_company_details."$$$".$this->encode_decode('decrypt', $data['mobile_number']);
						}
						else {
							$bill_company_details = $bill_company_details."$$$".$GLOBALS['null_value'];
						}
						if(!empty($data['email']) && $data['email'] != $GLOBALS['null_value']) {
							$bill_company_details = $bill_company_details."$$$".$data['email'];
						}
						else {
							$bill_company_details = $bill_company_details."$$$".$GLOBALS['null_value'];
						}
						
					}
				}
				if(!empty($bill_company_details)) {
					$bill_company_details = $this->encode_decode('encrypt', $bill_company_details);
				}
			}
			return $bill_company_details;
		}


        public function getRolePermissionId($bill_company_id,$role_id,$module_key){
			$permission_id ="";
			$list = array(); $select_query = ""; $where = ""; 

			if(!empty($bill_company_id)){
				$where = "bill_company_id = '".$bill_company_id."'";
			}
			
			if(!empty($role_id)){
				if(!empty($where)) {
					$where = $where." AND role_id = '".$role_id."'";
				}
				else {
					$where = "role_id = '".$role_id."'";
				}
			}
			if(!empty($module_key)){
				if(!empty($where)) {
					$where = $where." AND module = '".$module_key."'";
				}
				else {
					$where = "module = '".$module_key."'";
				}
			}
			
			if(!empty($where)) {
				$select_query = "SELECT * FROM ".$GLOBALS['role_permission_table']." WHERE ".$where." AND deleted='0'";    
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['role_permission_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $value) {
                        $permission_id = $value['id'];
                    }
				}
			}
			
			return $permission_id;
		}

        public function getPermissionId($bill_company_id,$role_id,$module_key){
			$list = array(); $select_query = ""; $where = ""; 
			if(!empty($bill_company_id)){
				$where = "bill_company_id = '".$bill_company_id."'";
			}
			if(!empty($role_id)){
				if(!empty($where)) {
					$where = $where." AND role_id = '".$role_id."'";
				}
				else {
					$where = "role_id = '".$role_id."'";
				}
			}
			if(!empty($module_key)){
				if(!empty($where)) {
					$where = $where." AND module = '".$module_key."'";
				}
				else {
					$where = "module = '".$module_key."'";
				}
			}
			
			if(!empty($where)) {
				 $select_query = "SELECT * FROM ".$GLOBALS['role_permission_table']." WHERE ".$where." AND deleted='0'";    
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['role_permission_table'], $select_query);
			}
			
			return $list;
		}

        public function CheckRoleAlreadyExists($bill_company_id,$lower_case_name) {
			$list = array(); $select_query = ""; $role_id = "";
			if(!empty($bill_company_id) && !empty($lower_case_name)) {
				$select_query = "SELECT role_id FROM ".$GLOBALS['role_table']." WHERE bill_company_id = '".$bill_company_id."' AND lower_case_name = '".$lower_case_name."' AND deleted = '0'";
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['role_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['role_id'])) {
							$role_id = $data['role_id'];
						}
					}
				}
			}
			return $role_id;
		}


		// New functions
		public function GetRoleLinkedCount($role_id) {
			$list = array(); $select_query = ""; $where = ""; $count = 0;
			if(!empty($role_id)) {
				$where = "role_id = '".$role_id."' AND";
				$select_query = "SELECT id_count FROM 
									((SELECT COUNT(id) as id_count FROM ".$GLOBALS['user_table']." WHERE ".$where." deleted = '0'))
								as g";
				$list = $this->getQueryRecords('', $select_query);
			}
			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['id_count']) && $data['id_count'] != $GLOBALS['null_value']) {
						$count = $data['id_count'];
					}
				}
			}
			return $count;
		}

		public function CheckUserIDAlreadyExists($user_id) {
			$select_query = ""; $list = array(); $where = ""; $id = "";
			if(!empty($user_id)) {
				$where = "lower_case_login_id = '".$user_id."' AND ";
				$select_query = "SELECT userid FROM 
									((SELECT user_id as userid FROM ".$GLOBALS['user_table']." WHERE ".$where." deleted = '0'))
								as g";
				$list = $this->getQueryRecords('', $select_query);
			}
			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['userid']) && $data['userid'] != $GLOBALS['null_value']) {
						$id = $data['userid'];
					}
				}
			}
			return $id;
		}

		public function CheckUserNoAlreadyExists($mobile_number) {
			$select_query = ""; $list = array(); $where = ""; $id = "";
			if(!empty($mobile_number)) {
				$where = "mobile_number = '".$mobile_number."' AND ";
				$select_query = "SELECT userid FROM 
									((SELECT user_id as userid FROM ".$GLOBALS['user_table']." WHERE ".$where." deleted = '0'))
								as g";
				$list = $this->getQueryRecords('', $select_query);
			}
			if(!empty($list)) {
				foreach($list as $data) {
					if(!empty($data['userid']) && $data['userid'] != $GLOBALS['null_value']) {
						$id = $data['userid'];
					}
				}
			}
			return $id;
		}


		public function setClearTableRecords($tables) {
			$success = 0; $con = $this->connect();
			if(!empty($tables)) {
				foreach($tables as $table) {
					if(!empty($table)) {
						if($table == $GLOBALS['party_table']) {
							$list = array(); $success++;
							$list = $this->getTableRecords($GLOBALS['party_table'], '', '', '');
							if(!empty($list)) {
								foreach($list as $data) {
									$linked_count = 0;
									if(!empty($data['party_id']) && $data['party_id'] != $GLOBALS['null_value']) {
										$linked_count = '0';
										if($linked_count == '0') {
											$columns = array(); 
											$values = array();
											$columns = array('deleted'); 
											$values = array("'1'");
											$party_update_id = $this->UpdateSQL($GLOBALS['party_table'], $data['id'], $columns, $values, '');
										}
									}
								}
							}
						}
						else {
							$table = trim(str_replace("'", "", $table));
							$update_query = "";
							$update_query = "UPDATE ".$table." SET deleted = '1'";
							if(!empty($update_query)) {							
								$result = $con->prepare($update_query);
								if($result->execute() === TRUE) {
									$success++;	
								}
							}
						}
					}
				}
				if($success == count($tables)) {
					$success = 1;
				}
				else {
					$success = "Unable to clear";
				}
			}
			return $success;
		}
		

		public function getClearTableRecords($tables) {
			$success = 0; $con = $this->connect();
			if(!empty($tables)) {
				foreach($tables as $table) {
					if(!empty($table)) {
						if($table == $GLOBALS['product_table']) {
							$list = array(); $success++;
							$list = $this->getTableRecords($GLOBALS['product_table'], '', '', '');
							if(!empty($list)) {
								foreach($list as $data) {
									$linked_count = 0;
									if(!empty($data['product_id']) && $data['product_id'] != $GLOBALS['null_value']) {
										// $linked_count = $this->GetProductLinkedCount($data['product_id']);
										$linked_count = '0';
										if($linked_count == '0') {
											$columns = array(); $values = array();
											$columns = array('deleted'); $values = array("'1'");
											$product_update_id = $this->UpdateSQL($GLOBALS['product_table'], $data['id'], $columns, $values, '');
										}
									}
								}
							}
						}
						else {
							$table = trim(str_replace("'", "", $table));
							$update_query = "";
							$update_query = "UPDATE ".$table." SET deleted = '1'";
							if(!empty($update_query)) {							
								$result = $con->prepare($update_query);
								if($result->execute() === TRUE) {
									$success++;	
								}
							}
						}
					}
				}
				if($success == count($tables)) {
					$success = 1;
				}
				else {
					$success = "Unable to clear";
				}
			}
			return $success;
		}


		public function CheckProductAlreadyExists($category_id, $dish_id, $product_name) {
			$list = array(); $select_query = ""; $product_id = ""; $where = "";

			if(!empty($product_name)) {
				$select_query = "SELECT product_id FROM " . $GLOBALS['product_table'] . " WHERE " . $where . " lower_case_name = '" . $product_name . "' AND category_id ='".$category_id."' AND dish_id = '".$dish_id."' AND deleted = '0'";	
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['product_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['product_id'])) {
							$product_id = $data['product_id'];
						}
					}
				}
			}
			return $product_id;
		}

		public function getCategoryParentList($category_id) {
			$select_query = ""; $list = array(); $where = "";
			$where = "parent_category_id = '" . $GLOBALS['null_value'] . "'";
			if(!empty($category_id)) {
				if(!empty($where)) {
					$where = $where . " AND category_id != '" . $category_id . "' ";
				} else {
					$where = "category_id != '" . $category_id . "' ";
				}
			}
			
			if(!empty($where)) {
				$select_query = "SELECT * FROM " . $GLOBALS['category_table'] . " WHERE " . $where . " AND deleted = '0' AND parent = 'parent'";
			} else {
				$select_query = "SELECT * FROM " . $GLOBALS['category_table'] . " WHERE deleted = '0' AND parent = 'parent'";
			}
			// echo $select_query;
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['category_table'], $select_query);
			}
			return $list;
		}

		public function CheckCategoryAlreadyExists($category_name, $edit_id) {
			$list = array(); $select_query = ""; $category_id = ""; $where = "";

			if(!empty($edit_id)) {
				$where = "category_id != '" .$edit_id . "' AND";
			}
		
			if(!empty($category_name)) {
				$select_query = "SELECT category_id FROM ".$GLOBALS['category_table']." WHERE ".$where." lower_case_name = '".$category_name."' AND deleted = '0'";	
			}
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['category_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $data) {
						if(!empty($data['category_id'])) {
							$category_id = $data['category_id'];
						}
					}
				}
			}
			return $category_id;
		}

		public function getProductID($category_id, $sub_category_id, $lower_case_name) {
			$product_id = ""; $list = array(); $where = "";
			if(!empty($category_id)) {
				$where = "category_id = '".$category_id."'";
			}
			if(!empty($sub_category_id)) {
				if(!empty($where)) {
					$where = $where . " AND sub_category_id = '".$sub_category_id."'";
				} else {
					$where = "sub_category_id = '".$sub_category_id."'";
				}
			}
			if(!empty($lower_case_name)) {
				if(!empty($where)) {
					$where = $where . " AND lower_case_name = '".$lower_case_name."'";
				} else {
					$where = "lower_case_name = '".$lower_case_name."'";
				}
			}
			if(!empty($where)) {
				$select_query = "SELECT product_id FROM ".$GLOBALS['product_table']." WHERE ". $where ." AND deleted = '0'";
				$list = $this->getQueryRecords($GLOBALS['product_table'], $select_query);
				if(!empty($list)) {
					foreach($list as $row) {
						if(!empty($row['product_id'])) {
							$product_id = $row['product_id'];
						}
					}
				}
			}
			return $product_id;
		}

		public function getProductList($category_id, $sub_category_id) {
			$list = array(); $where = "";
			
			if(!empty($category_id)) {
				if(!empty($where)) {
					$where = $where." AND p.category_id = '".$category_id."'";
				}
				else {
					$where = "p.category_id = '".$category_id."'";
				}
			}
			if(!empty($sub_category_id)) {
				if(!empty($where)) {
					$where = $where." AND p.sub_category_id = '".$sub_category_id."'";
				}
				else {
					$where = "p.sub_category_id = '".$sub_category_id."'";
				}
			}
			
			if(!empty($where)) {
				$select_query = "SELECT p.* FROM ".$GLOBALS['product_table']." as p WHERE ".$where." AND p.deleted = '0' ORDER BY p.id DESC";
			}
			else {
				$select_query = "SELECT p.* FROM ".$GLOBALS['product_table']." as p WHERE p.deleted = '0' ORDER BY p.id DESC";
			}
		
			//echo $select_query;
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['product_table'], $select_query);
				//print_r($list);
			}
			return $list;
		}

		public function SortingImages($images, $positions) {
			$sorted_images_list = array(); $image_position_list = array();
			for($i = 0; $i < count($images); $i++) {
				if(!empty($images[$i]) && !empty($positions[$i])) {
					$image_position_list[$i] = array('image' => $images[$i], 'position' => $positions[$i]);
				}
			}
			if(!empty($image_position_list)) {
				$values = array();
				foreach ($image_position_list as $key => $row) {
					$values[$key] = $row['position'];
				}
				array_multisort($values, SORT_ASC, $image_position_list);
				if(!empty($image_position_list)) {
					foreach($image_position_list as $key => $val) {
						if(!empty($val['image'])) {
							$sorted_images_list[] = $val['image'];
						}
					}
				}
			}
			return $sorted_images_list;
		}

		public function getCategoryFilterList($parent,$category_id) {
			$list = array(); $where = "";
			
			if(!empty($category_id)) {
				if(!empty($where)) {
					$where = $where." AND parent_category_id = '".$category_id."'";
				}
				else {
					$where = "parent_category_id = '".$category_id."'";
				}
			}
			if(!empty($parent)) {
				if(!empty($where)) {
					$where = $where." AND parent = '".$parent."'";
				}
				else {
					$where = "parent = '".$parent."'";
				}
			}
			
			if(!empty($where)) {
				$select_query = "SELECT * FROM ".$GLOBALS['category_table']." WHERE ".$where." AND deleted = '0' ORDER BY id DESC";
			}
			else {
				$select_query = "SELECT * FROM ".$GLOBALS['category_table']." WHERE deleted = '0' ORDER BY id DESC";
			}
		
			// echo $select_query;
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['category_table'], $select_query);
				//print_r($list);
			}
			return $list;
		}

		public function getProductListByCategory($category_id, $sub_category_id) {

			$list = array(); $where = ""; $select_query = "";

			if(!empty($sub_category_id)) {
				if(!empty($where)) {
					$where = $where." AND sub_category_id = '".$sub_category_id."'";
				}
				else {
					$where = "sub_category_id = '".$sub_category_id."'";
				}
			}

			if(!empty($category_id)) {
				if(!empty($where)) {
					$where = $where." AND category_id = '".$category_id."' AND sub_category_id = '" . $GLOBALS['null_value'] . "'";
				}
				else {
					$where = "category_id = '".$category_id."' AND sub_category_id = '" . $GLOBALS['null_value'] . "'";
				}
			}

			if(!empty($where)) {
				$select_query = "SELECT * FROM ".$GLOBALS['product_table']." WHERE ".$where." AND deleted = '0' ORDER BY id DESC";
			}
			else {
				$select_query = "SELECT * FROM ".$GLOBALS['product_table']." WHERE deleted = '0' ORDER BY id DESC";
			}
		
			// echo $select_query;
			if(!empty($select_query)) {
				$list = $this->getQueryRecords($GLOBALS['product_table'], $select_query);
				//print_r($list);
			}
			return $list;


		}

    }
	
?>
