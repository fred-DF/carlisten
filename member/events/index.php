<?php
$uID = $_SESSION['uID'];
$user = select("SELECT `title`, `first name`, `last name`, `second title` FROM `user` WHERE `ID`='$uID'")[0];
$name = $user['first name'] . " " . $user['last name'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/css/style.css">
    <title>Veranstaltungen</title>
</head>
<body>
<?php require_once __DIR__.'/../../pages/nav-bar.php'; ?>
    <div class="container page-content">
        <h1>Veranstaltungskalender</h1>
        <p>Jeden ersten Mittwoch im Monat findet ab 19:30 Uhr unser Stammtisch in der Schwemme des Zwei-Löwen-Klubs statt. Eine Anmeldung ist nicht erforderlich.</br>Die nächsten Veranstaltungen:</p>
        <div class="row">
            <?php

            $events = select("SELECT `title`, `timestamp`, `location`, `shown`, `registable` FROM `events`");

            foreach ($events as $value) {
                $mail_text = "Sehr geehrte Herren,
ich, " . $name . " melde mich hiermit bei der Veranstaltung " . $value['title'] . " am " . date("d.m.Y", strtotime($value['timestamp'])) . " an.

Mit Freundlichn Grüßen
" . $name;
                $subject = "Anmeldung: " . $value['title'];
            ?>
                <div class="card" style="width: 18rem;">
                    <h3 class="card-title"><?php echo $value['title']; ?></h3>
                    <p class="card-text"><?php if (!empty($value['location'])) {
                                                echo $value['location'] . "<br>";
                                            }; ?>
                        <?php echo date("d.m.Y, H:i", strtotime($value['timestamp'])); ?> Uhr</p>
                    <?php

                    if ($value['registable']) {
                    ?>
                        <a href="mailto:veranstaltung@carlisten.de?subject=<?php echo urlencode($subject); ?>&body=<?php echo urlencode($mail_text); ?>" class="w-100 btn btn-primary">Anmeldung</a>
                    <?php
                    }

                    ?>
                </div>
                <?php
            }
            if (empty($events)) {
            ?>
                <div class="alert alert-info">
                    <p>Keine Veranstaltungen eingetragen</p>
                </div>
            <?php
            }
            ?>
        </div>
        <style>

            div.row {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 10px;
                grid-auto-rows: minmax(100px, auto);
                padding-top: 25px;
            }

            div.card {
                padding: 15px 20px;
                background-color: #f6f6f6;
                border-radius: 5px;
            }

            .card-title {
                margin: 5px 0;
            }
        </style>
    </div>
<?php
include __DIR__."/../../pages/footer.php";
?>
</body>

</html>