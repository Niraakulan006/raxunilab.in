<?php
	include("include.php");

    if(isset($_POST['home_banner_position'])) {
        $home_banner_position = ""; $home_banner_position_error = "";

        $desktop_home_banner_name = array(); $desktop_home_banner = ""; $desktop_home_banner_name_position = array(); $desktop_home_banner_position = "";
        $home_banner_position_error = ""; $desktop_home_banner_name_category_id = array(); $desktop_home_banner_category_id = "";

        $mobile_home_banner_name = array(); $mobile_home_banner = ""; $mobile_home_banner_name_position = array(); $mobile_home_banner_position = "";
        $mobile_home_banner_name_category_id = array(); $mobile_home_banner_category_id = "";

        $home_banner_position = $_POST['home_banner_position'];
        $home_banner_position = trim($home_banner_position);

        if(empty($home_banner_position)) {
            $home_banner_position_error = "Home banner position is missing";
        }

        if(isset($_POST['desktop_home_banner_name'])) {
            $desktop_home_banner_name = $_POST['desktop_home_banner_name'];	
        }
        $desktop_image_upload = 0;
        if(!empty($desktop_home_banner_name)) {
            for($i = 0; $i < count($desktop_home_banner_name); $i++) {
                $desktop_home_banner_name[$i] = trim($desktop_home_banner_name[$i]);
                if(!empty($desktop_home_banner_name[$i])) {
                    $desktop_image_upload = 1;
                }
                else {
                    $desktop_image_upload = 0;
                }
            }
        }
        if(empty($desktop_image_upload)) {
            if(!empty($home_banner_position_error)) {
                $home_banner_position_error = $home_banner_position_error." <br> Select the desktop home banner";
            }
            else {
                $home_banner_position_error = "Select the desktop home banner";
            }
        }

        $desktop_position_error = ""; $desktop_positions = array();
        if(!empty($desktop_image_upload) && $desktop_image_upload == 1) {
            if(isset($_POST['desktop_home_banner_name_position'])) {
                $desktop_home_banner_name_position = $_POST['desktop_home_banner_name_position'];	
            }
            $desktop_image_position_upload = 0;
            if(!empty($desktop_home_banner_name_position)) {
                for($i = 0; $i < count($desktop_home_banner_name_position); $i++) {
                    $desktop_home_banner_name_position[$i] = trim($desktop_home_banner_name_position[$i]);
                    if(!empty($desktop_home_banner_name_position[$i])) {
                        if(preg_match("/^\d+$/", $desktop_home_banner_name_position[$i])) {
                            if(!in_array($desktop_home_banner_name_position[$i], $desktop_positions)) {
                                $desktop_positions[] = $desktop_home_banner_name_position[$i];
                                $desktop_image_position_upload = 1;
                            }
                            else{
                                $desktop_position_error = "Repeat desktop banner Position";
                                $desktop_image_position_upload = 0;
                            }                            
                        }
                        else {
                            $desktop_position_error = "Invalid desktop banner Position";
                            $desktop_image_position_upload = 0;
                        }
                    }
                    else {
                        $desktop_position_error = "Empty desktop banner Position";
                        $desktop_image_position_upload = 0;
                    }
                }
            }
            if(empty($desktop_image_position_upload) && !empty($desktop_position_error)) {
                if(!empty($home_banner_position_error)) {
                    $home_banner_position_error = $home_banner_position_error."<br>".$desktop_position_error;
                }
                else {
                    $home_banner_position_error = $desktop_position_error;
                }
            }
        }

        $desktop_category_error = ""; $desktop_category_ids = array();
        if(!empty($desktop_image_upload) && $desktop_image_upload == 1) {
            if(isset($_POST['desktop_home_banner_name_category_id'])) {
                $desktop_home_banner_name_category_id = $_POST['desktop_home_banner_name_category_id'];	
            }
            $desktop_image_category_upload = 0;
            if(!empty($desktop_home_banner_name_category_id)) {
                for($i = 0; $i < count($desktop_home_banner_name_category_id); $i++) {
                    $desktop_home_banner_name_category_id[$i] = trim($desktop_home_banner_name_category_id[$i]);
                    if(!empty($desktop_home_banner_name_category_id[$i])) {
                        if($desktop_home_banner_name_category_id[$i] == "all") {
                            if(!in_array($desktop_home_banner_name_category_id[$i], $desktop_category_ids)) {
                                $desktop_category_ids[] = $desktop_home_banner_name_category_id[$i];
                                $desktop_image_category_upload = 1;
                            }
                            else{
                                $desktop_category_error = "Repeat desktop banner category";
                                $desktop_image_category_upload = 0;
                            }
                        }
                        else {
                            $category_unique_id = "";
                            $category_unique_id = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $desktop_home_banner_name_category_id[$i], 'id');
                            if(preg_match("/^\d+$/", $category_unique_id)) {
                                if(!in_array($desktop_home_banner_name_category_id[$i], $desktop_category_ids)) {
                                    $desktop_category_ids[] = $desktop_home_banner_name_category_id[$i];
                                    $desktop_image_category_upload = 1;
                                }
                                else{
                                    $desktop_category_error = "Repeat desktop banner category";
                                    $desktop_image_category_upload = 0;
                                }                            
                            }
                            else {
                                $desktop_category_error = "Invalid desktop banner category";
                                $desktop_image_category_upload = 0;
                            }
                        }
                    }
                    else {
                        //$desktop_category_error = "Select desktop banner category";
                        $desktop_image_category_upload = 0;
                    }
                }
            }
            if(empty($desktop_image_category_upload) && !empty($desktop_category_error)) {
                if(!empty($home_banner_position_error)) {
                    $home_banner_position_error = $home_banner_position_error."<br>".$desktop_category_error;
                }
                else {
                    $home_banner_position_error = $home_banner_position_error;
                }
            }
        }

        if(isset($_POST['mobile_home_banner_name'])) {
            $mobile_home_banner_name = $_POST['mobile_home_banner_name'];	
        }
        $mobile_image_upload = 0;
        if(!empty($mobile_home_banner_name)) {
            for($i = 0; $i < count($mobile_home_banner_name); $i++) {
                $mobile_home_banner_name[$i] = trim($mobile_home_banner_name[$i]);
                if(!empty($mobile_home_banner_name[$i])) {
                    $mobile_image_upload = 1;
                }
                else {
                    $mobile_image_upload = 0;
                }
            }
        }

        if(!empty($mobile_image_upload) && $mobile_image_upload == 1) {
            $mobile_position_error = ""; $mobile_positions = array();
            if(isset($_POST['mobile_home_banner_name_position'])) {
                $mobile_home_banner_name_position = $_POST['mobile_home_banner_name_position'];	
            }
            $mobile_image_position_upload = 0; $mobile_positions = array();
            if(!empty($mobile_home_banner_name_position)) {
                for($i = 0; $i < count($mobile_home_banner_name_position); $i++) {
                    $mobile_home_banner_name_position[$i] = trim($mobile_home_banner_name_position[$i]);
                    if(!empty($mobile_home_banner_name_position[$i])) {
                        if(preg_match("/^\d+$/", $mobile_home_banner_name_position[$i])) {
                            if(!in_array($mobile_home_banner_name_position[$i], $mobile_positions)) {
                                $mobile_positions[] = $mobile_home_banner_name_position[$i];
                                $mobile_image_position_upload = 1;
                            }
                            else {
                                $mobile_position_error = "Repeat mobile banner Position";
                                $mobile_image_position_upload = 0;
                            }
                        }
                        else {
                            $mobile_position_error = "Invalid mobile banner Position";
                            $mobile_image_position_upload = 0;
                        }
                    }
                    else {
                        $mobile_position_error = "Empty mobile banner Position";
                        $mobile_image_position_upload = 0;
                    }
                }
            }
            if(empty($mobile_image_position_upload) && !empty($mobile_position_error)) {
                if(!empty($home_banner_position_error)) {
                    $home_banner_position_error = $home_banner_position_error."<br>".$mobile_position_error;
                }
                else {
                    $home_banner_position_error = $mobile_position_error;
                }
            }
        }

        $mobile_category_error = ""; $mobile_category_ids = array();
        if(!empty($mobile_image_upload) && $mobile_image_upload == 1) {
            if(isset($_POST['mobile_home_banner_name_category_id'])) {
                $mobile_home_banner_name_category_id = $_POST['mobile_home_banner_name_category_id'];	
            }
            $mobile_image_category_upload = 0;
            if(!empty($mobile_home_banner_name_category_id)) {
                for($i = 0; $i < count($mobile_home_banner_name_category_id); $i++) {
                    $mobile_home_banner_name_category_id[$i] = trim($mobile_home_banner_name_category_id[$i]);
                    if(!empty($mobile_home_banner_name_category_id[$i])) {
                        if($mobile_home_banner_name_category_id[$i] == "all") {
                            if(!in_array($mobile_home_banner_name_category_id[$i], $mobile_category_ids)) {
                                $mobile_category_ids[] = $mobile_home_banner_name_category_id[$i];
                                $mobile_image_category_upload = 1;
                            }
                            else{
                                $mobile_category_error = "Repeat mobile banner category";
                                $mobile_image_category_upload = 0;
                            }
                        }
                        else {
                            $category_unique_id = "";
                            $category_unique_id = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $mobile_home_banner_name_category_id[$i], 'id');
                            if(preg_match("/^\d+$/", $category_unique_id)) {
                                if(!in_array($mobile_home_banner_name_category_id[$i], $mobile_category_ids)) {
                                    $mobile_category_ids[] = $mobile_home_banner_name_category_id[$i];
                                    $mobile_image_category_upload = 1;
                                }
                                else{
                                    $mobile_category_error = "Repeat mobile banner category";
                                    $mobile_image_category_upload = 0;
                                }                            
                            }
                            else {
                                $mobile_category_error = "Invalid mobile banner category";
                                $mobile_image_category_upload = 0;
                            }
                        }
                    }
                    else {
                        //$mobile_category_error = "Select mobile banner category";
                        $mobile_image_category_upload = 0;
                    }
                }
            }
            if(empty($mobile_image_category_upload) && !empty($mobile_category_error)) {
                if(!empty($home_banner_position_error)) {
                    $home_banner_position_error = $home_banner_position_error."<br>".$mobile_category_error;
                }
                else {
                    $home_banner_position_error = $home_banner_position_error;
                }
            }
        }

        $access_error = "";
        if(!empty($login_role_id)) {
            if(empty($home_banner_position_error)) {
                $banner_unique_id = "";
                $banner_unique_id = $obj->getTableColumnValue($GLOBALS['home_page_table'], 'position', $home_banner_position, 'id');
                if(preg_match("/^\d+$/", $banner_unique_id)) {
                    $permission_module = $GLOBALS['banner_module'];
                    $permission_action = $edit_action;
                    include('user_permission_action.php');
                }
                else {    
                    $permission_module = $GLOBALS['banner_module'];
                    $permission_action = $add_action;
                    include('user_permission_action.php');
                }
                if(!empty($access_error)) {
                    $home_banner_position_error = $access_error;
                }
            }   
        }     

        $result = "";

        if(empty($home_banner_position_error)) {
            $image_copy = 0; $target_dir = $obj->image_directory(); $temp_dir = $obj->temp_image_directory();
            
            $prev_banner_image = ""; $prev_desktop_home_banner_image = ""; $prev_mobile_home_banner_image = "";
            if(!empty($home_banner_position)) {		
                $prev_banner_image = $obj->getTableColumnValue($GLOBALS['home_page_table'], 'position', $home_banner_position, 'position_content');
                if(!empty($prev_banner_image)) {
                    $prev_banner_image = explode("$$$", $prev_banner_image);
                    if(!empty($prev_banner_image['0'])) {
                        $prev_desktop_home_banner_image = explode(",", $prev_banner_image['0']);
                    }
                    if(!empty($prev_banner_image['1'])) {
                        $prev_mobile_home_banner_image = explode(",", $prev_banner_image['1']);
                    }
                    if(!empty($desktop_home_banner_name) && !empty($prev_desktop_home_banner_image)) {
                        for($i = 0; $i < count($prev_desktop_home_banner_image); $i++) {
                            if(!empty($prev_desktop_home_banner_image[$i]) && !in_array($prev_desktop_home_banner_image[$i], $desktop_home_banner_name)) {
                                if(file_exists($target_dir.$prev_desktop_home_banner_image[$i])) {
                                    unlink($target_dir.$prev_desktop_home_banner_image[$i]);
                                }
                            }
                        }
                    }
                    if(!empty($mobile_home_banner_name) && !empty($prev_mobile_home_banner_image)) {
                        for($i = 0; $i < count($prev_mobile_home_banner_image); $i++) {
                            if(!empty($prev_mobile_home_banner_image[$i]) && !in_array($prev_mobile_home_banner_image[$i], $mobile_home_banner_name)) {
                                if(file_exists($target_dir.$prev_mobile_home_banner_image[$i])) {
                                    unlink($target_dir.$prev_mobile_home_banner_image[$i]);
                                }
                            }
                        }
                    }
                }
            }

            if(!empty($desktop_home_banner_name)) {
                $desktop_home_banner = implode(",", $desktop_home_banner_name);
            }
            if(!empty($desktop_home_banner_name_position)) {
                $desktop_home_banner_position = implode(",", $desktop_home_banner_name_position);   
            }
            if(!empty($desktop_home_banner_name_category_id)) {
                $desktop_home_banner_category_id = implode(",", $desktop_home_banner_name_category_id);   
            }
            if(!empty($mobile_home_banner_name)) {
                $mobile_home_banner = implode(",", $mobile_home_banner_name);
            }
            if(!empty($mobile_home_banner_name_position)) {
                $mobile_home_banner_position = implode(",", $mobile_home_banner_name_position);   
            }
            if(!empty($mobile_home_banner_name_category_id)) {
                $mobile_home_banner_category_id = implode(",", $mobile_home_banner_name_category_id);   
            }

            if(!empty($home_banner_position) && !empty($desktop_home_banner)) {

                if(!empty($desktop_home_banner)) {
                    $home_banners = $desktop_home_banner;
                }
                if(!empty($desktop_home_banner_position)) {
                    $home_banners = $home_banners."@@@".$desktop_home_banner_position;
                }
                if(!empty($desktop_home_banner_category_id)) {
                    $home_banners = $home_banners."###".$desktop_home_banner_category_id;
                }
                if(!empty($mobile_home_banner)) {
                    $home_banners = $home_banners."$$$".$mobile_home_banner;
                }  
                if(!empty($mobile_home_banner_name_position)) {
                    $home_banners = $home_banners."@@@".$mobile_home_banner_position;
                }   
                if(!empty($mobile_home_banner_category_id)) {
                    $home_banners = $home_banners."###".$mobile_home_banner_category_id;
                }           

                $created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
				$creator_name = $obj->encode_decode('encrypt', $GLOBALS['user_name']);
                
                $getUniqueID = "";
                $getUniqueID = $obj->getTableColumnValue($GLOBALS['home_page_table'], 'position', $home_banner_position, 'id');
                if(preg_match("/^\d+$/", $getUniqueID)) {
                    $action = "Home Banner Updated";

                    $columns = array(); $values = array();						
                    $columns = array('creator_name', 'position', 'position_content');
                    $values = array("'".$creator_name."'", "'".$home_banner_position."'", "'".$home_banners."'");
                    $banner_update_id = $obj->UpdateSQL($GLOBALS['home_page_table'], $getUniqueID, $columns, $values, $action);
                    if(preg_match("/^\d+$/", $banner_update_id)) {	
                        $image_copy = 1;
                        $result = array('number' => '1', 'msg' => 'Updated Successfully');						
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $banner_update_id);
                    }
                }
                else {
                    $action = "New Home Banner Upload";
                    $columns = array('created_date_time', 'creator', 'creator_name', 'position', 'position_content', 'deleted');
                    $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$home_banner_position."'", "'".$home_banners."'", "'0'");
                    $banner_insert_id = $obj->InsertSQL($GLOBALS['home_page_table'], $columns, $values, '', '', $action);						
                    if(preg_match("/^\d+$/", $banner_insert_id)) {
                        $image_copy = 1;
                        $result = array('number' => '1', 'msg' => 'Home Banner Successfully Upload');
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $banner_insert_id);
                    }
                }
            }

            if(!empty($image_copy) && $image_copy == 1) {
                if(!empty($desktop_home_banner_name)) {
                    for($i = 0; $i < count($desktop_home_banner_name); $i++) {
                        if(!empty($desktop_home_banner_name[$i]) && file_exists($temp_dir.$desktop_home_banner_name[$i])) {
                            copy($temp_dir.$desktop_home_banner_name[$i], $target_dir.$desktop_home_banner_name[$i]);
                        }
                    }
                    if(!empty($mobile_home_banner_name)) {
                        for($i = 0; $i < count($mobile_home_banner_name); $i++) {
                            if(!empty($mobile_home_banner_name[$i]) && file_exists($temp_dir.$mobile_home_banner_name[$i])) {
                                copy($temp_dir.$mobile_home_banner_name[$i], $target_dir.$mobile_home_banner_name[$i]);
                            }
                        }
                    }
                    $obj->clear_temp_image_directory();
                }
            }

        }
        else {
			if(!empty($home_banner_position_error)) {
				$result = array('number' => '2', 'msg' => $home_banner_position_error);
			}
		}
		
		if(!empty($result)) {
			$result = json_encode($result);
		}
		echo $result; exit;
    }

    if(isset($_POST['home_center_banner_position'])) {
        $home_center_banner_position = ""; $home_center_banner_position_error = ""; $home_center_banner_name = array(); $home_center_banner = "";

        $home_center_banner_position = $_POST['home_center_banner_position'];
        $home_center_banner_position = trim($home_center_banner_position);

        if(empty($home_center_banner_position)) {
            $home_center_banner_position_error = "Home center banner position is missing";
        }

        if(isset($_POST['home_center_banner_name'])) {
            $home_center_banner_name = $_POST['home_center_banner_name'];	
        }

        $image_upload = 0;
        if(!empty($home_center_banner_name)) {
            for($i = 0; $i < count($home_center_banner_name); $i++) {
                if(!empty($home_center_banner_name[$i])) {
                    $image_upload = 1;
                }
            }
        }

        if(empty($image_upload)) {
            if(!empty($home_center_banner_position_error)) {
                $home_center_banner_position_error = $home_center_banner_position_error." <br> Select the image";
            }
            else {
                $home_center_banner_position_error = "Select the image";
            }
        }

        $result = "";

        if(empty($home_center_banner_position_error)) {
            $image_copy = 0; $target_dir = $obj->image_directory(); $temp_dir = $obj->temp_image_directory();

            if(!empty($home_center_banner_name)) {
                $home_center_banner = implode(",", $home_center_banner_name);
            }
            
            $prev_center_banner_image = "";
            if(!empty($home_center_banner_position) && !empty($home_center_banner)) {		
                $prev_center_banner_image = $obj->getTableColumnValue($GLOBALS['home_page_table'], 'position', $home_center_banner_position, 'position_content');
                if(!empty($prev_center_banner_image)) {
                    if(file_exists($target_dir.$prev_center_banner_image) && file_exists($temp_dir.$home_center_banner)) {
                        unlink($target_dir.$prev_center_banner_image);
                    }
                }
            }

            if(!empty($home_center_banner_position) && !empty($home_center_banner)) {
                $created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
				$creator_name = $obj->encode_decode('encrypt', $GLOBALS['user_name']);
                
                $getUniqueID = "";
                $getUniqueID = $obj->getTableColumnValue($GLOBALS['home_page_table'], 'position', $home_center_banner_position, 'id');
                if(preg_match("/^\d+$/", $getUniqueID)) {
                    $action = "Home Center Banner Updated";

                    $columns = array(); $values = array();						
                    $columns = array('creator_name', 'position', 'position_content');
                    $values = array("'".$creator_name."'", "'".$home_center_banner_position."'", "'".$home_center_banner."'");
                    $banner_update_id = $obj->UpdateSQL($GLOBALS['home_page_table'], $getUniqueID, $columns, $values, $action);
                    if(preg_match("/^\d+$/", $banner_update_id)) {	
                        $image_copy = 1;
                        $result = array('number' => '1', 'msg' => 'Updated Successfully');						
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $banner_update_id);
                    }
                }
                else {
                    $action = "New Home Center Banner Upload";
                    $columns = array('created_date_time', 'creator', 'creator_name', 'position', 'position_content', 'deleted');
                    $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$home_center_banner_position."'", "'".$home_center_banner."'", "'0'");
                    $banner_insert_id = $obj->InsertSQL($GLOBALS['home_page_table'], $columns, $values, '', '', $action);						
                    if(preg_match("/^\d+$/", $banner_insert_id)) {
                        $image_copy = 1;
                        $result = array('number' => '1', 'msg' => 'Home Center Banner Successfully Upload');
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $banner_insert_id);
                    }
                }
            }

            if(!empty($image_copy) && $image_copy == 1) {
                if(!empty($home_center_banner) && file_exists($temp_dir.$home_center_banner)) {
                    copy($temp_dir.$home_center_banner, $target_dir.$home_center_banner);
                }
                $obj->clear_temp_image_directory();
            }

        }
        else {
			if(!empty($home_center_banner_position_error)) {
				$result = array('number' => '2', 'msg' => $home_center_banner_position_error);
			}
		}
		
		if(!empty($result)) {
			$result = json_encode($result);
		}
		echo $result; exit;
    }

    if(isset($_POST['home_welcome_content_position'])) {
        $home_welcome_content_position = ""; $welcome_content = ""; $welcome_content_error = "";

        $home_welcome_content_position = $_POST['home_welcome_content_position'];
        $home_welcome_content_position = trim($home_welcome_content_position);

        if(empty($home_welcome_content_position)) {
            $welcome_content_error = "Welcome content position is missing";
        }

        $welcome_content = $_POST['welcome_content'];
        $welcome_content = trim($welcome_content);

        if(empty($welcome_content)) {
            $welcome_content_error = "Enter the welcome content";
        }

        $result = "";
        if(empty($welcome_content_error)) {
            if(!empty($welcome_content)) {
                $welcome_content = $obj->encode_decode('encrypt', $welcome_content);
            }

            if(!empty($home_welcome_content_position) && !empty($welcome_content)) {
                $created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
				$creator_name = $obj->encode_decode('encrypt', $GLOBALS['user_name']);
                
                $getUniqueID = "";
                $getUniqueID = $obj->getTableColumnValue($GLOBALS['home_page_table'], 'position', $home_welcome_content_position, 'id');
                if(preg_match("/^\d+$/", $getUniqueID)) {
                    $action = "Welcome Content Updated";

                    $columns = array(); $values = array();						
                    $columns = array('creator_name', 'position', 'position_content');
                    $values = array("'".$creator_name."'", "'".$home_welcome_content_position."'", "'".$welcome_content."'");
                    $content_update_id = $obj->UpdateSQL($GLOBALS['home_page_table'], $getUniqueID, $columns, $values, $action);
                    if(preg_match("/^\d+$/", $content_update_id)) {	
                        $result = array('number' => '1', 'msg' => 'Updated Successfully');						
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $content_update_id);
                    }
                }
                else {
                    $action = "Welcome Content Created.";
                    $columns = array('created_date_time', 'creator', 'creator_name', 'position', 'position_content', 'deleted');
                    $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$home_welcome_content_position."'", "'".$welcome_content."'", "'0'");
                    $content_insert_id = $obj->InsertSQL($GLOBALS['home_page_table'], $columns, $values, '', '', $action);						
                    if(preg_match("/^\d+$/", $content_insert_id)) {
                        $result = array('number' => '1', 'msg' => 'Welcontent Successfully Created');
                    }
                    else {
                        $result = array('number' => '2', 'msg' => $content_insert_id);
                    }
                }
            }

        }
        else {
            if(!empty($welcome_content_error)) {
                $result = array('number' => '2', 'msg' => $welcome_content_error);
            }
        }
        if(!empty($result)) {
			$result = json_encode($result);
		}
		echo $result; exit;
    }

?>