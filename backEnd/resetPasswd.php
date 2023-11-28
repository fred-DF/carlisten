<?php

require_once __DIR__.'/../bootstrap.php';

if(isset($_GET['email'])) {
    $email = $_GET['email'];
    $user = select("SELECT `ID`, `title`, `first name`, `last name`, `second title`, `username`, `authLevel` FROM `user` WHERE `username`='$email' LIMIT 1")[0];
    if(empty($user)) {
        exit("E-Mail Adresse nicht in der Datenbank gefunden");
    } elseif(count($user) < 7) {
        exit("Mehrere Konten mit Query Selector gefunden. Bitte nach Manuellem Reset Fragen");
    }
    $code = mt_rand(100000, 999999);
    $uID = $user['ID'];
    $name = $user['first name'] . " " . $user['last name'];
    $creator = "Password Reset";
    if (empty(select("SELECT `ID` FROM `register_challenges` WHERE `code`='$code'"))) {
        $code = mt_rand(100000, 999999);
    }
    if (!execute("INSERT INTO `register_challenges`(`uID`, `code`, `name`, `created_by`, `email`) VALUES ('$uID','$code','$name','$creator','$email')")) {
        exit(json_encode(['response' => 'error', 'error' => 'Eintrag in die Datenbank fehlgeschlagen']));
    }
    $passwd = bin2hex(random_bytes(4));
    $passwdHex = hash('sha256', $passwd);
    $name   = $user['title']." ".$user['last name'];
    $to = $_GET['email'];
    $subject = "Passwortänderung auf Carlisten.de";
   $message = "
    <html>
    <head>
    <style>
    /* CSS-Styling für die E-Mail */
    body {
        font-family: 'Inter', sans-serif;
        font-size: 16px;
        line-height: 1.5;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        background-color: #f7f7f7;
        padding: 20px;
        border-radius: 8px;
    }

    .headbar {
        background-color: #003366;
        color: #fff;
        font-weight: 700;
        font-size: 24px;
        text-align: center;
        padding: 10px;
        margin-bottom: 20px;
    }

    .button {
        display: inline-block;
        background-color: #003366;
        color: #fff;
        font-weight: 700;
        font-size: 16px;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 4px;
        border: none;
        margin: 15px 0;
    }
    
    .button:hover {
        background-color: rgba(0,51,102,0.8);
    }
    
    .code-box {
        background-color: #e8e8e8;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 4px;
    }

    </style>
    </head>
    <body>
    <div class='headbar'>
    <img src='https://carlisten.genanntnoelke.de/src/logos/Logo%20-%20Text%20-%20Weiss.svg' alt=''>
    </div>
    <div class='container'>
    <p>Hallo Herr {$name},</p>
    <p>Ihr Passwort für den Mitgliederberreich der Carlisten-Hompage wurde zurückgesetzt.</p>
    <p>Legen Sie bitte Ihr neues Passwort mit folgendem Code fest:</p>
    <div class='code-box' style='text-align: center'><pre>{$code}</pre></div>
    <a href='https://carlisten.genanntnoelke.de/reset-password'>> Passwort festlegen</a>
    <p>Viele Grüße</p>
    <p>Das Carlisten-Team</p>
    </div>
    </body>
    </html>
    "; 


    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Carlisten <noreply@carlisten.de>" . "\r\n";

    if(!mail($to,$subject,$message,$headers)) {
        exit("mail() Error - pleas try again");
    }
    execute("UPDATE `user` SET `password`='$passwdHex' WHERE `username`='$email'");
    echo "Passwort zurückgesetzt";
}