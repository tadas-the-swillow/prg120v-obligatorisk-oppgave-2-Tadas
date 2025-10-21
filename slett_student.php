<?php /* slett-student */ ?>

<div style="display: flex; align-items: center; margin-bottom: 15px;">
  <!-- Tilbakeknapp -->
  <a href="index.php" 
     style="text-decoration: none; background-color: #0080ff; color: white; padding: 5px 10px; border-radius: 5px; margin-right: 10px;">
     ← Tilbake
  </a>

  <!-- Overskrift -->
  <h3 style="margin: 0;">Slett student</h3>
</div>

<form method="post" action="" onsubmit="return confirm('Er du sikker på at du vil slette studenten?');">
  <select name="brukernavn" required>
    <option value="">Velg student</option>
    <?php
      include("db-tilkobling.php");
      $sql = "SELECT * FROM student;";
      $resultat = mysqli_query($db, $sql);
      while ($rad = mysqli_fetch_array($resultat)) {
        $bn = $rad["brukernavn"];
        print ("<option value='$bn'>$bn</option>");
      }
    ?>
  </select>
  <input type="submit" name="slettStudentKnapp" value="Slett student" />
</form>

<?php
if (isset($_POST["slettStudentKnapp"])) {
  $brukernavn = $_POST["brukernavn"];

  include("db-tilkobling.php");
  $sql = "DELETE FROM student WHERE brukernavn='$brukernavn';";
  mysqli_query($db, $sql) or die("Ikke mulig å slette studenten.");
  print ("Student $brukernavn er slettet.");
}
?>