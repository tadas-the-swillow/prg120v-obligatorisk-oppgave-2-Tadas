<?php include("db.php"); ?>

<h2>Slett klasse</h2>
<form method="post" onsubmit="return confirm('Er du sikker på at du vil slette klassen?');">
  <select name="klassekode" required>
    <option value="">Velg klasse</option>
    <?php
      $result = $conn->query("SELECT klassekode FROM klasse");
      while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['klassekode']}'>{$row['klassekode']}</option>";
      }
    ?>
  </select>
  <input type="submit" name="slett" value="Slett">
</form>

<?php
if (isset($_POST['slett'])) {
  $kode = $_POST['klassekode'];

  // sjekk om det finnes studenter
  $sjekk = $conn->prepare("SELECT * FROM student WHERE klassekode = ?");
  $sjekk->bind_param("s", $kode);
  $sjekk->execute();
  $res = $sjekk->get_result();

  if ($res->num_rows > 0) {
    echo "<p style='color:red;'>Kan ikke slette klasse som har studenter!</p>";
  } else {
    $stmt = $conn->prepare("DELETE FROM klasse WHERE klassekode = ?");
    $stmt->bind_param("s", $kode);
    $stmt->execute();
    echo "<p>Klasse slettet.</p>";
  }
}
?>