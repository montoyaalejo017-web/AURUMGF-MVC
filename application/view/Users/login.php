<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo URL; ?>login/css/style.css">
</head>

<body>
    <div class="box">
        <span class="borderLine"></span>
        <form method="post">
            <h2>Sign in</h2>
            <div class="inputBox">
                <input type="text" name="txtUsername" required>
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="txtPassword" required>
                <span>Password</span>
                <i></i>
            </div>
            <div class="links">
                <a href="#">Forgot Password</a>
                <a href="#">Signup</a>
            </div>
            <input type="submit" name="btnLogin" id="submit" value="Login">
        </form>
    </div>
</body>

</html>