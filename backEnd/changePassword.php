<?php

require_once __DIR__.'/../bootstrap.php';
Auth::auth();

if(isset($_POST['password']) && isset($_SESSION['uID'])) {
    $password = hash('sha256', $_POST['password']);
    $uID = $_SESSION['uID'];
    include_once 'pdo.php';
    if(execute("UPDATE `user` SET `password`='$password' WHERE `ID`='$uID'")) {
        exit(json_encode(['response' => 'success']));
    } else {
        exit(json_encode(['response' => 'error', 'error' => 'Passwort konnte nicht in die Datenbank hochgeladen werden. Ein Möglicher Grund dafür ist dass es den selben Wert wie bevohr hat.']));
    }
} else {
    exit(json_encode(['response' => 'error', 'error' => 'Kein Passwort übermittelt']));
}