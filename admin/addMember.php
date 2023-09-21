<?php

include '../backEnd/pdo.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/bootstrap/css/bootstrap.css">
    <title>Mitgliederkartei bearbeiten</title>
</head>    
<body>
    <div class="container-fluid bg-primary-subtle position-fixed" style="z-index: 9999;">
        <div class="container-sm">
            <a href="member.php" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><- Zurück</a>
        </div>
    </div>
    <div style="height: 24px;"></div>
    <?php 
        include 'nav-bar.html';
    ?>
    <div class="container-sm">
        <h1 class="fw-bold">Benutzer anlegen</h1>
        <h2>Name</h2>
        <div class="row g-2">
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="title" placeholder="Titel">
                    <label for="title">Titel</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="first_name" placeholder="Vorname">
                    <label for="first_name">Vorname *</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="last_name" placeholder="Nachname">
                    <label for="last_name">Nachname *</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="second_title" placeholder="Nachgestellter Titel">
                    <label for="second_title">Nachgestellter Titel</label>
                </div>
            </div>
        </div> 
        <div class="row g-2 mt-3 mb-5">
            <h2>Mitgliedschaft</h2>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="date_of_enter" placeholder="Eintrittsdatum">
                <label for="date_of_enter">Eintrittsdatum *</label>
            </div>
            <h2>Information</h2>
            <div class="form-floating mb-3">
                <textarea class="form-control form-control-lg" height="50px" aria-label="With textarea" id="text" placeholder="Text"></textarea>
                <label for="text">Text</label>
            </div>
            <h2 class="mt-3">Anmeldedaten</h2>
            <div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" placeholder="E-Mail Adresse">
                    <label for="email">E-Mail Adresse *</label>
                    <span>Eine E-Mail wird an den Empfänger dieser Adresse gesendet, mit der Aufforderung, die weiteren Daten einzutragen.</span>
                </div>          
            </div>
            <div id="passwordResetErrorBox"></div>
        </div>
        <p>Alle mit * makierten Felder sind erforderlich</p>
        <div id="errorBox"></div>
    </div>    
    <div class="container-sm position-sticky bg-primary opacity-100 p-3 rounded row m-auto" style="z-index: 999999; bottom: 20px;">
        <h2 class="text-white fw-bold m-0 col">Benutzer anlegen?</h2>
        <button class="btn btn-light col-2" id="save">Fortfahren</button>
    </div>
    <script src="../src/bootstrap/js/bootstrap.js"></script>
    <script src="addMember.js"></script>   
</body>
</html>