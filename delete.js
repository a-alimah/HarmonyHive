const id = document.getElementById("deletepost");
const submit = document.getElementById("submit");




function deletepost() {

    console.log(id.value);
    
    const ajax = new XMLHttpRequest();
    let postObj = {
      id: id.value,
      
    };
    let formData = new URLSearchParams(postObj).toString();
    ajax.open("POST", "../actions/delete_action.php", true);
    ajax.onload = () => {
      if (ajax.responseText.trim() === "eroor") {
    
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Cannot delete post.'
        }).then((result) => {
                if (result.value) {
                    window.location.href = '../view/myposts.php'; // Redirect to success page
                }
            });
           
      } else if (
        ajax.responseText.trim() == "success" 
      ) {
        Swal.fire({
            icon:'success',
            title: 'Success!',
            text: 'Sucessfully deleted'
        }).then((result) => {
            if (result.value) {
                window.location.href = '../view/myposts.php'; 
            }
        });
      }
        

       
      
    }
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send(formData);
  }