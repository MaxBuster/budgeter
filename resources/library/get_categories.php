<?php
/**
 * User: Max Buster
 * Date: 12/29/2016
 */
require_once "connect.inc.php";

$names_to_amounts = [];
$ids_to_names = [];

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $stmt = $connection->prepare('SELECT id, category, amount FROM categories WHERE user_id = ?');
    $stmt->bind_param('s', $user_id);

    $stmt->execute();
    $stmt->bind_result($id, $category, $amount);

    while ($stmt->fetch()) {
        $names_to_amounts[$category] = $amount;
        $ids_to_names[$id] = $category;
    }

    $stmt->close();
    $connection->close();
}