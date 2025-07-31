// JavaScript Document
function CheckPassword(field_name) {
	var password = "";
	if (jQuery('input[name="password"]').length > 0) {
		password = jQuery('input[name="password"]').val();
		//password = jQuery.trim(password);
	}

	if (jQuery('#password_cover').length > 0) {
		if (jQuery('#password_cover').find('label').length > 0) {
			jQuery('#password_cover').find('label').addClass('text-danger');
		}
		if (jQuery('#password_cover').find('input[name="length_check"]').length > 0) {
			jQuery('#password_cover').find('input[name="length_check"]').prop('checked', false);
		}
		if (jQuery('#password_cover').find('input[name="letter_check"]').length > 0) {
			jQuery('#password_cover').find('input[name="letter_check"]').prop('checked', false);
		}
		if (jQuery('#password_cover').find('input[name="number_symbol_check"]').length > 0) {
			jQuery('#password_cover').find('input[name="number_symbol_check"]').prop('checked', false);
		}
		if (jQuery('#password_cover').find('input[name="space_check"]').length > 0) {
			jQuery('#password_cover').find('input[name="space_check"]').prop('checked', false);
		}

		var upper_regex = /[A-Z]/; var lower_regex = /[a-z]/;
		var number_regex = /\d/; var symbol_regex = /[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\]/; var no_space_regex = /^\S+$/;

		if (typeof password != "undefined" && password != null && password != "") {
			var password_length = password.length;
			if (parseInt(password_length) >= 8 && parseInt(password_length) <= 20) {
				if (jQuery('#password_cover').find('input[name="length_check"]').length > 0) {
					jQuery('#password_cover').find('input[name="length_check"]').prop('checked', true);
					if (jQuery('#password_cover').find('input[name="length_check"]').parent().find('label').length > 0) {
						jQuery('#password_cover').find('input[name="length_check"]').parent().find('label').removeClass('text-danger');
						jQuery('#password_cover').find('input[name="length_check"]').parent().find('label').addClass('text-success');
					}
				}
			}
			if ((upper_regex.test(password) == true) && (lower_regex.test(password) == true)) {
				if (jQuery('#password_cover').find('input[name="letter_check"]').length > 0) {
					jQuery('#password_cover').find('input[name="letter_check"]').prop('checked', true);
					if (jQuery('#password_cover').find('input[name="letter_check"]').parent().find('label').length > 0) {
						jQuery('#password_cover').find('input[name="letter_check"]').parent().find('label').removeClass('text-danger');
						jQuery('#password_cover').find('input[name="letter_check"]').parent().find('label').addClass('text-success');
					}
				}
			}
			if ((number_regex.test(password) == true) && (symbol_regex.test(password) == true)) {
				if (jQuery('#password_cover').find('input[name="number_symbol_check"]').length > 0) {
					jQuery('#password_cover').find('input[name="number_symbol_check"]').prop('checked', true);
					if (jQuery('#password_cover').find('input[name="number_symbol_check"]').parent().find('label').length > 0) {
						jQuery('#password_cover').find('input[name="number_symbol_check"]').parent().find('label').removeClass('text-danger');
						jQuery('#password_cover').find('input[name="number_symbol_check"]').parent().find('label').addClass('text-success');
					}
				}
			}
			if (no_space_regex.test(password) == true) {
				if (jQuery('#password_cover').find('input[name="space_check"]').length > 0) {
					jQuery('#password_cover').find('input[name="space_check"]').prop('checked', true);
					if (jQuery('#password_cover').find('input[name="space_check"]').parent().find('label').length > 0) {
						jQuery('#password_cover').find('input[name="space_check"]').parent().find('label').removeClass('text-danger');
						jQuery('#password_cover').find('input[name="space_check"]').parent().find('label').addClass('text-success');
					}
				}
			}
		}
	}
}
function FormSubmit(event, form_name, submit_page, redirection_page) {
	event.preventDefault();

	if (jQuery('div.alert').length > 0) {
		jQuery('div.alert').remove();
	}
	jQuery('form[name="' + form_name + '"]').find('.row:first').before('<div class="alert alert-danger mb-5"> <button type="button" class="btn-close" data-bs-dismiss="alert"></button> Processing </div>');

	if (jQuery('.submit_button').length > 0) {
		jQuery('.submit_button').attr('disabled', true);
	}
	jQuery.ajax({
		url: submit_page,
		type: "post",
		async: true,
		data: jQuery('form[name="' + form_name + '"]').serialize(),
		dataType: 'html',
		contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
		success: function (data) {
			//console.log(data);
			try {
				var x = JSON.parse(data);
			} catch (e) {
				return false;
			}
			//console.log(x);

			if (jQuery('span.infos').length > 0) {
				jQuery('span.infos').remove();
			}
			if (jQuery('.valid_error').length > 0) {
				jQuery('.valid_error').remove();
			}
			if (jQuery('div.alert').length > 0) {
				jQuery('div.alert').remove();
			}

			if (typeof x.redirection_page != "undefined" && x.redirection_page != "") {
				redirection_page = x.redirection_page;
			}

			if (x.number == '1') {
				jQuery('form[name="' + form_name + '"]').find('.row:first').before('<div class="alert alert-success"> <button type="button" class="btn-close" data-bs-dismiss="alert"></button> ' + x.msg + ' </div>');
				jQuery('html, body').animate({
					scrollTop: (jQuery('form[name="' + form_name + '"]').offset().top)
				}, 500);
				setTimeout(function () {
					if (typeof redirection_page != "undefined" && redirection_page != "") {
						window.location = redirection_page;
					}
					else {
						window.location.reload();
					}
				}, 1000);
			}

			if (x.number == '2') {
				jQuery('form[name="' + form_name + '"]').find('.row:first').before('<div class="alert alert-danger"> <button type="button" class="btn-close" data-bs-dismiss="alert"></button> ' + x.msg + ' </div>');
				if (jQuery('.submit_button').length > 0) {
					jQuery('.submit_button').attr('disabled', false);
				}
				jQuery('html, body').animate({
					scrollTop: (jQuery('form[name="' + form_name + '"]').offset().top)
				}, 500);
			}

			if (x.number == '3') {
				jQuery('form[name="' + form_name + '"]').append('<div class="valid_error"> <script type="text/javascript"> ' + x.msg + ' </script> </div>');
				if (jQuery('.submit_button').length > 0) {
					jQuery('.submit_button').attr('disabled', false);
				}
				jQuery('html, body').animate({
					scrollTop: (jQuery('form[name="' + form_name + '"]').offset().top)
				}, 500);
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	});
}
function table_listing_records_filter() {
	if (jQuery('#table_listing_records').length > 0) {
		jQuery('#table_listing_records').html('<div class="alert alert-success mb-3 mx-3"> Loading... </div>');
	}

	var check_login_session = 1;
	// var post_url = "dashboard_changes.php?check_login_session=1";
	// jQuery.ajax({
	// 	url: post_url, success: function (check_login_session) {
	if (check_login_session == 1) {
		var page_title = ""; var post_send_file = "";
		if (jQuery('input[name="page_title"]').length > 0) {
			page_title = jQuery('input[name="page_title"]').val();
			if (typeof page_title != "undefined" && page_title != "") {
				page_title = page_title.replace(" ", "_");
				page_title = page_title.toLowerCase();
				page_title = jQuery.trim(page_title);
				post_send_file = page_title + "_changes.php";
			}
		}
		jQuery.ajax({
			url: post_send_file,
			type: "post",
			async: true,
			data: jQuery('form[name="table_listing_form"]').serialize(),
			dataType: 'html',
			contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
			success: function (result) {
				if (jQuery('.alert').length > 0) {
					jQuery('.alert').remove();
				}
				if (jQuery('#table_listing_records').length > 0) {
					jQuery('#table_listing_records').html(result);
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	}
	else {
		window.location.reload();
	}
	// 	}
	// });
}

function ShowModalContent(page_title, add_edit_id_value) {
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	// jQuery.ajax({url: post_url, success: function(check_login_session){
	// 	if(check_login_session == 1) {
	var add_edit_id = ""; var post_send_file = ""; var heading = "";
	if (typeof page_title != "undefined" && page_title != "") {
		heading = page_title;
		page_title = page_title.replaceAll(" ", "_");
		page_title = page_title.toLowerCase();
		add_edit_id = "show_" + page_title + "_id";
		post_send_file = page_title + "_changes.php";
		page_title = page_title + " Details";
		if (jQuery('.edit_title').length > 0) {
			page_title = page_title.replaceAll("_", " ");
			page_title = page_title.toLowerCase().replace(/\b[a-z]/g, function (string) {
				return string.toUpperCase();
			});
			jQuery('.edit_title').html(page_title);
		}
		if (jQuery('#table_records_cover').length > 0) {
			jQuery('#table_records_cover').addClass('d-none');
		}
		if (jQuery('#add_update_form_content').length > 0) {
			jQuery('#add_update_form_content').removeClass('d-none');
		}
	}
	var post_url = post_send_file + "?" + add_edit_id + "=" + add_edit_id_value;
	jQuery.ajax({
		url: post_url, success: function (result) {
			if (jQuery('.add_update_form_content').length > 0) {
				jQuery('.add_update_form_content').html("");
				jQuery('.add_update_form_content').html(result);
			}
			jQuery('html, body').animate({
				scrollTop: (jQuery('.add_update_form_content').parent().parent().offset().top)
			}, 500);
		}
	});
	// }
	// else {
	// 	window.location.reload();
	// }
	// }});
}

function SaveModalContent(event, form_name, post_send_file, redirection_file) {
	event.preventDefault();
	if (jQuery('span.infos').length > 0) {
		jQuery('span.infos').remove();
	}
	if (jQuery('.valid_error').length > 0) {
		jQuery('.valid_error').remove();
	}
	if (jQuery('div.alert').length > 0) {
		jQuery('div.alert').remove();
	}
	if (jQuery('input[name="cal_save_form_value"]').length > 0) {
		jQuery('input[name="cal_save_form_value"]').val('2');
	}


	jQuery(window).off('beforeunload');
	jQuery('form[name="' + form_name + '"]').find('.row:first').before('<div class="alert alert-danger mb-3"> Processing </div>');
	if(form_name == 'daily_updates_form'){
		document.querySelector('#description').value = dailyupdateseditorInstance.getData();
	} else if(form_name == 'customer_base_form'){
		document.querySelector('#description').value = customerbaseeditorInstance.getData();
	} else if(form_name == 'faq_form'){
		document.querySelector('#description').value = faqeditorInstance.getData();
	}
	if (form_name != "bill_product_form") {
		if (jQuery('form[name="' + form_name + '"]').find('.submit_button').length > 0) {
			jQuery('form[name="' + form_name + '"]').find('.submit_button').attr('disabled', true);
		}
	}
	if (form_name != "register_form" && form_name != "login_form") {
		jQuery('html, body').animate({
			scrollTop: (jQuery('body').offset().top)
		}, 500);
		var check_login_session = 1;
		var post_url = "dashboard_changes.php?check_login_session=1";
		jQuery.ajax({
			url: post_url, success: function (check_login_session) {
				if (check_login_session == 1) {
					SendModalContent(form_name, post_send_file, redirection_file);
				}
				else {
					window.location.reload();
				}
			}
		});
	}
	else {
		jQuery('html, body').animate({
			scrollTop: (jQuery('form[name="' + form_name + '"]').offset().top)
		}, 500);
		SendModalContent(form_name, post_send_file, redirection_file);
	}
}

function SendModalContent(form_name, post_send_file, redirection_file) {
	jQuery.ajax({
		url: post_send_file,
		type: "post",
		async: true,
		data: jQuery('form[name="' + form_name + '"]').serialize(),
		dataType: 'html',
		contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
		success: function (data) {
			// console.log(data);
			try {
				var x = JSON.parse(data);
			} catch (e) {
				return false;
			}
			//console.log(x);
			if (jQuery('span.infos').length > 0) {
				jQuery('span.infos').remove();
			}
			if (jQuery('.valid_error').length > 0) {
				jQuery('.valid_error').remove();
			}
			if (jQuery('div.alert').length > 0) {
				jQuery('div.alert').remove();
			}
			if (x.number == '1') {
				jQuery('form[name="' + form_name + '"]').find('.row:first').before('<div class="alert alert-success"> ' + x.msg + ' </div>');
				setTimeout(function () {
					// alert(x.party_id);
					var page_title = "";
					if (jQuery('input[name="page_title"]').length > 0) {
						page_title = jQuery('input[name="page_title"]').val();
						page_title = page_title.trim()
					}
					if((typeof x.dish_id != "undefined" && x.dish_id != "" && page_title != 'Dish') ) {

                        if (jQuery('form[name="' + form_name + '"]').find('.submit_button').length > 0) {
                            jQuery('form[name="' + form_name + '"]').find('.submit_button').attr('disabled', false);
                        }


                        // selected_form = page_title.replaceAll(" ", "_");
                        // selected_form = selected_form.toLowerCase();
                        
                        // ChangeCategoryIDs(selected_form+"_form");

						if(jQuery('#CustomDishModal .modal-header').find('.close').length > 0) {
                            jQuery('#CustomDishModal .modal-header').find('.close').trigger("click");
                        }

						ChangeDishIDs();
                    }
					else if((typeof x.product_id != "undefined" && x.product_id != "" && page_title != 'Product') ) {
                        

                        if (jQuery('form[name="' + form_name + '"]').find('.submit_button').length > 0) {
                            jQuery('form[name="' + form_name + '"]').find('.submit_button').attr('disabled', false);
                        }

						if(jQuery('#CustomProductModal .modal-header').find('.close').length > 0) {
                            jQuery('#CustomProductModal .modal-header').find('.close').trigger("click");
                        }

						ChangeProductIDs();
                    }
					else if (jQuery('.redirection_form').length > 0) {
						
						if (typeof x.redirection_page != "undefined" && x.redirection_page != "") {
							
							if (form_name == 'sales_bill_form') {
								
								
								if (x.sales_bill_add == '1') {
									window.location = 'sales_bill.php?from=add';
								} else if (x.sales_bill_list == '1') {
									
									// window.open('sales_bill.php', '_self');
									window.location = 'sales_bill.php?from=list';
								}
							} else {
								window.location = x.redirection_page;
							}
							
						}
						else {
							window.location = redirection_file;
						}
					}
					else {
						if (jQuery('#add_update_form_content').length > 0) {
							jQuery('#add_update_form_content').addClass('d-none');
						}
						if (jQuery('#table_records_cover').hasClass('d-none')) {
							jQuery('#table_records_cover').removeClass('d-none');
						}
						table_listing_records_filter();
					}
				}, 1000);
			}
			if (x.number == '2') {
				jQuery('form[name="' + form_name + '"]').find('.row:first').before('<div class="alert alert-danger"> ' + x.msg + ' </div>');
				if (jQuery('form[name="' + form_name + '"]').find('.submit_button').length > 0) {
					jQuery('form[name="' + form_name + '"]').find('.submit_button').attr('disabled', false);
				}
				if (form_name == "purchase_order_desktop_form") {
					if (jQuery('form[name="purchase_order_mobile_form"]').length > 0) {
						jQuery('form[name="purchase_order_mobile_form"]').find('input, select, textarea, button').prop('disabled', false);
					}
				}
				else if (form_name == "purchase_order_mobile_form") {
					if (jQuery('form[name="purchase_order_desktop_form"]').length > 0) {
						jQuery('form[name="purchase_order_desktop_form"]').find('input, select, textarea, button').prop('disabled', false);
					}
				}
			}
			if (x.number == '3') {
				jQuery('form[name="' + form_name + '"]').append('<div class="valid_error"> <script type="text/javascript"> ' + x.msg + ' </script> </div>');
				if (jQuery('form[name="' + form_name + '"]').find('.submit_button').length > 0) {
					jQuery('form[name="' + form_name + '"]').find('.submit_button').attr('disabled', false);
				}
				if (form_name == "purchase_order_desktop_form") {
					if (jQuery('form[name="purchase_order_mobile_form"]').length > 0) {
						jQuery('form[name="purchase_order_mobile_form"]').find('input, select, textarea, button').prop('disabled', false);
					}
				}
				else if (form_name == "purchase_order_mobile_form") {
					if (jQuery('form[name="purchase_order_desktop_form"]').length > 0) {
						jQuery('form[name="purchase_order_desktop_form"]').find('input, select, textarea, button').prop('disabled', false);
					}
				}
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	});
}

function DeleteModalContent(page_title, delete_content_id) {
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				if (typeof page_title != "undefined" && page_title != "") {
					jQuery('#DeleteModal .modal-header').find('h4').html("");
					jQuery('#DeleteModal .modal-header').find('h4').html("Delete " + page_title);
					page_title = page_title.toLowerCase();
				}
				// alert(jQuery('.delete_modal_button').length);
				// jQuery('.delete_modal_button').trigger("click");
				var modal = new bootstrap.Modal(document.getElementById('DeleteModal'));
				modal.show();
				jQuery('#DeleteModal .modal-body').html('');
				if (page_title == "quotation" || page_title == "estimate" || page_title == "invoice") {
					jQuery('#DeleteModal .modal-body').html('Are you surely want to cancel this ' + page_title + '?');
				}
				else {
					jQuery('#DeleteModal .modal-body').html('Are you surely want to delete this ' + page_title + '?');
				}

				jQuery('#DeleteModal .modal-footer .yes').attr('id', delete_content_id);
				jQuery('#DeleteModal .modal-footer .no').attr('id', delete_content_id);
			}
			else {
				window.location.reload();
			}
		}
	});
}
function DeleteNumberModalContent(page_title, delete_content_id) {

	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				if (typeof page_title != "undefined" && page_title != "") {
					jQuery('#ReceiptDeleteModal .modal-header').find('h4').html("");
					jQuery('#ReceiptDeleteModal .modal-header').find('h4').html("Delete " + page_title);

					page_title = page_title.toLowerCase();
				}
				jQuery('.receipt_delete_modal_button').trigger("click");
				jQuery('#ReceiptDeleteModal .modal-body').html('');

				if (page_title == "quotation" || page_title == "estimate" || page_title == "invoice") {
					jQuery('#ReceiptDeleteModal .modal-body').html('Are you surely want to cancel this ' + page_title + '?');
				}
				else {
					jQuery('#ReceiptDeleteModal .modal-body').html('Are you surely want to delete this ' + page_title + '?');
				}

				jQuery('#ReceiptDeleteModal .modal-footer .yes').attr('id', delete_content_id);
				jQuery('#ReceiptDeleteModal .modal-footer .no').attr('id', delete_content_id);
			}
			else {
				window.location.reload();
			}
		}
	});
}

