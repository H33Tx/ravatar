<?php

if (isset($_POST["upload"])) {
    if (empty($_FILES["avatar"])) die("no avatar given.");
    $avatar["base"] = $conn->escape($purifier->purify(basename($_FILES["avatar"]["name"])));
    $avatar["tmp"] = $_FILES["avatar"]["tmp_name"];
    $avatar["file"] = strtolower(pathinfo($avatar["base"], PATHINFO_EXTENSION));

    if ($_FILES["avatar"]["size"] < $config["filesize"]) {
        //You can not upload this file
        if (uploadImage($avatar["tmp"], $avatar["file"])) {
            $image = genUuid();
            move_uploaded_file($_FILES["avatar"]["tmp_name"], "data/{$image}.{$avatar["file"]}");
            if (file_exists("cache/{$usertheme}/{$user["username"]}.html")) unlink("cache/{$usertheme}/{$user["username"]}.html");
            $conn->insert("avatars", array(
                "user" => $user["username"],
                "image" => $avatar["base"],
                "type" => $avatar["file"],
                "file" => $image . "." . $avatar["file"]
            ));
            header("Location: uploaded.php");
        } else {
            die("invalid filetype or fake-image.");
        }
    } else {
        die("file too large. cannot exceed {$config["filesize"]}KB, or " . formatBytes($config["filesize"]));
    }
}
