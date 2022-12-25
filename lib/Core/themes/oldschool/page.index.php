<div class="grid grid-cols-5 gap-5">
    <!-- SEITENLEISTE ANFANG -->
    <div class="col-span-1">
        <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center">
            <?= $lang["log_in"] ?>
        </div>
        <!-- ANMELDEBLOCK ANFANG -->
        <div id="loginform">
            <form method="POST" name="login" class="p-1 mt-1">
                <div class="grid grid-cols-3 gap-1 text-sm text-center">
                    <label for="login-username">
                        <?= $lang["username"] ?>
                    </label>
                    <input required type="text" name="username" id="login-username" class="w-full col-span-2 border border-black">
                    <label for="login-password">
                        <?= $lang["password"] ?>
                    </label>
                    <input required type="password" name="password" id="login-password" class="w-full col-span-2 border border-black">
                    <input type="submit" name="login" class="w-full rounded-full col-span-3 border border-black" value="<?= $lang["log_in"] ?>">
                </div>
            </form>
        </div>
        <!-- ANMELDEBLOCK ENDE -->
        <!-- REGISTRIERUNGSBLOCK ANFANG -->
        <div class="p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center mt-3">
            <?= $lang["create_account"] ?>
        </div>
        <div id="signupform">
            <form method="POST" name="signup" class="p-1 mt-1">
                <div class="grid grid-cols-3 gap-1 text-sm text-center">
                    <label for="signup-username">
                        <?= $lang["username"] ?>
                    </label>
                    <input required type="text" name="username" id="signup-username" class="w-full col-span-2 border border-black">
                    <label for="signup-password">
                        <?= $lang["password"] ?>
                    </label>
                    <input required type="password" name="password" id="signup-password" class="w-full col-span-2 border border-black">
                    <label for="signup-password2">
                        <?= $lang["repeat"] ?>
                    </label>
                    <input required type="password" name="password2" id="signup-password2" class="w-full col-span-2 border border-black">
                    <label for="signup-email">
                        <?= $lang["email"] ?>
                    </label>
                    <input required type="email" name="email" id="signup-email" class="w-full col-span-2 border border-black">
                    <input type="submit" name="signup" class="w-full rounded-full col-span-3 border border-black" value="<?= $lang["create"] ?>">
                </div>
            </form>
        </div>
        <!-- REGISTRIERUNGSBLOCK ENDE -->
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
    <!-- BEISPIELE ANFANG -->
    <div class="col-span-4">
        <div class="col-span-1 p-1 border border-black rounded-lg bg-slate-300 shadow-md shadow-black text-center">
            Examples
        </div>
        <div class="grid grid-cols-6 mt-1">
            <?php for ($i = 0; $i < $config["default"]["random"]; $i++) { ?>
                <div class="col-span-1 hover:bg-slate-400">
                    <a href="https://cdn.henai.eu/assets/images/maetel.png" target="_blank">
                        <img src="https://cdn.henai.eu/assets/images/maetel.png" alt="Placeholder" class="w-full px-2 pt-2">
                    </a>
                    <p class="text-sm text-center pb-1">
                        <a href="user.php?name=username" class="underline text-blue-500 hover:text-blue-800">Username</a>
                    </p>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- BEISPIELE ENDE -->
</div>