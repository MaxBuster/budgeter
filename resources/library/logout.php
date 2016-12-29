<?php
/**
 * User: Max Buster
 * Date: 12/28/2016
 */

session_start();
session_destroy();
header('Location: ../../public_html/login.php');