function confirm_delete_modal(obj) {
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {

				if (jQuery('#DeleteModal .modal-body').find('.infos').length > 0) {
					jQuery('#DeleteModal .modal-body').find('.infos').remove();
				}

				var page_title = ""; var post_send_file = "";
				if (jQuery('input[name="page_title"]').length > 0) {
					page_title = jQuery('input[name="page_title"]').val();
					if (typeof page_title != "undefined" && page_title != "") {
						page_title = page_title.replace(" ", "_");
						page_title = page_title.toLowerCase();
						page_title = jQuery.trim(page_title);
						post_send_file = page_title + "_changes.php";
					}
				}
				var delete_content_id = jQuery(obj).attr('id');

				var post_url = post_send_file + "?delete_" + page_title + "_id=" + delete_content_id;
				jQuery.ajax({
					url: post_url, success: function (result) {
						jQuery('#DeleteModal .modal-content').animate({ scrollTop: 0 }, 500);

						var intRegex = /^\d+$/;
						if (intRegex.test(result) == true) {
							if (page_title == "quotation" || page_title == "estimate" || page_title == "invoice") {
								jQuery('#DeleteModal .modal-body').append('<div class="alert alert-success"> <button type="button" class="btn-close" data-bs-dismiss="alert"></button> Successfully Cancel the ' + page_title.replace("_", " ") + ' </div>');
							}
							else {
								jQuery('#DeleteModal .modal-body').append('<div class="alert alert-success"> <button type="button" class="btn-close" data-bs-dismiss="alert"></button> Successfully Delete the ' + page_title.replace("_", " ") + ' </div>');
							}
							setTimeout(function () {
								jQuery('#DeleteModal .modal-header .close').trigger("click");
								window.location.reload();
							}, 1000);

						}
						else {
							jQuery('#DeleteModal .modal-body').append('<span class="infos w-100 text-center" style="font-size: 15px; font-weight: bold;">' + result + '</span>');
						}
					}
				});

			}
			else {
				window.location.reload();
			}
		}
	});
}
function cancel_delete_modal(obj) {
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				jQuery('#DeleteModal .modal-header .close').trigger("click");
			}
			else {
				window.location.reload();
			}
		}
	});
}


