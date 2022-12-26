<?php

// Das was wir wirklich brauchen
require "load.php";

// Hier dann alles andere wie SQL-Queries und so
if(!$loggedin) die("not logged in.");
require "lib/rav/settings.php";
require "lib/rav/post_avatar.php";
require "lib/PHPCache/refresh.php";
if (!file_exists("cache/{$usertheme}/{$user["username"]}.html") || (file_exists("cache/{$usertheme}/{$user["username"]}.html") && time() - $config["cachetime"] > filemtime("cache/{$usertheme}/{$user["username"]}.html"))) {
    $avatars = $conn->where("user", $user["username"])->orderBy("id", "ASC")->get("avatars");
}

// Nun bauen wir die Seite nach dem Thema
include "lib/Core/themes/{$usertheme}/part.header.php";
include "lib/Core/themes/{$usertheme}/part.menu.php";
include "lib/Core/themes/{$usertheme}/page.avatars.php";
include "lib/Core/themes/{$usertheme}/part.footer.php";
