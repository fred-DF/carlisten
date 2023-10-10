<?php

require_once __DIR__.'/../bootstrap.php';
Auth::checkAdmin();
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;

include_once 'pdo.php';
$data = select("SELECT `ID`, `title`, `first name`, `last name`, `second title`, `name day`, `profile pic url`, `private_street`, `private_house_number`, `private_plz`, `private_city`, `private_country`, `private_telephone`, `private_mobile`, `private_web`, `private_email`, `professional_company`, `professional_job`, `professional_street`, `professional_housenumber`, `professional_plz`, `professional_city`, `professional_country`, `professional_telephone`, `professional_mobile`, `professional_web`, `professional_email`, `date_of_enter`, `username` FROM `user` ORDER BY `user`.`last name` ASC ");

// Neue Spout Writer-Instanz erstellen
$writer = WriterEntityFactory::createXLSXWriter();
$writer->openToFile('php://output');

// Tabellenüberschriften schreiben
$headerRow = WriterEntityFactory::createRowFromArray(['Anrede', 'Vorname', 'Nachname', 'Zweiter Titel', 'Namenstag', 'Straße', 'Hausnummer', 'PLZ', 'Stadt', 'Land', 'Telefon', 'Mobil', 'Webseite', 'E-Mail', 'Firma', 'Beruf', 'Straße', 'Hausnummer', 'PLZ', 'Stadt', 'Land', 'Telefon', 'Mobil', 'Webseite', 'E-Mail', 'Eintrittsdatum', 'Notiz', 'Benutzername']);
$writer->addRow($headerRow);

foreach ($data as $item) {
    // Neue Spout Row-Instanz erstellen
    $row = WriterEntityFactory::createRowFromArray([
        $item['title'],
        $item['first name'],
        $item['last name'],
        $item['second title'],
        $item['name day'],
        $item['private_street'],
        $item['private_house_number'],
        $item['private_plz'],
        $item['private_city'],
        $item['private_country'],
        $item['private_telephone'],
        $item['private_mobile'],
        $item['private_web'],
        $item['private_email'],
        $item['professional_company'],
        $item['professional_job'],
        $item['professional_street'],
        $item['professional_housenumber'],
        $item['professional_plz'],
        $item['professional_city'],
        $item['professional_country'],
        $item['professional_telephone'],
        $item['professional_mobile'],
        $item['professional_web'],
        $item['professional_email'],
        $item['date_of_enter'],
        '',
        $item['username'],
    ]);

    // Row dem Writer hinzufügen
    $writer->addRow($row);
}

$writer->close();
