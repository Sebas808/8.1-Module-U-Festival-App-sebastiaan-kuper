<?php include "../config.php"; ?>

<div class="card">

<?php
$sections = $conn->query("SELECT * FROM sections");

while($section = $sections->fetch_assoc()) {
  echo "<div class='section'>";
  echo "<div class='section-title' onclick='toggleSection(this)'>
        ".$section['key_name']." <span>▼</span>
        </div>";

  echo "<div class='section-content' style='display:none;'>";

  $content = $conn->query("SELECT * FROM content WHERE section_id=".$section['id']);

  while($row = $content->fetch_assoc()) {
    echo "<p><b>".$row['title_nl']."</b><br>".$row['text_nl']."</p>";
  }


  echo "</div></div>";

  
}


?>

</div>

