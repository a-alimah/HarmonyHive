<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Registration or Sign Up form </title> 
        <link rel="stylesheet" href="../css/register.css">
    </head>
<body>
    <div class="wrapper">
        <h2>Registration</h2>
        <form id="signup" name="signup"  method="POST">
            
            <input  class="input-box" id="user" name="user" type="text" placeholder="Enter your username" >
            <input class="input-box" id="email" name="email" type="text" placeholder="Enter your email" >
            <input class="input-box" id="pass" name="pass" type="password" placeholder="Create password" >
            <input class="input-box" id="confirm" type="password" placeholder="Confirm password" >
            <span id="passerror"></span>
            <div class="policy">
                <input type="checkbox" id="checkbox" >
                <h3>I accept all terms & conditions</h3>
            </div>

            <button class="input-box button" name="enter" type="button" id="btn">Register Now</button>
            
            <div class="text">
                <h3>Already have an account? <a href="login_view.php">Login now</a></h3>
            </div>
        </form>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../js/register.js"></script>

</body>
</html>