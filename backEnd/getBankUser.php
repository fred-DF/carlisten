<?php

require_once __DIR__.'/../bootstrap.php';
if(!Auth::checkAdmin()) {
    header('HTTP/1.1 403');
    exit();
}

$user = [];
$bankUsers = select("SELECT `ID`, `uID` FROM `bank_accounts`");
//var_dump($bankUsers);
foreach ($bankUsers as $bankUser) {
//    var_dump($bankUser);
//    echo $bankUser['uID'];
    $userData = select("SELECT `ID`, `title`, `first name`, `last name`, `second title` FROM `user` WHERE `ID`='".$bankUser['uID']."'");
    if(count($userData) === 1) {
        array_push($user, $userData[0]);
    }
}

exit(json_encode($user));