function accordion_module_table(obj) {
	var current_row = $(obj).closest('h4');
	var next_row = current_row.next('.accordion-body');

	if (next_row.is(':hidden')) {
		next_row.stop(true, true).slideDown(500);
	} else {
		next_row.stop(true, true).slideUp(500);
	}


	var icon = obj.querySelector('i');
	icon.classList.toggle('fa-angle-down');
	icon.classList.toggle('fa-angle-up');
}



function CustomCheckboxToggle(obj, toggle_id, action, count) {
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {

				var hiddenInput = jQuery('#' + toggle_id + "_action");

				if (hiddenInput.length > 0) {
					var currentValue = hiddenInput.val();
					if (jQuery(obj).prop('checked')) {
						if (currentValue.indexOf(action) === -1) {
							currentValue += action;
						}
					} else {
						currentValue = currentValue.replace(action, '');
					}

					hiddenInput.val(currentValue);
				}

				var toggle_value = 2;
				if (jQuery('#' + toggle_id).length > 0) {
					if (jQuery('#' + toggle_id).prop('checked') == true) {
						toggle_value = 1;
					}
					jQuery('#' + toggle_id).val(toggle_value);
				}
				if (jQuery('.gst_row').length > 0) {
					if (jQuery('.tax_type_cover').length > 0) {
						if (parseInt(toggle_value) == 1) {
							jQuery('.tax_type_cover').removeClass('d-none');
						}
						else {
							jQuery('.tax_type_cover').addClass('d-none');
						}
					}
					ShowHideGSTRows();
				}
				if (jQuery('.staff_access_table_' + count).length > 0) {
					toggle_id = toggle_id.replace('view', '');
					toggle_id = toggle_id.replace('add', '');
					toggle_id = toggle_id.replace('edit', '');
					toggle_id = toggle_id.replace('delete', '');
					toggle_id = toggle_id.replace('paynow', '');
					toggle_id = jQuery.trim(toggle_id);

					var checkbox_cover = toggle_id + "_cover";
					// console.log('checkbox_cover - '+checkbox_cover+', checbox count - '+jQuery('#'+checkbox_cover).find('input[type="checkbox"]').length);
					if (jQuery('#' + checkbox_cover).find('input[type="checkbox"]').length > 0) {

						var view_checkbox = toggle_id + "_view"; var add_checkbox = toggle_id + "_add"; var edit_checkbox = toggle_id + "_edit";
						var delete_checkbox = toggle_id + "_delete"; var paynow_checkbox = toggle_id + "_paynow"; var select_count = 0; var select_all_checkbox = toggle_id + "_select_all";
						//console.log('add_checkbox - '+add_checkbox+', edit_checkbox - '+edit_checkbox+', delete_checkbox - '+delete_checkbox+', select_all_checkbox - '+select_all_checkbox);
						// if (jQuery('#' + view_checkbox).prop('checked') == true) {
						// 	select_count = parseInt(select_count) + 1;
						// }
						if (jQuery('#' + view_checkbox).prop('checked') == true) {
							select_count = parseInt(select_count) + 1;
							jQuery('#' + view_checkbox).val(1);
						} else {
							select_count = parseInt(select_count) - 1;
							jQuery('#' + view_checkbox).val(2);
						}


						if (jQuery('#' + add_checkbox).prop('checked') == true) {
							jQuery('#' + view_checkbox).prop('checked', true);
							if (jQuery('#' + view_checkbox).prop('checked') == true) {
								select_count = parseInt(select_count) + 1;
								jQuery('#' + view_checkbox).val(1);

							}
							else {
								jQuery('#' + view_checkbox).prop('checked', true);
								select_count = parseInt(select_count) + 1;
								jQuery('#' + view_checkbox).val(1);

							}
						}
						if (jQuery('#' + edit_checkbox).prop('checked') == true) {
							jQuery('#' + view_checkbox).prop('checked', true);
							if (jQuery('#' + view_checkbox).prop('checked') == true) {
								select_count = parseInt(select_count) + 1;
								jQuery('#' + view_checkbox).val(1);
							}
							else {
								jQuery('#' + view_checkbox).prop('checked', true);
								select_count = parseInt(select_count) + 1;
								jQuery('#' + view_checkbox).val(1);
							}
						}
						if (jQuery('#' + delete_checkbox).prop('checked') == true) {
							jQuery('#' + view_checkbox).prop('checked', true);
							if (jQuery('#' + view_checkbox).prop('checked') == true) {
								select_count = parseInt(select_count) + 1;
								jQuery('#' + view_checkbox).val(1);
							}
							else {
								jQuery('#' + view_checkbox).prop('checked', true);
								select_count = parseInt(select_count) + 1;
							}
						}
						if (jQuery('#' + paynow_checkbox).prop('checked') == true) {
							jQuery('#' + view_checkbox).prop('checked', true);
							if (jQuery('#' + view_checkbox).prop('checked') == true) {
								select_count = parseInt(select_count) + 1;
								jQuery('#' + view_checkbox).val(1);
							}
							else {
								jQuery('#' + view_checkbox).prop('checked', true);
								select_count = parseInt(select_count) + 1;
							}
						}
						if (toggle_id == '556d566a5a576c7764413d3d_' || toggle_id == '566d39315932686c636e4d3d_') {
							if (parseInt(select_count) == 3 || parseInt(select_count) > 3) {
								jQuery('#' + select_all_checkbox).prop('checked', true);
							}
							else {
								jQuery('#' + select_all_checkbox).prop('checked', false);
							}
						}
						else {

							if (parseInt(select_count) == 4 || parseInt(select_count) > 4) {
								jQuery('#' + select_all_checkbox).prop('checked', true);
							} else {
								jQuery('#' + select_all_checkbox).prop('checked', false);
								var currentValue = jQuery('#' + toggle_id + "_action").val();

								if (!jQuery('#' + view_checkbox).prop('checked') && !jQuery('#' + edit_checkbox).prop('checked') && !jQuery('#' + delete_checkbox).prop('checked')) {
									// If view, edit, and delete are all unchecked, clear the value
									currentValue = currentValue.replace('V', '');
								} else if (!currentValue.includes('V')) {
									currentValue += 'V';
								}
								// 	if (!currentValue.includes('V')) {
								// 		currentValue += 'V'; 
								// 	}

								jQuery('#' + toggle_id + "_action").val(currentValue);
							}

						}
					}
				}
			}
			else {
				window.location.reload();
			}
		}
	});
}

