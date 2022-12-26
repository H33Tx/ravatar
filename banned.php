<?php

// Das was wir wirklich brauchen
$bannedpage = true;
require "load.php";

// Ist man auch wirklich gebannt?
if ($loggedin && !$user["banned"]) header("Location: index.php");
if (!$loggedin) header("Location: index.php");

// Nun bauen wir die Seite nach dem Thema
include "lib/Core/themes/{$usertheme}/part.header.php";
include "lib/Core/themes/{$usertheme}/part.menu.php";
include "lib/Core/themes/{$usertheme}/page.banned.php";
include "lib/Core/themes/{$usertheme}/part.footer.php";
