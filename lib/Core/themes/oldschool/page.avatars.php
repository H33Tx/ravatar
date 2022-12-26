<div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center text-xl">
    <?= $user["username"] ?>'s <?= $lang["page"] ?>
</div>
<div class="grid grid-cols-2 gap-5">
    <div class="col-span-1">
        <!-- UPLOAD ANFANG -->
        <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
            <?= $lang["upload"] ?>
        </div>
        <div class="mt-1">
            <form method="POST" enctype="multipart/form-data" name="upload" class="text-center">
                <input required type="file" name="avatar">
                <input type="submit" name="upload" class="rounded-full px-2 border border-black hover:bg-slate-300 cursor-pointer" value="<?= $lang["upload"] ?>">
                <p>
                    <?= $lang["max filesize"] ?>: <?= formatBytes($config["filesize"]) ?>
                </p>
                <p>
                    <?= $lang["allowed filetypes"] ?>:
                    <!-- ERLAUBTE-TYPEN-BLOCK ANFANG -->
                    <?php $i = 1; ?>
                    <?php foreach ($config["filetypes"] as $type => $key) { ?>
                        <?= $i != 1 ? ", " : "" ?>
                        <b><?= $key ?></b>
                        <?php $i++; ?>
                    <?php } ?>
                    <!-- ERLAUBTE-TYPEN-BLOCK ENDE -->
                </p>
            </form>
        </div>
        <!-- UPLOAD ENDE -->
        <!-- INFO ANFANG -->
        <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
            <?= $lang["info"] ?>
        </div>
        <div class="mt-1 text-center text-sm">
            <p>
                <?= $lang["link to"] ?> <?= $lang["avatar"] ?>: <a href="<?= $config["url"] ?>avatar.php?name=<?= $user["username"] ?>" class="underline text-blue-500 hover:text-blue-800" target="_blank"><?= $config["url"] ?>avatar.php?name=<?= $user["username"] ?></a>
            </p>
            <p>
                <?= $lang["link to"] ?> <?= $lang["gallery"] ?>: <a href="<?= $config["url"] ?>user.php?name=<?= $user["username"] ?>" class="underline text-blue-500 hover:text-blue-800" target="_blank"><?= $config["url"] ?>user.php?name=<?= $user["username"] ?></a>
            </p>
        </div>
        <!-- INFO ENDE -->
        <!-- NAVIGATIONSMENÜ ANFANG -->
        <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
            <?= $lang["navigation"] ?>
        </div>
        <div class="text-center mt-1">
            <a href="index.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["main page"] ?></a> | <a href="gallery.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["gallery"] ?></a> | <a href="instructions.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["instructions"] ?></a> | <a href="logout.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["log out"] ?></a>
        </div>
        <!-- NAVIGATIONSMENÜ ENDE -->
    </div>
    <div class="col-span-1">
        <!-- EINSTELLUNGEN ANFANG -->
        <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
            <?= $lang["settings"] ?>
        </div>
        <div class="mt-1" id="settingsform">
            <form method="POST" name="settings">
                <div class="grid grid-cols-4 gap-1">
                    <label for="settings-gallery-message">
                        <?= $lang["gallery message"] ?>:
                    </label>
                    <textarea name="message" id="settings-gallery-message" class="min-h-[70px] w-full col-span-3 border border-black"><?= $purifier->purify(stripslashes($user["message"])) ?></textarea>
                    <label for="settings-email">
                        <?= $lang["email"] ?>:
                    </label>
                    <input minlength="6" maxlength="254" required type="email" name="email" id="settings-email" class="w-full col-span-3 border border-black" value="<?= $user["email"] ?>">
                    <input type="submit" name="settings" class="w-full rounded-full col-span-4 border border-black hover:bg-slate-300 cursor-pointer" value="<?= $lang["set"] ?>">
                </div>
            </form>
        </div>
        <!-- EINSTELLUNGEN ENDE -->
    </div>
    <div class="col-span-2">
        <!-- AVATARS ANFANG -->
        <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
            <?= $lang["avatars"] ?>
        </div>
        <div class="grid grid-cols-8 mt-1">
            <?php $cachefile = "cache/{$usertheme}/{$user["username"]}.html";
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
                    <a href="<?= $config["url"] ?>data/<?= $avatar["file"] ?>" target="_blank" class="col-span-1 hover:bg-slate-400">
                        <div id="<?= stripslashes($conn->escape($purifier->purify($avatar["file"]))) ?>">
                            <img src="<?= $config["url"] ?>data/<?= $avatar["file"] ?>" alt="<?= $avatar["image"] ?>" class="w-full px-2 pt-2" loading="lazy">
                            <p class="text-sm text-center pb-1">
                                <?= stripslashes($conn->escape($purifier->purify($avatar["image"]))) ?>
                            </p>
                        </div>
                    </a>
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