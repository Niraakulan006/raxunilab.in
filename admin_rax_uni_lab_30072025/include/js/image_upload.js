jQuery(document).ready(function() {
	if(jQuery('#logo').length > 0) {
		jQuery('#logo').change(function(event) {
			if(jQuery('#logo_cover').find('.alert').length > 0) {
				jQuery('#logo_cover').find('.alert').remove();
			}
			var count = jQuery(this).get(0).files.length;
			if(count != 0) {
				upload_files(this, 'logo', '0');
			}
		});	
	}
	if(jQuery('#qr_image').length > 0) {
		jQuery('#qr_image').change(function(event) {
			if(jQuery('#qr_image_cover').find('.alert').length > 0) {
				jQuery('#qr_image_cover').find('.alert').remove();
			}
			var count = jQuery(this).get(0).files.length;
			if(count != 0) {
				upload_files(this, 'qr_image', '0');
			}
		});	
	}
	if(jQuery('#product_image').length > 0) {
		jQuery('#product_image').change(function(event) {
			event.preventDefault();
			if(jQuery('#product_image_cover').find('.alert').length > 0) {
				jQuery('#product_image_cover').find('.alert').remove();
			}
			var count = jQuery(this).get(0).files.length;
			if(count != 0) {
				var form_data = new Array();
				for(var i = 0; i < count; i++) {
					form_data.push(jQuery(this).get(0).files[i]);
				}
				upload_multiple_files(form_data, 'product_image', '0');
				event.target.value = null;
			}
			else {
				return false;
			}
		});	
	}
});

function upload_multiple_files(form_data, field, index) {
	if(parseInt(index) < form_data.length) {
        var file = form_data[index];
		if(typeof file != "undefined" && file != null && file != "") {
			var image_type = file.type;
			var idxDot = file.name.lastIndexOf(".") + 1;
			var extFile = file.name.substr(idxDot, file.name.length).toLowerCase();
			if(extFile=="jpg" || extFile=="jpeg" || extFile=="png") {
				var image_size = file.size;
				if(image_size < 2000000) {
					var fileReader = new FileReader();
					fileReader.readAsDataURL(file);
					fileReader.onload = (function(event) {
						var image = new Image();
						image.src = event.target.result;
						image.onload = function() {
							if(field == "product_image") {
								if(jQuery('.banner_div').length < 4) {
									// if(this.width == 1500 && this.height == 1500) {
										if(jQuery('.product_image_cover').parent().find('div.alert').length > 0) {
											jQuery('.product_image_cover').parent().find('div.alert').remove();
										}
										var image_url = event.target.result;
										var request = jQuery.ajax({ url: "image_upload.php", type: "POST", data: {"image_url" : image_url, "image_type" : image_type, "field" : field}});							
										request.done(function(result) {
											var banner_div_id = '<div class="col-lg-3 col-md-3 col-3 px-1"><div id="banner_div" class="form-group w-100 px-3 py-3 banner_div">'+result+'</div></div>';
											jQuery('.product_image_cover').append(banner_div_id);

											setTimeout( function(){ 
												index = parseInt(index) + 1;
												upload_multiple_files(form_data, field, index);
											}, 1000);

										});
									// }
									// else {
									// 	if(jQuery('.product_image_cover').parent().find('div.alert').length > 0) {
									// 		jQuery('.product_image_cover').parent().find('div.alert').remove();
									// 	}
									// 	jQuery('.product_image_cover').before('<div class="alert alert-danger w-100 text-center" style="font-size: 15px; line-height: 18px;">Upload image given required size</div>');
									// }
								}
								else {
									if(jQuery('.product_image_cover').parent().find('div.alert').length > 0) {
										jQuery('.product_image_cover').parent().find('div.alert').remove();
									}
									jQuery('.product_image_cover').before('<div class="alert alert-danger w-100 text-center" style="font-size: 15px; line-height: 18px;">Product image max count : 4</div>');
								}	
							}
						}
					});
				}
			}
		}
    }
}

function delete_multiple_files(obj, field) {
	if(field == "product_image") {
		jQuery(obj).parent().parent().remove();
	}
	else {
		jQuery(obj).parent().remove();
	}
}

function upload_files(obj, field) {
	var fileName = jQuery(obj).get(0).files[0];	
	var image_type = fileName.type;
				
	var idxDot = fileName.name.lastIndexOf(".") + 1;
	var extFile = fileName.name.substr(idxDot, fileName.name.length).toLowerCase();
	if(extFile=="jpg" || extFile=="jpeg" || extFile=="png") {
		var image_size = fileName.size;
		if(image_size < 2000000) {
			var width = ""; var height = "";		
			var reader = new FileReader();				
			reader.readAsDataURL(fileName);					
			reader.onload = function(event) {
				var image = new Image();
				image.src = event.target.result;
				image.onload = function() {
                    /*if(field == "listing_image") {
                        if(this.width == 900 && this.height == 1350) {*/
                            jQuery("#"+field+"_preview").fadeIn("fast").attr('src',event.target.result);
                            var image_url = event.target.result;
                            var request = jQuery.ajax({ url: "image_upload_1.php", type: "POST", data: {"image_url" : image_url, "image_type" : image_type, "field" : field}});							
                            request.done(function(result) {
                                var msg = result;
                                jQuery('#'+field+'_cover .cover').html(msg);
                            });
                        /*}
                        else {
                            if(jQuery('div.alert').length > 0) {
								jQuery('div.alert').remove();
							}
							jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Upload image given required size</div>');
                        }
                    }*/
				}
			}
		}
		else {
			if(jQuery('div.alert').length > 0) {
				jQuery('div.alert').remove();
			}
			jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Image size is greater than 2MB</div>');
		}
		
	}
	else {
		if(jQuery('div.alert').length > 0) {
			jQuery('div.alert').remove();
		}
		jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Please upload only Image</div>');
	}
}

function delete_upload_image_before_save(obj, field, delete_image_file) {
	jQuery(obj).parent().html('<img src="images/cloudupload.png" class="img-fluid" id="'+field+'_preview"/>');
}