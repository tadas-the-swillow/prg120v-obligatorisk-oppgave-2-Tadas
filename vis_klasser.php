<?php /* vis-klasser */ ?>
<h3>Alle klasser</h3>

<?php
include("db-tilkobling.php");

$sql = "SELECT * FROM klasse;";
$resultat = mysqli_query($db, $sql);

print ("<table border='1'>");
print ("<tr><th>Klassekode</th><th>Klassenavn</th><th>Studiumkode</th></tr>");
while ($rad = mysqli_fetch_array($resultat)) {
  $kode = $rad["klassekode"];
  $navn = $rad["klassenavn"];
  $studium = $rad["studiumkode"];
  print ("<tr><td>$kode</td><td>$navn</td><td>$studium</td></tr>");
}
print ("</table>");
?>