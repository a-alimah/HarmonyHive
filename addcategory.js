const category = document.getElementById("category");
const submit = document.getElementById("submit");




function add_category() {

    console.log(category.value);
    
    const ajax = new XMLHttpRequest();
    let postObj = {
      category: category.value,
      submit: submit,
    };
    let formData = new URLSearchParams(postObj).toString();
    ajax.open("POST", "../actions/addcat_action.php", true);
    ajax.onload = () => {
      if (ajax.responseText.trim() === "exists") {
    
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'This category already exists.'
        }).then((result) => {
                if (result.value) {
                    window.location.href = '../view/home.php'; // Redirect to success page
                }
            });
           
      } else if (
        ajax.responseText.trim() == "success" 
      ) {
        Swal.fire({
            icon:'success',
            title: 'Success!',
            text: 'Category added successfully.'
        }).then((result) => {
            if (result.value) {
                window.location.href = '../view/home.php'; 
            }
        });
      } else if (ajax.responseText.trim() == "error") {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Unable to add category.'
        }).then((result) => {
            if (result.value) {
                window.location.href = '../view/home.php'; 
            }
        });
        

       
      }
    }
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send(formData);
  }