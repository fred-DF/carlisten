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
    <title>Mitgliederliste Exportieren</title>
</head>
<body>
<?php
include 'nav-bar.php';
?>
<div class="container">
    <h1>Export</h1>
    <form id="ListOptions">
        <div>
            <input type="checkbox" id="excludeDeath" checked>
            <lable for="excludeDeath">Verstorbende ausschließen</lable>
        </div>
        <div>
            <input type="radio" name="mailType" id="EMail">
            <lable for="EMail">Benachrichtigungen per E-Mail</lable>
            <br>
            <input type="radio" name="mailType" id="Mail">
            <lable for="EMail">Benachrichtigungen per Post</lable>
        </div>
    </form>
</div>
</body>
</html>
