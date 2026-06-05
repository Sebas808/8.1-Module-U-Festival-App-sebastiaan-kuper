<div class="card" style="background: transparent; padding: 10px 5px; margin: 0;">

  <h2 style="color: white; margin-top: 0; margin-bottom: 20px; font-size: 24px;">Timetable</h2>

  <div class="schedule-tabs">
    <button id="btn-sat" class="active" onclick="switchDay(1)">Zaterdag</button>
    <button id="btn-sun" onclick="switchDay(2)">Zondag</button>
  </div>

  <div class="genre-filters">
    <button class="genre-pill active" onclick="filterGenre(this, 'all')">Alle genres</button>
    <button class="genre-pill" onclick="filterGenre(this, 'Dance')">Dance</button>
    <button class="genre-pill" onclick="filterGenre(this, 'Indie')">Indie</button>
    <button class="genre-pill" onclick="filterGenre(this, 'Rock')">Rock</button>
    <button class="genre-pill" onclick="filterGenre(this, 'Pop')">Pop</button>
    <button class="genre-pill" onclick="filterGenre(this, 'Metal')">Metal</button>
  </div>

  <div class="timetable-container">
    <div class="timetable-grid" id="timetable-grid">
      <!-- Generated dynamically by script -->
    </div>
  </div>

</div>

<script>
  (function () {
    let allSchedule = [];
    let currentDay = 1;
    let currentGenre = 'all';

    // Genre map mapping selected filter pills to types in db acts
    const genreMapping = {
      'Dance': ['DJ'],
      'Indie': ['Singer', 'Talent'],
      'Rock': ['Band'],
      'Pop': ['Singer'],
      'Metal': ['Band'] // Map to Band for demonstration
    };

    // Load favorites from local storage
    let favorites = JSON.parse(localStorage.getItem('fav_acts') || '[]');

    function toggleFavorite(actId, event) {
      event.stopPropagation();
      event.preventDefault();

      const index = favorites.indexOf(actId);
      if (index > -1) {
        favorites.splice(index, 1);
      } else {
        favorites.push(actId);
      }
      localStorage.setItem('fav_acts', JSON.stringify(favorites));

      // Toggle active class on clicked button
      const btn = event.currentTarget;
      if (favorites.includes(actId)) {
        btn.classList.add('active');
        btn.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="#F1C40F" stroke="#F1C40F" stroke-width="2">
          <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
        </svg>
      `;
      } else {
        btn.classList.remove('active');
        btn.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
        </svg>
      `;
      }
    }

    // Bind to global window so HTML onclick properties can access them
    window.switchDay = function (dayId) {
      currentDay = dayId;
      document.getElementById('btn-sat').classList.toggle('active', dayId === 1);
      document.getElementById('btn-sun').classList.toggle('active', dayId === 2);
      renderGrid();
    };

    window.filterGenre = function (pillEl, genre) {
      document.querySelectorAll('.genre-pill').forEach(pill => pill.classList.remove('active'));
      pillEl.classList.add('active');
      currentGenre = genre;
      renderGrid();
    };

    window.toggleFavoriteAct = toggleFavorite;

    // Helper to map time to grid column (10:00 is column 2, each 15m is +1)
    function timeToColumn(timeStr) {
      if (!timeStr) return 2;
      const parts = timeStr.split(":");
      const hours = parseInt(parts[0], 10);
      const minutes = parseInt(parts[1], 10);
      let totalMinutes = hours * 60 + minutes;
      if (hours === 0) {
        totalMinutes = 24 * 60; // Treat 00:00 as 24:00
      }
      const startMinutes = 10 * 60; // 10:00
      const intervalIndex = (totalMinutes - startMinutes) / 15;
      return Math.round(intervalIndex) + 2;
    }

    function renderGrid() {
      const grid = document.getElementById('timetable-grid');
      grid.innerHTML = '';

      // 1. Render hour header labels (spanning 4 columns per hour)
      const hours = ['10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'];
      let headerHTML = '<div class="hour-header-row"><div class="stage-corner"></div>';
      hours.forEach((h, index) => {
        const colStart = 2 + index * 4;
        headerHTML += `<div class="hour-label" style="grid-column: ${colStart} / span 4;">${h}</div>`;
      });
      headerHTML += '</div>';
      grid.innerHTML += headerHTML;

      // 2. Render vertical dashed gridlines for every hour (col 2, 6, 10...)
      for (let i = 0; i <= 14; i++) {
        const colStart = 2 + i * 4;
        grid.innerHTML += `<div class="grid-line" style="grid-column: ${colStart};"></div>`;
      }

      // 3. Render Stage Labels (Row 2 = Poton, Row 3 = Lake, Row 4 = Club, Row 5 = Hangar)
      const stages = [
        { id: 1, name: 'Poton' },
        { id: 2, name: 'The Lake' },
        { id: 3, name: 'The Club' },
        { id: 4, name: 'Hangar' } // normalize 'Hanggar' to 'Hangar'
      ];
      stages.forEach((stage, idx) => {
        const rowNum = 2 + idx;
        grid.innerHTML += `<div class="stage-label" style="grid-row: ${rowNum};">${stage.name}</div>`;
      });

      // 4. Render acts cards
      const dayFiltered = allSchedule.filter(s => parseInt(s.day_id, 10) === currentDay);

      dayFiltered.forEach(s => {
        const stageId = parseInt(s.stage_id, 10);
        const rowNum = 2 + (stageId - 1); // Poton (1)->Row 2, Lake (2)->Row 3, Club (3)->Row 4, Hangar (4)->Row 5

        const startCol = timeToColumn(s.start_time);
        const endCol = timeToColumn(s.end_time);

        // Determine genre matches
        let isGenreMatch = true;
        if (currentGenre !== 'all') {
          const allowedTypes = genreMapping[currentGenre] || [];
          isGenreMatch = allowedTypes.includes(s.artist_type);
        }

        const fadedClass = isGenreMatch ? '' : 'faded';
        const isFav = favorites.includes(s.act_id);

        const starIcon = isFav
          ? `<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="#F1C40F" stroke="#F1C40F" stroke-width="2">
             <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
           </svg>`
          : `<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
             <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
           </svg>`;

        const cardHTML = `
        <div class="timetable-card ${fadedClass}" style="grid-row: ${rowNum}; grid-column: ${startCol} / ${endCol};">
          <p class="card-artist">${s.artist_name}</p>
          <span class="card-time">${s.start_time} - ${s.end_time}</span>
          <button class="fav-btn ${isFav ? 'active' : ''}" onclick="toggleFavoriteAct('${s.act_id}', event)">
            ${starIcon}
          </button>
        </div>
      `;
        grid.innerHTML += cardHTML;
      });
    }

    // Load timetable data from api
    fetch("api/schedule.php")
      .then(r => r.json())
      .then(data => {
        allSchedule = data;
        renderGrid();
      })
      .catch(err => {
        console.error("Fout bij laden timetable data:", err);
      });

  })();
</script>