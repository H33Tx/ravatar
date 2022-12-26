<?php

if (isset($_POST["login"])) {
    $username = $conn->escape($purifier->purify($_POST["username"]));
    $password = $conn->escape($purifier->purify($_POST["password"]));

    if (empty($username)) die("username empty.");
    if (empty($password)) die("password empty.");

    if (strlen($username) < 3 || strlen($username) > 20) die("invalid username. min 3, max 20.");
    if (strlen($password) < 8 || strlen($password) > 64) die("invalid password. min 8, max 64.");

    if (empty($conn->where("username", $username)->getOne("user"))) die("user not found.");
    $try = $conn->where("username", $username)->getOne("user");

    if (crypt($password, $config["salt"]) === $try["password"]) {
        $token = md5(rand());
        $conn->insert("session", array(
            "user" => $username,
            "token" => $token
        ));
        setcookie($config["cookie"] . "_session", $token, time() + 60 * 60 * 24 * 30, "/", $config["domain"]);
        header("location: index.php");
    } else {
        die("password wrong.");
    }
}
