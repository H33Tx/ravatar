<?php

// Das was wir wirklich brauchen
require "load.php";

// Hier dann alles andere wie SQL-Queries und so
require "lib/rav/logout.php";

// Nun bauen wir die Seite nach dem Thema
include "lib/Core/themes/{$usertheme}/part.header.php";
include "lib/Core/themes/{$usertheme}/part.menu.php";
include "lib/Core/themes/{$usertheme}/page.logout.php";
include "lib/Core/themes/{$usertheme}/part.footer.php";
