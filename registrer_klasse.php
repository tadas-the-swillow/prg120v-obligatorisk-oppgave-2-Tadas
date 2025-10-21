<?php /* registrer-klasse */ ?>

<h3>Registrer klasse</h3>

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