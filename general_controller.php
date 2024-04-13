<?php
//connect to the user account class
include("../classes/general_class.php");

//sanitize data

// function add_user_ctr($a,$b,$c,$d,$e,$f,$g){
// 	$adduser=new customer_class();
// 	return $adduser->add_user($a,$b,$c,$d,$e,$f,$g);
// }


//--INSERT--//
function insert_user_ctr($name, $email, $hashpass)
{
    $adduser = new general_class();
    return $adduser->insert_user($name, $email, $hashpass);
}

function insert_category_ctr($category)
{
    $addcate = new general_class();
    return $addcate->insert_category($category);
}

function add_post_ctr($author_id, $title, $content, $category_id, $img){
    $addpost = new general_class();
    return $addpost->add_post($author_id, $title, $content, $category_id, $img);
}

//--SELECT--//
function check_user_ctr($email){
    $checkuser = new general_class();
    return $checkuser->check_user($email);
}

function check_category_ctr($category){
    $checkcategory = new general_class();
    return $checkcategory->check_category($category);
}

function show_category_ctr(){
    $showcategory = new general_class();
    return $showcategory->show_category();
}

function show_all_post_ctr(){
    $showpost = new general_class();
    return $showpost->show_all_post();
}

function get_user_ctr($email){
    $getuser = new general_class();
    return $getuser->get_user($email);
}


function get_post_ctr($id){
    $getpost = new general_class();
    return $getpost->get_post($id);
}

function get_post_by_category_ctr($id){
    $getpost = new general_class();
    return $getpost->get_post_by_category($id);
}
//--UPDATE--//
function update_post_ctr($id, $ntitle, $ncontent){
    $updatepost = new general_class();
    return $updatepost->update_post($id, $ntitle, $ncontent);
}

//--DELETE--//
function delete_post_ctr($id){
    $deletepost = new general_class();
    return $deletepost->delete_post($id);
}
?>