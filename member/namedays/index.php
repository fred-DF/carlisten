<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/css/style.css">
    <title>Namenstage</title>
</head>
<body>
<?php require_once __DIR__.'/../../pages/nav-bar.php'; ?>
    <div class="container page-content">
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