<?php
	include("include_files.php");
	
    $login_staff_id = "";
    if(isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id']) && !empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'])) {
        if(!empty($GLOBALS['user_type']) && $GLOBALS['user_type'] != $GLOBALS['admin_user_type']) {
            $login_staff_id = $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'];
            $permission_module = $GLOBALS['category_module'];
        }
    }
    $category_list = array(); $category_id = ""; $parent = ""; $parent_category = ""; $parent_disable = "0";
    if(isset($_REQUEST['show_category_id'])) { 
        $show_category_id = "";
        $show_category_id = $_REQUEST['show_category_id'];

        $parent_category_name = ""; $parent_category_id = ""; $parent = "";
        if (!empty($show_category_id)) {
            $category_list = array();
            $category_list = $obj->getTableRecords($GLOBALS['category_table'], 'category_id', $show_category_id, '');
            if (!empty($category_list)) {
                foreach ($category_list as $data) {
                    if (!empty($data['category_name'])) {
                        $category_name = $obj->encode_decode('decrypt', $data['category_name']);
                    }
                    if (!empty($data['category_id'])) {
                        $category_id =  $data['category_id'];
                    }
                    if (!empty($data['parent_category_name']) && $data['parent_category_name'] != $GLOBALS['null_value']) {
                        $parent_category_name = $data['parent_category_name'];
                    }
                    if (!empty($data['parent_category_id']) && $data['parent_category_id'] != $GLOBALS['null_value']) {
                        $parent_category_id = $data['parent_category_id'];
                    }
                    if (!empty($data['parent'])) {
                        $parent =  $data['parent'];
                    }
                }
            }
        } 
        $child_category_list = $obj->getTableRecords($GLOBALS['category_table'], 'parent_category_id', $category_id);
        if(!empty($show_category_id) && !empty($child_category_list)) {
            $parent_disable = '1';
        }
        $category_list = $obj->getCategoryParentList($category_id);
        ?>

        <form class="poppins pd-20 redirection_form" name="category_form" method="POST">
			<div class="card-header">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">  <?php 
                        if(!empty($show_category_id)){ ?>
                            <div class="h5">Edit Category</div> <?php 
                        } 
                        else { ?>
                            <div class="h5">Add Category</div> <?php
                        } ?>
					</div>
					<div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('category.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
				</div>
			</div>
            <div class="row justify-content-center p-3">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_category_id)) { echo $show_category_id; } ?>">
                <div class="col-lg-3 col-md-6 col-12 py-2 px-lg-1">
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <div class="input-group mb-1">
                                <input type="text" class="form-control shadow-none" id="category_name" name="category_name" value="<?php if (!empty($category_name)) { echo $category_name;} ?>" maxlength="20">
                                <label>Category</label> 
                            </div>
                        </div>
                        <div class="new_smallfnt">Contains Text, Symbols &amp;, -,',.</div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-6 py-2 px-lg-1" <?php if(!empty($parent_disable) && $parent_disable == "1") { echo "style='pointer-events: none; tab-indent: 0;'"; } ?>>
                    <div class="form-group">
                        <div class="form-label-group in-border">
                            <select class="select2 select2-danger" <?php if(!empty($parent_disable) && $parent_disable == "1") { echo 'tabindex="-1"'; } ?> name="parent_category" id="parent_category" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option value="">Select Parent</option>
                                <option value="parent" <?php if(!empty($parent) && $parent == "parent") { echo "selected"; } ?>>Parent</option>
                                <?php
                                    if(!empty($category_list)) {
                                        foreach ($category_list as $data) {
                                            if(!empty($data['category_id']) && $data['category_id'] != $GLOBALS['null_value']) {
                                                ?>
                                                <option value="<?php echo $data['category_id']; ?>" <?php if(!empty($parent_category_id) && $parent_category_id == $data['category_id']) { ?>selected<?php } ?>>
                                                    <?php
                                                        if(!empty($data['category_name']) && $data['category_name'] != $GLOBALS['null_value']) {
                                                            echo $obj->encode_decode('decrypt', $data['category_name']);
                                                        }
                                                    ?>
                                                </option>
                                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </select>
                            <label>Select From Godown</label>
                        </div>
                    </div>       
                </div>
            </div>
            <div class="row justify-content-center">           
                <div class="col-md-12 py-3 text-center">
                    <button class="btn btn-danger" type="button" onClick="Javascript:SaveModalContent(event,'category_form', 'category_changes.php', 'category.php');">
                        Submit
                    </button>
                </div>
            </div>
            <script src="include/select2/js/select2.min.js"></script>
            <script src="include/select2/js/select.js"></script>

        </form>
		<?php
    } 
    
    if (isset($_POST['category_name'])) {
        $category_name = '';
        $category_name_error = "";
        $edit_id = "";
        $single_lower_case_name = "";
        $valid_category = "";
        $form_name = "category_form";
        $category_error = "";
        $single_category_name = "";
        $bill_company_id = "";

        if (isset($_POST['edit_id'])) {
            $edit_id = $_POST['edit_id'];
        }
        
        if (isset($_POST['category_name'])) {
            $single_category_name = $_POST['category_name'];

            if (strlen($single_category_name) > 20) {
                $category_name_err = "Only 20 characters allowed";
                if (!empty($category_name_err)) {
                    $valid_category = $valid->error_display($form_name, "category_name", $category_name_err, 'text');
                }
            }

            // echo ($single_category_name);
            if (!empty($single_category_name)) {
                $category_error = $valid->valid_text_number($single_category_name, "Category Name", "1",'30');
                if (!empty($category_error)) {
                    $valid_category = $valid->error_display($form_name, "category_name", $category_error, 'text');
                }
            } else {
                $category_name_error = "Enter Category Name";
                if (!empty($category_name_error)) {
                    $valid_category = $valid->error_display($form_name, "category_name", $category_name_error, 'text');
                }
            }
            $single_lower_case_name = strtolower($single_category_name);
            $single_lower_case_name = trim($single_lower_case_name);
            $category_name = $obj->encode_decode("encrypt", $single_category_name);
            $lower_case_name = $obj->encode_decode("encrypt", $single_lower_case_name);
        }

        if (isset($_POST['parent_category'])) {
            $parent_category = $_POST['parent_category'];

            // echo ($parent_category);
            $parent_category_error = $valid->common_validation($parent_category, "Category Name", "select");
            if (!empty($parent_category_error)) {
                if(!empty($valid_category)) {
                    $valid_category = $valid_category . $valid->error_display($form_name, "parent_category", $parent_category_error, 'select');
                } else {
                    $valid_category = $valid->error_display($form_name, "parent_category", $parent_category_error, 'select');
                }
            }
        }
    
        $result = "";
        $parent = 'child';$parent_category_id = $parent_category_name = "";
        if (empty($valid_category)) {

            // print_r($_SESSION);
            $check_user_id_ip_address = 0;
            $check_user_id_ip_address = $obj->check_user_id_ip_address();
            if (preg_match("/^\d+$/", $check_user_id_ip_address)) {

                $prev_category_id = "";
                if (!empty($lower_case_name)) {
                    $prev_category_id = $obj->CheckCategoryAlreadyExists($lower_case_name,$edit_id);
                    if (!empty($prev_category_id)) {
                        $category_error = "This Category name - " . $obj->encode_decode("decrypt", $lower_case_name) . " is already exist";
                    }
                }
                if(!empty($parent_category)) {
                    if($parent_category == "parent") {
                        $parent = 'parent';
                        $parent_category_name = $GLOBALS['null_value'];
                        $parent_category_id = $GLOBALS['null_value'];
                    } else {
                        $parent_category_id = $parent_category;
                        $parent_category_name = $obj->getTableColumnValue($GLOBALS['category_table'],'category_id', $parent_category, 'category_name');
                    }
                }
                $created_date_time = $GLOBALS['create_date_time_label'];
                $creator = $GLOBALS['creator'];
                $bill_company_id = $GLOBALS['bill_company_id'];

                $creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
                if (empty($edit_id)) {
                    if (empty($prev_category_id) && (empty($category_error))) {
                        $action = array();
                        if (!empty($category_name)) {
                            $action = "New Category Created. Name - " . $obj->encode_decode('decrypt', $category_name);
                        }

                        $null_value = $GLOBALS['null_value'];
                        $columns = array('created_date_time', 'creator', 'creator_name', 'category_id', 'category_name','parent_category_id', 'parent_category_name', 'lower_case_name', 'parent', 'deleted');
                        $values = array("'" . $created_date_time . "'", "'" . $creator . "'", "'" . $creator_name . "'", "'" . $null_value . "'", "'" . $category_name . "'", "'" . $parent_category_id . "'", "'" . $parent_category_name . "'", "'" . $lower_case_name . "'","'" . $parent . "'", "'0'");
                        $category_insert_id = $obj->InsertSQL($GLOBALS['category_table'], $columns, $values, 'category_id', '', $action);		
                        if(preg_match("/^\d+$/", $category_insert_id)) {								
                            $result = array('number' => '1', 'msg' => 'Category Successfully Created');						
                        }
                        else {
                            $result = array('number' => '2', 'msg' => $category_insert_id);
                        }
                    } else {
                        $result = array('number' => '2', 'msg' => $category_error);
                    }
                } else if (!empty($edit_id) && (empty($category_error))) {
                    $getUniqueID = "";
                    $getUniqueID = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $edit_id, 'id');
                    if (preg_match("/^\d+$/", $getUniqueID)) {
                        $action = "";
                        if (!empty($category_name)) {
                            $action = "Category Updated. Name - " . $obj->encode_decode('decrypt', $category_name);
                        }
                        $creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
    
                        $columns = array();
                        $values = array();
                        $columns = array('creator_name', 'category_name','parent_category_id', 'parent_category_name', 'lower_case_name', 'parent');
                        $values = array("'" . $creator_name . "'", "'" . $category_name . "'", "'" . $parent_category_id . "'", "'" . $parent_category_name . "'", "'" . $lower_case_name . "'","'" . $parent . "'");
                        $category_update_id = $obj->UpdateSQL($GLOBALS['category_table'], $getUniqueID, $columns, $values, $action);
                        if (preg_match("/^\d+$/", $category_update_id)) {
                            $result = array('number' => '1', 'msg' => 'Updated Successfully');
                        } else {
                            $result = array('number' => '2', 'msg' => $category_update_id);
                        }
                    }
                } else {
                    $result = array('number' => '2', 'msg' => $category_error);
                }
            } else {
                $result = array('number' => '2', 'msg' => 'Invalid IP');
            }
        } else {
            if (!empty($valid_category)) {
                $result = array('number' => '3', 'msg' => $valid_category);
            }
        }
    
        if (!empty($result)) {
            $result = json_encode($result);
        }
        echo $result;
        exit;
    }

    if(isset($_POST['page_number'])) {
		$page_number = $_POST['page_number'];
		$page_limit = $_POST['page_limit'];
		$page_title = $_POST['page_title']; 

        $search_text = "";
        if (isset($_POST['search_text'])) {
            $search_text = $_POST['search_text'];
        }
    
        $total_records_list = array();
        $total_records_list = $obj->getTableRecords($GLOBALS['category_table'], '', '','');
    
        if (!empty($search_text)) {
            $search_text = strtolower($search_text);
            $list = array();
            if (!empty($total_records_list)) {
                foreach ($total_records_list as $val) {
                    if ((strpos(strtolower(html_entity_decode($obj->encode_decode('decrypt', $val['category_name']))), $search_text) !== false)) {
                        $list[] = $val;
                    }
                }
            }
            $total_records_list = $list;
        }
    
        $total_pages = 0;
        $total_pages = count($total_records_list);
    
        $page_start = 0;
        $page_end = 0;
        if (!empty($page_number) && !empty($page_limit) && !empty($total_pages)) {
            if ($total_pages > $page_limit) {
                if ($page_number) {
                    $page_start = ($page_number - 1) * $page_limit;
                    $page_end = $page_start + $page_limit;
                }
            } else {
                $page_start = 0;
                $page_end = $page_limit;
            }
        }
    
        $show_records_list = array();
        if (!empty($total_records_list)) {
            foreach ($total_records_list as $key => $val) {
                if ($key >= $page_start && $key < $page_end) {
                    $show_records_list[] = $val;
                }
            }
        }
    
        $prefix = 0;
        if (!empty($page_number) && !empty($page_limit)) {
            $prefix = ($page_number * $page_limit) - $page_limit;
        }
    
        if ($total_pages > $page_limit) { ?>
            <div class="pagination_cover mt-3"> <?php
                include("pagination.php"); ?>
            </div> <?php 
        }
        $access_error = "";
        if(!empty($login_staff_id)) {
            $permission_action = $view_action;
            include('permission_action.php');
        }
        if(empty($access_error)) { ?>

            <table class="table nowrap cursor text-center smallfnt">
                <thead class="bg-light">
                    <tr>
                        <th>S.No</th>
                        <th>Category Name</th>
                        <th>Parent Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody> <?php
                    if (!empty($show_records_list)) {
                        $count_category = 0;
                        foreach ($show_records_list as $key => $list) {

                            $index = $key + 1;
    
                            if (!empty($prefix)) {
                                $index = $index + $prefix;
                            } ?>
                            <tr style="cursor:default;">
                                <td><?php echo $index; ?></td>
                                <td class="text-center"> <?php
                                    $category_name = "";
                                    if (!empty($list['category_name'])) {
                                        $category_name = $list['category_name'];
                                        $category_name = $obj->encode_decode('decrypt', $category_name);
                                        echo $category_name;
                                    } ?>
                                </td>
                                <td class="text-center"> <?php
                                    $parent_category_name = "";
                                    if (!empty($list['parent_category_name']) && $list['parent_category_name'] != $GLOBALS['null_value']) {
                                        $parent_category_name = $list['parent_category_name'];
                                        $parent_category_name = $obj->encode_decode('decrypt', $parent_category_name);
                                        echo $parent_category_name;
                                    } else {
                                        echo "-";
                                    } ?>
                                </td>
                                <td>
                                    <?php 
                                        $edit_access_error = "";
                                        if(!empty($login_staff_id)) {
                                            $permission_action = $edit_action;
                                            include('permission_action.php');
                                        }
                                        $delete_access_error = "";
                                        if(!empty($login_staff_id)) {
                                            $permission_action = $delete_action;
                                            include('permission_action.php');
                                        }
                                    ?>
                                    <?php if(empty($edit_access_error) || empty($delete_access_error)){ ?>
                                        <div class="dropdown">
                                            <a href="#" role="button" class="btn btn-dark py-1 px-1" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1"> 
                                                <?php
                                                if(empty($edit_access_error)) { ?> 
                                                    <li><a class="dropdown-item" href="Javascript:ShowModalContent('<?php if (!empty($page_title)) { echo $page_title; } ?>', '<?php if (!empty($list['category_id'])) { echo $list['category_id']; } ?>');"><i class="fa fa-pencil"></i> &ensp;Edit </a> </li> <?php 
                                                }
                                               
                                                if(empty($delete_access_error)) {
                                                    $linked = "";
                                                    $linked = "";
                                                    $linked = $obj->getTableColumnValue($GLOBALS['category_table'], 'parent_category_id',$list['category_id'], 'id');
                                                    if(!empty($linked)) { ?>
                                                        <span title="This can't be deleted">
                                                            <a class="dropdown-item" style="pointer-events: none; cursor: default;" > <i class="fa fa-trash text-secondary" title="delete"></i> &ensp;Delete</a>
                                                        </span> <?php 
                                                    } 
                                                    else { ?>
                                                        <li><a class="dropdown-item" href="Javascript:DeleteModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($list['category_id'])) { echo $list['category_id']; } ?>');"><i class="fa fa-trash"></i> &ensp;Delete</a></li> <?php
                                                    }
                                                } ?>
                                            </ul>
                                        </div> 
                                    <?php } ?>
                                </td>
                            </tr> <?php
                        }
                    } 
                    else { ?>
                        <tr>
                            <td colspan="3" class="text-center">Sorry! No records found</td>
                        </tr> <?php 
                    }  ?>
                </tbody>
            </table> <?php 
        }
    }
    
    if (isset($_REQUEST['delete_category_id'])) {
        $delete_category_id = $_REQUEST['delete_category_id'];
        $msg = "";
        if (!empty($delete_category_id)) {
            $category_unique_id = "";
            $category_unique_id = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $delete_category_id, 'id');
            if (preg_match("/^\d+$/", $category_unique_id)) {
                $category_name = "";
                $category_name = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $delete_category_id, 'category_name');

                $action = "";
                if (!empty($category_name)) {
                    $action = "category Deleted. Name - " . $obj->encode_decode('decrypt', $category_name);
                }
                $linked = "";
                $linked = $obj->getTableColumnValue($GLOBALS['category_table'], 'parent_category_id', $delete_category_id, 'id');
                if(empty($linked)) {
                    $columns = array();
                    $values = array();
                    $columns = array('deleted');
                    $values = array("'1'");
                    $msg = $obj->UpdateSQL($GLOBALS['category_table'], $category_unique_id, $columns, $values, $action);
                }
                else {
                    $msg = "This category is associated with other screens";
                }
            }
        }
        echo $msg;
        exit;
    }

    