<?php

require_once __DIR__.'/../bootstrap.php';
Auth::auth();

$pdo = connect();

if(isset($_GET['user-data'])) {
} else {
    $members = select('SELECT `ID`, `title`, `first name`, `last name`, `second title`, `profile pic url`, `private_telephone`, `private_mobile`, `private_web`, `private_email`, `professional_company`, `professional_job`, `professional_telephone`, `professional_mobile`, `professional_email` FROM `user`');
    $membersJSON = [];
    foreach ($members as $value) {
        array_push($membersJSON, json_encode($value));
    }
    echo json_encode($membersJSON);
}

function getUser ($uID) {
    $user_data = $uID;
    $members = select("SELECT `ID`, `title`, `first name`, `last name`, `second title`, `profile pic url`, `private_telephone`, `private_mobile`, `private_web`, `private_email`, `professional_company`, `professional_job`, `professional_telephone`, `professional_mobile`, `professional_email` FROM `user` WHERE `ID`='$user_data'");
    $membersJSON = [];
    foreach ($members as $value) {
        array_push($membersJSON, json_encode($value));
    }
    echo json_encode($membersJSON);
}