function SelectAllModuleActionToggle(obj, toggle_id) {
	// alert(toggle_id+"hello")
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				var toggle_value = 2;
				if (jQuery('#' + toggle_id + "_select_all").length > 0) {
					if (jQuery('#' + toggle_id + "_select_all").prop('checked') == true) {
						toggle_value = 1;
					}
					jQuery('#' + toggle_id + "_select_all").val(toggle_value);
				}
				// alert(toggle_value+"hai")
				if (parseInt(toggle_value) == 1) {
					if (jQuery('#' + toggle_id + "_select_all").closest('tr').find('input[type="checkbox"]').length > 0) {
						jQuery('#' + toggle_id + "_select_all").closest('tr').find('input[type="checkbox"]').each(function () {
							jQuery(this).prop('checked', true);
							jQuery(this).val('1');
							var currentValue = jQuery('#' + toggle_id + "_action").val('VEAD');
						});
					}
				}
				else {
					if (jQuery('#' + toggle_id + "_select_all").closest('tr').find('input[type="checkbox"]').length > 0) {
						jQuery('#' + toggle_id + "_select_all").closest('tr').find('input[type="checkbox"]').each(function () {
							jQuery(this).prop('checked', false);
							jQuery(this).val('2');
							var currentValue = jQuery('#' + toggle_id + "_action").val('');
						});
					}
				}
			}
			else {
				window.location.reload();
			}
		}
	});
}

