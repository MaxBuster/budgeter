<?php
/**
 * User: Max Buster
 * Date: 12/29/2016
 */
require "connect.inc.php";

$entries = [];
$spend = [];
$spend[0] = 0;
$spend_sum = 0;

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $stmt = $connection->prepare('SELECT t.entry_date, c.category, t.amount, t.description 
                                  FROM transactions AS t JOIN categories AS c ON t.category_id = c.id
                                  WHERE t.user_id = ?');
    $stmt->bind_param('s', $user_id);

    $stmt->execute();
    $stmt->bind_result($entry_date, $category_id, $amount, $description);

    while ($stmt->fetch()) {
        $entry = [$entry_date, $category_id, $amount, $description];
        $spend_sum +=  $amount;
        $date = DateTime::createFromFormat('Y-m-d', $entry_date)->format('d');
        $spend[$date] = $spend_sum;
        $entries[] = $entry;
    }

    $stmt->close();
    $connection->close();
}