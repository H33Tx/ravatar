<?php

// Hier nehmen wir einfach alle Dateien, die wir wirklich brauchen und alle Objekte dazu!
require "simple/config.php";
require "simple/kink.php";
require "lib/MysqliDb/MysqliDb.php";
$conn = new MysqliDb(array("host" => $config["db"]["host"], "username" => $config["db"]["username"], "password" => $config["db"]["password"], "db" => $config["db"]["table"], "port" => $config["db"]["port"], "prefix" => $config["db"]["prefix"], "charset" => $config["db"]["charset"],));
require "lib/htmlpurifier/library/HTMLPurifier.auto.php";
$htmlConfig = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($htmlConfig);
require "simple/session.php";

// Debug-Modus?
$config["debug"] == true ? error_reporting(E_ALL) && ini_set('display_errors', 1) : error_reporting(0) && ini_set('display_errors', 0);

// Hier nehmen wir alle Variablen die etwas mit der Seite zu tun haben könnten wie Thema, Sprache, etc.
$userlang = isset($_COOKIE[$config["cookie"]  . "_lang"]) && !empty($_COOKIE[$config["cookie"]  . "_lang"]) ? (file_exists("lib/Core/lang/{$conn->escape($purifier->purify($_COOKIE[$config["cookie"]  . "_lang"]))}.php") ? $conn->escape($purifier->purify($_COOKIE[$config["cookie"]  . "_lang"])) : $config["default"]["lang"]) : $config["default"]["lang"];
require "lib/Core/lang/{$userlang}.php";
$usertheme = isset($_COOKIE[$config["cookie"]  . "_theme"]) && !empty($_COOKIE[$config["cookie"]  . "_theme"]) ? (file_exists("lib/Core/themes/{$conn->escape($purifier->purify($_COOKIE[$config["cookie"]  . "_theme"]))}/info.php") ? $conn->escape($purifier->purify($_COOKIE[$config["cookie"]  . "_theme"])) : $config["default"]["theme"]) : $config["default"]["theme"];
require "lib/Core/themes/{$usertheme}/info.php";
