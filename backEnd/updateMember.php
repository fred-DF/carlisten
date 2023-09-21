<?php

include_once 'auth.php';
if($_GET['uID'] !== $_SESSION['uID']) {
  if(!checkAdmin()) {
    exit("Berechtigung Fehlt");
  }
}

// Überprüfen, ob die GET-Parameter vorhanden sind
if(isset($_GET['uID']) && isset($_GET['titleInput']) && isset($_GET['firstNameInput']) && isset($_GET['lastNameInput']) && isset($_GET['dayInput']) && isset($_GET['monthInput']) && isset($_GET['privateStreet']) && isset($_GET['privateHouseNumber']) && isset($_GET['privatePLZ']) && isset($_GET['privateCity']) && isset($_GET['privateCountry']) && isset($_GET['privateMobile']) && isset($_GET['privateEmail']) && isset($_GET['professionalCompany']) && isset($_GET['professionalJob']) && isset($_GET['professionalStreet']) && isset($_GET['professionalHouseNumber']) && isset($_GET['professionalPLZ']) && isset($_GET['professionalCity']) && isset($_GET['professionalCountry']) && isset($_GET['professionalMobile']) && isset($_GET['professionalMail'])) {
  
  // GET-Parameter in PHP-Variablen speichern
  $uID = $_GET['uID'];
  $titleInput = $_GET['titleInput'];
  $firstNameInput = $_GET['firstNameInput'];
  $lastNameInput = $_GET['lastNameInput'];
  $secondTitleInput = $_GET['secondTitleInput'];
  $dayInput = $_GET['dayInput'];
  $monthInput = $_GET['monthInput'];
  $privateStreet = $_GET['privateStreet'];
  $privateHouseNumber = $_GET['privateHouseNumber'];
  $privatePLZ = $_GET['privatePLZ'];
  $privateCity = $_GET['privateCity'];
  $privateCountry = $_GET['privateCountry'];
  $privateMobile = $_GET['privateMobile'];
  $privateTelephone = $_GET['privateTelephone'];
  $privateWeb = $_GET['privateWeb'];
  $privateEmail = $_GET['privateEmail'];
  $professionalCompany = $_GET['professionalCompany'];
  $professionalJob = $_GET['professionalJob'];
  $professionalStreet = $_GET['professionalStreet'];
  $professionalHouseNumber = $_GET['professionalHouseNumber'];
  $professionalPLZ = $_GET['professionalPLZ'];
  $professionalCity = $_GET['professionalCity'];
  $professionalCountry = $_GET['professionalCountry'];
  $professionalMobile = $_GET['professionalMobile'];
  $professionalTelephone = $_GET['professionalTelephone'];
  $professionalWeb = $_GET['professionalWeb'];
  $professionalMail = $_GET['professionalMail'];
  $dateOfEntry = $_GET['dateOfEntry'];
  
  // Weiterverarbeitung der Variablen ...
  include_once 'pdo.php';
  $res = execute("UPDATE `user` SET 
        `title`='$titleInput',
        `first name`='$firstNameInput',
        `last name`='$lastNameInput',
        `second title`='$secondTitleInput',
        `name day`='$monthInput;$dayInput',
        `profile pic url`='',
        `private_street`='$privateStreet',
        `private_house_number`='$privateHouseNumber',
        `private_plz`='$privatePLZ',
        `private_city`='$privateCity',
        `private_country`='$privateCountry',
        `private_telephone`='$privateTelephone',
        `private_mobile`='$privateMobile',
        `private_web`='$privateWeb',
        `private_email`='$privateEmail',
        `professional_company`='$professionalCompany',
        `professional_job`='$professionalJob',
        `professional_street`='$professionalStreet',
        `professional_housenumber`='$professionalHouseNumber',
        `professional_plz`='$professionalPLZ',
        `professional_city`='$professionalCity',
        `professional_country`='$professionalCountry',
        `professional_telephone`='$professionalTelephone',
        `professional_mobile`='$professionalMobile',
        `professional_web`='$professionalWeb',
        `professional_email`='$professionalMail',
        `date_of_enter`='$dateOfEntry',
        `note`=''
        WHERE `ID`='$uID'");

      if($res) {
        echo "success";
      } else {
        echo "error";
      }
  
} else {
  // Fehlermeldung ausgeben, wenn ein oder mehrere GET-Parameter fehlen
  echo "Ein oder mehrere GET-Parameter fehlen.";
}
?>
