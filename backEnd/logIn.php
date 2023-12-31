<?php

require_once __DIR__.'/../bootstrap.php';
$pdo = connect();

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);   
    $remember_me = 0; # Veraltetes Feature - für funktion immer auf false gesetzt → keine Cookies Speichern
    $user = select("SELECT `ID`, `password`, `authLevel` FROM `user` WHERE `username`='$username'");
    if(count($user) !== 1) {
        exit(json_encode(['response' => 'fail', 'error' => 'Passwort Falsch']));
    }
    $user = $user[0];
    if($password === $user['password']) {
        $token = bin2hex(random_bytes(32));
        $uID = $user['ID'];
        if(!execute("UPDATE `session_tokens` SET `token`='$token' WHERE `uID`='$uID'")) {
            echo json_encode(['response' => 'fail', 'error' => 'Neuer Session Token konnte nicht hochgeladen werden']);         
        } else {            
            #ini_set('session.cookie_samesite', 'None');
            #ini_set('session.cookie_secure', 0);
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
                setcookie('token', $token . ':' . $signature, $expiry, '/', '', $_ENV['COOKIES_ONLY_SAME_SITE'], true);
                setcookie('uID', $uID, $expiry, '/', '', $_ENV['COOKIES_ONLY_SAME_SITE'], true);
            }
            echo json_encode(['response' => 'success']);
        }
    } else {
        echo json_encode(['response' => 'fail', 'error' => 'Eingabe falsch']);
    }
} else {
    echo json_encode(['response' => 'fail', 'error' => 'Anfrage fehlerhaft', 'devLog' => 'POST parameter missing']);
}