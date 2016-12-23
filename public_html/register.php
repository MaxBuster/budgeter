<?php
/**
 * User: Max Buster
 * Date: 12/21/2016
 */
require "../resources/library/connect.inc.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $hashed_pass = md5($_POST['password']);

    $stmt = $connection->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    $stmt->bind_param('ss', $username, $hashed_pass);
    $stmt->execute();

    $stmt->close();
}

$connection->close();

?>

<html>
    <head>
        <title>Register</title>
    </head>

    <body>
        <h1>Register</h1>
        <form method="POST">
            Username:<input type="text" name="username"><br>
            Password:<input type="password" name="password"><br>
            <input type="submit">
        </form>

        <a href="login.php">Already registered? Login here</a>
    </body>
</html>
