<?php
/* kobler til databasen */
$host = "MariaDB";
$user = "tajog5618";    // endre til dokploy-bruker ved behov
$pass = "08d6tajog5618";
$dbnavn = "tajog5618";

$db = mysqli_connect($host, $user, $pass, $dbnavn) or die ("Ikke kontakt med database-server");
?>