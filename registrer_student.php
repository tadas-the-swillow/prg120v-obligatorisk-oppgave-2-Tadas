<?php /* registrer-student */ ?>

<h3>Registrer student</h3>

<form method="post" action="">
  Brukernavn <input type="text" name="brukernavn" required /> <br/>
  Fornavn <input type="text" name="fornavn" required /> <br/>
  Etternavn <input type="text" name="etternavn" required /> <br/>
  Klassekode 
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
  <br/>
  <input type="submit" name="registrerStudentKnapp" value="Registrer student" />
  <input type="reset" value="Nullstill" />
</form>

<?php
if (isset($_POST["registrerStudentKnapp"])) {
  $brukernavn = $_POST["brukernavn"];
  $fornavn = $_POST["fornavn"];
  $etternavn = $_POST["etternavn"];
  $klassekode = $_POST["klassekode"];

  include("db-tilkobling.php");

  $sql = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
  $resultat = mysqli_query($db, $sql);
  $antall = mysqli_num_rows($resultat);

  if ($antall != 0) {
    print ("Brukernavn finnes allerede.");
  } else {
    $sql = "INSERT INTO student VALUES('$brukernavn','$fornavn','$etternavn','$klassekode');";
    mysqli_query($db, $sql) or die("Ikke mulig å registrere studenten.");
    print ("Student $fornavn $etternavn er nå registrert.");
  }
}
?>