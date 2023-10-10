<?php

    require_once '../backEnd/bootstrap.php';
    bootstrap::loadEnv();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://carlisten.genanntnoelke.de/src/bootstrap/css/bootstrap.css">
    <title>Berechtigung Fehlt</title>
</head>
<body>
    <div class="container-sm pt-5">
        <h1>403 Forbidden - bitte Anmelden</h1>
        <p>Es tut uns leid, aber Sie haben keine Berechtigung, auf die angeforderte Ressource zuzugreifen. Dies kann aus
        verschiedenen Gründen geschehen, z.B. weil Sie nicht angemeldet sind, sich auf einem anderen Gerät angemeldet ahben, nicht über ausreichende Berechtigungen verfügen
        oder weil die Ressource nicht öffentlich verfügbar ist.
        
        Bitte überprüfen Sie Ihre Zugangsdaten und stellen Sie sicher, dass Sie über die erforderlichen Berechtigungen verfügen,
        um auf die Ressource zuzugreifen. Wenn Sie der Meinung sind, dass Sie fälschlicherweise blockiert wurden, wenden Sie
        sich bitte an den Administrator der Website.
        
        Wir bedauern die Unannehmlichkeiten und hoffen, dass wir Ihnen bald helfen können, das Problem zu lösen.</p>
        <a href="<?php echo $_ENV['APP_URL']; ?>/login.html">
            <button class="btn btn-outline-primary">
                Anmelden
            </button>
        </a>        
    </div>
</body>
</html>