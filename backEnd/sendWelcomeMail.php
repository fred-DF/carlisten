<?php

require_once __DIR__.'/../bootstrap.php';
Auth::auth();

include_once 'mail.php';

function sendWelcomeMail ($user) {
    if($user == "all") {
        $users = select("SELECT `ID`, `first name`, `last name`, `username` FROM `user`");
        foreach($users as $user) {
            $code = mt_rand(100000, 999999);
            $uID = $user['ID'];
            $name = $user['first name']." ".$user['last name'];
            $email = $user['username'];
            $creator = $_SESSION['uID'];
            if(empty(select("SELECT `ID` FROM `register_challenges` WHERE `code`='$code'"))) {                
                $code = mt_rand(100000, 999999);
            }
            if(!execute("INSERT INTO `register_challenges`(`uID`, `code`, `name`, `created_by`, `email`) VALUES ('$uID','$code','$name','$creator','$email')")) {
                echo json_encode(['response' => 'error', 'error' => 'Eintrag in die Datenbank fehlgeschlagen']);
            }
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
                }

                .button:hover {
                    background-color: rgba(0,51,102,0.63);
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
                <p>Hallo {$name},</p>
                <p>für Sie wurde so eben ein Account mit zugang zum neuen Mitglieder Bereich angelegt.</p>
                <p>Um deinen Account freizuschalten, musst du auf der verlinkten Website folgenden Code eingeben.</p>
                <p>Danach wirst du gebeten ein Passwort fest zulegen.</p>                
                <div class='code-box' style='text-align: center'><pre>Code: {$code}</pre></div>
                <p>Bitte schalte dein Account zeitnah frei!</p>
                <a href='https://carlisten.genanntnoelke.de/welcome'><button class='button'>Freischalten</button></a>
                <a href='https://carlisten.genanntnoelke.de/welocme'>oder gehen Sie bitte auf https://carlisten.genanntnoelke.de/welcome falls der Link nicht funktniert</a>
                <p>Viele Grüße</p>
                <p>Das Carlisten-Team</p>
                </div>
                </body>
                </html>
                "; 
            sendMail($email, 'Carlisten <mitglieder@'.$_ENV['MAIL_HOST'].'>', 'Account freischalten', $message);
        }
    } else {
        $user = select("SELECT `ID`, `first name`, `last name`, `username` FROM `user` WHERE `ID`='$user'");
        foreach($user as $user) {
            $code = mt_rand(100000, 999999);
            $uID = $user['ID'];
            $name = $user['last name'];
            $email = $user['username'];
            $creator = $_SESSION['uID'];
            if(empty(select("SELECT `ID` FROM `register_challenges` WHERE `code`='$code'"))) {                
                $code = mt_rand(100000, 999999);
            }
            if(!execute("INSERT INTO `register_challenges`(`uID`, `code`, `name`, `created_by`, `email`) VALUES ('$uID','$code','$name','$creator','$email')")) {
                echo json_encode(['response' => 'error', 'error' => 'Eintrag in die Datenbank fehlgeschlagen']);
            }
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
                    border: none;
                    cursor: pointer;
                    border-radius: 4px;
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
                <p>für Sie wurde soeben ein Account mit Zugang zum neuen Mitgliederbereich der Carlisten angelegt.</p>
                <p>Um Ihren Account freizuschalten, gehen Sie bitte auf 'Freischalten' und geben folgenden Code ein:</p>   
                <div class='code-box' style='text-align: center'><pre>Code: {$code}</pre></div>
                <p>Danach legen Sie bitte ein Passwort fest.</p>
                <a href='https://carlisten.genanntnoelke.de/welcome' target='_blank'><button class='button'>Freischalten</button></a>
                <a href='https://carlisten.genanntnoelke.de/welocme'>oder gehen Sie bitte auf https://carlisten.genanntnoelke.de/welcome falls der Link nicht funktniert</a>
                <p>Mit freundlichen Grüßen</p>
                <p>Der Vorstand</p>
                </div>
                </body>
                </html>
                ";
            echo sendMail($email, 'Carlisten <mitglieder@'.$_ENV['MAIL_HOST'].'>', 'Account freischalten', $message);
        }
    }
}

if(isset($_GET['sendWelcomeMail']) && isset($_GET['to'])) {
    sendWelcomeMail($_GET['to']);
}