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
            <h1>Passwort zurückgesetzt</h1>
            <p>Um Ihr neuen Anmeldedaten mit dem Server abzugleichen, müssen Sie sich einmal Anmelden.</p>
            <a href="../linkToMember.php">
                <button class="btn btn-primary btn-xl">Anmelden</button>
            </a>
        </div>
    </div>
</body>
</html>