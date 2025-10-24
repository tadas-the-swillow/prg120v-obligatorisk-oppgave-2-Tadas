<?php /* registrer-klasse */ ?>

<!-- Oppsett av overskrift og tilbakeknapp -->
<div style="display: flex; align-items: center; margin-bottom: 15px;">
  <!-- Tilbakeknapp som leder brukeren tilbake til index.php -->
  <a href="index.php" 
     style="text-decoration: none; background-color: #0080ff; color: white; padding: 5px 10px; border-radius: 5px; margin-right: 10px;">
     ← Tilbake
  </a>

  <!-- Overskrift for siden -->
  <h3 style="margin: 0;">Registrer klasse</h3>
</div>

<!-- Skjema for å registrere ny klasse -->
<form method="post" action="">
  <!-- Felt for klassekode -->
  Klassekode <input type="text" name="klassekode" required /> <br/>
  <!-- Felt for klassenavn -->
  Klassenavn <input type="text" name="klassenavn" required /> <br/>
  <!-- Felt for studiumkode -->
  Studiumkode <input type="text" name="studiumkode" required /> <br/>
  <!-- Knapp for å sende inn skjemaet -->
  <input type="submit" name="registrerKlasseKnapp" value="Registrer klasse" />
  <!-- Knapp for å nullstille feltene -->
  <input type="reset" value="Nullstill" />
</form>

<?php
// Sjekker om brukeren har trykket på "Registrer klasse"-knappen
if (isset($_POST["registrerKlasseKnapp"])) {
  // Henter inn data fra skjemaet
  $klassekode = $_POST["klassekode"];
  $klassenavn = $_POST["klassenavn"];
  $studiumkode = $_POST["studiumkode"];

  // Kobler til databasen (db-tilkobling.php må inneholde koblingsinformasjon)
  include("db-tilkobling.php");

  // Sjekker om klassekode allerede finnes i databasen
  $sql = "SELECT * FROM klasse WHERE klassekode='$klassekode';";
  $resultat = mysqli_query($db, $sql);
  $antall = mysqli_num_rows($resultat);

  // Hvis klassekode finnes fra før, vis en feilmelding
  if ($antall != 0) {
    print ("Klassekode finnes allerede.");
  } else {
    // Hvis ikke, sett inn den nye klassen i databasen
    $sql = "INSERT INTO klasse VALUES('$klassekode', '$klassenavn', '$studiumkode');";
    // Utfør SQL-setningen, og vis feilmelding hvis noe går galt
    mysqli_query($db, $sql) or die("Ikke mulig å registrere klassen.");
    // Bekreft at registreringen var vellykket
    print ("Klassen $klassekode er nå registrert.");
  }
}
?>