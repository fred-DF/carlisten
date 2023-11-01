<?php

session_start();
if(!isset($_SESSION['set_password_data'])) {
    header("Location: index.php");
    exit();
}

$userData = json_decode($_SESSION['set_password_data'], 1);
$uID = $userData['uID'];
include_once '../backEnd/pdo.php';
execute("INSERT INTO `session_tokens`(`uID`) VALUES ($uID)");

?>
<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>persönliche Daten aktualisieren</title>
    <link rel="stylesheet" href="../src/css/style.css">
</head>
<body>
<nav>
    <div class="container">
        <img src="https://carlisten.genanntnoelke.de/src/logos/Logo - Text - Weiss.svg" alt="">
        <div class="links">
            <span></span>
            <a href="../login.html" class="no-decoration" style="color: white;">Mitgliederbereich</a>
        </div>
    </div>
</nav>
    <div class="container">
        <form action="../backEnd/updateMemberDataWelcome.php" method="POST">
            <h1>Persönliche Daten vervollständigen</h1>
            <p>Füllen Sie bitte alle Felder aus, damit wir Sie erreichen können. Die Änderung hier ersetzt den Kontakt mit dem Schriftwart.</p>
            <div>
                <div style="display: flex; align-items: end; gap: 5px; margin: 15px 0">
                    <h2>1.</h2>
                    <p>Möchten Sie zukünftig den aktuellen Postverkehr per E-Mail erhalten?</p>
                </div>
                <div>
                    <input type="radio" name="mail" value="email" id="mail-email" checked>
                    <label for="mail-email">per E-Mail</label>
                </div>
                <div>
                    <input type="radio" name="mail" value="mail" id="mail-mail">
                    <label for="mail-mail">per Postweg</label>
                </div>
            </div>
            <div>
                <div style="display: flex; align-items: end; gap: 5px; margin: 15px 0">
                    <h2>2.</h2>
                    <p>Wollen Sie Ihre Bankverbindung über den Mitgliederbereich verwalten?</p>
                </div>
                <div>
                    <input type="radio" name="bank" value="email" class="bank_toggle" id="bank-yes" checked onclick="changeBankViability(1)">
                    <label for="bank-yes">Ja, per Mitgliederbereich</label>
                </div>
                <div>
                    <input type="radio" name="bank" value="mail" class="bank_toggle" id="bank-no" onclick="changeBankViability(0)">
                    <label for="bank-no">Nein</label>
                </div>
                <div id="bank-group" style="padding: 15px 0">
                    <div class="form-floating">
                        <input type="text" id="iban" width="100%" maxlength="27" style="width: 313px">
                        <label for="iban">IBAN</label>
                    </div>
                    <div style="display: flex; gap: 5px;">
                        <div class="form-floating">
                            <input type="text" id="bic">
                            <label for="bic">BIC</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" id="bank">
                            <label for="bank">Bank</label>
                        </div>
                    </div>
                </div>
                <button class="filled">Weiter zum Mitgliederbereich</button>
                <input type="hidden" name="uID" value="<?php echo $uID; ?>">
            </div>
        </form>
    </div>
    <style>
        h2, p {
            margin: 0;
        }
    </style>
    <script>
        document.getElementById('iban').addEventListener('input', function (e) {
            e.target.value = e.target.value.replace(/[^\dA-Z]/g, '').replace(/(.{4})/g, '$1 ').trim();
        });

        function changeBankViability (state) {
            if(state) {
                document.getElementById('bank-group').style.display = 'block';
            } else {
                document.getElementById('bank-group').style.display = 'none';
            }
        }
    </script>
</body>
</html>