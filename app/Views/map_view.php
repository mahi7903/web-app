<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search Nearby Pharmacies</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Google Maps API script loaded with Places library for autocomplete and nearby search -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCI7W6AmYsiP2CR94IVBuL3SsdDSFq7XHI&libraries=places"></script>

  <style>
    /* Styling the page for light and dark mode compatibility */
    body {
      margin: 0;
      font-family: "Segoe UI", sans-serif;
      background-color: rgb(181, 221, 182);
      color: #222;
      transition: 0.3s ease;
    }
    .dark-mode {
      background-color: rgb(21, 20, 20);
      color: white;
    }

    /* Header style at the top of the map page */
    header {
      background-color: #007d44;
      color: white;
      padding: 16px;
      text-align: center;
      font-size: 24px;
    }

    /* Search input + button wrapper styling */
    .search-container {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      gap: 10px;
      padding: 20px;
      background-color: #c8e6c9;
      position: relative;
    }

    /* Suggestions dropdown UI */
    #suggestions {
      position: absolute;
      top: 60px;
      width: 300px;
      background: white;
      z-index: 1000;
      border-radius: 6px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    #suggestions div {
      padding: 10px;
      cursor: pointer;
    }

    /* Google Map container */
    #map {
      height: 500px;
      width: 100%;
    }

    /* Recent searches section below map */
    .recent {
      text-align: center;
      padding: 20px;
    }

    /* Back button for returning to home */
    .back-btn {
      position: fixed;
      bottom: 20px;
      left: 20px;
      background: #000;
      color: white;
      width: 48px;
      height: 48px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      border-radius: 50%;
      z-index: 999;
    }
  </style>
</head>

<body>
  <!-- Back to home button on bottom-left -->
  <a href="http://localhost" class="back-btn" title="Back to Home">⬅️</a>

  <!-- Page header -->
  <header>Search Nearby Pharmacies</header>

  <!-- Search bar + button to look up pharmacies -->
  <div class="search-container">
    <input type="text" id="postcode" placeholder="Enter UK Postcode (e.g., WV1 1AA)" oninput="showSuggestions()" />
    <button onclick="searchPharmacies()">Search</button>
    <div id="suggestions"></div>
  </div>

  <!-- This is the main Google Map display -->
  <div id="map"></div>

  <!-- Recent postcode searches stored locally -->
  <div class="recent">
    <strong>Recent Searches:</strong>
    <ul id="recentList"></ul>
  </div>

  <script>
    // Variables for map instance, service, and marker array
    let map;
    let service;
    let markers = [];

    // Google’s autocomplete service (AJAX-like feature from Google Maps API)
    let autocompleteService = new google.maps.places.AutocompleteService();

    //  INITIALIZE MAP — centers map at Wolverhampton initially
    function initMap() {
      const center = { lat: 52.5862, lng: -2.1286 };
      map = new google.maps.Map(document.getElementById("map"), {
        center,
        zoom: 13,
        styles: localStorage.getItem("theme") === "dark" ? darkModeStyle : []
      });
    }

    //Ajax function AUTOCOMPLETE SUGGESTIONS: uses Google’s Autocomplete API for postcode prediction
    function showSuggestions() {
      const input = document.getElementById("postcode").value;
      const suggestionBox = document.getElementById("suggestions");

      if (!input || input.length < 2) {
        suggestionBox.innerHTML = '';
        return;
      }

      // Uses Google Autocomplete API (async request)
      autocompleteService.getPlacePredictions(
        { input, componentRestrictions: { country: 'uk' } },
        function(predictions, status) {
          suggestionBox.innerHTML = '';
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            predictions.forEach(pred => {
              const div = document.createElement('div');
              div.textContent = pred.description;
              div.onclick = () => {
                document.getElementById("postcode").value = pred.description;
                suggestionBox.innerHTML = '';
                searchPharmacies(); // Trigger main search when clicked
              };
              suggestionBox.appendChild(div);
            });
          }
        }
      );
    }

    // The MAIN PHARMACY SEARCH FUNCTION
    // This function geocodes the postcode and finds nearby pharmacies
    function searchPharmacies() {
      const input = document.getElementById("postcode").value;
      if (!input.trim()) return;
      saveSearch(input); // Save the postcode to localStorage

      const geocoder = new google.maps.Geocoder();

      // Uses Geocoder API (AJAX-like) to convert address to coordinates
      geocoder.geocode({ address: input + ", UK" }, (results, status) => {
        if (status === "OK" && results[0]) {
          const location = results[0].geometry.location;
          map.setCenter(location);
          map.setZoom(15);
          clearMarkers(); // Remove previous markers

          // Now use PlacesService to search for "pharmacy" near that location
          const request = {
            location,
            radius: 3000, // 3km radius
            keyword: "pharmacy"
          };

          // This is the NEARBY SEARCH — again AJAX-style, Google handles the data fetching in background
          service = new google.maps.places.PlacesService(map);
          service.nearbySearch(request, (results, status) => {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
              results.forEach(place => {
                const marker = new google.maps.Marker({
                  map,
                  position: place.geometry.location,
                  title: place.name
                });
                markers.push(marker);
              });
            }
          });
        } else {
          alert("Could not find the location.");
        }
      });
    }

    // Clear previous search markers from the map
    function clearMarkers() {
      markers.forEach(marker => marker.setMap(null));
      markers = [];
    }

    // Save postcode to localStorage
    function saveSearch(term) {
      let searches = JSON.parse(localStorage.getItem("recentPostcodes") || "[]");
      if (!searches.includes(term)) {
        searches.unshift(term);
        if (searches.length > 5) searches.pop();
        localStorage.setItem("recentPostcodes", JSON.stringify(searches));
      }
      loadRecent(); // Reload the display
    }

    // Load recent searches from localStorage and make them clickable
    function loadRecent() {
      const list = document.getElementById("recentList");
      const items = JSON.parse(localStorage.getItem("recentPostcodes") || "[]");
      list.innerHTML = "";
      items.forEach(postcode => {
        const li = document.createElement("li");
        li.textContent = postcode;
        li.onclick = () => {
          document.getElementById("postcode").value = postcode;
          searchPharmacies();
        };
        list.appendChild(li);
      });
    }

    // Styling used if user enables dark mode
    const darkModeStyle = [
      { elementType: "geometry", stylers: [{ color: "#1d2c4d" }] },
      { elementType: "labels.text.fill", stylers: [{ color: "#8ec3b9" }] },
      { elementType: "labels.text.stroke", stylers: [{ color: "#1a3646" }] },
      { featureType: "administrative.country", elementType: "geometry.stroke", stylers: [{ color: "#4b6878" }] },
      { featureType: "poi", elementType: "labels.text.fill", stylers: [{ color: "#74e6bd" }] },
      { featureType: "road", elementType: "geometry", stylers: [{ color: "#304a7d" }] },
      { featureType: "water", elementType: "geometry", stylers: [{ color: "#0e1626" }] }
    ];

    // On window load: initialize the map and show recent history
    window.onload = () => {
      initMap();
      loadRecent();
    };
  </script>
</body>
</html>
