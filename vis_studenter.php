<?php /* vis-studenter */ ?>
<h3>Alle studenter</h3>

<?php
include("db-tilkobling.php");

$sql = "SELECT * FROM student;";
$resultat = mysqli_query($db, $sql);

print ("<table border='1'>");
print ("<tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klassekode</th></tr>");
while ($rad = mysqli_fetch_array($resultat)) {
  $bn = $rad["brukernavn"];
  $fn = $rad["fornavn"];
  $en = $rad["etternavn"];
  $kk = $rad["klassekode"];
  print ("<tr><td>$bn</td><td>$fn</td><td>$en</td><td>$kk</td></tr>");
}
print ("</table>");
?>