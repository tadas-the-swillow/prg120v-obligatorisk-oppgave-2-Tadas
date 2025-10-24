<?php /* vis-studenter */ ?>

<!-- Seksjon med overskrift og tilbakeknapp -->
<div style="display: flex; align-items: center; margin-bottom: 15px;">
  <!-- Tilbakeknapp som sender brukeren tilbake til hovedsiden -->
  <a href="index.php" 
     style="text-decoration: none; background-color: #0080ff; color: white; padding: 5px 10px; border-radius: 5px; margin-right: 10px;">
     ← Tilbake
  </a>

  <!-- Overskrift for siden -->
  <h3 style="margin: 0;">Alle studenter</h3>
</div>

<?php
// Inkluderer databasekoblingen
include("db-tilkobling.php");

// SQL-spørring for å hente alle studenter fra tabellen "student"
$sql = "SELECT * FROM student;";

// Utfører spørringen og lagrer resultatet
$resultat = mysqli_query($db, $sql);

// Starter HTML-tabellen for å vise resultatene
print ("<table border='1'>");
print ("<tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klassekode</th></tr>");

// Går gjennom hver rad i resultatet fra databasen
while ($rad = mysqli_fetch_array($resultat)) {
  // Henter ut verdiene fra hver kolonne i raden
  $bn = $rad["brukernavn"];
  $fn = $rad["fornavn"];
  $en = $rad["etternavn"];
  $kk = $rad["klassekode"];

  // Skriver ut en tabellrad med studentinformasjonen
  print ("<tr><td>$bn</td><td>$fn</td><td>$en</td><td>$kk</td></tr>");
}

// Avslutter HTML-tabellen
print ("</table>");
?>