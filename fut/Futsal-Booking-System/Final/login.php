<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal Booking System</title>
    <link rel="stylesheet" href="../Final/CSS/Login.css">
</head>

<body>

    <?php 
    session_start();
    date_default_timezone_set('Asia/Kathmandu');

    include("../Final/Assets/out_user_nav.php"); ?>
       <div class="login-text">
        <h2>Login to <br> access <br>Futsal</h2>
    </div>

    <div class="logreg-box">
        <div class="form-box login">
            <form action="customer.php" method="post" id= "myForm">
                <div class="input-box">
                    <input type="email" name="email" required placeholder="youremail@example.com">
                    <label>Email</label>
                </div>

                <div class="input-box">
                    <input type="password" name="pwd" id="pwd" required placeholder="***************">
                    <label>Password</label>
                </div>

                <div class="remember-forgot">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="../Final/forgetPassword.php">Forgot Password</a>
                </div>
                <button type="submit" name="login" value="login" class="btn"><strong>LOGIN</strong></button>
                <div class="login-register">
                    <p>Don't have an account? <a href="../Final/signup.php" class="register-link">Sign Up</a></p>
                </div>
            </form>
        </div>

    </div>
    <script src="script.js"></script>

</body>

</html>
