<?php

include_once __DIR__.'/../../bootstrap.php';
Auth::auth();
if(!isset($_POST['id'])) {
    header("Location: index.php");
    exit();
}
$id = $_POST['id'];

include_once '../../backEnd/pdo.php';
$userData = select("SELECT `ID`, `title`, `first name`, `last name`, `second title`, `name day`, `profile pic url`, `private_street`, `private_house_number`, `private_plz`, `private_city`, `private_country`, `private_telephone`, `private_mobile`, `private_web`, `private_email`, `professional_company`, `professional_job`, `professional_street`, `professional_housenumber`, `professional_plz`, `professional_city`, `professional_country`, `professional_telephone`, `professional_mobile`, `professional_web`, `professional_email`, `date_of_enter`, `note`, `username` FROM `user` WHERE `ID`='$id'")[0];


?>
<div class="modal-header">
    <h3 class="modal-title"><?php echo $userData['title'].' '.$userData['first name'].' '.$userData['last name'].' '.$userData['second title'] ?></h3>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="document.getElementById('user-modal').dataset.shown = 'false';">x</button>
</div>
<div class="modal-body">
    <div style="display: flex; justify-content: space-between">
        <div>
            <p><strong>Beigetreten</strong>: <?php echo date("d.m.Y", strtotime($userData['date_of_enter'])) ?><br>
            <strong>Namenstag</strong>: <?php echo date("d.m", strtotime($userData['name day'])); ?></p>
        </div>
        <div id="user-avatar" style="margin-right: 15px; height: 90px; width: 90px; font-size: 45px; display: flex; justify-content: center; align-items: center; background-color: #003366"><?php if(!empty($userData['profile pic url'])) {echo "<img src='".$userData['profile pic url']."'>"; } else { echo $userData['first name'][0]; } ?></div>
    </div>
    <div style="display: flex; flex-wrap: wrap; gap: 25px">
        <div style="flex: 1; align-items: start">
            <h2>Privat</h2>
            <p><?php if(!empty($userData['private_street'])) { echo $userData['private_street']." ";} ?>     <?php if(!empty($userData['private_house_number'])) { echo $userData['private_house_number'].",";} else { echo '';} ?><br>    <?php if(!empty($userData['private_plz'])) { echo $userData['private_plz'];} ?>     <?php if(!empty($userData['private_city'])) { echo $userData['private_city'];} ?><br>    <?php if(!empty($userData['private_country'])) { echo $userData['private_country'];} ?></p>
            <p><strong>Mobil</strong>: <?php if(!empty($userData['private_mobile'])) { echo $userData['private_mobile'];} ?><br><strong>Festnetz</strong>: <?php if(!empty($userData['private_telephone'])) { echo $userData['private_telephone'];} ?></p>
            <p><strong>Web</strong>: <?php if(!empty($userData['private_web'])) { echo $userData['private_web'];} ?><br><strong>Mail</strong>: <?php if(!empty($userData['private_email'])) { echo $userData['private_email'];} ?></p>
        </div>
        <hr>
        <div style="flex: 1; align-items: start">
            <h2>Beruflich</h2>
            <p><?php if(!empty($userData['professional_job'])) { echo "<strong>".$userData['professional_job']."</strong> bei <strong>";} ?>    <?php if(!empty($userData['professional_company'])) { echo $userData['professional_company']."</strong>";} if(isset($userData['professional_company']) || isset($userData['professional_job'])) { echo "</br>"; } ?>    <?php if(!empty($userData['professional_street'])) { echo $userData['professional_street']." ";} ?>     <?php if(!empty($userData['professional_housenumber'])) { echo $userData['professional_housenumber'].",</br>";} ?>   <?php if(!empty($userData['professional_plz'])) { echo $userData['professional_plz'];} ?>     <?php if(!empty($userData['professional_city'])) { echo $userData['professional_city']."<br>";} ?>    <?php if(!empty($userData['professional_country'])) { echo $userData['professional_country'];} ?></p>
            <p><strong>Mobil</strong>: <?php if(!empty($userData['professional_mobile'])) { echo $userData['professional_mobile'];} ?><br><strong>Festnetz</strong>: <?php if(!empty($userData['professional_telephone'])) { echo $userData['professional_telephone'];} ?></p>
            <p><strong>Web</strong>: <?php if(!empty($userData['professional_web'])) { echo $userData['professional_web'];} ?><br><strong>Mail</strong>: <?php if(!empty($userData['professional_email'])) { echo $userData['professional_email'];} ?></p>
        </div>
    </div>
</div>
<!--<div class="modal-footer">-->
<!--    --><?php
//
//    if(!empty($userData['private_mobile'])) {
//        ?><!--         -->
<!--        <a href="tel:+--><?php //echo $userData['private_mobile'] ?><!--">-->
<!--        <button type="button" class="btn btn-primary">-->
<!--            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill"-->
<!--                viewBox="0 0 16 16">-->
<!--                <path fill-rule="evenodd"-->
<!--                    d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />-->
<!--            </svg>-->
<!--            Privat-->
<!--        </button>-->
<!--        </a>-->
<!--        --><?php //
//    }
//     if(!empty($userData['professional_telephone'])) {
//        ?><!--         -->
<!--        <a href="tel:+--><?php //echo $userData['professional_telephone'] ?><!--">-->
<!--        <button type="button" class="btn btn-primary">-->
<!--            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill"-->
<!--                viewBox="0 0 16 16">-->
<!--                <path fill-rule="evenodd"-->
<!--                    d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />-->
<!--            </svg>-->
<!--            Beruflich-->
<!--        </button>-->
<!--        </a>-->
<!--        --><?php //
//    }
//     if(!empty($userData['private_email'])) {
//        ?><!--       -->
<!--        <a href="mailto:--><?php //echo $userData['private_email'] ?><!--">-->
<!--        <button type="button" class="btn btn-primary">-->
<!--            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">-->
<!--               <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>-->
<!--            </svg>-->
<!--            Privat-->
<!--        </button>-->
<!--        </a>-->
<!--        --><?php //
//    }
//
//
//     if(!empty($userData['professional_email'])) {
//        ?><!--       -->
<!--        <a href="mailto:--><?php //echo $userData['professional_email'] ?><!--">-->
<!--        <button type="button" class="btn btn-primary">-->
<!--            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">-->
<!--                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>-->
<!--            </svg>-->
<!--            Beruflich-->
<!--        </button>-->
<!--        </a>-->
<!--        --><?php //
//    }
//
//    ?>
<!--</div>-->