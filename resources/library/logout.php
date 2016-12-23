<?php
/**
 * User: Max Buster
 * Date: 12/21/2016
 */

if (isset($_SESSION['user_id'])) {
    session_destroy();
}

// TODO redirect to login