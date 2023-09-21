<?php

session_start();

if(isset($_SESSION['check_code_attempts'])) {
    if($_SESSION['check_code_attempts'] > 3) {
        exit(json_encode(['response' => 'error', 'error' => 'Zu viele Versuche']));
    }
    //$_SESSION['check_code_attempts']++;
} else {
    $_SESSION['check_code_attempts'] = 1;
}

if(isset($_GET['code'])) {
    include 'pdo.php';
    $code = $_GET['code'];
    $challenge = select("SELECT `ID`, `uID`, `name`, `created`, `done`, `created_by`, `email` FROM `register_challenges` WHERE `code`='$code' LIMIT 1");
    if(!empty($challenge)) {
        $challenge = $challenge[0];
        if($challenge['done'] !== '0000-00-00 00:00:00') {
            exit(json_encode(['response' => 'error', 'error' => 'Der eingegebene Code ist bereits genutzt.']));
        }
        $_SESSION['set_password_data'] = json_encode($challenge);
        exit(json_encode(['response' => 'success']));
    } else {
        exit(json_encode(['response' => 'error', 'error' => 'Der eingegebene Code ist fehlerhaft. Achten sie auf die genaue übernahme aus der E-Mail.']));
    }
} else {
    exit();
}