<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mahi's Pharmacy</title>

  <!-- bootstrap for layout and mobile responsiveness -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <style>
    /* light green background for the page */
    body { background-color: #e8f5e9; }

    /* dark green navbar and white text */
    .navbar { background-color: #2e7d32; }
    .navbar a, .navbar-brand { color: white; }

    /* fixed sizes for category and product images */
    .category-img { width: 50px; height: 50px; }
    .product-img { width: 100px; height: 100px; }
  </style>
</head>
<body>

  <!-- top navigation bar with pharmacy logo and brand name -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container d-flex justify-content-center">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="/assets/images/medsIcon.png" alt="" width="30" height="30" padding="40px">
        <span class="fs-4 text-white">Mahi's Pharmacy</span>
      </a>
    </div>
  </nav>

  <!-- section title for the page -->
  <div class="container mt-4 text-center">
    <h1>General Meds/ Pain Killers</h1>
  </div>

  <!-- main section displaying medicine buttons -->
  <div class="container mt-5 mb-5">
    <p class="text-center text-muted mb-4">Browse our selection of disinfecting creams to keep your skin protected and healthy.</p>

    <!-- grid of medicine categories linking to external searches -->
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
      <div class="col text-center">
        <a href="https://www.google.com/search?q=buy+antiseptic+cream" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Antiseptic Cream</a>
      </div>
      <div class="col text-center">
        <a href="https://www.google.com/search?q=buy+antibacterial+cream" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Antibacterial Cream</a>
      </div>
      <div class="col text-center">
        <a href="https://www.google.com/search?q=buy+fungal+infection+cream" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Fungal Infection Cream</a>
      </div>
      <div class="col text-center">
        <a href="https://www.google.com/search?q=buy+eczema+relief+cream" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Eczema Relief Cream</a>
      </div>
      <div class="col text-center">
        <a href="https://www.google.com/search?q=buy+hydrocortisone+cream" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Hydrocortisone Cream</a>
      </div>
      <div class="col text-center">
        <a href="https://www.google.com/search?q=buy+burn+relief+cream" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Burn Relief Cream</a>
      </div>
      <div class="col text-center">
        <a href="https://www.google.com/search?q=buy+wound+healing+cream" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Wound Healing Cream</a>
      </div>
      <div class="col text-center">
        <a href="https://www.google.com/search?q=buy+skin+infection+cream" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Skin Infection Cream</a>
      </div>
      <div class="col text-center">
        <a href="https://www.google.com/search?q=buy+psoriasis+cream" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Psoriasis Cream</a>
      </div>
      <div class="col text-center">
        <a href="https://www.google.com/search?q=buy+diaper+rash+cream" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Diaper Rash Cream</a>
      </div>
      <div class="col text-center">
        <a href="https://www.google.com/search?q=buy+calamine+lotion" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Calamine Lotion</a>
      </div>
      <div class="col text-center">
        <a href="https://www.google.com/search?q=buy+scar+removal+cream" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Scar Removal Cream</a>
      </div>
    </div>
  </div>

  <!-- footer section containing about, links, support and payments -->
  <footer style="background-color: #2f2f2f; color: white; padding: 30px 0; font-size: 14px;">
    <div style="display: flex; justify-content: space-between; flex-wrap: wrap; text-align: left;">

      <!-- about the pharmacy -->
      <div style="flex: 1; margin-right: 20px; padding: 10px;">
        <h3>About Us</h3>
        <p>At Mahi’s Pharmacy, we are dedicated to providing high-quality pharmaceutical products with a focus on health and well-being. Our goal is to make healthcare more accessible and affordable for everyone.</p>
      </div>

      <!-- quick links like shop and contact -->
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

      <!-- contact info for customer support -->
      <div style="flex: 1; margin-right: 20px; padding: 10px;">
        <h3>Customer Support</h3>
        <ul style="list-style-type: none; padding-left: 0;">
          <li><a href="mailto:support@mahispharmacy.com" style="color: white; text-decoration: none;">Email: support@mahispharmacy.com</a></li>
          <li><a href="tel:+1234567890" style="color: white; text-decoration: none;">Phone: +123 456 7890</a></li>
          <li><a href="#contact" style="color: white; text-decoration: none;">Contact Us</a></li>
        </ul>
      </div>

      <!-- links to social media -->
      <div style="flex: 1; margin-right: 20px; padding: 10px;">
        <h3>Follow Us</h3>
        <ul style="list-style-type: none; padding-left: 0;">
          <li><a href="#" style="color: white; text-decoration: none;">Facebook</a></li>
          <li><a href="#" style="color: white; text-decoration: none;">Twitter</a></li>
          <li><a href="#" style="color: white; text-decoration: none;">Instagram</a></li>
        </ul>
      </div>

      <!-- accepted payment methods with small icons -->
      <div style="flex: 1; padding: 10px;">
        <h3>Payment Methods</h3>
        <p>We accept various payment methods including:</p>
        <ul style="list-style-type: none; padding-left: 0;">
          <li><img src="/assets/images/visa-icon.webp" alt="Visa" style="width: 30px; margin-right: 10px;"></li>
          <li><img src="path/to/mastercard-icon.png" alt="Mastercard" style="width: 30px; margin-right: 10px;"></li>
          <li><img src="path/to/paypal-icon.png" alt="PayPal" style="width: 30px;"></li>
        </ul>
      </div>
    </div>

    <!-- email newsletter subscription form -->
    <div style="text-align: center; margin-top: 20px;">
      <h3>Subscribe to Our Newsletter</h3>
      <form action="#" method="POST" style="max-width: 400px; margin: 0 auto;">
        <input type="email" name="email" placeholder="Enter your email" required
          style="padding: 10px; width: 70%; border: none; border-radius: 5px;">
        <button type="submit" style="padding: 10px 15px; border: none; background-color: #4CAF50; color: white; border-radius: 5px;">Subscribe</button>
      </form>
    </div>

    <!-- copyright text at the bottom -->
    <div style="text-align: center; margin-top: 20px; font-size: 12px;">
      <p>&copy; 2025 Mahi’s Pharmacy. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- bootstrap scripts for interactive components -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
