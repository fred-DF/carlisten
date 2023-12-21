<?php

require_once __DIR__.'/../../bootstrap.php';

// Bildpfad überprüfen (angenommen, es wird als GET-Parameter übergeben)
if (!isset($_GET['image'])) {
die("Kein Bild angegeben.");
}

$imagePath = __DIR__ .'/'. basename($_GET['image']);

// Authentifizierung überprüfen
if (Auth::auth()) {
    header("Location: /login.html?requireLogIn");
}

// MIME-Typ des Bildes ermitteln und als Content-Type setzen
$mimeType = mime_content_type($imagePath);
header("Content-Type: " . $mimeType);

// Bild zurückgeben
readfile($imagePath);