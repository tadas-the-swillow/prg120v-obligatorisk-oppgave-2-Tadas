<?php
/* kobler til databasen */
$host = "localhost";
$user = "root";    // endre til dokploy-bruker ved behov
$pass = "";
$dbnavn = "skole";

$db = mysqli_connect($host, $user, $pass, $dbnavn) or die ("Ikke kontakt med database-server");
?>