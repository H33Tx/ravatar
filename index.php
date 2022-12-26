<?php

// Das was wir wirklich brauchen
require "load.php";

// Hier dann alles andere wie SQL-Queries und so
require "lib/rav/login.php";
require "lib/rav/signup.php";
require "lib/PHPCache/refresh.php";
if (!file_exists("cache/{$usertheme}/index.html") || (file_exists("cache/{$usertheme}/index.html") && time() - $config["cachetime"] > filemtime("cache/{$usertheme}/index.html"))) {
    $examples = $conn->orderBy("RAND ()")->where("hidden", false)->get("avatars", $config["default"]["random"]);
}

// Nun bauen wir die Seite nach dem Thema
include "lib/Core/themes/{$usertheme}/part.header.php";
include "lib/Core/themes/{$usertheme}/part.menu.php";
include "lib/Core/themes/{$usertheme}/page.index.php";
include "lib/Core/themes/{$usertheme}/part.footer.php";
