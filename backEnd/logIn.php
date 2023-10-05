<?php

include 'pdo.php';
$pdo = connect();

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['rememberMe'])) {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);   
    $remember_me = $_POST['rememberMe']; 
    $user = select("SELECT `ID`, `password`, `authLevel` FROM `user` WHERE `username`='$username'")[0];
    if($password === $user['password']) {
        $token = bin2hex(random_bytes(32));
        $uID = $user['ID'];
        if(!execute("UPDATE `session_tokens` SET `token`='$token' WHERE `uID`='$uID'")) {
            echo json_encode(['response' => 'fail', 'error' => 'Neuer Session Token konnte nicht hochgeladen werden']);         
        } else {            
            ini_set('session.cookie_samesite', 'None');
            ini_set('session.cookie_secure', 0);
            session_start();
            session_regenerate_id(true);
            $_SESSION['token'] = $token;
            $_SESSION['uID'] = $uID;
            if($user['authLevel'] != 1) {
                $_SESSION['auth'] = $user['authLevel'];
            }
            // if remember me -> cookie for 30 days
            if($remember_me) {
                $expiry = time() + (30 * 24 * 60 * 60);
                $signature = hash_hmac('sha256', $token, '1c985d6299b008c4630d30dc44a1ef6f9b3294f17b6661e1f30a02d2b7407fec');
                setcookie('token', $token . ':' . $signature, $expiry, '/', '', true, true);
                setcookie('uID', $uID, $expiry, '/', '', true, true);
            }
            echo json_encode(['response' => 'success']);
        }
    } else {
        echo json_encode(['response' => 'fail', 'error' => 'Passwort Falsch']);
    }
} else {
    echo json_encode(['response' => 'fail', 'error' => 'Anfrage fehlerhaft', 'devLog' => 'POST parameter missing']);
}