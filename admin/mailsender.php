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
    <title>Veranstaltungskalender</title>
</head>

<body>
    <?php
    include 'nav-bar.php';
    ?>
    <div class="container-sm">
        <h1 class="my-3">E-Mail versand</h1>
        <form id="mail">
            <select class="form-select form-select-lg mb-3" id="target" aria-label=".form-select-lg example">
                <option selected disabled>E-Mail Typ</option>
                <option value="all">Willkommensmail</option>
            </select>
            <select class="form-select form-select-lg mb-3" id="target" aria-label=".form-select-lg example">
                <option selected disabled>Empfänger</option>
                <option value="all">Alle Mitglieder</option>
                <option value="1">Frederik Nölke</option>
                <option value="3">...</option>
            </select>
            <button type="submit" class="btn btn-primary">Absenden</button>
        </form>
    </div>
    <script src="../src/bootstrap/js/bootstrap.js"></script>
    <script>
        function sendMail() {
            var target = document.getElementById('target').selectedOptions[0].value;
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "../backEnd/sendWelcomeMail.php?sendWelcomeMail&to=" + target);
            xhr.onreadystatechange = function() {
                console.log(xhr.responseText);
            }
            xhr.send();
        }

        document.getElementById('mail').addEventListener('submit', (e) => {
            e.preventDefault();
            sendMail();
        });
    </script>
</body>

</html>