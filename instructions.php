<?php

// Das was wir wirklich brauchen
require "load.php";

// Nun bauen wir die Seite nach dem Thema
include "lib/Core/themes/{$usertheme}/part.header.php";
include "lib/Core/themes/{$usertheme}/part.menu.php";
include "lib/Core/themes/{$usertheme}/page.instructions.php";
include "lib/Core/themes/{$usertheme}/part.footer.php";
