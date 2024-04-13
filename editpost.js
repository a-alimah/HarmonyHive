const ntitle = document.getElementById("ntitle");
const ncontent = document.getElementById("ncontent");
const id = document.getElementById("id");
const submit = document.getElementById("submit");



function editpost() {

    console.log(ntitle.value);
    
    const ajax = new XMLHttpRequest();
    let postObj = {
      ntitle: ntitle.value,
      ncontent: ncontent.value,
      id: id.value,
      submit: submit,
    };
    let formData = new URLSearchParams(postObj).toString();
    ajax.open("POST", "../actions/editpost_action.php", true);
    ajax.onload = () => {
      if (ajax.responseText.trim() === "success") {
    
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Your operation was successful.'
            }).then((result) => {
                if (result.value) {
                    window.location.href = '../view/myposts.php'; // Redirect to success page
                }
            });
           
      } else if (
        ajax.responseText.trim() == "error" 
      ) {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Unable to update.'
        }).then((result) => {
            if (result.value) {
                window.location.href = '../login/login_view.php'; 
            }
        });
      } else if (ajax.responseText.trim() == "wrong entry") {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Incorrect entry.'
        }).then((result) => {
            if (result.value) {
                window.location.href = '../login/login_view.php'; 
            }
        });
        

       
      }
    }
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send(formData);
  }