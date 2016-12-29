<?php
include_once 'logged_in.inc.php';

if (isset($unlocked_page)) {
    if ($logged_in) {
        header('Location: new_entry.php');
    }
} else {
    if (!$logged_in) {
        header('Location: login.php');
    }
}