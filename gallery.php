<?php

// Das was wir wirklich brauchen
require "load.php";

// Hier dann alles andere wie SQL-Queries und so
require "lib/PHPCache/refresh.php";
if (!file_exists("cache/{$usertheme}/latest.html") || (file_exists("cache/{$usertheme}/latest.html") && time() - $config["cachetime"] > filemtime("cache/{$usertheme}/latest.html"))) {
    $latest = $conn->orderBy("id", "DESC")->get("avatars", $config["default"]["latest"]);
}
if (!file_exists("cache/{$usertheme}/index.html") || (file_exists("cache/{$usertheme}/index.html") && time() - $config["cachetime"] > filemtime("cache/{$usertheme}/index.html"))) {
    $examples = $conn->orderBy("RAND ()")->get("avatars", $config["default"]["random"]);
}
if (!file_exists("cache/{$usertheme}/users.html") || (file_exists("cache/{$usertheme}/users.html") && time() - $config["cachetime"] > filemtime("cache/{$usertheme}/users.html"))) {
    $users = $conn->orderBy("username", "ASC")->get("user");
}

// Nun bauen wir die Seite nach dem Thema
include "lib/Core/themes/{$usertheme}/part.header.php";
include "lib/Core/themes/{$usertheme}/part.menu.php";
include "lib/Core/themes/{$usertheme}/page.gallery.php";
include "lib/Core/themes/{$usertheme}/part.footer.php";
