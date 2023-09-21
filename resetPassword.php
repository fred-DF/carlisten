<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/bootstrap/css/bootstrap.css">
    <title>Passwot zurücksetzen</title>
</head>
<body>
    <div class="container-sm">
        <form id="form" class="mt-5">
            <div class="card mx-auto w-75">
                <h5 class="card-header">Anmelden</h5>  
                <div id="emailHelp" class="form-text mx-3 mt-3 mb-0">Eine E-Mail mit dem neuen Passwort wird an die im Profil hinterlegte E-Mail Adresse gesendet.</div>
                <div class="alert-danger mx-3 my-0" id="errorMsgBox" role="alert">
                </div>
                <div class="card-body">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" placeholder="name@example.com">
                        <label for="email">Email Adresse</label>
                    </div>      
                    <button type="submit" class="btn btn-primary">Passwort zurücksetzen</button>
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
                    document.getElementById('errorMsgBox').innerHTML = xhr.responseText;
                    document.getElementById('errorMsgBox').classList.add("alert");
                    document.getElementById('errorMsgBox').classList.add("mt-3");
                }
            };

            xhr.send();
        }
        
        document.getElementById('form').addEventListener('submit', function (event) {
            event.preventDefault();
            checkData();
        });

    </script>
</body>
</html>