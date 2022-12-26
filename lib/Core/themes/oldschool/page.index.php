<div class="grid grid-cols-5 gap-5">
    <!-- SEITENLEISTE ANFANG -->
    <div class="col-span-1">
        <?php if (!$loggedin) { ?>
            <!-- ANMELDEBLOCK ANFANG -->
            <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center">
                <?= $lang["log in"] ?>
            </div>
            <div id="loginform">
                <form method="POST" name="login" class="p-1 mt-1" autocomplete="off">
                    <div class="grid grid-cols-3 gap-1 text-sm text-center">
                        <label for="login-username">
                            <?= $lang["username"] ?>
                        </label>
                        <input minlength="3" maxlength="20" required type="text" name="username" id="login-username" class="w-full col-span-2 border border-black">
                        <label for="login-password">
                            <?= $lang["password"] ?>
                        </label>
                        <input minlength="8" maxlength="64" autocomplete="new-password" required type="password" name="password" id="login-password" class="w-full col-span-2 border border-black">
                        <input type="submit" name="login" class="w-full rounded-full col-span-3 border border-black hover:bg-slate-300 cursor-pointer" value="<?= $lang["log in"] ?>">
                    </div>
                </form>
            </div>
            <!-- ANMELDEBLOCK ENDE -->
            <!-- REGISTRIERUNGSBLOCK ANFANG -->
            <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
                <?= $lang["create account"] ?>
            </div>
            <div id="signupform">
                <form method="POST" name="signup" class="p-1 mt-1">
                    <div class="grid grid-cols-3 gap-1 text-sm text-center">
                        <label for="signup-username">
                            <?= $lang["username"] ?>
                        </label>
                        <input minlength="3" maxlength="20" required type="text" name="username" id="signup-username" class="w-full col-span-2 border border-black">
                        <label for="signup-password">
                            <?= $lang["password"] ?>
                        </label>
                        <input minlength="8" maxlength="64" autocomplete="new-password" required type="password" name="password" id="signup-password" class="w-full col-span-2 border border-black">
                        <label for="signup-password2">
                            <?= $lang["repeat"] ?>
                        </label>
                        <input minlength="8" maxlength="64" autocomplete="new-password" required type="password" name="password2" id="signup-password2" class="w-full col-span-2 border border-black">
                        <label for="signup-email">
                            <?= $lang["email"] ?>
                        </label>
                        <input minlength="6" maxlength="254" required type="email" name="email" id="signup-email" class="w-full col-span-2 border border-black">
                        <input type="submit" name="signup" class="w-full rounded-full col-span-3 border border-black hover:bg-slate-300 cursor-pointer" value="<?= $lang["create"] ?>">
                    </div>
                </form>
            </div>
            <!-- REGISTRIERUNGSBLOCK ENDE -->
        <?php } else { ?>
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
        <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
            <?= $lang["navigation"] ?>
        </div>
        <div class="text-center mt-1">
            <a href="gallery.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["gallery"] ?></a> | <a href="instructions.php" class="underline text-blue-500 hover:text-blue-800"><?= $lang["instructions"] ?></a>
        </div>
        <!-- NAVIGATIONSMENÜ ENDE -->
    </div>
    <!-- SEITENLEISTE ENDE -->
    <div class="col-span-4">
        <!-- BEISPIELE ANFANG -->
        <div class="col-span-1 p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center">
            Examples
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
        <!-- BEISPIELE ENDE -->
        <form method="POST" name="refresh">
            <input type="text" name="cachefile" value="<?= $cachefile ?>" hidden>
            <input type="submit" name="refresh" value="<?= $lang["refresh examples"] ?>" class="mt-1 w-full rounded-full col-span-3 border border-black hover:bg-slate-300 cursor-pointer">
        </form>
    </div>
</div>