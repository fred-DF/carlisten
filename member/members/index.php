<?php
    require_once __DIR__.'/../../bootstrap.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/css/style.css">
    <title>Mitgliederliste</title>
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
        <h1>Mitgliederliste</h1>
        <div id="search-bar" style="z-index: 999;">
            <input type="text" class="form-control" id="search" placeholder="Suche nach Name, Beruf, Adresse usw." autofocus>
            <button class="btn btn-primary" type="submit">Suchen</button>
        </div>
        <ul class="list-group mx-2" style="translate: 0 -41px; display: none;" id="results"></ul>
        <div id="mitgliederliste"></div>
    </div>
    <div class="modal" id="user-modal">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" id="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Veranstaltung eintragen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="submit" class="btn btn-primary" id="createEvent" data-bs-dismiss="modal">Erstellen</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <script src="/member/members/search.js"></script>
    <script src="/member/members/members.js"></script>
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

        table {
            overflow-x: scroll;
            width: 100%;
        }

        td {
            padding: 5px 20px;
            text-align: left;
        }

        th {
            padding: 5px 20px;
            text-align: left;
        }

        div#search-bar {
            display: flex;
            align-items: stretch;
            justify-items: stretch;
            border-radius: 15px;
            margin-bottom: 25px;
        }

        div#search-bar > input, div#search-bar > button {
            margin: unset;
            border-radius: 0;
            border: none;
            padding: 10px 20px;
        }

        div#search-bar > input {
            border-radius: 50px 0 0 50px;
            border: 1px solid #003366;
            width: 100%;
        }

        div#search-bar > button {
            background-color: #003366;
            border-radius: 0 20px 20px 0;
            color: white;
        }
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
<?php
include __DIR__."/../../pages/footer.php";
?>
</body>

</html>