<?php
include("include_files.php");

$field_name = $_POST['field_name'] ?? '';
$temp_dir = $obj->temp_image_directory();

if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === 0) {
    $original_name = pathinfo($_FILES['pdf_file']['name'], PATHINFO_FILENAME);
    $extension = strtolower(pathinfo($_FILES['pdf_file']['name'], PATHINFO_EXTENSION));

    if ($extension !== 'pdf') {
        exit("Only PDF files are allowed.");
    }

    $safe_name = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "_", $original_name));
    $final_name = $safe_name . "_" . date("d_m_Y_h_i_s") . ".pdf";

    if (!empty($temp_dir)) {
        chmod($temp_dir, 0777);
    }

    $target_path = $temp_dir . $final_name;
    if (move_uploaded_file($_FILES['pdf_file']['tmp_name'], $target_path)) {
        $msg = '<div class="image-container" style="position: relative; display: inline-block;">
            <button type="button" onclick="Javascript:delete_multiple_files(this, \'' . $field_name . '\', \'' . $final_name . '\');" class="btn btn-danger" style="position: absolute; right: 0px; top: 0px; border-radius: 20%;"><i class="fa fa-close"></i></button>
            <a href="' . $target_path . '" class="delete_pdf" target="_blank">
                <i class="fa fa-file-pdf-o" style="font-size: 120px;color:red;"></i>
            </a>									
            <input type="hidden" name="' . $field_name . '_name[]" value="' . $final_name . '">
            <div class="py-2"><input type="text" name="pdf_name[]" class="form-control px-1 py-1" value="" placeholder="File Name"></div>
        </div>';

        echo $msg;
    } else {
        echo "Failed to move uploaded file.";
    }
} else {
    echo "No PDF file received or upload error.";
}
