<?php

// Das wichtigste
require "load.php";

// Nun der Rest
$page = stripslashes($conn->escape($purifier->purify($_GET["page"])));
if (empty($page)) die("page is empty.");

// Nun der Switch
switch ($page) {
    case "user":
        $username = stripslashes($conn->escape($purifier->purify($_GET["name"])));
        header("Refresh: 2, url=user.php?name={$username}&refresh");
        break;
    default:
        header("Refresh: 2, url=index.php");
}

// Die Seite bauen
include "lib/Core/themes/{$usertheme}/part.header.php";
include "lib/Core/themes/{$usertheme}/part.menu.php";
include "lib/Core/themes/{$usertheme}/page.bump.php";
include "lib/Core/themes/{$usertheme}/part.footer.php";
