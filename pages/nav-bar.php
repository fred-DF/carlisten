<nav>
    <div class="nav-bar-content" id="nav-bar-content">
        <a href="<?php echo getenv('APP_URL') ?>/member/home" class="no-decoration">
            <img src="<?php echo getenv('APP_URL') ?>/src/logos/Logo - Text - Weiss.svg" alt="">
        </a>
        <div class="links">
            <a href="<?php echo getenv('APP_URL') ?>/member/events" class="no-decoration" style="color: white;">Veranstaltungen</a>
            <a href="<?php echo getenv('APP_URL') ?>/member/downloads" class="no-decoration" style="color: white;">Downloads</a>
            <a href="<?php echo getenv('APP_URL') ?>/member/members" class="no-decoration" style="color: white;">Mitglieder</a>
            <a href="<?php echo getenv('APP_URL') ?>/member/executive-boards" class="no-decoration" style="color: white;">Vorstände</a>
            <a href="<?php echo getenv('APP_URL') ?>/member/namedays" class="no-decoration" style="color: white;">Namenstage</a>
<!--            <?php
/*                if ( Auth::checkAdmin() ) {
                */?>
                    <a class="nav-link" style="color: #ffffff" href="../admin">Administration</a>
                --><?php
/*                }
            */?>
        </div>
    </div>
</nav>