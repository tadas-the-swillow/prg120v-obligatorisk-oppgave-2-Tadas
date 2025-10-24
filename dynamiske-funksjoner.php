<?php  
/*
   Denne filen inneholder dynamiske funksjoner for:
   - listeboksKlassekode()
   - listeboksBrukernavn()
*/

/* Lager en listeboks med alle klasser */
function listeboksKlassekode()
{
  include("db-tilkobling.php");  // kobler til databasen

  $sqlSetning = "SELECT * FROM klasse ORDER BY klassekode;";
  $sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");

  while ($rad = mysqli_fetch_array($sqlResultat))
  {
    $klassekode = $rad["klassekode"];
    $klassenavn = $rad["klassenavn"];
    print("<option value='$klassekode'>$klassekode - $klassenavn</option>");
  }
}

/* Lager en listeboks med alle studenter */
function listeboksBrukernavn()
{
  include("db-tilkobling.php");  // kobler til databasen

  $sqlSetning = "SELECT * FROM student ORDER BY brukernavn;";
  $sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");

  while ($rad = mysqli_fetch_array($sqlResultat))
  {
    $brukernavn = $rad["brukernavn"];
    $fornavn = $rad["fornavn"];
    $etternavn = $rad["etternavn"];
    print("<option value='$brukernavn'>$brukernavn - $fornavn $etternavn</option>");
  }
}
?>
