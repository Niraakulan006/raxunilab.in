<?php
	include("include_files.php");
   
	if(isset($_REQUEST['show_mobile_banner_id'])) { 
        $show_mobile_banner_id = $_REQUEST['show_mobile_banner_id'];
        $show_mobile_banner_id = trim($show_mobile_banner_id);
        $mobile_banner ="";
        
        if(!empty($show_mobile_banner_id)) {
            $mobile_banner_list = array(); $banner_images = array();
            $mobile_banner_list = $obj->getTableRecords($GLOBALS['mobile_banner_table'], 'mobile_banner_id', $show_mobile_banner_id, '');
                if(!empty($mobile_banner_list)) {
                    foreach ($mobile_banner_list as $data) {
                        if(!empty($data['mobile_screen_images']) && $data['mobile_screen_images'] != $GLOBALS['null_value']) {
                            $banner_images = explode("$$$", $data['mobile_screen_images']);   
                        }
                    }
                }
        }
        // print_r($banner_image);
            $target_dir = $obj->image_directory(); $temp_dir = $obj->temp_image_directory();
        ?>

        <form class="poppins pd-20 redirection_form" name="mobile_banner_form" method="POST">
			<div class="card-header">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
						<div class="h5">Mobile Banner</div>
					</div>
					<!-- <div class="col-lg-4 col-md-4 col-4">
						<button class="btn btn-dark float-end" style="font-size:11px;" type="button" onclick="window.open('mobile_banner.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
					</div> -->
				</div>
			</div>
            <div class="row p-3">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_mobile_banner_id)) { echo $show_mobile_banner_id; } ?>">
                <!-- <div class="col-lg-4 col-md-6 col-12 py-2 px-lg-1 text-center">
                    <div class="card">
                        <img src="images/mobilebanner.webp" class="img-fluid" alt="Banner" title="Banner">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary px-2 py-1 smallfnt"><i class="bi bi-trash"></i> Delete</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 py-2 px-lg-1 text-center">
                    <div class="card">
                        <img src="images/mobilebanner.webp" class="img-fluid" alt="Banner" title="Banner">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary px-2 py-1 smallfnt"><i class="bi bi-trash"></i> Delete</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 py-2 px-lg-1 text-center">
                    <div class="card">
                        <img src="images/mobilebanner.webp" class="img-fluid" alt="Banner" title="Banner">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary px-2 py-1 smallfnt"><i class="bi bi-trash"></i> Delete</button>
                        </div>
                    </div>
                </div> -->
                 <div class="image_upload w-100" >  
                    <div class="row" id="mobile_banner_image_view">
                        <?php if(!empty($banner_images)){
                            for($p = 0; $p < count($banner_images); $p++) { 
                                $split_img = explode(".", $banner_images[$p]);
                                ?>
                                <div class="mobile_banner_image_div col-lg-4 col-md-12 col-12">
                                    <div class="form-group w-100 px-3 py-3 cover">
                                        <div class="image-container" style="position: relative; display: inline-block;" style="width: 100px; height: 100px !important;">
                                            <button type="button" onclick="Javascript:delete_multiple_files(this, 'mobile_banner_image_preview', '<?php if(!empty($banner_images[$p]) && file_exists($target_dir.$banner_images[$p])) { echo $banner_images[$p]; } ?>');"  style="position: absolute; right: 0px; top: 0px; border-radius: 20%;" src="include/images/upload_image.png" class="btn btn-danger"><i class="fa fa-close"></i></button>

                                            <img id="mobile_banner_image_preview" src="<?php echo $target_dir.$banner_images[$p]; ?>" style="width: 350px; height: 350px;" />
                                            
                                            <input type="hidden" name="mobile_banner_image_name[]" value="<?php if(!empty($banner_images[$p])) { echo $banner_images[$p]; } ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php 
                            }
                        } ?>
                    </div> 
                </div> 
            </div>
            <div class="row justify-content-center p-2">                                
                <!-- <div class="col-lg-4 col-md-12 col-12">           
                    <img src="images/cloudupload.png" class="img-fluid w-25 mx-auto d-block" alt="Upload" title="Upload">
                    <div class="text-center h5">(Image Size 1500 x 500)</div>
                    <div class="text-center smallfnt">(Upload jpg, Png Format Less than 2MB)</div>
                </div>      -->
                <div id="mobile_banner_image_cover" class="form-group mt-5">  
                    <div class="image-upload text-center">
                        <label for="mobile_banner_image"> 
                            <div class="mobile_banner_image_list">
                                <div class="row justify-content-center">    
                                    <div class="cover">                          
                                        <div class="col-lg-12 col-md-12 col-12">           
                                            <img src="images/cloudupload.png" id="mobile_banner_image_preview" class="img-fluid w-50 mx-auto d-block" alt="Upload" title="Upload">
                                            <div class="text-center h5">(Image Size 630 x 700)</div>
                                            <div class="text-center smallfnt">(Upload jpg, Png Format Less than 2MB)</div>
                                        </div>  
                                    </div>
                                </div>   
                            </div>
                            <input type="file" name="mobile_banner_image" id="mobile_banner_image" style="display: none;" accept="image/*" />
                        </label>
                    </div>
                </div>
                <div class="col-md-12 pt-3 text-center">
                    <button class="btn btn-danger" type="button"  onClick="Javascript:SaveModalContent(event,'mobile_banner_form', 'mobile_banner_changes.php', 'mobile_banner.php');">
                        Submit
                    </button>
                </div>
            </div>
            <script src="include/select2/js/select2.min.js"></script>
            <script src="include/select2/js/select.js"></script>
            <script type="text/javascript" src="include/js/cropper_image_upload.js"></script>

        </form>
		<?php
    } 
    if(isset($_POST['edit_id'])) {
        $mobile_banner_image_name =array(); $mobile_banner_image = array(); $mobile_banner_images = array();
        $result = ""; $mobile_banner_error = "";	 $image_error = ""; $edit_id = "";
        $valid_mobile_banner = ""; $form_name = "mobile_banner_form";

        if(isset($_POST['edit_id'])) {
			$edit_id = $_POST['edit_id'];
		}

        if(isset($_POST['mobile_banner_image_name'])) {
            $mobile_banner_image_name = $_POST['mobile_banner_image_name'];
        }
        if(empty($mobile_banner_image_name)) {
            $image_error = "Upload Image";    
            // if(!empty($valid_mobile_banner)) {
            //     $valid_mobile_banner = $valid_mobile_banner." ".$valid->error_display($form_name, "mobile_banner_image_name", $image_error, 'text');

            // }
            // else {
            //     $valid_mobile_banner = $valid->error_display($form_name, "mobile_banner_image_name", $image_error, 'text');
            // }
        }
		if(empty($image_error)) {
			$check_user_id_ip_address = 0;
			$check_user_id_ip_address = $obj->check_user_id_ip_address();	
			if(preg_match("/^\d+$/", $check_user_id_ip_address)) {

                if(!empty($mobile_banner_image_name) && is_array($mobile_banner_image_name)) {
                    $mobile_banner_image = implode("$$$", $mobile_banner_image_name);
                }
                else {
                    $mobile_banner_image = $GLOBALS['null_value'];
                }
                
                $target_dir = $obj->image_directory(); $temp_dir = $obj->temp_image_directory();
				$image_copy = 0;
				$created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator']; 
				$creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
                $image_update=0;
				if(empty($edit_id)) {
                    $action = "";
                    $action = "New Mobile Banner Created. ";

                    $null_value = $GLOBALS['null_value'];
                    $columns = array('created_date_time', 'creator', 'creator_name', 'mobile_banner_id','mobile_screen_images','deleted');
                    $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'","'".$null_value."'","'".$mobile_banner_image."'",'0');
                        $mobile_banner_insert_id = $obj->InsertSQL($GLOBALS['mobile_banner_table'], $columns, $values, 'mobile_banner_id', '', $action);			
                        if(preg_match("/^\d+$/", $mobile_banner_insert_id)) {
                            	$image_copy = 1;
                            $mobile_banner_id = "";
                            $mobile_banner_id = $obj->getTableColumnValue($GLOBALS['mobile_banner_table'], 'id', $mobile_banner_insert_id, 'mobile_banner_id');	
                            $result = array('number' => '1', 'msg' => 'Mobile Banner Successfully Created','mobile_banner_id' => $mobile_banner_id);
                        }
                        else {
                            $result = array('number' => '2', 'msg' => $mobile_banner_insert_id);
                        }
                 
                   
				}
				else {
                  
                    $getUniqueID = "";
                    $getUniqueID = $obj->getTableColumnValue($GLOBALS['mobile_banner_table'], 'mobile_banner_id', $edit_id, 'id');
                    if(preg_match("/^\d+$/", $getUniqueID)) {
                        $image_copy = 1;

                        $action = "";
                        if(!empty($services_name)) {
                            $action = "Mobile Banner Updated - ";
                        }

                        $columns = array(); $values = array();		
                        $columns = array('creator_name','mobile_screen_images');
                        $values = array("'".$creator_name."'","'".$mobile_banner_image."'");
                        $mobile_banner_update_id = $obj->UpdateSQL($GLOBALS['mobile_banner_table'], $getUniqueID, $columns, $values, $action);
                        if(preg_match("/^\d+$/", $mobile_banner_update_id)) {
                            $result = array('number' => '1', 'msg' => 'Mobile Banner Updated Successfully');					
                        }
                        else {
                            $result = array('number' => '2', 'msg' => $mobile_banner_update_id);
                        }							
                    }
                
                   
                }	
                if(!empty($image_copy) && $image_copy == 1) {


                    if(!empty($mobile_banner_image)){
                        $mobile_banner_images=  explode("$$$", $mobile_banner_image);
                        // print_r($mobile_banner_images);

                        for($i=0; $i<count($mobile_banner_images); $i++) {
                            if(!empty($mobile_banner_images[$i]) && file_exists($temp_dir.$mobile_banner_images[$i])) {  
                                copy($temp_dir.$mobile_banner_images[$i], $target_dir.$mobile_banner_images[$i]);
                            }	
                        }	
                        $obj->clear_temp_image_directory();

                    }	
                }	
			}
			else {
				$result = array('number' => '2', 'msg' => 'Invalid IP');
			}
		}
		else {
			if(!empty($image_error)) {
				$result = array('number' => '2', 'msg' => $image_error);
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
		$page_title = $_POST['page_title']; ?>
                     
		<?php	
	}
    ?>