<?php include("db.php"); ?>
<h2>Alle studenter</h2>

<table border="1">
<tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klassekode</th></tr>
<?php
$result = $conn->query("SELECT * FROM student");
while ($row = $result->fetch_assoc()) {
  echo "<tr><td>{$row['brukernavn']}</td><td>{$row['fornavn']}</td><td>{$row['etternavn']}</td><td>{$row['klassekode']}</td></tr>";
}
?>
</table>