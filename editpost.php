<?php 
session_start();
include_once(dirname(__FILE__) . '/../controllers/general_controller.php');
$title = $content = $id = ""; // Initialize to prevent undefined variable errors


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $post = get_post_ctr($id);
    if ($post) {
        $title = $post['title'];
        $content = $post['content'];
    }
}
?>
<html>
    <head>
        <link rel="stylesheet" href="../css/form.css">
    </head>
    <body>
        <div class="wrapper">
            <h2>Edit Post</h2>
            <form method="post" enctype="multipart/form-data">
                <label>Title:</label>  
                <input type="text" name="ntitle" id="title" value="<?php echo $title; ?>"/>

                <label>Content:</label>
                <textarea id="textbox" rows="10" cols="60" name="ncontent"><?php echo $content; ?></textarea>
                <span id="char_count"></span>  

                <input type="hidden" name="id" value="<?php echo $id; ?>">
                
                <button class="btn" name="submit" type="submit">Submit</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../js/editpost.js"></script>
        <script>
            let textArea = document.getElementById("textbox");
            let characterCounter = document.getElementById("char_count");
            const maxNumOfChars = 14000;

            const countCharacters = () => {
                let numOfEnteredChars = textArea.value.length;
                let counter = maxNumOfChars - numOfEnteredChars;
                characterCounter.textContent = counter + "/14000";
                console.log(counter);
            }
            textArea.addEventListener("input", countCharacters);
        </script>
    </body>
</html>
