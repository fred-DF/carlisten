<?php

include_once __DIR__.'/../bootstrap.php';

if(isset($_POST['uID'])) {
    $uID = $_POST['uID'];
    $mail = $_POST['mail'];
    $bank = $_POST['bank'];

    execute("INSERT INTO `user`(`typeMailing`, `data_filled`) VALUES ('".$mail."','1')");
    if($_POST['bank'] == 'bank-yes') {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, '/backEnd/bankData.php');
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS,
            "update&updateData&iban=" . $_POST['iban'] . "&bic=" . $_POST['bic'] . "&bank=" . $_POST['bank']);
    }
}

header('Location: ../linkToMember.php');