<nav>
    <div class="container" id="nav-bar-content">
        <a href="https://carlisten.genanntnoelke.de/member/" class="no-decoration">
            <img src="https://carlisten.genanntnoelke.de/src/logos/Logo - Text - Weiss.svg" alt="">
        </a>
        <div class="links">
            <a href="https://carlisten.genanntnoelke.de/member/events" class="no-decoration" style="color: white;">Veranstaltungen</a>
            <a href="https://carlisten.genanntnoelke.de/member/downloads" class="no-decoration" style="color: white;">Downloads</a>
            <a href="https://carlisten.genanntnoelke.de/member/members" class="no-decoration" style="color: white;">Mitglieder</a>
            <a href="https://carlisten.genanntnoelke.de/member/executive-boards" class="no-decoration" style="color: white;">Vorstände</a>
            <a href="https://carlisten.genanntnoelke.de/member/namedays" class="no-decoration" style="color: white;">Namenstage</a>
            <?php
                if (checkAdmin()) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin">Administration</a>
                    </li>
                <?php
                }
            ?>
        </div>
    </div>
</nav>