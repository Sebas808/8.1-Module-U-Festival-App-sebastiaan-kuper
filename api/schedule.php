<?php
include "../config.php";
$result = $conn->query("SELECT * FROM schedule");
$data = [];
while($row = $result->fetch_assoc()){
  $data[] = $row;
}
echo json_encode($data);
?>
