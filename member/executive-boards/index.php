<?php

include_once '../../backEnd/auth.php';
if (json_decode(auth(), true)['response'] !== 'success') {
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
                    <a href="../profile">Mein Profil</a>
                </span>
            </div>
        </div>
    </nav>
    <div class="container-sm">
        <?php
        include '../../backEnd/setting.php';
        // Banner
        if (getSettingPath("home_show_banner", "../..")) {
        ?>
            <div class="alert alert-<?php echo getSettingPath("home_banner_color", "../.."); ?>" role="alert">
                <?php echo getSettingPath("home_banner_text", "../.."); ?>
                <?php

                if (getSettingPath("home_show_button", "../..")) {
                ?>
                    <hr>
                    <a href="<?php echo getSettingPath("home_link_value", "/./.."); ?>"><button class="btn btn-primary"><?php echo getSettingPath("home_button_value", "../.."); ?></button></a>
                <?php
                }

                ?>
            </div>
        <?php
        }
        ?>
        <h1>Vorstand</h1>
        <p>Hier haben wir für Sie die Geschichte der Carlisten, die Liedtexte vergangener Veranstaltungen usw. bereitgestellt. Wir werden die Seite Zug um Zug ergänzen.</p>
        <div class="row text-center" style="margin-top: 120px;">
            <div class="col-3 mb-5 mb-sm-0">
                <div class="card" style=" height: calc(100% - 25%);">
                    <div class="card-body" style="translate: 0 -25%;">
                        <img src="http://carlisten.de/0members/images/Dietmar_Erber_klein.jpg" alt="" class="rounded-circle object-fit-cover shadow-sm" style="height: 150px; width: 150px;">
                        <h5 class="card-title">Dr. Dietmar Erber</h5>
                        <span>Vorstand</span><br>
                        <div class="btn-group w-100 mt-2" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary">Profil</button>
                            <button type="button" class="btn btn-outline-primary"><a href="mailto:vorstand@carlist.de" class="link link-dark link-underline-opacity-0">E-Mail</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-3 mb-sm-0">
                <div class="card" style=" height: calc(100% - 25%);">
                    <div class="card-body" style="translate: 0 -25%;">
                        <img src="http://carlisten.de/0members/images/schulzewerner.jpg" alt="" class="rounded-circle object-fit-cover shadow-sm" style="height: 150px; width: 150px;">
                        <h5 class="card-title">Martin Schulze-Werner</h5>
                        <span>Vizepräsident</span><br>
                        <div class="btn-group w-100 mt-2" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary">Profil</button>
                            <button type="button" class="btn btn-outline-primary"><a href="mailto:vorstand@carlist.de" class="link link-dark link-underline-opacity-0">E-Mail</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-3 mb-sm-0">
                <div class="card" style=" height: calc(100% - 25%);">
                    <div class="card-body" style="translate: 0 -25%;">
                        <img src="http://carlisten.de/0members/images/hueffer.jpg" alt="" class="rounded-circle object-fit-cover shadow-sm" style="height: 150px; width: 150px;">
                        <h5 class="card-title">Dr. Eduard Hüffer</h5>
                        <span>Schriftführer</span><br>
                        <div class="btn-group w-100 mt-2" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary">Profil</button>
                            <button type="button" class="btn btn-outline-primary"><a href="mailto:vorstand@carlist.de" class="link link-dark link-underline-opacity-0">E-Mail</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-3 mb-sm-0">
                <div class="card" style=" height: calc(100% - 25%);">
                    <div class="card-body" style="translate: 0 -25%;">
                        <img src="http://carlisten.de/0members/images/knawek.jpg" alt="" class="rounded-circle object-fit-cover shadow-sm" style="height: 150px; width: 150px;">
                        <h5 class="card-title">Martin Knawek</h5>
                        <span>Kassierer</span><br>
                        <div class="btn-group w-100 mt-2" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary">Profil</button>
                            <button type="button" class="btn btn-outline-primary"><a href="mailto:vorstand@carlist.de" class="link link-dark link-underline-opacity-0">E-Mail</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-3 mb-sm-0">
                <div class="card" style=" height: calc(100% - 25%);">
                    <div class="card-body" style="translate: 0 -25%;">
                        <img src="http://carlisten.de/0members/images/PrinzLudger.JPG" alt="" class="rounded-circle object-fit-cover shadow-sm" style="height: 150px; width: 150px;">
                        <h5 class="card-title">Ludger Prinz</h5>
                        <span>Gästewart</span><br>
                        <div class="btn-group w-100 mt-2" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary">Profil</button>
                            <button type="button" class="btn btn-outline-primary"><a href="mailto:vorstand@carlist.de" class="link link-dark link-underline-opacity-0">E-Mail</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-3 mb-sm-0">
                <div class="card" style=" height: calc(100% - 25%);">
                    <div class="card-body" style="translate: 0 -25%;">
                        <img src="http://carlisten.de/0members/images/Wulf.jpg" alt="" class="rounded-circle object-fit-cover shadow-sm" style="height: 150px; width: 150px;">
                        <h5 class="card-title">Rüdiger Wulf</h5>
                        <span>Hausdichter</span><br>
                        <div class="btn-group w-100 mt-2" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary">Profil</button>
                            <button type="button" class="btn btn-outline-primary"><a href="mailto:vorstand@carlist.de" class="link link-dark link-underline-opacity-0">E-Mail</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>