function checkDateCheck() {
	var from_date = ""; var to_date = "";
	if (jQuery('.infos').length > 0) {
		jQuery('.infos').each(function () { jQuery(this).remove(); });
	}
	if (jQuery('input[name="from_date"]').length > 0) {
		from_date = jQuery('input[name="from_date"]').val();
	}
	if (jQuery('input[name="to_date"]').length > 0) {
		to_date = jQuery('input[name="to_date"]').val();
	}
	if (to_date != "") {
		if (from_date > to_date) {
			jQuery('input[name="to_date"]').after('<span class="infos">To date Must be greater than the date ' + from_date + '</span>');
			if (jQuery('input[name="to_date"]').length > 0) {
				jQuery('input[name="to_date"]').val("");
			}
		}
	}
}

function assign_bill_value() {
	if (jQuery("#show_bill").val() == "0") {
		jQuery("#show_bill").val("1");
		jQuery("#show_button").html("Show Active Bill");
		table_listing_records_filter();
	}
	else {
		jQuery("#show_bill").val("0");
		jQuery("#show_button").html("Show Inactive Bill")
		table_listing_records_filter();
	}
}


function confirm_record_modal(obj) {

	var purchase_invoice_id = jQuery(obj).attr('id');
	// var post_url = "voucher_changes.php?view_payment_details="+edit_id;
	var modal = new bootstrap.Modal(document.getElementById('VoucherModal'));
	modal.show();
	var post_url = "voucher_changes.php?show_voucher_id=&add_payment_details=1" + "&purchase_invoice_id=" + purchase_invoice_id;
	jQuery.ajax({
		url: post_url, success: function (result) {
			result = result.trim();
			if (jQuery('#VoucherModal').length > 0) {
				if (jQuery('#VoucherModal').find('.modal-title').length > 0) {
					jQuery('#VoucherModal').find('.modal-title').html('Voucher');
				}
				if (jQuery('#VoucherModal').find('.modal-body').length > 0) {
					jQuery('#VoucherModal').find('.modal-body').html(result);
				}
			}
		}
	});
}


