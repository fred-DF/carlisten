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
    <title>Mitgliederliste</title>
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
                        <a class="nav-link active" href="../members">Mitglieder</a>
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
        <h1>Mitgliederliste</h1>
        <div class="input-group shadow-sm" style="z-index: 999;">
            <div class="form-floating">
                <input type="text" class="form-control" id="search" placeholder="Max Mustermann">
                <label for="search">Suche nach Name, Beruf, usw.</label>
            </div>
            <button class="btn btn-primary" style="height: 58px;" type="submit">Suchen</button>
        </div>
        <ul class="list-group mx-2" style="translate: 0 -41px; display: none;" id="results"></ul>
        <div id="mitgliederliste"></div>
    </div>
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-content">
            </div>
        </div>
    </div>
    <script src="../../src/bootstrap/js/bootstrap.js"></script>
    <script src="search.js"></script>
    <script src="members.js"></script>
    <style>
        #user-avatar,
        .user-avatar {
            display: inline-block;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 20px;
            font-weight: bold;
            color: #fff;
            text-align: center;
            line-height: 40px;
        }

        /* Hintergrundfarben für die Buchstaben */
        #user-avatar.a {
            background-color: #f44336;
        }

        #user-avatar.b {
            background-color: #e91e63;
        }

        #user-avatar.c {
            background-color: #9c27b0;
        }

        #user-avatar.d {
            background-color: #673ab7;
        }

        /* weitere Hintergrundfarben für die anderen Buchstaben */
    </style>
    <?php
    if (isset($_GET['openModal']) && isset($_GET['uID'])) {
    ?>
        <script>
            loadModal(<?php echo $_GET['uID']; ?>);
        </script>
    <?php
    }
    ?>
</body>

</html>