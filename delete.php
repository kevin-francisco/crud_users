<?php
require 'db.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $sql = "DELETE FROM kfran.users WHERE id = ?";
    $stmt = sqlsrv_query($conn, $sql, [$id]);

    if ($stmt) {
        echo "<p> User Deleted. </p>";
    } else {
        echo "<p> Error deleting user: " . print_r(sqlsrv_errors(), true) . "</p>";
    }
} else {
    echo "<p> User ID not provided. </p>";
}
echo "<a href='read.php'>Back to List</a>";
sqlsrv_close($conn);
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
