<?php

error_reporting(E_ALL);
include_once 'auth.php';
if(!checkAdmin()) {
    exit("Admin Rechte erforderlich");
}

function sendMail ($to, $from, $subject, $message) {
    // Berechtigungsüberprüfung hier
            
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: noreply@carlisten.de" . "\r\n";
    if (mail($to, $subject, $message,$headers)) {
        echo "E-Mail erfolgreich versendet.";
    } else {
        echo "Fehler beim Senden der E-Mail.";
    }
}

?>
