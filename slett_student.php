<?php include("db.php"); ?>

<h2>Slett student</h2>
<form method="post" onsubmit="return confirm('Er du sikker på at du vil slette studenten?');">
  <select name="brukernavn" required>
    <option value="">Velg student</option>
    <?php
      $result = $conn->query("SELECT brukernavn FROM student");
      while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['brukernavn']}'>{$row['brukernavn']}</option>";
      }
    ?>
  </select>
  <input type="submit" name="slett" value="Slett">
</form>

<?php
if (isset($_POST['slett'])) {
  $brukernavn = $_POST['brukernavn'];
  $stmt = $conn->prepare("DELETE FROM student WHERE brukernavn = ?");
  $stmt->bind_param("s", $brukernavn);
  $stmt->execute();
  echo "<p>Student slettet.</p>";
}
?>