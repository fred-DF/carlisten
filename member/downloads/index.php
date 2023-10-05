<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/css/style.css">
    <title>Downloads</title>
</head>

<body>
<?php require_once __DIR__.'/../../pages/nav-bar.php'; ?>
    <div class="container page-content">
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