<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title> 
    <link rel="stylesheet" href="../css/register.css">
  </head>
<body>
  <div class="wrapper">
    <h2>Login</h2>
    <form  method="POST">
      <input class="input-box" name="email" type="text" placeholder="Enter your email" id="email" required>
      <input class="input-box" name="pass" type="password" placeholder="Create password" id="passwd" required>
      <button  class="input-box button" type="button"  name="submit" id="login" onclick="login_user()">Login</button>

      <div class="text">
        <h3>Don't have an account? <a href="signup.php">SignUp now</a></h3>
      </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../js/login.js"></script>

</body>
</html>
