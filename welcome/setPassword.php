<?php

session_start();
if(!isset($_SESSION['set_password_data'])) {
    header("Location: index.php");
    exit();
}
$userData = json_decode($_SESSION['set_password_data'], 1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/style.css">
    <title>Passwort festlegen</title>
</head>
<body><nav>
    <div class="container">
        <img src="https://carlisten.genanntnoelke.de/src/logos/Logo - Text - Weiss.svg" alt="">
        <div class="links">
            <span></span>
            <a href="../login.html" class="no-decoration" style="color: white;">Mitgliederbereich</a>
        </div>
    </div>
</nav>
    <div class="container">
        <div>
            <h1>Passwort festlegen</h1>
            <p>Hallo Herr <strong><?php echo $userData['name'] ?></strong>. Bitte lege ein Passwort fest, um dich in zukunft Anzumelden. Falls du es mal vergessen solltest, kannst du es jederzeit zurücksetzten.</p>
            <form id="password_form" class="">
                <div class="form-floating w-100 mb-3">
                    <input type="password" class="form-control" id="password" placeholder="Passwort">
                    <label for="password">Passwort</label>
                </div>                
                <div class="form-floating w-100 mb-3">
                    <input type="password" class="form-control" id="passwordReapeat" placeholder="Passwort">
                    <label for="password">Password (wiederholen)</label>
                </div>
                <button type="submit" class="btn-primary btn w-100">Weiter</button>
                <p>Ein sicheres Passwort besteht aus:</p>
                <ul>
                    <li>Mindestens acht Zeichen</li>
                    <li>Groß- und Klein-Buchstaben</li>
                    <li>Ziffern</li>
                    <li>Sonderzeichen</li>
                </ul>
            </form>
        </div>
        <div class="alert alert-danger" id="alert_badge" style="display: none;">
        </div>
        <script>
        
        function setPassword () {
            if(document.getElementById('passwordReapeat').value === document.getElementById('password').value) {
                var password = document.getElementById('password').value;
            } else {
                var alert_badge = document.getElementById('alert_badge');
                alert_badge.innerText = "Passwörter stimmen nicht überein";
                alert_badge.style.display = "block";
                return;
            }

            let xhr = new XMLHttpRequest();
            xhr.open("GET", "../backEnd/setPassword.php?password=" + password);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onload = function () {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if(response['response'] == 'success') {                        
                        document.location = 'dataUpdate.php';
                    } else {
                        const alert = document.getElementById('alert_badge');
                        alert.innerText = response['error'];
                        alert.style.display = 'block';
                    }
                } else {
                    console.log('Request fehlgeschlagen. Fehlercode: ' + xhr.status);                    
                    const alert = document.getElementById('alert_badge');
                    alert.innerText = "Anfrage Fehlgeschlagen - Fehler " + xhr.status;
                    alert.style.display = 'block';
                }
            };

            xhr.send();
        }

        document.getElementById('password_form').addEventListener('submit', function (e) {
            e.preventDefault();
            setPassword();
        })
     </script>
    </div>
</body>
</html>