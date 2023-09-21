<?php

include_once 'auth.php';
if(!checkAdmin()) {
    exit("Admin Rechte erforderlich");
}

$userID = $_SESSION['uID'];
$file = $_FILES['fileToUpload'];
$category = $_POST['category'];
$name = $_POST['name'];
$active = $_POST['active'];
$fileSize = filesize($file['tmp_name']);
$path = '../uploads/' . $category . "/";


if (!is_dir($path)) {
  mkdir($path, 0777, true);
}

// Speichere die Datei im Upload-Verzeichnis mit einem eindeutigen Namen
$filename = uniqid() . '-' . $file['name'];
move_uploaded_file($file['tmp_name'], $path . $filename);

// Füge das Hochgeladene zur Datenbank hinzu
include_once 'pdo.php';
execute("INSERT INTO `uploads`(`name`, `file_name`, `path`, `category`, `size`, `uploader`, `active`) VALUES ('$name','$filename','uploads/$category/$filename','$category','$fileSize',$userID,'$active')");
// Führe die Abfrage aus

// Geben Sie eine Antwort zurück an den Client
echo json_encode(['success' => true]);