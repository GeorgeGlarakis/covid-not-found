<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime location tracker</title>

    <!-- leaflet css  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css">
    <link rel="stylesheet" href="../static_css/leaflet.awesome-markers.css">

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
        <button id="logout">Log out</button>
        <!-- <i><?php session_start(); echo $_SESSION["user_name"] ?></i> -->
        <p id="test"> </p>
    </div>

    <div id="map"></div>

    <div class="popup">Click me!
        <span class="popuptext" id="myPopup">Popup text...</span>
    </div>
    
</body>
</html>

<!-- leaflet.js  -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="../static_javascript/leaflet.awesome-markers.js"></script>
<script>
    var blueMarker = L.AwesomeMarkers.icon({
        markerColor: 'blue'
    });
    var greenMarker = L.AwesomeMarkers.icon({
        markerColor: 'green'
    });
    var orangeMarker = L.AwesomeMarkers.icon({
        markerColor: 'orange'
    });
    var redMarker = L.AwesomeMarkers.icon({
        markerColor: 'red'
    });

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

        mycoords = L.marker([lat, lng], {icon: blueMarker}).bindPopup("My Location")
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
    // var user_id ='?php echo $_SESSION["user_id"];?>';

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
        let markers = [];
        Object.entries(poi_res).forEach(([key, value]) => {
            let poi_id = value.poi_id;
            let name = value.name;
            let address = value.address;
            let lat = value.lat;
            let lng = value.lng;
            let rating = value.rating;
            let rating_n = value.rating_n;
            let populartimes = value.populartimes;

            let pred = crowd_prediction(JSON.parse(populartimes));
            let marker_color;
            if (pred.first_hour < 33) { marker_color = greenMarker; }
            else if (pred.first_hour > 32 && pred.first_hour < 66) { marker_color = orangeMarker; }
            else { marker_color = redMarker; }
            let estim = get_estimation(poi_id);            

            let popupText = name + "<br>" + address + "<br>Rating: " + rating + 
                        "<br>Crowd Prediction: " + pred.first_hour + " " + pred.second_hour +
                        "<br>Crowd Estimation: " + estim +
                        '<br>Your crowd estimation: <input type="number" id="estimation_'+ poi_id +'">' +
                        '<br><input type="button" id="'+ poi_id +'" class="mybuttons" value="Register Visit"></input>';
            
            markers[key] = new L.marker([lat, lng], {icon: marker_color})
                                .bindPopup(popupText)
                                .on("popupopen", function() {
                                    $('.mybuttons').click(function () {
                                        var estimation = $('#estimation_' + this.id).val();
                                        register_visit(user_id, this.id, estimation);
                                    });
                                });
            ;       

        })

        pois = L.layerGroup(markers);
        map.addLayer(pois);

    }

    function crowd_prediction( populartimes ) {
        const timeElapsed = Date.now();
        const today = new Date(timeElapsed);
        var current_day = today.getDay();
        if (current_day == 0) { current_day = 6; }  // Our JSON starts the week from Monday
            else { current_day--; }                 // but .getDay() function starts from Sunday
        const current_time = today.getHours();
        let weekday, hours;
        Object.entries(populartimes).forEach(([key, value]) => {
            if (current_day == key) {
                weekday = value.name;
                hours = value.data;                
            } 
        })

        return {
            "first_hour":hours[current_time+1], 
            "second_hour":hours[current_time+2]
        };         
    }

    function get_estimation( poi_id ) {
        $.ajax({
            url:"getPOIs.inc.php",
            method:"POST",
            data:{ estimation: poi_id },
            dataType:"text",
            async: false,

            success: function( response ) {
                if (response.includes("error")) {
                    result = JSON.parse(response).error;
                }
                else if (response.includes("estimation")) {
                    result = JSON.parse(response).estimation;
                }
            },
            error: function( xhr, ajaxOptions, thrownError ) {
                console.log("AJAX Error:" + xhr.status)
                console.log("Thrown Error:" + thrownError)
                result = "Error!";
            }
        });
        return result;
    }

    function register_visit( user_id, poi_id, estimation ) {
        $.ajax( {
            url: "../visits/visits.inc.php",
            dataType: "text",
            type: "POST",
            data: {
                visits: JSON.stringify({ 
                    user_id: user_id,
                    poi_id: poi_id,
                    estimation: estimation
                })
            }, 
            success: function( response ) {
                alert(response);
            },
            error: function( error ) {
                console.log(error)
            }
        });
    }

</script>

<script src="../login/logout.js"></script>