<?php

if ($loggedin && $user["level"] == 10) {
    if (isset($_POST["ban"])) {
        $username = stripslashes($conn->escape($purifier->purify($_POST["username"])));
        $try = $conn->where("username", $username)->getOne("user");
        if (empty($try)) die("user not found.");
        if ($try["username"] == $user["username"]) die("cannot ban yourself.");
        if ($try["banned"]) {
            $conn->where("username", $username)->update("user", array("banned" => false));
        } else {
            $conn->where("username", $username)->update("user", array("banned" => true));
        }
        header("Location: bump.php?page=user&name={$username}");
    }

    if (isset($_POST["setImagesPublic"])) {
        $username = stripslashes($conn->escape($purifier->purify($_POST["username"])));
        $try = $conn->where("username", $username)->getOne("user");
        if (empty($try)) die("user not found.");
        $conn->where("user", $username)->update("avatars", array("hidden" => false, "by_admin" => false));
        header("Location: bump.php?page=user&name={$username}");
    }

    if (isset($_POST["setImagesPrivate"])) {
        $username = stripslashes($conn->escape($purifier->purify($_POST["username"])));
        $try = $conn->where("username", $username)->getOne("user");
        if (empty($try)) die("user not found.");
        $conn->where("user", $username)->update("avatars", array("hidden" => true, "by_admin" => true));
        header("Location: bump.php?page=user&name={$username}");
    }
}
