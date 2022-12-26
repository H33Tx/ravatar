<?php

if (isset($_POST["settings"])) {
    $message = $purifier->purify($_POST["message"]);
    $email = $conn->escape($purifier->purify($_POST["email"]));

    if (strlen($email) < 6 || strlen($email) > 64) die("invalid email. min 6, max 254.");
    if ($email != $user["email"] && !empty($conn->where("email", $email)->getOne("user"))) die("email already in use.");

    $conn->where("username", $user["username"])->update("user", array(
        "message" => $message,
        "email" => $email
    ));
    header("Refresh: 0");
}
