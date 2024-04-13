<?php

include_once(dirname(__FILE__).'/../controllers/general_controller.php');

if(isset($_POST['login'])){
    $email = $_POST['email'];

    $pass = $_POST['pass'];
    $login_dets = check_user_ctr($email);

    if(!empty($login_dets)){

        $verify = $login_dets['passwd'];
        $p= password_verify($pass, $verify);
        if($p){
            echo "success"; 

            session_start();
            $_SESSION['email'] = $login_dets['email'];
            $_SESSION['id'] = $login_dets['user_id'];
            $_SESSION['role_id'] = $login_dets['role_id'];



            // if($_SESSION['role_id'] == 1){
            //     echo "success"; //Redirect to admin view later in the js file
            // }else{
            //     echo "success";
            // }

        }else{
            echo "error";
        }
    }else{
        echo "wrong email";
    }

    
}



?>