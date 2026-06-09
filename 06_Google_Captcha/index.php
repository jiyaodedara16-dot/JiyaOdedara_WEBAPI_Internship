<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login with Captcha</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
    function removeDisable(){
        document.getElementById("loginBtn").disabled = false;
    }
    </script>
</head>
<body>

    <div class="container">
        <div class="login-card">
            <h1>Login</h1>
            <form method="POST" action="verify.php">

                <div class="input-group">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Enter Username">
                </div>

                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter Email">
                </div>

                <div class="input-group">
                    <label>Password</label>
                    <input name="password" type="password" placeholder="Enter Password">
                </div>

                <div class="g-recaptcha captcha-box" data-sitekey="6LcXdBUtAAAAAMSxC8iO4WQ55YyfAvtk5LJT9NZ2" data-callback="removeDisable">
                    Google reCAPTCHA Here
                </div>

                <button type="submit" name="login" id="loginBtn" disabled="disabled">
                    Login
                </button>
            </form>
        </div>
    </div>

</body>
</html>

