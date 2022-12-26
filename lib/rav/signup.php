<?php

if (isset($_POST["signup"])) {
    $username = $conn->escape($purifier->purify($_POST["username"]));
    $password = $conn->escape($purifier->purify($_POST["password"]));
    $password2 = $conn->escape($purifier->purify($_POST["password2"]));
    $email = $conn->escape($purifier->purify($_POST["email"]));

    if (empty($username)) die("username empty.");
    if (empty($password)) die("password empty.");
    if (empty($password2)) die("password empty.");
    if (empty($email)) die("email empty.");

    if (strlen($username) < 3 || strlen($username) > 20) die("invalid username. min 3, max 20.");
    if (strlen($password) < 8 || strlen($password) > 64) die("invalid password. min 8, max 64.");
    if (strlen($password2) < 8 || strlen($password2) > 64) die("invalid password. min 8, max 64.");
    if (strlen($email) < 6 || strlen($email) > 64) die("invalid email. min 6, max 254.");
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) die("invalid email. this is used in case you lost your password. we will never share it with anyone!");

    if (!empty($conn->where("username", $username)->getOne("user"))) die("username already taken.");
    if (!empty($conn->where("email", $email)->getOne("user"))) die("email already taken. sus!");

    $token = md5(rand());
    $conn->insert("user", array(
        "username" => $username,
        "password" => crypt($password, $config["salt"]),
        "email" => $email,
        "level" => $config["default"]["level"]
    ));
    $conn->insert("session", array(
        "user" => $username,
        "token" => $token
    ));
    setcookie($config["cookie"] . "_session", $token, time() + 60 * 60 * 24 * 30, "/", $config["domain"]);
}
