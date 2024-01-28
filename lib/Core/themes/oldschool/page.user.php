<div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center text-xl">
    <?= $username ?>'s <?= $lang["page"] ?>
</div>
<div class="grid grid-cols-2 gap-5">
    <div class="col-span-1">
        <!-- NACHRICHT ANFANG -->
        <?php $cachefile = "cache/{$usertheme}/{$username}-message.html";
        if (file_exists($cachefile) && time() - $config["cachetime"] < filemtime($cachefile)) {
            echo "<!-- Cached copy, generated " . date('d/m/Y H:i', filemtime($cachefile)) . " SERVER TIME -->";
            $handle = fopen($cachefile, 'rb');
            $buffer = '';
            while (!feof($handle)) {
                $buffer = fread($handle, 4096);
                echo $buffer;
                ob_flush();
                flush();
            }
            fclose($handle);
        } else {
            ob_start(); ?>
            <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
                <?= $lang["users message"] ?>
            </div>
            <div class="mt-1">
                <p>
                    <?= !empty($profile["message"]) ? stripslashes(nl2br(strip_tags($purifier->purify($profile["message"])))) : $lang["user hasnt specified a gallery message yet"] ?>
                </p>
            </div>
        <?php include "lib/PHPCache/cache.php";
        } ?>
        <form method="POST" name="refresh">
            <input type="text" name="cachefile" value="<?= $cachefile ?>" hidden>
            <input type="submit" name="refresh" value="<?= $lang["refresh message"] ?>" class="mt-1 w-full rounded-full border border-black hover:bg-slate-300 cursor-pointer">
        </form>
        <!-- NACHRICHT ENDE -->
        <?php if ($loggedin && $user["level"] == 10) { ?>
            <!-- ADMINISTRATION ANFANG -->
            <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
                <?= $lang["administration"] ?>
            </div>
            <div class="mt-1">
                <form method="POST" name="ban">
                    <input type="text" name="username" value="<?= $username ?>" hidden>
                    <?php if ($user["username"] != $username) { ?>
                        <input type="submit" name="ban" value="<?= $profile["banned"] ? $lang["unban user"] : $lang["ban user"] ?>" class="mt-1 w-full rounded-full border border-black hover:bg-slate-300 cursor-pointer">
                    <?php } ?>
                    <div class="grid grid-cols-2 gap-1">
                        <input type="submit" name="setImagesPublic" value="<?= $lang["set images public"] ?>" class="mt-1 w-full rounded-full col-span-1 border border-black hover:bg-slate-300 cursor-pointer">
                        <input type="submit" name="setImagesPrivate" value="<?= $lang["set images private"] ?>" class="mt-1 w-full rounded-full col-span-1 border border-black hover:bg-slate-300 cursor-pointer">
                    </div>
                </form>
            </div>
            <!-- ADMINISTRATION ENDE -->
        <?php } ?>
    </div>
    <div class="col-span-1">
        <?php $cachefile = "cache/{$usertheme}/{$username}-stats.html";
        if (file_exists($cachefile) && time() - $config["cachetime"] < filemtime($cachefile)) {
            echo "<!-- Cached copy, generated " . date('d/m/Y H:i', filemtime($cachefile)) . " SERVER TIME -->";
            $handle = fopen($cachefile, 'rb');
            $buffer = '';
            while (!feof($handle)) {
                $buffer = fread($handle, 4096);
                echo $buffer;
                ob_flush();
                flush();
            }
            fclose($handle);
        } else {
            ob_start(); ?>
            <!-- STATISTIKEN ANFANG -->
            <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
                <?= $lang["stats"] ?>
            </div>
            <div class="mt-1">
                <p>
                    <?= $lang["amount of avatars posted"] ?>: <?= $count ?>
                </p>
                <p>
                    <?= $lang["joined at"] ?>: <?= $profile["timestamp"] ?>
                </p>
                <p>
                    <?= $lang["userlevel"] ?>: <?= $profile["level"] ?>
                </p>
            </div>
            <!-- STATISTIKEN ENDE -->
        <?php include "lib/PHPCache/cache.php";
        } ?>
        <form method="POST" name="refresh">
            <input type="text" name="cachefile" value="<?= $cachefile ?>" hidden>
            <input type="submit" name="refresh" value="<?= $lang["refresh stats"] ?>" class="mt-1 w-full rounded-full col-span-3 border border-black hover:bg-slate-300 cursor-pointer">
        </form>
        <!-- NAVIGATIONSMENÜ ANFANG -->
        <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
            <?= $lang["navigation"] ?>
        </div>
        <div class="text-center mt-1">
            <a href="index.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["main page"] ?></a> |
            <a href="gallery.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["gallery"] ?></a> |
            <a href="instructions.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["instructions"] ?></a> <?php if ($loggedin) { ?>|
            <a href="avatars.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["edit avatars"] ?></a> |
            <a href="logout.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["log out"] ?></a><?php } ?>
        </div>
        <!-- NAVIGATIONSMENÜ ENDE -->
    </div>
    <div class="col-span-2">
        <!-- AVATARS ANFANG -->
        <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
            <?= $lang["avatars"] ?>
        </div>
        <div class="grid grid-cols-8 mt-1">
            <?php $cachefile = !$loggedin || ($loggedin && ($user["level"] != 10 && $username != $user["username"])) ? "cache/{$usertheme}/{$username}.html" : ($user["level"] == 10 || $username == $user["username"] ? "cache/{$usertheme}/{$username}-edit.html" : "cache/{$usertheme}/{$username}.html");
            if (file_exists($cachefile) && time() - $config["cachetime"] < filemtime($cachefile)) {
                echo "<!-- Cached copy, generated " . date('d/m/Y H:i', filemtime($cachefile)) . " SERVER TIME -->";
                $handle = fopen($cachefile, 'rb');
                $buffer = '';
                while (!feof($handle)) {
                    $buffer = fread($handle, 4096);
                    echo $buffer;
                    ob_flush();
                    flush();
                }
                fclose($handle);
            } else {
                ob_start(); ?>
                <?php foreach ($avatars as $avatar) { ?>
                    <div id="<?= stripslashes($conn->escape($purifier->purify($avatar["file"]))) ?>" class="col-span-1 hover:bg-slate-600 <?= $avatar["hidden"] ? "bg-slate-400" : "" ?>">
                        <a href="<?= $config["url"] ?>data/<?= $avatar["file"] ?>" target="_blank">
                            <img src="<?= $config["url"] ?>data/<?= $avatar["file"] ?>" alt="<?= $avatar["image"] ?>" class="w-full px-2 aspect-square pt-2 <?= $loggedin && ($user["level"] == 10 || $username == $user["username"]) ? "" : "pb-2" ?>" loading="lazy">
                        </a>
                        <!-- <p class="text-sm text-center <?= $loggedin && ($user["level"] == 10 || $username == $user["username"]) ? "" : "pb-1" ?>">
                            <?= stripslashes($conn->escape($purifier->purify($avatar["image"]))) ?>
                        </p> -->
                        <?php if ($loggedin && ($user["level"] == 10 || ($username == $user["username"] && !$avatar["by_admin"]))) { ?>
                            <p class="text-sm text-center pb-1">
                                <a onclick="toggleVisible('<?= stripslashes($conn->escape($purifier->purify($avatar["file"]))) ?>');window.open('<?= $config["url"] ?>toggle.php?id=<?= $avatar["id"] ?>');" class="underline text-blue-500 hover:text-blue-800 cursor-pointer">
                                    [Toggle]
                                </a>
                            </p>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php include "lib/PHPCache/cache.php";
            } ?>
        </div>
        <!-- AVATARS ENDE -->
        <form method="POST" name="refresh">
            <input type="text" name="cachefile" value="<?= $cachefile ?>" hidden>
            <input type="submit" name="refresh" value="<?= $lang["refresh avatars"] ?>" class="mt-1 w-full rounded-full col-span-3 border border-black hover:bg-slate-300 cursor-pointer">
        </form>
    </div>
</div>