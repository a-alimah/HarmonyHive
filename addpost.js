const category = document.getElementById("category");
const title = document.getElementById("title");
const content = document.getElementById("textbox");
const img = document.getElementById("img");
const user_id = document.getElementById("author");
const submit = document.getElementById("submit");




function addpost() {    
    const ajax = new XMLHttpRequest();
    const formData = new FormData();
    formData.append("category", category.value);
    formData.append("title", title.value);
    formData.append("content", content.value);
    formData.append("user_id", user_id.value);
    formData.append("submit", submit);

    const imageinput = document.getElementById("img");
    const image = imageinput.files[0];
    formData.append("img", image);

    ajax.open("POST", "../actions/addpost_action.php", true);
    ajax.onload = () => {
      if (ajax.responseText.trim() === "success") {
    
        Swal.fire({
            icon:"success",
            title: "Success!",
            text: "Post created successfully."
        }).then((result) => {
            if (result.value) {
                window.location.href = "../view/home.php"; 
            }
        });
        
           
      } else if (
        ajax.responseText.trim() == "error") 
       {
        Swal.fire({
            icon:"error",
            title: "Error!",
            text: "Post could not be created"
        }).then((result) => {
            if (result.value) {
                window.location.href = "../view/addpost.php"; 
            }
        });
        
      } else if (ajax.responseText.trim() == "Wrong entry") {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Something went wrong.'
        }).then((result) => {
            if (result.value) {
                window.location.href = '../view/home.php'; 
            }
        });
        

       
      }
    }
    ajax.send(formData);
  }