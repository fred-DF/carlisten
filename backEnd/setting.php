<?php

include_once 'auth.php';
if(json_decode(auth(), true)['response'] !== 'success') {
    exit(json_decode(auth(), true)['response']);
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(!checkAdmin()) {
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
    $jsonData = file_get_contents('../website-settings.json');
    $dataArray = json_decode($jsonData, true);
    foreach($dataArray as $key => $value) {
        if($key == $searchKey) {
            return $value;
        }
    }
    return null;
}

function getSettingPath ($searchKey, $path) {
    $jsonData = file_get_contents($path.'/website-settings.json');
    $dataArray = json_decode($jsonData, true);
    foreach($dataArray as $key => $value) {
        if($key == $searchKey) {
            return $value;
        }
    }
    return null;
}