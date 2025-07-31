<?php
	include("include_user_check_and_files.php");
    
    $login_staff_id = "";
    if(isset($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id']) && !empty($_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'])) {
        if(!empty($GLOBALS['user_type']) && $GLOBALS['user_type'] != $GLOBALS['admin_user_type']) {
            $login_staff_id = $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id'];
            $permission_module = $GLOBALS['product_module'];
        }
    }
    
	if(isset($_REQUEST['show_product_id'])) { 
        $show_product_id = $_REQUEST['show_product_id'];
        $product_desktop_banner =""; $product_name = ""; $category_id = ""; $sub_category_id = ""; $images = ""; $description = ""; $related_products = array();
        $product_list = array();
        if(!empty($show_product_id)) {
            $product_list = $obj->getTableRecords($GLOBALS['product_table'], 'product_id', $show_product_id, '');
            if(!empty($product_list)) {
                foreach ($product_list as $data) {
                    if(!empty($data['category_id'])) {
                        $category_id = $data['category_id'];
                    }                    
                    if(!empty($data['product_name'])) {
                        $product_name = $obj->encode_decode('decrypt', $data['product_name']);
					}
                    if(!empty($data['sub_category_id'])) {
                        $sub_category_id = $data['sub_category_id'];
                    } 
                    if(!empty($data['related_products']) && $data['related_products'] != $GLOBALS['null_value']) {
                        $related_products = explode(",", $data['related_products']);
                    }
                    if(!empty($data['images']) && $data['images'] != $GLOBALS['null_value']) {
                        $images = $data['images'];
                    }
                    if(!empty($data['description']) && $data['description'] != $GLOBALS['null_value']) {
                        $description =html_entity_decode( $obj->encode_decode('decrypt', $data['description']));
                    }
                }
            }
        }
        $category_list = array();
        $category_list = $obj->getCategoryFilterList('parent','');
        $sub_category_list = array();
        $sub_category_list = $obj->getCategoryFilterList('child',$category_id);
        $target_dir = $obj->image_directory();
        $related_product_list = array();
        $related_product_list = $obj->getTableRecords($GLOBALS['product_table'], '', '');
        

        ?>
        <div class="card-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 text-end p-2">
                    <button class="btn btn-danger float-right" style="font-size:11px;" type="button" onclick="window.open('product.php','_self')"> <i class="fa fa-arrow-circle-o-left"></i> &ensp; Back </button>
                </div>
            </div>
        </div>
        <form class="poppins pd-20 redirection_form" name="product_form" method="POST">
            <div class="row p-3">
                <input type="hidden" name="edit_id" value="<?php if(!empty($show_product_id)) { echo $show_product_id; } ?>">
                <div class="col-lg-12">
                    <div class="row mx-0">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-label-group in-border">
                                    <input type="text" name="product_name" class="form-control shadow-none" value="<?php if(!empty($product_name)) { echo $product_name; } ?>">
                                    <label>Product Name <span class="text-danger">*</span></label>
                                </div>
                                <div class="new_smallfnt infos">Don't use (-) Hypen in product name</div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-label-group in-border">
                                    <select name="category_id" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" onchange="get_Sub_Category('category');">
                                        <option value="">Select Category</option>    
                                        <?php
                                            if(!empty($category_list)) {
                                                foreach($category_list as $data) {
                                                    if(!empty($data['category_id'])) {
                                        ?>
                                                        <option value="<?php echo $data['category_id']; ?>" <?php if(!empty($category_id) && $data['category_id'] == $category_id) { ?>selected="selected"<?php } ?> >
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
                                    <label>Select Category <span class="text-danger">*</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-label-group in-border">
                                    <select name="sub_category_id" class="select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" onchange="get_Sub_Category('sub');">
                                        <option value="">Select Category</option>    
                                        <?php
                                            if(!empty($sub_category_list)) {
                                                foreach($sub_category_list as $data) {
                                                    if(!empty($data['category_id'])) {
                                        ?>
                                                        <option value="<?php echo $data['category_id']; ?>" <?php if(!empty($sub_category_id) && $data['category_id'] == $sub_category_id) { ?>selected="selected"<?php } ?> data-parent="<?php if(!empty($data['parent_category_id'])) { echo $data['parent_category_id']; } ?>" >
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
                                    <label>Select Category </label>
                                </div>
                            </div>
                        </div>
                        

                        <div class="col-4">
                            <div class="form-group">
                                <div class="form-label-group in-border">
                                    <select name="related_products[]" class="select2 select2-danger" placeholder="Select Related Products" multiple data-dropdown-css-class="select2-danger" style="width: 100%;">
                                        <?php
                                            if(!empty($related_product_list)) {
                                                foreach($related_product_list as $data) {
                                                    if(!empty($data['product_id'])) {

                                                        if($data['product_id'] == $show_product_id) { continue; }

                                                        $related_selected = 0;
                                                        if(!empty($related_products) && in_array($data['product_id'], $related_products)) {
                                                            $related_selected = 1;
                                                        }
                                        ?>
                                                        <option value="<?php echo $data['product_id']; ?>" <?php if(!empty($related_selected) && $related_selected == 1) { ?>selected="selected"<?php } ?> >
                                                            <?php
                                                                if(!empty($data['product_name'])) {
                                                                    $data['product_name'] = $obj->encode_decode('decrypt', $data['product_name']);
                                                                    echo $data['product_name'];
                                                                }
                                                            ?>
                                                        </option>
                                        <?php
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                    <label>Select Related Products</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row mx-0 align-items-center">
                                <div class="col-8">
                                    <div class="text-center fnt h4 text-danger">Product Image * (Max.4)</div>
                                    <div class="text-center fnt h6 text-danger">(Upload jpg, Png Format Less than 2MB)</div>
                                </div>
                                <div class="col-4">
                                    <div class="image-upload text-center">
                                        <label for="product_image">   
                                            <div class="product_image_list row">
                                                <div class="cover">
                                                    <img src="images/cloudupload.png" class="img-fluid" alt="Upload" title="Upload">
                                                </div>  
                                            </div>
                                            <input type="file" name="product_image" id="product_image" style="display: none;" accept="image/*" multiple />
                                        </label>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 row justify-content-center product_image_cover">
                            <?php
                                if(!empty($images)) {
                                    $images = explode(",", $images);
                                    foreach($images as $key => $image) {
                                        if(!empty($image) && file_exists($target_dir.$image)) {
                                            $date_time = date("dmyhis");
                            ?>
                                            <div class="col-lg-3 col-md-3 col-3 px-1">
                                                <div id="banner_div" class="form-group w-100 px-3 py-3 banner_div">
                                                    <button type="button" onclick="Javascript:delete_multiple_files(this, 'product_images');" class="btn btn-danger">
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                    <img id="product_image_preview" src="<?php echo $target_dir.$image."?t=".$date_time; ?>" class="img-fluid">
                                                    <input type="hidden" name="product_image_name[]" class="form-control" value="<?php echo $image; ?>">
                                                    <div class="row mx-0 mt-2">
                                                        <div class="col-12 px-1">
                                                            <input type="hidden" name="product_image_name_position[]" class="form-control mx-auto" value="<?php echo $key + 1; ?>" placeholder="Position">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            <?php
                                        }
                                    }
                                }
                            ?>
                        </div>



                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Description</label>
                                <input type="hidden" name="description_content" value="" class="form-control shadow-none">
                                <div class="w-100 description">
                                    <textarea name="description" id="description" class="form-control" rows="3"><?php echo $description; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pt-3 text-center">
                            <button class="btn btn-dark submit_button" type="button">
                                Submit
                            </button>
                        </div>
                        
                        <script type="text/javascript">
                            jQuery('.submit_button').click(function(event){
                                var description = tinymce.get('description').getContent();
                                document.querySelector('input[name="description_content"]').value = description;
                                SaveModalContent(event, 'product_form', 'product_changes.php', 'product.php');
                            });
                        </script>
                       <!--  <script src="include/wysiwyg_editor/editor.js"></script>
                        <script type="text/javascript" defer="defer">
                            $(document).ready(function() {
                                if($("#description").length > 0) {
                                    $("#description").Editor();
                                }
                            });
                        </script>
                        <link href="include/wysiwyg_editor/editor.css" type="text/css" rel="stylesheet"/>

                        <?php 
                            if(!empty($description)) {                     
                                $description = str_replace(array("\r", "\n"), '<br>', $description);
                        ?>
                        <script type="text/javascript" defer="defer">
                            setTimeout(function(){ 
                                    if($(".description").find('.fa-code').length > 0) {
                                        $(".description").find('.fa-code').parent('a').trigger('click');
                                        $(".description").find(".Editor-editor").find('pre').html('<?php echo $description; ?>');
                                        $(".description").find('.fa-code').parent('a').trigger('click');
                                    }
                            }, 1000);
                        </script>
                        <?php } ?> -->


                        <!-- <script src="include/js/ckeditor.js"></script>
                        <script>
                            class MyUploadAdapter {
                                constructor(loader) {
                                    this.loader = loader;
                                }

                                upload() {
                                    return new Promise((resolve, reject) => {
                                        const data = new FormData();
                                        this.loader.file.then(file => {
                                            data.append('upload', file);

                                            fetch('ck_upload.php', {
                                                method: 'POST',
                                                body: data,
                                                headers: {
                                                    
                                                }
                                            })
                                            .then(response => {
                                                if (!response.ok) {
                                                    throw new Error('Upload failed: ' + response.statusText);
                                                }
                                                return response.json();
                                            })
                                            .then(result => {
                                                if (result.url) {
                                                    resolve({
                                                        default: result.url
                                                    });
                                                    this.editor.ui.update();
                                                } else {
                                                    reject('Upload failed: no URL returned.');
                                                }
                                            })
                                            .catch(error => {
                                                reject('Upload failed: ' + error.message);
                                            });
                                        });
                                    });
                                }

                                abort() {
                                    console.log('Upload aborted.');
                                }
                            }
                        </script>
                        <script type="text/javascript" defer="defer">

                            ClassicEditor
                            .create(document.querySelector('#description'), {
                                toolbar: [
                                    'undo', 'redo', 'bold', 'italic', 'link', '|',
                                    'alignment', 'imageUpload', 'blockQuote', 'bulletedList', 'numberedList', '|',
                                    'insertTable', 'codeBlock', 'outdent', 'indent', '|',
                                    'fontFamily', 'fontSize', 'fontColor', 'highlight', 'horizontalLine', 'specialCharacters','|', 
                                    'heading', 'paragraph'
                                ],
                                heading: {
                                    options: [
                                        { model: 'paragraph', title: 'Normal', view: 'p' },
                                        { model: 'heading1', view: 'h1', title: 'Heading 1' },
                                        { model: 'heading2', view: 'h2', title: 'Heading 2' },
                                        { model: 'heading3', view: 'h3', title: 'Heading 3' },
                                        { model: 'heading4', view: 'h4', title: 'Heading 4' },
                                        { model: 'heading5', view: 'h5', title: 'Heading 5' },
                                        { model: 'heading6', view: 'h6', title: 'Heading 6' }
                                    ]
                                },
                                image: {
                                    toolbar: [
                                        'imageStyle:inline', 'imageStyle:block', 'imageStyle:side', '|',
                                        'resizeImage', 'imageTextAlternative'
                                    ]
                                }
                            })
                            .then(editor => {
                                // window.editor = edi
                                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                                    return new MyUploadAdapter(loader);
                                };
                                editorInstance = editor; 
                            })
                            .catch(error => {
                                console.error(error);
                            });
                        </script> -->

                        <!-- <style>
                            .ck-editor__editable_inline {
                                min-height: 300px;
                                min-width: 600px;
                            }
                            ul {
                                list-style-type: disc;
                                padding-left: 20px;
                            }

                            /* Default styles for ordered list */
                            ol {
                                padding-left: 20px;
                            }

                            /* Specific styles for CKEditor lists */
                            .ck-editor__editable ul {
                                list-style-type: disc;
                            }
                            strong {
                                font-weight: 700;
                            }

                            blockquote {
                                display: block;
                                margin-top: 1em;
                                margin-bottom: 1em;
                                margin-left: 40px;
                                margin-right: 40px;
                                border-color : none !important;
                                border-left : 5px !important;
                                /* font-style: normal; */
                            }

                            .ck-editor__editable img {
                                width : 100% !important;
                                height: auto;
                            } 
                        </style> -->

                        <script src="include/tinymce/js/tinymce/tinymce.min.js"></script>
                        
                        <script>
                            tinymce.init({
                                selector: 'textarea#description',
                                height: 500,
                                automatic_uploads: true,
                                menubar: 'file edit view insert format tools table help',
                                plugins: [
                                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                                    'insertdatetime', 'media', 'table', 'help', 'wordcount'
                                ],
                                toolbar: 'undo redo | formatselect | ' +
                                    'bold italic underline | alignleft aligncenter alignright | ' +
                                    'bullist numlist outdent indent | link image media table | ' +
                                    'charmap preview code fullscreen',
                                
                                // ✅ COMMA FIXED ABOVE
                                images_upload_handler: function (blobInfo, success, failure) {
                                    success("data:" + blobInfo.blob().type + ";base64," + blobInfo.base64());
                                }
                            });
                        </script>

                    </div>
                </div>
            </div>
        </form>
       
        <script type="text/javascript" src="include/js/image_upload.js"></script>
        <script type="text/javascript" src="include/js/cropper_image_upload.js"></script>
        <script src="include/select2/js/select2.full.min.js"></script>
        <script>
            $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })})
        </script>
        <?php
    }
    if(isset($_POST['edit_id'])) {	
		$product_name = ""; $product_name_error = ""; $category_id = ""; $category_id_error = ""; $category_name = ""; $sub_category_id = ""; $sub_category_id_error = ""; $sub_category_name = ""; $valid_product = ""; $form_name = "product_form"; $related_products = ""; $product_image_error = ""; $product_image_name_position = array();
		$edit_id = $_POST['edit_id'];
        $edit_id = trim($edit_id);
        // print_r($_POST);
        $product_name = $_POST['product_name'];
		$product_name = trim($product_name);
        $product_name_error = "";
        $product_name_error = $valid->common_validation($product_name, "product_name", "text");

        if(!empty($product_name_error)) {
			$valid_product = $valid->error_display($form_name, "product_name", $product_name_error, 'text');
		}

        $category_id = $_POST['category_id'];
        $category_id = trim($category_id);
        if(!empty($category_id)) {
            $category_unique_id = "";
            $category_unique_id = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $category_id, 'id');
            if(preg_match("/^\d+$/", $category_unique_id)) {
                $category_name = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $category_id, 'category_name');
                if(!empty($category_name)) {
                    $category_name = $obj->encode_decode('decrypt', $category_name);
                }
            }
            else {
                $category_id_error = "Invalid Category";
            }
        }
        else {
            $category_id_error = "Select the category";
        }
        if(!empty($category_id_error)) {
			if(!empty($valid_product)) {
				$valid_product = $valid_product." ".$valid->error_display($form_name, "category_id", $category_id_error, 'select');
			}
			else {
				$valid_product = $valid->error_display($form_name, "category_id", $category_id_error, 'select');
			}
		}

        $sub_category_id = $_POST['sub_category_id'];
        $sub_category_id = trim($sub_category_id);
        if(!empty($sub_category_id)) {
            $sub_category_unique_id = "";
            $sub_category_unique_id = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $sub_category_id, 'id');
            if(preg_match("/^\d+$/", $sub_category_unique_id)) {
                $sub_category_name = $obj->getTableColumnValue($GLOBALS['category_table'], 'category_id', $sub_category_id, 'category_name');
                if(!empty($sub_category_name)) {
                    $sub_category_name = $obj->encode_decode('decrypt', $sub_category_name);
                }
            }
            else {
                $sub_category_id_error = "Invalid SubCategory";
            }
        }
        else {
            $sub_category_id_error = "Select the SubCategory";
        }

        if(!empty($sub_category_id_error) && empty($category_id)) {
			if(!empty($valid_product)) {
				$valid_product = $valid_product." ".$valid->error_display($form_name, "sub_category_id", $sub_category_id_error, 'select');
			}
			else {
				$valid_product = $valid->error_display($form_name, "sub_category_id", $sub_category_id_error, 'select');
			}
		}
        
        if(isset($_POST['related_products'])) {
            $related_products = $_POST['related_products'];
        }
        if(!empty($related_products)) {
            $related_products_data = array();
            foreach($related_products as $related) {
                $related = trim($related);
                if(!empty($related)) {
                    $product_unique_id = "";
                    $product_unique_id = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $related, 'id');
                    if(preg_match("/^\d+$/", $product_unique_id)) {
                        $related_products_data[] = $related;
                    }
                }
            }
            if(!empty($related_products_data)) {
                $related_products = implode(",", $related_products_data);
            }
        }

        if(isset($_POST['product_image_name'])) {
            $product_image_name = $_POST['product_image_name'];
        }
        $product_image_selected = ""; $target_dir = $obj->image_directory(); $temp_dir = $obj->temp_image_directory();
        if(!empty($product_image_name)) {
            foreach($product_image_name as $image) {
                if(!empty($image) && file_exists($temp_dir.$image)) {
                    $product_image_selected = 1;
                }
                else if(!empty($image) && file_exists($target_dir.$image)) {
                    $product_image_selected = 1;
                }
            }
        }
        // if(isset($_POST['product_image_name_position'])) {
        //     $product_image_name_position = $_POST['product_image_name_position'];
        // }
        // if(!empty($product_image_name) && !empty($product_image_name_position)) {
        //     for($i = 0; $i < count($product_image_name_position); $i++) {
        //         $product_image_name_position[$i] = trim($product_image_name_position[$i]); {
        //             if(!empty($product_image_name_position[$i])) {
        //                 if(!preg_match("/^\d+$/", $product_image_name_position[$i])) {
        //                     $product_image_error = "Invalid image position";
        //                 }
        //             }
        //             else {
        //                 $product_image_error = "Enter image position";
        //             }
        //         }
        //     }
        //     $product_image_name = $obj->SortingImages($product_image_name, $product_image_name_position);
        // }
        if(empty($product_image_error)) {
            if(!empty($product_image_selected)) {
                if(count($product_image_name) > 4) {
                    $product_image_error = "Product image max.count : 4";
                }
                // else if(!in_array('1', $product_image_name_position)) {
                //     $product_image_error = "First poisiton image missing";
                // }
            }
            else {                
                $product_image_name[] = "default_image.png";
            }
        }

        if(isset($_POST['description_content'])) {
			$description = $_POST['description_content'];
			$description = trim($description);
		}
        // $description = preg_replace('/<img(.*?)>/i', '<img$1 style="width: 100%;" />', $description);

        $result = "";
		
		if(empty($valid_product) && empty($product_image_error)) {
			$check_user_id_ip_address = "";
			$check_user_id_ip_address = $obj->check_user_id_ip_address();	
			if(preg_match("/^\d+$/", $check_user_id_ip_address)) {

                $lower_case_name = "";
				if(!empty($product_name)) {
                    $lower_case_name = strtolower($product_name);
                    $lower_case_name = preg_replace('/[^a-zA-Z0-9_ -]/s','',$lower_case_name);
                    $lower_case_name = $obj->encode_decode('encrypt', $lower_case_name);
					$product_name = $obj->encode_decode('encrypt', $product_name);
				}
                
                if(empty($related_products)) {
					$related_products = $GLOBALS['null_value'];
				}
                if(!empty($product_image_name)) {
                    $images = implode(",", $product_image_name);
                }
                if(empty($images)) {
					$images = $GLOBALS['null_value'];
				}
                if(empty($sub_category_id)) {
					$sub_category_id = $GLOBALS['null_value'];
				}
                if(empty($sub_category_name)) {
					$sub_category_name = $GLOBALS['null_value'];
				} else {
                    $sub_category_name = $obj->encode_decode('encrypt',$sub_category_name);
                }
                if(empty($category_id)) {
					$category_id = $GLOBALS['null_value'];
				}
                if(empty($category_name)) {
					$category_name = $GLOBALS['null_value'];
				} else {
                    $category_name = $obj->encode_decode('encrypt',$category_name);
                }

                if(!empty($description)) {
                    $description = htmlentities($description, ENT_QUOTES);
					$description = $obj->encode_decode('encrypt', $description);
				}
				else {
					$description = $GLOBALS['null_value'];
				}
 
                $prev_product_id = ""; $products_error = "";
                $prev_product_id = $obj->getProductID($category_id,$sub_category_id, $lower_case_name);
                if(!empty($prev_product_id)) {
                    $products_error = "This product name is already exist";
                }

                $prev_images = array();
                if(!empty($edit_id)) {
                    $prev_images = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $edit_id, 'images');
                }

                $created_date_time = $GLOBALS['create_date_time_label']; $creator = $GLOBALS['creator'];
				$creator_name = $obj->encode_decode('encrypt', $GLOBALS['creator_name']);

                $image_copy = 0; $product_id = ""; $null_value = $GLOBALS['null_value'];
				
				if(empty($edit_id)) {
					if(empty($prev_product_id)) {						
						$action = "";
						if(!empty($product_name)) {
							$action = "New Product Created. Name - ".$obj->encode_decode('decrypt', $product_name);
						}

                        $columns = array('created_date_time', 'creator', 'creator_name', 'product_id','product_name', 'lower_case_name', 'category_id', 'category_name', 'sub_category_id', 'sub_category_name', 'related_products', 'images', 'description', 'deleted');
                        $values = array("'".$created_date_time."'", "'".$creator."'", "'".$creator_name."'", "'".$null_value."'", "'".$product_name."'","'".$lower_case_name."'", "'".$category_id."'", "'".$category_name."'", "'".$sub_category_id."'", "'".$sub_category_name."'", "'".$related_products."'", "'".$images."'", "'".$description."'", "'0'");
						$product_insert_id = $obj->InsertSQL($GLOBALS['product_table'], $columns, $values, 'product_id', '', $action);						
						if(preg_match("/^\d+$/", $product_insert_id)) {
                            $image_copy = 1;
							$result = array('number' => '1', 'msg' => 'Product Successfully Created');
						}
						else {
							$result = array('number' => '2', 'msg' => $product_insert_id);
						}
                    } else {
						if(!empty($products_error)) {
							$result = array('number' => '2', 'msg' => $products_error);
						}
					}
                } else {
					if(empty($prev_product_id) || $prev_product_id == $edit_id) {
						$getUniqueID = "";
						$getUniqueID = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $edit_id, 'id');
						if(preg_match("/^\d+$/", $getUniqueID)) {
							$action = "";
							if(!empty($product_name)) {
								$action = "Product Updated. Name - ".$obj->encode_decode('decrypt', $product_name);
							}
						
							$columns = array(); $values = array();						
							$columns = array('creator_name', 'product_name', 'lower_case_name', 'category_id', 'category_name', 'sub_category_id', 'sub_category_name', 'related_products', 'images', 'description');
							$values = array("'".$creator_name."'", "'".$product_name."'","'".$lower_case_name."'", "'".$category_id."'", "'".$category_name."'", "'".$sub_category_id."'", "'".$sub_category_name."'", "'".$related_products."'", "'".$images."'", "'".$description."'");
							$entry_update_id = $obj->UpdateSQL($GLOBALS['product_table'], $getUniqueID, $columns, $values, $action);
							if(preg_match("/^\d+$/", $entry_update_id)) {
                                $image_copy = 1;
								$result = array('number' => '1', 'msg' => 'Updated Successfully');						
							}
							else {
								$result = array('number' => '2', 'msg' => $entry_update_id);
							}							
						}
					}
					else {
						if(!empty($products_error)) {
							$result = array('number' => '2', 'msg' => $products_error);
						}
					}
                }
                if(!empty($image_copy) && $image_copy == 1) {
                    $target_dir = $obj->image_directory(); $temp_dir = $obj->temp_image_directory();

                    if(!empty($product_image_name)) {
                        foreach($product_image_name as $image) {
                            if(!empty($image) && file_exists($temp_dir.$image)) {
                                copy($temp_dir.$image, $target_dir.$image);
                            }
                        }
                    }
                    if(!empty($prev_images)) {
                        $prev_images = explode(",", $prev_images);
                        foreach($prev_images as $image) {
                            if(!empty($image) && !in_array($image, $product_image_name) && file_exists($target_dir.$image)) {
                                unlink($target_dir.$image);
                            }
                        }
                    }

                    $obj->clear_temp_image_directory();
                }

            } else {
				$result = array('number' => '2', 'msg' => 'Invalid IP');
			}
        } else {
			if(!empty($valid_product)) {
				$result = array('number' => '3', 'msg' => $valid_product);
			}
            else if(!empty($product_image_error)) {
                $result = array('number' => '2', 'msg' => $product_image_error);
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
		$page_title = $_POST['page_title'];

		$filter_category_id = "";
		if(isset($_POST['category_id'])) {
			$filter_category_id = $_POST['category_id'];
		}
        $filter_sub_category_id = "";
		if(isset($_POST['sub_category_id'])) {
			$filter_sub_category_id = $_POST['sub_category_id'];
		}
        $search_text = "";
		if(isset($_POST['search_text'])) {
			$search_text = $_POST['search_text'];
		}

		$total_records_list = array();
		$total_records_list = $obj->getProductList($filter_category_id, $filter_sub_category_id);

		if(!empty($search_text)) {
			$search_text = strtolower($search_text);
			$list = array();
			if(!empty($total_records_list)) {
				foreach($total_records_list as $val) {
					$selected = 0;
					if(strpos(strtolower($obj->encode_decode('decrypt', $val['lower_case_name'])), $search_text) !== false || strpos(strtolower($obj->encode_decode('decrypt', $val['product_name'])), $search_text) !== false) {
                        $selected = 1;
                    }
					if(!empty($selected) && $selected == 1) {
						$list[] = $val;
					}
				}
			}
			$total_records_list = $list;
		}
		
		$total_pages = 0;	
		$total_pages = count($total_records_list);
		
		$page_start = 0; $page_end = 0;
		if(!empty($page_number) && !empty($page_limit) && !empty($total_pages)) {
			if($total_pages > $page_limit) {
				if($page_number) {
					$page_start = ($page_number - 1) * $page_limit;
					$page_end = $page_start + $page_limit;
				}
			}
			else {
				$page_start = 0;
				$page_end = $page_limit;
			}
		}

		$show_records_list = array();
        if(!empty($total_records_list)) {
            $show_records_list = array_slice($total_records_list, $page_start, $page_limit);
        } 
?>
	
		<?php if($total_pages > $page_limit) { ?>
			<div class="pagination_cover mt-3"> 
				<?php
					include("pagination.php");
				?> 
			</div> 
		<?php } ?>

		<table class="table nowrap bg-white text-center table-bordered smallfnt">
            <thead class="bg-light">
                <tr>
                    <th style="width: 100px;">S.No</th>
                    <th>Category Name</th>
                    <th>Sub Category Name</th>
                    <th>Product Name</th>
                    <th style="width: 100px;">Home Product</th>
                    <th style="width: 100px;">Action</th>
                </tr>
            </thead>
            <tbody>
				<?php
                    if(!empty($show_records_list)) {
                        foreach($show_records_list as $key => $data) {
							$index = $key + 1;
							if(!empty($page_number) && $page_number > 1) {
								$prefix = 0;
								$prefix = ($page_number * $page_limit) - $page_limit;
								if(!empty($prefix)) {
									$index = $prefix + $index;
								}
							}
                ?>
				<tr>
                    <style>
                        /* Hide native checkbox */
                        .product-check-input {
                            appearance: none;
                            -webkit-appearance: none;
                            background-color: #fff;
                            border: 2px solid #ccc;
                            width: 28px;
                            height: 28px;
                            border-radius: 50%;
                            position: relative;
                            cursor: pointer;
                            display: inline-block;
                            transition: all 0.2s ease;
                            font-size: 18px;
                        }

                        /* Add tick icon always */
                        .product-check-input::before {
                            content: '✔';
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            color: #999; /* muted tick when unchecked */
                            font-size: 16px;
                            transition: all 0.2s ease;
                        }

                        /* Checked state */
                        .product-check-input:checked {
                            background-color: #007bff; /* blue background */
                            border-color: #007bff;
                        }

                        .product-check-input:checked::before {
                            color: #fff; /* white tick */
                        }
                    </style>
                    <td><?php echo $index; ?></td>
                    <td>
                        <?php
                            if(!empty($data['category_name'])) {
                                $data['category_name'] = $obj->encode_decode('decrypt', $data['category_name']);
                                echo $data['category_name'];
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            if(!empty($data['sub_category_name']) && $data['sub_category_name'] != $GLOBALS['null_value']) {
                                $data['sub_category_name'] = $obj->encode_decode('decrypt', $data['sub_category_name']);
                                echo $data['sub_category_name'];
                            } else {
                                echo "-";
                            }
                        ?>
                    </td>
                    <td>
						<div class="w-100">
							<?php
								if(!empty($data['product_name'])) {
									$data['product_name'] = $obj->encode_decode('decrypt', $data['product_name']);
									echo $data['product_name'];
								}
							?>
						</div>
						
						<?php
							if(!empty($data['creator_name'])) {
								$data['creator_name'] = $obj->encode_decode('decrypt', $data['creator_name']);
						?>
								<small><?php echo "creator : ".$data['creator_name']; ?></small>
						<?php		
							}
						?>
					</td>
                    <td>
                        <div class="form-check text-center">
                            <input class="product-check-input" type="checkbox" value="<?php if($data['is_home_product'] == '1') { echo '1'; } else { echo '0'; } ?>" <?php if($data['is_home_product'] == '1') { ?>checked<?php } ?> onclick="Javascript:CheckHomeProduct('<?php if(!empty($data['product_id'])) { echo $data['product_id']; } ?>', '<?php echo $data['is_home_product']; ?>');">
                        </div>
                    </td>
                    <td>
                        <?php $edit_access_error = "";
                        if(!empty($login_staff_id)) {
                            $permission_action = $edit_action;
                            include('permission_action.php');
                        }
                        $delete_access_error = "";
                        if(!empty($login_staff_id)) {
                            $permission_action = $delete_action;
                            include('permission_action.php');
                        }
                        if (empty($edit_access_error) || empty($delete_access_error)) { ?>
                            <div class="dropdown">
                                <a href="#" role="button" class="btn btn-dark py-1 px-1" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    <?php if(empty($edit_access_error)) { ?>
                                    <li><a class="dropdown-item"href="Javascript:ShowModalContent('<?php if (!empty($page_title)) { echo $page_title; } ?>', '<?php if(!empty($data['product_id'])) { echo $data['product_id']; } ?>');"><i class="fa fa-pencil"></i> &ensp; Edit</a></li>
                                    <?php } ?>
                                    <?php if(empty($delete_access_error)) {                                        
                                        $linked_count = 0;
                                        if(!empty($linked_count)) { ?>
                                            <li><a class="dropdown-item text-secondary"><i class="fa fa-trash"></i> &ensp; Delete</a></li>
                                        <?php }else{ ?>
                                            <li><a class="dropdown-item" href="Javascript:DeleteModalContent('<?php if (!empty($page_title)) { echo $page_title; } ?>', '<?php if (!empty($data['product_id'])) { echo $data['product_id']; } ?>');"><i class="fa fa-trash"></i> &ensp; Delete</a></li>                                                
                                    <?php } 
                                            
                                        } ?>
                                </ul>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
				<?php
						}
					}	
                    else {
				?>
                <tr>
                    <td colspan="6" class="text-center">Sorry! No records found</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>    
        <script type="text/javascript">
            function CheckHomeProduct(product_id, home_product) {
                var post_url = "product_changes.php?check_product_id="+product_id+"&check_product="+home_product;
                jQuery.ajax({
                    url: post_url, success: function (result) {
                        result = result.trim();
                        console.log("YEss :"+result);
                        if(parseInt(result) == 1) {
                            window.location.reload();
                        }
                    }
                });
            }
        </script>
<?php	
	}

    if(isset($_REQUEST['getSubCategory'])) {
        $category_id = $_REQUEST['getSubCategory'];
        $option = "<option value = ''> Select Sub Category </option>";
        $sub_category_list = array();
        if(!empty($category_id)) {    
            $sub_category_list = $obj->getTableRecords($GLOBALS['category_table'], 'parent_category_id', $category_id);
        } else {
            $sub_category_list = $obj->getTableRecords($GLOBALS['category_table'], 'parent', 'child');
        }
        if(!empty($sub_category_list)) {
            foreach($sub_category_list as $list) {
                $sub_category_id = $sub_category_name = $parent_catagory = ""; 
                if(!empty($list['category_id'])) {
                    $sub_category_id = $list['category_id']; 
                }
                if(!empty($list['category_name'])) {
                    $sub_category_name = $obj->encode_decode('decrypt', $list['category_name']);
                }
                if(!empty($data['parent_category_id'])) { 
                    $parent_catagory = $data['parent_category_id']; 
                }
                $option = $option . "<option value = '". $sub_category_id . "' data-parent='". $parent_catagory . "' > ". $sub_category_name . "</option>";
            }
        }

        echo $option;
    }

    if(isset($_REQUEST['delete_product_id'])) {
        $delete_product_id = $_REQUEST['delete_product_id'];
        $delete_product_id = trim($delete_product_id);
        $msg = "";
        if(!empty($delete_product_id)) {
            $product_unique_id = "";
            $product_unique_id = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $delete_product_id, 'id');
            if(preg_match("/^\d+$/", $product_unique_id)) {
                $name = "";
                $name = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $delete_product_id, 'product_name');
                $action = "";
                if(!empty($name)) {
                    $action = "Product Deleted. Name - ".$obj->encode_decode('decrypt', $name);
                }
            
                $columns = array(); $values = array();						
                $columns = array('deleted');
                $values = array("'1'");
                $msg = $obj->UpdateSQL($GLOBALS['product_table'], $product_unique_id, $columns, $values, $action);
            }
            else {
                $msg = "Invalid Product";
            }
        }
        else {
            $msg = "Empty Product";
        }
        echo $msg;
        exit;
    }

    if(isset($_REQUEST['check_product_id'])) {
        $product_id = trim($_REQUEST['check_product_id']);

        $is_checked = 0;
        if(isset($_REQUEST['check_product'])) {
            $is_checked = trim($_REQUEST['check_product']);
        }
        $is_home_product = 0;
        if($is_checked == '0') {
            $is_home_product = 1;
        }
        $product_unique_id = "";
        $product_unique_id = $obj->getTableColumnValue($GLOBALS['product_table'], 'product_id', $product_id, 'id');
        $action = ""; $result = 0;
        $action = "Home Product Added";
        if(preg_match("/^\d+$/", $product_unique_id)) {
            $columns = array(); $values = array();
            $columns = array('is_home_product');
            $values = array("'".$is_home_product."'");
            $product_update_id = $obj->UpdateSQL($GLOBALS['product_table'], $product_unique_id, $columns, $values, $action);
            if(preg_match("/^\d+$/", $product_update_id)) {
                $result = 1;
            }
        }
        echo $result;
    }
?>