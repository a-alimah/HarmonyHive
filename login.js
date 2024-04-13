const email = document.getElementById("email");
const pass = document.getElementById("passwd");
const login = document.getElementById("login");



function login_user() {

    console.log(email.value);
    
    const ajax = new XMLHttpRequest();
    let postObj = {
      email: email.value,
      pass: pass.value,
      login: login,
    };
    let formData = new URLSearchParams(postObj).toString();
    ajax.open("POST", "../actions/login_action.php", true);
    ajax.onload = () => {
      if (ajax.responseText.trim() === "success") {
    
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Your operation was successful.'
            }).then((result) => {
                if (result.value) {
                    window.location.href = '../view/home.php'; // Redirect to success page
                }
            });
           
      } else if (
        ajax.responseText.trim() == "error" 
      ) {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Your password is incorrect.'
        }).then((result) => {
            if (result.value) {
                window.location.href = '../login/login_view.php'; 
            }
        });
      } else if (ajax.responseText.trim() == "wrong email") {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Your email is incorrect.'
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