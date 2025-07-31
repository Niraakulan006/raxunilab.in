<?php
	include("include_files.php");

	if(isset($_REQUEST['show_newsletter_id'])) { 
        $show_newsletter_id = $_REQUEST['show_newsletter_id'];
        $show_newsletter_id = trim($show_newsletter_id);
        $newsletter ="";
        
        if(!empty($show_newsletter_id)) {
            $newsletter_list = array(); $newletter_pdfs = array(); $pdf_names = array();
            $newsletter_list = $obj->getTableRecords($GLOBALS['newsletter_table'], 'newsletter_id', $show_newsletter_id, '');
            if(!empty($newsletter_list)) {
                foreach ($newsletter_list as $data) {
                    if(!empty($data['newsletter_pdfs']) && $data['newsletter_pdfs'] != $GLOBALS['null_value']) {
                        $newletter_pdfs = explode("$$$", $data['newsletter_pdfs']);   
                    }
                    if(!empty($data['pdf_name']) && $data['pdf_name'] != $GLOBALS['null_value']) {
                        $pdf_names = explode(",", $data['pdf_name']);   
                    }
                }
            }
        }
            $target_dir = $obj->image_directory(); $temp_dir = $obj->temp_image_directory();
        ?>

        <form class="poppins pd-20 redirection_form" name="newsletter_form" method="POST">
			<div class="card-header">
				<div class="row p-2">
					<div class="col-lg-8 col-md-8 col-8 align-self-center">
						<div class="h5">Newsletter</div>
					</div>
				</div>
			</div>
            <div class="row p-3">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_newsletter_id)) { echo $show_newsletter_id; } ?>">
                 <div class="image_upload w-100" >  
                    <div class="row" id="newsletter_pdf_view">
                        <?php 
                            if(!empty($newletter_pdfs)) {
                                for($p = 0; $p < count($newletter_pdfs); $p++) { 
                                    $split_img = explode(".", $newletter_pdfs[$p]);
                                    ?>
                                    <div class="newsletter_pdf_div col-lg-2 col-md-6 col-12">
                                        <div class="form-group w-100 px-3 py-3 cover">
                                            <div class="image-container" style="position: relative; display: inline-block;" style="width: 100px; height: 100px !important;">
                                                <button type="button" onclick="Javascript:delete_multiple_files(this, 'newsletter_pdf_preview', '<?php if(!empty($newletter_pdfs[$p]) && file_exists($target_dir.$newletter_pdfs[$p])) { echo $newletter_pdfs[$p]; } ?>');"  style="position: absolute; right: 0px; top: 0px; border-radius: 20%;" src="include/images/upload_image.png" class="btn btn-danger"><i class="fa fa-close"></i></button>
                                                <a href="<?php echo $target_dir . $newletter_pdfs[$p]; ?>" class="delete_pdf" target="_blank">
                                                    <i class="fa fa-file-pdf-o" style="font-size: 120px; color:red;"></i>
                                                </a>
                                                <input type="hidden" name="newsletter_pdf_name[]" value="<?php if(!empty($newletter_pdfs[$p])) { echo $newletter_pdfs[$p]; } ?>">
                                                <div class="py-2">
                                                    <input type="text" name="pdf_name[]" class="form-control px-1 py-1" value="<?php if(!empty($pdf_names[$p])) { echo $pdf_names[$p]; } ?>" placeholder="File Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                }
                            } 
                        ?>
                    </div> 
                </div> 
            </div>
            <div class="row justify-content-center p-2">                                
                <div id="newsletter_pdf_cover" class="form-group mt-5">  
                    <div class="image-upload text-center">
                        <label for="newsletter_pdf"> 
                            <div class="newsletter_pdf_list">
                                <div class="row justify-content-center">    
                                    <div class="cover">                          
                                        <div class="col-lg-12 col-md-12 col-12">           
                                            <img src="images/cloudupload.png" id="newsletter_pdf_preview" class="img-fluid w-50 mx-auto d-block" alt="Upload" title="Upload">
                                            <!-- <div class="text-center h5">(Image Size 1500 x 500)</div> -->
                                            <div class="text-center smallfnt">(Upload PDF)</div>
                                        </div>  
                                    </div>
                                </div>   
                            </div>
                            <input type="file" name="newsletter_pdf" id="newsletter_pdf" style="display: none;" accept="pdf/*" />
                        </label>
                    </div>
                </div>
                <div class="col-md-12 pt-3 text-center">
                    <button class="btn btn-danger" type="button"  onClick="Javascript:SaveModalContent(event,'newsletter_form', 'newsletter_changes.php', 'newsletter.php');">
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
        $newsletter_pdf_name =array(); $newsletter_pdf = array(); $newsletter_pdfs = array();
        $result = ""; $newsletter_error = "";	 $image_error = ""; $edit_id = "";
        $valid_newsletter = ""; $form_name = "newsletter_form"; $pdf_names = array();

        if(isset($_POST['edit_id'])) {
			$edit_id = $_POST['edit_id'];
		}
        if(isset($_POST['newsletter_pdf_name'])) {
            $newsletter_pdf_name = $_POST['newsletter_pdf_name'];
        }
        if(empty($newsletter_pdf_name)) {
            $image_error = "Upload PDF";    
            // if(!empty($valid_newsletter)) {
            //     $valid_newsletter = $valid_newsletter." ".$valid->error_display($form_name, "newsletter_pdf_name", $image_error, 'text');

            // }
            // else {
            //     $valid_newsletter = $valid->error_display($form_name, "newsletter_pdf_name", $image_error, 'text');
            // }
        }
        if(isset($_POST['pdf_name'])) {
            $pdf_names = $_POST['pdf_name'];
        }
        if(!empty($pdf_names)) {
            $pdf_names = array_reverse($pdf_names);
            for($i=0; $i < count($pdf_names); $i++) {
                if(isset($pdf_names[$i])) {
                    $pdf_error = "";
                    $pdf_error = $valid->common_validation($pdf_names[$i], 'PDF Name', 'text');
                    if(empty($image_error) && !empty($pdf_error)) {
                        $image_error = $pdf_error;
                        break;
                    }
                }
            }
        }
		if(empty($image_error)) {
			$check_user_id_ip_address = 0;
			$check_user_id_ip_address = $obj->check_user_id_ip_address();	
			if(preg_match("/^\d+$/", $check_user_id_ip_address)) {

                if(!empty($newsletter_pdf_name) && is_array($newsletter_pdf_name)) {
                    $newsletter_pdf = implode("$$$", $newsletter_pdf_name);
                }
                else {
                    $newsletter_pdf = $GLOBALS['null_value'];
                }
                if(!empty(array_filter($pdf_names, fn($value) => $value !== ""))) {
                    $pdf_names = array_reverse($pdf_names);
                    $pdf_names = implode(",", $pdf_names);
                }
                else {
                    $pdf_names = $GLOBALS['null_value'];
                }
                
                $target_dir = $obj->image_directory(); $temp_dir = $obj->temp_image_directory();
				$image_copy = 0;
				$created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
				$creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);
                $image_update=0;
				if(empty($edit_id)) {
                    $action = "";
                    $action = "New Newsletter Created. ";

                    $null_value = $GLOBALS['null_value'];
                    $columns = array('created_date_time', 'creator', 'creator_name','newsletter_id','newsletter_pdfs','pdf_name','deleted');
                    $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$null_value."'","'".$newsletter_pdf."'","'".$pdf_names."'",'0');
                        $newsletter_insert_id = $obj->InsertSQL($GLOBALS['newsletter_table'], $columns, $values, 'newsletter_id', '', $action);			
                        if(preg_match("/^\d+$/", $newsletter_insert_id)) {
                            	$image_copy = 1;
                            $newsletter_id = "";
                            $newsletter_id = $obj->getTableColumnValue($GLOBALS['newsletter_table'], 'id', $newsletter_insert_id, 'newsletter_id');	
                            $result = array('number' => '1', 'msg' => 'Newsletter Successfully Created','newsletter_id' => $newsletter_id);
                        }
                        else {
                            $result = array('number' => '2', 'msg' => $newsletter_insert_id);
                        }
                 
                   
				}
				else {
                  
                    $getUniqueID = "";
                    $getUniqueID = $obj->getTableColumnValue($GLOBALS['newsletter_table'], 'newsletter_id', $edit_id, 'id');
                    if(preg_match("/^\d+$/", $getUniqueID)) {
                        $image_copy = 1;

                        $action = "";
                        if(!empty($services_name)) {
                            $action = "Newsletter Updated";
                        }

                        $columns = array(); $values = array();		
                        $columns = array('creator_name','newsletter_pdfs','pdf_name');
                        $values = array("'".$creator_name."'","'".$newsletter_pdf."'","'".$pdf_names."'");
                        $newsletter_update_id = $obj->UpdateSQL($GLOBALS['newsletter_table'], $getUniqueID, $columns, $values, $action);
                        if(preg_match("/^\d+$/", $newsletter_update_id)) {
                            $result = array('number' => '1', 'msg' => 'Newsletter Updated Successfully');					
                        }
                        else {
                            $result = array('number' => '2', 'msg' => $newsletter_update_id);
                        }							
                    }
                
                   
                }	
                if(!empty($image_copy) && $image_copy == 1) {


                    if(!empty($newsletter_pdf)){
                        $newsletter_pdfs=  explode("$$$", $newsletter_pdf);

                        for($i=0; $i<count($newsletter_pdfs); $i++) {
                            if(!empty($newsletter_pdfs[$i]) && file_exists($temp_dir.$newsletter_pdfs[$i])) {  
                                copy($temp_dir.$newsletter_pdfs[$i], $target_dir.$newsletter_pdfs[$i]);
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