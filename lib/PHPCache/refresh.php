<?php

if (isset($_POST["refresh"]) || isset($_GET["refresh"])) {
    $cfile = isset($_POST["refresh"]) ? $conn->escape($purifier->purify($_POST["cachefile"])) : ($loggedin && $user["level"] == 10 ? "cache/{$usertheme}/" . stripslashes($conn->escape($purifier->purify($_GET["name"]))) . "-edit.html" : "cache/{$usertheme}/" . stripslashes($conn->escape($purifier->purify($_GET["name"]))) . ".html");
    if (file_exists("$cfile")) unlink("$cfile");
    // header("Refresh: 0");
}
