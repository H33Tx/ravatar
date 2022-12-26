<?php

if (isset($_POST["refresh"])) {
    $cfile = $conn->escape($purifier->purify($_POST["cachefile"]));
    if (file_exists("$cfile")) unlink("$cfile");
    header("Refresh: 0");
}
