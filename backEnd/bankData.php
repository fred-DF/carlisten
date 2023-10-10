<?php

require_once __DIR__.'/../bootstrap.php';
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;

// Laden der Authentifizierungsfunktion


// Überprüfen der Authentifizierung
Auth::auth();

// Empfangen der Daten
$data = json_decode(file_get_contents('php://input'), true);

// Überprüfen, ob das Update-Flag gesetzt ist
if(isset($data['update'])) {

    // Verbindungsaufbau-Check
    if (isset($data['verbindungsaufbau'])) {
        $secure = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] != "off";
        $response = json_encode(['step' => 'verbindungsaufbau', 'secure' => $secure]);
        exit($response);
    } elseif(isset($data['updateData'])) {
        $key = Key::loadFromAsciiSafeString($_ENV['BANK_DATA_KEY']);
        $iban = Crypto::encrypt($data['iban'], $key);
        $bic = Crypto::encrypt($data['bic'], $key);
        $bank = Crypto::encrypt($data['bank'], $key);

        $iban_clear = substr($data['iban'], -6);

        $uID = $_SESSION['uID'];

        execute("UPDATE `bank_accounts` SET `IBAN`='$iban',`IBAN_clear`='$iban_clear',`BIC`='$bic',`bank`='$bank' WHERE `uID`='$uID'");
    }
} elseif (isset($data['getData'])) {
    if($data['getData'] == "admin" && isset($data['uID']) && Auth::checkAdmin()) {
        $key = Key::loadFromAsciiSafeString($_ENV['BANK_DATA_KEY']);
        $uID = $data['uID'];
        $bankData = select("SELECT `IBAN`, `BIC`, `bank` FROM `bank_accounts` WHERE `uID`='$uID' LIMIT 1")[0];
        $iban = Crypto::decrypt($bankData['IBAN'], $key);
        $bic = Crypto::decrypt($bankData['BIC'], $key);
        $bank = Crypto::decrypt($bankData['bank'], $key);
        echo json_encode(['iban' => $iban, 'bic' => $bic, 'bank' => $bank]);
    } else {
        echo 'Paramter Missing';
    }
} else {
    echo 'No request';
}