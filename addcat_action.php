<?php 
include_once(dirname(__FILE__).'/../controllers/general_controller.php');

    if(isset($_POST['submit'])){
        $category = $_POST['category'];
        $category_exist = check_category_ctr($category);

        if($category_exist){
            
            echo "exists";
        }else{
            if (insert_category_ctr($category)){
                echo "success";
            }else{
                echo "error";
            }
            
        }

    }else{
        echo "Something went wrong";  
    }  




?>