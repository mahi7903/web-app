<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mahi's Pharmacy</title>

  <!-- Linking Bootstrap for responsive layout and FontAwesome for icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    /* Page background and general element styling */
    body { background-color: rgba(193, 243, 220, 0.73); }
    .navbar a, .navbar-brand { color: white; }

    /* Product image animation effect on hover */
    .product-img {
      width: 100px;
      height: 100px;
      transition: transform 0.5s ease;
    }
    .product-img:hover {
      transform: translateY(-10px);
    }

    /* Dark theme appearance */
    .dark-mode {
      background-color: rgb(21, 20, 20);
      color: white;
    }
    .dark-mode footer,
    .dark-mode .navbar {
      background-color: rgb(0, 0, 0) !important;
    }
    .dark-mode .product-img:hover {
      filter: brightness(1.2);
    }

    /* General navbar/footer layout colors */
    .navbar,
    footer {
      background-color: black;
    }

    .navbar-brand,
    .nav-link,
    footer {
      color: white;
    }

    /* Responsive navbar behavior for smaller screens */
    @media (max-width: 991px) {
      .navbar-nav {
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
      }
      .navbar-nav .nav-item {
        padding: 8px 0;
        width: 100%;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      }
      .navbar-collapse {
        background-color: rgb(34, 63, 36);
        padding: 10px;
        border-radius: 0 0 10px 10px;
      }
    }
    /* Desktop-only adjustment for right navbar button group */
    @media (min-width: 992px) {
      .nav-btn-group {
        margin-left: auto;
        margin-right: 10px;
      }

      .nav-btn-group .btn {
        font-size: 14px;
        padding: 6px 14px;
        border-radius: 6px;
      }

      .nav-btn-group .btn-outline-light {
        border: 1px solid white;
        color: white;
      }

      .nav-btn-group .btn-outline-light:hover {
        background-color: white;
        color: black;
      }
    }

  </style>
