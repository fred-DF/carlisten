<?php

if(!isset($_GET['uID'])) {
    header("Location: member.php");
    exit("Weiterleitung folgt");
}
$uID = $_GET['uID'];

include '../bootstrap.php';
if(!Auth::checkAdmin()) {
    exit("Admin Rechte erforderlich");
}

$userData = select("SELECT * FROM `user` WHERE `ID`='$uID' LIMIT 1");
if(empty($userData)) {
    echo "<h1>Ein Fehler ist Aufgetreten! <a href='member.php'>Zurück</a>";
    exit();
}
//var_dump($userData);
foreach ($userData as $key => $value) {
    $title = $value['title'];
    $firstName = $value['first name'];
    $lastName = $value['last name'];
    $secondTitle = $value['second title'];
    $nameDay = $value['name day'];
    $profilePicUrl = $value['profile pic url'];
    $privateStreet = $value['private_street'];
    $privateHouseNumber = $value['private_house_number'];
    $privatePLZ = $value['private_plz'];
    $privateCity = $value['private_city'];
    $privateCountry = $value['private_country'];
    $privateTelephone = $value['private_telephone'];
    $privateMobile = $value['private_mobile'];
    $privateWeb = $value['private_web'];
    $privateEmail = $value['private_email'];
    $professionalCompany = $value['professional_company'];
    $professionalJob = $value['professional_job'];
    $professionalStreet = $value['professional_street'];
    $professionalHouseNumber = $value['professional_housenumber'];
    $professionalPLZ = $value['professional_plz'];
    $professionalCity = $value['professional_city'];
    $professionalCountry = $value['professional_country'];
    $professionalTelephone = $value['professional_telephone'];
    $professionalMobile = $value['professional_mobile'];
    $professionalWeb = $value['professional_web'];
    $professionalEmail = $value['professional_email'];
    $dateOfEnter = $value['date_of_enter'];
    $note = $value['note'];
    $username = $value['username'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/style.css">
    <title>Mitgliederkartei bearbeiten</title>
</head>    
<body>
    <?php 
        include 'nav-bar.php';
    ?>
    <div style="height: 24px;"></div>
    <div class="container">
        <h2 class="fw-bold"><?php echo $name = $value['title']." ".$value['first name']." ".$value['last name']." ".$value['second title']; ?></h2>
        <img src="<?php $profilePicUrl ?>" alt="">

        <h2>Name</h2>
        <div class="row g-2">
            <div class="form-floating">
                <input type="text" class="form-control" id="titleInput" placeholder="Titel" <?php if(isset($title)) {echo "value='" . $title ."'";}?>>
                <label for="titleInput">Titel</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="firstNameInput" placeholder="Vorname" <?php if(isset($firstName)) {echo "value='" . $firstName ."'";}?>>
                <label for="firstNameInput">Vorname</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="lastNameInput" placeholder="Nachname" <?php if(isset($lastName)) {echo "value='" . $lastName ."'";}?>>
                <label for="lastNameInput">Nachname</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="secondTitleInput" placeholder="Nachgestellter Titel" <?php if(isset($secondTitle)) {echo "value='" . $secondTitle ."'";}?>>
                <label for="secondTitleInput">Nachgestellter Titel</label>
            </div>
        </div>

        <span class="form-text mt-3">Namenstag</span>
        <div>
            <div class="input-group" style="display: flex; align-items: center; flex-direction: row">
                <div class="form-floating">
                    <input type="text" class="form-control" id="dayInput" placeholder="Tag" <?php if(isset($dateOfEnter)) {echo "value='" . $dateOfEnter ."'";}?>>
                    <label for="dayInput">Tag</label>
                </div>
                <span class="input-group-text" id="basic-addon3">:</span>
                <div class="form-floating">
                    <input type="text" class="form-control" id="monthInput" placeholder="Monat" <?php if(isset($dateOfEnter)) {echo "value='" . $dateOfEnter ."'";}?>>
                    <label for="monthInput">Monat</label>
                </div>
            </div>
        </div>

        <h2 class="mt-3">Kontaktdaten</h2>
        <h3>Private Kontaktdaten</h3>
        <div class="address-form">
            <div class="form-floating">
                <input type="text" class="form-control" id="privateStreet" placeholder="Straße" <?php if(isset($privateStreet)) {echo "value='" . $privateStreet ."'";}?>>
                <label for="privateStreet">Straße</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="privateHouseNumber" placeholder="Hausnummer" <?php if(isset($privateHouseNumber)) {echo "value='" . $privateHouseNumber ."'";}?>>
                <label for="privateHouseNumber">Hausnummer</label>
            </div>
            <div class="form-floating">
                <input type="number" class="form-control" id="privatePLZ" placeholder="PLZ" <?php if(isset($privatePLZ)) {echo "value='" . $privatePLZ ."'";}?>>
                <label for="privatePLZ">PLZ</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="privateCity" placeholder="Stadt" <?php if(isset($privateCity)) {echo "value='" . $privateCity ."'";}?>>
                <label for="privateCity">Stadt</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="privateCountry" placeholder="Land" <?php if(isset($privateCountry)) {echo "value='" . $privateCountry ."'";}?>>
                <label for="privateCountry">Land</label>
            </div>
        </div>

        <h3>Berufliche Kontaktdaten</h3>
        <div class="address-form">
            <div class="form-floating">
                <input type="text" class="form-control" id="professionalCompany" placeholder="Firma" <?php if(isset($professionalCompany)) {echo "value='" . $professionalCompany ."'";}?>>
                <label for="professionalCompany">Firma</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="professionalPosition" placeholder="Position" <?php if(isset($professionalPosition)) {echo "value='" . $professionalPosition ."'";}?>>
                <label for="professionalPosition">Position</label>
            </div>
            <!-- Weitere berufliche Kontaktdaten -->
        </div>

        <!-- Weitere Formularelemente -->
    </div>

    <style>
        .address-form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .address-form .form-floating {
            flex-basis: calc(50% - 10px);
        }
    </style>

    <div class="container-sm position-sticky bg-primary opacity-100 p-3 rounded row m-auto" style="z-index: 999999; bottom: 20px;">
        <h2 class="text-white fw-bold m-0 col">Änderungen Speichern?</h2>
        <button class="btn btn-light col-2" id="save">Speichern</button>
    </div>
    <script src="../src/bootstrap/js/bootstrap.js"></script>
    <script src="editMember.js"></script>
    <script>
        function resetPassword () {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../backEnd/resetPasswd.php?email=<?php echo $username; ?>", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            document.getElementById('resetPassword').classList.add('active');


            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    document.getElementById('passwordResetErrorBox').innerText = xhr.responseText;
                    document.getElementById('resetPassword').classList.remove('active');
                }
            };

            xhr.send();
        }
    </script>
</body>
</html>