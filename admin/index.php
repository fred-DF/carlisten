<?php
include '../bootstrap.php';
if(!Auth::checkAdmin()) {
    exit("Admin Rechte erforderlich");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/style.css">
    <title>Website Verwaltung</title>
</head>
<body>  
    <?php
        include 'nav-bar.php';
    ?>
    <div class="container">
        <h1>Website Verwaltung</h1>
        <h2>Schnelle Links</h2>
        <a href="member.php">
            <button class="btn btn-primary">Benutzerverwaltung</button>
        </a>        
        <a href="upload.php">
            <button class="btn btn-primary">Dokumente Hochladen</button>
        </a>
    </div>
</body>
</html>