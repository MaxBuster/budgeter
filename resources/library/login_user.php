<?php
/**
 * User: Max Buster
 * Date: 12/26/2016
 */
require_once "connect.inc.php";

if (isset($_POST['username']) && isset($_POST['password']) &&
    !empty($_POST['username']) && !empty($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $credentials = check_credentials($username, $password);

    if ($credentials != null) {
        session_start();
        $_SESSION['user_id'] = $credentials;
        echo json_encode(array('authenticated' => true));
        // TODO add where to redirect to
    } else {
        echo json_encode(array('authenticated' => false, 'error'=>'Incorrect username/password'));
    }

} else {
    echo json_encode(array('authenticated' => false, 'error' => 'Username or password not set'));
    exit();
}


function check_credentials($input_username, $input_password) {
    global $connection;

    $stmt = $connection->prepare('SELECT id, password FROM users WHERE username = ?');
    $stmt->bind_param('s', $input_username);

    $stmt->execute();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    // TODO check if result is empty
    if (password_verify($input_password, $hashed_password)) {
        $stmt->close();
        return $id;
    }  else {
        $stmt->close();
        return null;
    }
}