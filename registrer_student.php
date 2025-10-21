<?php include("db.php"); ?>

<h2>Registrer ny student</h2>

<form method="post">
  Brukernavn: <input type="text" name="brukernavn" required><br>
  Fornavn: <input type="text" name="fornavn" required><br>
  Etternavn: <input type="text" name="etternavn" required><br>

  Klassekode:
  <select name="klassekode" required>
    <option value="">Velg klasse</option>
    <?php
      $result = $conn->query("SELECT klassekode FROM klasse");
      while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['klassekode']}'>{$row['klassekode']}</option>";
      }
    ?>
  </select>
  <br>
  <input type="submit" name="lagre" value="Lagre">
</form>

<?php
if (isset($_POST['lagre'])) {
  $brukernavn = $_POST['brukernavn'];
  $fornavn = $_POST['fornavn'];
  $etternavn = $_POST['etternavn'];
  $klassekode = $_POST['klassekode'];

  $sjekk = $conn->prepare("SELECT * FROM student WHERE brukernavn = ?");
  $sjekk->bind_param("s", $brukernavn);
  $sjekk->execute();
  $res = $sjekk->get_result();

  if ($res->num_rows > 0) {
    echo "<p style='color:red;'>Brukernavn finnes allerede!</p>";
  } else {
    $stmt = $conn->prepare("INSERT INTO student VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $brukernavn, $fornavn, $etternavn, $klassekode);
    $stmt->execute();
    echo "<p>Student registrert!</p>";
  }
}
?>