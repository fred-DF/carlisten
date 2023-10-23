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
    <title>Datei Upload Verwaltung</title>
</head>
<body>
    <?php include 'nav-bar.php'; ?>
    <div class="container">
        <h1>Datei Upload Verwaltung</h1>
        <button class="btn btn-primary" onclick="window.location = 'uploadFile.php';">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg icon" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg>    
            Datei hochalden
        </button>
        <table class="table mt-4">
            <thead class="table-head">
                <tr>
                    <th>
                        Name
                    </th>
                     <th>
                        Kategorie
                    </th>
                     <th>
                        Dateigröße
                    </th>
                     <th>
                        Hochgeladen
                    </th>
                    <th>
                        Erscheint
                    </th>
                    <th>
                        
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $uploads = select("SELECT `ID`, `name`, `category`, `path`, `size`, `upload_date`, `active` FROM `uploads`");
                    foreach ($uploads as $key => $value) {                        
                        ?>
                <tr class="align-middle">
                    <th>
                        <?php echo $value['name']; ?>
                    </th>
                     <th>
                        <?php echo $value['category']; ?>
                    </th>
                     <th>
                        <?php echo round((int) $value['size'] / 102400) . " MB"; ?>
                    </th>
                     <th>
                        <?php echo date("d.m.Y H:i", strtotime($value['upload_date'])); ?>
                    </th>
                    <th>
                        <?php if($value['active'] == "0000-00-00") {
                            echo "wird angezeigt";
                        } else {
                             echo date("D, d.m.Y", strtotime($value['active'])); 
                        }
                        ?>
                    </th>
                    <th>
                        <button class="btn btn-outline-danger" onclick="deleteFile('<?php echo $value['path'] ?>')">Löschen</button>
                    </th>
                </tr>
                        <?php
                    }
                ?>                
            </tbody>
        </table>
    </div>
    <script>
        function deleteFile (path) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../backEnd/manageUploads.php?deleteFile&path=' + path, true);
            xhr.onload = function() {
                if(xhr.responseText == "success") {
                    window.location.reload();
                }
            };
            xhr.send();
        }
    </script>
</body>
</html>