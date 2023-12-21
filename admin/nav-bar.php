<nav>
    <div id="nav-bar-content">
        <div class="logo-toggle-wrapper">
            <a href="<?php echo getenv('APP_URL') ?>/member/home" class="no-decoration">
                <img src="<?php echo getenv('APP_URL') ?>/src/logos/Logo - Text - Weiss.svg" alt="">
            </a>
            <span id="hamburgerShow">☰</span>
            <span id="hamburgerHide">✕</span>
        </div>
        <div id="nav-bar-color"></div>
        <div class="links" id="nav-links" style="display: flex; justify-content: center; gap: 20px; top: calc(-100% - 87px);">
            <a class="nav-link no-decoration" href="<?php echo $_ENV['APP_URL'] ?>/admin/member.php" style="color: white;">Benutzerverwaltung</a>
            <a class="nav-link no-decoration" href="<?php echo $_ENV['APP_URL'] ?>/admin/upload.php" style="color: white;">Dateiupload</a>
            <a class="nav-link no-decoration" href="<?php echo $_ENV['APP_URL'] ?>/admin/calendar.php" style="color: white;">Veranstaltungskalender</a>
            <a class="nav-link no-decoration" href="<?php echo $_ENV['APP_URL'] ?>/admin/bank.php" style="color: white;">Bankdaten</a>
            <a class="nav-link no-decoration" href="<?php echo $_ENV['APP_URL'] ?>/admin/settings.php" style="color: white;">Website-Text</a>
            <a class="nav-link no-decoration" href="<?php echo $_ENV['APP_URL'] ?>/member/home" style="color: white;">Zurück zum Mitglieder-Bereich</a>
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