<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Pharmacy</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        body { background-color:rgb(181, 221, 182); }
        .navbar a, .navbar-brand { color: white; }
        .category-img { width: 50px; height: 50px;  }
        .product-img { width: 100px; height: 100px; }

        /* Dark theme */
        .dark-mode { background-color:rgb(21, 20, 20); color: white; }
        .dark-mode footer { background-color:rgb(0, 0, 0) !important; }
        .dark-mode .navbar { background-color:rgb(0, 0, 0) !important; }

        .product-img { transition: transform 5s ease; }
        .product-img:hover { transform: translateY(-10px); }

        @media (max-width: 991px) {
            .navbar-nav {
                flex-direction: column;
                align-items: flex-start;
                width: 100%;
            }
            .navbar-nav .nav-item {
                padding: 8px 0;
                border-bottom: 1px solid rgba(255, 255, 255, 0.2);
                width: 100%;
            }
            .navbar-nav .nav-link {
                padding-left: 1rem;
                color: #fff;
            }
            .navbar-nav .nav-link:hover {
                background-color: rgba(255, 255, 255, 0.1);
            }
            .navbar-collapse {
                background-color: rgb(34, 63, 36);
                padding: 10px;
                border-radius: 0 0 10px 10px;
            }
        }
    </style>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJ6tB9xRmkahKLpRyjSNokeBfYtYiK3_M&libraries=places" async defer></script>
</head>
<body>
    <!-- Unified Responsive Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(18, 42, 10);">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/images/medsIcon.png" alt="" width="30" height="30" class="me-2">
                Web Pharmacy
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
                <ul class="navbar-nav flex-wrap">
                    <li class="nav-item"><a class="nav-link" href="http://localhost/generalmeds">General Meds</a></li>
                    <li class="nav-item"><a class="nav-link" href="http://localhost/personalcare">Personal Care</a></li>
                    <li class="nav-item"><a class="nav-link" href="http://localhost/disinfectingcream">Disinfecting Creams</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Hair/Skin Care</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sexual Wellbeing</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Essential Vitamins</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Quit Smoking</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Fragrance</a></li>
                </ul>

                <div class="d-flex gap-2 mt-3 mt-lg-0">
                    <button onclick="toggleTheme()" class="btn btn-sm btn-light" id="themeToggle">Dark Theme</button>
                    <a href="http://localhost/login" class="btn btn-sm btn-light">Sign In</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


    
    <!-- Welcome Section -->
    <div class="container mt-4 text-center">
        <h1>Welcome to Web Pharmacy</h1>
        <p>Your trusted online pharmacy for medicines and healthcare products.</p>
    </div>
        
    <!-- Pharmacy Product Sections -->
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
            echo '
            <div class="col text-center">
                <img src="/Images/' . $product[1] . '" class="product-img">
                <p>' . $product[0] . '</p>
            </div>';
        }
        ?>
        </div>
    </div>
        <button id="showMapBtn">Button</button>
        <!-- Hover effect with smooth transition -->
<script>
    document.querySelectorAll('.product-img').forEach(item => {
        item.addEventListener('mouseenter', (event) => {
            item.style.transform = 'translateY(-10px)';  // Move the image up
        });

        item.addEventListener('mouseleave', (event) => {
            item.style.transform = 'translateY(0)';  // Return to the original position
        });
    });
</script>

        <script>
            document.getElementById("showMapBtn").addEventListener("click", function() {
                window.location.href = "http://localhost/map";
            });
        </script>

    <!-- JavaScript for Dark Mode Toggle -->
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

    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    



        <!--  Floating Search Toggle Button -->
        <div id="medSearchToggle" onclick="toggleMedSearch()" style="
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #007d44;
        color: white;
        padding: 12px 16px;
        border-radius: 50px;
        cursor: pointer;
        box-shadow: 0 0 8px rgba(0,0,0,0.2);
        z-index: 1000;
        font-weight: bold;
        ">🔍 Search Meds Information</div>

        <!--  Floating Search Box -->
        <div id="medSearchBox" style="
        position: fixed;
        bottom: 80px;
        right: 20px;
        width: 320px;
        background-color: #e6f4ea;
        border: 2px solid #007d44;
        border-radius: 12px;
        padding: 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        display: none;
        z-index: 1000;
        font-family: Arial, sans-serif;
        ">
        <div style="text-align:right;">
            <button onclick="toggleMedSearch()" style="border:none; background:none; font-size:18px; color:#007d44; cursor:pointer;">❌</button>
        </div>
        <h4 style="color:#007d44;">Search Medicine</h4>
        <input id="medInput" type="text" placeholder="Type a medicine name..." style="width:100%; padding:8px; margin-bottom:10px; border-radius:5px; border:1px solid #ccc;">
        <button onclick="submitSearch()" style="width:100%; padding:8px; background-color:#007d44; color:white; border:none; border-radius:5px;">Search</button>
        
        <div id="suggestions" style="margin-top:10px; font-size:14px;"></div>
        <div id="recentBox" style="margin-top:10px;">
            <strong style="color:#007d44;">Recent Searches:</strong>
            <ul id="recentSearches" style="padding-left:18px; margin-top:5px;"></ul>
        </div>
        </div>
        <script>
            function toggleMedSearch() {
                const box = document.getElementById('medSearchBox');
                box.style.display = box.style.display === 'none' ? 'block' : 'none';
                loadRecentSearches();
            }

            function submitSearch() {
                const input = document.getElementById('medInput');
                const term = input.value.trim();
                if (term) {
                saveRecentSearch(term);
                window.location.href = `<?= base_url('medicine/search') ?>?medicine_name=${encodeURIComponent(term)}`;
                }
            }

            //  AJAX live suggestion from OpenFDA
            document.getElementById('medInput').addEventListener('keyup', function () {
                const q = this.value;
                if (q.length < 3) {
                document.getElementById('suggestions').innerHTML = '';
                return;
                }

                fetch(`https://api.fda.gov/drug/label.json?limit=5&search=openfda.generic_name:${encodeURIComponent(q)}`)
                .then(res => res.json())
                .then(data => {
                    const output = (data.results || []).map(item =>
                    `<div style="padding:5px 0; border-bottom:1px dashed #ccc;">${item.openfda.generic_name?.[0] || 'Unknown'}<br><small>${item.purpose?.[0] || 'No info'}</small></div>`
                    ).join('');
                    document.getElementById('suggestions').innerHTML = output || '<em>No matches</em>';
                })
                .catch(() => {
                    document.getElementById('suggestions').innerHTML = '<em>No suggestions</em>';
                });
            });

            //  Store recent searches
            function saveRecentSearch(term) {
                let recent = JSON.parse(localStorage.getItem('medRecentSearches') || '[]');
                if (!recent.includes(term)) {
                recent.unshift(term);
                if (recent.length > 5) recent.pop();
                localStorage.setItem('medRecentSearches', JSON.stringify(recent));
                }
            }

            //  Load recent searches
            function loadRecentSearches() {
                const ul = document.getElementById('recentSearches');
                ul.innerHTML = '';
                const recent = JSON.parse(localStorage.getItem('medRecentSearches') || '[]');
                recent.forEach(item => {
                const li = document.createElement('li');
                li.textContent = item;
                li.style.cursor = 'pointer';
                li.onclick = () => {
                    document.getElementById('medInput').value = item;
                };
                ul.appendChild(li);
                });
            }
        </script>




   

</body>
</html>