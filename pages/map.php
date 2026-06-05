<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <title>Festival Map</title>

  <!-- Leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

  <style>
    body {
      margin: 0;
    }

    #map {
      width: 100%;
      height: 100vh;
      background: #2e7d32;
    }

    /* Custom markers (blijven zelfde grootte) */
    .marker {
      width: 40px;
      height: 40px;
      background-size: contain;
      background-repeat: no-repeat;
    }
  </style>
</head>

<body>

  <div id="map"></div>

  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

  <script>

    // =======================
    // MAP START
    // =======================
    var map = L.map('map', {
      crs: L.CRS.Simple,
      minZoom: -1,
      maxZoom: 2
    });

    // =======================
    // FLOORPLAN (ONLINE IMAGE)
    // =======================
    var bounds = [[0, 0], [1000, 1600]];

    // GRATIS floorplan image (werkt altijd)
    var image = L.imageOverlay(
      'https://upload.wikimedia.org/wikipedia/commons/3/3b/Floor_plan_example.png',
      bounds
    ).addTo(map);

    map.fitBounds(bounds);

    // =======================
    // ICON FUNCTION
    // =======================
    function icon(url) {
      return L.divIcon({
        html: `<div class="marker" style="background-image:url('${url}')"></div>`,
        iconSize: [40, 40],
        iconAnchor: [20, 20],
        className: ''
      });
    }

    // =======================
    // MARKERS (met online icons)
    // =======================
    var plekken = [

      {
        naam: "Main Stage",
        coords: [700, 300],
        icon: "https://cdn-icons-png.flaticon.com/512/727/727245.png",
        current: "DJ Alpha",
        next: "Band Beta"
      },

      {
        naam: "Food Court",
        coords: [500, 800],
        icon: "https://cdn-icons-png.flaticon.com/512/1046/1046784.png",
        current: "Open",
        next: "-"
      },

      {
        naam: "WC",
        coords: [200, 1400],
        icon: "https://cdn-icons-png.flaticon.com/512/684/684908.png",
        current: "",
        next: ""
      },

      {
        naam: "Bar",
        coords: [400, 1200],
        icon: "https://cdn-icons-png.flaticon.com/512/3075/3075977.png",
        current: "Cocktails",
        next: "-"
      }

    ];

    // =======================
    // MARKERS PLAATSEN
    // =======================
    plekken.forEach(p => {

      var marker = L.marker(p.coords, {
        icon: icon(p.icon)
      }).addTo(map);

      marker.bindPopup(`
        <b>${p.naam}</b><br>
        Huidig: ${p.current}<br>
        Volgende: ${p.next}
    `);
    });

    // =======================
    // GEBRUIKER LOCATIE
    // =======================
    if (navigator.geolocation) {

      navigator.geolocation.watchPosition(function (pos) {

        // simulatie (want echte GPS werkt niet met deze map)
        var userPos = [600, 900];

        if (window.userMarker) {
          window.userMarker.setLatLng(userPos);
        } else {
          window.userMarker = L.circleMarker(userPos, {
            radius: 8,
            color: 'blue'
          }).addTo(map);
        }

      });

    }

    // =======================
    // DEBUG CLICK (handig!)
    // =======================
    map.on('click', function (e) {
      console.log("Klik positie:", e.latlng);
    });

  </script>

</body>

</html>