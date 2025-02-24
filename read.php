<?php
require 'db.php';
$sql = "SELECT id, name, email FROM kfran.users";
$stmt = sqlsrv_query($conn, $sql);
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Users List</h1>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Actions</th>
        </tr>
        <?php while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['email']; ?></td>
            <td>
                <a href="update.php?id=<?= $row['id']; ?>">Edit</a> |
                <a href="delete.php?id=<?= $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="create.php">Add New User</a>
</body>
</html>