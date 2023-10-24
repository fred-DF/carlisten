<?php

include_once __DIR__.'/../bootstrap.php';

if(isset($_POST['uID'])) {
    $uID = $_POST['uID'];
    $mail = $_POST['mail'];
    $bank = $_POST['bank'];

    execute("INSERT INTO `user`(`typeMailing`, `data_filled`) VALUES ('".$mail."','1')");
}

header('Location: ../linkToMember.php');