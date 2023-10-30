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
        include __DIR__.'/../../backEnd/setting.php';
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
        <div id="flex-wrapper" class="row text-center" style="margin-top: 120px; display: flex; flex-wrap: wrap; gap: 25px; justify-items: stretch">
            <div class="col-3 mb-5 mb-sm-0">
                <div class="card" style=" height: calc(100% - 25%);">
                    <div class="card-body" style="translate: 0 -25%;">
                        <img src="/src/img/vorstand.jpeg" alt="" class="rounded-circle object-fit-cover shadow-sm" style="height: 150px; width: 150px;">
                        <h3 class="card-title">Dr. Dietmar Erber</h3>
                        <span>Vorstand</span><br>
                        <div class="btn-group w-100 mt-2" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary" onclick="window.location = '/member/members?openModal&uID=1'">Profil</button>
                            <button type="button" class="btn btn-outline-primary"><a href="mailto:vorstand@carlisten.de" class="link link-dark link-underline-opacity-0">E-Mail</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-3 mb-sm-0">
                <div class="card" style=" height: calc(100% - 25%);">
                    <div class="card-body" style="translate: 0 -25%;">
                        <img src="/src/img/vizepraesident.jpeg" alt="" class="rounded-circle object-fit-cover shadow-sm" style="height: 150px; width: 150px;">
                        <h3 class="card-title">Martin Schulze-Werner</h3>
                        <span>Vizepräsident</span><br>
                        <div class="btn-group w-100 mt-2" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary" onclick="window.location = '/member/members?openModal&uID=1'">Profil</button>
                            <button type="button" class="btn btn-outline-primary"><a href="mailto:vizepraesident@carlisten.de" class="link link-dark link-underline-opacity-0">E-Mail</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-3 mb-sm-0">
                <div class="card" style=" height: calc(100% - 25%);">
                    <div class="card-body" style="translate: 0 -25%;">
                        <img src="/src/img/schriftfuehrer.jpeg" alt="" class="rounded-circle object-fit-cover shadow-sm" style="height: 150px; width: 150px;">
                        <h3 class="card-title">Dr. Eduard Hüffer</h3>
                        <span>Schriftführer</span><br>
                        <div class="btn-group w-100 mt-2" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary" onclick="window.location = '/member/members?openModal&uID=1'">Profil</button>
                            <button type="button" class="btn btn-outline-primary"><a href="mailto:schriftfuehrer@carlisten.de" class="link link-dark link-underline-opacity-0">E-Mail</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-3 mb-sm-0">
                <div class="card" style=" height: calc(100% - 25%);">
                    <div class="card-body" style="translate: 0 -25%;">
                        <img src="/src/img/kassierer.jpeg" alt="" class="rounded-circle object-fit-cover shadow-sm" style="height: 150px; width: 150px;">
                        <h3 class="card-title">Martin Knawek</h3>
                        <span>Kassierer</span><br>
                        <div class="btn-group w-100 mt-2" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary" onclick="window.location = '/member/members?openModal&uID=1'">Profil</button>
                            <button type="button" class="btn btn-outline-primary"><a href="mailto:kassierer@carlisten.de" class="link link-dark link-underline-opacity-0">E-Mail</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-3 mb-sm-0">
                <div class="card" style=" height: calc(100% - 25%);">
                    <div class="card-body" style="translate: 0 -25%;">
                        <img src="/src/img/gaestewart.jpeg" alt="" class="rounded-circle object-fit-cover shadow-sm" style="height: 150px; width: 150px;">
                        <h3 class="card-title">Ludger Prinz</h3>
                        <span>Gästewart</span><br>
                        <div class="btn-group w-100 mt-2" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary" onclick="window.location = '/member/members?openModal&uID=1'">Profil</button>
                            <button type="button" class="btn btn-outline-primary"><a href="mailto:gaestewart@carlisten.de" class="link link-dark link-underline-opacity-0">E-Mail</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-3 mb-sm-0">
                <div class="card" style=" height: calc(100% - 25%);">
                    <div class="card-body" style="translate: 0 -25%;">
                        <img src="/src/img/hausdichter.jpeg" alt="" class="rounded-circle object-fit-cover shadow-sm" style="height: 150px; width: 150px;">
                        <h3 class="card-title">Rüdiger Wulf</h3>
                        <span>Hausdichter</span><br>
                        <div class="btn-group w-100 mt-2" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary" onclick="window.location = '/member/members?openModal&uID=1'">Profil</button>
                            <button type="button" class="btn btn-outline-primary"><a href="mailto:hausdichter@carlisten.de" class="link link-dark link-underline-opacity-0">E-Mail</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    div > img {
        border-radius: 50%;
        object-fit: cover;
    }

    div#flex-wrapper > div > div > div {
        background-color: #f5f5f5;
        padding: 25px;
        border-radius: 15px;
        border: 1px solid lightgray;
        display: flex;
        flex-direction: column;
    }

    div#flex-wrapper > div > div > div > div {
        display: flex;
        gap: 5px;
        flex-flow: row;
    }

    a {
        text-decoration: none;
    }
</style>
<?php
include __DIR__."/../../pages/footer.php";
?>
</body>

</html>