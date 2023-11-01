<?php
include '../bootstrap.php';
if(!Auth::checkAdmin()) {
    exit("Admin Rechte erforderlich");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/style.css">
    <title>Bankdaten</title>
</head>

<body>
    <?php include 'nav-bar.php'; ?>
    <div class="container">
        <h1>Bankdaten</h1>
        <form id="data">
            <select id="userId">
                <option value="" disabled>Person auswählen</option>
            </select>
        </form>
        <hr>
        <div id="response" class="alert-light my-2">
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
        document.getElementById('userId').addEventListener('input', (e) => {
            e.preventDefault();
            const id = document.getElementById('userId').value;
            var xhr = new XMLHttpRequest();

            // Definiere die HTTP-Methode und die URL
            xhr.open("POST", "../backEnd/bankData.php", true);

            // Setze die Anfrage-Header
            xhr.setRequestHeader("Content-Type", "application/text");
            xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

            // Füge eine Callback-Funktion hinzu, um die Antwort des Servers zu verarbeiten
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    document.getElementById('bic').value = response.bic;
                    document.getElementById('bank').value = response.bank;
                    document.getElementById('iban').value = response.iban;

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

        function loadUser () {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../backEnd/getBankUser.php");

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const users = JSON.parse(xhr.response);
                    users.forEach(function (user) {
                        let option = document.createElement("option");
                        option.value = user.ID;
                        option.innerText = user['title'] + " " + user['first name'] + " " + user['last name'] + " " + user['second title'];
                        document.getElementById('userId').appendChild(option)
                    });
                }
            };

            xhr.send();
        }

        loadUser();
    </script>
</body>

</html>