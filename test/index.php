<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>❤️U Festival</title>

    <link href="https://fonts.googleapis.com/css2?family=Sansation:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
</head>

<body>

<!-- TOP BAR -->
<header class="topbar">
    <div class="logo">❤️ U Festival</div>

    <div class="top-actions">
        <button onclick="setLanguage('nl')">🇳🇱</button>
        <button onclick="setLanguage('en')">🇬🇧</button>
        <button onclick="toggleDarkMode()">🌙</button>
    </div>
</header>

<!-- APP CONTENT -->
<main>

    <!-- HOME -->
    <section id="home" class="page active">
        <div class="card hero">
            <h1 data-nl="WELCOME TO ❤️U FESTIVAL" data-en="WELCOME TO ❤️U FESTIVAL"></h1>
        </div>

        <div class="card"></div>
        <div class="card"></div>
    </section>

    <!-- INFO -->
    <section id="info" class="page">
        <div class="card">
            <h2>Festival Information</h2>
            <p>Lorem ipsum dolor sit amet...</p>
        </div>
    </section>

    <!-- SCHEDULE -->
    <section id="schedule" class="page">
        <div class="card">
            <h2>Line-up Schedule</h2>

            <div class="tabs">
                <button>Saturday</button>
                <button>Sunday</button>
            </div>

            <div id="programList"></div>
        </div>
    </section>

    <!-- MAP -->
    <section id="map" class="page">
        <div class="card map">
            <h2>Map</h2>
            <p>📍 You are here</p>
        </div>
    </section>

</main>

<!-- BOTTOM NAV (zoals wireframe) -->
<nav class="bottom-nav">
    <button onclick="showPage('home')">🏠 Home</button>
    <button onclick="showPage('info')">ℹ️ Info</button>
    <button onclick="showPage('schedule')">🎵 Lineup</button>
    <button onclick="showPage('map')">📍 Map</button>
</nav>

<script src="app.js"></script>
</body>
</html>