<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search Medicine | Web Pharmacy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Including Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    /* Overall styling of the page background and fonts */
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: rgb(181, 221, 182);
      color: #222;
      padding: 30px 20px;
      transition: all 0.3s ease;
    }

    /* Styling for dark mode toggle */
    .dark-mode {
      background-color: rgb(21, 20, 20);
      color: white;
    }

    /* Container that holds the form box */
    .container {
      max-width: 600px;
      margin: auto;
      padding: 30px;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }

    .dark-mode .container {
      background-color: #2a2a2a;
      color: white;
      box-shadow: 0 5px 25px rgba(255, 255, 255, 0.1);
    }

    /* Form title */
    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #007d44;
      font-size: 28px;
    }

    .dark-mode h2 {
      color: #98f8c4;
    }

    /* Wrapper for search area */
    .search-wrapper {
      position: relative;
      width: 100%;
    }

    /* Input box and button layout */
    .search-box {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      justify-content: center;
    }

    #medInput {
      flex: 1;
      padding: 12px;
      font-size: 16px;
      border-radius: 8px;
      border: 1px solid #ccc;
      min-width: 200px;
    }

    button {
      background-color: #007d44;
      color: white;
      padding: 10px 18px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
      transition: 0.3s;
    }

    button:hover {
      background-color: #005e34;
    }

    /* Live suggestion dropdown box */
    #suggestions {
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      background-color: white;
      z-index: 100;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      overflow: hidden;
      margin-top: 4px;
    }

    #suggestions div {
      padding: 10px 14px;
      border-bottom: 1px solid #eee;
      font-size: 15px;
      transition: background 0.2s ease;
    }

    #suggestions div:hover {
      background-color: #e6f4ea;
      cursor: pointer;
    }

    .dark-mode #suggestions {
      background-color: #3a3a3a;
    }

    .dark-mode #suggestions div {
      color: white;
      border-color: #555;
    }

    .dark-mode #suggestions div:hover {
      background-color: rgba(0, 255, 160, 0.08);
    }

    /* Back to home floating button */
    .back-btn {
      position: fixed;
      bottom: 20px;
      left: 20px;
      background-color: #000;
      color: #fff;
      font-size: 20px;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      text-decoration: none;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
      z-index: 1000;
      transition: all 0.3s ease;
    }

    .back-btn:hover {
      background-color: #007d44;
    }

    .dark-mode .back-btn {
      background-color: white;
      color: black;
    }

    .dark-mode .back-btn:hover {
      background-color: #98f8c4;
    }

    @media screen and (max-width: 600px) {
      body { padding: 20px 10px; }
      .container { padding: 20px; }
      h2 { font-size: 22px; }
      #medInput, button { font-size: 15px; }
      .search-box { flex-direction: column; align-items: stretch; }
      .back-btn { width: 45px; height: 45px; font-size: 18px; }
    }
      .dark-mode #searchResults {
      background-color: #2a2a2a;
      color: white;
      box-shadow: 0 4px 16px rgba(255,255,255,0.08);
    }

  </style>
</head>
<body>

  <!-- Back button to return to home -->
  <a href="http://localhost" class="back-btn" title="Back to Home">⬅️</a>

  <!-- This container holds the live medicine search interface -->
  <div class="container">
    <h2>Search Medicine (OpenFDA API)</h2>

    <!-- This is the wrapper where typing and suggestions happen -->
    <div class="search-wrapper">
      <div class="search-box">
        <input id="medInput" type="text" placeholder="Type a medicine name..." autocomplete="off" />
        <button onclick="submitSearch()">Search</button>
      </div>

      <!-- Where suggestions from API will be shown -->
      <div id="suggestions"></div>
      <!-- Compact floating search result box -->
      <div id="searchResults" style="
        margin-top: 20px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.15);
        padding: 15px;
        max-height: 300px;
        overflow-y: auto;
        display: none;
      "></div>

      <!-- Display recent search terms saved locally -->
      <div id="recentBox" style="margin-top:20px;">
        <strong style="color:#007d44;">Recent Searches:</strong>
        <ul id="recentSearches" style="padding-left:18px; margin-top:5px;"></ul>
      </div>
    </div>
  </div>

  <script>
    // Ajax function
    // This function listens to every keyup (typing) event on the input
    // and sends an API request to OpenFDA API to get live medicine suggestions
    document.getElementById('medInput').addEventListener('keyup', function () {
  const q = this.value.trim();

  // If input is too short, hide suggestions and results
  if (q.length < 3) {
    document.getElementById('suggestions').innerHTML = '';
    document.getElementById('searchResults').style.display = 'none';
    return;
  }

  // AJAX Live fetch suggestions from OpenFDA API based on user input
  fetch(`https://api.fda.gov/drug/label.json?limit=5&search=${encodeURIComponent(q)}`)
    .then(res => res.json())
    .then(data => {
      const output = (data.results || []).map(item =>
        `<div>
          <strong>${item.openfda.generic_name?.[0] || 'Unknown'}</strong><br>
          <small>${item.purpose?.[0] || 'No purpose info available'}</small>
        </div>`
      ).join('');
      //// If AJAX fails (e.g., network issue), showing fallback
      document.getElementById('suggestions').innerHTML = output || '<em>No matches found</em>';
    })
    .catch(() => {
      document.getElementById('suggestions').innerHTML = '<em>No suggestions available</em>';
    });

  // If input is 4 or more characters, also fetch and show full search results
  if (q.length >= 4) {
    fetchCompactResults(q);
  }
});


    // Saves the term in localStorage when user clicks "Search"
          function submitSearch() {
          const term = document.getElementById('medInput').value.trim();
          if (!term) return;

          saveRecentSearch(term);
          fetchCompactResults(term);
        }

        function fetchCompactResults(q) {
          const resultBox = document.getElementById('searchResults');
          resultBox.style.display = 'block';
          resultBox.innerHTML = '<em>Loading...</em>';

          const url = `https://api.fda.gov/drug/label.json?limit=10&search=openfda.generic_name:${encodeURIComponent(q)}+openfda.brand_name:${encodeURIComponent(q)}`;

          fetch(url)
            .then(res => res.json())
            .then(data => {
              const output = (data.results || []).map(item =>
                `<div style="
                    padding: 12px;
                    border-bottom: 1px solid #eee;
                    margin-bottom: 8px;
                ">
                  <strong style="font-size:16px; color:#007d44;">
                    ${item.openfda.generic_name?.[0] || item.openfda.brand_name?.[0] || 'Unknown'}
                  </strong><br>
                  <small>${item.purpose?.[0] || 'No purpose info available'}</small>
                </div>`
              ).join('');

              resultBox.innerHTML = output || '<em>No matches found</em>';
            })
            .catch(() => {
              resultBox.innerHTML = '<em>Error fetching data</em>';
            });
        }


    // This function stores the recent searched term
    function saveRecentSearch(term) {
      let recent = JSON.parse(localStorage.getItem('medRecentSearches') || '[]');
      if (!recent.includes(term)) {
        recent.unshift(term);
        if (recent.length > 5) recent.pop(); // only keep last 5
        localStorage.setItem('medRecentSearches', JSON.stringify(recent));
      }
    }

    // This loads the saved searches and shows them as clickable items
    function loadRecentSearches() {
      const ul = document.getElementById('recentSearches');
      if (!ul) return;
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

    // On page load: check if dark mode was saved, apply it, and load recent searches
    window.onload = function () {
      if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
      }
      loadRecentSearches();
    };
    
  </script>
</body>
</html>
