<?php

include_once '../../backEnd/auth.php';
if (json_decode(auth(), true)['response'] !== 'success') {
    header("HTTP/1.0 403 Forbidden");
    include '../../pages/403.html';
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/bootstrap/css/bootstrap.css">
    <title>Namenstage</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
        <div class="container-fluid">
            <div class="collapse navbar-collapse container-sm" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../">Startseite</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../downloads">Veranstaltungen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../downloads">Downloads</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../members">Mitglieder</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../executive-boards">Vorstände</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="">Namenstage</a>
                    </li>
                    <?php
                    if (checkAdmin()) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin">Administration</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <span class="navbar-text">
                    <a href="profile">Mein Profil</a>
                </span>
            </div>
        </div>
    </nav>
    <div class="container-sm">
        <h1>Namenstage</h1>
        <table class="table table-hover">
            <thead>
                <tr class="table-secondary">
                    <th scope="col">Namenstag</th>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $month = "0";

                include_once '../../backEnd/pdo.php';
                $namedays = select("SELECT `ID`, `title`, `first name`, `last name`, `second title`, `name day`, `profile pic url` FROM `user` ORDER BY `user`.`name day` ASC");
                $germanMonths = array(
                    '1' => 'Januar',
                    '2' => 'Februar',
                    '3' => 'März',
                    '4' => 'April',
                    '5' => 'Mai',
                    '6' => 'Juni',
                    '7' => 'Juli',
                    '8' => 'August',
                    '9' => 'September',
                    '10' => 'Oktober',
                    '11' => 'November',
                    '12' => 'Dezember'
                );
                foreach ($namedays as $value) {
                    if (!empty($value['name day'])) {
                        if ($month != explode(';', $value['name day'])[0]) {
                ?>
                            <tr>
                                <td colspan="3"><?php
                                                echo "<strong>" . $germanMonths[ltrim(explode(';', $value['name day'])[0], '0')] . "</strong>";
                                                ?></td>
                            </tr>
                        <?php
                        }
                        $month = explode(';', $value['name day'])[0];
                        ?>
                        <tr>
                            <td><?php echo explode(';', $value['name day'])[1] . '.' . explode(';', $value['name day'])[0] ?></td>
                            <td><?php echo $value['title'] . ' ' . $value['first name'] . ' ' . $value['last name'] . ' ' . $value['second title']; ?></td>
                            <td class="text-end"><a href="../members?openModal&uID=<?php echo $value['ID']; ?>">Profil</a></td>
                        </tr>
                <?php
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>