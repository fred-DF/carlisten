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
    <div class="container-sm">
        <h1 class="fw-bold">Dateien hochladen</h1>
        <form action="../backEnd/uploadFile.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="formFile" class="form-label">1x Textdokument gleichzeitig</label>
                <input class="form-control" name="fileToUpload" type="file" id="formFile" required>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="name" placeholder="name@example.com" required>
                <label for="floatingInput">Name des Uploads</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="category" placeholder="name@example.com" required>
                <label for="floatingInput">Kategorie</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingInput" name="Erscheint am" name="active" placeholder="name@example.com" required>
                <label for="floatingInput">Erscheint am</label>
            </div>
            <button type="submit" class="btn btn-primary" onclick="form.classList.add('was-validated');">Hochladen und Indizieren</button>
        </form>    
        <div class="alert mt-3" if="feedback" role="alert">
            Uplaod erflogreich
            <hr>
            <a href="upload.php"><button class="btn btn-success">zur Dateiverwaltung</button></a>
        </div>
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
                if(JSON.stringify(xhr.responseText)['success']) {
                    document.getElementById('feedback').classList.add('alert-success');
                } else {                    
                    document.getElementById('feedback').classList.add('alert-danger');
                    document.getElementById('feedback').innerText = "Ein fehler ist aufgetreten";
                }
            };
            xhr.send(formData);
        });
    </script>
</body>
</html>