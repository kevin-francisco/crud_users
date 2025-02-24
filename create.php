<?php
require 'db.php';
 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    
    if (!empty($name) && !empty($email)) {
        $sql = "INSERT INTO kfran.users (name, email) VALUES (?, ?)";
        $params = array($name, $email);   
        $stmt = sqlsrv_query($conn, $sql, $params);
        if ($stmt) {
            echo "<p>User created successfully!</p>";
        } else {
            echo "<p>Someting went wrong.</p>";
            echo "<pre>" . print_r(sqlsrv_errors(), true) . "</pre>";
        }
    } else {
        echo "<p>Fill all fields.</p>";
    }
}

?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h1>Create User</h1>
<form method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" placeholder="Enter Name" required><br><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" placeholder="Enter Email" required><br><br>
    <button type="submit">Create User</button>
</form>
<br>
<a href="read.php">View Users</a>
</body>
</html>