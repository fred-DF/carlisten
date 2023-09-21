<?php

include '../../backEnd/auth.php';
if(json_decode(auth(), true)['response'] !== 'success') {
    header("HTTP/1.0 403 Forbidden");
    include '../../pages/403.html';
    exit();
}

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/bootstrap/css/bootstrap.css">
    <title>Downloads</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
        <div class="container-fluid">
            <div class="collapse navbar-collapse container-sm" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../">Startseite</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../events">Veranstaltungen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../downloads">Downloads</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../members">Mitglieder</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Vorstände</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../namedays">Namenstage</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a href="../profile">Mein Profil</a>
                </span>
            </div>
        </div>
    </nav>
    <div class="container-sm">
        <div class="container border rounded-1 p-3 mt-5">            
            <h1>Passwort ändern</h1>
            <form id="changePasswdForm" method="POST">
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" placeholder="Passwort">
                    <label for="password">Neues Passwort</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password2" placeholder="Password">
                    <label for="password2">Neues Passwort (wiederholen)</label>
                </div>
                <button class="btn btn-danger w-100">Ändern</button>
                <div class="alert mt-3 mb-0" id="feedback">
                </div>
            </form>
        </div>
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