<?php
/**
 * User: Max Buster
 * Date: 12/29/2016
 */
require_once "connect.inc.php";

session_start();

if (isset($_SESSION['user_id']) && isset($_POST['category']) && isset($_POST['amount'])){

    $user_id = $_SESSION['user_id'];
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    $stmt = $connection->prepare('INSERT INTO categories (user_id, category, amount) VALUES (?, ?, ?)');
    $stmt->bind_param('isi', $user_id, $category, $amount);

    $stmt->execute(); // TODO send error if execute fails

    $stmt->close();
    $connection->close();

    echo json_encode(array('added'=>true));
    exit();
} else {
    echo json_encode(array('added'=>false));
    exit();
}