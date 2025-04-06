<?php
// I'm using the helper for text shortening (like character_limiter below)
helper('text');

// Default sort criteria setup (if not already set)
$sort_by = $sort_by ?? 'name';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search Pain Medications</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Including Bootstrap for responsive layout and UI styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Body background and font */
    body {
      background-color: #e4f8dc;
      font-family: 'Segoe UI', sans-serif;
    }

    /* Text truncation class for short previews */
    .truncate {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      max-width: 100%;
      display: block;
    }

    /* Style the medicine image preview */
    .card img {
      max-height: 130px;
      object-fit: contain;
    }

    /* Floating cart count badge */
    #cartBadge {
      position: fixed;
      top: 20px;
      right: 20px;
      background: #28a745;
      color: white;
      border-radius: 50%;
      padding: 8px 13px;
      font-size: 14px;
      z-index: 999;
    }

    /* Responsive styling for mobile */
    @media screen and (max-width: 768px) {
      h2 { font-size: 1.3rem; }
      h4 { font-size: 1.1rem; }
      .btn { font-size: 0.9rem; padding: 10px 14px; }
      .card-title { font-size: 1rem; }
      .form-control { font-size: 0.9rem; }
    }
  </style>
</head>
<body>

<!-- This is the green cart count badge that shows total added items -->
<div id="cartBadge" style="display:none;">0</div>

<!-- Main container starts -->
<div class="container mt-4">
  <!-- Search bar section -->
  <h2 class="text-center mb-4">🔍 Search All Medications</h2>

  <!-- Search form with filters for name, side effect, and purpose -->
  <form id="searchForm" method="get" action="<?= base_url('/pain/search') ?>" class="row g-2 justify-content-center mb-2">
    <div class="col-md-3 col-sm-6">
      <input type="text" name="medicine_name" id="medicineInput" class="form-control" placeholder="e.g. Paracetamol" required>
    </div>
    <div class="col-md-2 col-sm-6">
      <input type="text" name="side_effect" class="form-control" placeholder="Side Effect">
    </div>
    <div class="col-md-2 col-sm-6">
      <input type="text" name="purpose" class="form-control" placeholder="Purpose">
    </div>
    <div class="col-md-2 col-sm-6">
      <button class="btn btn-success w-100">Search</button>
    </div>
  </form>

  <!-- Displaying previous searches from localStorage -->
  <div id="historyBox" class="text-center mb-4"></div>

  <!-- Headline for default results -->
  <h4 class="text-center">💊 Top General Medicines</h4>

  <!-- Card layout for showing medicines -->
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mt-3">
    <?php foreach ($meds as $index => $med): ?>
      <div class="col">
        <div class="card h-100 p-3 shadow-sm">
          
          <!-- Medicine image (fallback image shown if empty) -->
          <img src="<?= esc($med['image_url']) ?: 'https://via.placeholder.com/150x100?text=No+Image' ?>" class="img-fluid mb-2 w-100">

          <!-- Medicine title -->
          <h5 class="card-title"><?= esc($med['name']) ?></h5>

          <!-- Short preview of purpose and side effects -->
          <p><strong>Purpose:</strong> <?= character_limiter($med['purpose'], 100) ?></p>
          <p><strong>Side Effects:</strong> <?= character_limiter($med['side_effects'], 100) ?></p>

          <!-- Button to expand additional information -->
          <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>">
            🔎 More Info
          </button>

          <!-- Collapsible area with full details -->
          <div class="collapse mt-2" id="collapse<?= $index ?>">
            <div class="card card-body">
              <strong>Purpose:</strong> <?= esc($med['purpose']) ?><br>
              <strong>Side Effects:</strong> <?= esc($med['side_effects']) ?>
            </div>
          </div>

          <!-- Add to cart button (dummy) -->
          <button class="btn btn-success btn-sm mt-3 addToCartBtn">🛒 Add to Cart</button>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Including Bootstrap JS for interactive components -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // CART FUNCTIONALITY (dummy simulation)
  let cartCount = 0;
  const badge = document.getElementById('cartBadge');

  // Loop through each 'Add to Cart' button and add click handler
  document.querySelectorAll('.addToCartBtn').forEach(btn => {
    btn.addEventListener('click', () => {
      cartCount++;
      badge.textContent = cartCount;
      badge.style.display = 'block';
      btn.textContent = '✅ Added';
      setTimeout(() => btn.textContent = '🛒 Add to Cart', 2000);
    });
  });

  // SEARCH HISTORY USING LOCALSTORAGE
  const input = document.getElementById('medicineInput');
  const form = document.getElementById('searchForm');
  const historyBox = document.getElementById('historyBox');

  // Save current search term to localStorage
  const saveSearch = (term) => {
    let history = JSON.parse(localStorage.getItem('painSearches') || '[]');
    if (!history.includes(term)) {
      history.unshift(term);
      if (history.length > 5) history.pop(); // Keep only last 5
      localStorage.setItem('painSearches', JSON.stringify(history));
    }
  };

  // Load saved search terms on page load
  const loadSearchHistory = () => {
    let history = JSON.parse(localStorage.getItem('painSearches') || '[]');
    if (history.length > 0) {
      let html = '<strong>Recent Searches:</strong> ';
      html += history.map(h => `<span class="badge bg-dark me-1" style="cursor:pointer;" onclick="fillSearch('${h}')">${h}</span>`).join('');
      historyBox.innerHTML = html;
    }
  };

  // When user clicks a history badge, fill it back into the input
  const fillSearch = (term) => {
    input.value = term;
  };

  // On search form submit, save the search
  form.addEventListener('submit', () => {
    saveSearch(input.value.trim());
  });

  // Load search history when page is ready
  window.onload = loadSearchHistory;
</script>

</body>
</html>
