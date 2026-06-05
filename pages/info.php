<?php include "../config.php"; ?>

<div class="card-info">

  <?php
  $sections = $conn->query("SELECT * FROM sections");

  while ($section = $sections->fetch_assoc()) {
    echo "<div class='section'>";
    echo "<div class='section-title' onclick='toggleSection(this)'>
        " . $section['key_name'] . " <span>▼</span>
        </div>";

    echo "<div class='section-content' style='display:none;'>";

    $content = $conn->query("SELECT * FROM content WHERE section_id=" . $section['id']);

    while ($row = $content->fetch_assoc()) {
      echo "<p><b>" . $row['title_nl'] . "</b><br>" . $row['text_nl'] . "</p>";
    }


    echo "</div></div>";


  }


  ?>

</div>

<div class="card-info">
  <h2 style="margin-top: 0; margin-bottom: 15px; font-size: 20px;">Veelgestelde Vragen (FAQ)</h2>
  <?php
  $faqs = $conn->query("SELECT * FROM faq");
  if ($faqs) {
    while ($faq = $faqs->fetch_assoc()) {
      echo "<div class='section'>";
      echo "<div class='section-title' onclick='toggleSection(this)'>
          " . htmlspecialchars($faq['question_nl']) . " <span>▼</span>
          </div>";

      echo "<div class='section-content' style='display:none;'>";
      echo "<p>" . htmlspecialchars($faq['answer_nl']) . "</p>";
      echo "</div></div>";
    }
  } else {
    echo "<p>Geen FAQ beschikbaar.</p>";
  }
  ?>
</div>