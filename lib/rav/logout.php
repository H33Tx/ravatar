<?php

if ($loggedin) {
    $conn->where("user", $user["username"])->delete("session");
    setcookie($config["cookie"] . "_session", "", time() - 60 * 60 * 24 * 30, "/", $config["domain"]);
}
header("Refresh: 2, url=index.php");
