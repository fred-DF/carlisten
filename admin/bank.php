<?php

include_once '../backEnd/auth.php';
if (!checkAdmin()) {
    exit("Admin Permession Needed");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/bootstrap/css/bootstrap.css">
    <title>Bankdaten</title>
</head>

<body>
    <?php include 'nav-bar.html'; ?>
    <div class="container-sm">
        <form id="data">
            <input type="number" id="id" placeholder="Benutzer" class="form-control my-2">
            <button type="submit" class="btn btn-primary my-2">Daten sicher Erhalten</button>
        </form>
        <div id="response" class="alert alert-light my-2">
            <form id="bank_data">
                <div class="row g-1">
                    <div class="form-floating mb-3 col-6">
                        <input type="text" class="form-control" id="bic" placeholder="BIC" readonly>
                        <label for="bic">BIC</label>
                    </div>
                    <div class="form-floating mb-3 col-6">
                        <input type="text" class="form-control" id="bank" placeholder="Bank" readonly>
                        <label for="bank">Bank</label>
                    </div>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="iban" placeholder="IBAN" readonly>
                    <label for="iban">IBAN</label>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('data').addEventListener('submit', (e) => {
            e.preventDefault();
            const id = document.getElementById('id').value;
            var xhr = new XMLHttpRequest();

            // Definiere die HTTP-Methode und die URL
            xhr.open("POST", "../backEnd/bankData.php", true);

            // Setze die Anfrage-Header
            xhr.setRequestHeader("Content-Type", "application/text");
            xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

            // Füge eine Callback-Funktion hinzu, um die Antwort des Servers zu verarbeiten
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('response').innerText = xhr.responseText;
                }
            };

            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

            // Construct the request object
            var request = {
                "getData": "admin",
                "uID": id
            };

            // Send the request as a JSON string
            xhr.send(JSON.stringify(request));

        });
    </script>
</body>

</html>