function CustomCategoryModal(obj) {

	var form_name = 0;

	var form_name = jQuery(obj).closest('form').attr('name');

	if (jQuery('.custom_category_modal_button').length > 0) {
		var post_url = "category_changes.php?show_category_id=&add_custom_category=1" + "&form_name=" + form_name;
		jQuery.ajax({
			url: post_url, success: function (result) {
				result = result.trim();
				if (result != "" && typeof result != "undefined" && result != null) {
					if (jQuery('#CustomCategoryModal').find('.modal-body').length > 0) {
						jQuery('#CustomCategoryModal').find('.modal-body').html(result);
					}

				}
				// jQuery('.custom_category_modal_button').trigger("click");
				var modal = new bootstrap.Modal(document.getElementById('CustomCategoryModal'));
				modal.show();
			}
		});
	}

}

function CustomDishModal(obj) {

	var form_name = 0;

	var form_name = jQuery(obj).closest('form').attr('name');

	if (jQuery('.custom_dish_modal_button').length > 0) {
		var post_url = "dish_changes.php?show_dish_id=&add_custom_dish=1" + "&form_name=" + form_name;
		jQuery.ajax({
			url: post_url, success: function (result) {
				result = result.trim();
				if (result != "" && typeof result != "undefined" && result != null) {
					if (jQuery('#CustomDishModal').find('.modal-body').length > 0) {
						jQuery('#CustomDishModal').find('.modal-body').html(result);
					}

				}
				// jQuery('.custom_dish_modal_button').trigger("click");
				var modal = new bootstrap.Modal(document.getElementById('CustomDishModal'));
				modal.show();
			}
		});
	}

}

