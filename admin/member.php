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
    <title>Mitgliederverwaltung</title>
</head>
<body>    
    <?php
        include_once 'nav-bar.php';
    ?>
    <div class="container">    
        <h1>Mitgliederverwaltung</h1>
        <button class="btn btn-primary" onclick="addMember()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg icon" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg>    
            Mitglied hinzufügen
        </button>
        <button class="btn btn-link" onclick="document.querySelector('div.modal').dataset.shown =  'true';">Mitglieder Exportieren</button>
        <table class="table mt-4">
            <thead class="table-head">
                <tr>
                    <th>
                        Name
                    </th>
                    <th>

                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $users = select("SELECT `ID`, `title`, `first name`, `last name`, `second title` FROM `user`");
                    foreach ($users as $key => $value) {
                        $name = $value['title']." ".$value['first name']." ".$value['last name']." ".$value['second title'];
                        ?>
                <tr>
                    <td class="py-3">
                        <?php echo $name; ?>
                    </td>
                    <td class="position-relative">
                        <div class="btn-group position-absolute end-0">
                            <button class="btn btn-primary align-middle" onclick="editUser(<?php echo $value['ID'] ?>)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg>
                            </button>
                        </div>                                    
                    </td>
                </tr>
                        <?php
                    }
                ?>                
            </tbody>
        </table>
    </div>
    <div class="modal" id="event-modal">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Benutzerliste exportieren</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <p>Wählen Sie eine option:</p>
                    <div>
                        <button id="withoutDeaths" onclick="downloadList('excludeDeath')">Ohne Verstorbene</button>
                        <button id="withDeaths" onclick="downloadList()">Mit Verstorbenen</button>
                        <button id="mail" onclick="downloadList('requireMailShipping')">Postversand</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function addMember () {
            window.location = 'addMember.php';            
        }
        function deletUser() {
            alert("under construction");
        }

        function editUser (id) {
            window.location = 'editMember.php?uID=' + id;
        }

        function downloadList (type) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../backEnd/exportMemberList.php?condition=' + type, true);
            xhr.responseType = 'blob';

            xhr.onload = function (e) {
                if (this.status == 200) {
                    var blob = new Blob([this.response], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                    var url = URL.createObjectURL(blob);
                    var a = document.createElement('a');
                    a.href = url;
                    a.download = 'Mitgliederliste.xlsx';
                    document.body.appendChild(a);
                    a.click();
                }
            };

            xhr.send();
        }
    </script>
</body>
</html>