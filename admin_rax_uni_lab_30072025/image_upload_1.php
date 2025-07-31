<?php
	include("include_files.php");
	
	$msg = ""; $image_name = ""; $field_name = ""; $image_data = ""; $extension = ""; $preview_name = "";
	$temp_dir = ""; $temp_dir = $obj->temp_image_directory();
	
	if(isset($_POST['image_url'])) {
		$image_url = $_POST['image_url'];
		$image_type = $_POST['image_type'];
		$preview_name = $_POST['field'];
		
		if(!empty($preview_name)) {
			$field_name = $preview_name;
			$image_name = $preview_name."_".date("d_m_Y_h_i_s");
		}
		// $split_name = explode(".", $image_name);
		if(!empty($image_name)) {
			$display_page = $field_name;
			if(!empty($image_url)) {
				$image_upload = 0;
				switch ($image_type) {
					case 'image/jpeg': $image_name = $image_name.".jpg"; $extension = "jpeg"; $image_upload = 1; break;
					case 'image/jpg': $image_name = $image_name.".jpg"; $extension = "jpg"; $image_upload = 1; break;
					case 'image/png': $image_name = $image_name.".png"; $extension = "png"; $image_upload = 1; break;
					case 'image/gif': $image_name = $image_name.".gif"; $extension = "gif"; $image_upload = 1; break;
				}
			}
			if($image_upload == 1) {
				/*if(!empty($temp_dir)) {
					chmod($temp_dir, 0777);
				}*/

				// echo $image_name;

				// echo "temp-".$temp_dir.$image_name;
				
				if(file_exists($temp_dir.$image_name)) {
					unlink($temp_dir.$image_name);
				}
				
				if(strpos($image_url, ',') !== false) {
					$image_data = explode(',', $image_url);
					
					$image_value = "";
					$image_value = base64_decode($image_data[1]);
					$destination = $temp_dir.$image_name;
					file_put_contents($destination, $image_value);    
					$success = 1;
					if(!empty($success)) {
						$date_time = date("dmyhis");
						if($field_name == 'home_banner_image'){
								$msg = '<div class="image-container" style="position: relative; display: inline-block;">
							<button type="button" onclick="Javascript:delete_multiple_files(this, '."'".$preview_name."'".', '."'".$image_name."'".');" class="btn btn-danger" style="position: absolute; right: 0px; top: 0px; border-radius: 20%;"><i class="fa fa-close"></i></button>
							<img id="'.$field_name.'_preview" src = "'.$temp_dir.$image_name.'?t='.$date_time.'" style="width:320px; height:125px;">
							<input type="hidden" name="'.$display_page.'_name[]" class="form-control" value="'.$image_name.'"></div>
							</div>
							';
						}else if($field_name == 'mobile_banner_image'){
								$msg = '<div class="image-container" style="position: relative; display: inline-block;">
							<button type="button" onclick="Javascript:delete_multiple_files(this, '."'".$preview_name."'".', '."'".$image_name."'".');" class="btn btn-danger" style="position: absolute; right: 0px; top: 0px; border-radius: 20%;"><i class="fa fa-close"></i></button>
							<img id="'.$field_name.'_preview" src = "'.$temp_dir.$image_name.'?t='.$date_time.'" style="width:350px; height:350px;">
							<input type="hidden" name="'.$display_page.'_name[]" class="form-control" value="'.$image_name.'"></div>
							</div>
							';
						}else if($field_name == 'client_image'){
								$msg = '<div class="image-container" style="position: relative; display: inline-block;">
							<button type="button" onclick="Javascript:delete_multiple_files(this, '."'".$preview_name."'".', '."'".$image_name."'".');" class="btn btn-danger" style="position: absolute; right: 0px; top: 0px; border-radius: 20%;"><i class="fa fa-close"></i></button>
							<img id="'.$field_name.'_preview" src = "'.$temp_dir.$image_name.'?t='.$date_time.'" style="width:150px; height:150px;">
							<input type="hidden" name="'.$display_page.'_name[]" class="form-control" value="'.$image_name.'"></div>
							</div>
							';
						}
						else if($field_name != "mobile_image")
						{
							$msg = '<div class="image-container" style="position: relative; display: inline-block;">
							<button type="button" onclick="Javascript:delete_multiple_files(this, '."'".$preview_name."'".', '."'".$image_name."'".');" class="btn btn-danger" style="position: absolute; right: 0px; top: 0px; border-radius: 20%;"><i class="fa fa-close"></i></button>
							<img id="'.$field_name.'_preview" src = "'.$temp_dir.$image_name.'?t='.$date_time.'" style="width:200px; height:100px;">
							<input type="hidden" name="'.$display_page.'_name[]" class="form-control" value="'.$image_name.'"></div>
							</div>
							';
							
						}
						else
						{
							$msg = '<div class="image-container" style="position: relative; display: inline-block;">
							<button type="button" onclick="Javascript:delete_multiple_files(this, '."'".$preview_name."'".', '."'".$image_name."'".');" class="btn btn-danger" style="position: absolute; right: 0px; top: 0px; border-radius: 20%;"><i class="fa fa-close"></i></button>
							<img id="'.$field_name.'_preview" src = "'.$temp_dir.$image_name.'?t='.$date_time.'" style="width:260px; height:290px;">
							<input type="hidden" name="'.$display_page.'_name[]" class="form-control" value="'.$image_name.'"></div>
							</div>
							';
						}
							
					}						
				}				
			}
			else {
				$msg = "Please upload only images.";
			}
		}
		else {
			$msg = "Image name is empty";
		}
		
		echo $msg;
		exit;
	}
?>