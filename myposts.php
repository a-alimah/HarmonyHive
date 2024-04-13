<?php 
session_start();
include_once(dirname(__FILE__)."/../controllers/general_controller.php");


$user = get_user_ctr($_SESSION['email']);

$postList = get_post_ctr($user['user_id']);



?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="../css/home.css">
        <link rel="stylesheet" href="../fontawesome/css/all.min.css">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/669829b3f2.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <div class="sidebar">
            <div class="logo"></div>
            <ul class="menu">
              <li classs="active">
                <a href="home.php">
                    <i class="fa-solid fa-house"></i>
                    <span>Home</span>
                </a>
              </li>
              <li classs="active">
                <a href="myposts.php">
                    <i class="fa-solid fa-table-columns"></i>
                    <span>My Posts</span>
                </a>
              </li>
              <li>
                <a href="#">
                    <i class="fa-solid fa-gears"></i>
                    <span>Settings</span>
                </a>
              </li>
              <li class="logout">
                <a href="#">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <span>Logout</span>
                </a>
              </li>
            </ul>
        </div>
        <div class="main-content">
            <div class="header-wrapper">
                <div class="header-title">
                    <h2>Welcome</h2>
                    <span><?php echo $user['username']; ?></span>
                </div>
                <div class="user-info">
                    <div class="search-box">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <!-- <form action="searchPage.php" method="GET"> -->
                        <input type="text" placeholder="Search" name="">
                    </div>
                </div>
            </div>
                <!-- Main Content -->
            <div class="card-container">
                
                <?php foreach($postList as $post):?>
                <article class="col-12 col-md-6 post">
                    <hr class="hr-primary">
                    <a href="post.html" class="effect-lily post-link pt-60">
                        <div class="post-link-inner">
                            <img src="<?php echo $post['img'];?>" alt="<?php echo $post['title'];?>" class="img-fluid">                            
                        </div>
                        <h2 class="pt-30 color-primary post-title"><?php echo $post['title'];?></h2>
                    </a>                    
                    <p class="pt-30">
                        <?php echo $post['content'];?>
                    </p>
                    <div class="d-flex justify-content-between pt-45">
                        <span class="color-primary"><?php echo $post['date_published'];?></span>
                    </div>
                    <hr>
                </article>
                <div class="button div">
                    <a href="editpost.php?id=<?php echo $post['post_id'];?>"><button class="button-1" >EDIT POST</button></a>
                    <button class="button-1" id="deletepost" onclick="deletpost()"><a href='../actions/delete_action.php?id=<?php echo $post['post_id'];?>'>DELETE POST</button>

                </div>
                <?php endforeach;?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../js/addproduct.js"></script>
    </body>
</html>