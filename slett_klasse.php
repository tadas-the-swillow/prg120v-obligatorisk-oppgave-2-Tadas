<?php /* slett-klasse */ ?>

<!-- Seksjon med overskrift og tilbakeknapp -->
<div style="display: flex; align-items: center; margin-bottom: 15px;">
  <!-- Tilbakeknapp som fører brukeren tilbake til startsiden -->
  <a href="index.php" 
     style="text-decoration: none; background-color: #0080ff; color: white; padding: 5px 10px; border-radius: 5px; margin-right: 10px;">
     ← Tilbake
  </a>

  <!-- Overskrift for siden -->
  <h3 style="margin: 0;">Slett klasse</h3>
</div>

<!-- Skjema for å velge og slette en klasse -->
<form method="post" action="" onsubmit="return confirm('Er du sikker på at du vil slette denne klassen?');">
  <!-- Tekst og nedtrekksmeny for valg av klasse -->
  Velg klasse:
  <select name="klassekode" required>
    <option value="">Velg klasse</option>
    <?php 
      // Inkluderer fil som lager dynamisk listeboks med klassekoder fra databasen
      include("dynamiske-funksjoner.php"); 
      listeboksKlassekode(); 
    ?>
  </select>
  <br/><br/>
  <!-- Knapp for å slette valgt klasse -->
  <input type="submit" name="slettKlasseKnapp" value="Slett klasse" />
</form>

<?php
// Sjekker om brukeren har trykket på "Slett klasse"-knappen
if (isset($_POST["slettKlasseKnapp"])) {
  // Henter klassekoden fra skjemaet
  $klassekode = $_POST["klassekode"];

  // Kobler til databasen
  include("db-tilkobling.php");

  // Sjekker om det finnes studenter registrert i denne klassen
  $sql = "SELECT * FROM student WHERE klassekode='$klassekode';";
  $resultat = mysqli_query($db, $sql);
  $antall = mysqli_num_rows($resultat);

  // Hvis det finnes studenter, kan ikke klassen slettes
  if ($antall > 0) {
    print("Kan ikke slette klasse $klassekode fordi den inneholder studenter.");
  } 
  else {
    // Hvis ingen studenter er knyttet til klassen, slett den
    $sql = "DELETE FROM klasse WHERE klassekode='$klassekode';";
    // Utfører slettingen – stopper programmet med feilmelding hvis noe går galt
    mysqli_query($db, $sql) or die("Ikke mulig å slette klassen.");
    // Bekrefter sletting
    print("Klassen $klassekode er nå slettet.");
  }
}
?>