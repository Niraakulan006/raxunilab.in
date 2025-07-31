<?php 
	$page_title = "Mobile Banner";
	include("include_user_check_and_files.php");
	$page_number = $GLOBALS['page_number']; $page_limit = $GLOBALS['page_limit'];

    $mobile_banner_record = array(); $mobile_banner_record_count = 0; $mobile_banner_id = "";
    $mobile_banner_record = $obj->getTableRecords($GLOBALS['mobile_banner_table'],'','','');
    if(!empty($mobile_banner_record)){
        $mobile_banner_record_count = count($mobile_banner_record);
        foreach($mobile_banner_record as $data){
            if(!empty($data['mobile_banner_id'])){
                $mobile_banner_id = $data['mobile_banner_id'];
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> <?php if(!empty($project_title)) { echo $project_title; } ?> - <?php if(!empty($page_title)) { echo $page_title; } ?> </title>
	<?php include "link_style_script.php"; ?>
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
                            <div class="border card-box d-none add_update_form_content" id="add_update_form_content" ></div>
                            <div class="border card-box" id="table_records_cover">
                                <div class="card-header align-items-center">
                                    <div class="row justify-content-end p-2">
                                        <!-- <div class="col-lg-3 col-md-4 col-6">
                                            <div class="input-group">
                                                <input type="text" class="form-control" style="height:34px;" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                                                <span class="input-group-text" style="height:34px;" id="basic-addon2"><i class="bi bi-search"></i></span>
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-lg-2 col-md-2 col-4"> -->
                                            <!-- <button class="btn btn-danger float-end" style="font-size:11px;" type="button" onclick="Javascript:ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');"> <i class="fa fa-plus-circle"></i> Add </button> -->
                                        <!-- </div> -->
                                        <form name="table_listing_form" method="post">
                                            <div class="col-sm-6 col-xl-8">
                                                <input type="hidden" name="page_number" value="<?php if(!empty($page_number)) { echo $page_number; } ?>">
                                                <input type="hidden" name="page_limit" value="<?php if(!empty($page_limit)) { echo $page_limit; } ?>">
                                                <input type="hidden" name="page_title" value="<?php if(!empty($page_title)) { echo $page_title; } ?>">
                                            </div>	
                                        </form>
                                    </div>
                                </div>
                                <div id="table_listing_records"></div>
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
        $("#homebanner").addClass("active");
        // table_listing_records_filter();
        <?php 
        if(empty($mobile_banner_record_count)){ ?>
            ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '');
            <?php
        }else { ?>
             ShowModalContent('<?php if(!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($mobile_banner_id)) { echo $mobile_banner_id; } ?>');
        <?php } ?>
        
    });
</script>