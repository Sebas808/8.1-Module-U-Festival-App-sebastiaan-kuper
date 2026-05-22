function showPage(page) {
    document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
    document.getElementById(page).classList.add('active');
}

/* DARK MODE */
function toggleDarkMode() {
    document.body.classList.toggle('dark');
}

/* TAAL */
function setLanguage(lang) {
    document.querySelectorAll('[data-nl]').forEach(el => {
        el.innerText = el.getAttribute('data-' + lang);
    });
}

/* PROGRAMMA (from PHP) */
fetch('api/get_program.php')
.then(res => res.json())
.then(data => {
    let container = document.getElementById('programList');

    data.forEach(item => {
        container.innerHTML += `
            <div class="card">
                <b>${item.title}</b><br>
                <small>${item.time}</small>
            </div>
        `;
    });
});