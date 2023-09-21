<?php

include_once '../../backEnd/auth.php';
if (json_decode(auth(), true)['response'] !== 'success') {
    header("HTTP/1.0 403 Forbidden");
    include '../../pages/403.html';
    exit();
}

$uID = $_SESSION['uID'];
$user = select("SELECT `title`, `first name`, `last name`, `second title` FROM `user` WHERE `ID`='$uID'")[0];
$name = $user['first name'] . " " . $user['last name'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/bootstrap/css/bootstrap.css">
    <title>Veranstaltungen</title>
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
                        <a class="nav-link active" href="#">Veranstaltungen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../downloads">Downloads</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../members">Mitglieder</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../executive-boards">Vorstände</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../namedays">Namenstage</a>
                    </li>
                    <?php
                    if (checkAdmin()) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin">Administration</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <span class="navbar-text">
                    <a href="profile">Mein Profil</a>
                </span>
            </div>
        </div>
    </nav>
    <div class="container-sm">
        <h1>Veranstaltungskalender</h1>
        <p>Jeden ersten Mittwoch im Monat findet ab 19:30 Uhr unser Stammtisch in der Schwemme des Zwei-Löwen-Klubs statt. Eine Anmeldung ist nicht erforderlich.</br>Die nächsten Veranstaltungen:</p>
        <div class="row">
            <?php

            include_once '../../backEnd/pdo.php';
            $events = select("SELECT `title`, `timestamp`, `location`, `shown`, `registable` FROM `events`");

            foreach ($events as $value) {
                $mail_text = "Sehr geehrte Herren,
ich, " . $name . " melde mich hiermit bei der Veranstaltung " . $value['title'] . " am " . date("d.m.Y", strtotime($value['timestamp'])) . " an.

Mit Freundlichn Grüßen
" . $name;
                $subject = "Anmeldung: " . $value['title'];
            ?>
                <div class="card mx-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $value['title']; ?></h5>
                        <p class="card-text"><?php if (!empty($value['location'])) {
                                                    echo $value['location'] . "<br>";
                                                }; ?>
                            <?php echo date("d.m.Y H:i", strtotime($value['timestamp'])); ?></p>
                        <?php

                        if ($value['registable']) {
                        ?>
                            <a href="mailto:veranstaltung@carlisten.de?subject=<?php echo urlencode($subject); ?>&body=<?php echo urlencode($mail_text); ?>" class="w-100 btn btn-primary">Anmeldung</a>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            <?php
            }
            if (empty($events)) {
            ?>
                <div class="alert alert-info">
                    <p>Keine Veranstaltungen eingetragen</p>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>