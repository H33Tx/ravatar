<div class="grid grid-cols-5 gap-5">
    <div class="col-span-1">
        <?php if ($loggedin) { ?>
            <!-- ACCOUNTBLOCK ANFANG -->
            <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center">
                <?= $lang["logged in"] ?>
            </div>
            <div id="accountdiv" class="p-1 mt-1">
                <p>
                    <?= $lang["logged in"] ?> <?= $lang["as"] ?> <?= $user["username"] ?>
                </p>
                <p>
                    <a href="avatars.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["edit avatars"] ?></a> | <a href="logout.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["log out"] ?></a>
                </p>
            </div>
            <!-- ACCOUNTBLOCK ENDE -->
        <?php } ?>
        <!-- NAVIGATIONSMENÜ ANFANG -->
        <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center <?= $loggedin ? "mt-3" : "" ?>">
            <?= $lang["navigation"] ?>
        </div>
        <div class="text-center mt-1">
            <a href="index.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["main page"] ?></a> | <a href="instructions.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["instructions"] ?></a>
        </div>
        <!-- NAVIGATIONSMENÜ ENDE -->
        <!-- NUTZER ANFANG -->
        <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
            <?= $lang["users"] ?>
        </div>
        <?php $cachefile = "cache/{$usertheme}/users.html";
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
            echo "<!-- Cached copy ends here -->";
        } else {
            ob_start(); ?>
            <div class="mt-1">
                <?php foreach ($users as $profile) { ?>
                    <?php $count = $conn->where("user", $profile["username"])->getValue("avatars", "count(*)"); ?>
                    <p>
                        <a href="user.php?name=<?= $profile["username"] ?>" class="underline text-blue-500 hover:text-blue-800"><?= $profile["username"] ?></a> (<?= $count ?>)
                    </p>
                <?php } ?>
            </div>
        <?php include "lib/PHPCache/cache.php";
        } ?>
        <form method="POST" name="refresh">
            <input type="text" name="cachefile" value="<?= $cachefile ?>" hidden>
            <input type="submit" name="refresh" value="<?= $lang["refresh users"] ?>" class="mt-1 w-full rounded-full col-span-3 border border-black hover:bg-slate-300 cursor-pointer">
        </form>
        <!-- NUTZER ENDE -->
    </div>
    <div class="col-span-4">
        <!-- ZULETZT ANFANG -->
        <div class="col-span-1 p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center">
            <?= $lang["latest"] ?>
        </div>
        <?php $cachefile = "cache/{$usertheme}/latest.html";
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
            echo "<!-- Cached copy ends here -->";
        } else {
            ob_start(); ?>
            <div class="grid grid-cols-6 mt-1">
                <?php foreach ($latest as $late) { ?>
                    <div class="col-span-1 hover:bg-slate-600">
                        <a href="user.php?name=<?= $late["user"] ?>#<?= stripslashes($conn->escape($purifier->purify($late["file"]))) ?>">
                            <img src="<?= $config["url"] ?>data/<?= $late["file"] ?>" alt="<?= stripslashes($conn->escape($purifier->purify($late["file"]))) ?>" class="w-full px-2 pt-2" loading="lazy">
                        </a>
                        <p class="text-sm text-center pb-1">
                            <a href="user.php?name=<?= $late["user"] ?>" class="underline text-blue-500 hover:text-blue-800"><?= $late["user"] ?></a>
                        </p>
                    </div>
                <?php } ?>
            </div>
        <?php include "lib/PHPCache/cache.php";
        } ?>
        <form method="POST" name="refresh">
            <input type="text" name="cachefile" value="<?= $cachefile ?>" hidden>
            <input type="submit" name="refresh" value="<?= $lang["refresh latest"] ?>" class="mt-1 w-full rounded-full col-span-3 border border-black hover:bg-slate-300 cursor-pointer">
        </form>
        <!-- ZULETZT ENDE -->
        <!-- BEISPIELE ANFANG -->
        <div class="col-span-1 p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
            <?= $lang["examples"] ?>
        </div>
        <?php $cachefile = "cache/{$usertheme}/examples.html";
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
            echo "<!-- Cached copy ends here -->";
        } else {
            ob_start(); ?>
            <div class="grid grid-cols-6 mt-1">
                <?php foreach ($examples as $example) { ?>
                    <div class="col-span-1 hover:bg-slate-600">
                        <a href="user.php?name=<?= $example["user"] ?>#<?= stripslashes($conn->escape($purifier->purify($example["file"]))) ?>">
                            <img src="<?= $config["url"] ?>data/<?= $example["file"] ?>" alt="<?= stripslashes($conn->escape($purifier->purify($example["file"]))) ?>" class="w-full px-2 pt-2" loading="lazy">
                        </a>
                        <p class="text-sm text-center pb-1">
                            <a href="user.php?name=<?= $example["user"] ?>" class="underline text-blue-500 hover:text-blue-800"><?= $example["user"] ?></a>
                        </p>
                    </div>
                <?php } ?>
            </div>
        <?php include "lib/PHPCache/cache.php";
        } ?>
        <form method="POST" name="refresh">
            <input type="text" name="cachefile" value="<?= $cachefile ?>" hidden>
            <input type="submit" name="refresh" value="<?= $lang["refresh examples"] ?>" class="mt-1 w-full rounded-full col-span-3 border border-black hover:bg-slate-300 cursor-pointer">
        </form>
        <!-- BEISPIELE ENDE -->
    </div>
</div>