function CustomProductModal(obj) {
	var form_name = 0;

	var form_name = jQuery(obj).closest('form').attr('name');

	if(form_name == 'order_form'){
		if (jQuery('select[name="selected_dish_id"]').length > 0) {
			selected_dish_id = jQuery('select[name="selected_dish_id"]').val();
		}
		if (jQuery('select[name="selected_category_id"]').length > 0) {
			selected_category_id = jQuery('select[name="selected_category_id"]').val();
		}
	}

	if (jQuery('.custom_product_modal_button').length > 0) {
		var post_url = "product_changes.php?show_product_id=&add_custom_product=1" + "&form_name=" + form_name+ "&order_dish_id=" + selected_dish_id+ "&order_category_id=" + selected_category_id;
		jQuery.ajax({
			url: post_url, success: function (result) {
				result = result.trim();
				if (result != "" && typeof result != "undefined" && result != null) {
					if (jQuery('#CustomProductModal').find('.modal-body').length > 0) {
						jQuery('#CustomProductModal').find('.modal-body').html(result);
					}

				}
				// jQuery('.custom_product_modal_button').trigger("click");
				var modal = new bootstrap.Modal(document.getElementById('CustomProductModal'));
				modal.show();
			}
		});
	}

}

function ChangeCategoryIDs() {

	var post_url = "common_changes.php?change_category=1";

	jQuery.ajax({
		url: post_url, success: function (result) {
			result = result.trim();

			// alert(result);
			if (jQuery('select[name="selected_category_id"]').length > 0) {
				jQuery('select[name="selected_category_id"]').html(result);
			}
			if (jQuery('select[name="selected_category_id"]').length > 0) {
				jQuery('select[name="selected_category_id"]').select2('open');
			}

		}
	});
}

