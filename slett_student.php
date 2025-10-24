<?php /* slett-student */ ?>

<!-- Seksjon med overskrift og tilbakeknapp -->
<div style="display: flex; align-items: center; margin-bottom: 15px;">
  <!-- Tilbakeknapp som tar brukeren tilbake til startsiden -->
  <a href="index.php" 
     style="text-decoration: none; background-color: #0080ff; color: white; padding: 5px 10px; border-radius: 5px; margin-right: 10px;">
     ← Tilbake
  </a>

  <!-- Overskrift for siden -->
  <h3 style="margin: 0;">Slett student</h3>
</div>

<!-- Skjema for å velge og slette en student -->
<form method="post" action="" onsubmit="return confirm('Er du sikker på at du vil slette denne studenten?');">
  <!-- Tekst og nedtrekksmeny for valg av student -->
  Velg student:
  <select name="brukernavn" required>
    <option value="">Velg student</option>
    <?php 
      // Inkluderer fil med dynamiske funksjoner som fyller nedtrekkslisten med alle brukernavn fra databasen
      include("dynamiske-funksjoner.php"); 
      listeboksBrukernavn(); 
    ?>
  </select>
  <br/><br/>
  <!-- Knapp for å sende inn skjemaet og utføre sletting -->
  <input type="submit" name="slettStudentKnapp" value="Slett student" />
</form>

<?php
// Sjekker om brukeren har trykket på "Slett student"-knappen
if (isset($_POST["slettStudentKnapp"])) {
  // Henter valgt brukernavn fra skjemaet
  $brukernavn = $_POST["brukernavn"];

  // Kobler til databasen
  include("db-tilkobling.php");

  // SQL-spørring for å slette studenten med valgt brukernavn
  $sql = "DELETE FROM student WHERE brukernavn='$brukernavn';";

  // Utfører slettingen — hvis noe går galt, vis feilmelding
  mysqli_query($db, $sql) or die("Ikke mulig å slette student.");

  // Bekreftelse til brukeren om at studenten er slettet
  print("Studenten med brukernavn $brukernavn er nå slettet.");
}
?>