<?php 
	$page_title = "Banner";
	include("include_user_check_and_files.php");
	$page_number = $GLOBALS['page_number']; $page_limit = $GLOBALS['page_limit'];
      
    $login_staff_id = "";
    if(isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id']) && !empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'])) {
        if(!empty($GLOBALS['user_type']) && $GLOBALS['user_type'] != $GLOBALS['admin_user_type']) {
            $login_staff_id = $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'];
            $permission_module = $GLOBALS['banner_module'];
            include("permission_check.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> <?php if(!empty($project_title)) { echo $project_title; } ?> - <?php if(!empty($page_title)) { echo $page_title; } ?> </title>
	<?php 
	include "link_style_script.php"; ?>
    <script type="text/javascript" src="include/js/keyboard_control.js"></script>
    <script type="text/javascript" src="include/js/payment.js"></script>
</head>	
<body>
<?php include "header.php"; ?>
<!--Right Content-->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="border card-box add_update_form_content" id="add_update_form_content">
                                <form class="mt-5 poppins pd-20 redirection_form" name="home_banner_form" method="POST">
                                    <input type="hidden" name="home_banner_position" value="<?php if(!empty($position)) { echo $position; } ?>">
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="desktop_home_banner_cover" class="form-group">
                                                <h5 class="w-100 text-center">Desktop Banner Size - 1920 x 640</h5> 
                                                <h6 class="w-100 text-center">Max.Upload Size - 2 MB</h6> 
                                                <div class="image-upload text-center">
                                                    <label for="desktop_home_banner">   
                                                        <div class="desktop_home_banner_list row">
                                                            <div class="col-12">
                                                                <div class="cover">
                                                                    <img id="desktop_home_banner_preview" src="../images/upload_image.png" style="max-width: 150px;" />
                                                                </div>
                                                            </div>        
                                                        </div>
                                                        <input type="file" name="desktop_home_banner" id="desktop_home_banner" style="display: none;" accept="image/*" multiple />
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row multiple_upload_image_list desktop_home_banner_cover">
                                        <?php
                                            if(!empty($desktop_home_banner)) {
                                                foreach($desktop_home_banner as $desktop_index => $desktop_banner) {
                                                    if(!empty($desktop_banner) && file_exists($target_dir.$desktop_banner)) {
                                        ?>
                                                        <div class="col-sm-6">
                                                            <div id="banner_div" class="form-group w-100 px-3 py-3">
                                                                <button type="button" onclick="Javascript:delete_multiple_files(this, 'desktop_home_banner');" class="btn btn-danger"><i class="fa fa-close"></i></button>
                                                                <img src="<?php echo $target_dir.$desktop_banner; ?>" style="max-width: 100%; max-height: 800px;">
                                                                <input type="hidden" name="desktop_home_banner_name[]" class="form-control" value="<?php if(!empty($desktop_banner)) { echo $desktop_banner; } ?>">

                                                                <div class="row mx-0 mt-2">
                                                                    <div class="col-sm-3">
                                                                        <input type="text" name="desktop_home_banner_name_position[]" class="form-control mx-auto" value="<?php if(!empty($desktop_home_banner_positions[$desktop_index])) { echo $desktop_home_banner_positions[$desktop_index]; } ?>" placeholder="Position" style="width: 100px;">
                                                                    </div>
                                                                    <div class="col-sm-9">
                                                                        <div class="form-group">
                                                                            <div class="w-100">
                                                                                <select class="form-control banner_category" name="desktop_home_banner_name_category_id[]">
                                                                                    <option value="">Select Category</option>
                                                                                    <option value="all" <?php if(!empty($desktop_home_banner_category_ids[$desktop_index]) && $desktop_home_banner_category_ids[$desktop_index] == "all") { ?> selected="selected" <?php } ?> >All</option>
                                                                                    <?php
                                                                                        if(!empty($category_list)) {
                                                                                            foreach($category_list as $data) {
                                                                                                if(!empty($data['category_id'])) {
                                                                                    ?>
                                                                                                    <option value="<?php echo $data['category_id']; ?>" <?php if(!empty($desktop_home_banner_category_ids[$desktop_index]) && $desktop_home_banner_category_ids[$desktop_index] == $data['category_id']) { ?> selected="selected" <?php } ?> >
                                                                                                        <?php
                                                                                                            if(!empty($data['name'])) {
                                                                                                                $data['name'] = $obj->encode_decode('decrypt', $data['name']);
                                                                                                                echo $data['name'];
                                                                                                            }
                                                                                                        ?>
                                                                                                    </option>
                                                                                    <?php				
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                        <?php   
                                                    }         
                                                }
                                            }
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div id="mobile_home_banner_cover" class="form-group">
                                                <h5 class="w-100 text-center">Mobile Banner Size - 630 x 700</h5> 
                                                <h6 class="w-100 text-center">Max.Upload Size - 2 MB</h6> 
                                                <div class="image-upload text-center">
                                                    <label for="mobile_home_banner">   
                                                        <div class="mobile_home_banner_list row">
                                                            <div class="col-12">
                                                                <div class="cover">
                                                                    <img id="mobile_home_banner_preview" src="../images/upload_image.png" style="max-width: 150px;" />
                                                                </div>
                                                            </div>        
                                                        </div>
                                                        <input type="file" name="mobile_home_banner" id="mobile_home_banner" style="display: none;" accept="image/*" multiple />
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row multiple_upload_image_list mobile_home_banner_cover">
                                        <?php
                                            if(!empty($mobile_home_banner)) {
                                                foreach($mobile_home_banner as $mobile_index => $mobile_banner) {
                                                    if(!empty($mobile_banner) && file_exists($target_dir.$mobile_banner)) {
                                        ?>
                                                        <div class="col-sm-4">
                                                            <div id="banner_div" class="form-group w-100 px-3 py-3">
                                                                <button type="button" onclick="Javascript:delete_multiple_files(this, 'mobile_home_banner');" class="btn btn-danger"><i class="fa fa-close"></i></button>
                                                                <img src="<?php echo $target_dir.$mobile_banner; ?>" style="max-width: 100%; max-height: 800px;">
                                                                <input type="hidden" name="mobile_home_banner_name[]" class="form-control" value="<?php if(!empty($mobile_banner)) { echo $mobile_banner; } ?>">
                                                                <div class="row mx-0 mt-2">
                                                                    <div class="col-sm-3">
                                                                        <input type="text" name="mobile_home_banner_name_position[]" class="form-control mx-auto" value="<?php if(!empty($mobile_home_banner_positions[$mobile_index])) { echo $mobile_home_banner_positions[$mobile_index]; } ?>" placeholder="Position">
                                                                    </div>
                                                                    <div class="col-sm-9">
                                                                        <div class="form-group">
                                                                            <div class="w-100">
                                                                                <select class="form-control banner_category" name="mobile_home_banner_name_category_id[]">
                                                                                    <option value="">Select Category</option>
                                                                                    <option value="all" <?php if(!empty($mobile_home_banner_category_ids[$mobile_index]) && $mobile_home_banner_category_ids[$mobile_index] == "all") { ?> selected="selected" <?php } ?> >All</option>
                                                                                    <?php
                                                                                        if(!empty($category_list)) {
                                                                                            foreach($category_list as $data) {
                                                                                                if(!empty($data['category_id'])) {
                                                                                    ?>
                                                                                                    <option value="<?php echo $data['category_id']; ?>" <?php if(!empty($mobile_home_banner_category_ids[$mobile_index]) && $mobile_home_banner_category_ids[$mobile_index] == $data['category_id']) { ?> selected="selected" <?php } ?> >
                                                                                                        <?php
                                                                                                            if(!empty($data['name'])) {
                                                                                                                $data['name'] = $obj->encode_decode('decrypt', $data['name']);
                                                                                                                echo $data['name'];
                                                                                                            }
                                                                                                        ?>
                                                                                                    </option>
                                                                                    <?php				
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                        <?php   
                                                    }         
                                                }
                                            }
                                        ?>
                                    </div>
                                    <div class="w-100 text-center">
                                        <button class="btn btn-primary btnwidth submit_button" type="button" onClick="Javascript:SaveModalContent(event, 'home_banner_form', 'home_page_changes.php', 'banner.php');">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>   
                    </div>
                </div>  
            </div>
        </div>          
<!--Right Content End-->
<?php include "footer.php"; ?>
<script>
    $(document).ready(function(){
        $("#category").addClass("active");
        table_listing_records_filter();
    });
</script>