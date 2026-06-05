<div class="hero-banner">
  <h2>❤️U Festival 2026</h2>
  <p class="slogan">Het leukste festival van Utrecht met de leukste muziek, het gaafste theater en de meest fascinerende wetenschap!</p>
  
  <div class="countdown-badge">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
      <circle cx="12" cy="12" r="10"></circle>
      <polyline points="12 6 12 12 16 14"></polyline>
    </svg>
    <span>Nog <strong id="countdown-days-val">--</strong> dagen tot ❤️U Festival</span>
  </div>
</div>

<div class="home-grid">
  <div class="premium-card">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
      <circle cx="12" cy="10" r="3"></circle>
    </svg>
    <div class="card-text">
      <span class="card-title">Locatie</span>
      <span class="card-value">Strijkviertel, Utrecht</span>
    </div>
  </div>

  <div class="premium-card">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
      <line x1="16" y1="2" x2="16" y2="6"></line>
      <line x1="8" y1="2" x2="8" y2="6"></line>
      <line x1="3" y1="10" x2="21" y2="10"></line>
    </svg>
    <div class="card-text">
      <span class="card-title">Datum</span>
      <span class="card-value">5 September 2026</span>
    </div>
  </div>
</div>

<h3 class="section-title-premium">Ontdek het festival</h3>

<div class="highlights-grid">
  <div class="highlight-item" onclick="loadPage('info')">
    <div class="highlight-icon music">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
        <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
      </svg>
    </div>
    <div class="highlight-text">
      <h4>Muziek</h4>
      <p>Live optredens en DJ's</p>
    </div>
  </div>

  <div class="highlight-item" onclick="loadPage('info')">
    <div class="highlight-icon lockers">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
      </svg>
    </div>
    <div class="highlight-text">
      <h4>Lockers</h4>
      <p>Veilig je spullen opbergen</p>
    </div>
  </div>

  <div class="highlight-item" onclick="loadPage('info')">
    <div class="highlight-icon golden-glu">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
      </svg>
    </div>
    <div class="highlight-text">
      <h4>Golden-GLU</h4>
      <p>Speciale acties & munten</p>
    </div>
  </div>
</div>

<div class="cta-container">
  <button class="btn-premium btn-primary-premium" onclick="loadPage('schedule')">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
      <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
    </svg>
    Line-up
  </button>
  <button class="btn-premium btn-secondary-premium" onclick="loadPage('map')">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
      <line x1="8" y1="2" x2="8" y2="18"></line>
      <line x1="16" y1="6" x2="16" y2="22"></line>
    </svg>
    Kaart
  </button>
</div>

<script>
(function() {
  const targetDate = new Date("2026-09-05T00:00:00");
  const updateCountdown = () => {
    const now = new Date();
    const difference = targetDate - now;
    
    let days = Math.ceil(difference / (1000 * 60 * 60 * 24));
    if (days < 0) days = 0;
    
    const element = document.getElementById("countdown-days-val");
    if (element) {
      element.textContent = days;
    }
  };
  updateCountdown();
})();
</script>