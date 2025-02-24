<?php
require 'db.php';
 
$id = $_GET['id'] ?? null;
if ($id === null) {
    die("UserID not specified.");
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
 
    if ($name && $email) {
        $sql = "UPDATE kfran.users SET name = ?, email = ? WHERE id = ?";
        $params = [$name, $email, $id];
        $stmt = sqlsrv_query($conn, $sql, $params);
        if ($stmt) {
            echo "<p> Updated successfully. </p><a href='read.php'>Back to User List</a>";
        } else {
            echo "<p> Error updating: " . print_r(sqlsrv_errors(), true) . "</p>";
        }
    } else {
        echo "<p>Fill in all fields.</p>";
    }
}
$sql = "SELECT name, email FROM kfran.users WHERE id = ?";
$stmt = sqlsrv_query($conn, $sql, [$id]);
$user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

if (!$user) {
    die(" User not found.");
}
?>
<!DOCTYPE html>
<head>
<title>User List</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Update User</h2>
<form method="post">
    Name: <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required><br><br>
    Email: <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br><br>
    <button type="submit">Update User</button>
</form>
<a href="read.php">Back to List</a>
</body>
