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
    <title>Document hochladen</title>
</head>
<body>
    <?php
        include 'nav-bar.php';
    ?>
    <div class="container">
        <h1 class="fw-bold">Datei hochladen</h1>
        <form action="../backEnd/uploadFile.php" method="post" enctype="multipart/form-data">
            <div class="form-floating">
                <label for="formFile" class="form-label">Bitte wähle ein PDF</label>
                <input class="form-control" name="fileToUpload" type="file" id="formFile" accept="application/pdf" required>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="name" placeholder="Jahr" required>
                <label for="floatingInput">Name des Uploads (meistens das Jahr - Bsp.: 2023)</label>
            </div>
            <div class="form-floating mb-3">
<!--                <input type="text" class="form-control" id="floatingInput" name="category" placeholder="name@example.com" required>-->
                <select name="category" id="floatingInput">
                    <option value="Grünkohl">Grünkohl</option>
                    <option value="Fastenfischessen">Fastenfischessen</option>
                    <option value="Dicke-Bohnen-Essen">Dicke-Bohnen-Essen</option>
                    <option value="Wildessen mit Damen">Wildessen mit Damen</option>
                    <option value="Allgemein">Allgemein</option>
                </select>
                <label for="floatingInput">Kategorie</label>
            </div>
            <button type="submit" class="filled" onclick="form.classList.add('was-validated');">Hochladen und indizieren</button>
        </form>
    </div>        
    <script>
        const form = document.querySelector('form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            form.disabled = true;
            const formData = new FormData(form);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', form.action, true);
            xhr.onload = function() {
                if(JSON.parse(xhr.responseText)['success']) {
                    window.location = 'upload.php?uploadSuccess'
                } else {
                    console.log("[Upload] Es ist ein Fehler aufgetreten: " + xhr.responseText)
                    alert("Es ist ein Fehler aufgetreten")
                }
            };
            xhr.send(formData);
        });
    </script>
</body>
</html>