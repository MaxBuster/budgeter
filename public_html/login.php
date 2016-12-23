<?php
/**
 * User: Max Buster
 * Date: 12/21/2016
 */
require "../resources/library/connect.inc.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $hashed_pass = md5($_POST['password']);

    $stmt = $connection->prepare('SELECT id FROM users WHERE username=? AND password=?');
    $stmt->bind_param('ss', $username, $hashed_pass);
    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();

    if ($user_id == false) {
        echo "Wrong username or password";
    } else {
        session_start();
        $_SESSION['user_id'] = $user_id;
        header('Location: setup.php');
        // TODO redirect to setup or new transaction
        // TODO add an sid to user db and browser
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
    Username:<input type="text" name="username"><br>
    Password:<input type="password" name="password"><br>
    <input type="submit">

    <a href="register.php">New user? Register here</a>
</form>
</body>
</html>
