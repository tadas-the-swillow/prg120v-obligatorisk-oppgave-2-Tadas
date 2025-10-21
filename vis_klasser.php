<?php /* vis-klasser */ ?>

<div style="display: flex; align-items: center; margin-bottom: 15px;">
  <!-- Tilbakeknapp -->
  <a href="index.php" 
     style="text-decoration: none; background-color: #0080ff; color: white; padding: 5px 10px; border-radius: 5px; margin-right: 10px;">
     ← Tilbake
  </a>

  <!-- Overskrift -->
  <h3 style="margin: 0;">Alle klasser</h3>
</div>

<?php
include("db-tilkobling.php");

$sql = "SELECT * FROM klasse;";
$resultat = mysqli_query($db, $sql);

print ("<table border='1'>");
print ("<tr><th>Klassekode</th><th>Klassenavn</th><th>Studiumkode</th></tr>");
while ($rad = mysqli_fetch_array($resultat)) {
  $kode = $rad["klassekode"];
  $navn = $rad["klassenavn"];
  $studium = $rad["studiumkode"];
  print ("<tr><td>$kode</td><td>$navn</td><td>$studium</td></tr>");
}
print ("</table>");
?>