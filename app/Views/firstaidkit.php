<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mahi's Pharmacy</title>

  <!--  Bootstrap CSS for layout and responsiveness -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <style>
    /*  Light green background and navbar theme */
    body { background-color: #e8f5e9; }
    .navbar { background-color: #2e7d32; }
    .navbar a, .navbar-brand { color: white; }

    /*  Styling for product and category images */
    .category-img { width: 50px; height: 50px; }
    .product-img { width: 100px; height: 100px; }
  </style>
</head>
<body>

  <!--  Navigation bar with centered brand -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container d-flex justify-content-center">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="/assets/images/medsIcon.png" alt="" width="30" height="30" padding="40px">
        <span class="fs-4 text-white">Mahi's Pharmacy</span>
      </a>
    </div>
  </nav>

  <!--  Page heading -->
  <div class="container mt-4 text-center">
    <h1>First Aid Kit</h1>
  </div>

  <!--  First Aid Product Buttons (external links for shopping) -->
  <div class="container mt-5 mb-5">
    <p class="text-center text-muted mb-4">
      Explore our high-quality first aid kits to handle minor injuries and emergencies effectively.
    </p>

    <!--  Each button opens a related product search on Google -->
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
      <div class="col text-center firstaid">
        <a href="https://www.google.com/search?q=buy+basic+first+aid+kit" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Basic First Aid Kit</a>
      </div>
      <div class="col text-center firstaid">
        <a href="https://www.google.com/search?q=buy+trauma+first+aid+kit" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Trauma First Aid Kit</a>
      </div>
      <div class="col text-center firstaid">
        <a href="https://www.google.com/search?q=buy+travel+first+aid+kit" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Travel First Aid Kit</a>
      </div>
      <div class="col text-center firstaid">
        <a href="https://www.google.com/search?q=buy+burn+care+kit" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Burn Care Kit</a>
      </div>
      <div class="col text-center firstaid">
        <a href="https://www.google.com/search?q=buy+emergency+first+aid+kit" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Emergency First Aid Kit</a>
      </div>
      <div class="col text-center firstaid">
        <a href="https://www.google.com/search?q=buy+wound+care+kit" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Wound Care Kit</a>
      </div>
      <div class="col text-center firstaid">
        <a href="https://www.google.com/search?q=buy+family+first+aid+kit" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Family First Aid Kit</a>
      </div>
      <div class="col text-center firstaid">
        <a href="https://www.google.com/search?q=buy+workplace+first+aid+kit" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Workplace First Aid Kit</a>
      </div>
      <div class="col text-center firstaid">
        <a href="https://www.google.com/search?q=buy+outdoor+first+aid+kit" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Outdoor First Aid Kit</a>
      </div>
      <div class="col text-center firstaid">
        <a href="https://www.google.com/search?q=buy+pet+first+aid+kit" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Pet First Aid Kit</a>
      </div>
      <div class="col text-center firstaid">
        <a href="https://www.google.com/search?q=buy+camping+first+aid+kit" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Camping First Aid Kit</a>
      </div>
      <div class="col text-center firstaid">
        <a href="https://www.google.com/search?q=buy+car+first+aid+kit" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Car First Aid Kit</a>
      </div>
    </div>
  </div>

  <!-- Footer with sections: About, Links, Support, Social, Payment -->
  <footer style="background-color: #2f2f2f; color: white; padding: 30px 0; font-size: 14px;">
    <div style="display: flex; justify-content: space-between; flex-wrap: wrap; text-align: left;">

      <!-- About Us -->
      <div style="flex: 1; margin-right: 20px; padding: 10px;">
        <h3>About Us</h3>
        <p>At Mahi’s Pharmacy, we are dedicated to providing high-quality pharmaceutical products with a focus on health and well-being.</p>
      </div>

      <!-- Quick Links -->
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

      <!-- Customer Support -->
      <div style="flex: 1; margin-right: 20px; padding: 10px;">
        <h3>Customer Support</h3>
        <ul style="list-style-type: none; padding-left: 0;">
          <li><a href="mailto:support@mahispharmacy.com" style="color: white;">Email: support@mahispharmacy.com</a></li>
          <li><a href="tel:+1234567890" style="color: white;">Phone: +123 456 7890</a></li>
          <li><a href="#contact" style="color: white;">Contact Us</a></li>
        </ul>
      </div>

      <!-- Follow Us -->
      <div style="flex: 1; margin-right: 20px; padding: 10px;">
        <h3>Follow Us</h3>
        <ul style="list-style-type: none; padding-left: 0;">
          <li><a href="#" style="color: white;">Facebook</a></li>
          <li><a href="#" style="color: white;">Twitter</a></li>
          <li><a href="#" style="color: white;">Instagram</a></li>
        </ul>
      </div>

      <!-- Payment Methods -->
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

    <!--  Newsletter subscription section -->
    <div style="text-align: center; margin-top: 20px;">
      <h3>Subscribe to Our Newsletter</h3>
      <form action="#" method="POST" style="max-width: 400px; margin: 0 auto;">
        <input type="email" name="email" placeholder="Enter your email" required
          style="padding: 10px; width: 70%; border: none; border-radius: 5px;">
        <button type="submit" style="padding: 10px 15px; border: none; background-color: #4CAF50; color: white; border-radius: 5px;">Subscribe</button>
      </form>
    </div>

    <!--  Footer copyright -->
    <div style="text-align: center; margin-top: 20px; font-size: 12px;">
      <p>&copy; 2025 Mahi’s Pharmacy. All Rights Reserved.</p>
    </div>
  </footer>

  <!--  Bootstrap JS for responsiveness and interaction -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
