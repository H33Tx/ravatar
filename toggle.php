<?php

// Das was wir wirklich brauchen
require "load.php";

// Hier dann alles andere wie SQL-Queries und so
if (!$loggedin) die("not logged in.");
$id = stripslashes($conn->escape($purifier->purify($_GET["id"])));
$avatar = $conn->where("id", $id)->getOne("avatars");
if ($user["level"] != 10 && ($avatar["user"] != $user["username"])) die("no permission to perform this.");
if ($user["username"] == $avatar["user"] && $user["level"] != 10 && $avatar["by_admin"]) die("no permission to perform this.");
if ($avatar["hidden"]) {
    if ($user["level"] == 10)
        $conn->where("id", $id)->update("avatars", array("hidden" => false, "by_admin" => false));
    else
        $conn->where("id", $id)->update("avatars", array("hidden" => false));
} else {
    $conn->where("id", $id)->update("avatars", array("hidden" => true));
    if ($user["level"] == 10)
        $conn->where("id", $id)->update("avatars", array("hidden" => true, "by_admin" => true));
    else
        $conn->where("id", $id)->update("avatars", array("hidden" => true));
}
echo "visibility has been toggled.";

?>
<script>
    window.onload(window.close());
</script>