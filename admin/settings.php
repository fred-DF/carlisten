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
            <h4>Banner</h4>
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
                <label class="form-check-label" for="home_show_button">Knopf Anzeigen</label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="home_show_banner" checked>
                <label class="form-check-label" for="home_show_banner">Banner freischalten</label>
            </div>
            <hr>
            <h4>Willkommens Nachricht</h4>
            <div class="form-floating mb-2">
                <textarea class="form-control" placeholder="Willkommens Nachricht" id="home_welcome_message" style="height: 100px"></textarea>
                <label for="home_welcome_message">Willkommens Nachricht</label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="home_show_welcome_message" checked>
                <label class="form-check-label" for="home_show_welcome_message">Willkommensnachricht anzeigen</label>
            </div>
            <hr>
            <h2>Veranstaltungen</h2>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="calendar_allow_old_view" checked>
                <label class="form-check-label" for="calendar_allow_old_view">alte Ansicht anbieten</label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="calendar_allow_registration" checked>
                <label class="form-check-label" for="calendar_allow_registration">An / Abmeldung Erlauben</label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="calendar_send_remeber_emails" checked>
                <label class="form-check-label" for="calendar_send_remeber_emails">Erinnerungs E-Mail an Teilnehmer Senden</label>
            </div>
            <hr>
            <h4>Benutzer</h4>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="member_admins_edit_profile" checked>
                <label class="form-check-label" for="member_admins_edit_profile">Adminestratoren dürfen Benutzerprofiele bearbeiten</label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="member_show_profile_pic" checked>
                <label class="form-check-label" for="member_show_profile_pic">Profielbilder anzeigen</label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="member_show_data_short" checked>
                <label class="form-check-label" for="member_show_data_short">Kontaktdaten kurzfassung anzeigen</label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="member_show_job" checked>
                <label class="form-check-label" for="member_show_job">Beruf anzeigen</label>
            </div>
        </form>
        <button class="btn btn-primary my-3" id="saveBtn">Speichern</button>
    </div>
    <script src="settings.js"></script>
</body>
</html>