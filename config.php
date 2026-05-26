<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "ufestival";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("DB error");
}
?>
