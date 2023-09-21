<?php

session_start();
if(!isset($_SESSION['set_password_data'])) {
    header("Location: index.php");
    exit();
}

$userData = json_decode($_SESSION['set_password_data'], 1);
$uID = $userData['uID'];
include_once '../backEnd/pdo.php';
execute("INSERT INTO `session_tokens`(`uID`) VALUES ($uID)");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/bootstrap/css/bootstrap.css">
    <title>Auf geht's</title>
</head>
<body>
    <div class="container-sm mt-5">        
        <div class="alert alert-light">
            <div class="row">
                <div class="col-8 py-5 px-5">
                    <h1>Willkommen an Bord!</h1>
                    <p>Wenn du willst zeigen wir dir die neue Website und helfen dir.</p>
                    <a href="../login.html">
                        <button class="btn btn-secondary">Überspringen</button>
                    </a>
                    <hr>
                    <h2>Neue Mitgliederliste</h2>
                    <div class="row">
                        <div class="col-5">
                            <img src="../src/graphics/memberlist.svg" class="w-100" alt="">
                        </div>
                        <div class="col-6">
                            <p>In der neuen Mitgliederlisten ist es möglich nicht nur nach Namen zu Suchen, sondern auch nach Telefonnummern, E-Mail Adressen, Berufen und allen anderen ausgefüllten Daten.</p>
                        </div>
                    </div>
                </div><div class="col-4 p-5">
                    <img src="../src/graphics/happy_news.svg" class="w-100 h-100" alt="">
                </div>
            </div>        
            <a href="../login.html">
                <button class="btn btn-primary mx-5">Anmelden und Erkunden</button>
            </a>   
        </div>
    </div>
</body>
</html>