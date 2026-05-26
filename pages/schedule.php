<div class="card">

<h2>Line-up</h2>

<div class="schedule-tabs">
  <button onclick="loadSchedule('saturday')">Zaterdag</button>
  <button onclick="loadSchedule('sunday')">Zondag</button>
</div>

<div id="schedule"></div>

</div>

<script>
function loadSchedule(day){
  fetch("api/schedule.php")
  .then(r => r.json())
  .then(data => {

    let html = "";

    data.filter(s => s.day === day)
    .forEach(s => {
      html += `
        <div class="schedule-item">
          <b>${s.time}</b><br>
          ${s.artist}<br>
          <small>${s.stage}</small>
        </div>
      `;
    });

    document.getElementById("schedule").innerHTML = html;
  });
}

loadSchedule('saturday');
</script>