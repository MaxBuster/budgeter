<?php
/**
 * User: Max Buster
 * Date: 12/26/2016
 */
require_once "connect.inc.php";

function username_is_unique($username) {
    global $connection;

    $stmt = $connection->prepare('SELECT id FROM users WHERE username = ?');
    $stmt->bind_param('s', $username);

    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();

    if ($user_id != false) {
        $stmt->close();
        return false;
    } else {
        $stmt->close();
        return true;
    }
}

function username_is_valid($username) {
    return true;
}

function password_is_valid($username) {
    return true;
}
