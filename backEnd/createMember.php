<?php

include_once 'auth.php';
include_once 'sendWelcomeMail.php';
if(!checkAdmin()) {
    exit("Admin Rechte erforderlich");
}

if(isset($_GET['first_name']) && isset($_GET['last_name']) && isset($_GET['date_of_enter']) && isset($_GET['email'])) {
    if(isset($_GET['title'])) {
        $title = $_GET['title'];
    } else {
        $title = '';
    }
    if(isset($_GET['second_title'])) {
        $second_title = $_GET['second_title'];
    } else {
        $second_title = '';
    }
    if(isset($_GET['text'])) {
        $text = $_GET['text'];
    } else {
        $text = '';
    }
    $first_name = $_GET['first_name'];
    $last_name = $_GET['last_name'];
    $date_of_enter = $_GET['date_of_enter'];
    $email = $_GET['email'];
    $passwd = bin2hex(random_bytes(4));
    $passwdHex = hash('sha256', $passwd);
    include_once 'pdo.php';
    if(!empty(select("SELECT `ID` FROM `user` WHERE `username`='$email'"))) {
        exit("<div class='alert alert-warning' role='alert'><p>Es exestiert bereits ein Benutzer mit der selben E-Mail Adresse</p></div>");
    }
    execute("INSERT INTO `user`(`title`, `first name`, `last name`, `second title`, `date_of_enter`, `note`, `username`, `password`) VALUES ('$title','$first_name','$last_name','$second_title','$date_of_enter','$text','$email','$passwdHex')");
    $userData = select("SELECT `ID` FROM user WHERE `username`='$email'");
    $uID = $userData[0]['ID'];
    execute("INSERT INTO `bank_accounts`(`uID`, `IBAN`, `IBAN_clear`, `BIC`, `bank`) VALUES ('$uID','','','','')");
} else {
    exit("required Data missing");
}