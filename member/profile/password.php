<?php

include __DIR__.'/../../bootstrap.php';
Auth::auth();

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/css/style.css">
    <title>Downloads</title>
</head>
<body>
    <?php require_once __DIR__.'/../../pages/nav-bar.php'; ?>
    <div class="container">
        <h1>Passwort ändern</h1>
        <p>Ein sicheres Passwort besteht aus:</p>
        <ul>
            <li>Mindestens acht Zeichen</li>
            <li>Groß- und Klein-Buchstaben</li>
            <li>Ziffern</li>
            <li>Sonderzeichen</li>
        </ul>
        <form id="changePasswdForm" method="POST">
            <div>
                <input type="password" class="form-control  input-l" id="password" placeholder="Neues Passwort">
            </div>
            <div>
                <input type="password" class="form-control input-l" id="password2" placeholder="Neues Passwort wiederholen">
            </div>
            <div>
                <button class="filled">Ändern</button>
            </div>
            <div class="alert mt-3 mb-0" id="feedback" style="display: none">
            </div>
        </form>
    </div>
    <script>
        document.getElementById('changePasswdForm').addEventListener('submit', function (event) {
            event.preventDefault();
            if(document.getElementById('password').value === document.getElementById('password2').value) {
                const xhr = new XMLHttpRequest ();
                xhr.open('POST', '../../backEnd/changePassword.php');

                const password = document.getElementById('password').value;
                
                xhr.onreadystatechange = function () {                    
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        document.getElementById('feedback').style.display = 'block';
                        if(JSON.parse(xhr.responseText)['response'] == "success") {
                            document.getElementById('feedback').classList.remove('alert-danger');
                            document.getElementById('feedback').classList.add('alert-success','alert');
                            document.getElementById('feedback').innerText = "Passwort wurde erfolgreich geändert";
                        } else {                            
                            document.getElementById('feedback').classList.add('alert-danger','alert');
                            document.getElementById('feedback').innerText = JSON.parse(xhr.responseText)['error'];
                        }
                    }
                };

                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                xhr.send("password=" + encodeURIComponent(password));

            } else {
                document.getElementById('feedback').classList.add('alert-danger', 'alert');
                document.getElementById('feedback').innerText = "Passwörter stimmen nicht übereinander ein";
            }
        });
    </script>
</body>
</html>