function ChangeDishIDs() {

	var post_url = "common_changes.php?change_dish=1";

	jQuery.ajax({
		url: post_url, success: function (result) {
			result = result.trim();


			if (jQuery('select[name="selected_dish_id"]').length > 0) {
				jQuery('select[name="selected_dish_id"]').html(result);
			}
			if (jQuery('select[name="selected_dish_id"]').length > 0) {
				jQuery('select[name="selected_dish_id"]').select2('open');
			}

		}
	});
}

function ChangeProductIDs() {

	var post_url = "common_changes.php?change_product=1";

	jQuery.ajax({
		url: post_url, success: function (result) {
			result = result.trim();

			// alert(result);
			if (jQuery('select[name="selected_product_id"]').length > 0) {
				jQuery('select[name="selected_product_id"]').html(result);
			}
			if (jQuery('select[name="selected_product_id"]').length > 0) {
				jQuery('select[name="selected_product_id"]').select2('open');
			}

		}
	});
}


function CustomPartyModal(obj) {
	var form_name = jQuery(obj).closest('form').attr('name');

	if (jQuery("input[type='checkbox']").length > 0) {
		if (jQuery("input[type='checkbox']").prop('checked', false)) {
			if (jQuery("textarea[name='delivery_address']").length > 0) {
				jQuery("textarea[name='delivery_address']").val('');
			}
		} else {
			assign_address();
		}
	}

	if (jQuery('.custom_party_modal_button').length > 0) {
		var post_url = "party_changes.php?show_party_id=&add_custom_party=1" + "&form_name=" + form_name;
		jQuery.ajax({
			url: post_url, success: function (result) {
				result = result.trim();
				if (result != "" && typeof result != "undefined" && result != null) {
					if (jQuery('#CustomPartyModal').find('.modal-body').length > 0) {
						jQuery('#CustomPartyModal').find('.modal-body').html(result);
					}
				}
				// jQuery('.custom_party_modal_button').trigger("click");
				var modal = new bootstrap.Modal(document.getElementById('CustomPartyModal'));
				modal.show();
			}
		});
	}

}

function getShippingAddress() {
	var shipping_address = "";
	if (jQuery('textarea[name="shipping_address"]').length > 0) {
		shipping_address = jQuery('textarea[name="shipping_address"]').val();
	}

	if (jQuery('textarea[name="billing_address"]').length > 0) {
		jQuery('textarea[name="billing_address"]').val(shipping_address);
	}
}

function confirm_bill_modal(obj) {

	var sales_invoice_id = obj;
	// var post_url = "voucher_changes.php?view_payment_details="+edit_id;
	var modal = new bootstrap.Modal(document.getElementById('ReceiptModal'));
	modal.show();
	var post_url = "receipt_changes.php?show_receipt_id=&add_payment_details=1" + "&sales_invoice_id=" + sales_invoice_id;
	jQuery.ajax({
		url: post_url, success: function (result) {
			result = result.trim();
			if (jQuery('#ReceiptModal').length > 0) {
				if (jQuery('#ReceiptModal').find('.modal-title').length > 0) {
					jQuery('#ReceiptModal').find('.modal-title').html('Receipt');
				}
				if (jQuery('#ReceiptModal').find('.modal-body').length > 0) {
					jQuery('#ReceiptModal').find('.modal-body').html(result);
				}
			}
		}
	});
}



