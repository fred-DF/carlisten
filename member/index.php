<?php

include_once '../backEnd/auth.php';
if (json_decode(auth(), true)['response'] !== 'success') {
    header("HTTP/1.0 403 Forbidden");
    include '../pages/403.html';
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/style.css">
    <title>Mitgliederbereich</title>
</head>

<body>
    <?php require_once '../pages/nav-bar.php'; ?>
    <div class="container-sm">
        <?php
        include '../backEnd/setting.php';
        // Banner
        if (getSetting("home_show_banner")) {
        ?>
            <div class="alert alert-<?php echo getSetting("home_banner_color"); ?>" role="alert">
                <?php echo getSetting("home_banner_text"); ?>
                <?php
                if (getSetting("home_show_button")) {
                ?>
                    <hr>
                    <a href="<?php echo getSetting("home_link_value"); ?>"><button class="btn btn-primary"><?php echo getSetting("home_button_value"); ?></button></a>
                <?php
                }

                ?>
            </div>
        <?php
        }
        ?>
        <?php
        // Willkommensnachricht
        if (getSetting("home_schow_welcome_message")) {
        ?>
            <p><?php echo str_replace("\n", "</br>", getSetting("home_welcome_message")); ?></p>
        <?php
        }
        ?>
        <div class="card">
            <div class="row">
                <div class="col-1 ms-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#0d6efd" class="bi bi-calendar-week-fill h-100 w-100" viewBox="0 0 16 16">
                        <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM9.5 7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm3 0h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zM2 10.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                    </svg>
                </div>
                <div class="card-body col-6">
                    <h5 class="card-title align-middle">Veranstaltungskalender <span class="badge bg-primary">NEU</span></h5>
                    <p class="card-text">Versende eine Teilnahmebestätigung direkt über die Website</p>
                    <a href="#" class="btn btn-primary">Schau dich um!</a>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary">
                <img src="../src/facebookBanner.svg" height="24px" width="auto" alt="">
            </button>
            <button class="btn btn-outline-primary">info@carlisten.de</button>
        </div>
    </div>
</body>

</html>