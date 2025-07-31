<?php
	include("include_files.php");
	
	$msg = ""; $image_name = ""; $field_name = ""; $image_data = ""; $extension = ""; $preview_name = "";
	$temp_dir = ""; $temp_dir = $obj->temp_image_directory();
	
	if(isset($_POST['image_name'])) {
		$image_name = $_POST['image_name'];
		if(!empty($image_name)) {
			$image_name = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "_", $image_name));
			$field_name = $image_name;
		}
		$pdf_url = $_POST['pdf_url'];
		$pdf_type = $_POST['pdf_type'];
		$display_page = $image_name;
		if(!empty($image_name)) {
			$image_name = $image_name."_".date("d_m_Y_h_i_s");
		}
		if(!empty($image_name)) {
			$pdf_upload = 0;
			if($pdf_type == "application/pdf") {
				$image_name = $image_name.".pdf"; $extension = "pdf"; $pdf_upload = 1;
			}
			if($pdf_upload == 1) {
				if(!empty($temp_dir)) {
					chmod($temp_dir, 0777);
				}
				
				if(file_exists($temp_dir.$image_name)) {
					unlink($temp_dir.$image_name);
				}
				
				if(strpos($pdf_url, ',') !== false) {
					$image_data = explode(',', $pdf_url);
					
					$image_value = "";
					$image_value = base64_decode($image_data[1]);
					$success = 0;
					if($extension == "pdf") {
						$fp = fopen($temp_dir.$image_name, "wb");							
						fwrite($fp, $image_value);							
						fclose($fp);
						$success = 1;
					}		
					if(!empty($success)) {
						if($display_page == 'newsletter_pdf') {
							$msg = '<div class="image-container" style="position: relative; display: inline-block;">
							<button type="button" onclick="Javascript:delete_multiple_files(this, '."'".$field_name."'".', '."'".$image_name."'".');" class="btn btn-danger"  style="position: absolute; right: 0px; top: 0px; border-radius: 20%;"><i class="fa fa-close"></i></button>
							<a href="'.$temp_dir.$image_name.'" class=" delete_pdf"  target="_blank">
								<i class="fa fa-file-pdf-o" style="font-size: 120px;color:red;"></i>
							</a>									
							<input type="hidden" name="'.$display_page.'_name[]" value="'.$image_name.'">
							<div class="py-2"><input type="text" name="pdf_name[]" class="form-control px-1 py-1" value="" placeholder="File Name"></div>
							';
						}
						else {
							$msg = '<div class="image-container" style="position: relative; display: inline-block;">
							<button type="button" onclick="Javascript:delete_multiple_files(this, '."'".$field_name."'".', '."'".$image_name."'".');" class="btn btn-danger"  style="position: absolute; right: 0px; top: 0px; border-radius: 20%;"><i class="fa fa-close"></i></button>
							<a href="'.$temp_dir.$image_name.'" class=" delete_pdf"  target="_blank">
								<i class="fa fa-file-pdf-o" style="font-size: 120px;color:red;"></i>
							</a>									
							<input type="hidden" name="'.$display_page.'_name[]" value="'.$image_name.'"></div>
							';
						}
					}						
				}				
			}
			else {
				$msg = "Please upload only pdf.";
			}
		}
		
		echo $msg;
		exit;
	}
?>