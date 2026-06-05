let lang = "nl";

function loadPage(page) {
  fetch("pages/" + page + ".php")
    .then(res => res.text())
    .then(data => {
      const appEl = document.getElementById("app");
      appEl.innerHTML = data;

      // Update active nav button
      document.querySelectorAll("nav button").forEach(btn => {
        if (btn.getAttribute("data-page") === page) {
          btn.classList.add("active");
        } else {
          btn.classList.remove("active");
        }
      });

      // Manually execute scripts in loaded page
      appEl.querySelectorAll("script").forEach(oldScript => {
        const newScript = document.createElement("script");
        Array.from(oldScript.attributes).forEach(attr => newScript.setAttribute(attr.name, attr.value));
        newScript.appendChild(document.createTextNode(oldScript.innerHTML));
        oldScript.parentNode.replaceChild(newScript, oldScript);
      });
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
