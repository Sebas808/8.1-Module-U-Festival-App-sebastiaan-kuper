<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Sansation:wght@300;400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
<title>❤️U Festival</title>
</head>
<body>
<header>
  <div class="topbar">
    <h1>❤️U Festival</h1>
    <div class="actions">
      <button onclick="toggleLang()">🌐</button>
      <button onclick="toggleTheme()">🌓</button>
    </div>
  </div>
</header>

<main id="app"></main>

<nav>
  <button onclick="loadPage('home')">Home</button>
  <button onclick="loadPage('info')">Info</button>
  <button onclick="loadPage('schedule')">Line-up</button>
  <button onclick="loadPage('map')">Map</button>
</nav>

<script src="assets/js/app.js"></script>
</body>
</html>
