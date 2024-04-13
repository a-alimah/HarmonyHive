
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    form.addEventListener("submit", function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Validation flags
        let isValid = true;
        const errors = [];

        // Fetch form values
        const username = document.getElementById("user").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("pass").value;
        const confirmPassword = document.getElementById("confirm").value;
        

        // Username validation (example: must not be empty, can add more rules)
        if (username.trim() === '') {
            isValid = false;
            errors.push("Username is required.");
        }

        // Email validation
        if (!validateEmail(email)) {
            isValid = false;
            errors.push("Please enter a valid email address.");
        }

        // Password validation
        if (password.length < 8) {
            isValid = false;
            errors.push("Password must be at least 8 characters long.");
        }

        // Confirm password validation
        if (password !== confirmPassword) {
            isValid = false;
            errors.push("Passwords do not match.");
        }

        // Display errors or submit form
        if (!isValid) {
            alert(errors.join("\n"));
        } else {
            form.submit(); // Proceed with the form submission
        }
    });

    function validateEmail(email) {
        const re = /^(([^<>()\[\]\\.,;:\s@\"]+(\.[^<>()\[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
});

