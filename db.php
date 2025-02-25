<?php

$serverName = "10.199.9.61";
$connectionOptions = [
   
];

$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die("Failed Connection: " . print_r(sqlsrv_errors(), true));
}
?>