<?php include("db.php"); ?>

<h2>Registrer ny klasse</h2>

<form method="post">
  Klassekode: <input type="text" name="klassekode" required><br>
  Klassenavn: <input type="text" name="klassenavn" required><br>
  Studiumkode: <input type="text" name="studiumkode" required><br>
  <input type="submit" name="lagre" value="Lagre">
</form>

<?php
if (isset($_POST['lagre'])) {
  $kode = $_POST['klassekode'];
  $navn = $_POST['klassenavn'];
  $studium = $_POST['studiumkode'];

  $sjekk = $conn->prepare("SELECT * FROM klasse WHERE klassekode = ?");
  $sjekk->bind_param("s", $kode);
  $sjekk->execute();
  $resultat = $sjekk->get_result();

  if ($resultat->num_rows > 0) {
    echo "<p style='color:red;'>Klassekode finnes allerede!</p>";
  } else {
    $stmt = $conn->prepare("INSERT INTO klasse VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $kode, $navn, $studium);
    $stmt->execute();
    echo "<p>Klasse registrert!</p>";
  }
}
?>