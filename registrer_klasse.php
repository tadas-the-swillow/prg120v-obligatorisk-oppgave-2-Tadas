<?php /* registrer-klasse */ ?>

<div style="display: flex; align-items: center; margin-bottom: 15px;">
  <!-- Tilbakeknapp -->
  <a href="index.php" 
     style="text-decoration: none; background-color: #0080ff; color: white; padding: 5px 10px; border-radius: 5px; margin-right: 10px;">
     ← Tilbake
  </a>

  <!-- Overskrift -->
  <h3 style="margin: 0;">Registrer klasse</h3>
</div>

<form method="post" action="">
  Klassekode <input type="text" name="klassekode" required /> <br/>
  Klassenavn <input type="text" name="klassenavn" required /> <br/>
  Studiumkode <input type="text" name="studiumkode" required /> <br/>
  <input type="submit" name="registrerKlasseKnapp" value="Registrer klasse" />
  <input type="reset" value="Nullstill" />
</form>

<?php
if (isset($_POST["registrerKlasseKnapp"])) {
  $klassekode = $_POST["klassekode"];
  $klassenavn = $_POST["klassenavn"];
  $studiumkode = $_POST["studiumkode"];

  include("db-tilkobling.php");

  $sql = "SELECT * FROM klasse WHERE klassekode='$klassekode';";
  $resultat = mysqli_query($db, $sql);
  $antall = mysqli_num_rows($resultat);

  if ($antall != 0) {
    print ("Klassekode finnes allerede.");
  } else {
    $sql = "INSERT INTO klasse VALUES('$klassekode', '$klassenavn', '$studiumkode');";
    mysqli_query($db, $sql) or die("Ikke mulig å registrere klassen.");
    print ("Klassen $klassekode er nå registrert.");
  }
}
?>