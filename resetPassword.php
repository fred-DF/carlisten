<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/style.css">
    <title>Passwot zurücksetzen</title>
</head>
<body>
    <nav>
        <div class="container" id="nav-bar-content">
            <img src="https://carlisten.genanntnoelke.de/src/logos/Logo - Text - Weiss.svg" alt="">
            <div class="links">
                <span></span>
                <a href="login.html" class="no-decoration" style="color: white;">Mitgliederbereich</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <form id="form" class="mt-5">
            <div class="card mx-auto w-75">
                <h1 class="card-header">Anmelden</h1>
                <div>Geben Sie im untenstehenden Formular ihre E-Mail-Adresse ein. Daraufhin erhalten Sie eine E-Mail mit einem Code. Diesen müssen Sie dann auf der folgenden Seite eingeben, um ihr neues Passwort einzugeben.</div>
                <div id="errorMsgBox" role="alert">
                </div>
                <div id="password-reset-wrapper">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com">
                    <button type="submit" class="filled">Passwort zurücksetzen</button>
                </div>
            </div>
        </form>
    </div>    
    <script>
        function checkData () {
            event.preventDefault();
            const email = document.getElementById('email').value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "backEnd/resetPasswd.php?email=" + email, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");


            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    window.location = 'reset-password'
                }
            };

            xhr.send();
        }
        
        document.getElementById('form').addEventListener('submit', function (event) {
            event.preventDefault();
            checkData();
        });

    </script>
    <style>
        #password-reset-wrapper {
            display: flex;
            flex-direction: column;
            margin: 15px 0;
        }
    </style>
</body>
</html>