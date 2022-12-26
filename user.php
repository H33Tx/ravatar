<?php

// Das was wir wirklich brauchen
require "load.php";

// Hier dann alles andere wie SQL-Queries und so
require "lib/PHPCache/refresh.php";
$username = $conn->escape($purifier->purify($_GET["name"]));
if (empty($username)) die("no username given.");
if (strlen($username) < 3 || strlen($username) > 20) die("invalid username.");

if ((!file_exists("cache/{$usertheme}/{$username}-message.html") || (file_exists("cache/{$usertheme}/{$username}-message.html") && time() - $config["cachetime"] > filemtime("cache/{$usertheme}/{$username}-message.html"))) || (!file_exists("cache/{$usertheme}/{$username}-stats.html") || (file_exists("cache/{$usertheme}/{$username}-stats.html") && time() - $config["cachetime"] > filemtime("cache/{$usertheme}/{$username}-stats.html")))) {
    $user = $conn->where("username", $username)->getOne("user");
    if (empty($user)) die("user not found.");
    $count = $conn->where("user", $username)->getValue("avatars", "count(*)");
}
if (!file_exists("cache/{$usertheme}/{$username}.html") || (file_exists("cache/{$usertheme}/{$username}.html") && time() - $config["cachetime"] > filemtime("cache/{$usertheme}/{$username}.html"))) {
    $avatars = $conn->where("user", $username)->orderBy("id", "ASC")->get("avatars");
    // if (empty($avatars)) die("user has no avatars.");
}

// Nun bauen wir die Seite nach dem Thema
include "lib/Core/themes/{$usertheme}/part.header.php";
include "lib/Core/themes/{$usertheme}/part.menu.php";
include "lib/Core/themes/{$usertheme}/page.user.php";
include "lib/Core/themes/{$usertheme}/part.footer.php";
