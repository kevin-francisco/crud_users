<?php

$serverName = "10.199.9.61";
$connectionOptions = [
    "Database" => "dev_playground",
    "Uid" => "sscadm",
    "PWD" => "s\$c@dm!098*"
];

$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die("Failed Connection: " . print_r(sqlsrv_errors(), true));
}
?>