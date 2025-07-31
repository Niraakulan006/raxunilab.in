<?php 
	$page_title = "Product";
	include("include_user_check_and_files.php");
	$page_number = $GLOBALS['page_number']; $page_limit = $GLOBALS['page_limit'];
    
    $category_list = array();
    $category_list = $obj->getTableRecords($GLOBALS['category_table'], 'parent', 'parent');
    $sub_category_list = array();
    $sub_category_list = $obj->getTableRecords($GLOBALS['category_table'], 'parent', 'child');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> <?php if(!empty($project_title)) { echo $project_title; } ?> - <?php if(!empty($page_title)) { echo $page_title; } ?> </title>
	<?php include "link_style_script.php"; ?>
    <script type="text/javascript" src="include/js/product.js"></script>

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
                            <div class="border card-box d-none add_update_form_content" id="add_update_form_content"></div>
                            <div class="border card-box" id="table_records_cover">
                                <div class="card-header align-items-center">
                                    <form name="table_listing_form" method="post">
                                        <div class="row justify-content-end p-2">
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="form-group">
                                                    <div class="form-label-group in-border">
                                                        <select name="category_id" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" onchange="Javascript:get_Sub_Category('category');table_listing_records_filter();">
                                                            <option value="">Select Category</option>   
                                                            <?php
                                                                if(!empty($category_list)) {
                                                                    foreach($category_list as $data) {
                                                                        if(!empty($data['category_id'])) {
                                                            ?>
                                                                            <option value="<?php echo $data['category_id']; ?>">
                                                                                <?php
                                                                                    if(!empty($data['category_name'])) {
                                                                                        $data['category_name'] = $obj->encode_decode('decrypt', $data['category_name']);
                                                                                        echo $data['category_name'];
                                                                                    }
                                                                                ?>
                                                                            </option>
                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                            ?>   
                                                        </select>
                                                        <label>Select Category</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="form-group">
                                                    <div class="form-label-group in-border">
                                                        <select name="sub_category_id" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" onchange="Javascript:table_listing_records_filter();">
                                                            <option value="">Select Sub Category</option>   
                                                            <?php
                                                                if(!empty($sub_category_list)) {
                                                                    foreach($sub_category_list as $data) {
                                                                        if(!empty($data['category_id'])) {
                                                            ?>
                                                                            <option value="<?php echo $data['category_id']; ?>">
                                                                                <?php
                                                                                    if(!empty($data['category_name'])) {
                                                                                        $data['category_name'] = $obj->encode_decode('decrypt', $data['category_name']);
                                                                                        echo $data['category_name'];
                                                                                    }
                                                                                ?>
                                                                            </option>
                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                            ?>   
                                                        </select>
                                                        <label>Select Sub Category</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-6">
                                                <div class="input-group">
                                                    <input type="text" name="search_text" class="form-control shadow-none" placeholder="Search By Product Name" onkeyup="Javascript:table_listing_records_filter();">
                                                    <span class="input-group-text" style="height:34px;" id="basic-addon2"><i class="bi bi-search"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-4">
                                                <?php $add_access_error = "";
                                                if(!empty($login_staff_id)) {
                                                    $permission_action = $add_action;
                                                    include('permission_action.php');
                                                }
                                                if(empty($add_access_error)) { ?>
                                                    <button class="btn btn-danger float-end" style="font-size:11px;" type="button" onclick="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');"> <i class="fa fa-plus-circle"></i> Add </button>
                                                    <?php 
                                                } ?>
                                            </div>
                                            <div class="col-sm-6 col-xl-8">
                                                <input type="hidden" name="page_number" value="<?php if(!empty($page_number)) { echo $page_number; } ?>">
                                                <input type="hidden" name="page_limit" value="<?php if(!empty($page_limit)) { echo $page_limit; } ?>">
                                                <input type="hidden" name="page_title" value="<?php if(!empty($page_title)) { echo $page_title; } ?>">
                                            </div>	
                                        </div>
                                    </form>
                                </div>
                                <div id="table_listing_records"></div>
                            </div>
                        </div>   
                    </div>
                </div>  
            </div>
        </div>          
<!--Right Content End-->
<!--Modal-->

<!--Modal End-->
<?php include "footer.php"; ?>
<script>
    $(document).ready(function(){
        $("#product").addClass("active");
        table_listing_records_filter();
    });
</script>