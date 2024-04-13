<?php
include_once(dirname(__FILE__) .'/../controllers/general_controller.php');

if(isset($_POST['submit'])){
    $title = $_POST['ntitle'];
    $content = $_POST['ncontent'];
    $id = $_POST['id'];

    if(update_post_ctr($id, $title, $content)){
        echo "success";
    }else{
        echo "error";
    }

}



?>