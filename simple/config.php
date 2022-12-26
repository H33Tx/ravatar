<?php

$config["title"] = "R4V4T4R Hosting";
$config["url"] = "http://localhost/ravatar/";
$config["domain"] = "localhost";
$config["cookie"] = "r4v4t4r";
$config["debug"] = false;
$config["salt"] = "ajklshd7it62783zhjksbdnyxbcjkz23891zcm,xnxycm,n,µhöqe-";
$config["filetypes"] = array("jpg", "jpeg", "gif", "png", "webp");
$config["filesize"] = 1048576 * 4; // 1048576 Bytes = 1 Megabyte (1048576 * 4 = 4 Megabytes)
$config["cachetime"] = 2628288;

$config["default"]["lang"] = "en";
$config["default"]["theme"] = "oldschool";
$config["default"]["latest"] = 12;
$config["default"]["random"] = 18;
$config["default"]["perpage"] = 30;
$config["default"]["level"] = 100;

$config["db"]["host"] = "localhost";
$config["db"]["username"] = "root";
$config["db"]["password"] = "";
$config["db"]["table"] = "ravatar";
$config["db"]["port"] = 3306; // 3306 by default for all webservers
$config["db"]["prefix"] = "";
$config["db"]["charset"] = "utf8";
