<?php include("db.php"); ?>
<h2>Alle klasser</h2>

<table border="1">
<tr><th>Klassekode</th><th>Klassenavn</th><th>Studiumkode</th></tr>
<?php
$result = $conn->query("SELECT * FROM klasse");
while ($row = $result->fetch_assoc()) {
  echo "<tr><td>{$row['klassekode']}</td><td>{$row['klassenavn']}</td><td>{$row['studiumkode']}</td></tr>";
}
?>
</table>