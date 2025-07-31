var number_regex = /^\d+$/;
var price_regex = /^(\d*\.)?\d+$/;
var percentage_regex = /^(?:\d{1,2}(?:\.\d{1,2})?)%?$/;
var letter_regex = /^[a-zA-Z\s ]+$/;
var name_regex = /^(?=.*[a-zA-Z])[a-zA-Z\s&\-.']+$/;
var text_no_regex = /^(?=.*[a-zA-Z0-9])[a-zA-Z0-9\s&\-.']+$/;
var product_regex = /^(?=.*[a-zA-Z])[^?!<>$+=`~_|?;^{}]*$/;

function KeyboardControls(obj, type, characters, color) {
	var input = jQuery(obj);
	// Use onkeydown
	if (type == "text") {
		input.on('keypress', function (event) {
			// Get the keycode of the pressed key
			var keyCode = event.keyCode || event.which;
			var inputName = $(this).attr('name');
			if (inputName == 'commission') {
				input.on("input", function (event) {
					var inputVal = input.val();

					if (!percentage_regex.test(inputVal)) {
						// If invalid input, trim the input value
						var trimmedValue = inputVal
							.replace(/[^0-9.%]/g, '') // Remove invalid characters
							.match(/^\d{1,2}(?:\.\d{0,2})?%?/); // Match valid portion of input

						trimmedValue = trimmedValue ? trimmedValue[0] : ''; // Use matched value or empty string

						$(this).val(trimmedValue);
					}
				});
			}
			else {
				// Allow: backspace, delete, tab, escape, enter, and arrow keys
				if ([8, 46, 9, 27, 13, 37, 38, 39, 40].indexOf(keyCode) !== -1 ||
					// Allow: Ctrl+A, Ctrl+C, Ctrl+V, Ctrl+X
					(keyCode === 65 && (event.ctrlKey || event.metaKey)) ||
					(keyCode === 67 && (event.ctrlKey || event.metaKey)) ||
					(keyCode === 86 && (event.ctrlKey || event.metaKey)) ||
					(keyCode === 88 && (event.ctrlKey || event.metaKey)) ||
					// Allow: home, end, page up, page down
					(keyCode >= 35 && keyCode <= 40)) {
					// Let it happen, don't do anything
					return;
				}

				// Block numeric key codes (0-9 on main keyboard and numpad)
				if ((keyCode >= 48 && keyCode <= 57)) {
					event.preventDefault();
				}
			}
		});
	}
	// Use onfocus
	if (type == "mobile_number") {
		input.on('keypress', function (event) {
			var keyCode = event.keyCode || event.which;

			// Allow: backspace, delete, tab, escape, enter, period, arrow keys
			if ([8, 46, 9, 27, 13, 190].indexOf(keyCode) !== -1 ||
				// Allow: Ctrl+A, Ctrl+C, Ctrl+V, Ctrl+X
				(keyCode === 65 && (event.ctrlKey || event.metaKey)) ||
				(keyCode === 67 && (event.ctrlKey || event.metaKey)) ||
				(keyCode === 86 && (event.ctrlKey || event.metaKey)) ||
				(keyCode === 88 && (event.ctrlKey || event.metaKey)) ||
				// Allow: arrow keys
				(keyCode >= 37 && keyCode <= 40)) {
				// Let it happen, don't do anything
				return;
			}

			// Ensure that it is a number and stop the keypress if not
			if ((keyCode < 48 || keyCode > 57)) {
				event.preventDefault();
			}
		});

		input.on("input", function (event) {
			var str_len = input.val().length;
			if (str_len > 10) {
				input.val(input.val().substring(0, 10));
			}
		});
		input.on('keypress', function (event) {
			if (event.keyCode === 32) {
				event.preventDefault();
			}
		});
	}
	// Use onfocus
	if (type == "email" || type == "password") {
		input.on('keypress', function (event) {
			if (event.keyCode === 32) {
				event.preventDefault();
			}
		});
	}
	// Use onfocus
	if (type == "number") {
		input.on('keypress', function (event) {
			var keyCode = event.keyCode || event.which;

			// Allow: backspace, delete, tab, escape, enter, period, arrow keys
			if ([8, 46, 9, 27, 13, 190].indexOf(keyCode) !== -1 ||
				// Allow: Ctrl+A, Ctrl+C, Ctrl+V, Ctrl+X
				(keyCode === 65 && (event.ctrlKey || event.metaKey)) ||
				(keyCode === 67 && (event.ctrlKey || event.metaKey)) ||
				(keyCode === 86 && (event.ctrlKey || event.metaKey)) ||
				(keyCode === 88 && (event.ctrlKey || event.metaKey)) ||
				// Allow: arrow keys
				(keyCode >= 37 && keyCode <= 40)) {
				// Let it happen, don't do anything
				return;
			}


			// Ensure that it is a number and stop the keypress if not
			if ((keyCode < 48 || keyCode > 57)) {
				event.preventDefault();
			}
		});

		input.on('keypress', function (event) {
			if (event.keyCode === 32) {
				event.preventDefault();
			}
		});

	}
	// Use onfocus
	if (type == "no_space") {
		input.on('keypress', function (event) {
			if (event.keyCode === 32) {
				event.preventDefault();
			}
		});
	}

	if (number_regex.test(characters) != false) {
		if (characters != "" && characters != 0) {
			input.on("input", function (event) {
				var str_len = input.val().length;
				if (str_len > parseFloat(characters)) {
					input.val(input.val().substring(0, parseFloat(characters)));
				}
			});
		}
	}
	if (color == '1') {
		InputBoxColor(obj, type);
	}
}
function SnoCalculation() {
	if (jQuery('.sno').length > 0) {
		var row_count = 0;
		row_count = jQuery('.sno').length;
		if (typeof row_count != "undefined" && row_count != null && row_count != 0 && row_count != "") {
			var j = 1;
			var sno = document.getElementsByClassName('sno');
			for (var i = row_count - 1; i >= 0; i--) {
				sno[i].innerHTML = j;
				j = parseInt(j) + 1;
			}
		}
	}
}
function InputBoxColor(obj, type) {
	if (type == 'select') {
		if (jQuery(obj).closest().find('.select2-selection--single').length > 0) {
			jQuery(obj).closest().find('.select2-selection--single').css('border', '1px solid #aaa');
		}
		if (jQuery(obj).parent().find('.infos').length > 0) {
			jQuery(obj).parent().find('.infos').remove();
		}
		if (jQuery(obj).parent().parent().find('.infos').length > 0) {
			jQuery(obj).parent().parent().find('.infos').remove();
		}
	}
	else {
		jQuery(obj).css('border', '1px solid #ced4da');
		if (jQuery(obj).parent().find('.infos').length > 0) {
			jQuery(obj).parent().find('.infos').remove();
		}
		if (jQuery(obj).parent().parent().find('.infos').length > 0) {
			jQuery(obj).parent().parent().find('.infos').remove();
		}
	}
}
function OnOffButton(field_name) {
	var checkbox_button = document.getElementById(field_name).checked;

	if (checkbox_button == true) {
		document.getElementById(field_name).value = 1;
		if (field_name == 'subunit_need') {
			if (jQuery('#subunit_list').length > 0) {
				jQuery('#subunit_list').removeClass('d-none');
			}
			if (jQuery('#subunit_contains_list').length > 0) {
				jQuery('#subunit_contains_list').removeClass('d-none');
			}
			if (jQuery('.unit_type_div').length > 0) {
				jQuery('.unit_type_div').removeClass('d-none');
			}
			if (jQuery('select[name="selected_unit_type"]').length > 0) {
				jQuery('select[name="selected_unit_type"]').val('1');
			}
		}
		else if (field_name == 'gst_option') {
			GetTaxType('1');
			getShppingAddress();
		}
	}
	else if (checkbox_button == false) {
		document.getElementById(field_name).value = 0;
		if (field_name == 'subunit_need') {
			if (jQuery('#subunit_list').length > 0) {
				jQuery('#subunit_list').addClass('d-none');
			}
			if (jQuery('#subunit_contains_list').length > 0) {
				jQuery('#subunit_contains_list').addClass('d-none');
			}
			if (jQuery('.unit_type_div').length > 0) {
				jQuery('.unit_type_div').addClass('d-none');
			}
			if (jQuery('select[name="selected_unit_type"]').length > 0) {
				jQuery('select[name="selected_unit_type"]').val('1');
			}
		}
		else if (field_name == 'gst_option') {
			GetTaxType('0');
			getShppingAddress();
		}
	}
}
function addCreationDetails(name, characters) {
	var check_login_session = 1; var all_errors_check = 1; var error = 1; var letters_check = 1; var prefix_check = 1;
	var prefix_error = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				if (jQuery('.infos').length > 0) {
					jQuery('.infos').each(function () { jQuery(this).remove(); });
				}
				var creation_name = ""; var creation_prefix = ""; var creation_color = "";
				var format = letter_regex;
				if (name == 'godown_room') {
					format = text_no_regex;
				}
				else if (name == 'charges') {
					format = product_regex;
				}
				else if (name == 'payment_mode') {
					format = product_regex;
				}
				else if (name == 'unit') {
					format = product_regex;
				}

				var name_variable = "";
				name_variable = name.toLowerCase();
				name_variable = name_variable.trim();
				name_variable = name_variable.replace("_", " ");

				if (name == 'order_status') {
					format = name_regex;
					if (jQuery('input[name="' + name + '_color"]').is(":visible")) {
						if (jQuery('input[name="' + name + '_color"]').length > 0) {
							creation_color = jQuery('input[name="' + name + '_color"]').val();
							creation_color = creation_color.trim();
							if (typeof creation_color == "undefined" || creation_color == "" || creation_color == 0 || creation_color == null) {
								all_errors_check = 0;
							}
						}
					}
				}
				var godown_id = "";
				if (name == 'godown_room') {
					if (jQuery('select[name="godown_id"]').length > 0) {
						godown_id = jQuery('select[name="godown_id"]').val();
						godown_id = godown_id.trim();
						if (typeof godown_id == "undefined" || godown_id == "" || godown_id == 0 || godown_id == null) {
							all_errors_check = 0;
						}
					}
				}
				if (name == 'brand') {
					format = product_regex;
					if (jQuery('input[name="' + name + '_prefix"]').is(":visible")) {
						if (jQuery('input[name="' + name + '_prefix"]').length > 0) {
							creation_prefix = jQuery('input[name="' + name + '_prefix"]').val();
							creation_prefix = creation_prefix.trim();
							if (typeof creation_prefix == "undefined" || creation_prefix == "" || creation_prefix == 0 || creation_prefix == null) {
								all_errors_check = 0;
							}
							else if (format.test(creation_prefix) == false) {
								letters_check = 0;
								prefix_check = 0;
							}
							else if (creation_prefix.length > 5) {
								error = 0;
								prefix_error = 0;
							}
						}
					}
				}

				if (jQuery('input[name="' + name + '_name"]').is(":visible")) {
					if (jQuery('input[name="' + name + '_name"]').length > 0) {
						creation_name = jQuery('input[name="' + name + '_name"]').val();
						creation_name = creation_name.trim();
						if (typeof creation_name == "undefined" || creation_name == "" || creation_name == 0 || creation_name == null) {
							all_errors_check = 0;
						}
						else if (format.test(creation_name) == false) {
							letters_check = 0;
						}
						else if (creation_name.length > parseInt(characters)) {
							error = 0;
						}
					}
				}
				var charges_type = "";
				if (name == "other_charges") {
					if (jQuery('select[name="charges_type"]').length > 0) {
						charges_type = jQuery('select[name="charges_type"]').val();
						charges_type = charges_type.trim();
						if (typeof charges_type == "undefined" || charges_type == "" || charges_type == 0 || charges_type == null) {
							all_errors_check = 0;
						}
					}
				}
				if (parseInt(all_errors_check) == 1) {
					if (parseInt(letters_check) == 1) {
						if (parseInt(error) == 1) {
							var add = 1; var add_variable = ""; var param = "";
							if (creation_name != "") {
								if (jQuery('input[name="' + name + '_names[]"]').length > 0) {
									jQuery('.added_' + name + '_table tbody').find('tr').each(function () {
										var prev_creation_name = jQuery(this).find('input[name="' + name + '_names[]"]').val().toLowerCase();
										var current_creation_name = creation_name.toLowerCase();
										if (name != "godown_room") {
											if (prev_creation_name == current_creation_name) {
												add = 0;
												add_variable = name_variable;
											}
										}
										else if (name == "godown_room") {
											var prev_godown_id = "";
											if (jQuery(this).find('input[name="godown_ids[]"]').length > 0) {
												prev_godown_id = jQuery(this).find('input[name="godown_ids[]"]').val();
												prev_godown_id = prev_godown_id.trim();
											}
											if (prev_creation_name == current_creation_name && prev_godown_id == godown_id) {
												add = 0;
												add_variable = name_variable;
											}
										}
									});
								}
							}
							if (creation_prefix != "") {
								param = "&selected_" + name + "_prefix=" + creation_prefix;
								if (jQuery('input[name="' + name + '_prefixs[]"]').length > 0) {
									jQuery('.added_' + name + '_table tbody').find('tr').each(function () {
										var prev_creation_prefix = jQuery(this).find('input[name="' + name + '_prefixs[]"]').val().toLowerCase();
										var current_creation_prefix = creation_prefix.toLowerCase();
										if (prev_creation_prefix == current_creation_prefix) {
											add = 0;
											add_variable = "Prefix";
										}
									});
								}
							}
							if (creation_color != "") {
								param = "&selected_" + name + "_color=" + encodeURIComponent(creation_color);
								if (jQuery('input[name="' + name + '_colors[]"]').length > 0) {
									jQuery('.added_' + name + '_table tbody').find('tr').each(function () {
										var prev_creation_color = jQuery(this).find('input[name="' + name + '_colors[]"]').val().toLowerCase();
										var current_creation_color = creation_color.toLowerCase();
										if (prev_creation_color == current_creation_color) {
											add = 0;
											add_variable = "Status Color";
										}
									});
								}
							}
							if (name == "godown_room") {
								param = "&selected_godown_id=" + godown_id;
							}
							if (name == "other_charges") {
								param = "&selected_charges_type=" + charges_type;
							}
							if (add == 1) {
								var count = jQuery('input[name="' + name + '_count"]').val();
								count = parseInt(count) + 1;
								jQuery('input[name="' + name + '_count"]').val(count);
								var post_url = name + "_changes.php?" + name + "_row_index=" + count + "&selected_" + name + "_name=" + encodeURIComponent(creation_name) + param;
								jQuery.ajax({
									url: post_url, success: function (result) {
										if (jQuery('.added_' + name + '_table tbody').find('tr').length > 0) {
											jQuery('.added_' + name + '_table tbody').find('tr:first').before(result);
										}
										else {
											jQuery('.added_' + name + '_table tbody').append(result);
										}
										if (name == 'brand') {
											if (jQuery('input[name="' + name + '_prefix"]').length > 0) {
												jQuery('input[name="' + name + '_prefix"]').val('').focus();
											}
											if (jQuery('input[name="' + name + '_name"]').length > 0) {
												jQuery('input[name="' + name + '_name"]').val('');
											}
										}
										else {
											if (name == "godown_room") {
												if (jQuery('select[name="godown_id"]').length > 0) {
													jQuery('select[name="godown_id"]').val('').trigger('change');
												}
											}
											if (name == "other_charges") {
												if (jQuery('select[name="charges_type"]').length > 0) {
													jQuery('select[name="charges_type"]').val('').trigger('change');
												}
											}
											if (jQuery('input[name="' + name + '_name"]').length > 0) {
												jQuery('input[name="' + name + '_name"]').val('').focus();
											}
										}
										SnoCalculation();
									}
								});
							}
							else {
								jQuery('.added_' + name + '_table').before('<div class="infos w-100 text-danger text-center mb-3 fw-bold" style="font-size: 15px;">This ' + add_variable + ' already Exists</div>');
							}
						}
						else {
							if (parseInt(prefix_error) == 0) {
								jQuery('.added_' + name + '_table').before('<div class="infos text-danger text-center mb-3 fw-bold" style="font-size: 15px;">Only 5 Characters allowed for Prefix</div>');
							}
							else {
								jQuery('.added_' + name + '_table').before('<div class="infos text-danger text-center mb-3 fw-bold" style="font-size: 15px;">Only ' + characters + ' Characters allowed for ' + name_variable + '</div>');
							}
						}
					}
					else {
						if (parseInt(prefix_check) == 0) {
							jQuery('.added_' + name + '_table').before('<div class="infos text-danger text-center mb-3 fw-bold" style="font-size: 15px;color:red;">Invalid Characters in Prefix</div>');
							jQuery('input[name="' + name + '_prefix"]').val('');
						}
						else {
							jQuery('.added_' + name + '_table').before('<div class="infos text-danger text-center mb-3 fw-bold" style="font-size: 15px;color:red;">Invalid Characters in ' + name_variable + '</div>');
							jQuery('input[name="' + name + '_name"]').val('');
						}
					}
				}
				else {
					jQuery('.added_' + name + '_table').before('<div class="infos text-danger text-center mb-3 fw-bold" style="font-size: 15px;">Please check all field values</div>');
				}
			}
			else {
				window.location.reload();
			}
		}
	});
}
function DeleteCreationRow(id_name, row_index) {
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				if (jQuery('#' + id_name + '_row' + row_index).length > 0) {
					jQuery('#' + id_name + '_row' + row_index).remove();
				}
				if (id_name == "product") {
					if (jQuery('.' + id_name + '_row').length == 0) {
						if (jQuery('input[name="category_id"]').length > 0) {
							jQuery('input[name="category_id"]').val('');
							jQuery('input[name="category_id"]').attr('disabled', true);
						}
						if (jQuery('select[name="category_id"]').length > 0) {
							jQuery('select[name="category_id"]').attr('disabled', false);
						}
						if (jQuery('#subunit_input').length > 0) {
							jQuery('#subunit_input').val('');
							jQuery('#subunit_input').attr('disabled', true);
						}
						if (jQuery('#subunit_need').length > 0) {
							jQuery('#subunit_need').attr('disabled', false);
						}
					}
				}
				SnoCalculation();
			}
			else {
				window.location.reload();
			}
		}
	});
}

function DeleteRow(row_index, id_name) {
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				if (jQuery('#' + id_name + row_index).length > 0) {
					jQuery('#' + id_name + row_index).remove();
				}
				if (id_name == 'product_row') {
					var godown_count = 0;
					godown_count = jQuery('input[name="godown_count"]').val();
					godown_count = parseInt(godown_count) - 1;
					jQuery('input[name="godown_count"]').val(godown_count);
					if (jQuery('.' + id_name).length == 0) {
						if (jQuery('select[name="category_id"]').length > 0) {
							if (jQuery('input[name="category_id"]').length > 0) {
								jQuery('input[name="category_id"]').val('');
								jQuery('input[name="category_id"]').attr('disabled', true);
							}
							jQuery('select[name="category_id"]').attr('disabled', false);
						}
						if (jQuery('select[name="unit_id"]').length > 0) {
							if (jQuery('input[name="unit_id"]').length > 0) {
								jQuery('input[name="unit_id"]').val('');
								jQuery('input[name="unit_id"]').attr('disabled', true);
							}
							jQuery('select[name="unit_id"]').attr('disabled', false);
						}
						if (jQuery('select[name="subunit_id"]').length > 0) {
							if (jQuery('input[name="subunit_id"]').length > 0) {
								jQuery('input[name="subunit_id"]').val('');
								jQuery('input[name="subunit_id"]').attr('disabled', true);
							}
							jQuery('select[name="subunit_id"]').attr('disabled', false);
						}
						if (jQuery('#stock_maintain').length > 0) {
							if (jQuery('#maintain_input').length > 0) {
								jQuery('#maintain_input').attr('disabled', true);
								jQuery('#maintain_input').val('');
							}
							jQuery('#stock_maintain').attr('disabled', false);
						}
						if (jQuery('#negative_stock_button').length > 0) {
							if (jQuery('#negative_stock_input').length > 0) {
								jQuery('#negative_stock_input').attr('disabled', true);
								jQuery('#negative_stock_input').val('');
							}
							jQuery('#negative_stock_button').attr('disabled', false);
						}
					}
					// SubunitBtnDisable();
				}
				SnoCalculation();
				calcQuotationSubtotal();
			}
			else {
				window.location.reload();
			}
		}
	});
}

function AddCategoryDetails() {
	var check_login_session = 1; var all_errors_check = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				if (jQuery('.infos').length > 0) {
					jQuery('.infos').each(function () { jQuery(this).remove(); });
				}

				var selected_category_name = ""; var category_lower = "";
				if (jQuery('input[name="category_name"]').is(":visible")) {
					if (jQuery('input[name="category_name"]').length > 0) {
						selected_category_name = jQuery('input[name="category_name"]').val();
						category_lower = selected_category_name.toLowerCase();
						selected_category_name = jQuery.trim(selected_category_name);
						category_lower = jQuery.trim(category_lower);
						if (typeof selected_category_name == "undefined" || selected_category_name == "" || selected_category_name == 0) {
							all_errors_check = 0;
						}
					}
				}

				var selected_product_type = "";
				if (jQuery('select[name="selected_product_type"]').is(":visible")) {
					if (jQuery('select[name="selected_product_type"]').length > 0) {
						selected_product_type = jQuery('select[name="selected_product_type"]').val();
						selected_product_type = jQuery.trim(selected_product_type);
						if (typeof selected_product_type == "undefined" || selected_product_type == "" || selected_product_type == 0) {
							all_errors_check = 0;
						}
					}
				}


				if (parseFloat(all_errors_check) == 1) {
					var add = 1;
					if (selected_category_name != "" && selected_product_type != "") {
						if (jQuery('input[name="category_names[]"]').length > 0) {
							jQuery('.category_table tbody').find('tr').each(function () {
								var prev_category_name = ""; var prev_category_name_lower = "";
								prev_category_name = jQuery(this).find('input[name="category_names[]"]').val();
								prev_category_name_lower = prev_category_name.toLowerCase();
								prev_category_name_lower = prev_category_name_lower.trim();

								if (prev_category_name_lower == category_lower) {
									add = 0;
								}
							});
						}
					}

					if (parseFloat(add) == 1) {
						var category_count = 0;
						category_count = jQuery('input[name="category_count"]').val();
						category_count = parseInt(category_count) + 1;
						jQuery('input[name="category_count"]').val(category_count);
						var post_url = "category_changes.php?category_row_index=" + category_count + "&selected_category_name=" + encodeURIComponent(selected_category_name) + "&selected_product_type=" + selected_product_type;
						jQuery.ajax({
							url: post_url, success: function (result) {
								if (jQuery('.category_table tbody').find('tr').length > 0) {
									jQuery('.category_table tbody').find('tr:first').before(result);
								}
								else {
									jQuery('.category_table tbody').append(result);
								}

								if (selected_category_name != "") {
									if (jQuery('input[name="category_name"]').length > 0) {
										jQuery('input[name="category_name"]').val('').trigger('change');
									}
								}

								if (selected_product_type != "") {
									if (jQuery('select[name="selected_product_type"]').length > 0) {
										jQuery('select[name="selected_product_type"]').val('').trigger('change');
									}
								}
								SnoCalculation();

							}
						});
					}
					else {
						jQuery('.category_table').before('<span class="infos w-50 text-center mb-3 fw-bold" style="font-size: 15px;">This Category name is Already Exists</span>');
					}
				}
				else {
					jQuery('.category_table').before('<span class="infos w-50 text-center mb-3 fw-bold" style="font-size: 15px;">Check all details</span>');
				}
			}
			else {
				window.location.reload();
			}
		}
	});
}


function AddDishDetails() {
	var check_login_session = 1; var all_errors_check = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				if (jQuery('.infos').length > 0) {
					jQuery('.infos').each(function () { jQuery(this).remove(); });
				}

				var selected_dish_name = ""; var dish_lower = "";
				if (jQuery('input[name="dish_name"]').is(":visible")) {
					if (jQuery('input[name="dish_name"]').length > 0) {
						selected_dish_name = jQuery('input[name="dish_name"]').val();
						dish_lower = selected_dish_name.toLowerCase();
						selected_dish_name = jQuery.trim(selected_dish_name);
						dish_lower = jQuery.trim(dish_lower);
						if (typeof selected_dish_name == "undefined" || selected_dish_name == "" || selected_dish_name == 0) {
							all_errors_check = 0;
						}
					}
				}


				if (parseFloat(all_errors_check) == 1) {
					var add = 1;
					if (selected_dish_name != "") {
						if (jQuery('input[name="dish_names[]"]').length > 0) {
							jQuery('.dish_table tbody').find('tr').each(function () {
								var prev_dish_name = ""; var prev_dish_name_lower = "";
								prev_dish_name = jQuery(this).find('input[name="dish_names[]"]').val();
								prev_dish_name_lower = prev_dish_name.toLowerCase();
								prev_dish_name_lower = prev_dish_name_lower.trim();

								if (prev_dish_name_lower == dish_lower) {
									add = 0;
								}
							});
						}
					}

					if (parseFloat(add) == 1) {
						var dish_count = 0;
						dish_count = jQuery('input[name="dish_count"]').val();
						dish_count = parseInt(dish_count) + 1;
						jQuery('input[name="dish_count"]').val(dish_count);
						var post_url = "dish_changes.php?dish_row_index=" + dish_count + "&selected_dish_name=" + encodeURIComponent(selected_dish_name);
						jQuery.ajax({
							url: post_url, success: function (result) {
								if (jQuery('.dish_table tbody').find('tr').length > 0) {
									jQuery('.dish_table tbody').find('tr:first').before(result);
								}
								else {
									jQuery('.dish_table tbody').append(result);
								}

								if (selected_dish_name != "") {
									if (jQuery('input[name="dish_name"]').length > 0) {
										jQuery('input[name="dish_name"]').val('').trigger('change');
									}
								}

								SnoCalculation();

							}
						});
					}
					else {
						jQuery('.dish_table').before('<span class="infos w-50 text-center mb-3 fw-bold" style="font-size: 15px;">This dish name is Already Exists</span>');
					}
				}
				else {
					jQuery('.dish_table').before('<span class="infos w-50 text-center mb-3 fw-bold" style="font-size: 15px;">Check all details</span>');
				}
			}
			else {
				window.location.reload();
			}
		}
	});
}
function AddProductDetails()
{
	var check_login_session = 1; var all_errors_check = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				if (jQuery('.infos').length > 0) {
					jQuery('.infos').each(function () { jQuery(this).remove(); });
				}

				var selected_category_id = ""; var category_lower = "";
				if (jQuery('select[name="selected_category_id"]').is(":visible")) {
					if (jQuery('select[name="selected_category_id"]').length > 0) {
						selected_category_id = jQuery('select[name="selected_category_id"]').val();
						category_lower = selected_category_id.toLowerCase();
						selected_category_id = jQuery.trim(selected_category_id);
						category_lower = jQuery.trim(category_lower);
						if (typeof selected_category_id == "undefined" || selected_category_id == "" || selected_category_id == 0) {
							all_errors_check = 0;
						}
					}
				}


				var selected_dish_id = ""; var dish_lower = "";
				if (jQuery('select[name="selected_dish_id"]').is(":visible")) {
					if (jQuery('select[name="selected_dish_id"]').length > 0) {
						selected_dish_id = jQuery('select[name="selected_dish_id"]').val();
						dish_lower = selected_dish_id.toLowerCase();
						selected_dish_id = jQuery.trim(selected_dish_id);
						dish_lower = jQuery.trim(dish_lower);
						if (typeof selected_dish_id == "undefined" || selected_dish_id == "" || selected_dish_id == 0) {
							all_errors_check = 0;
						}
					}
				}

				var selected_product_name = "";
				if (jQuery('input[name="selected_product_name"]').is(":visible")) {
					if (jQuery('input[name="selected_product_name"]').length > 0) {
						selected_product_name = jQuery('input[name="selected_product_name"]').val();
						selected_product_name = jQuery.trim(selected_product_name);
						if (typeof selected_product_name == "undefined" || selected_product_name == "" || selected_product_name == 0) {
							all_errors_check = 0;
						}
					}
				}

				if (parseFloat(all_errors_check) == 1) {
					var add = 1;
					if (selected_category_id != "" && selected_product_name != "") {
						if (jQuery('input[name="category_ids[]"]').length > 0) {
							jQuery('.product_table tbody').find('tr').each(function () {
								var prev_category_id = ""; var product_name =""; var prev_product_name_lower = "";
								prev_category_id = jQuery(this).find('input[name="category_ids[]"]').val();
								prev_product_name = jQuery(this).find('input[name="product_names[]"]').val();
								prev_dish_id = jQuery(this).find('input[name="dish_ids[]"]').val();
								prev_product_name_lower = prev_product_name.toLowerCase();
								prev_product_name_lower = prev_product_name_lower.trim();
								console.log(prev_category_id+" "+selected_category_id+" "+prev_product_name_lower+" "+selected_product_name)
								// console.log(prev_category_id+" "+selected_category_id+" "+prev_dish_id+" "+selected_dish_id+" "+prev_product_name_lower+" "+selected_product_name);
								if (prev_category_id == selected_category_id && prev_dish_id == selected_dish_id && prev_product_name_lower == selected_product_name) {
									add = 0;
								}
							});
						}
					}

					if (parseFloat(add) == 1) {
						var product_count = 0;
						product_count = jQuery('input[name="product_count"]').val();
						product_count = parseInt(product_count) + 1;
						jQuery('input[name="product_count"]').val(product_count);
						var post_url = "product_changes.php?product_row_index=" + product_count + "&selected_product_name=" + encodeURIComponent(selected_product_name) + "&selected_category_id=" + selected_category_id + "&selected_dish_id=" + selected_dish_id;
						jQuery.ajax({
							url: post_url, success: function (result) {
								if (jQuery('.product_table tbody').find('tr').length > 0) {
									jQuery('.product_table tbody').find('tr:first').before(result);
								}
								else {
									jQuery('.product_table tbody').append(result);
								}

								if (selected_category_id != "") {
									if (jQuery('select[name="selected_category_id"]').length > 0) {
										jQuery('select[name="selected_category_id"]').val('').trigger('change');
									}
								}

								if (selected_dish_id != "") {
									if (jQuery('select[name="selected_dish_id"]').length > 0) {
										jQuery('select[name="selected_dish_id"]').val('').trigger('change');
									}
								}

								if (selected_product_name != "") {
									if (jQuery('input[name="selected_product_name"]').length > 0) {
										jQuery('input[name="selected_product_name"]').val('');
									}
								}
								SnoCalculation();

							}
						});
					}
					else {
						jQuery('.product_table').before('<span class="infos w-50 text-center mb-3 fw-bold" style="font-size: 15px;">This Category name is Already Exists</span>');
					}
				}
				else {
					jQuery('.product_table').before('<span class="infos w-50 text-center mb-3 fw-bold" style="font-size: 15px;">Check all details</span>');
				}
			}
			else {
				window.location.reload();
			}
		}
	});
}

function OnOffButton(field_name) {
	var checkbox_button = document.getElementById(field_name).checked;

	if (checkbox_button == true) {
		document.getElementById(field_name).value = 1;
		if (field_name == 'tax_on_off') {
			document.getElementById('gst_label').innerHTML = 'GST Number <span class="text-danger">*</span>';
		}
		else if (field_name == 'address_btn') {
			var selected_party_id = "";
			if (jQuery('select[name="party_id"]').length > 0) {
				selected_party_id = jQuery('select[name="party_id"]').val();
			}
			var post_url = "common_changes.php?same_as_party_address=" + selected_party_id;
			jQuery.ajax({
				url: post_url, success: function (result) {
					result = result.trim();
					// if(jQuery('textarea[name="shipping_address"]').length > 0) {
					// 	jQuery('textarea[name="shipping_address"]').val(result);
					// }
					getShppingAddress();
				}
			});
		}
	}
	else if (checkbox_button == false) {
		document.getElementById(field_name).value = 0;
		if (field_name == 'tax_on_off') {
			document.getElementById('gst_label').innerHTML = 'GST Number';
		}
		else if (field_name == 'address_btn') {
			// if(jQuery('textarea[name="shipping_address"]').length > 0) {
			// 	jQuery('textarea[name="shipping_address"]').val('');
			// }
			getShppingAddress();
		}
	}
}


function AddCateringCreationDtls(name, characters) {
	var check_login_session = 1; var all_errors_check = 1; var error = 1; 

	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				if (jQuery('.infos').length > 0) {
					jQuery('.infos').each(function () { jQuery(this).remove(); });
				}
				var creation_name = ""; 
				
				var name_variable = "";
				name_variable = name.toLowerCase();
				name_variable = name_variable.trim();
				name_variable = name_variable.replace("_", " ");

				if (jQuery('input[name="' + name + '_name"]').is(":visible")) {
					if (jQuery('input[name="' + name + '_name"]').length > 0) {
						creation_name = jQuery('input[name="' + name + '_name"]').val();
						creation_name = creation_name.trim();
						if (typeof creation_name == "undefined" || creation_name == "" || creation_name == 0 || creation_name == null) {
							all_errors_check = 0;
						}
						else if (creation_name.length > parseInt(characters)) {
							error = 0;
						}
					}
				}
				
				if (parseInt(all_errors_check) == 1) {
					if (parseInt(error) == 1) {
						var add = 1; var add_variable = ""; var param = "";
						if (creation_name != "") {
							if (jQuery('input[name="' + name + '_names[]"]').length > 0) {
								jQuery('.added_' + name + '_table tbody').find('tr').each(function () {
									var prev_creation_name = jQuery(this).find('input[name="' + name + '_names[]"]').val().toLowerCase();
									var current_creation_name = creation_name.toLowerCase();
									if (prev_creation_name == current_creation_name) {
										add = 0;
										add_variable = name_variable;
									}
								});
							}
						}
						
						if (add == 1) {
							var count = jQuery('input[name="' + name + '_count"]').val();
							count = parseInt(count) + 1;
							jQuery('input[name="' + name + '_count"]').val(count);
							var post_url = name + "_changes.php?" + name + "_row_index=" + count + "&selected_" + name + "_name=" + encodeURIComponent(creation_name) + param;
							jQuery.ajax({
								url: post_url, success: function (result) {
									if (jQuery('.added_' + name + '_table tbody').find('tr').length > 0) {
										jQuery('.added_' + name + '_table tbody').find('tr:first').before(result);
									}
									else {
										jQuery('.added_' + name + '_table tbody').append(result);
									}
									if (jQuery('input[name="' + name + '_name"]').length > 0) {
										jQuery('input[name="' + name + '_name"]').val('').focus();
									}
									SnoCalculation();
								}
							});
						}
						else {
							jQuery('.added_' + name + '_table').before('<div class="infos w-100 text-danger text-center mb-3 fw-bold" style="font-size: 15px;">This ' + add_variable + ' already Exists</div>');
						}
					}
					else {
						jQuery('.added_' + name + '_table').before('<div class="infos text-danger text-center mb-3 fw-bold" style="font-size: 15px;">Only ' + characters + ' Characters allowed for ' + name_variable + '</div>');
					}
				}
				else {
					jQuery('.added_' + name + '_table').before('<div class="infos text-danger text-center mb-3 fw-bold" style="font-size: 15px;">Please check all field values</div>');
				}
			}
			else {
				window.location.reload();
			}
		}
	});
}

function SnoCalculationOrder() {
	if (jQuery('.sno').length > 0) {
		var sno = document.getElementsByClassName('sno');
		for (var i = 0; i < sno.length; i++) {
			sno[i].innerHTML = i + 1;
		}
	}
}

function DeleteSheetCreationRow(id_name, row_index) {
	var check_login_session = 1;
	var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
		url: post_url, success: function (check_login_session) {
			if (check_login_session == 1) {
				if (jQuery('#' + id_name + '_row' + row_index).length > 0) {
					jQuery('#' + id_name + '_row' + row_index).remove();
				}
				SnoCalculationOrder();
			}
			else {
				window.location.reload();
			}
		}
	});
}