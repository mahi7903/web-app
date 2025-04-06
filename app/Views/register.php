<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Head section starts: I’m setting up the page metadata and styles -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register - Mahi’s Pharmacy</title>

  <!-- Adding Bootstrap for layout and responsiveness -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"/>

  <!-- Font Awesome for icons beside input fields -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

  <style>
    /* Main body background and font styling */
    body {
      background-color: #b5ddb6;
      font-family: 'Segoe UI', sans-serif;
      transition: background 0.3s ease, color 0.3s ease;
    }

    /* When dark mode is active */
    .dark-mode {
      background-color: #151414;
      color: white;
    }

    /* Centered container for the registration form */
    .register-container {
      max-width: 420px;
      background-color: #fff;
      padding: 30px;
      margin: 50px auto;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    /* Same form in dark mode */
    .dark-mode .register-container {
      background-color: #2a2a2a;
      color: white;
    }

    /* Form heading style */
    h1.form-title {
      text-align: center;
      margin-bottom: 25px;
      color: #007d44;
    }

    .dark-mode h1.form-title {
      color: #90ee90;
    }

    /* Input field containers with icons */
    .input-group {
      display: flex;
      align-items: center;
      margin-bottom: 18px;
      border-bottom: 2px solid #ccc;
    }

    /* Icon inside the input group */
    .input-group i {
      padding: 10px;
      color: #007d44;
      min-width: 40px;
      text-align: center;
    }

    /* Input field styling */
    .input-group input {
      width: 100%;
      padding: 10px;
      border: none;
      outline: none;
      background: none;
      color: inherit;
    }

    /* Submit button style */
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

    /* OR separator style */
    .or {
      text-align: center;
      margin: 20px 0;
      color: #666;
    }

    /* Social login icons section */
    .icons {
      display: flex;
      justify-content: center;
      gap: 20px;
      font-size: 20px;
      color: #007d44;
      margin-bottom: 15px;
    }

    /* Link section (already have account) */
    .links {
      text-align: center;
      font-size: 14px;
    }

    .links a {
      color: #007d44;
      text-decoration: none;
      font-weight: bold;
    }

    /* Styling for dark mode inputs and links */
    .dark-mode .register-container input,
    .dark-mode .register-container .input-group {
      border-color: #666;
    }

    .dark-mode .links a {
      color: #90ee90;
    }
  </style>
</head>

<body>

  <!-- Here's the main container for the registration form -->
  <div class="register-container">
    <h1 class="form-title">Register</h1>

    <!-- Registration form with POST method -->
    <form method="POST" action="<?= base_url('register/submit') ?>">
      <!-- Name field with user icon -->
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="name" id="name" placeholder="Name" required>
      </div>

      <!-- Email field with envelope icon -->
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" id="email" placeholder="Email" required>
      </div>

      <!-- Password field with lock icon -->
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" id="password" placeholder="Password" required>
      </div>

      <!-- Confirm Password field with another lock icon -->
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
      </div>

      <!-- Submit button to register -->
      <input type="submit" class="btn" value="Sign Up" name="signup">
    </form>

    <!-- Optional: social login section -->
    <p class="or">------OR------</p>
    <div class="icons">
      <i class="fab fa-google"></i>
      <i class="fab fa-facebook"></i>
    </div>

    <!-- Redirect to login page if already registered -->
    <div class="links">
      <p>Already have an account?</p>
      <a href="http://localhost/login">Sign In</a>
    </div>
  </div>

  <!-- On page load, apply dark mode if user selected it earlier -->
  <script>
    window.onload = function () {
      if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
      }
    };
  </script>

</body>
</html>
