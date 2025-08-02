
jQuery(document).ready(function() {
	if(jQuery('#newsletter_pdf').length > 0) {
		jQuery('#newsletter_pdf').change(function(event) {
			if(jQuery('#newsletter_pdf_cover').find('.alert').length > 0) {
				jQuery('#newsletter_pdf_cover').find('.alert').remove();
			}
			var count = jQuery(this).get(0).files.length;
			if(count != 0) {
				multiple_pdf_upload(this, 'newsletter_pdf', '0');
			}
		});	
	}
	
});

jQuery(document).ready(function() {
	if(jQuery('#home_banner_image').length > 0) {
		jQuery('#home_banner_image').change(function(event) {
			if(jQuery('#home_banner_image_cover').find('.alert').length > 0) {
				jQuery('#home_banner_image_cover').find('.alert').remove();
			}

			var count = jQuery(this).get(0).files.length;
			if(count != 0) {
				multiple_images_upload(this, 'home_banner_image', '0');
			}
		});	
	}
	
});



jQuery(document).ready(function() {
	if(jQuery('#mobile_banner_image').length > 0) {
		jQuery('#mobile_banner_image').change(function(event) {
			if(jQuery('#mobile_banner_image_cover').find('.alert').length > 0) {
				jQuery('#mobile_banner_image_cover').find('.alert').remove();
			}

			var count = jQuery(this).get(0).files.length;
			if(count != 0) {
				multiple_images_upload(this, 'mobile_banner_image', '0');
			}
		});	
	}
	
});



function delete_multiple_files(obj,field) {
	if(field == "product_images") {
		jQuery(obj).parent().parent().remove();
	}
	else {
		jQuery(obj).parent().parent().parent().remove();
		if(typeof cropper != "undefined") {
			cropper.destroy();
		}
	}
}

function multiple_pdf_upload(obj, field, cropper) {
	if(jQuery('div.alert').length > 0) {
		jQuery('div.alert').remove();
	}
	var fileName = jQuery(obj).get(0).files[0];	
	var image_type = fileName.type;

	var idxDot = fileName.name.lastIndexOf(".") + 1;
	var extFile = fileName.name.substr(idxDot, fileName.name.length).toLowerCase();
	// alert(extFile);

	// if(extFile=="jpg" || extFile=="jpeg" || extFile=="png") {
	// 	var image_size = fileName.size;
	// 	if(image_size < 2000000) {
	// 		var width = ""; var height = "";		
	// 		var reader = new FileReader();				
	// 		reader.readAsDataURL(fileName);					
	// 		reader.onload = function(event) {
	// 			var image = new Image();
	// 			image.src = event.target.result;
	// 			image.onload = function() {
	// 				if(cropper == 1) {
	// 					jQuery("#"+field+"_preview").fadeIn("fast").attr('src',event.target.result);
	// 					width = this.width;
	// 					height = this.height;
	// 					start(field, width, height, image_type);
	// 				}
	// 				else {
						
	// 					var image_count = 0; var image_total_count = 0;
	// 					image_count = jQuery('#'+field+'_view').find('.'+field+'_div').length;
	// 					if(field == 'mobile_banner_image'){
	// 						width = 630; height = 700;
	// 						image_total_count = 3;

	// 					}else if(field == 'client_image'){
	// 						width = 300; height = 150;
	// 						image_total_count = 6;
	// 					}else{
	// 						width = 1500; height = 500;
	// 						image_total_count = 3;
	// 					}
	// 					if(parseInt(image_count) < image_total_count) {
	// 						if(this.width == parseInt(width) && this.height == parseInt(height)) {
	// 							jQuery("#"+field+"_view").fadeIn("fast").attr('src',event.target.result);
	// 							var image_url = event.target.result;
	// 							var request = jQuery.ajax({ url: "image_upload_1.php", type: "POST", data: {"image_url" : image_url, "image_type" : image_type, "field" : field}});			

	// 							request.done(function(result) {
	// 								if(field == 'client_image'){
	// 									var banner_div_id = '<div class="'+field+'_div col-lg-2 col-md-4 col-12">   <div class="card"><div class="form-group w-100 px-3 py-3 cover">'+result+'</div></div></div>';    
	// 								}else{
	// 									var banner_div_id = '<div class="'+field+'_div col-lg-4 col-md-4 col-12"><div class="form-group w-100 px-3 py-3 cover">'+result+'</div></div>';    
	// 								}                             
	// 								jQuery('#'+field+'_view').append(banner_div_id);
	// 							});
	// 						}
	// 						else {
	// 							if(jQuery('div.alert').length > 0) {
	// 								jQuery('div.alert').remove();
	// 							}
							
	// 							jQuery('#'+field+'_view').before('<div class="alert alert-danger w-100 text-center"> Image size should be  '+width+' x '+height+' size</div>');
	// 						}
	// 					}
	// 					else {
	// 						if(jQuery('div.alert').length > 0) {
	// 							jQuery('div.alert').remove();
	// 						}
	// 						jQuery('#'+field+'_view').before('<div class="alert alert-danger w-100 text-center">Maximum image upload count was '+image_total_count+'</div>');
	// 					}
						
	// 				}
	// 			}
	// 		}
	// 	}
	// 	else {
	// 		if(jQuery('div.alert').length > 0) {
	// 			jQuery('div.alert').remove();
	// 		}
	// 		jQuery('#'+field+'_view').before('<div class="alert alert-danger w-100 text-center">Image size is greater than 2MB</div>');
	// 	}
		
	// }
	// else
	if(extFile=="pdf") {
		var width = ""; var height = "";
		var image_name = field ;	
		// alert(image_name);	
		var reader = new FileReader();				
		reader.readAsDataURL(fileName);					
		reader.onload = function(event) {
			// jQuery("#"+field+"_preview").fadeIn("fast").attr('src',event.target.result);
			var pdf_url = event.target.result;

			var image_count = 0; 
			image_count = jQuery('#'+field+'_view').find('.'+field+'_div').length;
			if(parseInt(image_count) < 5) {
				var request = jQuery.ajax({ url: "pdf_upload.php", type: "POST", data: {"image_name" : image_name, "pdf_url" : pdf_url, "pdf_type" : image_type}});			
				request.done(function(result) {
					var msg = result;
					// jQuery('#'+field+'_cover .cover').html(msg);
					var banner_div_id = '<div class="'+field+'_div col-lg-2 col-md-4 col-5"><div class="form-group w-100 px-3 py-3 cover">'+msg+'</div></div>';    
						jQuery('#'+field+'_view').append(banner_div_id);
				});
				request.fail(function(jqXHR, textStatus, errorThrown) {
					console.error("Server response:", jqXHR.responseText);
				});
			}	
			else {
				if(jQuery('div.alert').length > 0) {
					jQuery('div.alert').remove();
				}
				jQuery('#'+field+'_view').before('<div class="alert alert-danger w-100 text-center">Maximum pdf upload count was 5</div>');
			}
		}
	}
	else {
		if(jQuery('div.alert').length > 0) {
			jQuery('div.alert').remove();
		}
		jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Please upload pdf only </div>');
	}
}

