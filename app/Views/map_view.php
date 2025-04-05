<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search nearby Pharcy through Google Map</title>

    <style>
        #map {
            width: 100%;
            height: 500px; /* Ensure map is visible */
        }
    </style>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCI7W6AmYsiP2CR94IVBuL3SsdDSFq7XHI&callback=initMap" async defer></script>

    <script>
        function initMap() {
            var location = { lat: 37.7749, lng: -122.4194 }; // Default: San Francisco
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: location
            });

            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }
    </script>
</head>
<body>

    <h2>Search nearby Pharcy through Google Map</h2>
    <div id="map"></div>

</body>
</html>
