let lang = "nl";

function loadPage(page) {
  fetch("pages/" + page + ".php")
    .then(res => res.text())
    .then(data => {
      document.getElementById("app").innerHTML = data;
    });
}

function toggleTheme() {
  document.body.classList.toggle("dark");
}

function toggleLang() {
  lang = lang === "nl" ? "en" : "nl";
  loadPage("home");
}

loadPage("home");

function toggleSection(el) {
  let content = el.nextElementSibling;

  if (content.style.display === "block") {
    content.style.display = "none";
  } else {
    content.style.display = "block";
  }
}
