<?php /* vis-studenter */ ?>

<div style="display: flex; align-items: center; margin-bottom: 15px;">
  <!-- Tilbakeknapp -->
  <a href="index.php" 
     style="text-decoration: none; background-color: #0080ff; color: white; padding: 5px 10px; border-radius: 5px; margin-right: 10px;">
     ← Tilbake
  </a>

  <!-- Overskrift -->
  <h3 style="margin: 0;">Alle studenter</h3>
</div>

<?php
include("db-tilkobling.php");

$sql = "SELECT * FROM student;";
$resultat = mysqli_query($db, $sql);

print ("<table border='1'>");
print ("<tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klassekode</th></tr>");
while ($rad = mysqli_fetch_array($resultat)) {
  $bn = $rad["brukernavn"];
  $fn = $rad["fornavn"];
  $en = $rad["etternavn"];
  $kk = $rad["klassekode"];
  print ("<tr><td>$bn</td><td>$fn</td><td>$en</td><td>$kk</td></tr>");
}
print ("</table>");
?>