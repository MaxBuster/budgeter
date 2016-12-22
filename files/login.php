<?php
/**
 * User: Max Buster
 * Date: 12/21/2016
 */
require "../db_utils/connect.inc.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $hashed_pass = md5($_POST['password']);

    $stmt = $connection->prepare('SELECT id FROM users WHERE username=? AND password=?');
    $stmt->bind_param('ss', $username, $hashed_pass);
    $stmt->execute();
    $stmt->bind_result($id);
    $stmt->fetch();

    if ($id == false) {
        // TODO not logged in
    } else {
        // TODO set session
    }

    $stmt->close();
}

$connection->close();

?>

<html>
<head>
    <title>Login</title>
</head>

<body>
<h1>Login</h1>
<form method="POST">
    Username:<input type="text" name="username">
    Password:<input type="password" name="password">
    <input type="submit">
</form>
</body>
</html>
