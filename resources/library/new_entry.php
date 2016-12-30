<?php
/**
 * User: Max Buster
 * Date: 12/29/2016
 */
require_once "connect.inc.php";

session_start();

if (isset($_SESSION['user_id']) && isset($_POST['date']) && isset($_POST['category_id']) && isset($_POST['amount'])){

    $user_id = $_SESSION['user_id'];
    $date = $_POST['date'];
    $category_id = $_POST['category_id'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];

    $stmt = $connection->prepare('INSERT INTO transactions (user_id, entry_date, category_id, amount, description) 
                                  VALUES (?, ?, ?, ?, ?)');
    $stmt->bind_param('isiis', $user_id, $date, $category_id, $amount, $description);

    $stmt->execute(); // TODO send error if execute fails

    $stmt->close();
    $connection->close();

    echo json_encode(array('added'=>true));
    exit();
} else {
    echo json_encode(array('added'=>false));
    exit();
}