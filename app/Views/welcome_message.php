<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mahi's Pharmacy</title>

  <!-- Bootstrap & FontAwesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    body { background-color: #e4f8dc; }
    .navbar, footer { background-color: black; color: white; }
    .navbar a, .navbar-brand { color: white; }
    .product-img {
      width: 100px;
      height: 100px;
      transition: transform 0.5s ease;
    }
    .product-img:hover { transform: translateY(-10px); }
    .dark-mode { background-color: rgb(21, 20, 20); color: white; }
    .dark-mode footer, .dark-mode .navbar { background-color: black !important; }
    .dark-mode .product-img:hover { filter: brightness(1.2); }

    @media (max-width: 991px) {
      .navbar-nav { flex-direction: column; align-items: flex-start; width: 100%; }
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

    @media (min-width: 992px) {
      .nav-btn-group { margin-left: auto; margin-right: 10px; }
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

    /* Footer newsletter input and button responsiveness */
    .newsletter-form input[type="email"] {
      max-width: 400px;
      width: 100%;
    }
    .newsletter-form .btn {
      width: 100%;
      max-width: 200px;
    }

    @media (min-width: 576px) {
      .newsletter-form {
        flex-direction: row !important;
        align-items: center;
      }
      .newsletter-form input[type="email"],
      .newsletter-form .btn {
        width: auto;
      }
    }

    /* Adjust bottom spacing so FAB doesn't overlap */
    footer {
      padding-bottom: 80px;
    }
  </style>
</head>
<body>

  <!-- Flash Messages -->
  <?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success text-center"><?= session()->getFlashdata('message') ?></div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger text-center"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success text-center"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="/images/medsIcon.png" alt="Logo" width="30" height="30" class="me-2" />
        Mahi's Pharmacy
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav flex-wrap">
          <li class="nav-item"><a class="nav-link" href="http://localhost/pain">General Meds</a></li>
          <li class="nav-item"><a class="nav-link" href="http://localhost/personalcare">Personal Care</a></li>
          <li class="nav-item"><a class="nav-link" href="http://localhost/disinfectingcream">Disinfecting Creams</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Hair/Skin Care</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Sexual Wellbeing</a></li>
        </ul>
        <div class="ms-auto d-flex gap-2 align-items-center nav-btn-group">
          <button onclick="toggleTheme()" class="btn btn-sm btn-outline-light fw-semibold text-nowrap" id="themeToggle">Dark Theme</button>
          <a href="http://localhost/login" class="btn btn-sm btn-outline-light fw-semibold text-nowrap">Sign In</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Welcome Message -->
  <div class="container mt-4 text-center">
    <h1>Welcome to Mahi's Pharmacy</h1>
    <p>Your trusted online pharmacy for medicines and healthcare products.</p>
  </div>

  <!-- Product Categories -->
  <div class="container mt-4">
    <div class="row row-cols-2 row-cols-md-4 g-3">
      <?php 
        $products = [
          ["General Meds", "general-meds.jpg"], ["Personal Care/Sanitary", "sanitary.jpg"],
          ["Disinfecting Creams", "disinfecting-creams.jpg"], ["First Aid Kit", "first-aid.png"],
          ["Fragrance", "fragrance.jpg"], ["COVID-19 Essentials", "covid-19.jpg"],
          ["Baby/Child Care", "babycare.jpg"], ["Sexual Wellbeing", "sexualwellbeing.jpg"],
          ["Essential Vitamins", "vitamins.jpg"], ["Skin Care", "skincare.jpg"],
          ["Contraceptive Pills", "pills.jpg"], ["Medical Equipment", "medical.avif"],
          ["Oral Care", "oral-care.png"], ["Eye/Ear Care", "eye.jpg"],
          ["Hair Care", "haircare.jpg"], ["Quit Smoking Aids", "smoking.png"],
          ["Mental Well-being & Sleep Aids", "sleep.jpg"], ["Pet Medicines & Supplies", "pett.jpg"],
          ["Herbal & Homeopathic Remedies", "herbal.jpg"]
        ];
        foreach ($products as $product) {
          $link = ($product[0] === "General Meds") ? "http://localhost/pain" : "#";
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

  <!-- FAB -->
  <div id="fabContainer" style="position: fixed; bottom: 20px; right: 20px; z-index: 1001;">
    <div id="fabActions" style="display: none; flex-direction: column; align-items: flex-end; gap: 10px; margin-bottom: 10px;">
      <div onclick="window.location.href='http://localhost/map'" class="bg-primary text-white px-3 py-2 rounded-pill shadow" style="cursor: pointer;">Nearby Pharmacies</div>
      <div onclick="window.location.href='http://localhost/medicine'" class="bg-success text-white px-3 py-2 rounded-pill shadow" style="cursor: pointer;">Search Meds</div>
    </div>
    <div id="mainFab" onclick="toggleFab()" class="bg-dark text-white d-flex justify-content-center align-items-center rounded-circle shadow" style="width: 60px; height: 60px; font-size: 28px; cursor: pointer;">+</div>
  </div>

  <!-- Footer -->
  <footer class="mt-5 pt-4 pb-2 text-white">
    <div class="container">
      <div class="row gy-4">
        <div class="col-md-4">
          <h5>About Us</h5>
          <p>At Mahi’s Pharmacy, we provide high-quality pharmaceutical products with a focus on health and well-being. Our goal is to make healthcare more accessible and affordable.</p>
        </div>
        <div class="col-6 col-md-2">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="http://localhost/" class="text-white text-decoration-none">Home</a></li>
            <li><a href="http://localhost/pain" class="text-white text-decoration-none">Shop</a></li>
            <li><a href="#contact" class="text-white text-decoration-none">Contact</a></li>
            <li><a href="#faq" class="text-white text-decoration-none">FAQ</a></li>
            <li><a href="#return-policy" class="text-white text-decoration-none">Return Policy</a></li>
          </ul>
        </div>
        <div class="col-6 col-md-2">
          <h5>Customer Support</h5>
          <ul class="list-unstyled">
            <li><a href="mailto:support@mahispharmacy.com" class="text-white text-decoration-none">Email</a></li>
            <li><a href="tel:+1234567890" class="text-white text-decoration-none">+123 456 7890</a></li>
            <li><a href="#contact" class="text-white text-decoration-none">Contact Us</a></li>
          </ul>
        </div>
        <div class="col-6 col-md-2">
          <h5>Follow Us</h5>
          <ul class="list-unstyled">
            <li><a href="https://www.facebook.com/" class="text-white text-decoration-none">Facebook</a></li>
            <li><a href="https://x.com/" class="text-white text-decoration-none">Twitter</a></li>
            <li><a href="https://www.instagram.com/" class="text-white text-decoration-none">Instagram</a></li>
          </ul>
        </div>
        <div class="col-md-2">
          <h5>Payment Methods</h5>
          <p><img src="/images/visa-icon.webp" width="30" /> Visa</p>
          <p><img src="/images/mastercard.png" width="30" /> Mastercard</p>
          <p><img src="/images/paypal.png" width="30" /> PayPal</p>
        </div>
      </div>

      <div class="text-center mt-4">
        <h5>Subscribe to Our Newsletter</h5>
        <form class="d-flex flex-column newsletter-form flex-sm-row justify-content-center gap-2 mt-2" action="#" method="POST">
          <input type="email" name="email" placeholder="Enter your email" class="form-control" required>
          <button type="submit" class="btn btn-success">Subscribe</button>
        </form>
      </div>

      <div class="text-center mt-4" style="font-size: 12px;">
        <p>&copy; 2025 Mahi’s Pharmacy. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

  <!-- JS -->
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
    window.onload = function () {
      if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
        document.getElementById("themeToggle").textContent = "Light Theme";
      }
    };
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
