<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/bootstrap/css/bootstrap.css">
    <title>Passwort verstlegen</title>
</head>
<body>
    <div class="container-sm mt-5">
        <div class="alert alert-light ">
            <div class="position-relative m-4">
                <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="50" aria-valuemin="0"
                    aria-valuemax="100" style="height: 1px;">
                    <div class="progress-bar" style="width: 0%"></div>
                </div>
                <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill"
                    style="width: 2rem; height:2rem;">1</button>
                <button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-secondary rounded-pill"
                    style="width: 2rem; height:2rem;">2</button>
                <button type="button"
                    class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill"
                    style="width: 2rem; height:2rem;">3</button>
            </div>
            <p>Bitte geben den 6-Stelligen Code aus der E-Mail unten ein. Danach sollst du ein Passwort festlegen und danach geht es los. Nach der Registration kannst du dich dann mit deiner E-Mail Adresse und deinem Festgelgeten Passwort anmelden.</p>
            <form id="code" class="my-3">
                <input type="tel" class="form-control form-control-lg text-center" name="" id="input1" onkeyup="autoTab(event, this, 1)">
                <input type="tel" class="form-control form-control-lg text-center" maxlength="1" name="" id="input2" onkeyup="autoTab(event, this, 2)">
                <input type="tel" class="form-control form-control-lg text-center" maxlength="1" name="" id="input3" onkeyup="autoTab(event, this, 3)">
                <input type="tel" class="form-control form-control-lg text-center" maxlength="1" name="" id="input4" onkeyup="autoTab(event, this, 4)">
                <input type="tel" class="form-control form-control-lg text-center" maxlength="1" name="" id="input5" onkeyup="autoTab(event, this, 5)">
                <input type="tel" class="form-control form-control-lg text-center" maxlength="1" name="" id="input6" onkeyup="autoTab(event, this, 6)">
            </form>      
            <div class="d-flex justify-content-center">
                <button class="btn btn-link" style="margin: 0 auto">Brauchst du Hilfe?</button>
            </div>
        </div>
        <div class="alert alert-danger" id="alert_badge" style="display: none;">
        </div>
    </div>
    <style>
        form#code {
            display: flex;
            flex-grow: 15px;
            justify-content: center;
        }

        form#code > input {
            height: 75px;
            width: 50px;
            margin: 0 8px;
        }
    </style>
    <script>
        function autoTab(event, currentInput, inuputID) {
                if (event.keyCode === 8 && currentInput.value.length === 0) {
                    // Wenn der Benutzer die Rücktaste gedrückt hat und das Feld leer ist, bewege den Fokus zum vorherigen Feld
                    document.getElementById('input' + (inuputID - 1)).focus();
                } else if (currentInput.value.length === 1) {
                    // Wenn das Feld vollständig ausgefüllt ist, bewege den Fokus zum nächsten Feld
                    if (currentInput.id === "input6") {
                        checkCode(document.getElementById('input1').value + document.getElementById('input2').value + document.getElementById('input3').value + document.getElementById('input4').value + document.getElementById('input5').value + document.getElementById('input6').value);
                    } else {
                        document.getElementById('input' + (inuputID + 1)).focus();
                    }  
                                   
                } else if (currentInput.value.length === 6) {
                    checkCode(currentInput.value);
                }
            }

        function checkCode (code) {
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "../backEnd/checkCode.php?code=" + code);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onload = function () {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if(response['response'] == 'success') {                        
                        document.location = 'setPassword.php';
                    } else {
                        const alert = document.getElementById('alert_badge');
                        alert.innerText = response['error'];
                        alert.style.display = 'block';
                    }
                } else {
                    console.log('Request fehlgeschlagen. Fehlercode: ' + xhr.status);
                }
            };

            xhr.send();
        }
     </script>
</body>
</html>