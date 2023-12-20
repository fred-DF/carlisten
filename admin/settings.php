<?php
include '../bootstrap.php';
if(!Auth::checkAdmin()) {
    exit("Admin Rechte erforderlich");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/style.css">
    <title>Website Einstellungen</title>
</head>
<body>
    <?php
        include 'nav-bar.php';
    ?>
    <div class="container">
        <h1>Website Einstellungen</h1>
        <form action="">
            <h2>Startseite</h2>
            <!--<h4>Banner</h4>
            <div class="form-floating mb-2">
                <textarea class="form-control" placeholder="Inhalt des Banners" id="home_banner_text" style="height: 100px"></textarea>
                <label for="home_banner_text">Inhalt des Banners</label>
            </div>
            <div class="row mb-2 g-1">                
                <div class="form-floating col">
                    <input type="text" class="form-control" id="home_button_value" placeholder="Beschriftung des Knopfes">
                    <label for="home_button_value">Beschriftung des Knopfes</label>
                </div>         
                <div class="form-floating col">
                    <input type="text" class="form-control" id="home_link_value" placeholder="Link des Knopfes">
                    <label for="home_">Link des Knopfes</label>
                </div>
            </div>           
            <div class="form-floating mb-2">
                <select class="form-select" id="home_banner_color" aria-label="Floating label select example">
                    <option selected disabled>Wähle eine Art</option>
                    <option value="secondary">Info</option>
                    <option value="warning">Warnung</option>
                    <option value="danger">Gefahr</option>
                </select>
                <label for="banner_color">Art des Banners</label>
            </div> 
            <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" role="switch" id="home_show_button" checked>
                <label class="form-check-label" for="home_show_button">Knopf anzeigen</label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="home_show_banner" checked>
                <label class="form-check-label" for="home_show_banner">Banner freischalten</label>
            </div>
            <hr>-->
            <h4>Willkommens-Nachricht</h4>
            <div class="form-floating mb-2">
                <textarea class="form-control" placeholder="Willkommens Nachricht" id="home_welcome_message" style="height: 100px; width: 100%"></textarea>
                <label for="home_welcome_message">Willkommens-Nachricht</label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="home_show_welcome_message" checked>
                <label class="form-check-label" for="home_show_welcome_message">Willkommens-Nachricht anzeigen</label>
            </div>
        </form>
        <button class="btn btn-primary my-3" id="saveBtn">Speichern</button>
    </div>
    <script src="settings.js"></script>
</body>
</html>