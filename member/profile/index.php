<?php

include __DIR__."/../../bootstrap.php";
Auth::auth();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/css/style.css">
    <title>Meine Daten</title>
</head>
<?php

$uID = $_SESSION['uID'];

$userData = select("SELECT * FROM `user` WHERE `ID`='$uID' LIMIT 1");
if (empty($userData)) {
    echo "<h1>Ein Fehler ist aufgetreten! <a href='../'>Zurück</a>";
    exit();
}
//var_dump($userData);
foreach ($userData as $key => $value) {
    $title = $value['title'];
    $firstName = $value['first name'];
    $lastName = $value['last name'];
    $secondTitle = $value['second title'];
    $nameday = str_split($value['name day'], 1);
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

<body>   
    <?php require_once __DIR__.'/../../pages/nav-bar.php'; ?>
    <div class="container">
        <h1>Profil bearbeiten</h1>
        <div>
            <div class="row g-2" style="flex-wrap: wrap">
                <div class="inpt-0" style="flex: 1">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="titleInput" placeholder="Titel" <?php if(isset($title)) {echo "value='" . $title ."'";}?>>
                        <label for="titleInput">Titel</label>
                    </div>
                </div>
                <div class="inpt-1" style="flex: 2;">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="firstNameInput" placeholder="Vorname" <?php if(isset($firstName)) {echo "value='" . $firstName ."'";}?>>
                        <label for="firstNameInput">Vorname</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="inpt-1" style="flex: 2">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="lastNameInput" placeholder="Nachname" <?php if(isset($title)) {echo "value='" . $lastName ."'";}?>>
                        <label for="lastNameInput">Nachname</label>
                    </div>
                </div>
                <div class="inpt-0" style="flex: 1">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="secondTitleInput" placeholder="Nachgestellter Titel" <?php if(isset($title)) {echo "value='" . $secondTitle ."'";}?>>
                        <label for="secondTitleInput">Nachgestellter Titel</label>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <span>Namenstag:</span>
            <div class="row">
                <div class="form-floating">
                    <input type="number" class="form-control" id="nameDayD" placeholder="TT" <?php if(isset($nameday[1])) {echo "value='" . $nameday[3].$nameday[4] ."'";}?> maxlength="2">
                    <label for="secondTitleInput">TT</label>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control" id="nameDayM" placeholder="MM" <?php if(isset($nameday[0])) {echo "value='" . $nameday[0].$nameday[1] ."'";}?> maxlength="2">
                    <label for="secondTitleInput">MM</label>
                </div>
            </div>
        </div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h3>Privat</h3>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row g-2 mb-2">
                            <div class="form-floating col-4">
                                <input type="text" class="form-control" id="privateStreet" placeholder="Straße" <?php if(isset($title)) {echo "value='" . $privateStreet ."'";}?>>
                                <label for="privateStreet">Straße</label>
                            </div>
                            <div class="form-floating col-2" style="width: 110px">
                                <input type="text" class="form-control" id="privateHouseNumber" placeholder="Nr." <?php if(isset($title)) {echo "value='" . $privateHouseNumber ."'";}?>>
                                <label for="privateHouseNumber">Hausnummer</label>
                            </div>
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="form-floating" style="flex: 2">
                                <input type="number" class="form-control" id="privatePLZ" placeholder="PLZ" <?php if(isset($title)) {echo "value='" . $privatePLZ ."'";}?>>
                                <label for="privatePLZ">PLZ</label>
                            </div>
                            <div class="form-floating" style="flex: 3">
                                <input type="text" class="form-control" id="privateCity" placeholder="Stadt" <?php if(isset($title)) {echo "value='" . $privateCity ."'";}?>>
                                <label for="privateCity">Stadt</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-floating col-3">
                                <input type="text" class="form-control" id="privateCountry" placeholder="Land" <?php if(isset($title)) {echo "value='" . $privateCountry ."'";}?>>
                                <label for="privateCountry">Land</label>
                            </div>
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="form-floating col-3">
                                <input type="tel" class="form-control" id="privateMobile" placeholder="Mobil" <?php if(isset($title)) {echo "value='" . $privateMobile ."'";}?>>
                                <label for="privateMobile">Mobil</label>
                            </div>
                            <div class="form-floating col-3">
                                <input type="text" class="form-control" id="privateTelephone" placeholder="Telefon" <?php if(isset($title)) {echo "value='" . $privateTelephone ."'";}?>>
                                <label for="privateTelephone">Telefon</label>
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-floating col-6 mb-2">
                                <input type="url" class="form-control" id="privateWeb" placeholder="Web" <?php if(isset($title)) {echo "value='" . $privateWeb ."'";}?>>
                                <label for="privateWeb">Web</label>
                            </div>
                            <div class="form-floating col-6">
                                <input type="email" class="form-control" id="privateEmail" placeholder="E-Mail" <?php if(isset($title)) {echo "value='" . $privateEmail ."'";}?>>
                                <label for="privateEmail">E-Mail</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3>Beruflich</h3>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row g-2 mb-2">
                            <div class="form-floating col-3">
                                <input type="text" class="form-control" id="professionalCompany" placeholder="Firma" <?php if(isset($title)) {echo "value='" . $professionalCompany ."'";}?>>
                                <label for="professionalCompany">Firma</label>
                            </div>
                            <div class="form-floating col-3">
                                <input type="text" class="form-control" id="professionalJob" placeholder="Beruf" <?php if(isset($title)) {echo "value='" . $professionalJob ."'";}?>>
                                <label for="professionalJob">Beruf</label>
                            </div>
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="form-floating col-4">
                                <input type="text" class="form-control" id="professionalStreet" placeholder="Straße" <?php if(isset($title)) {echo "value='" . $professionalStreet ."'";}?>>
                                <label for="professionalStreet">Straße</label>
                            </div>
                            <div class="form-floating col-2" style="width: 110px">
                                <input type="text" class="form-control" id="professionalHouseNumber" placeholder="Nr." <?php if(isset($title)) {echo "value='" . $professionalHouseNumber ."'";}?>>
                                <label for="professionalHouseNumber">Hausnummer</label>
                            </div>
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="form-floating" style="flex: 2;">
                                <input type="number" class="form-control" id="professionalPLZ" placeholder="PLZ" <?php if(isset($title)) {echo "value='" . $professionalPLZ ."'";}?>>
                                <label for="professionalPLZ">PLZ</label>
                            </div>
                            <div class="form-floating" style="flex: 3">
                                <input type="text" class="form-control" id="professionalCity" placeholder="Stadt" <?php if(isset($title)) {echo "value='" . $professionalCity ."'";}?>>
                                <label for="professionalCity">Stadt</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-floating col-3">
                                <input type="text" class="form-control" id="professionalCountry" placeholder="Land" <?php if(isset($title)) {echo "value='" . $professionalCountry ."'";}?>>
                                <label for="professionalCountry">Land</label>
                            </div>
                        </div>
                        <div class="row g-2 mb-2">
                            <div class="form-floating col-3">
                                <input type="tel" class="form-control" id="professionalMobile" placeholder="Mobil" <?php if(isset($title)) {echo "value='" . $professionalMobile ."'";}?>>
                                <label for="professionalMobile">Mobil</label>
                            </div>
                            <div class="form-floating col-3">
                                <input type="text" class="form-control" id="professionalTelephone" placeholder="Telefon" <?php if(isset($title)) {echo "value='" . $professionalTelephone ."'";}?>>
                                <label for="professionalTelephone">Telefon</label>
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-floating col-6 mb-2">
                                <input type="url" class="form-control" id="professionalWeb" placeholder="Web" <?php if(isset($title)) {echo "value='" . $professionalWeb ."'";}?>>
                                <label for="professionalWeb">Web</label>
                            </div>
                            <div class="form-floating col-6">
                                <input type="email" class="form-control" id="professionalMail" placeholder="E-Mail" <?php if(isset($title)) {echo "value='" . $professionalEmail ."'";}?>>
                                <label for="professionalMail">E-Mail</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3>Mitgliedschaft</h3>
            <div class="row">
                <div class="form-floating mb-3" style="flex: 1">
                    <input type="date" class="form-control" id="dateOfEntry" placeholder="Eintrittsdatum" <?php if(isset($title)) {echo "value='" . $dateOfEnter ."'";}?>>
                    <label for="dateOfEntry">Eintrittsdatum</label>
                </div>
            </div
            <div style="margin-bottom: 90px;">

                <h3>Anmeldedaten</h3>
                <div class="row" style="display: none">
                    <div class="form-floating mb-3" style="flex: 1">
                        <textarea style="wi" class="form-control form-control-lg" aria-label="With textarea" id="text" placeholder="Text"><?php if(isset($title)) {echo $note;}?></textarea>
                        <label for="text">Text</label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-floating mb-3" style="flex: 1">
                        <input type="email" class="form-control" id="username" readonly <?php if(isset($title)) {echo "value='" . $username ."'";}?>>
                        <label for="text">Anmeldename</label>
                    </div>
                </div>
                <div style="margin-bottom: 50px">

                    <div style="align-items: baseline; display: flex; gap: 15px; max-width: var(--site-width); margin: 20px auto; margin-bottom: 50px">
                        <button class="filled" id="save">Meine Profildaten speichern</button>
                    </div>
                    <a href="password.php">
                        <button>Passwort ändern</button>
                    </a>
                </div>
                <div class="alert" style="margin: 25px 0">
                    <p>Hier können Sie uns Ihre aktuelle Bankverbindung mitteilen. Eine gesonderte Info an den Kassenwart ist nicht notwendig.</p>
                    <div>
                        <hr>
                        <a href="/member/profile/bank">
                            <button class="filled">Bankdaten aktualisieren</button>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <style>

            .row {
                display: flex;
                flex-wrap: nowrap;
                align-items: center;
                max-width: 600px !important;
                gap: 5px;
            }

            .inpt-0 {
                /*flex-grow: 0;*/
            }

            .inpt-1 {
                flex-grow: 1;
            }

            .inpt-2 {
                flex-grow: 2;
            }

            .inpt-sm {
                width: 50px;
            }

            .col-4, .col-3 {
                flex: 1;
            }



        </style>
    </div>

    <div class="" style="position: fixed; bottom: 0; background-color: rgba(255,255,255,0); width: 100%; padding: 15px 0; backdrop-filter: blur(100px) grayscale(0.5); -webkit-backdrop-filter: blur(100px) grayscale(0.5);">
    </div>
    <?php
    include __DIR__."/../../pages/footer.php";
    ?>
    <script>
        function sendFormData() {
            const inputs = document.querySelectorAll('input');
            const data = [];
            inputs.forEach((input) => {
                data.push(`${input.id}=${input.value}`);
            });

            const urlParams = new URLSearchParams(window.location.search);
            const uID = <?php echo $uID ?>;

            const queryString = data.join('&');

            const xhr = new XMLHttpRequest();

            xhr.open('GET', '../../backEnd/updateMember.php?uID=' + uID + '&' + queryString);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const toastElList = document.querySelectorAll('.toast')
                    if (xhr.responseText === "success") {
                        document.getElementById('save').classList.remove('btn-light');
                        document.getElementById('save').classList.add('btn-success');
                        document.getElementById('save').innerHTML = "Gespeichert";
                        document.getElementById('save').disabled = true;
                    }
                }
            };

            // Send the request
            xhr.send();
        }

        document.getElementById('save').addEventListener("click", sendFormData);
    </script>
</body>

</html>