</head>
<body>

  <!-- Display flash messages from the session -->
  <?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success text-center">
      <?= session()->getFlashdata('message') ?>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger text-center">
      <?= session()->getFlashdata('error') ?>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success text-center">
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif; ?>

  <!-- This is the main top navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <!-- Brand/logo section -->
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="/images/medsIcon.png" alt="Logo" width="30" height="30" class="me-2">
        Mahi's Pharmacy
      </a>

      <!-- Hamburger menu icon for smaller screens -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar items (collapsible) -->
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav flex-wrap">
          <li class="nav-item"><a class="nav-link" href="http://localhost/pain">General Meds</a></li>
          <li class="nav-item"><a class="nav-link" href="http://localhost/personalcare">Personal Care</a></li>
          <li class="nav-item"><a class="nav-link" href="http://localhost/disinfectingcream">Disinfecting Creams</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Hair/Skin Care</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Sexual Wellbeing</a></li>
          </ul>

        <!-- Theme toggle and sign-in buttons (aligned right) -->
        <div class="ms-auto d-flex gap-2 align-items-center nav-btn-group">
        <button onclick="toggleTheme()" class="btn btn-sm btn-outline-light fw-semibold text-nowrap" id="themeToggle">Dark Theme</button>
        <a href="http://localhost/login" class="btn btn-sm btn-outline-light fw-semibold text-nowrap">Sign In</a>
      </div>

      </div>
    </div>
  </nav>

  <!-- Welcome message -->
  <div class="container mt-4 text-center">
    <h1>Welcome to Mahi's Pharmacy</h1>
    <p>Your trusted online pharmacy for medicines and healthcare products.</p>
  </div>

  <!-- Product categories grid with images -->
  <div class="container mt-4">
    <div class="row row-cols-2 row-cols-md-4 g-3">
      <?php 
        $products = [
          ["General Meds", "general-meds.jpg"],
          ["Personal Care/Sanitary", "sanitary.jpg"],
          ["Disinfecting Creams", "disinfecting-creams.jpg"],
          ["First Aid Kit", "first-aid.png"],
          ["Fragrance", "fragrance.jpg"],
          ["COVID-19 Essentials", "covid-19.jpg"],
          ["Baby/Child Care", "babycare.jpg"],
          ["Sexual Wellbeing", "sexualwellbeing.jpg"],
          ["Essential Vitamins", "vitamins.jpg"],
          ["Skin Care", "skincare.jpg"],
          ["Contraceptive Pills", "pills.jpg"],
          ["Medical Equipment", "medical.avif"],
          ["Oral Care", "oral-care.png"],
          ["Eye/Ear Care", "eye.jpg"],
          ["Hair Care", "haircare.jpg"],
          ["Quit Smoking Aids", "smoking.png"],
          ["Mental Well-being & Sleep Aids", "sleep.jpg"],
          ["Pet Medicines & Supplies", "pett.jpg"],
          ["Herbal & Homeopathic Remedies", "herbal.jpg"]
        ];

        foreach ($products as $product) {
          $link = "#";
          if ($product[0] === "General Meds") {
            $link = "http://localhost/pain";
          }
          echo '
            <div class="col text-center">
              <a href="' . $link . '" style="text-decoration: none; color: inherit;">
                <img src="/Images/' . $product[1] . '" class="product-img">
                <p>' . $product[0] . '</p>
              </a>
            </div>';
        }
      ?>
    </div>
  </div>

  <!-- Floating action button for quick navigation (Search & Map) -->
  <div id="fabContainer" style="position: fixed; bottom: 20px; right: 20px; z-index: 1001;">
    <div id="fabActions" style="display: none; flex-direction: column; align-items: flex-end; gap: 10px; margin-bottom: 10px;">
      <div onclick="window.location.href='http://localhost/map'" style="background-color: #0051a2; color: white; padding: 10px 15px; border-radius: 20px; cursor: pointer; box-shadow: 0 0 8px rgb(14, 74, 36); font-weight: bold;">
        Nearby Pharmacies
      </div>
      <div onclick="window.location.href='http://localhost/medicine'" style="background-color: #007d44; color: white; padding: 10px 15px; border-radius: 20px; cursor: pointer; box-shadow: 0 0 8px rgb(15, 53, 18); font-weight: bold;">
        Search Meds
      </div>
    </div>
    <div id="mainFab" onclick="toggleFab()" style="background-color: #333; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 28px; box-shadow: 0 4px 12px rgb(44, 110, 65); cursor: pointer;">
      +
    </div>
  </div>

  <!-- Theme toggle and FAB JavaScript -->
  <script>
    function toggleTheme() {
      const body = document.body;
      const themeToggle = document.getElementById("themeToggle");
      body.classList.toggle("dark-mode");
      themeToggle.textContent = body.classList.contains("dark-mode") ? "Light Theme" : "Dark Theme";
      localStorage.setItem("theme", body.classList.contains("dark-mode") ? "dark" : "light");
    }

    function toggleFab() {
      const actions = document.getElementById('fabActions');
      actions.style.display = actions.style.display === 'flex' ? 'none' : 'flex';
    }

    window.onload = function() {
      if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
        document.getElementById("themeToggle").textContent = "Light Theme";
      }
    };
  </script>

  <!-- Bootstrap required JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

  <!-- Footer section with info, links, and contact -->
  <footer style="background-color: rgb(0, 0, 0); color: white; padding: 30px 0; font-size: 14px;">
    <div style="display: flex; justify-content: space-between; flex-wrap: wrap; text-align: left;">
      <div style="flex: 1; margin-right: 20px; padding: 10px;">
        <h3>About Us</h3>
        <p>At Mahi’s Pharmacy, we are dedicated to providing high-quality pharmaceutical products with a focus on health and well-being. Our goal is to make healthcare more accessible and affordable for everyone.</p>
      </div>
      <div style="flex: 1; margin-right: 20px; padding: 10px;">
        <h3>Quick Links</h3>
        <ul style="list-style-type: none; padding-left: 0;">
          <li><a href="#" style="color: white; text-decoration: none;">Home</a></li>
          <li><a href="#shop" style="color: white; text-decoration: none;">Shop</a></li>
          <li><a href="#contact" style="color: white; text-decoration: none;">Contact</a></li>
          <li><a href="#faq" style="color: white; text-decoration: none;">FAQ</a></li>
          <li><a href="#return-policy" style="color: white; text-decoration: none;">Return Policy</a></li>
        </ul>
      </div>
      <div style="flex: 1; margin-right: 20px; padding: 10px;">
        <h3>Customer Support</h3>
        <ul style="list-style-type: none; padding-left: 0;">
          <li><a href="mailto:support@mahispharmacy.com" style="color: white; text-decoration: none;">Email: support@mahispharmacy.com</a></li>
          <li><a href="tel:+1234567890" style="color: white; text-decoration: none;">Phone: +123 456 7890</a></li>
          <li><a href="#contact" style="color: white; text-decoration: none;">Contact Us</a></li>
        </ul>
      </div>
      <div style="flex: 1; margin-right: 20px; padding: 10px;">
        <h3>Follow Us</h3>
        <ul style="list-style-type: none; padding-left: 0;">
          <li><a href="#" style="color: white; text-decoration: none;">Facebook</a></li>
          <li><a href="#" style="color: white; text-decoration: none;">Twitter</a></li>
          <li><a href="#" style="color: white; text-decoration: none;">Instagram</a></li>
        </ul>
      </div>
      <div style="flex: 1; padding: 10px;">
        <h3>Payment Methods</h3>
        <p>We accept various payment methods including:</p>
        <ul style="list-style-type: none; padding-left: 0;">
          <li><img src="/images/visa-icon.webp" alt="Visa" style="width: 30px; margin-right: 10px;"> Visa</li>
          <li><img src="/images/mastercard.png" alt="Mastercard" style="width: 30px; margin-right: 10px;"> Mastercard</li>
          <li><img src="/images/paypal.png" alt="PayPal" style="width: 30px;"> PayPal</li>
        </ul>
      </div>
    </div>

    <!-- Newsletter -->
    <div style="text-align: center; margin-top: 20px;">
      <h3>Subscribe to Our Newsletter</h3>
      <form action="#" method="POST" style="max-width: 400px; margin: 0 auto;">
        <input type="email" name="email" placeholder="Enter your email" required style="padding: 10px; width: 70%; border: none; border-radius: 5px;">
        <button type="submit" style="padding: 10px 15px; border: none; background-color: #4CAF50; color: white; border-radius: 5px;">Subscribe</button>
      </form>
    </div>

    <div style="text-align: center; margin-top: 20px; font-size: 12px;">
      <p>&copy; 2025 Mahi’s Pharmacy. All Rights Reserved.</p>
    </div>
  </footer>
</body>
</html>
