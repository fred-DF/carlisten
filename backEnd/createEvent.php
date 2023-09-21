<?php

include_once 'auth.php';
if(!checkAdmin()) {
    exit("Admin Rechte erforderlich");
}

if(isset($_GET['title']) && isset($_GET['date']) && isset($_GET['location']) && isset($_GET['registable'])) {
    include_once 'pdo.php';
    $title = $_GET['title'];
    $date = $_GET['date'];
    $location = $_GET['location'];
    $registable = $_GET['registable'];
    execute("INSERT INTO `events`(`title`, `timestamp`, `location`, `registable`) VALUES ('$title','$date','$location','$registable')");
    echo json_encode(['response' => 'success']);
} else {
    echo json_encode(['response' => 'error', 'error' => 'Nicht alle Parameter übergeben']);
}