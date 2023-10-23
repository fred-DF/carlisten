<?php

include_once __DIR__.'/../../../bootstrap.php';
Auth::auth();

$uID = $_SESSION['uID'];
$iban = select("SELECT `IBAN_clear` FROM `bank_accounts` WHERE `uID`='$uID' LIMIT 1")[0]['IBAN_clear'];

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
        <h1>Deine Bankdaten</h1>
        <p>Wenn Sie ihre Kontoverbindungen aktualisieren wollen, füllen Sie bitte IBAN, BIC und Bank aus. Ihre Daten kann nur der Vorstand in Klartext decodieren. Weder Sie noch Dritte!</p>
        <p>Wenden Sie sich bei Fragen an den <a href="mailto:kassenwart@carlisten.de">Kassenwart</a>.</p>
        <div class="alert alert-light">
            <h3>Deine aktuelle Kontoverbindung</h3>
            <p>Nur der Kassenwart und der Vorstand kann die IBAN in Klartext decodieren. Für Sie oder Dritte ist das Technisch ohne den Geheimschlüssel nicht möglich. Deswegen können wir die IBAN nur geschätzt darstellen.</p>
            <div class="form-floating">
                <label for="bank">IBAN</label>
                <input type="text" class="form-control" id="bank" value="DE**************<?php echo $iban; ?>" placeholder="IBAN" readonly>
            </div>
        </div>
        <div class="alert alert-light" role="alert">
            <form id="bank_data">
                <h3>Deine Kontoverbindung aktualisieren</h3>
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
                <span class="form-text">Alle deine Daten werden sicher durch SSL Verschlüsselung übertragen und sind für Dritte unleserlich. Ebenfalls auf unseren Servern. In unseren gesichterten Datenbanken sind Ihre Kontodaten mehrfach gesichert und verschlüsselt.</span>
                <button class="filled" style="display: flex; align-items: center; gap: 10px" id="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                    </svg>
                    Speichern
                </button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('iban').addEventListener('input', function (e) {
            e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{4})/g, '$1 ').trim();
        });
    </script>
    <script src="<?php echo $_ENV['APP_URL'] ?>/member/profile/bank/bank.js"></script>
</body>

</html>