<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head: Setting up metadata and linking Bootstrap for responsive design -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahi's Pharmacy</title>

    <!-- Linking Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        /* Page background and styling for navbar and images */
        body { background-color: #e8f5e9; } /* Light green background */
        .navbar { background-color: #2e7d32; } /* Dark green navbar */
        .navbar a, .navbar-brand { color: white; }
        .category-img { width: 50px; height: 50px;  }
        .product-img { width: 100px; height: 100px; }
    </style>
</head>
<body>

    <!-- This is the main navbar centered with the site logo and name -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container d-flex justify-content-center">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/assets/images/medsIcon.png" alt="" width="30" height="30">
                <span class="fs-4 text-white ms-2">Mahi's Pharmacy</span>
            </a>
        </div>
    </nav>

    <!-- Welcome Section -->
    <div class="container mt-4 text-center">
        <h1>Personal Care and Sanitary</h1>
    </div>

    <!-- Product Buttons Section -->
    <div class="container mt-5 mb-5">
        <p class="text-center text-muted mb-4">Explore our range of personal care and sanitary products for daily hygiene and well-being.</p>

        <!-- Button Grid -->
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            <!-- Each button redirects to Google search for that product -->
            <div class="col text-center"><a href="https://www.google.com/search?q=buy+sanitary+pads" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Sanitary Pads</a></div>
            <div class="col text-center"><a href="https://www.google.com/search?q=buy+tampons" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Tampons</a></div>
            <div class="col text-center"><a href="https://www.google.com/search?q=buy+menstrual+cup" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Menstrual Cup</a></div>
            <div class="col text-center"><a href="https://www.google.com/search?q=buy+panty+liners" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Panty Liners</a></div>
            <div class="col text-center"><a href="https://www.google.com/search?q=buy+razor+for+women" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Razor</a></div>
            <div class="col text-center"><a href="https://www.google.com/search?q=buy+wax+strips" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Wax Strips</a></div>
            <div class="col text-center"><a href="https://www.google.com/search?q=buy+feminine+wash" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Feminine Wash</a></div>
            <div class="col text-center"><a href="https://www.google.com/search?q=buy+intimate+wipes" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Intimate Wipes</a></div>
            <div class="col text-center"><a href="https://www.google.com/search?q=buy+breast+pads" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Breast Pads</a></div>
            <div class="col text-center"><a href="https://www.google.com/search?q=buy+peri+bottle" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Peri Bottle</a></div>
            <div class="col text-center"><a href="https://www.google.com/search?q=buy+disposable+underwear" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Disposable Underwear</a></div>
            <div class="col text-center"><a href="https://www.google.com/search?q=buy+period+heat+patches" target="_blank" class="btn btn-success w-100 py-3 fw-bold">Period Heat Patches</a></div>
        </div>
    </div>

    <!-- Footer: Includes About, Quick Links, Support, Socials, Payment Methods and Newsletter -->
    <footer style="background-color: #2f2f2f; color: white; padding: 30px 0; font-size: 14px;">
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
                    <li><img src="/assets/images/visa-icon.webp" alt="Visa" style="width: 30px; margin-right: 10px;"></li>
                    <li><img src="path/to/mastercard-icon.png" alt="Mastercard" style="width: 30px; margin-right: 10px;"></li>
                    <li><img src="path/to/paypal-icon.png" alt="PayPal" style="width: 30px;"></li>
                </ul>
            </div>
        </div>

        <!-- Newsletter Section -->
        <div style="text-align: center; margin-top: 20px;">
            <h3>Subscribe to Our Newsletter</h3>
            <form action="#" method="POST" style="max-width: 400px; margin: 0 auto;">
                <input type="email" name="email" placeholder="Enter your email" required
                    style="padding: 10px; width: 70%; border: none; border-radius: 5px;">
                <button type="submit" style="padding: 10px 15px; border: none; background-color: #4CAF50; color: white; border-radius: 5px;">Subscribe</button>
            </form>
        </div>

        <!-- Footer bottom text -->
        <div style="text-align: center; margin-top: 20px; font-size: 12px;">
            <p>&copy; 2025 Mahi’s Pharmacy. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
