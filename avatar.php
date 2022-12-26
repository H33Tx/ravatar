<?php

// Das was wir wirklich brauchen
require "load.php";

// Hier dann alles andere wie SQL-Queries und so
$username = $conn->escape($purifier->purify($_GET["name"]));
if (empty($username)) die("no username given.");
if (strlen($username) < 3 || strlen($username) > 20) die("invalid username.");
$avatar = $conn->where("user", $username)->orderBy("RAND ()")->getOne("avatars");
if (empty($avatar)) die("user has no avatars.");

// Nun geben wir das Bild aus
header("Content-Type: image/jpeg");
header("Content-Length: " . filesize("data/" . $avatar["file"]));
readfile("data/" . $avatar["file"]);
