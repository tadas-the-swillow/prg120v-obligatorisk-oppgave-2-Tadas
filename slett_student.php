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

<form method="post" action="">
  Velg student som skal slettes:
  <select name="brukernavn">
    <?php 
      include("dynamiske-funksjoner.php"); 
      listeboksBrukernavn(); 
    ?>
  </select><br/>
  <input type="submit" name="slettStudentKnapp" value="Slett student" 
         onclick="return confirm('Er du sikker på at du vil slette denne studenten?');">
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