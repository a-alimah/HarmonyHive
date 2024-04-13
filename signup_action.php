<?php

include_once(dirname(__FILE__).'/../controllers/general_controller.php');


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $hashpass = password_hash($password, PASSWORD_BCRYPT);
    
    if (!empty(check_user_ctr($email))){
        echo "error";
    }elseif(empty(check_user_ctr($email))){
        if(insert_user_ctr($name, $email, $hashpass)){
    
            echo "success";
        }else {
            echo "failed";
        } 

    }
                                      
          

}else{
    echo"There was an issue with submitting your form";
}



?>
