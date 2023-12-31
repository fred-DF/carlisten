<?php

include_once __DIR__.'/../../../bootstrap.php';
Auth::auth();

$uID = $_SESSION['uID'];
$iban = select("SELECT `IBAN_clear` FROM `bank_accounts` WHERE `uID`='$uID' LIMIT 1");
if(empty($iban)) {
    $ibanEmpty = 1;
} else {
    $iban = $iban[0]['IBAN_clear'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../src/css/style.css">
    <title>Bankverbindung erneuern</title>
</head>
<body>
    <?php require_once __DIR__.'/../../../pages/nav-bar.php'; ?>
    <div class="container">
        <?php

        if(isset($ibanEmpty)) {
            ?>
        <p>Für Sie wurde das Bankdaten-Tool noch nicht aktiviert. Wenden Sie sich bitte diesbezüglich an <a
                    href="mailto:Frederik Nölke [Siteadmin für Carlisten.de] <frederik@genanntnoelke.de>?subject=[Carlisten.de] Aktivierung: Bankdaten Tool">Frederik Nölke</a>.</p>
        <?php
            die();
        }

        ?>
        <h1>Ihre Bankdaten</h1>
        <p>Wenn Sie Ihre Kontoverbindungen aktualisieren wollen, füllen Sie bitte IBAN, BIC und Bank aus. Aus Datenschutzgründen können weder Sie noch sonstige Mitglieder Ihre aktuell eingegebene Bankverbindung einsehen. Ihre Bankdaten können ausschließlich durch den Präsidenten sowie den Kassenwart decodiert und eingesehen werden.</p>
        <p>Bei Fragen wenden Sie sich bitte an den <a href="mailto:kassenwart@carlisten.de">Kassenwart</a>.</p>
        <div class=" -light">
            <h3>Aktuelle Kontoverbindung</h3>
            <div class="form-floating">
                <label for="bank">Aktuell hinterlegte IBAN</label>
                <input type="text" class="form-control" id="ibanShorten" value="**** **** **** **** *<?php echo $iban; ?>" placeholder="IBAN" readonly>
            </div>
        </div>
        <div class=" -light" role="">
            <form id="bank_data">
                <h3>Kontoverbindung aktualisieren</h3>
                <div class="row g-1">
                    <div class="form-floating mb-3 col-6">
                        <input type="text" class="form-control" id="bic" placeholder="BIC">
                        <label for="bic">BIC</label>
                    </div>
                    <div class="form-floating mb-3 col-6">
                        <input type="text" class="form-control" id="bank" placeholder="Bank">
                        <label for="bank">Bank</label>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="iban" placeholder="IBAN" maxlength="27">
                    <label for="iban">IBAN</label>
                </div>
                <button class="filled" style="display: flex; align-items: center; gap: 10px; margin: 30px 0" id="btn">
                    <div class="loader" id="loader" style="display: none"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                    </svg>
                    Speichern
                </button>
            </form>
        </div>
    </div>
    <?php

    include __DIR__."/../../../pages/footer.php";

    ?>
    <script>
        document.getElementById('iban').addEventListener('input', function (e) {
            e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{4})/g, '$1 ').trim();
        });
    </script>
    <script src="/member/profile/bank/bank.js"></script>
</body>

</html>