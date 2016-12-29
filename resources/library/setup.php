<?php
/**
 * User: Max Buster
 * Date: 12/21/2016
 */
require "connect.inc.php";

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
//$user_id = $_SESSION['user_id'];


if (isset($_POST['monthly_budget'])) {
    $monthly_budget = $_POST['monthly_budget'];

    $stmt = $connection->prepare('INSERT INTO budget (user_id, amount) VALUES (?, ?)');
    $stmt->bind_param('ii', $user_id, $monthly_budget);
    $stmt->execute();

    $stmt->close();

    echo 'Monthly budget set to: ' . $monthly_budget;
} else if (isset($_POST['category']) &&
    isset($_POST['category_budget'])){

    $category = $_POST['category'];
    $category_budget = $_POST['category_budget'];

    $stmt = $connection->prepare('INSERT INTO categories (user_id, category, amount) VALUES (?, ?, ?)');
    $stmt->bind_param('isi', $user_id, $category, $category_budget);
    $stmt->execute();

    $stmt->close();

    echo 'Category: ' . $category . ' set to monthly cost of: ' . $category_budget;
}

$connection->close();