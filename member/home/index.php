
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/css/style.css">
    <title>Mitgliederbereich</title>
</head>

<body>
    <?php require_once __DIR__.'/../../pages/nav-bar.php'; ?>
    <div class="container page-content">
        <?php
        include __DIR__.'/../../backEnd/setting.php';
        // Banner
        if (getSetting("home_show_banner")) {
        ?>
            <div class="alert alert-<?php echo getSetting("home_banner_color"); ?>" role="alert">
                <?php echo getSetting("home_banner_text"); ?>
                <?php
                if (getSetting("home_show_button")) {
                ?>
                    <hr>
                    <a href="<?php echo getSetting("home_link_value"); ?>"><button class="btn btn-primary"><?php echo getSetting("home_button_value"); ?></button></a>
                <?php
                }

                ?>
            </div>
        <?php
        }
        // Willkommensnachricht
        if (getSetting("home_show_welcome_message")) {
        ?>
            <p><?php echo str_replace("\n", "</br>", getSetting("home_welcome_message")); ?></p>
        <?php
        }
        ?>
<!--        <div class="mt-3">
            <button class="btn btn-primary">
                <img src="../src/facebookBanner.svg" height="24px" width="auto" alt="">
            </button>
            <button class="btn btn-outline-primary">info@carlisten.de</button>
        </div>-->
    </div>
    <?php
    include __DIR__."/../../pages/footer.php";
    ?>
</body>

</html>