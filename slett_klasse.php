<?php /* slett-klasse */ ?>

<div style="display: flex; align-items: center; margin-bottom: 15px;">
  <!-- Tilbakeknapp -->
  <a href="index.php" 
     style="text-decoration: none; background-color: #0080ff; color: white; padding: 5px 10px; border-radius: 5px; margin-right: 10px;">
     ← Tilbake
  </a>

  <!-- Overskrift -->
  <h3 style="margin: 0;">Slett klasse</h3>
</div>

<form method="post" action="" onsubmit="return confirm('Er du sikker på at du vil slette klassen?');">
  <select name="klassekode" required>
    <option value="">Velg klasse</option>
    <?php
      include("db-tilkobling.php");
      $sql = "SELECT * FROM klasse;";
      $resultat = mysqli_query($db, $sql);
      while ($rad = mysqli_fetch_array($resultat)) {
        $kode = $rad["klassekode"];
        print ("<option value='$kode'>$kode</option>");
      }
    ?>
  </select>
  <input type="submit" name="slettKlasseKnapp" value="Slett klasse" />
</form>

<?php
if (isset($_POST["slettKlasseKnapp"])) {
  $klassekode = $_POST["klassekode"];
  include("db-tilkobling.php");

  // sjekk om studenter finnes i klassen
  $sql = "SELECT * FROM student WHERE klassekode='$klassekode';";
  $resultat = mysqli_query($db, $sql);
  $antall = mysqli_num_rows($resultat);

  if ($antall > 0) {
    print ("Kan ikke slette klassen fordi det finnes studenter i den.");
  } else {
    $sql = "DELETE FROM klasse WHERE klassekode='$klassekode';";
    mysqli_query($db, $sql) or die("Ikke mulig å slette klassen.");
    print ("Klasse $klassekode er slettet.");
  }
}
?>