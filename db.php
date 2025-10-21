<?php
$host = "localhost";
$user = "root";  // endres hvis du bruker dokploy-bruker
$pass = "";
$db = "skole";   // bytt til ditt databasenavn

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Tilkoblingsfeil: " . $conn->connect_error);
}
?>