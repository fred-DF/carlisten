<?php

include_once '../../../backEnd/auth.php';
if (json_decode(auth(), true)['response'] !== 'success') {
    header("HTTP/1.0 403 Forbidden");
    include '../../../pages/403.php';
    exit();
}

$uID = $_SESSION['uID'];
$iban = select("SELECT `IBAN_clear` FROM `bank_accounts` WHERE `uID`='$uID' LIMIT 1")[0]['IBAN_clear'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../src/bootstrap/css/bootstrap.css">
    <title>Berechtigung Fehlt</title>
</head>

<body>
    <div class="container-sm pt-5">
        <a href="../">Zurück</a>
        <div class="d-flex justify-content-between mb-3">
            <h1>Deine Bankdaten</h1>
            <div class="align-self-center">
                <span class="badge text-bg-primary">Verschlüsselt durch SSL</span>
            </div>
        </div>
        <p>Haben sich deine Kontoverbindungen geändert oder sind veraltet? Hier kannst du Sie durch aktuelle ersetzen. Deinen eingegebenen Daten sind nur für dich und den Vorstand einsehbar.</p>
        <p>Wende dich bei Fragen bitte bei unserem <a href="mailto:kassenwart@carlisten.de">Kassenwart</a>.</p>
        <div class="alert alert-light">
            <h3>Deine aktuelle Kontoverbindung</h3>
            <p>Um eine sichere Verwarung der Daten zu ermöglichen, kann niemand außer der Kassenwart die Banktaden im Klartext sehen. Deswegen ist der die IBAN geschwärzt.</p>
            <div class="form-floating">
                <input type="text" class="form-control" id="bank" value="DE**************<?php echo $iban; ?>" placeholder="IBAN" readonly>
                <label for="bank">IBAN</label>
            </div>
        </div>
        <div class="alert alert-light" role="alert">
            <form id="bank_data">
                <h3>Deine Kontoverbindung aktualalisieren</h3>
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
                    <input type="text" class="form-control" id="iban" placeholder="IBAN">
                    <label for="iban">IBAN</label>
                </div>
                <span class="form-text">Alle deine Daten werden sicher durch SSL Verschlüsselung übertragen und sind für Dritte unleserlich. Ebenfalls auf unseren Servern. In unseren gesichterten Datenbanken sind Ihre Kontodaten mehrfach gesichert und verschlüsselt.</span>
                <button class="btn btn-primary w-100 form-control-lg mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                    </svg>
                    Speichern
                </button>
            </form>
        </div>
    </div>
    <div class="modal" id="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sicherheits Hinweis </h5>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                    </svg>
                </div>
                <div class="modal-body">
                    <p>Bitte gehe vorsichtig mit deinen Bankdaten um, so wie wir. Alle deine Daten werden nie unverschlüsselt übertragen und sind auf unseren Servern sicher verschlüsselt und mehrfach abgesichert abgespeichert!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok, verstanden</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="verify" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bestätigen</h5>
                </div>
                <div class="modal-body">
                    <span class="form-text" id="modalText">Verbindungsaufbau mit Server</span>
                    <div class="progress" id="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="height: 10px;">
                        <div class="progress-bar w-0" id="progress-bar"></div>
                    </div>
                    <div id="modalBox"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn" disabled="true" class="btn btn-primary">Weiter</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../src/bootstrap/js/bootstrap.js"></script>
    <script src="bank.js"></script>
</body>

</html>