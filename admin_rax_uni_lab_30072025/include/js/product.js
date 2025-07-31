function get_Sub_Category(place) {
    var category_id = $('select[name="category_id"]').val();
    var sub_category_id = $('select[name="sub_category_id"]').val();
    var post_url = "dashboard_changes.php?check_login_session=1";
	jQuery.ajax({
        url: post_url, 
        success: function(check_login_session) {
            if(check_login_session == 1) {
                if(place == 'category') {
                    var post_url = "product_changes.php?getSubCategory=" + category_id;
                    jQuery.ajax({
                        url: post_url, 
                        success: function(result) {
                            console.log(result);
                            if(result != '') {
                                $('select[name="sub_category_id"]').html('').empty().html(result);
                            }
                        }
                    });
                } else if(place == 'sub') {
                    var category = jQuery('select[name="sub_category_id"] option:selected').data('parent');
                    console.log(category);
                    // $('select[name="category_id"]').val(category);
                }
            }
        }
    });

}