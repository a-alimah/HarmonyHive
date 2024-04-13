
    
    const user = document.getElementById("user");
    const email = document.getElementById("email");
    const pass = document.getElementById("pass");
    const conf = document.getElementById("confirm");
    const passerror = document.getElementById("passerror");
    const btn = document.getElementById("btn");
    document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    form.addEventListener("input", function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Reset styles
        document.getElementById("user").style.borderColor = '';
        document.getElementById("email").style.borderColor = '';
        document.getElementById("pass").style.borderColor = '';
        document.getElementById("confirm").style.borderColor = '';

        // Validation flags
        let isValid = true;

        // Fetch form values
        const username = document.getElementById("user");
        const email = document.getElementById("email");
        const password = document.getElementById("pass");
        const confirmPassword = document.getElementById("confirm");

        function validateEmail(email) {
        const re = /^(([^<>()\[\]\\.,;:\s@\"]+(\.[^<>()\[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

        // Username validation (example: must not be empty, can add more rules)
        if (username.value.trim() === '') {
            isValid = false;
            username.style.borderColor = 'red';
        }

        // Email validation
        if (!validateEmail(email.value)) {
            isValid = false;
            email.style.borderColor = 'red';
        }

        // Password validation
        if (password.value.length < 8) {
            isValid = false;
            password.style.borderColor = 'red';
        }

        // Confirm password validation
        if (password.value !== confirmPassword.value) {
            isValid = false;
            confirmPassword.style.borderColor = 'red';
            passerror.innerHTML = 'Passwords do not match';
        }else{
            confirmPassword.style.borderColor = 'green';
            passerror.innerHTML = '';
        }

        // If all validations pass, submit the form
        if (isValid) {
            btn.disabled = !isValid;
            
        }
    });
    btn.addEventListener("click", function(e) {
        e.preventDefault(); // Prevent default form submission
        if (!btn.disabled) {
            register_user(); // Call register_user only when button is enabled (validations passed)
        }
    });

    
});
function register_user() {

    
    const ajax = new XMLHttpRequest();
    let postObj = {
    user: user.value,
    email: email.value,
    pass: pass.value,
    };
      
    let formData = new URLSearchParams(postObj).toString();
    ajax.open("POST", "../actions/signup_action.php", true);
    ajax.onload = () => {
      if (ajax.responseText.trim() === "success") {
    
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Account created successfully'
            }).then((result) => {
                if (result.value) {
                    window.location = '../login/login_view.php'; // Redirect to success page
                }
            });
           
      } else if (
        ajax.responseText.trim() == "error" 
      ) {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'This email already exists'
        }).then((result) => {
            if (result.value) {
                window.location.href = '../login/signup.php'; 
            }
        });
      } else if (ajax.responseText.trim() == "failed") {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Try again'
        }).then((result) => {
            if (result.value) {
                window.location.href = '../login/signup.php'; 
            }
        });
        

       
      }
    }
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send(formData);
  }