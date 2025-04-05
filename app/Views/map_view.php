<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search Nearby Pharmacies</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
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
    header {
      background-color: #007d44;
      color: white;
      padding: 16px;
      text-align: center;
      font-size: 24px;
    }
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
    .dark-mode .search-container {
      background-color: #333;
    }
    input[type="text"] {
      padding: 12px;
      border-radius: 8px;
      border: 1px solid #ccc;
      width: 300px;
      font-size: 16px;
    }
    button {
      padding: 12px 20px;
      border: none;
      background-color: #007d44;
      color: white;
      border-radius: 6px;
      cursor: pointer;
    }
    button:hover {
      background-color: #005e34;
    }
    #suggestions {
      position: absolute;
      top: 60px;
      width: 300px;
      background: white;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      border-radius: 6px;
      z-index: 1000;
    }
    #suggestions div {
      padding: 10px;
      cursor: pointer;
      border-bottom: 1px solid #eee;
    }
    #suggestions div:hover {
      background: #e0f2f1;
    }
    .dark-mode #suggestions {
      background: #444;
      color: white;
    }
    .dark-mode #suggestions div:hover {
      background: #333;
    }
    #map {
      height: 500px;
      width: 100%;
    }
    .recent {
      text-align: center;
      padding: 20px;
    }
    .recent ul {
      list-style: none;
      padding-left: 0;
    }
    .recent li {
      cursor: pointer;
      margin: 4px 0;
      text-decoration: underline;
    }
    .back-btn {
      position: fixed;
      bottom: 20px;
      left: 20px;
      width: 48px;
      height: 48px;
      font-size: 20px;
      border-radius: 50%;
      background: #000;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      text-decoration: none;
      z-index: 999;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }
    .dark-mode .back-btn {
      background: white;
      color: black;
    }
    @media (max-width: 600px) {
      input[type="text"] {
        width: 100%;
      }
      header {
        font-size: 20px;
      }
    }
  </style>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCI7W6AmYsiP2CR94IVBuL3SsdDSFq7XHI&libraries=places"></script>
</head>
<body>
  <a href="http://localhost" class="back-btn" title="Back to Home">⬅️</a>
  <header>Search Nearby Pharmacies</header>

  <div class="search-container">
    <input type="text" id="postcode" placeholder="Enter UK Postcode (e.g., WV1 1AA)" oninput="showSuggestions()"/>
    <button onclick="searchPharmacies()">Search</button>
    <div id="suggestions"></div>
  </div>

  <div id="map"></div>

  <div class="recent">
    <strong>Recent Searches:</strong>
    <ul id="recentList"></ul>
  </div>

  <script>
    let map;
    let service;
    let markers = [];
    let autocompleteService = new google.maps.places.AutocompleteService();

    function initMap() {
      const center = { lat: 52.5862, lng: -2.1286 }; // Wolverhampton
      map = new google.maps.Map(document.getElementById("map"), {
        center,
        zoom: 13,
        styles: localStorage.getItem("theme") === "dark" ? darkModeStyle : []
      });
    }

    function showSuggestions() {
      const input = document.getElementById("postcode").value;
      const suggestionBox = document.getElementById("suggestions");
      if (!input || input.length < 2) {
        suggestionBox.innerHTML = '';
        return;
      }

      autocompleteService.getPlacePredictions({ input, componentRestrictions: { country: 'uk' } }, function(predictions, status) {
        suggestionBox.innerHTML = '';
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          predictions.forEach(pred => {
            const div = document.createElement('div');
            div.textContent = pred.description;
            div.onclick = () => {
              document.getElementById("postcode").value = pred.description;
              suggestionBox.innerHTML = '';
              searchPharmacies();
            }
            suggestionBox.appendChild(div);
          });
        }
      });
    }

    function searchPharmacies() {
      const input = document.getElementById("postcode").value;
      if (!input.trim()) return;
      saveSearch(input);
      const geocoder = new google.maps.Geocoder();
      geocoder.geocode({ address: input + ", UK" }, (results, status) => {
        if (status === "OK" && results[0]) {
          const location = results[0].geometry.location;
          map.setCenter(location);
          map.setZoom(15);
          clearMarkers();
          const request = {
            location,
            radius: 3000,
            keyword: "pharmacy"
          };
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

    function clearMarkers() {
      markers.forEach(marker => marker.setMap(null));
      markers = [];
    }

    function saveSearch(term) {
      let searches = JSON.parse(localStorage.getItem("recentPostcodes") || "[]");
      if (!searches.includes(term)) {
        searches.unshift(term);
        if (searches.length > 5) searches.pop();
        localStorage.setItem("recentPostcodes", JSON.stringify(searches));
      }
      loadRecent();
    }

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

    const darkModeStyle = [
      { elementType: "geometry", stylers: [{ color: "#1d2c4d" }] },
      { elementType: "labels.text.fill", stylers: [{ color: "#8ec3b9" }] },
      { elementType: "labels.text.stroke", stylers: [{ color: "#1a3646" }] },
      { featureType: "administrative.country", elementType: "geometry.stroke", stylers: [{ color: "#4b6878" }] },
      { featureType: "poi", elementType: "labels.text.fill", stylers: [{ color: "#74e6bd" }] },
      { featureType: "road", elementType: "geometry", stylers: [{ color: "#304a7d" }] },
      { featureType: "water", elementType: "geometry", stylers: [{ color: "#0e1626" }] }
    ];

    window.onload = () => {
      initMap();
      loadRecent();
    };
  </script>
</body>
</html>
