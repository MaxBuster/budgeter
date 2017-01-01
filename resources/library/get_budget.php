<?php
/**
 * User: Max Buster
 * Date: 12/29/2016
 */
require "connect.inc.php";

$budget = 0;

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $stmt = $connection->prepare('SELECT amount FROM budget WHERE user_id = ?');
    $stmt->bind_param('i', $user_id);

    $stmt->execute();
    $stmt->bind_result($budget);

    $stmt->fetch();

    $stmt->close();
    $connection->close();
}