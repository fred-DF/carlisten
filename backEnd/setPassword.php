<?php

session_start();
if(isset($_SESSION['set_password_data']) && isset($_GET['password'])) {
    $userData = json_decode($_SESSION['set_password_data'], 1);
    $password = hash('sha256', $_GET['password']);
    $uID = $userData['uID'];
    $ID = $userData['ID'];
    include 'pdo.php';
    if(!execute("UPDATE `user` SET `password`='$password' WHERE `ID`='$uID'")) {
        exit(json_encode(['response' => 'error', 'error' => 'Passwort konnte nicht gespeichert werden.']));
    }
    execute("UPDATE `register_challenges` SET `done`=CURRENT_TIMESTAMP() WHERE `ID`='$ID'");
    exit(json_encode(['response' => 'success']));
} else {
    exit(json_encode(['response' => 'error', 'error' => 'Es wurden nicht alle erforderlichen Daten übermittelt']));
}