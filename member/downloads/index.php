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
                        <a class="nav-link active" href="#">Downloads</a>
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
        <h1>Downloads</h1>
        <p>Hier haben wir für Sie die Geschichte der Carlisten, die Liedtexte vergangener Veranstaltungen usw. bereitgestellt. Wir werden die Seite Zug um Zug ergänzen.</p>
        <div id="links"></div>
        <script>
            function displayAllDownloads() {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '../../backEnd/getDownloads.php', true);
                xhr.onload = function() {
                    if (this.status === 200) {
                        var response = JSON.parse(this.responseText);
                        var downloads = response.downloads;
                        var html = '';
                        for (var i = 0; i < downloads.length; i++) {
                            var category = downloads[i].category;
                            var uploads = downloads[i].uploads;
                            html += '</div><br><div><h3>' + category + '</h3>'
                            for (var j = 0; j < uploads.length; j++) {
                                var name = uploads[j].name;
                                var path = '../../' + uploads[j].path;
                                html += '<a href="' + path + '" target="_blank" rel="noopener noreferrer" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">' + name + '</a> ';
                            }
                        }
                        document.getElementById('links').innerHTML = html;
                    }
                };
                xhr.send();
            }
            displayAllDownloads();
        </script>
    </div>
</body>

</html>