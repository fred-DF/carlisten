<?php
// Einfaches Routing-Beispiel für den eingebauten PHP-Server

$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$query_string = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

if (preg_match('/\.(?:js|css|php)$/', $request_uri)) {
    return false;  // Datei direkt servieren, ohne Umleitung
}

// Überprüfen, ob die Anfrage auf das /member/ Verzeichnis zeigt
if (strpos($request_uri, '/member/') === 0) {
    // Überprüfen, ob der Pfad zu einer existierenden .js oder .css Datei führt


    // Entfernen des /member/ Präfixes aus der URI
    $path = substr($request_uri, 8);
    // Übergeben der verbleibenden URI als GET-Parameter an controller.php
    $_GET['path'] = $path;
    include 'member/controller.php';
} else {
    // Andernfalls normale Datei/das normale Verzeichnis laden
    return false;
}
