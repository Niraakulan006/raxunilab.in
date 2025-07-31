<?php
	include("include_files.php");
	
    if(isset($_REQUEST['show_daily_updates_id'])) { 
        $show_daily_updates_id = $_REQUEST['show_daily_updates_id'];
        $daily_updates_name = ""; $description = "";
        if(!empty($show_daily_updates_id)) {
            $daily_updates_list = array();
            $daily_updates_list = $obj->getTableRecords($GLOBALS['daily_updates_table'], 'daily_updates_id', $show_daily_updates_id, '');
            if(!empty($daily_updates_list)) {
                foreach ($daily_updates_list as $data) {
                    if(!empty($data['daily_updates_name']) && $data['daily_updates_name'] != $GLOBALS['null_value']) {
                        $daily_updates_name = $obj->encode_decode('decrypt', $data['daily_updates_name']);
                    }
                    if(!empty($data['description']) && $data['description'] != $GLOBALS['null_value']) {
                        $description = $obj->encode_decode('decrypt', $data['description']);
                    }
                }
            }
        } 

        ?>
        
        <form class="poppins pd-20 redirection_form" name="daily_updates_form" method="POST">
			<div class="card-header">
				<div class="row p-2">
                    
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
                        <?php if(!empty($show_daily_updates_id)){ ?>
                            <div class="h5">Edit Daily Updates</div>
                        <?php 
                        } else{ ?>
                            <div class="h5">Add Daily Updates</div>
                        <?php
                        } ?>
					</div>
					<div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('daily_updates.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div>
				</div>
			</div>
            <div class="row p-3">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_daily_updates_id)) { echo $show_daily_updates_id; } ?>">
                <div class="col-lg-3 col-md-4 col-12 py-2 px-lg-1">
                    <div class="form-group pb-3">
                        <div class="form-label-group in-border">
                            <input type="text" id="daily_updates_name" name="daily_updates_name" value="<?php if(!empty($daily_updates_name)) { echo $daily_updates_name; } ?>" class="form-control shadow-none" onkeydown="Javascript:KeyboardControls(this,'',30,'');">
                            <label>Name <span class="text-danger">*</span></label>
                        </div>
                        <div class="new_smallfnt">Contains Text, Symbols &amp;, -,',.</div>
                    </div>
                </div>
                
                <div class="col-lg-9 col-md-12 col-12">
                    <div class="form-group">
                        <div class="description">
                            <label class="form-control-label">Description</label>
                            <input type="hidden" name="description_content" value="" class="form-control shadow-none">
                            <div class="w-100 description">
                                <textarea name="description" id="description" class="form-control" rows="3"><?php if(!empty($description)) { echo $description; } ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 pt-3 text-center">
                    <button class="btn btn-danger" type="button" onClick="Javascript:SaveModalContent(event,'daily_updates_form', 'daily_updates_changes.php', 'daily_updates.php');">
                        Submit
                    </button>
                </div>
            </div>
            <script src="include/select2/js/select2.min.js"></script>
            <script src="include/select2/js/select.js"></script>

            <script src="include/tinymce/js/tinymce/tinymce.min.js"></script>


            <script>
                tinymce.init({
                    selector: 'textarea#description',
                    height: 500,
                    automatic_uploads: true,
                    menubar: 'file edit view insert format tools table help',
                    plugins: [
                        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                        'insertdatetime', 'media', 'table', 'help', 'wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                        'bold italic underline | alignleft aligncenter alignright | ' +
                        'bullist numlist outdent indent | link image media table | ' +
                        'charmap preview code fullscreen',
                    
                    // ✅ COMMA FIXED ABOVE
                    images_upload_handler: function (blobInfo, success, failure) {
                        success("data:" + blobInfo.blob().type + ";base64," + blobInfo.base64());
                    }
                });
            </script>



        </form>
		<?php
    } 

    if(isset($_POST['daily_updates_name'])) {
     	
        $daily_updates_name = ""; $daily_updates_name_error = ""; $description = ""; $description_error = ""; $edit_id = "";
		$valid_daily_updates = ""; $form_name = "daily_updates_form"; $daily_updates_error = ""; $error_daily_updates = "";
        
       
        if(isset($_POST['daily_updates_name'])){
            $daily_updates_name = $_POST['daily_updates_name'];
            if(strlen($daily_updates_name) > 30){
                $daily_updates_name_error = "Only 30 characters allowed";
            }
            else{
                $daily_updates_name_error = $valid->valid_name_text($daily_updates_name,'Daily Updates Name','1');
            }
            if(!empty($daily_updates_name_error)){
                if(!empty($valid_daily_updates)){
                    $valid_daily_updates = $valid_daily_updates." ".$valid->error_display($form_name,'daily_updates_name',$daily_updates_name_error,'text');
                }
                else{
                    $valid_daily_updates = $valid->error_display($form_name,'daily_updates_name',$daily_updates_name_error,'text');
                }
            }
        }

        if(isset($_POST['description'])){
            $description = $_POST['description'];
            if(empty($description)){
                $description_error = "Enter Description";
            }
            // if(!empty($description_error)){
            //     if(!empty($valid_daily_updates)){
            //         $valid_daily_updates = $valid_daily_updates." ".$valid->error_display($form_name,'description',$description_error,'select');
            //     }
            //     else{
            //         $valid_daily_updates = $valid->error_display($form_name,'description',$description_error,'select');
            //     }
            // }

            if(!empty($description_error)){
                $daily_updates_error = $description_error;
            }
        }


        

		if(isset($_POST['edit_id'])) {
			$edit_id = $_POST['edit_id'];
		}
        
		$result = ""; $lower_case_name = ""; $prev_daily_updates_id = ""; 	
		
		if(empty($valid_daily_updates) && empty($daily_updates_error)) {
			$check_user_id_ip_address = 0;
			$check_user_id_ip_address = $obj->check_user_id_ip_address();	
			if(preg_match("/^\d+$/", $check_user_id_ip_address)) {
                if(!empty($daily_updates_name)) {
                    $daily_updates_name = htmlentities($daily_updates_name, ENT_QUOTES);
                    $lower_case_name = strtolower($daily_updates_name);
                    $lower_case_name = htmlentities($lower_case_name, ENT_QUOTES);
					$daily_updates_name = $obj->encode_decode('encrypt', $daily_updates_name); 
                    $lower_case_name = $obj->encode_decode('encrypt', $lower_case_name);
                }

				$bill_company_id = $GLOBALS['bill_company_id'];
				
				if(!empty($description)) {
                    $description = $obj->encode_decode('encrypt', $description);
                }
				else {
					$description = $GLOBALS['null_value'];
				}
	            

				$prev_daily_updates_id = "";
				if(!empty($daily_updates_name)){
					$prev_daily_updates_id = $obj->getTableColumnValue($GLOBALS['daily_updates_table'],'daily_updates_name',$daily_updates_name,'daily_updates_id');
					if(!empty($prev_daily_updates_id)){
						$error_daily_updates = $obj->getTableColumnValue($GLOBALS['daily_updates_table'],'daily_updates_id',$prev_daily_updates_id,'daily_updates_name');
						$error_daily_updates = $obj->encode_decode("decrypt",$error_daily_updates);
						$daily_updates_error = "This Updates Name already exists in ".$error_daily_updates;
					}
				}

         
				$created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
				$creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
              
                
				if(empty($edit_id)) {
					if(empty($prev_daily_updates_id)) {
						
                        $action = "";
                        if(!empty($daily_updates_name)) {
                            $action = "New Update Name Created - ".$obj->encode_decode("decrypt",$daily_updates_name);
                        }

                        $null_value = $GLOBALS['null_value'];
                        $columns = array('created_date_time', 'creator', 'creator_name','bill_company_id', 'daily_updates_id', 'daily_updates_name','lower_case_name', 'description','deleted');
                        $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'","'".$bill_company_id."'", "'".$null_value."'", "'".$daily_updates_name."'", "'".$lower_case_name."'","'".$description."'","'0'");
                        $daily_updates_insert_id = $obj->InsertSQL($GLOBALS['daily_updates_table'], $columns, $values, 'daily_updates_id', '', $action);			
                        if(preg_match("/^\d+$/", $daily_updates_insert_id)) {
                            $daily_updates_id = "";
                            $daily_updates_id = $obj->getTableColumnValue($GLOBALS['daily_updates_table'], 'id', $daily_updates_insert_id, 'daily_updates_id');	
                            $result = array('number' => '1', 'msg' => 'Daily Updates Successfully Created','daily_updates_id' => $daily_updates_id);
                        }
                        else {
                            $result = array('number' => '2', 'msg' => $daily_updates_insert_id);
                        }
						
						
					}
					else {
						$result = array('number' => '2', 'msg' => $daily_updates_error);
					}	
				}
				else {
					if(empty($prev_daily_updates_id) || $prev_daily_updates_id == $edit_id) {
						
                        $getUniqueID = "";
                        $getUniqueID = $obj->getTableColumnValue($GLOBALS['daily_updates_table'], 'daily_updates_id', $edit_id, 'id');
                        $daily_updates_id = $edit_id;
                        if(preg_match("/^\d+$/", $getUniqueID)) {
                            $action = "";
                            if(!empty($daily_updates_name)) {
                                $action = "Daily Update Updated.";
                            }

                            $columns = array(); $values = array();			
                            $columns = array('creator_name','daily_updates_name', 'lower_case_name', 'description');
                            $values = array( "'".$creator_name."'","'".$daily_updates_name."'", "'".$lower_case_name."'","'".$description."'");
                            $daily_updates_update_id = $obj->UpdateSQL($GLOBALS['daily_updates_table'], $getUniqueID, $columns, $values, $action);
                            if(preg_match("/^\d+$/", $daily_updates_update_id)) {
                                $result = array('number' => '1', 'msg' => 'Updated Successfully');					
                            }
                            else {
                                $result = array('number' => '2', 'msg' => $daily_updates_update_id);
                            }							
                        }
						
					}
					else {
						$result = array('number' => '2', 'msg' => $daily_updates_error);
					}
                }	

			}
			else {
				$result = array('number' => '2', 'msg' => 'Invalid IP');
			}
		}
		else {
			if(!empty($valid_daily_updates)) {
				$result = array('number' => '3', 'msg' => $valid_daily_updates);
			}
            if(!empty($daily_updates_error)) {
				$result = array('number' => '2', 'msg' => $daily_updates_error);
			}
		}
		
		if(!empty($result)) {
			$result = json_encode($result);
		}
		echo $result; exit;
	}

    if(isset($_POST['page_number'])) {
		$page_number = $_POST['page_number'];
		$page_limit = $_POST['page_limit'];
		$page_title = $_POST['page_title']; 

        $search_text = "";
		if(isset($_POST['search_text'])) {
		   $search_text = $_POST['search_text'];
		}

        $total_records_list = array();
		if(!empty($GLOBALS['bill_company_id'])) {
			$total_records_list = $obj->getTableRecords($GLOBALS['daily_updates_table'],'','','');
		}

       if(!empty($search_text)) {
            $search_text = strtolower($search_text);
            $list = array();
            if(!empty($total_records_list)) {
                foreach($total_records_list as $val) {
                    if(strpos(strtolower($obj->encode_decode('decrypt', $val['daily_updates_name'])), $search_text) !== false) {
                        $list[] = $val;
                    }
                }
            }
            $total_records_list = $list;
        }

        $total_pages = 0;	
		$total_pages = count($total_records_list);
		
		$page_start = 0; $page_end = 0;
		if(!empty($page_number) && !empty($page_limit) && !empty($total_pages)) {
			if($total_pages > $page_limit) {
				if($page_number) {
					$page_start = ($page_number - 1) * $page_limit;
					$page_end = $page_start + $page_limit;
				}
			}
			else {
				$page_start = 0;
				$page_end = $page_limit;
			}
		}

		$show_records_list = array();
        if(!empty($total_records_list)) {
            foreach($total_records_list as $key => $val) {
                if($key >= $page_start && $key < $page_end) {
                    $show_records_list[] = $val;
                }
            }
        }
		
		$prefix = 0;
		if(!empty($page_number) && !empty($page_limit)) {
			$prefix = ($page_number * $page_limit) - $page_limit;
		} ?>
        
		<?php if($total_pages > $page_limit) { ?>
			<div class="pagination_cover mt-3"> 
				<?php
					include("pagination.php");
				?> 
			</div> 
		<?php }
        $access_error = "";
        if(!empty($login_staff_id)) {
            $permission_action = $view_action;
            include('permission_action.php');
        }
		if(empty($access_error)) { 
        ?>
		<table class="table nowrap cursor text-center smallfnt">
            <thead class="bg-light">
                <tr style="white-space:pre;">
                    <th>S.No</th>
                    <th>Daily Updates Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                        if(!empty($show_records_list)) { 
                            foreach($show_records_list as $key => $data) {
                                $index = $key + 1;
                                if(!empty($prefix)) { $index = $index + $prefix; } 
                    ?>
                                <tr>
                                    <td class="ribbon-header" style="cursor:default;">   
                                        <?php  echo $index; ?>
                                    </td>
                                    <td>
                                        <?php
                                            if(!empty($data['daily_updates_name'])) {
                                                $data['daily_updates_name'] = $obj->encode_decode('decrypt', $data['daily_updates_name']);
                                                echo $data['daily_updates_name'];
                                            }
                                        ?>
                                        <div class="w-100 py-2">
                                            Creator :
                                            <?php
                                                if(!empty($data['creator_name'])) {
                                                    $data['creator_name'] = $obj->encode_decode('decrypt', $data['creator_name']);
                                                    echo $data['creator_name'];
                                                }
                                            ?>                                        
                                        </div>
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
                                        if(empty($edit_access_error) || empty($delete_access_error)){ ?>
                                        <div class="dropdown">
                                           <a href="#" role="button" id="dropdownMenuLink1" class="btn btn-dark show-button" class="btn btn-dark show-button poppins" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                              
                                                <li><a class="dropdown-item" href="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($data['daily_updates_id'])) { echo $data['daily_updates_id']; } ?>');"><i class="fa fa-pencil"></i> &ensp;Edit</a></li>
                                                
                                                    <?php 
                                                       
                                                if(empty($delete_access_error)) {
                                                    $linked_count = 0;
                                                    // $linked_count = $obj->GetDailyUpdatesLinkedCount($data['daily_updates_id']); 
                                                    if($linked_count > 0) {
                                                    ?>                             
                                                <li><a class="dropdown-item" style="cursor:pointer; color: #22223057 !important"><i class="fa fa-trash"></i> &ensp; Delete</a></li>
                                                <?php 
                                                    }
                                                    else {
                                                ?>
                                                <li><a class="dropdown-item" href="Javascript:DeleteModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($data['daily_updates_id'])) { echo $data['daily_updates_id']; } ?>');"><i class="fa fa-trash"></i> &ensp; Delete</a></li>
                                                            
                                                <?php 
                                                        }
                                                    } 
                                                ?>
                                            </ul>
                                        </div> 
                                        <?php } ?>
                                    </td>
                                </tr>
                    <?php 
                            } 
                        }  
                        else {
                    ?>
                            <tr>
                                <td colspan="6" class="text-center">Sorry! No records found</td>
                            </tr>
                    <?php 
                        } 
                    ?>
                </tbody>
        </table>
                      
		<?php	
        }
	}

    if(isset($_REQUEST['delete_daily_updates_id'])) {
        $delete_daily_updates_id = $_REQUEST['delete_daily_updates_id'];
        $msg = "";
        if(!empty($delete_daily_updates_id)) {
            $daily_updates_unique_id = "";
            $daily_updates_unique_id = $obj->getTableColumnValue($GLOBALS['daily_updates_table'], 'daily_updates_id', $delete_daily_updates_id, 'id');
            if(preg_match("/^\d+$/", $daily_updates_unique_id)) {
                $daily_updates_name = "";
                $daily_updates_name = $obj->getTableColumnValue($GLOBALS['daily_updates_table'], 'daily_updates_id', $delete_daily_updates_id, 'daily_updates_name');

                $action = "";
                if(!empty($daily_updates_name)) {
                    $action = "Daily Updates Deleted. Name - " . $obj->encode_decode('decrypt', $daily_updates_name);
                }
                $linked_count = "";
                $linked_count = 0;
                // $linked_count = $obj->GetDailyUpdatesLinkedCount($delete_daily_updates_id);
                if(empty($linked_count)) {
                    $columns = array();
                    $values = array();
                    $columns = array('deleted');
                    $values = array("'1'");
                    $msg = $obj->UpdateSQL($GLOBALS['daily_updates_table'], $daily_updates_unique_id, $columns, $values, $action);
                }
                else {
                    $msg = "This Daily Updates is associated with other screens";
                }
            }
        }
        echo $msg;
        exit;
    }


    
?>