<?php 
session_start();
include_once(dirname(__FILE__).'/../controllers/general_controller.php');

?>

<html>
    <head>
        <link rel="stylesheet" href="../css/form.css">
    </head>
    <div class="wrapper">
        <h2>Add Post</h2>
        <form method="post" enctype = "multipart/form-data">
            <label>Category:</label>
            <select name="category" id="category">
                <optgroup>
                    <option value="0">Select</option>
                    <?php
                    $categoryList= show_category_ctr();
        
                    //Loop throught the fetched categories and generate options
                    foreach($categoryList as $category){
                    echo "<option value='" . $category['category_id'] . "'>" . $category['category_name'] . "</option>";

                    }
                    ?>
                </optgroup>
            </select>


            <label>Title:</label>  
            <input type="text" name="title" id="title"/>

            <label>Content:</label>
            <textarea id="textbox" rows="10" cols="60" type="text" name="content"></textarea>
            <span id="char_count"></span>  
            
            <br>

            <label>Image:</label>       
            <input type="file" name="img" id="img" />

            <input type="hidden" id="author" name="user_id" value="<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : ''; ?>">
            
            <button class="btn" id="submit" name="submit" type="button" value="Submit" onclick="addpost()">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/addpost.js"></script>
    <script>
        let textArea = document.getElementById("textbox");
        let characterCounter = document.getElementById("char_count");
        const maxNumOfChars = 14000;

        const countCharacters = () => {
            //Number of characters entered into the textarea
            let numOfEnteredChars = textArea.value.length;
            //Number of characters left 
            let counter = maxNumOfChars - numOfEnteredChars;
            characterCounter.textContent = counter + "/14000";
            console.log(counter)
        }
        textArea.addEventListener("input", countCharacters);
    </script>
</html>