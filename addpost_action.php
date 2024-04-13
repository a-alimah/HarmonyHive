<?php 
include_once(dirname(__FILE__).'/../controllers/general_controller.php');

if(isset($_POST['submit'])){
    $author = $_POST['user_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $folder = "../images/";


//Handle image file
$targetFile = $folder . basename($_FILES['img']['name']);
$uploadOK = 1;
$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

$image = $targetFile;

if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
    if(add_post_ctr($author, $title, $content, $category, $image))
    echo "success";
} else {
    echo "error";  
}
}else{
    echo'Wrong entry';
}

?>