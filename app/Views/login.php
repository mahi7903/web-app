<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Mahi’s Pharmacy</title>

  <!--  Bootstrap and FontAwesome for layout and icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

  <style>
    /*  Light green theme with dark mode support */
    body {
      background-color: #b5ddb6;
      font-family: 'Segoe UI', sans-serif;
      transition: background 0.3s ease, color 0.3s ease;
    }

    .dark-mode {
      background-color: #151414;
      color: white;
    }

    /*  Login box container */
    .login-container {
      max-width: 420px;
      background-color: #fff;
      padding: 30px;
      margin: 50px auto;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .dark-mode .login-container {
      background-color: #2a2a2a;
      color: white;
    }

    /*  Form title */
    h1.form-title {
      text-align: center;
      margin-bottom: 25px;
      color: #007d44;
    }

    .dark-mode h1.form-title {
      color: #90ee90;
    }

    /* Icon + input styling */
    .input-group {
      display: flex;
      align-items: center;
      margin-bottom: 18px;
      border-bottom: 2px solid #ccc;
    }

    .input-group i {
      padding: 10px;
      color: #007d44;
      min-width: 40px;
      text-align: center;
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      border: none;
      outline: none;
      background: none;
      color: inherit;
    }

    /* ✅ Login button style */
    .btn {
      width: 100%;
      background-color: #007d44;
      color: white;
      border: none;
      padding: 10px;
      font-weight: bold;
      border-radius: 8px;
      transition: background 0.3s ease;
    }

    .btn:hover {
      background-color: #005f32;
    }

    /* ✅ Forgot password link */
    .recover {
      text-align: right;
      font-size: 13px;
    }

    .recover a {
      color: #007d44;
      text-decoration: none;
    }

    /* ✅ OR separator */
    .or {
      text-align: center;
      margin: 20px 0;
      color: #666;
    }

    /* ✅ Social icons (non-functional) */
    .icons {
      display: flex;
      justify-content: center;
      gap: 20px;
      font-size: 20px;
      color: #007d44;
      margin-bottom: 15px;
    }

    /* ✅ Link to registration */
    .links {
      text-align: center;
      font-size: 14px;
    }

    .links a {
      color: #007d44;
      text-decoration: none;
      font-weight: bold;
    }

    .dark-mode .links a {
      color: #90ee90;
    }
  </style>
</head>
<body>

<!--  Main login card -->
<div class="login-container">
  <h1 class="form-title">Sign In</h1>

  <!--  Login form sends data via POST to login/submit route -->
  <form method="POST" action="<?= base_url('login/submit') ?>">
    <div class="input-group">
      <i class="fas fa-envelope"></i>
      <input type="email" name="email" id="email" placeholder="Email" required>
    </div>
    <div class="input-group">
      <i class="fas fa-lock"></i>
      <input type="password" name="password" id="password" placeholder="Password" required>
    </div>
    <p class="recover"><a href="#">Recover Password</a></p>
    <input type="submit" class="btn" value="Sign In" name="signin">
  </form>

  <p class="or">------OR------</p>

  <!--  Social login placeholders (not linked) -->
  <div class="icons">
    <i class="fab fa-google"></i>
    <i class="fab fa-facebook"></i>
  </div>

  <!--  Link to register page -->
  <div class="links">
    <p>Don't have an account?</p>
    <a href="http://localhost/register">Sign Up</a>
  </div>
</div>

<!--  Checking for saved dark mode and apply if needed -->
<script>
  window.onload = function () {
    if (localStorage.getItem("theme") === "dark") {
      document.body.classList.add("dark-mode");
    }
  };
</script>
</body>
</html>
