<?php /* registrer-student */ ?>

<!-- Seksjon med overskrift og tilbakeknapp -->
<div style="display: flex; align-items: center; margin-bottom: 15px;">
  <!-- Tilbakeknapp som leder brukeren tilbake til index.php -->
  <a href="index.php" 
     style="text-decoration: none; background-color: #0080ff; color: white; padding: 5px 10px; border-radius: 5px; margin-right: 10px;">
     ← Tilbake
  </a>

  <!-- Overskrift for siden -->
  <h3 style="margin: 0;">Registrer student</h3>
</div>

<!-- Skjema for registrering av ny student -->
<form method="post" action="">
  <!-- Felt for brukernavn -->
  Brukernavn <input type="text" name="brukernavn" required /><br/>
  <!-- Felt for fornavn -->
  Fornavn <input type="text" name="fornavn" required /><br/>
  <!-- Felt for etternavn -->
  Etternavn <input type="text" name="etternavn" required /><br/>
  <!-- Nedtrekksliste for klassekode -->
  Klassekode 
  <select name="klassekode" required>
    <option value="">Velg klasse</option>
    <?php 
      // Inkluderer fil med dynamiske funksjoner og henter alle klassekoder til listeboksen
      include("dynamiske-funksjoner.php"); 
      listeboksKlassekode(); 
    ?>
  </select>
  <br/><br/>
  <!-- Knapp for å sende inn skjemaet -->
  <input type="submit" name="registrerStudentKnapp" value="Registrer student" />
  <!-- Knapp for å nullstille feltene -->
  <input type="reset" value="Nullstill" />
</form>

<?php
// Sjekker om brukeren har trykket på "Registrer student"-knappen
if (isset($_POST["registrerStudentKnapp"])) {
  // Henter data fra skjemaet
  $brukernavn = $_POST["brukernavn"];
  $fornavn = $_POST["fornavn"];
  $etternavn = $_POST["etternavn"];
  $klassekode = $_POST["klassekode"];

  // Kobler til databasen
  include("db-tilkobling.php");

  // Sjekker om brukernavnet allerede finnes i databasen
  $sql = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
  $resultat = mysqli_query($db, $sql);
  $antall = mysqli_num_rows($resultat);

  // Hvis brukernavn finnes, gi feilmelding
  if ($antall != 0) {
    print("Brukernavn finnes allerede.");
  } else {
    // Hvis brukernavn ikke finnes, sett inn ny student i databasen
    $sql = "INSERT INTO student VALUES('$brukernavn', '$fornavn', '$etternavn', '$klassekode');";
    // Utfør SQL-setningen, og vis feilmelding hvis noe går galt
    mysqli_query($db, $sql) or die("Ikke mulig å registrere student.");
    // Gi bekreftelse på at studenten er registrert
    print("Studenten $fornavn $etternavn er nå registrert i klasse $klassekode.");
  }
}
?>