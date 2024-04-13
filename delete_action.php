<?php
include_once(dirname(__FILE__) . '/../controllers/general_controller.php');

echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = delete_post_ctr($id);

    if ($delete) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "ID parameter is missing.";
}
?>

