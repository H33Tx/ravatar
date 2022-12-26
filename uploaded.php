<?php

// Das was wir wirklich brauchen
require "load.php";

// Angemeldet oder nicht, das ist hier die Frage.
$loggedin ? header("Refresh: 2, url=avatars.php") : header("Location: index.php");

// Nun bauen wir die Seite nach dem Thema
include "lib/Core/themes/{$usertheme}/part.header.php";
include "lib/Core/themes/{$usertheme}/part.menu.php";
include "lib/Core/themes/{$usertheme}/page.uploaded.php";
include "lib/Core/themes/{$usertheme}/part.footer.php";
