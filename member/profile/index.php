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
    $nameDayDay = explode(";", $value['name day'])[0];
    $nameDayMonth = explode(";", $value['name day'])[1];
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
        <h1>Profil bearbeiten:</h1>
        <img src="<?php $profilePicUrl ?>" alt="">
        <span>Name:</span>
        <div style="width: 600px; max-width: 100%; display: flex; flex-flow: column">
            <div style="display: flex; gap: 5px; justify-items: center;">
                <input type="text" class="form-control" id="titleInput" placeholder="Titel" <?php if (isset($title)) { echo "value='" . $title . "'";} ?>>
                <input style="flex-grow: 2" type="text" class="form-control" id="firstNameInput" placeholder="Vorname" <?php if (isset($firstName)) {echo "value='" . $firstName . "'";} ?>>
                <input style="flex-grow: 2" type="text" class="form-control" id="lastNameInput" placeholder="Nachname" <?php if (isset($title)) { echo "value='" . $lastName . "'"; } ?>>
                <input type="text" class="form-control" id="secondTitleInput" placeholder="Nachgestellter Titel" <?php if (isset($title)) { echo "value='" . $secondTitle . "'"; } ?>>
            </div>
            <span>Namenstag:</span>
            <div style="display: flex; align-items: center; gap: 5px; width: 60px">
                <input style="width: 15px!important; text-align: center" type="tel" maxlength="2" class="form-control" id="dayInput" placeholder="TT" <?php if (isset($nameDayDay)) { echo "value='" . $nameDayDay . "'"; } ?>>
                <p>:</p>
                <input style="width: 15px!important; text-align: center" type="tel" maxlength="2" class="form-control" id="monthInput" placeholder="MM" <?php if (isset($nameDayMonth)) { echo "value='" . $nameDayMonth . "'"; } ?>>
            </div>
            <span>Adresse:</span>
            <div style="display: flex; flex-direction: column;">
                <div style="display: flex; gap: 5px">
                    <input style="flex-grow: 11" type="text" class="form-control" id="privateStreet" placeholder="Straße" <?php if (isset($title)) { echo "value='" . $privateStreet . "'"; } ?>>
                    <input style="flex-grow: 1" type="text" class="form-control" id="privateHouseNumber" placeholder="Hausnummer" <?php if (isset($title)) { echo "value='" . $privateHouseNumber . "'"; } ?>>
                </div>
                <div style="display: flex; gap: 5px">
                    <input style="flex-grow: 1" type="number" class="form-control" id="privatePLZ" placeholder="PLZ" <?php if (isset($title)) { echo "value='" . $privatePLZ . "'"; } ?>>
                    <input style="flex-grow: 9" type="text" class="form-control" id="privateCity" placeholder="Stadt" <?php if (isset($title)) { echo "value='" . $privateCity . "'"; } ?>>
                </div>
                <input type="text" class="form-control" id="privateCountry" placeholder="Land" <?php if (isset($title)) { echo "value='" . $privateCountry . "'"; } ?>>
            </div>
            <span>Telefon:</span>
            <div>
                <input type="tel" class="form-control" id="privateMobile" placeholder="Mobil" <?php if (isset($title)) { echo "value='" . $privateMobile . "'"; } ?>>
                <input type="tel" class="form-control" id="privateTelephone" placeholder="Telefon" <?php if (isset($title)) { echo "value='" . $privateTelephone . "'"; } ?>>
            </div>
            <span>E-Mail:</span>
            <div>
                <input type="email" class="form-control" id="privateEmail" placeholder="E-Mail" <?php if (isset($title)) { echo "value='" . $privateEmail . "'"; } ?>>
            </div>
            <span>Beruf:</span>
            <div style="display: flex; gap: 5px">
                <input type="text" class="form-control" id="professionalCompany" placeholder="Firma" <?php if (isset($title)) { echo "value='" . $professionalCompany . "'"; } ?>>
                <input type="text" class="form-control" id="professionalJob" placeholder="Beruf" <?php if (isset($title)) { echo "value='" . $professionalJob . "'"; } ?>>
            </div>
            <span>Beruf. Adresse:</span>
            <div style="display: flex; flex-direction: column;">
                <div style="display: flex; gap: 5px">
                    <input style="flex-grow: 11" type="text" class="form-control" id="professionalStreet" placeholder="Straße" <?php if (isset($title)) { echo "value='" . $professionalStreet . "'"; } ?>>
                    <input style="flex-grow: 1" type="text" class="form-control" id="professionalHouseNumber" placeholder="Hausnummer" <?php if (isset($title)) { echo "value='" . $professionalHouseNumber . "'"; } ?>>
                </div>
                <div style="display: flex; gap: 5px">
                    <input style="flex-grow: 1" type="number" class="form-control" id="professionalPLZ" placeholder="PLZ" <?php if (isset($title)) { echo "value='" . $professionalPLZ . "'"; } ?>>
                    <input style="flex-grow: 9" type="text" class="form-control" id="professionalCity" placeholder="Stadt" <?php if (isset($title)) { echo "value='" . $professionalCity . "'"; } ?>>
                </div>
                <input type="text" class="form-control" id="professionalCountry" placeholder="Land" <?php if (isset($title)) { echo "value='" . $professionalCountry . "'"; } ?>>
            </div>
            <span>Beruf. Telefon:</span>
            <div>
                <input type="tel" class="form-control" id="professionalMobile" placeholder="Mobil" <?php if (isset($title)) { echo "value='" . $professionalMobile . "'"; } ?>>
                <input type="text" class="form-control" id="professionalTelephone" placeholder="Telefon" <?php if (isset($title)) { echo "value='" . $professionalTelephone . "'"; } ?>>
            </div>
            <span>Beruf. Website & Beruf. E-Mail:</span>
            <input type="url" class="form-control" id="professionalWeb" placeholder="Web" <?php if (isset($title)) { echo "value='" . $professionalWeb . "'"; } ?>>
            <input type="email" class="form-control" id="professionalMail" placeholder="E-Mail" <?php if (isset($title)) { echo "value='" . $professionalEmail . "'"; } ?>>
            <span>Eintrittsdatum:</span>
            <div>
                <input type="date" class="form-control" id="dateOfEntry" placeholder="Eintrittsdatum" <?php if (isset($title)) { echo "value='" . $dateOfEnter . "'"; } ?>>
            </div>
            <a href="password.php">
                <button class="btn btn-danger">Passwort ändern</button>
            </a>
            <a href="password.php">
                <button class="btn btn-primary">Bankdaten ändern</button>
            </a>

            <button class="filled" style="width: 100%" id="save">Speichern</button>
            </div>
        </div>
        <script src="../../src/bootstrap/js/bootstrap.js"></script>
        <script src="editMember.js"></script>
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
                        if (xhr.responseText == "success") {
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
    <style>
        span {
            margin: 15px 0 5px 0;
        }
    </style>
</body>

</html>