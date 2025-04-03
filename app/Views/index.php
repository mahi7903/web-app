<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1 class="form-title"> Sign In </h1>
        <form method="POST" action="Account.php">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email required" placeholder="Email" required>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <i class="fa fa-eye" id="eye"></i>

            </div>
            <p class="recover"><a href="#">Recover Password</a></p>
            <input type="submit" class="btn" value="Sign In" name="signin">
        </form>
        <p class="or">-------OR-------</p>
        <div class="icons">
            <i class="fab fa-google"></i>
            <i class="fab fa-facebook"></i>
        </div>
        <div class="links"><p>Don't have any account?</p>
        
        <a href="http://localhost/register">Sign Up</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>