function multiple_images_upload(obj, field, cropper) {
	if(jQuery('div.alert').length > 0) {
		jQuery('div.alert').remove();
	}
	var fileName = jQuery(obj).get(0).files[0];	
	var image_type = fileName.type;

	var idxDot = fileName.name.lastIndexOf(".") + 1;
	var extFile = fileName.name.substr(idxDot, fileName.name.length).toLowerCase();
	// alert(extFile);

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
					if(cropper == 1) {
						jQuery("#"+field+"_preview").fadeIn("fast").attr('src',event.target.result);
						width = this.width;
						height = this.height;
						start(field, width, height, image_type);
					}
					else {
						
						var image_count = 0; var image_total_count = 0;
						image_count = jQuery('#'+field+'_view').find('.'+field+'_div').length;
						if(field == 'mobile_banner_image'){
							width = 630; height = 700;
							image_total_count = 1;

						}else if(field == 'client_image'){
							width = 300; height = 150;
							image_total_count = 6;
						}else{
							width = 1500; height = 500;
							image_total_count = 1;
						}
						if(parseInt(image_count) < image_total_count) {
							if(this.width == parseInt(width) && this.height == parseInt(height)) {
								jQuery("#"+field+"_view").fadeIn("fast").attr('src',event.target.result);
								var image_url = event.target.result;
								var request = jQuery.ajax({ url: "image_upload_1.php", type: "POST", data: {"image_url" : image_url, "image_type" : image_type, "field" : field}});			

								request.done(function(result) {
									if(field == 'client_image'){
										var banner_div_id = '<div class="'+field+'_div col-lg-2 col-md-4 col-12">   <div class="card"><div class="form-group w-100 px-3 py-3 cover">'+result+'</div></div></div>';    
									}else{
										var banner_div_id = '<div class="'+field+'_div col-lg-12 col-md-12 col-12"><div class="form-group w-100 px-3 py-3 cover">'+result+'</div></div>';    
									}                             
									jQuery('#'+field+'_view').append(banner_div_id);
								});
							}
							else {
								if(jQuery('div.alert').length > 0) {
									jQuery('div.alert').remove();
								}
							
								jQuery('#'+field+'_view').before('<div class="alert alert-danger w-100 text-center"> Image size should be  '+width+' x '+height+' size</div>');
							}
						}
						else {
							if(jQuery('div.alert').length > 0) {
								jQuery('div.alert').remove();
							}
							jQuery('#'+field+'_view').before('<div class="alert alert-danger w-100 text-center">Maximum image upload count was '+image_total_count+'</div>');
						}
						
					}
				}
			}
		}
		else {
			if(jQuery('div.alert').length > 0) {
				jQuery('div.alert').remove();
			}
			jQuery('#'+field+'_view').before('<div class="alert alert-danger w-100 text-center">Image size is greater than 2MB</div>');
		}
		
	}
	// else if(extFile=="pdf") {
	// 	var width = ""; var height = "";
	// 	var image_name = field ;	
	// 	// alert(image_name);	
	// 	var reader = new FileReader();				
	// 	reader.readAsDataURL(fileName);					
	// 	reader.onload = function(event) {
	// 		jQuery("#"+field+"_preview").fadeIn("fast").attr('src',event.target.result);
	// 		var pdf_url = event.target.result;
	// 		// alert(pdf_url);
	// 		// alert(image_type);
	// 		var request = jQuery.ajax({ url: "pdf_upload.php", type: "POST", data: {"image_name" : image_name, "pdf_url" : pdf_url, "pdf_type" : image_type}});			
	// 		request.done(function(result) {
	// 			var msg = result;
	// 			jQuery('#'+field+'_cover .cover').html(msg);
	// 		});
	// 	}
	// }
	else {
		if(jQuery('div.alert').length > 0) {
			jQuery('div.alert').remove();
		}
		jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Please upload only jpg, jpeg or png Image  </div>');
	}
}