<?php 
session_start();
include_once(dirname(__FILE__)."/../controllers/general_controller.php");

$CategoriesList = show_category_ctr();
$postList = show_all_post_ctr();


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="../css/home.css">
        <link rel="stylesheet" href="fontawesome/css/all.min.css">
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
                    <span>Primary</span>
                    <h2>Dashboard</h2>
                </div>
                <div class="user-info">
                    <div class="search-box">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <!-- <form action="searchPage.php" method="GET"> -->
                        <input type="text" placeholder="Search" name="">
                    </div>
                </div>
            </div>
            <aside class="col-lg-4 tm-aside-col">
                    <div class="tm-post-sidebar">
                        <hr class="mb-3 tm-hr-primary">
                        <h2 class="mb-4 tm-post-title tm-color-primary">Categories</h2>
                        <ul class="tm-mb-75 pl-5 tm-category-list">
                        <?php foreach ($CategoriesList as $category): ?>
                            <li class="lvl-1"><a class="tm-color-primary" href="filterResults.php?id=<?= $category['category_id']; ?>" ><?= $category['category_name']; ?></a></li>
                        <?php endforeach; ?>
                    </div>                    
                </aside>
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
                        There is a clickable image with beautiful hover effect and active title link for each post item. 
                        Left side is a sticky menu bar. Right side is a blog content that will scroll up and down.
                    </p>
                    <div class="d-flex justify-content-between pt-45">
                        <span class="color-primary"><?php echo $post['category_name'];?></span>
                        <span class="color-primary"><?php echo $post['date_published'];?></span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                    
                        <span><?php echo $post['username'];?></span>
                    </div>
                </article>
                <div class="button div">
                    <a href="addpost.php"><button class="button-1" >+ Post</button></a>
                    <button class="button-1" id="addCat">+ Category</button>

                    <form id="formPopUp" method = "POST" style="display: none;">
                        <p id="close" class="close-form" style="cursor: pointer;">&times</p>
                        <label for="category">Category name</label>
                        <input type="text" name="category"id="category">
                        <button type="button" class="btn" name="submit" id="submit" onclick="add_category()">Submit</button>
                    </form>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../js/addcategory.js"></script>
        <script>
            const form = document.getElementById("formPopUp");
            const closeButton = document.querySelector(".close-form");
            
            const showForm = () => {
                form.style.display = "block";
            };
            
            const hideForm = () => {
                form.style.display = "none";
            };
            
            document.getElementById("addCat").addEventListener("click", showForm);
            closeButton.addEventListener("click", hideForm);
        </script>
    </body>
</html>