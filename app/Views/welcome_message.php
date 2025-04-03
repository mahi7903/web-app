<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahi's Pharmacy</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body { background-color:rgb(181, 221, 182); } /* Light green */
        .navbar { background-color:rgb(29, 112, 34); } /* Dark green */
        .navbar a, .navbar-brand { color: white; }
        .category-img { width: 50px; height: 50px;  }
        .product-img { width: 100px; height: 100px; }
        .navbar-collapse { 
            display: flex;
            justify-content: flex-end;
        }
        .navbar-nav {
            flex-direction: row;
        }
        .nav-item {
            padding-left: 10px;
            padding-right: 10px;
        }
        .nav-item.dropdown {
            position: relative;
        }
        .dropdown-menu {
            position: absolute;
            right: 0;
            left: auto;
        }
        /* Footer styling */
        footer {
            background-color::rgb(29, 112, 34);
            color: white;
            padding: 20px;
        }
       /* Dark theme */
       .dark-mode { 
            background-color:rgb(21, 20, 20); color: white;}
        .dark-mode footer { 
            background-color:rgb(0, 0, 0); !important;}
        .dark-mode .navbar {
            background-color:rgb(0, 0, 0) !important;
        }
        
    </style>
</head>
<body>

    <!-- Centered Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container d-flex justify-content-left">
            <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="/images/medsIcon.png" alt="" width="30" height="30" padding="40px">
                <span class="fs-4 text-white">Mahi's Pharmacy</span>
            </a>
            <button onclick="toggleTheme()" class="btn btn-sm btn-light" id="themeToggle">Dark Theme</button>
           
        </div>
        <div>
        <a href="http://localhost/login" style="text-decoration: none;">
            
        <button onclick="toggleTheme()" class="btn btn-sm btn-light" id="themeToggle" >Sign In</button></a>
        </div>

    </nav>

    <!-- Categories Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#categoryNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="categoryNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="http://localhost/generalmeds">General Meds</a></li>
                    <li class="nav-item"><a class="nav-link" href="http://localhost/personalcare">Personal Care/ Sanitary</a></li>
                    <li class="nav-item"><a class="nav-link" href="http://localhost/disinfectingcream">Disinfecting Creams</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Hair/ Skin Care</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sexual Wellbeing</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Essential vitamins</a></li>

                    <!-- More Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-bs-toggle="dropdown">
                            More
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">First Aid Kit</a></li>
                            <li><a class="dropdown-item" href="#">COVID-19 Essentials</a></li>
                            <li><a class="dropdown-item" href="#">Baby/Child Care</a></li>
                            <li><a class="dropdown-item" href="#">Essential Vitamins</a></li>
                            <li><a class="dropdown-item" href="#">Contraceptive Pills</a></li>
                            <li><a class="dropdown-item" href="#">Medical Equipment & Accessories</a></li>
                            <li><a class="dropdown-item" href="#">Oral Care</a></li>
                            <li><a class="dropdown-item" href="#">Eye/Ear Care</a></li>
                            <li><a class="dropdown-item" href="#">Quit Smoking Aids</a></li>
                            <li><a class="dropdown-item" href="#">Mental Well-being & Sleep Aids</a></li>
                            <li><a class="dropdown-item" href="#">Pet Medicines & Supplies</a></li>
                            <li><a class="dropdown-item" href="#">Herbal & Homeopathic Remedies</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Welcome Section -->
    <div class="container mt-4 text-center">
        <h1>Welcome to Mahi's Pharmacy</h1>
        <p>Your trusted online pharmacy for medicines and healthcare products.</p>
    </div>
        
    <!-- Pharmacy Product Sections -->
<div class="container mt-4">
    
        <div class="row row-cols-2 row-cols-md-4 g-3", >
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
        echo '
        <div class="col text-center">
            <img src="/Images/' . $product[1] . '" class="product-img">
            <p>' . $product[0] . '</p>
        </div>';
    }
    ?>
</div>
</div><!-- JavaScript for Dark Mode Toggle -->
    <script>
        function toggleTheme() {
            const body = document.body;
            const themeToggle = document.getElementById("themeToggle");

            body.classList.toggle("dark-mode");

            if (body.classList.contains("dark-mode")) {
                themeToggle.textContent = "Light Theme";
                localStorage.setItem("theme", "dark");
            } else {
                themeToggle.textContent = "Dark Theme";
                localStorage.setItem("theme", "light");
            }
        }

        window.onload = function() {
            if (localStorage.getItem("theme") === "dark") {
                document.body.classList.add("dark-mode");
                document.getElementById("themeToggle").textContent = "Light Theme";
            }
        };
    </script>



    <footer style="background-color:rgb(0, 0, 0); color: white; padding: 30px 0; font-size: 14px;">
    <div style="display: flex; justify-content: space-between; flex-wrap: wrap; text-align: left;">
        <!-- About Us Section -->
        <div style="flex: 1; margin-right: 20px; padding: 10px;">
            <h3>About Us</h3>
            <p>At Mahi’s Pharmacy, we are dedicated to providing high-quality pharmaceutical products with a focus on health and well-being. Our goal is to make healthcare more accessible and affordable for everyone.</p>
        </div>

        <!-- Quick Links Section -->
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

        <!-- Customer Support Section -->
        <div style="flex: 1; margin-right: 20px; padding: 10px;">
            <h3>Customer Support</h3>
            <ul style="list-style-type: none; padding-left: 0;">
                <li><a href="mailto:support@mahispharmacy.com" style="color: white; text-decoration: none;">Email: support@mahispharmacy.com</a></li>
                <li><a href="tel:+1234567890" style="color: white; text-decoration: none;">Phone: +123 456 7890</a></li>
                <li><a href="#contact" style="color: white; text-decoration: none;">Contact Us</a></li>
            </ul>
        </div>

        <!-- Follow Us Section -->
        <div style="flex: 1; margin-right: 20px; padding: 10px;">
            <h3>Follow Us</h3>
            <ul style="list-style-type: none; padding-left: 0;">
                <li><a href="#" style="color: white; text-decoration: none;">Facebook</a></li>
                <li><a href="#" style="color: white; text-decoration: none;">Twitter</a></li>
                <li><a href="#" style="color: white; text-decoration: none;">Instagram</a></li>
            </ul>
        </div>

        <!-- Payment Methods Section -->
        <div style="flex: 1; padding: 10px;">
            <h3>Payment Methods</h3>
            <p>We accept various payment methods including:</p>
            <ul style="list-style-type: none; padding-left: 0;">
                <li><img src="/images/visa-icon.webp" alt="Visa" style="width: 30px; margin-right: 10px;"><p> Visa </p></li>
                <li><img src="/images/mastercard.png" alt="Mastercard" style="width: 30px; margin-right: 10px;"><p> Mastercard </p></li>
                <li><img src="/images/paypal.png" alt="PayPal" style="width: 30px;"><p> Paypal </p></li>
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

    <div style="text-align: center; margin-top: 20px; font-size: 12px;">
        <p>&copy; 2025 Mahi’s Pharmacy. All Rights Reserved.</p>
    </div>
</footer>
<script>
        function toggleTheme() {
            document.body.classList.toggle('dark-mode');
        }
    </script>


    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
