<nav>
    <div class="nav-bar-content" id="nav-bar-content">
        <div class="logo-toggle-wrapper">
            <a href="<?php echo getenv('APP_URL') ?>/member/home" class="no-decoration">
                <img src="<?php echo getenv('APP_URL') ?>/src/logos/Logo - Text - Weiss.svg" alt="">
            </a>
            <span id="hamburgerShow">☰</span>
            <span id="hamburgerHide">✕</span>
        </div>
        <div id="nav-bar-color"></div>
        <div class="links" id="nav-links">
            <a href="<?php echo getenv('APP_URL') ?>/member/events" class="no-decoration" style="color: white;">Veranstaltungen</a>
            <a href="<?php echo getenv('APP_URL') ?>/member/downloads" class="no-decoration" style="color: white;">Downloads</a>
            <a href="<?php echo getenv('APP_URL') ?>/member/members" class="no-decoration" style="color: white;">Mitglieder</a>
            <a href="<?php echo getenv('APP_URL') ?>/member/executive-boards" class="no-decoration" style="color: white;">Vorstände</a>
            <a href="<?php echo getenv('APP_URL') ?>/member/namedays" class="no-decoration" style="color: white;">Namenstage</a>
            <a href="<?php echo getenv('APP_URL') ?>/member/profile" class="no-decoration"  style="color: white;">Mein Profil</a>
            <?php
                            if ( Auth::checkAdmin() ) {
                        ?>
                    <a class="nav-link" style="color: #ffffff" href="/admin">Administration</a>
                <?php
                            }
                        ?>
        </div>
    </div>
</nav>
<script>
    function toggleNavBar (toggle) {
        const links = document.getElementById('nav-links');
        if(toggle) {
            links.dataset.shown = 'true';
            document.getElementById('hamburgerHide').style.display = 'block';
            document.getElementById('hamburgerShow').style.display = 'none';
        }

        if(!toggle) {
            links.dataset.shown = 'false';
            document.getElementById('hamburgerHide').style.display = 'none';
            document.getElementById('hamburgerShow').style.display = 'block';
        }
    }

    document.getElementById('hamburgerShow').addEventListener('click', () => {toggleNavBar(1)});
    document.getElementById('hamburgerHide').addEventListener('click', () => {toggleNavBar(0)});
</script>