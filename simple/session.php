<?php

if (isset($_COOKIE[$config["cookie"] . "_session"]) && !empty($_COOKIE[$config["cookie"] . "_session"])) {
    $token = $conn->escape($purifier->purify($_COOKIE[$config["cookie"] . "_session"]));
    if (!empty($conn->where("token", $token)->getOne("session"))) {
        $session = $conn->where("token", $token)->getOne("session");
        $user = $conn->where("username", $session["user"])->getOne("user");
        if (!empty($user)) {
            $loggedin = true;
        } else {
            $loggedin = false;
        }
    } else {
        $loggedin = false;
    }
} else {
    $loggedin = false;
}
