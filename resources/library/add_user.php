<?php
/**
 * User: Max Buster
 * Date: 12/25/2016
 */
require_once "connect.inc.php";
require_once "check_new_user.inc.php";

if (isset($_POST['username']) && isset($_POST['password']) &&
    !empty($_POST['username']) && !empty($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_pass = md5($password);

    if (!username_is_unique($username)) {
        echo json_encode(array('registered'=>false, 'error'=>'Username already exists'));
        exit();
    } else if (!username_is_valid($username)) {
        echo json_encode(array('registered'=>false, 'error'=>'Invalid username'));
        exit();
    } else if (!password_is_valid($password)) {
        echo json_encode(array('registered'=>false, 'error'=>'Invalid password'));
        exit();
    }

    $stmt = $connection->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    $stmt->bind_param('ss', $username, $hashed_pass);

    $stmt->execute(); // TODO send error if execute fails

    $stmt->close();
    $connection->close();

    echo json_encode(array('registered' => true)); // TODO redirect to login
} else {
    echo json_encode(array('registered'=>false, 'error'=>'Username or password not set'));
}