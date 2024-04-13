<?php
//connect to database class
require("../settings/db_class.php");

/**
*General class to handle all functions 
*/
/**
 *@author David Sampah
 *
 */

//  public function add_brand($a,$b)
// 	{
// 		$ndb = new db_connection();	
// 		$name =  mysqli_real_escape_string($ndb->db_conn(), $a);
// 		$desc =  mysqli_real_escape_string($ndb->db_conn(), $b);
// 		$sql="INSERT INTO `brands`(`brand_name`, `brand_description`) VALUES ('$name','$desc')";
// 		return $this->db_query($sql);
// 	}
class general_class extends db_connection
{
	//--INSERT--//
	public function insert_user($name, $email, $hashpass)
	{
		$ndb = new db_connection();
		$name =  mysqli_real_escape_string($ndb->db_conn(), $name);
		$email =  mysqli_real_escape_string($ndb->db_conn(), $email);
		$hashpass =  mysqli_real_escape_string($ndb->db_conn(), $hashpass);
		$sql="INSERT INTO user(username, email, passwd) VALUES ('$name','$email','$hashpass')";
		return $this->db_query($sql);
	}

	public function insert_category($category){
		$ndb = new db_connection();
        $category =  mysqli_real_escape_string($ndb->db_conn(), $category);
        $sql="INSERT INTO category(category_name) VALUES ('$category')";
        return $this->db_query($sql);
	}

	public function add_post($author_id, $title, $content, $category_id, $img){
		$ndb = new db_connection();
        $author_id =  mysqli_real_escape_string($ndb->db_conn(), $author_id);
        $title =  mysqli_real_escape_string($ndb->db_conn(), $title);
        $content =  mysqli_real_escape_string($ndb->db_conn(), $content);
        $category_id =  mysqli_real_escape_string($ndb->db_conn(), $category_id);
        $img =  mysqli_real_escape_string($ndb->db_conn(), $img);
        $sql="INSERT INTO post(author_id, title, content, category_id, img) VALUES ('$author_id','$title','$content','$category_id','$img')";
        return $this->db_query($sql);
	}

	//--SELECT--//
	public function check_user($email){
		$ndb = new db_connection();
        $sql="SELECT * FROM user WHERE email = '$email'";
        return $this->db_fetch_one($sql);
	}

	public function check_category($category){
		$ndb = new db_connection();
        $sql="SELECT * FROM category WHERE category_name = '$category'";
        return $this->db_fetch_one($sql);
	}

	public function show_category(){
		$ndb = new db_connection();
        $sql="SELECT * FROM category";
        return $this->db_fetch_all($sql);
	}


	public function show_all_post(){
        $ndb = new db_connection();
        $sql="SELECT user.username, post.title, post.content, category.category_name, post.date_published, post.img FROM post JOIN user ON post.author_id = user.user_id JOIN category ON post.category_id = category.category_id";
        return $this->db_fetch_all($sql);
    }

	public function get_user($email){
		$ndb = new db_connection();
		$sql = "SELECT * FROM user WHERE email = '$email'";
		return $this->db_fetch_one($sql);
	}

	public function get_post($id){
        $ndb = new db_connection();
        $sql = "SELECT * FROM post WHERE author_id = '$id'";
        return $this->db_fetch_all($sql);
    }

	public function get_post_by_category($id){
		$ndb = new db_connection();
        $sql = "SELECT * FROM post WHERE category_id = '$id'";
        return $this->db_fetch_all($sql);
	}
	//--UPDATE--//
	public function update_post($id, $ntitle, $ncontent){
		$ndb = new db_connection();
        $sql = "UPDATE post SET title = '$ntitle', content = '$ncontent' WHERE post_id = '$id'";
        return $this->db_query($sql);
	}


	//--DELETE--//
	public function delete_post($id){
	    $ndb = new db_connection();
		$sql = "DELETE FROM post WHERE post_id = '$id'";
		return $this->db_query($sql);
	}

}

?>