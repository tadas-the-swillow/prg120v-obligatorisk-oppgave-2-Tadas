<?php /* vis-klasser */ ?>

<!-- Seksjon med overskrift og tilbakeknapp -->
<div style="display: flex; align-items: center; margin-bottom: 15px;">
  <!-- Tilbakeknapp som sender brukeren tilbake til hovedsiden -->
  <a href="index.php" 
     style="text-decoration: none; background-color: #0080ff; color: white; padding: 5px 10px; border-radius: 5px; margin-right: 10px;">
     ← Tilbake
  </a>

  <!-- Overskrift for siden -->
  <h3 style="margin: 0;">Alle klasser</h3>
</div>

<?php
// Inkluderer databasekoblingen
include("db-tilkobling.php");

// SQL-spørring for å hente alle rader fra tabellen "klasse"
$sql = "SELECT * FROM klasse;";

// Utfører SQL-spørringen og lagrer resultatet
$resultat = mysqli_query($db, $sql);

// Starter HTML-tabellen for å vise resultatet
print ("<table border='1'>");
print ("<tr><th>Klassekode</th><th>Klassenavn</th><th>Studiumkode</th></tr>");

// Går gjennom alle radene som ble hentet fra databasen
while ($rad = mysqli_fetch_array($resultat)) {
  // Henter ut verdiene for hver kolonne i raden
  $kode = $rad["klassekode"];
  $navn = $rad["klassenavn"];
  $studium = $rad["studiumkode"];

  // Skriver ut en rad i HTML-tabellen med data fra databasen
  print ("<tr><td>$kode</td><td>$navn</td><td>$studium</td></tr>");
}

// Avslutter HTML-tabellen
print ("</table>");
?>