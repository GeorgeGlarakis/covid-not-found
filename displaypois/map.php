<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime location tracker</title>

    <!-- leaflet css  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <style>
        #map {
            width: 100%;
            height: 100vh;
        }
    </style>
</head>

<body>

    <div class="col-12 col-md-4 col-lg-2">
        <input class="form-control form-control-dark" type="text" placeholder="Search by Name" id="searchbyname">
        <input class="form-control form-control-dark" type="text" placeholder="Search by Type" id="searchbytype">
    </div>

    <div id="map"></div>
    
</body>
</html>

<!-- leaflet.js  -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    // Map initialization 
    var map = L.map('map').setView([38.29037783868629, 21.79569292607424], 12);
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    osm.addTo(map);

    if(!navigator.geolocation) {
        console.log("Your browser doesn't support geolocation feature!")
    } else {        
        navigator.geolocation.getCurrentPosition(getPosition);
    }

    var coords, marker, circle;

    function getPosition( position ){
        var lat = position.coords.latitude
        var lng = position.coords.longitude
        var accuracy = position.coords.accuracy

        if(mylocation) { map.removeLayer(mylocation) }

        mycoords = L.marker([lat, lng]).bindPopup("My Location")
        mycircle = L.circle([lat, lng], {radius: accuracy})

        var mylocation = L.featureGroup([mycoords, mycircle]).addTo(map)

        map.fitBounds(mylocation.getBounds())
    }
</script>

<!-- jQuery / Ajax libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"        
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous"></script>
<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>

<!-- Search for POIs nearby -->
<script>
    var pois;

    $(document).ready(function () {

        var name = document.getElementById("searchbyname");
        var type = document.getElementById("searchbytype");

        name.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                type.value = '';
                if (pois) { map.removeLayer(pois); }
                var bounds = map.getBounds(); 
                getPOIs(bounds, "name", name.value);
            }
        });

        type.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                name.value = '';
                if (pois) { map.removeLayer(pois); }
                var bounds = map.getBounds(); 
                getPOIs(bounds, "type", type.value);
            }
        });
    })

    function getPOIs( bounds, search_by, value ) {
        var search = {
            northEast: {
                lat: bounds._northEast.lat,
                lng: bounds._northEast.lng
            },
            southWest: {
                lat: bounds._southWest.lat,
                lng: bounds._southWest.lng
            },
            search_by: search_by,
            search_value: value
        }

        $.ajax( {
            url: "getPOIs.inc.php",
            dataType: "text",
            type: "POST",
            data: {
                search: JSON.stringify({
                    search
                })
            }, 
            success: function( response ) {
                if (response.includes("error")) {
                    var error = JSON.parse(response);
                    console.log(error.error);
                }
                else {
                    display_pois(JSON.parse(response));
                }
            },
            error: function( xhr, ajaxOptions, thrownError ) {
                console.log("AJAX Error:" + xhr.status)
                console.log("Thrown Error:" + thrownError)
            }
        });
    }

    function display_pois( poi_res ) {
        var markers = [];
        Object.entries(poi_res).forEach(([key, value]) => {
            var poi_id = value.poi_id;
            var name = value.name;
            var address = value.address;
            var lat = value.lat;
            var lng = value.lng;
            var rating = value.rating;
            var rating_n = value.rating_n;
            var populartimes = value.populartimes;

            var popupText = name + "<br>" + address + "<br>Rating: " + rating;
            
            markers[key] = new L.marker([lat, lng]).bindPopup(popupText);       
        })

        pois = L.layerGroup(markers);
        map.addLayer(pois);

    }
</script>