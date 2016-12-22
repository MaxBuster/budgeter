<?php
/**
 * User: Max Buster
 * Date: 12/21/2016
 */
$HOST = 'localhost';
$USER = 'max';
$PASS = 'admin';
$DB = 'budgeter';

// object oriented mysqli connection
$connection = new mysqli($HOST, $USER, $PASS, $DB);

// check for connection error
if ($connection->connect_error) {
    die("DB Connection Error");
}