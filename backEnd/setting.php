<?php

require_once __DIR__.'/../bootstrap.php';
Auth::auth();

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(!Auth::checkAdmin()) {
        exit("Admin Rechte erforderlich");
    }
    $json_data = file_get_contents('php://input');    
    $file_path = '../website-settings.json';
    if (file_put_contents($file_path, $json_data)) {
        echo 'Data successfully saved to file.';
    } else {
        echo 'Error saving data to file.';
    }
}

// Durchsucht die website-settings.json nach einem Key und gibt das Value zurück => Einstellung wird gesucht und Wert der Einstellung wird zurückgegeben

function getSetting ($searchKey) {
    $jsonData = file_get_contents(__DIR__.'/../website-settings.json');
    $dataArray = json_decode($jsonData, true);
    foreach($dataArray as $key => $value) {
        if($key == $searchKey) {
            return $value;
        }
    }
    return null;
}

function getSettingPath ($searchKey) {
    $jsonData = file_get_contents(__DIR__.'/../website-settings.json');
    $dataArray = json_decode($jsonData, true);
    foreach($dataArray as $key => $value) {
        if($key == $searchKey) {
            return $value;
        }
    }
    return null;
}