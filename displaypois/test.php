<html>
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.5.0/dist/geosearch.css" />

    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-geosearch@3.5.0/dist/geosearch.umd.js"></script>
    <script src="https://unpkg.com/leaflet-control-custom@1.0.0/Leaflet.Control.Custom.js"></script>

</head>

<body>
    <div id="mapid" style="width: 1920px; height: 1018px;">
        <script>
            const carte = L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', { minZoom: 1, maxZoom: 18 });
            const map = L.map('mapid', { layers: [carte], attributionControl: false, drawControl: true }).setView([46.73881, -1.10074], 6);

            const geocodageAdresse = new GeoSearch.GeoSearchControl({
                provider: new GeoSearch.OpenStreetMapProvider(),
            });

            map.addControl(geocodageAdresse);

            L.control.custom({
                position: 'topleft',
                content: '<p>Circle size: ' +
                    '<select id="dist">' +
                    '<option value="0">0Km</option>' +
                    '<option value="5000">5Km</option>' +
                    '<option value="10000">10Km</option>' +
                    '</select></p>',
                events: { click: function () { $("form").submit(); } }
            }).addTo(map);

            map.on("geosearch/showlocation", function (e) { radiusGPS(e); });
            var geoCircle = L.circle();
            function radiusGPS(e) {
                var value = document.getElementById('dist').value;
                map.removeLayer(geoCircle);
                geoCircle = L.circle([e.location.y.toFixed(2), e.location.x.toFixed(2)], { radius: value }).addTo(map);
            }
        </script>
</body>
</html>