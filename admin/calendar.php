<?php

include '../backEnd/auth.php';
if(!checkAdmin()) {
    exit("Admin Rechte erforderlich");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="../src/bootstrap/css/bootstrap.css">
    <title>Veranstaltungskalender</title>
</head>
<body>
    <?php
        include 'nav-bar.html';
    ?>
    <div class="container-sm">
        <h1>Veranstaltungskalender</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#event-modal">Veranstaltung einfügen</button>
        <div class="row g-3 mt-2">
            <?php
                include_once '../backEnd/pdo.php';
                $events = select("SELECT `ID`, `title`, `timestamp`, `location`, `shown`, `registable`, `participations` FROM `events`");
                foreach ($events as $key => $value) {
                    ?>
                    <div class="card col-4 mx-1" style="width: 18rem;" data-event-id='<?php echo $value['ID'] ?>'>
                        <div class="card-body">
                            <h3><?php echo $value['title']; ?></h3>
                            <p class="my-0"><?php echo date("d,m,Y - H:i", strtotime($value['timestamp'])) ?> Uhr<br>
                                <?php echo $value['location']; ?></p>
                            <a class="a my-0" onclick="editEvent(<?php echo $value['ID']; ?>)">
                                Bearbeiten</a>
                        </div>
                    </div>   
                    <?php
                }
                if(empty($events)) {
                    ?>
                    <div class="alert alert-info"><p>Keine Veranstaltungen gefunden</p></div>
                    <?php
                }
            ?>            
        </div>

        <div class="modal" tabindex="-1" id="event-modal">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Veranstaltung eintragen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="event-form">
                        <div class="form-floating mb-3">
                            <input type="name" class="form-control" id="title" placeholder="Titel der Veranstaltung" required>
                            <label for="title">Titel der Veranstaltung</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="name" class="form-control" id="location" placeholder="Titel der Veranstaltung" required>
                            <label for="location">Veranstaltungsort</label>
                        </div>
                        <div class="input-group">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="date" placeholder="Tag der Veranstaltung" required>
                                <label for="date">Veranstatlungstag</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="time" class="form-control" id="time" placeholder="Tag der Veranstaltung" required>
                                <label for="time">Veranstatlungszeit</label>
                            </div>
                        </div>    
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="registable" checked>
                            <label class="form-check-label" for="registable">Anmeldbar</label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="submit" class="btn btn-primary" id="createEvent" data-bs-dismiss="modal">Erstellen</button>
                </div>
                </div>
                </form>
            </div>
        </div>


    </div>
    <script src="../src/bootstrap/js/bootstrap.js"></script>
    <script>
        function createEvent () {
            var title = document.getElementById('title').value;
            var date = document.getElementById('date').value + ' ' + document.getElementById('time').value + ':00';
            var location = document.getElementById('location').value;
            var registable = document.getElementById('registable').checked;
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "../backEnd/createEvent.php?title=" + title + "&location=" + location + "&date=" + date + "&registable=" + registable);
            xhr.onreadystatechange = function () {
                console.log(xhr.responseText);
            }
            xhr.send();
        }

        document.getElementById('event-form').addEventListener('submit', (e) => {
            e.preventDefault();
            createEvent();
        });
    </script>
</body>
</html>