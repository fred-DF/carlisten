

const modal = new bootstrap.Modal('#modal', {
    keyboard: false
});

modal.show();

function verify () {
    const modal = new bootstrap.Modal('#verify', {
        keyboard: false
    });
    modal.show();

    // Erstelle eine XMLHttpRequest-Instanz
    var xhr = new XMLHttpRequest();

    // Definiere die HTTP-Methode und die URL
    xhr.open("POST", "../../../backEnd/bankData.php", true);

    // Setze die Anfrage-Header
    xhr.setRequestHeader("Content-Type", "application/text");
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

    // Füge eine Callback-Funktion hinzu, um die Antwort des Servers zu verarbeiten
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response['secure'] !== true) {
                document.getElementById('progress-bar').classList.replace('w-50', 'w-100');
                document.getElementById('progress-bar').classList.add('bg-success');
                document.getElementById('modalText').innerText = "Es wurde eine sichere Verbindung zum Server hergestellt";
                document.getElementById('modalBox').innerHTML = "<stron>Haben Sie alle Eingaben geprüft</strong>";
                document.getElementById('btn').disabled = false;
            } else {
                document.getElementById('progress-bar').classList.replace('w-50', 'w-100');
                document.getElementById('progress-bar').classList.add('bg-danger');
                document.getElementById('modalText').innerText = "Es konnte keine sichere Verbindung hergestellt werden";
            }
        }
    };

    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

    // Construct the request object
    var request = {
        "update": "",
        "verbindungsaufbau": ""
    };

    // Send the request as a JSON string
    xhr.send(JSON.stringify(request));

    document.getElementById('progress-bar').classList.replace('w-0', 'w-50');

}

function updateBankData () {
    // Erstelle eine XMLHttpRequest-Instanz
    var xhr = new XMLHttpRequest();

    // Definiere die HTTP-Methode und die URL
    xhr.open("POST", "../../../backEnd/bankData.php", true);

    // Setze die Anfrage-Header
    xhr.setRequestHeader("Content-Type", "application/text");
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

    // Füge eine Callback-Funktion hinzu, um die Antwort des Servers zu verarbeiten
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response['error'] === "none") {
                document.getElementById('modalBox').innerText = "Daten erfolgreich gespeichert";
                document.getElementById('progress').innerHTML = "";
                document.getElementById('progress').classList.remove("progress");
                document.getElementById('modalText').innerText = "";
                document.getElementById('btn').innerText = "Fertig";
                document.getElementById('btn').dataset.bsDismiss = 'modal';

            } else {
                document.getElementById('modalText').innerText = "Fehler beim Speichern";
            }
        }
    };

    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

    // Construct the request object
    var request = {
        "update": "update",
        "updateData": "update",
        "iban": document.getElementById('iban').value,
        "bic": document.getElementById('bic').value,
        "bank": document.getElementById('bank').value
    };

    // Send the request as a JSON string
    xhr.send(JSON.stringify(request));
}
 
document.getElementById('bank_data').addEventListener('submit', function (e) {
    e.preventDefault();
    verify();
});

function getBankData() {

    // Erstelle eine XMLHttpRequest-Instanz
    var xhr = new XMLHttpRequest();

    // Definiere die HTTP-Methode und die URL
    xhr.open("POST", "../../../backEnd/bankData.php", true);

    // Setze die Anfrage-Header
    xhr.setRequestHeader("Content-Type", "application/text");
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

    // Füge eine Callback-Funktion hinzu, um die Antwort des Servers zu verarbeiten
    xhr.onreadystatechange = function () {
    };

    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

    // Construct the request object
    var request = {
        "getData": true,
        "id": 1
    };

    // Send the request as a JSON string
    xhr.send(JSON.stringify(request));
}

document.getElementById('btn').addEventListener("click", updateBankData);