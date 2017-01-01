<?php
/**
 * User: Max Buster
 * Date: 12/29/2016
 */
require_once "connect.inc.php";

session_start();

if (isset($_SESSION['user_id']) && isset($_POST['budget'])){

    $user_id = $_SESSION['user_id'];
    $budget = $_POST['budget'];

    $stmt = $connection->prepare('INSERT INTO budget (user_id, amount) VALUES (?, ?) ON DUPLICATE KEY UPDATE amount = ?');
    $stmt->bind_param('iii', $user_id, $budget, $budget);

    $stmt->execute(); // TODO send error if execute fails

    $stmt->close();
    $connection->close();

    echo json_encode(array('added'=>true));
    exit();
} else {
    echo json_encode(array('added'=>false));
    exit();
}